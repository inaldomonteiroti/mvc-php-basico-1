<?php
// Criamos esta estrutura como se fosse um framework no qual foi criado essa classe.

use App\App;
use App\Lib\Erro;

session_start();

//aconteça todos os outros erros menos o e notice - que sao avisos de procedimentos incorretos
error_reporting(E_ALL & ~E_NOTICE);

//utilizando composer ....que cria um arquivo vendor que é startado em autoload
require_once("vendor/autoload.php");

//coração desta aplicação - interação com classes controllers e views
try {
    $app = new App(); //cria uma instancia
    $app->run(); //interação com classes controllers e views caso erro cai em baixo
}catch (\Exception $e){
    $oError = new Erro($e);
    $oError->render();
} // Se der um erro oai cair aki tambem