<?php
/*
 * This file is part of dPanel.
 *
 * (c)2014 Ludwig Ruderstaller <lr@cwd.at>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */
namespace Cwd\Admin\MetronicBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;

/**
 * Class DefaultController
 *
 * @package Dpanel\Bundle\ApiBundle\Controller
 * @author  Ludwig Ruderstaller <lr@cwd.at>
 * @Route("/demo")
 */
class DemoController extends Controller
{
    /**
     *
     * @Route("/login")
     * @Template()
     * @return array()
     */
    public function loginAction()
    {
        return array();
    }
}
