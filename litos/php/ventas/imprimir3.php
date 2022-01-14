<!DOCTYPE html>
<html lang="es">
<head>
    <link href="../../css/estilosboleta.css" rel="stylesheet" type="text/css">
    <link href="../../css/btn.css" rel="stylesheet" type="text/css">
    <meta charset="UTF-8">
    <title>Documento</title>
    <script type="text/javascript">
    function imprSelec(muestra) {
        var ficha=document.getElementById(muestra);
        var ventimp=window.open('','_blankc')
        ventimp.document.write(ficha.innerHTML);
        ventimp.document.close();
        ventimp.print();
        ventimp.close();
    }
    </script>
</head>
<body><br>

<a href="javascript:imprSelec('muestra')" class="bt3">IMPRIMIR</a>
<a href="guardar.php" class="bt3">GUARDAR</a>
            <?php
            include '../conectar.php' ;
            $id = uniqid();
            /* crear el numero de Boleta*/
                $nbol= "select * from ventas";
                $bol = $db_connect -> query($nbol);
                while($nbol = $bol -> fetch_assoc())
                {   $nb=$nb+1;  }
                $nbb='0000' .($nb+1);              
            ?>

<div id="muestra">
<table width="75%" heigth="450px" border=0 align=center>
    <tr>
       <th width='26%' align=center><a ><img src="../../img/voletaimg.png"  width="40%"></a></th>
       <th width='42%' align=left><label class="f3" ><a>ESPECIALISTAS EN  FÚSION MARINA</a><br>
                                                CONTACTO : 982127212 - 914716189<br> 
                                                </label></th>       
       <th width='32%' align=center><fieldset><label> R.U.C N° 10448033428</label><br><br> 
        <label> FACTURA NUMERO   <?php echo $nbb; ?> </label></fieldset></th> 
    </tr>
</table>



      <?php
        include '../conectar.php';
        $sql_prod = "select * from tmpclientes";
        $res_prod = $db_connect ->query($sql_prod);

        while($fila = $res_prod -> fetch_assoc())
        {
        $cod=$fila['dni']; 
        }
        $sql_cli = "select * from clientes where dni='$cod'";
        $res_cli = $db_connect ->query($sql_cli);
        while($filac = $res_cli -> fetch_assoc())
        { 
          $dni=$filac['dni'];
          $ape=$filac['apellidos'];
          $nom=$filac['nombres'];
          $ruca=$filac['RUC'];
          $dir=$filac['dir'];
        }
      ?>

<table width="75%" align=center >   

      
    <tr>
        <th width='30%' align=left><label class="f3" >
        <fieldset><label class="f3"> 
           Sr(a) : <?php echo $nom; echo " ";  echo $ape; ?> <br>
           Dirección : <?php echo $dir; ?>  &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;  DNI : <?php echo $dni; ?> </label>
        </fieldset>
        </th>
    </tr>
    <tr>
        <th width='25%' align=center><label class="f3" >
        <fieldset><label class="f3"> 
           FECHA DE EMISIÓN : <?php ini_set('date.timezone','America/Lima'); echo date('d-m-y'); ?> &nbsp;&nbsp;&nbsp;
           HORA DE EMISIÓN : <?php ini_set('date.timezone','America/Lima'); echo date("h : i A ");?> </label>
        </fieldset>
        </th>
    </tr>  
</table><br>
    <table border="2" width="75%" height="50" align=center>
    <tr>
       <th width='10%' align=center bgcolor="#D6DBDF"> CODIGO </th>
       <th width='50%' align=center bgcolor="#D6DBDF"> DESCRIPCION </th>
       <th width='10%' align=center bgcolor="#D6DBDF"> PRECIO </th>
       <th width='10%' align=center bgcolor="#D6DBDF"> CANTIDAD</th>
       <th width='10%' align=center bgcolor="#D6DBDF"> SUB TOTAL </th>
    </tr>
    <?php
                    include '../conectar.php';
                    $sql_prod = "select * from tmpventas";
                    $res_prod = $db_connect -> query($sql_prod);
                    $tot=0;
                    while ($fila =$res_prod -> fetch_assoc())
                    {
                        $cod=$fila['codpro'];
                        $name=$fila['descripcion'];
                        $pre=$fila['precio'];
                        $can=$fila['cant'];
                        $stot=$pre*$can;
                        $tot=$tot+($pre*$can);

                        echo "<tr>";                            
                            echo "<td align=center>".$cod. "</td>";                       
                            echo "<td>".$name. "</td>";
                            echo "<td align=center >".$pre. "</td>"; 
                            echo "<td align=center >".$can. "</td>";
                            echo "<td align=center >".$stot. "</td>";
                        echo "</tr>";
                    }
            ?>
       
   </table><br>
   <?php 
   $sql_prod = "select * from tmpventas";
   $res_prod = $db_connect -> query($sql_prod);
   $total=0;
   while ($fila =$res_prod -> fetch_assoc())
   {
       $total = $total+($fila['precio']*$fila['cant']);
   }

   ?>
   <table width="100%"  >
       <tr>
           <th width='75%'></th>
           <th width='25%'>TOTAL S/. <?php echo $tot ?></th>
       </tr>
   </table>
   
      
   
</div>    
</body>
</html>