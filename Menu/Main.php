<?php
/*
 * This file is part of Neos Calendar
 *
 * (c)2014 Ludwig Ruderstaller <lr@cwd.at>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */
namespace Cwd\Admin\MetronicBundle\Menu;

use Knp\Menu\FactoryInterface;
use Symfony\Component\DependencyInjection\ContainerAware;

/**
 * Class Main Menu
 *
 * @package  Cwd\Bundle\Admin\MetronicBundle\Menu
 * @author  Ludwig Ruderstaller <lr@cwd.at>
 */
class Main extends ContainerAware
{
    /**
     * @param FactoryInterface $factory
     * @param array            $options
     *
     * @return \Knp\Menu\ItemInterface
     */
    public function mainMenu(FactoryInterface $factory, array $options = array())
    {
        $context    = $this->container->get('security.authorization_checker');
        $request    = $this->container->get('request');

        $admin      = $context->isGranted('ROLE_ADMIN');

        $menu = $factory->createItem('root');
        $menu->setCurrentUri($this->container->get('request')->getRequestUri());

        $menu->addChild('Dashboard', array('route' => 'cwd_admin_metronic_demo_dashboard'))
            ->setAttribute('icon', 'icon-home');

        /*
        $calendar = $menu->addChild('Calendar', array('route' => 'neos_admin_collection_list'))
                    ->setAttribute('icon', 'icon-calendar')
                    ->setDisplayChildren(false);
        $calendar->addChild('Edit', array('route' => 'neos_admin_collection_edit', 'routeParameters' => array('id' => $request->get('id', 0))));
        */

        return $menu;
    }
}
