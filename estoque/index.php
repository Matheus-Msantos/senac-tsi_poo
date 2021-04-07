<?php

require('class/usuario.class.php');
require('class/fabricante.class.php');
require('class/estoque.class.php');
require('class/movimentacao.class.php');

class Main {

    public function __construct() {
        $objUsuario = new Usuario;
        $objFabricante = new Fabricante;
        $objEstoque = new Estoque;
        $objMovimentacao = new Movimentacao;
    }

    public function __desconstruct () {
        echo "rodou liso";
    }
}

new Main;