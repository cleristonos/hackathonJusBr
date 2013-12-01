<?php


/**
 * Description of Ong
 *
 * @author cleriston.os
 */
namespace Model;
class  Ong extends AbstractModel{
    
    
public function listar($situacao,$uf){
        
        $sql = "select c.id ,c.valor_global, c.valor_repasse, p.nome from convenio c 
	left join proponente p on c.id_proponente = p.id
	left join municipio m on m.id = p.id_municipio
	where c.id_situacao = ? and m.uf = ?";
        $statement = self::$entityManager->prepare($sql);
        $statement->bindValue(1, $situacao);
        $statement->bindValue(2, $uf);
        $statement->execute();
        $ongList = $statement->fetchAll();
        
        return $ongList;
    }
    
}
