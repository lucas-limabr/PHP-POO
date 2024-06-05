<?php 

declare(strict_types= 1);
namespace App\Interfaces;

interface DadosConta{
    public function getBanco(): string;
    public function getSaldo(): float;
    public function getNome(): string;
    public function getAgencia(): string;
    public function getConta(): string;
    public function getDataAbertura():string;
}