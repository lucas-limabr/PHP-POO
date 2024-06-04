<?php 

//require ("import") obrigatório pois o arquivo autoload.php mapea todas as classes/dependências do projeto para elas serem encontradas aqui
require __DIR__ .'/../vendor/autoload.php';

//o use determina que neste arquivo php a classe ContaBancaria de namespace ("pacote") App pode ser utilizada aqui, ou seja, eu posso instanciar esta classe
use App\ContaBancaria;

$c = new ContaBancaria();
var_dump($c);