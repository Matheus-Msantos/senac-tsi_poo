<?php

interface  iNba{
    public function setNome(string $nome);
    public function showNome();
    
}

class Nba implements iNba{
    protected $nome;
    protected $estrela;

    public function setNome(string $nome): bool {
        $this->nome = $nome;
        return true;
    }

    public function  showNome(): string{
        return $this->nome;
    }

}

class titulo extends Nba {
    private $trofeu;

    public function setTrofeu(int $Qtd) {
        return $this->trofeu = $Qtd;
    }
}
$clippers = new titulo;

$titulo->setNome('Clippers');

echo 'O ' . $titulo->showNome() . ' não tem troféu';