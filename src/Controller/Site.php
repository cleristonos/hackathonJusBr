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

        $situacaoLista = (new \Model\Convenio())->listaSituacao();
        return $app['twig']->render('home.twig', array(
                    'listaEstados' => (new \Helper\Utils())->listarEstados(),
                    'listaSituacao' => $situacaoLista
        ));
    }

    public function listOng(\Silex\Application $app, Request $req) {
        $uf = $req->get('uf');
        $situacao = $req->get('situacao');

        $nomeEstado = (new \Helper\Utils())->siglaToExtensoEtados($uf);
        //$queryBuilder = $app['db']->createQueryBuilder();

        $ongList = (new \Model\Ong())->listar($situacao, $uf);

        $situacao = (new \Model\Convenio())->situacaoById($situacao);


        return $app['twig']->render('ongList.twig', array('listaOng' => $ongList, 'nomeEstado' => $nomeEstado, 'situacao' => $situacao['nome']));
    }
     public function home2(\Silex\Application $app, Request $req) {
         $situacao = $req->get('situacao');
         if(!isset($situacao)){
             $situacao = 34;
         }

        return $app['twig']->render('home2.twig', array(
            'listaEstados'=> (new \Model\Convenio())->listarEstadosComDiferenca($situacao),
            'listaSituacao'=>(new \Model\Convenio())->listaSituacao(),            
            'situacao'=>(new \Model\Convenio())->situacaoById($situacao)
           ));
    }

    
//    public function home2(\Silex\Application $app, Request $req) {
//         $situacao = $req->get('situacao');
//         if(!isset($situacao)){
//             $situacao = 34;
//         }
//
//        return $app['twig']->render('home2.twig', array(
//            'listaEstados'=> (new \Model\Convenio())->listarEstadosComDiferenca($situacao),
//            'listaSituacao'=>(new \Model\Convenio())->listaSituacao(),            
//            'situacao'=>(new \Model\Convenio())->situacaoById($situacao)
//           ));
//    }
    
    
    public function convenio(\Silex\Application $app, Request $req) {
        $idConvenio = $req->get('id');
       
        return $app['twig']->render('convenio.twig', array(
            'convenio'=> (new \Model\Convenio())->convenioById($idConvenio)
           ));
    }
}
