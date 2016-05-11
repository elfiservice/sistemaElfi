<?php 
include "../checkuserlog.php";
include_once "../Config/config_sistema.php";

if (!isset($_SESSION['idx'])) { //testa se a sess�o existe
	if (!isset($_COOKIE['idCookie'])) {

		//include_once '../conectar.php';
		//header("location: ../index.php");
		echo "Você não esta logado!";
	}
} else {
	
		$ano_atual = date('Y');
	
		$id_historico = "";
		if(isSet ($_GET['id_historico']) && $_GET['id_historico'] <> null) {
			$id_historico = $_GET['id_historico'];

		}else{
			echo"Ocorreu um erro na requisição do parametro id_historico!";
			exit;
		}

		
		include_once '../includes/sql_dados_hist_orc_n_aprov_por_id.php';
?>

<!doctype html>
<!--[if lt IE 7]> <html class="no-js ie6 oldie" lang="pt"> <![endif]-->
<!--[if IE 7]>    <html class="no-js ie7 oldie" lang="pt"> <![endif]-->
<!--[if IE 8]>    <html class="no-js ie8 oldie" lang="pt"> <![endif]-->
<!--[if gt IE 8]><!--> <html class="no-js" lang="pt"> <!--<![endif]-->
<head>
    <meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
        <title>Sistema ELFI | Técnico</title>
      
	<meta name="description" content="">
	<meta name="author" content="Elfi Service">
	<meta name="viewport" content="width=device-width,initial-scale=1">
        <link rel="stylesheet" href="../estilos.css">
</head>
<body>
<div  style="background: url(../imagens/topo1.png) repeat-x;  padding:5px 0px 30px 0px;"></div>
 <div>
	<h2><a href="javascript:window.history.go(-1)">Histórico Orçamento não Aprovado</a> -> Excluir</h2>
</div>
<hr>
<div id="">
	<h3> Deseja realmente excluir esse historico?</h3>

</div>

<fieldset>
	<legend><h3>Dados</h3></legend>
		<form action="salvar/historico_excluido.php" method="post" enctype="multipart/form-data" name="formEditarOrcNAprovado">
			<table>
				<tr>
					<td>Data do contato:</td>
					<td><b><?php echo date('d/m/Y à\s H:m', strtotime($linha_orc_n_aprovado->dia_do_contato));?></b></td>
				</tr>
				<tr>
					<td>Conversado:</td>
					<td><textarea  rows="3" cols="50" id="text" name="conversado" readonly="readonly" ><?php echo strip_tags($linha_orc_n_aprovado->conversa); ?></textarea></td>
				</tr>
			</table>			
			
			<input style="cursor: pointer;  color:#012B8B; border:1px solid #569ABC;" type="submit" name="excluir" value="Excluir" id="excluir" style="font: 13px verdana, arial, helvetica, sans-serif; background-color: #D5F8D8;"  />
        	
  			<input type="hidden" name="id_usuario_BD" value="<?php echo $linha_orc_n_aprovado->id_colab;  ?>" readonly="readonly" />
        	<input type="hidden" name="id_usuario_logado" value="<?php echo $logOptions_id;  ?>" readonly="readonly" />
			<input type="hidden" name="id_orc" value="<?php echo $linha_orc_n_aprovado->id_orc; ?>" readonly="readonly" />
			<input type="hidden" name="id_historico" value="<?php echo $linha_orc_n_aprovado->id; ?>" readonly="readonly" />				
		</form >
</fieldset>
</body>
</html>



<?php }?>