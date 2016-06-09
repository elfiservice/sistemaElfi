<?php
require './../classes/Config.inc.php';
?>
<html><script language="JavaScript">
    //VALIDAÇÃO DA DATA 
    function VerificaData(digData) {
        var bissexto = 0;
        var data = digData;
        var tam = data.length;
        if (tam == 10) {
            var dia = data.substr(0, 2)
            var mes = data.substr(3, 2)
            var ano = data.substr(6, 4)
            if ((ano > 1900) || (ano < 2100)) {
                switch (mes) {
                    case '01':
                    case '03':
                    case '05':
                    case '07':
                    case '08':
                    case '10':
                    case '12':
                        if (dia <= 31) {
                            alert("A Data " + data + " OK!");
                            return true;
                        }
                        break
                    case '04':
                    case '06':
                    case '09':
                    case '11':
                        if (dia <= 30) {
                            
                            alert("A Data " + data + " OK!");
                            return true;
                        }
                        break
                    case '02':
                        /* Validando ano Bissexto / fevereiro / dia */
                        if ((ano % 4 == 0) || (ano % 100 == 0) || (ano % 400 == 0)) {
                            bissexto = 1;
                        }
                        if ((bissexto == 1) && (dia <= 29)) {
                            alert("A Data " + data + " OK!");
                            return true;
                        }
                        if ((bissexto != 1) && (dia <= 28)) {
                            alert("A Data " + data + " OK!"); 
                            return true;
                        }
                        break
                }
            }
        }
        document.getElementById("data").value = "";
        alert("A Data " + data + " e invalida!");
        return false;
    }</script>
    <body>
        
        <?php
        $tete = filter_input(INPUT_POST, 'data');
        echo $tete;
        ?>
        
        Digite a data no seu nascimento:
        <form method="POST" action="teste.php" target="_self" name="frm" >
            <INPUT type=text NAME="data" id="data" SIZE=10 MAXLENGTH=10 onblur=" return VerificaData(this.value);" >
            <input type="submit" value="enviar" name="submit"/>
        </form>   					
    </body></html>