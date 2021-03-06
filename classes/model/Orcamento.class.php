<?php

class Orcamento {

	private $id;
        private $id_cliente;
                private $id_colab;
	private	$n_orc;
	private	$ano_orc;
	private	$colaborador_orc;
	private	$situacao_orc;
	private	$razao_social_contr;
	private	$cnpj_contr;
	private	$endereco_contr;
	private	$bairro_contr;
	private	$cidade_contr;
	private	$estado_contr;
	private	$cep_contr;
	private	$telefone_contr;
	private	$celular_contr;
	private	$email_contr;
	private	$contato_clint;
	private	$razao_social_obra;
	private	$cnpj_obra;
	private	$endereco_obra;
	private	$bairro_obra;
	private	$cidade_obra;
	private	$estado_obra;
	private	$cep_obra;
	private	$telefone_obra;
	private	$celular_obra;
	private	$email_obra;
	private	$atividade;
	private	$classificacao;
	private	$quantidade;
	private	$unidade;
	private	$descricao_servico_orc;
	private	$prazo_exec_orc;
	private	$validade_orc;
	private $pagamento_orc	;
	private $obs_orc;
	private $duvida_orc;
	private	$vr_servco_orc;
	private	$vr_material_orc;
	private	$desconto_orc;
	private	$vr_total_orc;
	private	$obra_igual_contrat;
	private	$data_adicionado_orc;
	private	$data_ultima_alteracao;
	private	$colaborador_ultim_alteracao;
	private	$data_aprovada;
	private	$data_inicio;
	private	$data_conclusao;
	private	$dias_d_aprovado;
	private	$dias_d_exec;
	private	$dias_ultrapassad;
	private	$serv_concluido;
	private	$feito_pos_entreg;
	private	$nao_conformidade;
	private	$obs_n_conformidad;
	private	$client_insatisfeito;
	private	$data_ultimo_cont_cliente;
	private $colab_ultimo_contato_client;
            private $novo_cliente;
	

	public function __construct($id = NULL, $id_cliente = NULL,  $id_colab = NULL, $n_orc = NULL, $ano_orc = NULL, $colaborador_orc = NULL, $situacao_orc = NULL, $razao_social_contr = NULL, $cnpj_contr = NULL, $endereco_contr= NULL, $bairro_contr= NULL, $cidade_contr= NULL, $estado_contr= NULL, $cep_contr= NULL, $telefone_contr = NULL, $celular_contr = NULL, $email_contr = NULL, $contato_clint = NULL, $razao_social_obra = NULL, $cnpj_obra = NULL, $endereco_obra = NULL, $bairro_obra = NULL, $cidade_obra = NULL, $estado_obra = NULL, $cep_obra = NULL, $telefone_obra = NULL, $celular_obra = NULL, $email_obra = NULL, $atividade = NULL, $classificacao = NULL, $quantidade = NULL, $unidade= NULL, $descricao_servico_orc = NULL, $prazo_exec_orc = NULL, $validade_orc = NULL, $pagamento_orc = NULL, $obs_orc = NULL, $duvida_orc = NULL, $vr_servco_orc = NULL, $vr_material_orc = NULL, $desconto_orc = NULL, $vr_total_orc = NULL, $obra_igual_contrat = NULL, $data_adicionado_orc = NULL, $data_ultima_alteracao = NULL, $colaborador_ultim_alteracao = NULL, $data_aprovada = NULL , $data_inicio = NULL, $data_conclusao = NULL, $dias_d_aprovado = NULL, $dias_d_exec = NULL, $dias_ultrapassad = NULL, $serv_concluido = NULL, $feito_pos_entreg = NULL, $nao_conformidade = NULL, $obs_n_conformidad = NULL, $client_insatisfeito = NULL, $data_ultimo_cont_cliente = NULL, $colab_ultimo_contato_client  = NULL, $novo_cliente = NULL) {
            $this->id = $id;
            $this->id_cliente = $id_cliente;
            $this->id_colab = $id_colab;
            $this->n_orc = $n_orc;
            $this->ano_orc = $ano_orc;
            $this->colaborador_orc = $colaborador_orc;
            $this->situacao_orc = $situacao_orc;
            $this->razao_social_contr = $razao_social_contr;
            $this->cnpj_contr = $cnpj_contr;
            $this->endereco_contr = $endereco_contr;
            $this->bairro_contr = $bairro_contr;
            $this->cidade_contr = $cidade_contr;
            $this->estado_contr = $estado_contr;
            $this->cep_contr = $cep_contr;
            $this->telefone_contr = $telefone_contr;
            $this->celular_contr = $celular_contr;
            $this->email_contr = $email_contr;
            $this->contato_clint = $contato_clint;
            $this->razao_social_obra = $razao_social_obra;
            $this->cnpj_obra = $cnpj_obra;
            $this->endereco_obra = $endereco_obra;
            $this->bairro_obra = $bairro_obra;
            $this->cidade_obra = $cidade_obra;
            $this->estado_obra = $estado_obra;
            $this->cep_obra = $cep_obra;
            $this->telefone_obra = $telefone_obra;
            $this->celular_obra = $celular_obra;
            $this->email_obra = $email_obra;
            $this->atividade = $atividade;
            $this->classificacao = $classificacao;
            $this->quantidade = $quantidade;
            $this->unidade = $unidade;
            $this->descricao_servico_orc = $descricao_servico_orc;
            $this->prazo_exec_orc = $prazo_exec_orc;
            $this->validade_orc = $validade_orc;
            $this->pagamento_orc = $pagamento_orc;
            $this->obs_orc = $obs_orc;
            $this->duvida_orc = $duvida_orc;
            $this->vr_servco_orc = $vr_servco_orc;
            $this->vr_material_orc = $vr_material_orc;
            $this->desconto_orc = $desconto_orc;
            $this->vr_total_orc = $vr_total_orc;
            $this->obra_igual_contrat = $obra_igual_contrat;
            $this->data_adicionado_orc = $data_adicionado_orc;
            $this->data_ultima_alteracao = $data_ultima_alteracao;
            $this->colaborador_ultim_alteracao = $colaborador_ultim_alteracao;
            $this->data_aprovada = $data_aprovada;
            $this->data_inicio = $data_inicio;
            $this->data_conclusao = $data_conclusao;
            $this->dias_d_aprovado = $dias_d_aprovado;
            $this->dias_d_exec = $dias_d_exec;
            $this->dias_ultrapassad = $dias_ultrapassad;
            $this->serv_concluido = $serv_concluido;
            $this->feito_pos_entreg = $feito_pos_entreg;
            $this->nao_conformidade = $nao_conformidade;
            $this->obs_n_conformidad = $obs_n_conformidad;
            $this->client_insatisfeito = $client_insatisfeito;
            $this->data_ultimo_cont_cliente = $data_ultimo_cont_cliente;
            $this->colab_ultimo_contato_client = $colab_ultimo_contato_client;
            $this->novo_cliente = $novo_cliente;
        }
        
        

