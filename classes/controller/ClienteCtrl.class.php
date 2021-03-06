<?php

class ClienteCtrl {

    private $clienteDao;
    private $result;
    private $historicoClienteCtrl;

    public function ClienteCtrl() {
        $this->clienteDao = new ClienteDAO();
        $this->historicoClienteCtrl = new HistoricoClientesCtrl();
    }

    public function getResult() {
        return $this->result;
    }

    /**
     * Fazer SELECT no BD na tabela = <b>clientes<b/>
     * @param string $campos = Campos do BD a serem pesquisados
     * @param string $termos = Termos para Filtrar a Busca no BD (WHERE, etc)
     * @return Array de Objetos do tipo --><b>Cliente</b><-- se encontrar resultados, se não retorna NULL
     */
    public function buscarBD($campos, $termos) {
        $select = $this->clienteDao->select($campos, $termos);
        //var_dump($select);
        if (!empty($select)) {

            return $this->montarObjeto($select);
        } else {
            return NULL;
        }
    }

    public function atualizarBD(Cliente $obj) {
        $filha = get_class($obj);
        if ($obj instanceof $filha) {
            $id = $obj->getId();

            foreach ((array) $obj as $campo => $valor) {
                if (!$valor == NULL || $valor == "" || $valor == "0") {
                    $campo = str_replace("\0Cliente\0", "", $campo);
                    $campo = str_replace("\0{$filha}\0", "", $campo);
                    $camposDados[] = $campo . " = '" . $valor . "'";
                }
            }

            // unset($camposDados[0]);

            $camposDados = implode(', ', $camposDados);

            if ($this->clienteDao->update($camposDados, "WHERE id = '$id' ")) {
                return TRUE;
            } else {
                return FALSE;
            }
        } else {
            return FALSE;
        }
    }

    public function mediaSatisfacao($id_cliente) {
        $pesquisaCtrl = new PesquisaPosVendaCtrl();
        return $pesquisaCtrl->mediaSatisfacao($id_cliente);
    }

    public function buscarEstado($campos, $termos) {
        return $this->clienteDao->select($campos, $termos, "estados");
    }

    public function buscarCidade($campos, $termos) {
        return $this->clienteDao->select($campos, $termos, "cidades");
    }

    /**
     * Atualizar no BD os Dados do Cliente
     * @param array $dados = Dados do cliente
     * @return boolean = Retorna True ou False
     */
    public function atualizarCliente(Array $dados, Array $dadosClienteAntigoObj) {
        $estado = $this->buscarEstado("*", "where cod_estados = '" . $dados['cod_estados'] . "'");
        $cidade = $this->buscarCidade("*", "where cod_cidades = '" . $dados['cod_cidades'] . "'");
        $dados['estado'] = $estado[0]['nome'];
        $dados['cidade'] = $cidade[0]['nome'];

        if ($dados["salvar_editar_cliente"]) {
            $dados['mostrar'] = "1";
            unset($dados["salvar_editar_cliente"]);
            $arrayFilha[] = $this->selecionaFilha($dados);
            
            if ($arrayFilha[0][1] == FALSE && $this->checkRazaoFantasia($dados) == FALSE) {
                
                //checa qualis Dados Mudarão para salvar no Log do sistema
                $stringDadosAlterados =  $this->registrarAlteracao($arrayFilha, $dadosClienteAntigoObj);

                if ($this->atualizarBD($arrayFilha[0][0])) {
                    $idCliente = $dados['id'];
                    $alteracaoCliente = "<b><span>Alterado</span></b> no Sistema:<br>{$stringDadosAlterados}";
                    LogCtrl::inserirLog($dados['id_colab_logado'], "Cliente {$dados['razao_social']} de Cod <b>{$idCliente}</b> foi {$alteracaoCliente}", "tec");
                    
                    $this->historicoClienteCtrl->inserirBD(new HistoricoClientes("", $idCliente, $alteracaoCliente, date('Y-m-d H:i:s')));
                    
                    $this->result = array("<b>OK!</b> Cliente <b>Atualizado</b> com sucesso.", WS_ACCEPT);
                    return TRUE;
                } else {
                    $this->result = array("<b>Erro!</b> Ocorreu um erro interno ao tentar Atualizar o Cliente no sistema.", WS_ERROR);
                    return FALSE;
                }
            } else {
                return FALSE;
            }
        }
    }

