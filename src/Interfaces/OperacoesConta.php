<?php 

namespace App\Interfaces;

interface OperacoesConta{
    public function obterExtrato(): void;
    public function sacar(float $saque): bool;
    public function depositar(float $deposito): bool;
}