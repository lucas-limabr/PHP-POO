<?php

use App\ContaBancaria;
use App\ContasTipo\ContaCorrente;
use App\Interfaces\DadosConta;
use App\Interfaces\OperacoesConta;

require __DIR__ . '/../vendor/autoload.php';

$c1 = new ContaCorrente(
    'Bradesco',
    'Daniel',
    '3722',
    '43562-3',
    0,
    '04/04/2024'
);

exibirDados($c1);
operacoesConta($c1);

//esta função recebe o objeto da classe Conta Corrente mas com um parâmetro que é do tipo de uma interface (DadosConta), não da classe. Assim, este parâmetro acessa apenas os métodos definidos pela interface, que são implementados nas classes que implementam/extendem esta interface
function exibirDados(DadosConta $conta):void{
    echo'Nome do titular: '. $conta->getNome();
    echo PHP_EOL;
    echo'Banco: '. $conta->getBanco();
    echo PHP_EOL;
    echo'Agência: '.$conta->getAgencia();
    echo PHP_EOL;
    echo'Nùmero da conta: '.$conta->getConta();
    echo PHP_EOL;
    echo'Data de abertura da conta: '.$conta->getDataAbertura();
    echo PHP_EOL;
    echo"---------------------\n";
}

//função análoga, apenas os métodos que que a interface OpracoesConta define são acessadas 
function operacoesConta(OperacoesConta $conta):void{
    $deposito = 1200.0;
    if($conta->depositar($deposito)){
        echo'Depósito de R$'. number_format($deposito, 2, ',', '.')." realizado com sucesso\n";
    }
    else{
        echo"O valor de depósito precisa ser maior que zero reais\n";
    }

    $saque = 200.0;
    if($conta->sacar($saque)){
        echo'Saque de R$'. number_format($saque, 2, ',', '.')." realizado com sucesso\n";
    }
    else{
        echo"O valor na conta precisa ser maior ou igual o valor de saque\n";
    }

    $conta->obterExtrato();
}

//o parâmetro da função não acessa todos os métodos do objeto $c1, mas o objeto$ c1 em si acessa normalmente todos os métodos/atributos públicos da classe Conta Corrente e da classe ContaBancaria que é extendida
//print_r($c1->exibirDados()); 
// $c1->setSaldo(2000.0);
//$c1->obterExtrato();
