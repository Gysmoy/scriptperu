<html>
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
        <link href="../../css/estilosventas.css?v=<?php echo $id;?>" rel="stylesheet" type="text/css">
    <link href="../../css/botones.css" rel="stylesheet" type="text/css" />
    <link href="../../css/popup.css" rel="stylesheet" type="text/css" /> 
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">

    <!--para ocultar y mostrar divs -->
    <script languaje="Javascript">   
    document.write('<style type="text/css">div.cp_oculta{display: none;}</style>');  
    function MostrarOcultar(capa,enlace)  
    {      if (document.getElementById)   {  var aux = document.getElementById(capa).style;  
            aux.display = aux.display? "":"block";  
    } }  
    </script>
    <!--para imprimir -->
    <script type="text/javascript">
    function imprSelec(muestra)
    { var ficha=document.getElementById(muestra);var ventimp=window.open('','popimpr');ventimp.document.write(ficha.innerHTML);
    ventimp.document.close(); ventimp.print(); ventimp.close();
    }
    </script>

</head>
<body style="background-color:#D6DAD9;">

    <div class="mx-2">
        <div style=" width:75%px; margin:auto; border:1px solid #39a0e5; padding:8px 8px 8px 8px; background-color:#fff;" >
            <div class="my-2 d-flex justify-content-center">
                <div class="mx-1">
                    <a href="javascript:imprSelec('muestra')"  class="btn btn-outline-success" > Imprimir </a>
                </div>
            </div>
        <hr>
<div id="muestra">       
    
<?php
include("../conectar.php");
$sut=0;
$suma=0;

$fven= "select DISTINCT fecha from ventas ";
$fecven = $db_connect -> query($fven);
while($row = $fecven -> fetch_assoc())
{ 	
    $grupfec=($row['fecha']);
    echo $grupfec;
        
echo "<table  width='100%' >
		<thead class='thead-dark'>
		   <tr class='text-center'>
		   <th scope='col' width=10%>Num. Doc</th>
           <th scope='col' width=20%>Fecha</th>
		   <th scope='col' width=10%>Hora</th>
		   <th scope='col' width=10%>Monto</th>
		   <th scope='col' width=10%>DNI_Cli</th>
		   <th scope='col' width=10%>DNI_Vendedor</th>
		  </tr>
		</thead>";
        
    $cven= "select DISTINCT * from ventas where fecha = '$grupfec' ";
    $conven = $db_connect -> query($cven);
    while($row = $conven -> fetch_assoc())
    {   $t=$t+1;  
        $ccc=($row['coddoc']);
        $fec=($row['fecha']);
        $num=($row['numdoc']);
        $hor=($row['hora']);
        $mon=($row['montot']);
        $dnc=($row['dni']);
        $dnv=($row['vendedor']);
        $sut=($row['montot'])+$sut;

echo "<tr>";
echo "<b><font color='#0040FF' face='Century Gothic' > $cen </font></b><br>";
echo "<td height='30' align='center'> ";  
echo "<a href='#popup?id=$num'>"; echo $num; echo "</a> </td>   
    <td height='30' align='center'> "; echo $fec; 
echo "</td>
    <td align='right'>"; echo $hor;	echo"  </td>
    <td align='center'>"; echo $mon; echo "  </td>
	<td align='center'>"; echo $dnc; echo "  </td>
    <td align='center'>"; echo $dnv; echo "  </td>";
echo "
    <div id='popup?id=$num' class='overlay'>
    <div id='popupBody'>
        <h4>Detalle de Venta</h4>
        <a id='cerrar' href='#'>&times;</a>
        <div class='popupContent'>
                <hr>";
    // Datos de la Boleta encabezado           
    echo "Lito's <br>"; echo "ESPECIALISTAS EN FÚSION MARINA <br>";
    echo "CONTACTO : 982127212 - 914716189 <br>"; echo "R.U.C N° 10448033428 <hr>";
    echo "BOLETA NUMERO"; $f=$num; echo $num;
    echo "<br>Fecha : ";
    echo "Cliente:"; 
    echo "Dirección:"; 
    echo "D.N.I.: <hr>"; 
    
    // Datos de la Boleta cuerpo  
    echo "Cod  Descripcion  Sub Total <hr>";
    
    $dven= "select * from detalleven where coddoc='$ccc'";
    $detven = $db_connect -> query($dven);
    while($row3 = $detven -> fetch_assoc())
    {
         $detcod=($row3['codpro']);
         $detpre=($row3['precio']);
         $detcan=($row3['canti']);
         $dettot=($row3['canti'])*($row3['precio']);
         $suma=$suma+$dettot;
         echo $detcod. "&emsp;"; 
         echo $detpre. "&emsp;"; 
         echo $detcan. "&emsp;"; 
         echo $dettot; echo "<br>";
    }
        echo "<hr> Total &emsp;";
        echo $suma. "  Nuevos Soles.";
    
    echo "</div></div> </div>";  

    } 
echo "</tr></table>";    

}
?>

<hr>
    Total Recaudado : <b> <?php echo $sut; ?> Nuevos Soles </b>
<hr>
 ©  <b> <font size='2' face='Century Gothic'> 2021 </b> </font>

</div>	  
</div>
</div>
</body>
</html>