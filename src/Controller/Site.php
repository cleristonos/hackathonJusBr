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
        $sql = "select * from situacao_convenio";
        $statement = $app['db']->prepare($sql);
        $statement->execute();
        $situacaoLista = $statement->fetchAll();
        
        return $app['twig']->render('home.twig', array(
        'listaEstados' => (new \Helper\Utils())->listarEstados(),
        'listaSituacao' =>$situacaoLista
        ));
    }

    public function listOng(\Silex\Application $app, Request $req) {
        $uf = $req->get('uf');
        $situacao = $req->get('situacao');
        
        $nomeEstado = (new \Helper\Utils())->siglaToExtensoEtados($uf);
        //$queryBuilder = $app['db']->createQueryBuilder();

        $sql = "select c.id ,c.valor_global, c.valor_repasse, p.nome from convenio c 
	left join proponente p on c.id_proponente = p.id
	left join municipio m on m.id = p.id_municipio
	where c.id_situacao = ? and m.uf = ?";
        $statement = $app['db']->prepare($sql);
        $statement->bindValue(1, $situacao);
        $statement->bindValue(2, $uf);
        $statement->execute();
        $ongList = $statement->fetchAll();
       
        $sql = "select * from situacao_convenio where id = ?";
        $statement = $app['db']->prepare($sql);
        $statement->bindValue(1, $situacao);
        $statement->execute();
        $situacao = $statement->fetchAll();
  
        
        return $app['twig']->render('ongList.twig', array('listaOng' => $ongList, 'nomeEstado' => $nomeEstado, 'situacao'=>$situacao[0]['nome'] ));
    }

}
