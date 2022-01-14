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

        /* Datos del Cliente*/
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

<div id="muestra">
<table width="590px" border=0 align=center>
    <tr>
        <td>
            Lito's <br>
            ESPECIALISTAS EN  FÚSION MARINA <br>
            CONTACTO : 982127212 - 914716189<br>
             R.U.C N° 10448033428<br>
            <hr>
            BOLETA NUMERO   <?php echo $nbb; ?><br>
            Fecha  : <?php echo date('d-m-y'); ?>
            Hora : <?php echo date("h : i A "); ?><br>
            Cliente: <?php echo $nom; echo " ";  echo $ape; ?><br>
            Dirección : <?php echo $dir; ?>   <br>
            DNI    : <?php echo $dni; ?><br>
            <br>
        </td>
    <hr>
    </tr>    
</table>



<table width="75%" align=center >   

      
</table><br>
    <table border="0" width="590px" align=center>
    <tr>
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
   <table width="590px"  >
       <tr>
           <th width='75%'></th>
           <th width='25%'>TOTAL S/. <?php echo $tot ?></th>
       </tr>
   </table>
   
      
   
</div>    
</body>
</html>