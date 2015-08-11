<?php

namespace Cwd\Admin\MetronicBundle\Twig;

use Ali\DatatableBundle\Twig\Extension\AliDatatableExtension;
use Symfony\Component\HttpKernel\KernelInterface;
use Symfony\Component\DependencyInjection\ContainerInterface;
use Ali\DatatableBundle\Util\Datatable;

class CwdDatatableExtension extends AliDatatableExtension
{
    /**
     * Converts a string to time
     *
     * @param string $string
     * @return int
     */
    public function datatable($options)
    {
        if (!isset($options['id']))
        {
            dump('ali-dta_' . md5(str_replace("/", '-', $options['js']['sAjaxSource'])));
            $options['id'] = 'ali-dta_' . md5(str_replace("/", '-', $options['js']['sAjaxSource']));
        }
        $dt                       = Datatable::getInstance($options['id']);
        $config                   = $dt->getConfiguration();
        $options['js_conf']       = json_encode($config['js']);
        $options['js']            = json_encode($options['js']);
        $options['action']        = $dt->getHasAction();
        $options['action_twig']   = $dt->getHasRendererAction();
        $options['fields']        = $dt->getFields();
        $options['delete_form']   = $this->createDeleteForm('_id_')->createView();
        $options['search']        = $dt->getSearch();
        $options['search_fields'] = $dt->getSearchFields();
        $options['multiple']      = $dt->getMultiple();
        $options['sort']          = is_null($dt->getOrderField()) ? NULL : array(array_search(
            $dt->getOrderField(), array_values($dt->getFields())), $dt->getOrderType());
        $main_template            = 'AliDatatableBundle:Main:index.html.twig';
        if (isset($options['main_template']))
        {
            $main_template = $options['main_template'];
        }

        return $this->_container
            ->get('templating')
            ->render(
                $main_template, $options);
    }

    /**
     * create delete form
     *
     * @param type $id
     * @return type
     */
    private function createDeleteForm($id)
    {
        return $this->createFormBuilder(array('id' => $id))
            ->add('id', 'hidden')
            ->getForm();
    }
}
