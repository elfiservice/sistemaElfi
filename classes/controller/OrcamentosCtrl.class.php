<?php 

// include '../classes/dao/OrcamentoDAO.class.php';
// include '../classes/model/Orcamento.class.php';

class OrcamentoCtrl{
	 private $OrcDao;

	 
	public function OrcamentoCtrl(){
	 	$this->OrcDao = new OrcamentoDAO();
	
	 }
	 
	public function nDeOrcPorUsuario($nomeUsuarioLogado){
		
		return $this->OrcDao->buscarOrcamentosPorUsuario($nomeUsuarioLogado);
	}
	
	public function nOrcNAprovadoPorUsuarioAcompanhando($nomeUsuarioLogado){
		return $this->OrcDao->buscarHistoricoOrcNAprovadosPorUser($nomeUsuarioLogado);
	}
	
	public function nOrcAprovadoPorUsuarioAcompanhando($nomeUsuarioLogado){
		return $this->OrcDao->buscarHistoricoOrcAprovadoPorUser($nomeUsuarioLogado);
	}
	
	public function nOrcUsuarioAcompanhando($nomeUsuarioLogado){
		return $this->OrcDao->burcarNOrcAcompanhando($nomeUsuarioLogado);
	}
	
	public function atualizarOrcamento($ocamentoObj){
		$arrayResultAtualizacao=[];
		if($ocamentoObj instanceof Orcamento){
			
			$arrayItensOrc = [
					"n_orc" => $ocamentoObj->getNOrc(),
					"ano_orc" => $ocamentoObj->getAnoOrc(),
					"colaborador_orc" => $ocamentoObj->getColabOrc(),
					"situacao_orc" => $ocamentoObj->getSituacaoOrc(),
                                                                                           "razao_social_contr"=>$ocamentoObj->getRazaoSocialContrat(),
                                                                                            "cnpj_contr"=>$ocamentoObj->getCnpjContrat(),
                                                                                            "endereco_contr"=>$ocamentoObj->getEnderecoContrat(),
                                                                                            "bairro_contr"=>$ocamentoObj->getBairroContrat(),
                                                                                            "cidade_contr"=>$ocamentoObj->getCidadeContrat(),
                                                                                            "estado_contr"=>$ocamentoObj->getEstadoContrat(),
                                                                                            "cep_contr"=>$ocamentoObj->getCepContrat(),
                                                                                            "telefone_contr"=>$ocamentoObj->getTelContrat(),
                                                                                            "celular_contr"=>$ocamentoObj->getCelContrat(),
                                                                                            "email_contr"=>$ocamentoObj->getCelContrat(),
                                                                                            "contato_clint"=>$ocamentoObj->getContatoCliente(),
                                                                                            "razao_social_obra"=>$ocamentoObj->getRazaoSocialObra(),
                                                                                            "cnpj_obra"=>$ocamentoObj->getCnpjObra(),
                                                                                            "endereco_obra"=>$ocamentoObj->getEnderecoObra(),
                                                                                            "bairro_obra"=>$ocamentoObj->getBairroObra(),
                                                                                            "cidade_obra"=>$ocamentoObj->getCidadeObra(),
                                                                                            "estado_obra"=>$ocamentoObj->getEstadoObra(),
                                                                                            "cep_obra"=>$ocamentoObj->getCepObra(),
                                                                                            "telefone_obra"=>$ocamentoObj->getTelObra(),
                                                                                            "celular_obra"=>$ocamentoObj->getCelObra(),
                                                                                            "email_obra"=>$ocamentoObj->getEmailObra(),
                                                                                            "atividade"=>$ocamentoObj->getAtividade(),
                                                                                            "classificacao"=>$ocamentoObj->getClassificacao(),
                                                                                            "quantidade"=>$ocamentoObj->getQuantidade(),
                                                                                            "unidade"=>$ocamentoObj->getUnidade(),
                                                                                            "descricao_servico_orc"=>$ocamentoObj->getDesciServicoObra(),
                                                                                            "prazo_exec_orc"=>$ocamentoObj->getPrazoExec(),
                                                                                            "validade_orc"=>$ocamentoObj->getValidade(),
                                                                                            "pagamento_orc"=>$ocamentoObj->getPagamento(),
                                                                                            "obs_orc"=>$ocamentoObj->getObs(),
                                                                                            "duvida_orc"=>$ocamentoObj->getDuvida(),
                                                                                            "vr_servco_orc"=>$ocamentoObj->getVrServico(),
                                                                                            "vr_material_orc"=>$ocamentoObj->getVrMaterial(),
                                                                                            "desconto_orc"=>$ocamentoObj->getDesconto(),
                                                                                            "vr_total_orc"=>$ocamentoObj->getVrTotal(),
                                                                                            "obra_igual_contrat"=>$ocamentoObj->getObraIgualContrato(),
                                                                                            "data_adicionado_orc"=>$ocamentoObj->getDataDoOrc(),
                                                                                            "data_ultima_alteracao"=>$ocamentoObj->getDataUltimaAlteracao(),
                                                                                            "colaborador_ultim_alteracao"=>$ocamentoObj->getColabUltimaAlteracao(),
                                                                                            "data_aprovada"=>$ocamentoObj->getDataAprovada(),
                                                                                            "data_inicio"=>$ocamentoObj->getDataInicio(),
                                                                                            "data_conclusao"=>$ocamentoObj->getDataConclusao(),
                                                                                            "dias_d_aprovado"=>$ocamentoObj->getDiasDAprovado(),
                                                                                            "dias_d_exec"=>$ocamentoObj->getDiasDExecucao(),
                                                                                            "dias_ultrapassad"=>$ocamentoObj->getDiasUltrapassado(),
                                                                                            "serv_concluido"=>$ocamentoObj->getServConcluido(),
                                                                                            "feito_pos_entreg"=>$ocamentoObj->getFeitoPosEntrega(),
                                                                                            "nao_conformidade"=>$ocamentoObj->getNaoConformidade(),
                                                                                            "obs_n_conformidad"=>$ocamentoObj->getObsNConformidade(),
                                                                                            "client_insatisfeito"=>$ocamentoObj->getClienteInsatisfeito(),
                                                                                            "data_ultimo_cont_cliente"=>$ocamentoObj->getDataUltimContatoCliente(),
                                                                                            "colab_ultimo_contato_client"=>$ocamentoObj->getColabUltimContatoCliente(),
                                                                                            "novo_cliente"=>$ocamentoObj->getNovo_cliente()
			
			];
			
                     
			$contador=1;			
			foreach ($arrayItensOrc as $campoDb=>$itemOrc){
				if(!$itemOrc == "" || !$itemOrc == null){
					if($contador == 1){
						$campoDados = "{$campoDb}='{$itemOrc}'";
						$arrayResultAtualizacao[$campoDb]="atualizado para {$itemOrc}";
						$contador++;
					} else {
						$campoDados .= ",{$campoDb}='{$itemOrc}'";
						$arrayResultAtualizacao[$campoDb]="atualizado para {$itemOrc}";
						$contador++;
					}
					//extract($itemArray);
					
					
				}else{
					$arrayResultAtualizacao[$campoDb]='';
				}
			}
			
			
			if($this->OrcDao->update($ocamentoObj->getId(), $campoDados)){
                                                                        $arrayResultAtualizacao["resultado"]='OK, atualizado!';
			}else{
				$arrayResultAtualizacao["resultado"]='Erro ao tentar atualizar!!';
			}
			
			
			
		}else{
			$arrayResultAtualizacao["resultado"]='Erro, Objeto nao e valido!';
		}
		
		return $arrayResultAtualizacao;
	}
	
