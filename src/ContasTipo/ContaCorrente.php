<?php

declare(strict_types=1);
//preciso deixar o namespace identificado: criei a pasta ContasTipo dentro da pasta raiz (src), que tem o namespace App\
namespace App\ContasTipo;

use App\ContaBancaria;
use DateTime;

class ContaCorrente extends ContaBancaria
{
    const TAXA = 0.95; //taxa 5% = 95/100
    const TIPO_CONTA = "Conta Corrente";

    public function __construct(string $banco, string $nome_titular, string $num_agencia, string $num_conta, float $saldo, string $data_abertura)
    {
        parent::__construct($banco, $nome_titular, $num_agencia, $num_conta, $saldo, $data_abertura);
    }

    public function obterExtrato(): void
    {
        $qtd_dias = $this->calculoDias();

        if ($qtd_dias == 0) {
            echo "Não foi possível obter o extrato\n";
        } else {

            for ($i = 30; $i <= $qtd_dias; $i += 30) {
                //uma constante tem uma peculiaridade, para fazer referência a ela é necessário self:: ao invés do $this->
                $taxa_aplicada = $this->getSaldo() * self::TAXA;
                $this->setSaldo($taxa_aplicada);
            }

            echo $this->getNome() . ', seu saldo é de R$' . number_format($this->getSaldo(), 2, ',', '.');
        }
    }
}
