<?php

require('class/usuario.class.php');
require('class/fabricante.class.php');
require('class/estoque.class.php');
require('class/movimentacao.class.php');

class Main {

    public function __construct() {
        echo "\n --- Iniciando programa --- \n";
        $objUsuario = new Usuario;
        $objFabricante = new Fabricante;
        $objEstoque = new Estoque;
        $objMovimentacao = new Movimentacao;

        switch($_SERVER['argv'][1]) { //pega o segundo argumento passado pelo usuario via linha de comando
            case'saveUsuario':
                
                $this->saveUsuario($objUsuario);
                break;
            case'editUsuario':
                
                $this->editUsuario($objUsuario);
                break;
            default:
                echo "\n Não existe a funcionalidade {$_SERVER['argv'][1]} \n";
        }
    }

    public function trataDados() {
        $args = explode(',', $_SERVER['argv'][2]); //dados passado pelo usuario

        foreach ($args as $valor) {
            $arg = explode('=', $valor);

            $dados[$arg[0]] = $arg[1];

        }

        return $dados;
    }

    public function saveUsuario($objUsuario) {

        $dados = $this->trataDados();

        $objUsuario->setDados($dados);
        if($objUsuario->saveDados()) {
            sleep(1);
            echo "\n --- Usuário gravado --- \n";
        }
    }

    public function editUsuario($objUsuario) {

        $dados = $this->trataDados();

        $objUsuario->setDados($dados);
        if($objUsuario->saveDados()) {
            sleep(1);
            echo "\n --- Usuário editado --- \n";
        }
    }

    public function __destruct () {
        sleep(1);
        echo "\n --- Fim do programa --- \n";
    }
}

new Main;