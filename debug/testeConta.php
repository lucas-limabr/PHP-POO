<?php

use App\ContaBancaria;

require __DIR__ . '/../vendor/autoload.php';

$c1 = new ContaBancaria();

var_dump($c1);
var_dump($c1->exibirDados());
echo $c1->nome_titular;