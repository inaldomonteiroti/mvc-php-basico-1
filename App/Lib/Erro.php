<?php

//fazer include de classe na Lib para ser utilizado

namespace App\Lib;

use Exception; // classe nativa para tratar excessoes

class Erro
{
    private $message;
    private $code;

    public function __construct($objetoException = Exception::class)
    {
        $this->code     = $objetoException->getCode();
        $this->message  = $objetoException->getMessage();
    }

    public function render()
    {
        $varMessage = $this->message; // mensagem da excessoa para imprimir na view de erro

        if(file_exists(PATH . "/App/Views/error/".$this->code.".php")){
            require_once PATH . "/App/Views/error/".$this->code.".php";
        }else{
            require_once PATH . "/App/Views/error/500.php";
        }
        exit;
    }
}