        public function getId_cliente() {
            return $this->id_cliente;
        }

        public function getId_colab() {
            return $this->id_colab;
        }

        public function setId_cliente($id_cliente) {
            $this->id_cliente = $id_cliente;
        }

        public function setId_colab($id_colab) {
            $this->id_colab = $id_colab;
        }

                
        
        function getNovo_cliente() {
            return $this->novo_cliente;
        }

        function setNovo_cliente($novo_cliente) {
            $this->novo_cliente = $novo_cliente;
        }

        
	public function getId() {
	         return $this->id;
	}
	
	public function setId($id) {
	         $this->id = $id;
	}
	
	public function getNOrc() {
	         return $this->n_orc;
	}
	
	public function setNOrc($n_orc) {
	         $this->n_orc = $n_orc;
	}
	
	public function getAnoOrc() {
	         return $this->ano_orc;
	}
	
	public function setAnoOrc($ano_orc) {
	         $this->ano_orc = $ano_orc;
	}
	
	public function getColabOrc() {
	         return $this->colaborador_orc;
	}
	
	public function setColabOrc($colaborador_orc) {
	         $this->colaborador_orc = $colaborador_orc;
	}
	
	public function getSituacaoOrc() {
	         return $this->situacao_orc;
	}
	
	public function setSituacaoOrc($situacao_orc) {
	         $this->situacao_orc = $situacao_orc;
	}
	
	public function getRazaoSocialContrat() {
	         return $this->razao_social_contr;
	}
	
	public function setRazaoSocialContrat($razao_social_contr) {
	         $this->razao_social_contr = $razao_social_contr;
	}
	
	public function getCnpjContrat() {
	         return $this->cnpj_contr;
	}
	
	public function setCnpjContrat($cnpj_contr) {
	         $this->cnpj_contr = $cnpj_contr;
	}
	
	public function getEnderecoContrat() {
	         return $this->endereco_contr;
	}
	
	public function setEnderecoContrat($endereco_contr) {
	         $this->endereco_contr = $endereco_contr;
	}
	
	public function getBairroContrat() {
	         return $this->bairro_contr;
	}
	
	public function setBairroContrat($bairro_contr) {
	         $this->bairro_contr = $bairro_contr;
	}
	
	public function getCidadeContrat() {
	         return $this->cidade_contr;
	}
	
	public function setCidadeContrat($cidade_contr) {
	         $this->cidade_contr = $cidade_contr;
	}
	
	public function getEstadoContrat() {
	         return $this->estado_contr;
	}
	
