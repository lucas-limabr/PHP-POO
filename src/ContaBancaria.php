<?php 

//esta declaração é para adicionar tipagem aos métodos/funções apenas. Assim, se um método é definido com um parâmetro do tipo int e um retorno int tbm, este método não aceitará passagem de argumentos que não seja do tipo int, e ele retornará apenas um valor do tipo int.
declare(strict_types= 1);

namespace App;

class ContaBancaria{
    private string $banco;
    private string $nome_titular;
    private string $num_agencia;
    private string $num_conta;
    private float $saldo;

    public function exibirDados():array{
        return [
            "Banco: " => $this->banco,
            "Nome titular"=> $this->nome_titular,
            "Agência "=> $this->num_agencia,
            "Conta"=> $this->num_conta,
            "Saldo"=> $this->saldo
        ];
    }

    //getters and setters
    public function getBanco():string{
        return $this->banco;
    }
    public function getNome():string{
        return $this->nome_titular;
    }
    public function getAgencia():string{
        return $this->num_agencia;
    }
    public function getConta():string{
        return $this->num_conta;
    }
    public function getSaldo():float{
        return $this->saldo;
    }

    public function setBanco(string $banco):void{
       $this->banco = $banco;
    }
    public function setNome(string $nome):void{
        $this->nome_titular = $nome;
    }
    public function setAgencia(string $agencia):void{
        $this->num_agencia = $agencia;
    }
    public function setConta(string $conta):void{
        $this->num_conta = $conta;
    }
    public function setSaldo(float $saldo):void{
       $this->saldo = $saldo ;
    }
}