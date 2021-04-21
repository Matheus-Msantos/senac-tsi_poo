<?php

require('class/usuario.class.php');
require('class/fabricante.class.php');
require('class/estoque.class.php');
require('class/movimentacao.class.php');

class Main {

    private $objUsuario;
    private $objFabricante;
    private $objEstoque;
    private $objMovimentacao;

    public function __construct() {
        $this->verificaArg(1);

        echo "\n --- Iniciando programa --- \n";
        $this->objUsuario = new Usuario;
        $this->objFabricante = new Fabricante;
        $this->objEstoque = new Estoque;
        $this->objMovimentacao = new Movimentacao;

        $this->executaOperacao($_SERVER['argv'][1]);
    }
    
    private function executaOperacao(string $operacao) {
        switch($operacao) { //pega o segundo argumento passado pelo usuario via linha de comando
            case'saveUsuario':
                return $this->saveUsuario();
                break;
            case'editUsuario':
                
                return $this->editUsuario();
                break;
            case 'listUsuario':
                return $this->listUsuario();
                break;
            default:
                echo "\n Não existe a funcionalidade {$_SERVER['argv'][1]} \n";
        }
    }

    private function trataDados() {
        $this->verificaArg(2);
        $args = explode(',', $_SERVER['argv'][2]); //dados passado pelo usuario

        foreach ($args as $valor) {
            $arg = explode('=', $valor);

            $dados[$arg[0]] = $arg[1];

        }

        return $dados;
    }

    private function listUsuario(){
        $lista = $this->objUsuario->getAll();

        foreach($lista as $usuario) {
            echo "\n{$usuario['id']} \t {$usuario['nome']} \t {$usuario['cpf']}\n";
        }
    }

    private function saveUsuario() {

        $dados = $this->trataDados();

        $this->objUsuario->setDados($dados);
        if($this->objUsuario->saveDados()) {
            sleep(1);
            echo "\n --- Usuário gravado --- \n";
        }
    }

    private function editUsuario() {

        $dados = $this->trataDados();

        $this->objUsuario->setDados($dados);
        if($this->objUsuario->saveDados()) {
            sleep(1);
            echo "\n --- Usuário editado --- \n";
        }
    }

    private function deleteUsuario(){
        $dados = $this->trataDados();

        $this->objUsuario->setDados($dados);

        if($this->objUsuario->delete()) {
            echo "\n\n Usuário apagado com sucesso! \n\n";
        }
    }

    private function verificaArg(int $num) {
        if(!isset($_SERVER['argv'][$num])){
            echo"\n\n Erro: para utilizar o programa digite: php nome_do_arquivo operação dado=valor ...\n\n";

            exit();
        }
    }

    public function __destruct () {
        sleep(1);
        echo "\n --- Fim do programa --- \n";
    }
}

new Main;