	public function setEstadoContrat($estado_contr) {
	         $this->estado_contr = $estado_contr;
	}
	
	public function getCepContrat() {
	         return $this->cep_contr;
	}
	
	public function setCepContrat($cep_contr) {
	         $this->cep_contr = $cep_contr;
	}
	
	public function getTelContrat() {
	         return $this->telefone_contr;
	}
	
	public function setTelContrat($telefone_contr) {
	         $this->telefone_contr = $telefone_contr;
	}
	
	public function getCelContrat() {
	         return $this->celular_contr;
	}
	
	public function setCelContrat($celular_contr) {
	         $this->celular_contr = $celular_contr;
	}
	
	public function getEmailContrat() {
	         return $this->email_contr;
	}
	
	public function setEmailContrat($email_contr) {
	         $this->email_contr = $email_contr;
	}
	
	public function getContatoCliente() {
	         return $this->contato_clint;
	}
	
	public function setContatoCliente($contato_clint) {
	         $this->contato_clint = $contato_clint;
	}
	
	public function getRazaoSocialObra() {
	         return $this->razao_social_obra;
	}
	
	public function setRazaoSocialObra($razao_social_obra) {
	         $this->razao_social_obra = $razao_social_obra;
	}
	
	public function getCnpjObra() {
	         return $this->cnpj_obra;
	}
	
	public function setCnpjObra($cnpj_obra) {
	         $this->cnpj_obra = $cnpj_obra;
	}
	
	public function getEnderecoObra() {
	         return $this->endereco_obra;
	}
	
	public function setEnderecoObra($endereco_obra) {
	         $this->endereco_obra = $endereco_obra;
	}
	
	public function getBairroObra() {
	         return $this->bairro_obra;
	}
	
	public function setBairroObra($bairro_obra) {
	         $this->bairro_obra = $bairro_obra;
	}
	
	public function getCidadeObra() {
	         return $this->cidade_obra;
	}
	
	public function setCidadeObra($cidade_obra) {
	         $this->cidade_obra = $cidade_obra;
	}
	
	public function getEstadoObra() {
	         return $this->estado_obra;
	}
	
	public function setEstadoObra($estado_obra) {
	         $this->estado_obra = $estado_obra;
	}
	
	public function getCepObra() {
	         return $this->cep_obra;
	}
	
	public function setCepObra($cep_obra) {
	         $this->cep_obra = $cep_obra;
	}
	
	public function getTelObra() {
	         return $this->telefone_obra;
	}
	
	public function setTelObra($telefone_obra) {
	         $this->telefone_obra = $telefone_obra;
	}
	
	public function getCelObra() {
	         return $this->celular_obra;
	}
	
	public function setCelObra($celular_obra) {
	         $this->celular_obra = $celular_obra;
	}
	
	public function getEmailObra() {
	         return $this->email_obra;
	}
	
	public function setEmailObra($email_obra) {
	         $this->email_obra = $email_obra;
	}
	
	public function getAtividade() {
	         return $this->atividade;
	}
	
	public function setAtividade($atividade) {
	         $this->atividade = $atividade;
	}
	
	public function getClassificacao() {
	         return $this->classificacao;
	}
	
	public function setClassificacao($classificacao) {
	         $this->classificacao = $classificacao;
	}
	
	public function getQuantidade() {
	         return $this->quantidade;
	}
	
	public function setQuantidade($quantidade) {
	         $this->quantidade = $quantidade;
	}
	
	public function getUnidade() {
	         return $this->unidade;
	}
	
	public function setUnidade($unidade) {
	         $this->unidade = $unidade;
	}
	
	public function getDesciServicoObra() {
	         return $this->descricao_servico_orc;
	}
	
	public function setDesciServicoObra($descricao_servico_orc) {
	         $this->descricao_servico_orc = $descricao_servico_orc;
	}
	
	public function getPrazoExec() {
	         return $this->prazo_exec_orc;
	}
	
	public function setPrazoExec($prazo_exec_orc) {
	         $this->prazo_exec_orc = $prazo_exec_orc;
	}
	
	public function getValidade() {
	         return $this->validade_orc;
	}
	
	public function setValidade($validade_orc) {
	         $this->validade_orc = $validade_orc;
	}
	
	public function getPagamento() {
	         return $this->pagamento_orc;
	}
	
	public function setPagamento($pagamento_orc) {
	         $this->pagamento_orc = $pagamento_orc;
	}
	
	public function getObs() {
	         return $this->obs_orc;
	}
	
	public function setObs($obs_orc) {
	         $this->obs_orc = $obs_orc;
	}
	
	public function getDuvida() {
	         return $this->duvida_orc;
	}
	
	public function setDuvida($duvida_orc) {
	         $this->duvida_orc = $duvida_orc;
	}
	
