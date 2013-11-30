<?php

/**
 * Description of Site
 *
 * @author cleriston.os
 */

namespace Controller;

use Symfony\Component\HttpFoundation\Request;

class Site extends AbstractController {

    public function home(\Silex\Application $app) {
        
        return $app['twig']->render('home.twig', array());
    }
     public function sobre(\Silex\Application $app) {
        
        return $app['twig']->render('sobre.twig', array());
    }

}
