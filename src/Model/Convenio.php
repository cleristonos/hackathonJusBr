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

    public function convenioById($id) {
         $sql = "select c.id, to_char(c.data_inicio_vigencia, 'DD/MM/YYYY') as data_inicio_vigencia, 
                    to_char(c.data_fim_vigencia, 'DD/MM/YYYY') as data_fim_vigencia,
                    c.justificativa, valor_global, valor_repasse,
                    to_char(c.data_assinatura, 'DD/MM/YYYY') as data_assinatura,
                    to_char(c.data_publicacao, 'DD/MM/YYYY') as data_publicacao,
                    c.objeto,	
                    p.nome as nome_proponente, m.nome as nome_municipio,
                    s.nome as nome_situacao, sc.nome as nome_subsituacao,
                    o.nome as nome_orgao
            from convenio c 
                    left join proponente p on p.id = c.id_proponente
                    left join municipio m on m.id = p.id_municipio
                    left join situacao_convenio s on s.id = c.id_situacao
                    left join subsituacao_convenio sc on sc.id = c.id_subsituacao
                    left join orgao o on o.id = c.id_orgao_concedente
            where c.id = ?";
        $statement = self::$entityManager->prepare($sql);
        $statement->bindValue(1, $id);
        $statement->execute();
        $convenio = $statement->fetchAll();
        return $convenio[0] ;
    }
    
}
