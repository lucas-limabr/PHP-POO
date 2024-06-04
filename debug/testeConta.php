<?php

use App\ContaBancaria;

require __DIR__ . '/../vendor/autoload.php';

$c1 = new ContaBancaria(
    'Nubank',
    'Lucas',
    '3471',
    '17542-1',
    0
);

$c1->setSaldo(100.8);

print_r($c1->exibirDados());
echo $c1->getBanco();

$c2 = new ContaBancaria('Banco');