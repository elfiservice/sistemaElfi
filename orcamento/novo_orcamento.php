<?php
?>
<!-- Troca Local da Obra no OR�amento  -->
<script type="text/javascript">

function retira_form_obra() {
var planet = document.getElementById("form_local_obra");
planet.innerHTML = "<input onClick=\"return mostra_form_obra()\" name=\"submit\" type=\"submit\" value=\"O contratante é diferente do Local da Obra.\"  />";
}

//window.onload = cara;

</script>
<script type="text/javascript">

function mostra_form_obra() {
var planet = document.getElementById("form_local_obra");
planet.innerHTML = "            <input onClick=\"return retira_form_obra()\" name=\"submit\" type=\"submit\" value=\"Os dados da contratante são os mesmos da Obra.\"  /> \n\
                <table border=\"0\"> \n\
                                <tbody> \n\
                                    <tr align=\"left\"> \n\
                                      <td><label for=\"razao_social2\">Razao Social:</label></br> \n\
                                        <input name=\"razao_social2\" id=\"razao_social2\" size=\"60\" maxlength=\"255\"> \n\
                                      </td> \n\
                                      <td><label for=\"cnpj2\">CNPJ:</label></br> \n\
                                        <input name=\"cnpj2\" id=\"cnpj2\" alt=\"cnpj\" size=\"20\" maxlength=\"20\"> \n\
                                    </td> \n\
                                </tr> \n\
                                  <tr align=\"left\"> \n\
                                    <td><label for=\"endereco2\">Endereco:</label></br> \n\
                                    <input name=\"endereco2\" id=\"endereco2\" size=\"60\" maxlength=\"255\"></td> \n\
                                </tr> \n\
                                <tr align=\"left\"> \n\
                                    <td><label for=\"bairro2\">Bairro:</label></br> \n\
                                    <input name=\"bairro2\" id=\"bairro2\" size=\"20\" maxlength=\"255\"> \n\
                                    </td> \n\
                                    <td><label for=\"city2\">Cidade:</label></br> \n\
                                    <input name=\"city2\" id=\"city2\" size=\"20\" maxlength=\"255\"> \n\
                                    </td> \n\
                                    <td><label for=\"estado2\">Estado:</label></br>\n\
                                        <input name=\"estado2\" id=\"estado2\" size=\"20\" maxlength=\"255\" > \n\
                                                    </td>\n\
                                    </tr> \n\
                                <tr align=\"left\"> \n\
                                    <td><label for=\"cep2\">CEP:</label></br> \n\
                                    <input name=\"cep2\" id=\"cep2\" alt=\"cep\" size=\"20\" maxlength=\"15\"> \n\
                                  </td> \n\
                                     <td><label for=\"tel2\">Telefone:</label></br> \n\
                                    <input name=\"tel2\" id=\"tel2\" size=\"20\" alt=\"phone\" maxlength=\"15\"> \n\
                                    </td> \n\
                                     <td><label for=\"cel2\">Celular:</label></br> \n\
                                    <input name=\"cel2\" id=\"cel2\" size=\"20\" alt=\"cel\" maxlength=\"15\"> \n\
                                    </td> \n\
                                    </tr> \n\
                                <tr align=\"left\"> \n\
                                    <td><label for=\"email_orc2\">Email:</label></br> \n\
                                    <input name=\"email_orc2\" id=\"email_orc2\" size=\"20\" maxlength=\"255\"> \n\
                                    </td> \n\
                                </tr> \n\
                                </tbody> \n\
                </table> \n\
                ";
}

//window.onload = cara;

</script>
<!-- FIM  Troca Local da Obra no OR�amento  -->

<!-- Busca cliente para Auto Preenchimento  -->
<script type="text/javascript" src="./js/buscacliente/ajax.js"></script>
<script type="text/javascript">

	var ajax = new sack();
	var currentClientID=false;
	function getClientData()
	{
		var clientId = document.getElementById('clientID').value;
		if(clientId!=currentClientID){
			currentClientID = clientId
			ajax.requestFile = 'getClient.php?getClientId='+clientId;	// Specifying which file to get
			ajax.onCompletion = showClientData;	// Specify function that will be executed after file has been found
			ajax.runAJAX();		// Execute AJAX function			
		}
		
	}
	
	function showClientData()
	{
		var formObj = document.forms['clientForm'];	
		eval(ajax.response);
	}
	
	
	function initFormEvents()
	{
		document.getElementById('clientID').onblur = getClientData;
		document.getElementById('clientID').focus();
	}
	
	
	window.onload = initFormEvents;
	</script>
