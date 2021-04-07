<?php

require( __DIR__ . '/../interface/movimentacao.interface.php');

Class Movimentacao implements iMovimentacao {

    public function setDados (array $dados): bool {

    }

    public function getDados (string $tipo, string $datahora, int $id_usuario): array {

    }
}