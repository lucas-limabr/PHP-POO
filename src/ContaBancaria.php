<?php

//esta declaração é para adicionar tipagem aos métodos/funções apenas. Assim, se um método é definido com um parâmetro do tipo int e um retorno int tbm, este método não aceitará passagem de argumentos que não seja do tipo int, e ele retornará apenas um valor do tipo int.
declare(strict_types=1);

namespace App;

use DateTime;

abstract class ContaBancaria
{
    private string $banco;
    private string $nome_titular;
    private string $num_agencia;
    private string $num_conta;
    private float $saldo;
    private $data_atual;

    protected String $data_abertura;

    public function __construct(string $banco, string $nome_titular, string $num_agencia, string $num_conta, float $saldo, string $data_abertura)
    {
        $this->banco = $banco;
        $this->nome_titular = $nome_titular;
        $this->num_agencia = $num_agencia;
        $this->num_conta = $num_conta;
        $this->saldo = $saldo;
        $this->data_abertura = $data_abertura;

        $this->data_atual = new DateTime();
    }

    public function exibirDados(): array
    {
        return [
            "Banco: " => $this->banco,
            "Nome titular" => $this->nome_titular,
            "Agência " => $this->num_agencia,
            "Conta" => $this->num_conta,
            "Saldo" => "R$" . number_format($this->saldo, 2, ',', '.') . " reais",
            "Data de abertura da conta" => $this->data_abertura
        ];
    }

    public abstract function obterExtrato(): void;

    public function depositar(float $deposito): bool
    {
        if ($deposito > 0) {
            $this->saldo += $deposito;
            return true;
        }
        return false;
    }

    public function sacar(float $saque): bool
    {
        //solução alternativa ao this, como $saldo está fora do escopo desta função eu preciso especificar que ela é uma variável global
        //global $saldo;
        if ($saque <= $this->saldo && $saque > 0) {
            $this->saldo -= $saque;
            return true;
        }
        return false;
    }

    //getters and setters
    protected function getDataAtual(): DateTime
    {
        //zerando a hora, minutos e segundos
        $this->data_atual->setTime(0, 0, 0);
        $this->data_atual->format('d/m/Y');
        return $this->data_atual;
    }

    protected function calculoDias(): int
    {
        //:: representa que estou acessando um método/atributo estático da classe, dispensando sua instanciação. Este resultado que será um objeto DATETIME ESTÁ SENDO ATRIBUIDO A VARIÁVEL DATA_FORNECIDA que passará a ser um objeto

        //bloco de código com erro potencial protegido pelo trycatch
        try {
            $data_fornecida = DateTime::createFromFormat("d/m/Y", $this->data_abertura);

            if (!$data_fornecida) {
                throw new \Exception("Formato de data inválido, utilize \"dd/mm/yyyy\"\n");
            }

            //implicitamente $intervalo é um objeto da classe DateInterval pq recebeu um cálculo feito pelo método diff de um objeto da classe DateTime
            $intervalo = $this->data_atual->diff($data_fornecida);

            return $intervalo->days;
        } catch (\Exception $e) {
            echo 'Erro:' . $e->getMessage();
            return 0;
        }
    }

    public function getBanco(): string
    {
        return $this->banco;
    }

    protected function getSaldo(): float
    {
        return $this->saldo;
    }

    public function getNome(): string
    {
        return $this->nome_titular;
    }
    public function getAgencia(): string
    {
        return $this->num_agencia;
    }
    public function getConta(): string
    {
        return $this->num_conta;
    }

    public function setBanco(string $banco): void
    {
        $this->banco = $banco;
    }
    public function setNome(string $nome): void
    {
        $this->nome_titular = $nome;
    }
    public function setAgencia(string $agencia): void
    {
        $this->num_agencia = $agencia;
    }
    public function setConta(string $conta): void
    {
        $this->num_conta = $conta;
    }
    public function setSaldo(float $saldo): void
    {
        $this->saldo = $saldo;
    }
}