<!-- FIM Busca cliente para Auto Preenchimento  -->


<!--  Auto Rize no Text Area do Descrição servicos e Observação Orçamento  -->
<script type="text/javascript">
var observe;
if (window.attachEvent) {
    observe = function (element, event, handler) {
        element.attachEvent('on'+event, handler);
    };
}
else {
    observe = function (element, event, handler) {
        element.addEventListener(event, handler, false);
    };
}
function init () {
    var text = document.getElementById('text');
    function resize () {
        text.style.height = 'auto';
        text.style.height = text.scrollHeight+'px';
    }
    /* 0-timeout to get the already changed text */
    function delayedResize () {
        window.setTimeout(resize, 0);
    }
    observe(text, 'change',  resize);
    observe(text, 'cut',     delayedResize);
    observe(text, 'paste',   delayedResize);
    observe(text, 'drop',    delayedResize);
    observe(text, 'keydown', delayedResize);

    text.focus();
    text.select();
    resize();
}



</script>
<script type="text/javascript">
var observe2;
if (window.attachEvent) {
    observe2 = function (element, event, handler) {
        element.attachEvent('on'+event, handler);
    };
}
else {
    observe2 = function (element, event, handler) {
        element.addEventListener(event, handler, false);
    };
}
function init2 () {
    var text = document.getElementById('text2');
    function resize () {
        text.style.height = 'auto';
        text.style.height = text.scrollHeight+'px';
    }
    /* 0-timeout to get the already changed text */
    function delayedResize () {
        window.setTimeout(resize, 0);
    }
    observe(text, 'change',  resize);
    observe(text, 'cut',     delayedResize);
    observe(text, 'paste',   delayedResize);
    observe(text, 'drop',    delayedResize);
    observe(text, 'keydown', delayedResize);

    text.focus();
    text.select();
    resize();
}



</script>
<!--  FIMM Auto Rize no Text Area do Descrição servicos e Observação Orçamento  -->


<!-- MAscaras em campos valores-->
<script src="./js/jquery.js" type="text/javascript"></script>
<script type="text/javascript" src="./js/mascara/jquery.meio.mask.js"
	charset="utf-8"></script>
<script type="text/javascript">
  (function($){
    // call setMask function on the document.ready event
      $(function(){
        $('input:text').setMask();
      }
    );
  })(jQuery);
</script>
<!-- FIM  MAscaras em campos -->


<!--  SOMA campos  valores -->
<script type="text/javascript"
	src="http://ajax.googleapis.com/ajax/libs/jquery/1.6.2/jquery.min.js"></script>
<!--// load jQuery Plug-ins //-->
<script type="text/javascript" src="./js/calcular/jquery.calculation.js"></script>
<script type="text/javascript">

	var bIsFirebugReady = (!!window.console && !!window.console.log);
	$(document).ready(
		function (){
/*			
			$.Calculation.setDefaults({
				onParseError: function(){
					this.css("backgroundColor", "#cc0000")
				}
				, onParseClear: function (){
					this.css("backgroundColor", "");
				}
			});
*/

			// automatically update the "#totalSum" field every time
			// the values are changes via the keyup event

			$("input[name^=sum]").sum("keyup", "#totalSum");
			
			// automatically update the "#totalAvg" field every time
			// the values are changes via the keyup event
			$("input[name^=avg]").avg({
				bind:"keyup"
				, selector: "#totalAvg"
				// if an invalid character is found, change the background color
				, onParseError: function(){
					this.css("backgroundColor", "#cc0000")
				}
				// if the error has been cleared, reset the bgcolor
				, onParseClear: function (){
					this.css("backgroundColor", "");
				}
			});


			// automatically update the "#minNumber" field every time
			// the values are changes via the keyup event
			$("input[name^=min]").min("keyup", "#numberMin");

			// automatically update the "#minNumber" field every time
			// the values are changes via the keyup event
			$("input[name^=max]").max("keyup", {
				selector: "#numberMax"
				, oncalc: function (value, options){
					// you can use this to format the value
					$(options.selector).val(value);
				}
			});

			// this calculates the sum for some text nodes

			$("#idTotalTextSum").click(

				function (){
					// get the sum of the elements

					var sum = $(".textSum").sum();



					// update the total
					$("#totalTextSum").text("$" + sum.toString());

				}

			);

			// this calculates the average for some text nodes

			$("#idTotalTextAvg").click(

				function (){

					// get the average of the elements
					var avg = $(".textAvg").avg();
					// update the total
					$("#totalTextAvg").text(avg.toString());

				}

			);

		}

	);
	
	function recalc(){
		$("[id^=total_item]").calc(
			// the equation to use for the calculation
			"qty * price",
			// define the variables used in the equation, these can be a jQuery object
			{
				qty: $("input[name^=qty_item_]"),
				price: $("[id^=price_item_]")
			},
			// define the formatting callback, the results of the calculation are passed to this function
			function (s){
				// return the number as a dollar amount
				return "$" + s.toFixed(2);
			},
			// define the finish callback, this runs after the calculation has been complete
			function ($this){
				// sum the total of the $("[id^=total_item]") selector
				var sum = $this.sum();
				
				$("#grandTotal").text(
					// round the results to 2 digits
					"$" + sum.toFixed(2)
				);
			}
		);
	}

	</script>