	public function getVrServico() {
	         return $this->vr_servco_orc;
	}
	
	public function setVrServico($vr_servco_orc) {
	         $this->vr_servco_orc = $vr_servco_orc;
	}
	
	public function getVrMaterial() {
	         return $this->vr_material_orc;
	}
	
	public function setVrMaterial($vr_material_orc) {
	         $this->vr_material_orc = $vr_material_orc;
	}
	
	public function getDesconto() {
	         return $this->desconto_orc;
	}
	
	public function setDesconto($desconto_orc) {
	         $this->desconto_orc = $desconto_orc;
	}
	
	public function getVrTotal() {
	         return $this->vr_total_orc;
	}
	
	public function setVrTotal($vr_total_orc) {
	         $this->vr_total_orc = $vr_total_orc;
	}
	
	public function getObraIgualContrato() {
	         return $this->obra_igual_contrat;
	}
	
	public function setObraIgualContrato($obra_igual_contrat) {
	         $this->obra_igual_contrat = $obra_igual_contrat;
	}
	
	public function getDataDoOrc() {
	         return $this->data_adicionado_orc;
	}
	
	public function setDataDoOrc($data_adicionado_orc) {
	         $this->data_adicionado_orc = $data_adicionado_orc;
	}
	
	public function getDataUltimaAlteracao() {
	         return $this->data_ultima_alteracao;
	}
	
	public function setDataUltimaAlteracao($data_ultima_alteracao) {
	         $this->data_ultima_alteracao = $data_ultima_alteracao;
	}
	
	public function getColabUltimaAlteracao() {
	         return $this->colaborador_ultim_alteracao;
	}
	
	public function setColabUltimaAlteracao($colaborador_ultim_alteracao) {
	         $this->colaborador_ultim_alteracao = $colaborador_ultim_alteracao;
	}
	
	public function getDataAprovada() {
	         return $this->data_aprovada;
	}
	
	public function setDataAprovada($data_aprovada) {
	         $this->data_aprovada = $data_aprovada;
	}
	
	public function getDataInicio() {
	         return $this->data_inicio;
	}
	
	public function setDataInicio($data_inicio) {
	         $this->data_inicio = $data_inicio;
	}
	
	public function getDataConclusao() {
	         return $this->data_conclusao;
	}
	
	public function setDataConclusao($data_conclusao) {
	         $this->data_conclusao = $data_conclusao;
	}
	
	public function getDiasDAprovado() {
	         return $this->dias_d_aprovado;
	}
	
	public function setDiasDAprovado($dias_d_aprovado) {
	         $this->dias_d_aprovado = $dias_d_aprovado;
	}
	
	public function getDiasDExecucao() {
	         return $this->dias_d_exec;
	}
	
	public function setDiasDExecucao($dias_d_exec) {
	         $this->dias_d_exec = $dias_d_exec;
	}
	
	public function getDiasUltrapassado() {
	         return $this->dias_ultrapassad;
	}
	
	public function setDiasUltrapassado($dias_ultrapassad) {
	         $this->dias_ultrapassad = $dias_ultrapassad;
	}
	
	public function getServConcluido() {
	         return $this->serv_concluido;
	}
	
	public function setServConcluido($serv_concluido) {
	         $this->serv_concluido = $serv_concluido;
	}
	
	public function getFeitoPosEntrega() {
	         return $this->feito_pos_entreg;
	}
	
	public function setFeitoPosEntrega($feito_pos_entreg) {
	         $this->feito_pos_entreg = $feito_pos_entreg;
	}
	
	public function getNaoConformidade() {
	         return $this->nao_conformidade;
	}
	
	public function setNaoConformidade($nao_conformidade) {
	         $this->nao_conformidade = $nao_conformidade;
	}
	
	public function getObsNConformidade() {
	         return $this->obs_n_conformidad;
	}
	
	public function setObsNConformidade($obs_n_conformidad) {
	         $this->obs_n_conformidad = $obs_n_conformidad;
	}
	
	public function getClienteInsatisfeito() {
	         return $this->client_insatisfeito;
	}
	
	public function setClienteInsatisfeito($client_insatisfeito) {
	         $this->client_insatisfeito = $client_insatisfeito;
	}
	
	public function getDataUltimContatoCliente() {
	         return $this->data_ultimo_cont_cliente;
	}
	
	public function setDataUltimContatoCliente($data_ultimo_cont_cliente) {
	         $this->data_ultimo_cont_cliente = $data_ultimo_cont_cliente;
	}
	
	public function getColabUltimContatoCliente() {
	         return $this->colab_ultimo_contato_client;
	}
	
	public function setColabUltimContatoCliente($colab_ultimo_contato_client) {
	         $this->colab_ultimo_contato_client = $colab_ultimo_contato_client;
	}
	
	
	
	
	
	
	
	
}