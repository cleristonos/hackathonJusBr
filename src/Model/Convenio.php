<?php

/**
 * Description of Convenio
 *
 * @author cleriston.os
 */

namespace Model;

class Convenio extends AbstractModel {

    public function listaSituacao() {
        $sql = "select * from situacao_convenio";
        $statement = self::$entityManager->prepare($sql);
        $statement->execute();
        $situacaoLista = $statement->fetchAll();
        return $situacaoLista;
    }
    
     public function situacaoById($id) {
         $sql = "select * from situacao_convenio where id = ?";
        $statement = self::$entityManager->prepare($sql);
        $statement->bindValue(1, $id);
        $statement->execute();
        $situacao = $statement->fetchAll();
        return $situacao[0] ;
    }
    
    public function listarEstadosComDiferenca($situacao) {
        
        $sql = "select m.uf, count(c.id) as contador from convenio c 
	left join proponente p on c.id_proponente = p.id
	left join municipio m on m.id = p.id_municipio
	where c.id_situacao = ? 
	group by m.uf";
        
        $statement = self::$entityManager->prepare($sql);
        $statement->bindValue(1, $situacao);
        $statement->execute();        
        $listaEstados = $statement->fetchAll();
        
        return $listaEstados;
    }

}