<!-- fim SOMA CAMPOS em campos -->



<!-- Teste Campos obrigatorios -->
<script language="JavaScript">


/***********************************************
 * Required field(s) validation v1.10- By NavSurf
* Visit Nav Surf at http://navsurf.com
* Visit http://www.dynamicdrive.com/ for full source code
***********************************************/

function formCheck(formobj){
	// Enter name of mandatory fields
	var fieldRequired = Array("razao_social", "endereco", "city", "tel", "razao_social2", "endereco2", "city2", "tel2", "descricao_servicos", "execucao_orc", "validade_orc", "pagamento_orc", "duvida_orc", "sum_vr_servico_orc", "atividade1", "classificacao1", "unidade1", "quantidade1", "contato_clint");
	// Enter field description to appear in the dialog box
	var fieldDescription = Array("Razão Social  do Contratante", "Endereço do Contratante", "Cidade do Contratante", "Telefone ou Celular do contratante", "Razão Social  da obra", "Endereço da obra", "Cidade da obra", "Telefone ou Celular da obra", "Descrição dos serviços", "Prazo de execução", "Validade do orçamento", "Condições de pagamento", "Dúvidas", "Valor do serviço", "Atividade do serviço", "Classificação", "Unidade", "quantidade", "Nome de contato do cliente");
	// dialog message
	var alertMsg = "Por favor completar os campos:\n";

	var l_Msg = alertMsg.length;

	for (var i = 0; i < fieldRequired.length; i++){
		var obj = formobj.elements[fieldRequired[i]];
		if (obj){
			switch(obj.type){
				case "select-one":
					if (obj.selectedIndex == -1 || obj.options[obj.selectedIndex].text == "" ){
						alertMsg += " - " + fieldDescription[i] + "\n";
					}
					break;
				case "select-multiple":
					if (obj.selectedIndex == -1){
						alertMsg += " - " + fieldDescription[i] + "\n";
					}
					break;
				case "text":
				case "textarea":
					if (obj.value == "" || obj.value == null || obj.value == "0,00"){
						alertMsg += " - " + fieldDescription[i] + "\n";
					}
					break;
				default:
			}
			if (obj.type == undefined){
				var blnchecked = false;
				for (var j = 0; j < obj.length; j++){
					if (obj[j].checked){
						blnchecked = true;
					}
				}
				if (!blnchecked){
					alertMsg += " - " + fieldDescription[i] + "\n";
				}
			}
		}
	}

	if (alertMsg.length == l_Msg){
		return true;
	}else{
		alert(alertMsg);
		return false;
	}
}

</script>
<!-- Fim Teste Campos obrigatorios -->

<h3 class="">Novo Orçamento</h3>

<div class="" style="text-align: center;">



