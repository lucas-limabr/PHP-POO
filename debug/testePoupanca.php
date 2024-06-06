<?php

use App\ContaBancaria;
use App\ContasTipo\ContaPoupanca;


require __DIR__ . '/../vendor/autoload.php';

$c1 = new ContaPoupanca(
    'Nubank',
    'Lucas',
    '3471',
    '17542-1',
    0,
    '04/05/2024'
);

$c2 = new ContaPoupanca(
    'Santander',
    'Rodrigo',
    '5612',
    '17233-9',
    100.0,
    '04/03/2024'
);


$c1->setSaldo(1000.0);

$c1->obterExtrato();
echo PHP_EOL;

print_r($c1->exibirDados());
echo PHP_EOL;

$c2->obterExtrato();
echo PHP_EOL;
print_r($c2->exibirDados());

