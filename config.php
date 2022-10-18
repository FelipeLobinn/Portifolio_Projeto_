<?php
    define('INCLUDE_PATH','http://localhost:8082/Projeto_Testes/');
    
    $autoload = function($class){
        if($class=="Email"){
            require 'classes/phpmailer/src/Exception.php';
            require 'classes/phpmailer/src/PHPMailer.php';
            require 'classes/phpmailer/src/SMTP.php';
        };

        include('classes/'.$class.'.php');
    };

    spl_autoload_register($autoload);

    if(isset($_POST['acao'])){
        $usuarioEmail = $_POST['email'];
        $tipoEmail = 1;

        new Email($tipoEmail,$usuarioEmail);
    };
    if(isset($_POST['envio'])){
        $usuarioEmail = $_POST['email'];
        $usuarioNome = $_POST['nome'];
        $usuarioMensagem = $_POST['mensagem'];
        $tipoEmail = 2;

        new Email($tipoEmail,$usuarioEmail,$usuarioNome,$usuarioMensagem);
    }
?>