    /**
     * Inserir no BD os Dados de um Novo Cliente
     * @param array $dados = Array de Dados do Cliente
     * @return boolean = Retorna True ou False
     */
    public function inserirCliente(Array $dados) {
        $estado = $this->buscarEstado("*", "where cod_estados = '" . $dados['cod_estados'] . "'");
        $cidade = $this->buscarCidade("*", "where cod_cidades = '" . $dados['cod_cidades'] . "'");
        $dados['estado'] = $estado[0]['nome'];
        $dados['cidade'] = $cidade[0]['nome'];
        $dados['id'] = 0; //apenas para fazer o TESTE no metodo checkRazaoFantasia() 
        if ($dados["salvar_novo_cliente"]) {
            unset($dados["salvar_novo_cliente"]);
            
            $arrayFilha[] = $this->selecionaFilha($dados);
            if ($arrayFilha[0][1] == FALSE && $this->checkRazaoFantasia($dados) == FALSE) {
                $arrayFilha[0][0]->setDataAdd(date('Y-m-d H:i:s'));
                $arrayFilha[0][0]->setMostrar('1');
                if ($this->inserirBD($arrayFilha[0][0])) {
                    LogCtrl::inserirLog($dados['id_colab_logado'], "Cliente <b>{$dados['razao_social']}</b> <b><span>Adicionado</span></b> no Sistema", "tec");
                    $this->result = array("<b>OK!</b> Cliente <b>Adicionado</b> com sucesso.", WS_ACCEPT);
                    return TRUE;
                } else {
                    $this->result = array("<b>Erro!</b> Ocorreu um erro interno ao tentar Adicionar o Cliente no sistema.", WS_ERROR);
                    return FALSE;
                }
            } else {
                return FALSE;
            }
        }
    }

    public function enviarEmailTodosClientes(Array $dados) {
        //$ano_orc = date('Y');
        $clientes = $this->buscarBD("*", "WHERE mostrar = '1' ");

        $count = 0;
        $count2 = 0;
        $countErro = 0;
        $textoCorpoErro = "";
        foreach ($clientes as $row) {

            if (!$row->getEmailTec() == null) {
                $count2++;
                echo $count2."<br>";
                if ($count2 == 5) {
                    sleep(2);
                    $count2 = 0;
                }
                //$emailTo = array($listaEmails);
                $emailTo = array($row->getEmailTec(), $row->getEmail_adm_fin());
                $assunto = $dados['assunto'];
                $mensagem = $dados['mensagem'];
                $textoCorpo = "<div>Olá, <b>{$row->getRazaoSocial()}</b>, lembramos de você. </div><br> <div>{$mensagem}</div>";

                $emailCopiaOculta = array();
                //$emailCopiaOculta = array(EMAIL_ADMIN);
                $email2 = new EmailGenerico($emailTo, $assunto, $textoCorpo, array(), $emailCopiaOculta);

                if ($email2->enviarEmailSMTP()) {
                    $count++;
                    echo "OK => {$count}<br>";
                } else {
                    $countErro++;
                    $textoCorpoErro .= "- {$row->getId()} == {$row->getRazaoSocial()} == {$row->getEmailTec()}<br>";
                    echo "ERROr => {$row->getId()} - {$row->getRazaoSocial()}<br>";
                }
            }
        }


        $emailTo = array(EMAIL_ADMIN);
        $assunto = "Relatorio Envio Email Todos Clientes";

        $textoCorpo = "Enviado Email para <b>{$count}</b> clientes, com a seguinte mensagem: <br> <b>{$mensagem}</b> <br>";
        if ($countErro > 0) {
            $textoCorpo .= "Houve(ram) {$countErro} erro(s) ao tentar Enviar: <br> {$textoCorpoErro} <br>";
        }

        $emailCopiaOculta = array($listaEmails);
        //$emailCopiaOculta = array(EMAIL_ADMIN);
        $email2 = new EmailGenerico($emailTo, $assunto, $textoCorpo, array(), $emailCopiaOculta, 1);

        if ($email2->enviarEmailSMTP()) {
            echo "OK => Envio Relatorio!<br>";
            LogCtrl::inserirLog(0, $textoCorpo, "ad");
        } else {
            echo "ERROr => No Envio do Relatorio !<br>";
        }
    }

