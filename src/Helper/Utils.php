<?php

/**
 * Description of Utils
 *
 * @author cleriston.os
 */

namespace Helper;

class Utils {

    public function siglaToExtensoEtados($sigla) {
        $estados = $this->listarEstados();
        return $estados[$sigla];
    }

    public function listarEstados() {
        $estados = array(
            'AC' => 'Acre',
            'AL' => 'Alagoas',
            'AP' => 'Amapá',
            'AM' => 'Amazonas',
            'BA' => 'Bahia',
            'CE' => 'Ceará',
            'DF' => 'Distrito Federal',
            'ES' => 'Espírito Santo',
            'GO' => 'Goiáis',
            'MA' => 'Maranhão',
            'MT' => 'Mato Grosso',
            'MS' => 'Mato Grosso do Sul',
            'MG' => 'Minas Gerais',
            'PA' => 'Pará',
            'PB' => 'Paraíba',
            'PR' => 'Paraná',
            'PE' => 'Pernambuco',
            'PI' => 'Piauí',
            'RJ' => 'Rio de Janeiro',
            'RN' => 'Rio Grande do Norte',
            'RS' => 'Rio Grande do Sul',
            'RO' => 'Rondônia',
            'RR' => 'Roraima',
            'SC' => 'Santa Cantariana',
            'SP' => 'São Paulo',
            'SE' => 'Sergipe',
            'TO' => 'Toncantins'
        );
        return $estados;
    }

}