	public function buscarOrcamentos($campos,$termos) {
		$orcamentosDao = $this->OrcDao->select($campos, $termos);
                                    return $orcamentosDao;  
                  }
                  
                  public function buscarOrcamentoPorId($campos,$termos){
                      
                 
                      $orcamentoDao2 = $this->OrcDao->select($campos, $termos);
                      if(!$orcamentoDao2 == "" || !$orcamentoDao2 == null){
                       $orcamentoDao2 = $orcamentoDao2[0];
                        extract($orcamentoDao2);
                        
                      return  new Orcamento($id, 
                                $n_orc, 
                                $ano_orc, 
                                $colaborador_orc, 
                                $situacao_orc, 
                                $razao_social_contr, 
                                $cnpj_contr, 
                                $endereco_contr, $bairro_contr, $cidade_contr, $estado_contr, $cep_contr, $telefone_contr, $celular_contr, $email_contr, $contato_clint, $razao_social_obra, $cnpj_obra, $endereco_obra, $bairro_obra, $cidade_obra, $estado_obra, $cep_obra, $telefone_obra, $celular_obra, $email_obra, $atividade, $classificacao, $quantidade, $unidade, $descricao_servico_orc, $prazo_exec_orc, $validade_orc, $pagamento_orc, $obs_orc, $duvida_orc, $vr_servco_orc, $vr_material_orc, $desconto_orc, $vr_total_orc, $obra_igual_contrat, $data_adicionado_orc, $data_ultima_alteracao, $colaborador_ultim_alteracao, $data_aprovada, $data_inicio, $data_conclusao, $dias_d_aprovado, $dias_d_exec, $dias_ultrapassad, $serv_concluido, $feito_pos_entreg, $nao_conformidade, $obs_n_conformidad, $client_insatisfeito, $data_ultimo_cont_cliente, $colab_ultimo_contato_client, $novo_cliente);
                      }else{
                          return "";
                      }
                  }

                                    public function listaAtividades() {
		return $this->OrcDao->selectAtividades();
	}
	
	public function listarClassificacao(){
		return $this->OrcDao->selectClassificacao();
	}
	
	public function listarUnidades(){
		return $this->OrcDao->selectUnidade();
	}
}

?>