    //--------------------------------------------------
    //----------------PRIVATES---------------------
    //--------------------------------------------------
    private function montarObjeto($arrayDados) {
        $arrayObjColab = array();
        foreach ($arrayDados as $dado) {
            extract($dado);
            if ($tipo == "PJ") {
                $arrayObjColab[] = new ClientePJ($id, $usuario, $razao_social, $nome_fantasia, $classificacao, $tipo, $data_inclusao, $cnpj_cpf, $ie, $endereco, $bairro, $estado, $cidade, $cep, $tel, $cel, $fax, $email_tec, $email_adm_fin, $mostrar);
            } else if ($tipo == "PF") {
                $arrayObjColab[] = new ClientePF($id, $usuario, $razao_social, $nome_fantasia, $classificacao, $tipo, $data_inclusao, $cpf, $endereco, $bairro, $estado, $cidade, $cep, $tel, $cel, $fax, $email_tec, $email_adm_fin, $mostrar);
            }
        }

        return $arrayObjColab;
    }

    private function checkCNPJ(Array $dados) {
        $cnpj = $this->buscarBD("*", "WHERE cnpj_cpf = '" . Formatar::limpaCPF_CNPJ($dados['cnpj']) . "' AND mostrar = '1'");
        if (!empty($cnpj)) {
            if (count($cnpj) > 0 && $dados['id'] <> (int) $cnpj[0]->getId()) {
                $this->result = array("<b>Ops!!</b> CNPJ <b>{$dados['cnpj']}</b> já cadastrado no Sistema.", WS_ERROR);
                return TRUE;
            } else {
                return FALSE;
            }
        } else {
            return FALSE;
        }
    }

    private function checkCPF(Array $dados) {
        $consulta = $this->buscarBD("*", "WHERE cpf = '" . Formatar::limpaCPF_CNPJ($dados['cpf']) . "' AND mostrar = '1'");
        if (!empty($consulta)) {
            if (count($consulta) > 0 && $dados['id'] <> (int) $consulta[0]->getId()) {
                $this->result = array("<b>Ops!!</b> CPF <b>{$dados['cpf']}</b> já cadastrado no Sistema.", WS_ERROR);
                return TRUE;
            } else {
                return FALSE;
            }
        } else {
            return FALSE;
        }
    }

    private function checkRazaoFantasia(Array $dados) {
        $razao_social = $this->buscarBD("*", "WHERE razao_social = '" . $dados['razao_social'] . "' AND mostrar = '1'");
        $nome_fantasia = $this->buscarBD("*", "WHERE nome_fantasia = '" . $dados['nome_fantasia'] . "' AND mostrar = '1'");

        if (!empty($razao_social)) {
            if (count($razao_social) > 0 && $dados['id'] <> (int) $razao_social[0]->getId()) {
                $this->result = array("<b>Ops!!</b> Razão Social <b>{$dados['razao_social']}</b> já cadastrado no Sistema.", WS_ERROR);
                return TRUE;
            }
        }

        if (!empty($nome_fantasia)) {
            if (count($nome_fantasia) > 0 && $dados['id'] <> (int) $nome_fantasia[0]->getId()) {
                $this->result = array("<b>Ops!!</b> Nome Fantasia <b>{$dados['nome_fantasia']}</b> já cadastrado no Sistema.", WS_ERROR);
                return TRUE;
            }
        } else {
            return FALSE;
        }
    }

