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

}
