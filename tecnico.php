<?php
include "checkuserlog.php";
require 'classes/Config.inc.php';


if (!isset($_SESSION ['idx'])) {
    if (!isset($_COOKIE ['idCookie'])) {
        include_once 'conectar.php';
    }
} else {

    $dyn_www = $_SERVER ['HTTP_HOST'];

    $menu = filter_input(INPUT_GET, 'id_menu', FILTER_DEFAULT);
//    if (isSet($_GET ['id_menu'])) {
//
//        $menu = $_GET ['id_menu'];
//    }
    ?>


    <!doctype html>
    <!--[if lt IE 7]> <html class="no-js ie6 oldie" lang="pt"> <![endif]-->
    <!--[if IE 7]>    <html class="no-js ie7 oldie" lang="pt"> <![endif]-->
    <!--[if IE 8]>    <html class="no-js ie8 oldie" lang="pt"> <![endif]-->
    <!--[if gt IE 8]><!-->
    <html class="no-js" lang="pt">
        <!--<![endif]-->
        <head>
            <meta charset="utf-8">
            <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
            <title>Sistema ELFI | Técnico</title>

            <meta name="description" content="">
            <meta name="author" content="Elfi Service">

            <meta name="viewport" content="width=device-width,initial-scale=1">
            <!--                        <link rel="stylesheet" href="../css/bootstrap.min.css">-->
            <link rel="stylesheet" href="css/w3.css">
            <link rel="stylesheet" href="estilos.css">



            <!-- Mostra colaborador Logado -->
            <?php //include 'includes/javascripts/mostra_colab_logado.php'; ?>

            <?php require 'includes/javascripts/menu_vertical_escoder_mostrar.php'; ?>
            <?php require 'includes/javascripts/mascaras_campos_valores_monetario.php'; ?>
            <!-- Tabela  -->
            <?php include_once 'includes/javascripts/tabela_no_head.php'; ?> 



        </head>
        <body>


            <div
                style="background: url(imagens/topo1.png) repeat-x; padding: 5px 0px 30px 0px;">
            </div>

            <h2 style="text-align: center;">Setor Técnico</h2>
            <div style="">

                <div id="colaborador_logado">
                    <?php require './includes/colaborador_logado.inc.php'; ?>
                </div>

                <div style="float: right">
                    <?php echo $logOptions; ?>
                </div>
            </div>

            <?php
            $tipo_conta = $_SESSION['tipo_user'];

            if ($tipo_conta == "ad" || $tipo_conta == "tec" || $tipo_conta == "fi_tec" || $tipo_conta == "tec_rh" || $tipo_conta == "fi_tec_rh") {
                ?>

                <div style="margin: 20px 0px 20px 0px;">
                    <div class="barra_menu"
                         style="background: #012B8B; text-align: center; padding: 5px 0px 0px 0px;">
                    </div>

                    <div id="menu_paginas">
                        <ul>
                            <!-- 				<li><a href="#" class="menuanchorclass myownclass" -->
                            <!-- 					rel="tecnico_cliente">Cliente</a></li> -->
                            <li><a href="tecnico.php?id_menu=cliente" class="" rel="">Clientes</a></li>
                            <li><a href="tecnico.php?id_menu=orcamento" class="" rel="">Orcamentos</a></li>
                            <!-- 				<li><a href="#" class="menuanchorclass myownclass" -->
                            <!-- 					rel="tecnico_orcamento">Orçamento</a></li> -->
                        </ul>
                    </div>

                    <div class="barra_menu"
                         style="background: #012B8B; text-align: center; padding: 5px 0px 0px 0px;">
                    </div>
                </div>

                <div style="margin: 20px 0px 20px 0px;">

                    <?php
                    /* ------------ Manter Cliente --------------- */

                    if ($menu == "cliente") {

                        require_once 'cliente/manterCliente.php';
                        exit();
                    }

                    if ($menu == "novo_cliente") {
                        include 'cliente/novo_cliente.php';
                        exit();
                    }

                    if ($menu == "salvar_novo_cliente") {
                        require 'cliente/incluir/salvar_novo_cliente.php';
                        exit();
                    }

                    if ($menu == "editar_cliente") {

                        include 'cliente/editar_cliente.php';
                        exit();
                    }

                    if ($menu == "salvar_editar_cliente") {
                        require 'cliente/alterar/salvar_alteracao_cliente.php';
                        exit();
                    }

                    if ($menu == "excluir_cliente") {

                        include 'cliente/excluir_cliente.php';
                        exit();
                    }

                    if ($menu == "salvar_excluir_cliente") {

                        include 'cliente/excluir/salvar_excluir_cliente.php';
                        exit();
                    }

                    if ($menu == "perfil_cliente") {
                        require './cliente/perfil.php';
                        exit();
                    }
                    /* ------------ FIM Manter Cliente --------------- */

                    /* ------------- Manter Orçamentos ----------------- */
                    if ($menu == "orcamento") {

                        require 'orcamento/manterOrcamentos.php';
                        exit();
                    }

                    if ($menu == "editar_orcamento") {
                        require 'orcamento/editar_orcamento.php';
                        exit();
                    }

                    if ($menu == "salvar_editar_orcamento") {
                        require 'orcamento/alterar/salvar_editar_orc.php';
                        exit();
                    }

                    if ($menu == "novo_orcamento") {
                        require './orcamento/novo_orcamento.php';
                        exit();
                    }

                    if ($menu == "salvar_novo_orc") {
                        require './orcamento/incluir/salvar_novo_orc.php';
                        exit();
                    }

                    if ($menu == "excluir_orcamento") {
                        require './orcamento/excluir_orcamento.php';
                        exit();
                    }

                    if ($menu == "relatorios_orc") {
                        require './orcamento/relatorios/relatorios_orc.php';
                        exit();
                    }

                    if ($menu == "relatorios_cliente") {
                        require './orcamento/relatorios/relatorios_cliente.php';
                        exit();
                    }

                    if ($menu == "relatorios_atividade") {
                        require './orcamento/relatorios/relatorios_atividade.php';
                        exit();
                    }

                    if ($menu == "relatorios_pos_venda") {
                        require './orcamento/relatorios/relatorios_pos_venda.php';
                        exit();
                    }

                    if ($menu == "historico_completo_orc") {
                        require './orcamento/historico_completo_orc.php';
                        exit();
                    }
                    /* ------------- FIM Manter Orçamentos ----------------- */

                    /* ------------- Manter Orçamentos APROVADOS ----------------- */
                    if ($menu == "acompanhar_orcamentos") {
                        require './orcamento/aprovados/acompanhar_orcamentos.php';
                        exit();
                    }

                    if ($menu == "editar_orc_aprovado") {
                        require './orcamento/aprovados/editar_orc_aprovado.php';
                        exit();
                    }
                    //Manter Historico ORC Aprovados
                    if ($menu == "hitorico_orc_aprovado") {
                        require './orcamento/aprovados/hitorico_orc_aprovado.php';
                        exit();
                    }

                    if ($menu == "editar_historico_orc_aprovado") {
                        require './orcamento/aprovados/editar_historico_orc_aprovado.php';
                        exit();
                    }

                    if ($menu == "excluir_historico_orc_aprovado") {
                        require './orcamento/aprovados/excluir_historico_orc_aprovado.php';
                        exit();
                    }


                    if ($menu == "orc_aprovado_por_mes") {
                        require './orcamento/aprovados/orc_aprovado_por_mes.php';
                        exit();
                    }
                } else {
                    //echo "Acesso restrito.";
                    echo "<div  style=\"padding: 10px 0px 10px 0px;\">";
                    WSErro("Acesso Restrito.", E_USER_WARNING);
                    echo"</div>";
                }
                ?>	


                <footer> </footer>

        </body>
    </html>
<?php }
?>