<form name="clientForm" method="post" action="salvar_novo_orc.php"
		onsubmit="return formCheck(this);">

		<fieldset>
		<legend>
		<h3>Contratante</h3>
		</legend>
		<table border="0">
		<tbody>

		<tr align="left">
		<td><label for="clientID">Cliente:</label></br> <select
		id="clientID" name="clientID">
		<option value=""></option>
		<?php
		$sql = "SELECT razao_social FROM clientes ORDER BY razao_social";
		$res = mysql_query ( $sql );
		while ( $row = mysql_fetch_assoc ( $res ) ) {
			echo '<option id="clientID" value="' . $row ['razao_social'] . '">' . $row ['razao_social'] . '</option>';
		}
		?>
                                                            
                                           </select></td>
							</tr>
							<tr align="left">
								<td><label for="razao_social">Razão Social:</label></br> <input
									name="razao_social" id="razao_social" size="60" maxlength="255">
								</td>

								<td><label for="cnpj">CNPJ:</label></br> <input name="cnpj"
									id="cnpj" alt="" size="20" maxlength="255"></td>
							</tr>
							<tr align="left">
								<td><label for="endereco">Endereço:</label></br> <input
									name="endereco" id="endereco" size="60" maxlength="255"></td>
							</tr>
							<tr align="left">
								<td><label for="bairro">Bairro:</label></br> <input
									name="bairro" id="bairro" size="20" maxlength="255"></td>

								<td><label for="city">Cidade:</label></br> <input name="city"
									id="city" size="20" maxlength="255"></td>
								<td><label for="estado">Estado:</label></br> <input
									name="estado" id="estado" size="20" maxlength="255"></td>

							</tr>
							<tr align="left">

								<td><label for="cep">CEP:</label></br> <input name="cep"
									id="cep" size="20" maxlength="15"></td>
								<td><label for="tel">Telefone:</label></br> <input name="tel"
									id="tel" size="20" maxlength="15"></td>
								<td><label for="cel">Celular:</label></br> <input name="cel"
									id="cel" size="20" maxlength="15"></td>


							</tr>
							<tr align="left">

								<td><label for="email_orc">Email:</label></br> <input
									name="email_orc" id="email_orc" size="20" maxlength="255"></td>



							</tr>
						</tbody>
					</table>
				</fieldset>

				<fieldset>
					<legend>
						<h3>Contato</h3>
					</legend>


					<input id="contato_clint" name="contato_clint" size="80"
						maxlength="100" />


				</fieldset>



				<fieldset>
					<legend>
						<h3>Local da obra</h3>
					</legend>

					<div id="form_local_obra">
						<input onClick="return retira_form_obra()" name="submit"
							type="submit" value="Os dados da contratante é o mesmo da Obra." />

						<table border="0">
							<tbody>


								<tr align="left">
									<td><label for="razao_social2">Razão Social:</label></br> <input
										name="razao_social2" id="razao_social2" size="60"
										maxlength="255"></td>

									<td><label for="cnpj2">CNPJ:</label></br> <input name="cnpj2"
										id="cnpj2" size="20" alt="cnpj" maxlength="22"></td>
								</tr>
								<tr align="left">
									<td><label for="endereco2">Endereço:</label></br> <input
										name="endereco2" id="endereco2" size="60" maxlength="255"></td>
								</tr>
								<tr align="left">
									<td><label for="bairro2">Bairro:</label></br> <input
										name="bairro2" id="bairro2" size="20" maxlength="255"></td>

									<td><label for="city2">Cidade:</label></br> <input name="city2"
										id="city2" size="20" maxlength="255"></td>
									<td><label for="estado2">Estado:</label></br> <input
										name="estado2" id="estado2" size="20" maxlength="255"></td>

								</tr>
								<tr align="left">

									<td><label for="cep2">CEP:</label></br> <input name="cep2"
										id="cep2" alt="cep" size="20" maxlength="12"></td>
									<td><label for="tel2">Telefone:</label></br> <input name="tel2"
										id="tel2" size="20" alt="phone" maxlength="15"></td>
									<td><label for="cel2">Celular:</label></br> <input name="cel2"
										id="cel2" size="20" alt="cel" maxlength="15"></td>


								</tr>
								<tr align="left">

									<td><label for="email_orc2">Email:</label></br> <input
										name="email_orc2" id="email_orc2" size="20" maxlength="255"></td>



								</tr>
							</tbody>
						</table>

					</div>
				</fieldset>

				<fieldset>
					<legend>
						<h3>Classificação da Atividade</h3>
					</legend>

					<table border="0">
						<tbody>



							<tr align="left">
								<td><label for="atividade" size="20">Atividade</label></td>

								<td><label for="classificacao">Classificação:</label></td>

								<td><label for="quantidade">Quantidade:</label></td>
								<td><label for="unidade">Unidade:</label></td>

							</tr>
							<tr align="left">

								<td><select id="" name="atividade1">
										<option name="" value=""></option>
                                                    <?php
			$sql = "SELECT * FROM orc_atividades ORDER BY atividade";
			$res = mysql_query ( $sql );
			while ( $row = mysql_fetch_assoc ( $res ) ) {
				echo '<option id="" value="' . utf8_encode ( $row ['atividade'] ) . '" >' . utf8_encode ( $row ['atividade'] ) . '</option>';
			}
			?>
                                                       
                                         </select></td>
								<td><select id="" name="classificacao1">
										<option value=""></option>
                                                    <?php
			$sql = "SELECT * FROM orc_classificacao_ativid ORDER BY classificacao";
			$res = mysql_query ( $sql );
			while ( $row = mysql_fetch_assoc ( $res ) ) {
				echo '<option id="" value="' . utf8_encode ( $row ['classificacao'] ) . '" >' . utf8_encode ( $row ['classificacao'] ) . '</option>';
			}
			?>
                                                       
                                         </select></td>
								<td><input name="quantidade1" id="" size="10" maxlength="10"></td>
								<td><select id="" name="unidade1">
										<option value=""></option>
                                                    <?php
			$sql = "SELECT * FROM orc_unidades ORDER BY unidade";
			$res = mysql_query ( $sql );
			while ( $row = mysql_fetch_assoc ( $res ) ) {
				echo '<option id="" value="' . utf8_encode ( $row ['unidade'] ) . '" >' . utf8_encode ( $row ['unidade'] ) . '</option>';
			}
			?>
                                                       
                                         </select></td>
							</tr>
						</tbody>
					</table>
				</fieldset>


				<fieldset>
					<legend>
						<h3>Descrição dos Serviços</h3>
					</legend>


					<textarea onfocus=""
						style="height: 10em; width: 100%;" id="text" name="descricao_servicos"></textarea>


				</fieldset>

				<fieldset>
					<legend>
						<h3>Condições</h3>
					</legend>

					<table border="0">

						<tr align="left">
							<td><label for="execucao_orc" size="20"> Prazo execução</label>

							</td>

							<td><label for="validade_orc">Validade</label></td>

							<td><label for="pagamento_orc">Pagamento</label></td>

						</tr>
						<tr align="left">
							<td><input name="execucao_orc" id="execucao_orc" size="5"
								maxlength="3"> dias</td>

							<td><input name="validade_orc" id="validade_orc" size="5"
								maxlength="3"> dias</td>

							<td><input name="pagamento_orc" id="pagamento_orc" size="80"
								maxlength="80"></td>

						</tr>
					</table>

				</fieldset>


				<fieldset>
					<legend>
						<h3>Observações</h3>
					</legend>


					<textarea onfocus="init2();" rows="1" cols="100"
						style="height: 1em;" id="text2" name="observacoes_servico"></textarea>


				</fieldset>

				<fieldset>
					<legend>
						<h3>Em caso dúvida / Negociações</h3>
					</legend>

					<input name="duvida_orc" id="duvida_orc" size="50" maxlength="50">

				</fieldset>

				<fieldset>
					<legend>
						<h3>Valor</h3>
					</legend>

					<table border="0">

						<tr align="left">
							<td><label for="vr_servico_orc" size="20"> Valor do serviço</label>

							</td>

							<td><label for="vr_material_orc">Valor do material</label></td>



							<td><label for="total_orc">Total da proposta</label></td>

						</tr>
						<tr align="left">
							<td><input onchange="soma11()" name="sum_vr_servico_orc"
								id="vr_servico_orc" alt="decimal" size="15" maxlength="15"></td>

							<td><input onchange="soma11()" name="sum_vr_material_orc"
								id="vr_material_orc" alt="decimal" size="15" maxlength="15"></td>

							<td>R$ <input type="text" name="totalSum" id="totalSum" value=""
								size="15" readonly="readonly" />
							</td>


						</tr>
					</table>

				</fieldset>

				<table border="0">

					<tr align="left">
						<td><input type="submit" value="Salvar novo Orçamento"
							name="salvar_orc" /> <input type="hidden"
							value="<?php echo date('Y'); ?>" name="ano_atual_orc"
							hidden="hidden" /> <input type="hidden" name="usuario"
							value="<?php echo $logOptions_id; ?>" readonly="readonly" /></td>



					</tr>

				</table>
			</form>

		</div>	
		
	