    private function selecionaFilha(Array $dados) {
        if (empty($dados['tipo'])) { //se tipo esta embranco é PJ se existe é PF
            $obj = new ClientePJ($dados['id'], $dados['usuario'], $dados['razao_social'], $dados['nome_fantasia'], "padrao", "PJ", "", Formatar::limpaCPF_CNPJ($dados['cnpj']), Formatar::limpaCPF_CNPJ($dados['ie']), $dados['endereco'], $dados['bairro'], $dados['estado'], $dados['cidade'], $dados['cep'], $dados['phone'], $dados['cel'], $dados['fax'], $dados['email_tec'], $dados['email_admin'], ($dados['mostrar'] ? $dados['mostrar'] : NULL));
            $flag_teste = $this->checkCNPJ($dados);
            //$array[] = array($obj, $flag_teste);
            return array($obj, $flag_teste);
        } else {
            $obj = new ClientePF($dados['id'], $dados['usuario'], $dados['razao_social'], $dados['nome_fantasia'], "padrao", "PF", "", Formatar::limpaCPF_CNPJ($dados['cpf']), $dados['endereco'], $dados['bairro'], $dados['estado'], $dados['cidade'], $dados['cep'], $dados['phone'], $dados['cel'], $dados['fax'], $dados['email_tec'], $dados['email_admin'], ($dados['mostrar'] ? $dados['mostrar'] : NULL));
            $flag_teste = $this->checkCPF($dados);
            return array($obj, $flag_teste);
        }
    }

    /**
     * Fazer INSERT no BD na tabela = logs
     * @param Log $obj = passar uma Instancia deste tipo para inserir no BD
     * @return boolean = TRUE se Sucesso ao inserir dados no BD e FALSE se houver algum problema na INSERÇÃO ou se o OBJETO não foi passado corretamente
     */
    private function inserirBD(Cliente $obj) {
        $filha = get_class($obj);
        if ($obj instanceof $filha) {

            foreach ((array) $obj as $campo => $valor) {
                $campo = str_replace("\0Cliente\0", "", $campo);
                $campo = str_replace("\0{$filha}\0", "", $campo);
                $campoArr[$campo] = $campo;
            }
            //  var_dump($campoArr);
            //unset($campoArr['id']);
            $arrObj = array_values((array) $obj);

            //unset($arrObj[0]);

            $campoArr = implode(', ', array_keys($campoArr));
            $valores = " '" . implode("','", array_values($arrObj)) . "' ";
            //var_dump($campoArr,$valores);
            //$logDao = new LogDAO();

            if ($this->clienteDao->insert($campoArr, $valores)) {
                return TRUE;
            } else {
                return FALSE;
            }
        } else {
            return FALSE;
        }
    }
    /**
     * Montar uma Nova Array com Dados do Objeto Cliente
     * @param Cliente $obj = passar uma Instancia deste tipo para inserir no BD
     * @return Array = retorna uma nova Array
     */
    private function buildArray($obj) {
        $novaArray[] = "";
        $objArray = (array) $obj[0];
        foreach ($objArray as $campo => $valor) {               
            $campo = str_replace("\0Cliente\0", "", $campo);
            $campo = str_replace("\0ClientePJ\0", "", $campo);
            $campo = str_replace("\0ClientePF\0", "", $campo);
            $novaArray[$campo] = $valor;
        }
        return $novaArray;
    }

    private function registrarAlteracao($objAlterado, $objAnterior) {
        $novosDadosClienteArr = $this->buildArray($objAlterado[0]);
        $velhorDadosClienteArr = $this->buildArray($objAnterior);
        unset($novosDadosClienteArr['mostrar']);
        unset($velhorDadosClienteArr['mostrar']);
        unset($novosDadosClienteArr['data_inclusao']);
        unset($velhorDadosClienteArr['data_inclusao']);

        $dadosAlterados = "";
        foreach ($novosDadosClienteArr as $campo => $valor) {
            if ($novosDadosClienteArr[$campo] != $velhorDadosClienteArr[$campo]) {
               
                $dadosAlterados .= "- O campo <i>" . $campo . "</i> passou de <span class=\"text-line-through\">" . ($velhorDadosClienteArr[$campo] != "" ?  $velhorDadosClienteArr[$campo] : "<i>em branco</i>") . "</span> para <span class=\"text-underline\"><b>" . ($novosDadosClienteArr[$campo] != "" ?  $novosDadosClienteArr[$campo] : "<i>em branco</i>") . "</b></span></br>";
               
            }
        }
       return $dadosAlterados;
    }

}
