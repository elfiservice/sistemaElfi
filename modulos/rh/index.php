<?php
require '../../classes/Config.inc.php';
session_start();

$menu = filter_input(INPUT_GET, 'id_menu', FILTER_DEFAULT);
$modulo = filter_input(INPUT_GET, 'modulo', FILTER_DEFAULT);

//$nome_arquivo = basename($_SERVER['PHP_SELF'],'.php');
//
$file_folder = strtoupper(basename(__DIR__));
?>

<!doctype html>
<!--[if lt IE 7]> <html class="no-js ie6 oldie" lang="pt"> <![endif]-->
<!--[if IE 7]>    <html class="no-js ie7 oldie" lang="pt"> <![endif]-->
<!--[if IE 8]>    <html class="no-js ie8 oldie" lang="pt"> <![endif]-->
<!--[if gt IE 8]><!--> <html class="no-js" lang="pt"> <!--<![endif]-->
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
        <title>Sistema ELFI | <?= $file_folder ?></title>

        <meta name="description" content="">
        <meta name="author" content="Elfi Service">

        <meta name="viewport" content="width=device-width,initial-scale=1">
        <link rel="stylesheet" href="../../estilos.css">    

        <!-- Menus dorp down  -->
        <?php require_once '../../includes/javascripts/menu_dropdown.php'; ?>

        <!-- Tabela  -->
        <?php require_once '../../includes/javascripts/tabela_no_head.php'; ?>

    </head>
    <body>

        <div  style="background: url(imagens/topo1.png) repeat-x;  padding:5px 0px 30px 0px;"> </div>

        <?php
//------ CHECK IF THE USER IS LOGGED IN OR NOT AND GIVE APPROPRIATE OUTPUT -------
        $login = (!empty($login) ? $login : $login = new Login());
        if (!$login->checkLogin()) {
            header("Location: conectar.php");
        } else {
            $userlogin = $login->getSession();
        }
        ?>

        <h2 style="text-align: center;" ><?= $file_folder ?></h2>
        <div style="">
            <div id="colaborador_logado">
                <?php require '../../includes/colaborador_logado.inc.php'; ?>
            </div>
            <div style="float: right">
                <?php require '../../includes/menu_geral.inc.php'; ?>
            </div>
        </div>

        <?php
        $tipo_conta = $userlogin->getTipo();
        
//ALTERAR MENUS  PARA CADA MODULO
        if ($tipo_conta == "ad" && $userlogin->getId() == 1) {
            $rel_menu_link = "cadastro_configuracao";
            
        }else if ($tipo_conta == "ad") {
            $rel_menu_link = "usuarios_nao_admin";
        } else {
            WSErro("Acesso Restrito para seu tipo de Usuario!", WS_ALERT);
        }
        
        
        include_once 'menu.php';
            ?>
            

            <div style="margin:20px 0px 20px 0px;">

                <div id="painel">
                    <?php
                    //QUERY STRING
                    if (!empty($menu)):
                        $includepatch = __DIR__ . DIRECTORY_SEPARATOR .  strip_tags(trim($menu) . '.php');
                    else:
                        $includepatch = __DIR__ . DIRECTORY_SEPARATOR . $menu .'.php';
                    endif;

                    if (file_exists($includepatch)):
                        require_once($includepatch);
                    elseif($menu == "timeline"):
                        require_once ('../../timeline.php');
                    else:
                        echo "<div class=\"content notfound\">";
                        WSErro("<b>Erro ao incluir tela:</b> Erro ao incluir o controller /{$menu}.php!", WS_ERROR);
                        echo "</div>";
                    endif;
                    ?>
                </div> <!-- painel -->

            </div> 

	

    </body>
</html>
