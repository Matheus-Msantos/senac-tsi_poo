<?php

require( __DIR__ . '/../interface/usuario.interface.php');
require_once( __DIR__ . '/abstract/tipoPessoa.class.php');

Class Usuario extends TipoPessoa implements iUsuario {


    
    public function setDados(array $dados):bool {

    }

    public function getDados (int $id_usuario):array {

    }
}