<?php
// include '../classes/util/Conexao.class.php';
// require '../classes/util/Read.class.php';
// require '../classes/util/Update.class.php';


class OrcamentoDAO {
	
	public function buscarOrcamentosPorUsuario($usuarioLogado){
		$sql = mysql_query("SELECT * FROM orcamentos WHERE 	colaborador_orc='$usuarioLogado'") or die (mysql_error());
		$n_linhas = mysql_num_rows($sql);
		return $n_linhas;
	}
	
	public function buscarHistoricoOrcNAprovadosPorUser($usuarioLogado){
		$sql = mysql_query("SELECT * FROM historico_orc_n_aprovado WHERE colab_elfi='$usuarioLogado'") or die (mysql_error());
		$n_linhas = mysql_num_rows($sql);
		return $n_linhas;		
	}
	
	public function buscarHistoricoOrcAprovadoPorUser($usuarioLogado){
		$sql = mysql_query("SELECT * FROM historico_orc_aprovado WHERE 	colaborador='$usuarioLogado'") or die (mysql_error());
		$n_linhas = mysql_num_rows($sql);
		return $n_linhas;
	}
	
	public function burcarNOrcAcompanhando($usuarioLogado){
		$sql = mysql_query("SELECT * FROM orcamentos WHERE 	colab_ultimo_contato_client='$usuarioLogado'") or die (mysql_error());
		$n_linhas = mysql_num_rows($sql);
		return $n_linhas;
	}
	
// 	public function atualizarOrcamentoDao($idOrc,$campoOrc,$campoDB){
// 		if(mysql_query("UPDATE orcamentos SET $campoDB = '$campoOrc' WHERE id ='$idOrc'")){
// 			return true;
// 		}else {return false;}
			
// 	}
	
	public function atualizarOrcamentoDao($idOrc, $camposDados){
		$update = new Update();
		$update->ExecUpdate("orcamentos", $camposDados, "WHERE id ='$idOrc'");
		return $update->getResultado();	
	}
	
	public function buscarOrcamentosDAO($campos,$termos) {
		$read = new Read();
		$read->ExecRead($campos, "orcamentos", $termos);
		return $read->getResultado();
	}
}
?>