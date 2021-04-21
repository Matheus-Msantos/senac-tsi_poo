<?php

require( __DIR__ . '/../interface/usuario.interface.php');
require_once( __DIR__ . '/abstract/tipoPessoa.class.php');

Class Usuario extends TipoPessoa implements iUsuario {

    protected $cpf;
    protected $nome;


    public function __construct(){

        parent::__construct();
    }
    
    
    public function setDados(array $dados):bool {

        $this->id = $dados['id'] ?? null;
        $this->cpf = $dados['cpf'] ?? null;
        $this->nome = $dados['nome'] ?? null;

        return true;
    }

    public function saveDados() {

       if( empty($this->id) ) {
           return $this->insert();
       }else {
           return $this->update();
       }
    }

    public function update() {
        $stmt = $this->prepare('UPDATE usuario SET cpf = :cpf, nome = :nome WHERE id = :id');
        if ( $stmt->execute([':cpf' => $this->cpf, ':nome' => $this->nome, ':id' => $this->id]) ) {
            return true;
        }

        return false;
    }

    public function insert() {
        $stmt = $this->prepare('INSERT INTO usuario(cpf, nome) VALUES (:cpf, :nome)');
        if ( $stmt->execute([':cpf' => $this->cpf, ':nome' => $this->nome]) ) {
            return true;
        }

        return false;
    }

    public function delete():bool {
        if($this->id){
            $stmt->prepare('DELETE FROM usuario WHERE id = :id'); 
            if($stmt->execute([':id' =>$this->id])){
                return true;
            }               
        }else {
            return false;
        }
    }

    public function getDados (int $id_usuario):array {

    }

    public function getAll():array {
        $stmt = $this->prepare('SELECT * FROM usuario');

        $stmt->execute();

        return $stmt->fetchAll();
    }
}