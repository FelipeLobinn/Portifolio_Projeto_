<?php   include('config.php')   ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="keywords" content="palavras-chave,do,meu,site">
    <meta name="description" content="Descrição do meu site">
    <link href="<?php echo INCLUDE_PATH; ?>favicon.ico" rel="icon"> 
    <link href="https://fonts.googleapis.com/css2?family=Open+Sans:wght@300;400;700&display=swap" rel="stylesheet">
    <link href="<?php echo INCLUDE_PATH; ?>estilo/fontsawesome/all.min.css" rel="stylesheet">
    <link href="<?php echo INCLUDE_PATH; ?>estilo/style.css" rel="stylesheet">
    <title>Projeto 01</title>
</head>
<body>
    <?php
        $url = isset($_GET['url']) ? $_GET['url'] : 'home';

        switch($url){
            case 'sobre' :
                echo "<target target='sobre' />";
                break;

            case 'servicos' :
                echo "<target target='servicos ' />";
                break;
        }

    ?>

    <header>
        <div class="center">
            <div class="logo left">Logomarca</div>   <!--logo-->
            <nav class="desktop right">
                <ul>
                    <li><a href="<?php echo INCLUDE_PATH; ?>">Home</a></li>
                    <li><a href="<?php echo INCLUDE_PATH; ?>sobre">Sobre</a></li>
                    <li><a href="<?php echo INCLUDE_PATH; ?>servicos">Serviços</a></li>
                    <li><a realtime="contato" href="<?php echo INCLUDE_PATH; ?>contato">Contato</a></li>
                </ul>
            </nav>
            <nav class="mobile right">
                <div class="botao-menu-mobile">
                    <i class="fa-solid fa-bars"></i>
                </div>  <!--botao-menu-mobile-->
                <ul>
                    <li><a href="<?php echo INCLUDE_PATH; ?>">Home</a></li>
                    <li><a href="<?php echo INCLUDE_PATH; ?>sobre">Sobre</a></li>
                    <li><a href="<?php echo INCLUDE_PATH; ?>servicos">Serviços</a></li>
                    <li><a realtime="contato" href="<?php echo INCLUDE_PATH; ?>contato">Contato</a></li>
                </ul>
            </nav>
            <div class="clear"></div> <!--clear-->
        </div>  <!--center-->
    </header>

    <div class="conteudo-container">
        <?php

            if(file_exists('pages/'.$url.'.php'))
            include ('pages/'.$url.'.php');

            else{
                if($url != 'sobre' && $url != 'servicos'){
                    $pageError404 = true;
                    include('pages/404.php');
                }
                else
                    include('pages/home.php');
            }
        ?>
    </div>  <!--conteudo-container-->
    
    <footer <?php if(isset($pageError404) && $pageError404==true) echo ("class='fixed'")?>>
        <div class="center">
            <p>Todos os direitos reservados.</p>
        </div>  <!--center-->
    </footer>

    <script src="<?php echo INCLUDE_PATH; ?>js/jquery.js"></script>
    <script src="<?php echo INCLUDE_PATH; ?>js/scripts.js"></script>
    <script src='https://maps.googleapis.com/maps/api/js?v=3.exp&key=AIzaSyDHPNQxozOzQSZ-djvWGOBUsHkBUoT_qH4'></script>
    <script src="<?php echo INCLUDE_PATH;?>js/map.js"></script>
</body>
</html>