<?php

require 'vendor/autoload.php';

use Alura\Leilao\Model\Lance;
use Alura\Leilao\Model\Leilao;
use Alura\Leilao\Model\Usuario;
use Alura\Leilao\Service\Avaliador;

// Arrumo o teste para que ele passe
$leilao = new Leilao('Fiat 147 0KM');

$maria = new Usuario('Maria');
$joao = new Usuario('João');

$leilao->recebeLance(new Lance($joao, 2000));
$leilao->recebeLance(new Lance($maria, 2500));

// Executo o código a ser testado
$leiloeiro = new Avaliador();
$leiloeiro->avalia($leilao);

// Verifico se o resultado é o esperado
$valorEsperado = 2500;

$maiorValor = $leiloeiro->getMaiorValor();

if ($maiorValor == $valorEsperado) {
    echo "TESTE OK";
} else {
    echo "TESTE FALHOU";
}