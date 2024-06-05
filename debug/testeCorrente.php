<?php

use App\ContaBancaria;
use App\ContasTipo\ContaCorrente;


require __DIR__ . '/../vendor/autoload.php';

$c1 = new ContaCorrente(
    'Bradesco',
    'Daniel',
    '3722',
    '43562-3',
    0,
    '04/04/2024'
);

$c1->setSaldo(2000.0);

$c1->obterExtrato();
echo PHP_EOL;

print_r($c1->exibirDados());