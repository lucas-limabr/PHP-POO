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

$saque = 200.0;
if ($c1->sacar($saque)) {
    echo'Saque realizado com sucesso';
}
else{
    echo 'Dinheiro insuficiente na conta para fazer o saque';
}
echo PHP_EOL;

$deposito = 100.2;
if ($c1->depositar($deposito)) {
    echo"Deposito de R\$ $deposito realizado com sucesso"; 
}
else{
    echo 'O depósito precisa ser maior que zero reais';
}
echo PHP_EOL;

if ($c1->sacar($saque)) {
    echo"Saque de R\$ $saque realizado com sucesso";
}
else{
    echo 'Dinheiro insuficiente na conta para fazer o saque';
}
echo PHP_EOL;

print_r($c1->exibirDados());

