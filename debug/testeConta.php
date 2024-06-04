<?php

use App\ContaBancaria;

require __DIR__ . '/../vendor/autoload.php';

$c1 = new ContaBancaria();

$c1->setBanco('Banco do Brasil');
$c1->setNome('Lucas');
$c1->setAgencia('3486');
$c1->setConta('17854-2');
$c1->setSaldo('100.8');

print_r($c1->exibirDados());
echo $c1->getBanco();
