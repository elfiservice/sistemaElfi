

<?php
 require "../Config/config_sistema.php"; 
 include_once "../classes/util/Formatar.class.php";
 

if(isset($_GET['getClientId'])){  
  $res = mysql_query("SELECT * FROM clientes WHERE razao_social='".$_GET['getClientId']."'") or die(mysql_error());
  //var_dump(mysql_fetch_array($res));
  $inf = mysql_fetch_array($res);
  if($inf != null){
     // var_dump($inf);
   
    echo "formObj.razao_social.value = '".$inf["razao_social"]."';\n";    
    //echo "formObj.cnpj.value = '".Formatar::formatTelCnpjCpf($inf["cnpj_cpf"])."';\n";    
    echo "formObj.cnpj.value = '".$inf["cnpj_cpf"]."';\n";    
    echo "formObj.endereco.value = '".$inf["endereco"]."';\n";
    echo "formObj.bairro.value = '".$inf["bairro"]."';\n";     
  

    echo "formObj.cep.value = '".$inf["cep"]."';\n";
    echo "formObj.tel.value = '".$inf["tel"]."';\n";    
    echo "formObj.cel.value = '".$inf["cel"]."';\n";       
    echo "formObj.email_orc.value = '".$inf["email_tec"]."';\n";      
    

        echo  utf8_encode("formObj.city.value = '".$inf["cidade"]."';\n");    
    echo  utf8_encode("formObj.estado.value = '".$inf["estado"]."';\n");    
    
  }else{
    echo "formObj.razao_social.value = '';\n";    
    echo "formObj.cnpj.value = '';\n";    
    echo "formObj.endereco.value = '';\n";
    echo "formObj.bairro.value = '';\n";    
    echo "formObj.cep.value = '';\n";    
    echo "formObj.city.value = '';\n";    
    echo "formObj.estado.value = '';\n";      
    echo "formObj.tel.value = '';\n";    
    echo "formObj.cel.value = '';\n";    
    echo "formObj.email_orc.value = '';\n";      
  }    
}
?>