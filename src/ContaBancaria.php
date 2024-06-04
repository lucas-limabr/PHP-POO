<?php 

//esta declaração é para adicionar tipagem aos métodos/funções apenas. Assim, se um método é definido com um parâmetro do tipo int e um retorno int tbm, este método não aceitará passagem de argumentos que não seja do tipo int, e ele retornará apenas um valor do tipo int.
declare(strict_types= 1);

namespace App;

class ContaBancaria{
    public string $banco = "Inter";
    public string $nome_titular = "Lucas";
    public string $num_agencia = "3456";
    public string $num_conta = "17893-5";
    public float $saldo = 0;

    public function exibirDados():array{
        return [
            "Banco: " => $this->banco,
            "Nome titular"=> $this->nome_titular,
            "Agência "=> $this->num_agencia,
            "Conta"=> $this->num_conta,
            "Saldo"=> $this->saldo
        ];
    }
}