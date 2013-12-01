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
        $id = 27;
        $sql = "SELECT * FROM situacao_convenio WHERE id = ?";
        $post = $app['db']->fetchAssoc($sql, array((int) $id));

        return "<h1>{$post['id']}</h1>" .
                "<p>{$post['nome']}</p>";
        //return $app['twig']->render('home.twig', array());
    }

    public function sobre(\Silex\Application $app) {

//        return $app['twig']->render('sobre.twig', array());
    }

}
