<?php

require( __DIR__ . '/../interface/fabricante.interface.php');
require_once( __DIR__ . '/abstract/tipoPessoa.class.php');

Class Fabricante extends TipoPessoa implements iFabricante {


    
    public function setDados(array $dados):bool {

    }

    public function getDados (int $id_fabricante):array {

    }
}