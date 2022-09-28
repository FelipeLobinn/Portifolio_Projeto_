<?php
    define('INCLUDE_PATH','http://192.168.2.130/Projeto_Testes/');
    
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

        new Email($usuarioEmail);
    };
?>