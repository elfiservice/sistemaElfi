<?php

require './../classes/Config.inc.php';

$orcCtrl = new OrcamentoCtrl();
$orc = $orcCtrl->buscarOrcamentos(" id, razao_social_contr", "");


$clienteCtrl = new ClienteCtrl();
$clientes = $clienteCtrl->buscarCliente("*", "");
//var_dump($clientes);

foreach ($clientes as $linha){
  // var_dump($linha);
    
    //echo $linha['razao_social']."<br>";
    $count = 0;
    $countCheck = 0;
    foreach ($orc as $linhaORC){
        //var_dump($linhaORC);

        
        
        if($linha['razao_social'] == $linhaORC['razao_social_contr'] ){
          //  echo "- ".$linhaORC['razao_social_contr']."<br>";
            $count++;
            $orcmento = new Orcamento($linhaORC['id'], $linha['id'] , "", "", "", "", "", "", "", "", "", "", "", "", "", "", "", "", "", "", "", "", "", "", "", "", "", "", "", "", "", "", "", "", "", "", "", "", "", "", "", "", "", "", "", "", "", "", "", "", "", "", "", "", "", "", "", "", "", "");
            
//$orcCtrl = new OrcamentoCtrl();
            $orcAtualizado = $orcCtrl->atualizarOrcamento($orcmento);
                       // var_dump($orcAtualizado);
//           // exit;
            if($orcAtualizado[0]){
                $countCheck++;
            }
            echo "{$linha['razao_social'] } ID {$linha['id']} =  ORC {$linhaORC['razao_social_contr']} ID {$linhaORC['id']} -> tem {$count} orcamentos e foram Atualizados {$countCheck} <br>";
        }
       
    }
     
     //var_dump($linhaORC);

    
}