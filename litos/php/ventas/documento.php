<?php
$id = uniqid();
?>
<!DOCTYPE html>
<html lang="en">
<head>
<meta http-equiv="expires" content="0">
<meta http-equiv="Cache-Control" content="no-cache">
<meta http-equiv="Pragma" CONTENT="no-cache">
<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.15.3/css/all.css" integrity="sha384-SZXxX4whJ79/gErwcOYf+zWLeJdY/qpuqC4cAa9rOGUstPomtqpuNWT9wdPEn2fk" crossorigin="anonymous">
<script src="https://kit.fontawesome.com/e57084e9c3.js" crossorigin="anonymous"></script>
<script type="text/javascript" src="https://code.jquery.com/jquery-3.3.1.min.js"></script>
<link href="../../css/estilosventas.css?v=<?php echo $id;?>" rel="stylesheet" type="text/css">
<link href="../../css/style2.css?v=<?php echo $id;?>" rel="stylesheet" type="text/css">
<script>
    function impSelect(muestra){
    var ficha=document.getElementById(muestra)
    var ventimp=window.open('','popimp');
    ventimp.document.write(ficha.innerHTML);
    ventimp.document.close();
    ventimp.print();
    ventimp.close();
    }
    document.write('<style type="text/css">div.cp_oculta{display:none;} </style>')
    function MostrarOcultar(capa,enlace)
    {   if (document.getElementById)    {
        var aux=document.getElementById(capa).style; 
        aux.display=aux.display? "":"block";    }   }
</script>

    <input id ="button" type="button" accesskey="b" value="Button" style="display:none">
    <script type="text/javascript">
        $('body').on("keydown", function(e) { 
            if (e.ctrlKey && e.shiftKey && e.which === 66) {
               window.open("imprimir.php", "Diseño Web", "width=800, height=600") 
    
            }
        });
        $("#button").on("click", function(e) { 
            alert("You clicked button");
        }); 
    </script>

</head>
<body>

<!  crear el numero de Boleta –>
    <div> 
    <button type="button" role="link" class="bt1"
	    onclick="parent.izquierda.location.href='busprod.php'">
        <i class="fa fa-plus"></i>
		Agregar producto
	</button>  
    <button type="button" role="link" class="bt2"
	    onclick="parent.izquierda.location.href='buscli.php'">
        <i class="fa fa-search"></i>
		Buscar cliente
	</button>
    <button type="button" role="link" class="bt3"
	    onclick="parent.izquierda.location.href='nuevav.php'">
        <i class="fa fa-cart-plus"></i>
		Nueva venta
	</button>
        <button type="button" role="link" class="bt4"
	    onclick="parent.izquierda.location.href='imprimir2.php'">
        <i class="fa fa-print"></i>
		Ticket
	</button>
    <button type="button" role="link" class="bt4"
	    onclick="parent.izquierda.location.href='imprimir.php'">
        <i class="fa fa-print"></i>
		Boleta
	</button>
    <button type="button" role="link" class="bt4"
	    onclick="parent.izquierda.location.href='imprimir3.php'">
        <i class="fa fa-print"></i>
		Factura
	</button>

    </div>
   <h2>BOLETA DE VENTA </h2>
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
        <table border='0' width='60%' height='30'>            
            <th width='60'> <a href="javascript:MostrarOcultar('texto1'); " class="bt3"> <font size='6'>+ </font>Ingresar Clientes</a></th>
            <th width='30<tr>' align='center'>N-BOLETA</th>
            <td width='50' align='center'><h2> <?php echo $nbb; ?> </h2></td>
            </tr>
        </table>

    <div id="muestra">
<div class="cp_oculta" id="texto1">
<form  name="frm_man" method="post" action="documento.php">
<br>
<fieldset>
    <legend>D A T O S - D E - N U E V O - C L I E N T E S </legend>  
    <table border=1>
        <tr>
            <td>DNI</td>
            <td ><input type="number" name="txdni" class="cd" size="50"></td>
        </tr>
        <tr>
            <td>APELLIDOS</td>
            <td><input type="text" name="txape" class="cd" size="50"></td>
        </tr>
        <tr>
            <td>NOMBRES</td>
            <td><input type="text" name="txnom" class="cd" size="50"></td>
        </tr>
        <tr>
            <td>R U C</td>
            <td><input type="number" name="txtlf" class="cd" size="50"></td>
        </tr>
        <tr>
            <td>DIRECCION</td>
            <td><input type="text" name="txdir" class="cd" size="50"></td>
        </tr>          
    </table>
</fieldset>
<br> 
<fieldset>
<legend>O P C I O N E S</legend>  
<input  class="bt1" type="submit" value="INSERTAR " name="guardar">
<?php
    include '../conectar.php' ;
    if(!empty($_POST['txdni'])=="")
    {}
    else
    {
        $cod=$_POST['txdni'];
        $des=$_POST['txape'];
        $pre=$_POST['txnom']; 
        $can=$_POST['txtlf'];
        $dir=$_POST['txdir'];
        $var_consulta="insert into clientes (dni,apellidos,nombres,RUC,dir) values ('$cod','$des','$pre','$can','$dir')";
        $result= $db_connect -> query($var_consulta);  
        $eliminar = ("truncate table tmpclientes");
        $eli= $db_connect ->query($eliminar);
        $modi="insert into tmpclientes (dni) values ($cod)";
        $result= $db_connect ->query($modi);
        echo "<meta http-equiv='refresh' content='1; URL=documento.php'>"; 
    }

    
?>
</form>

</fieldset>
</div>
</div>
<br>
    <fieldset>
        <legend>Datos del Comprador</legend>
        <table border='1' width='100%' height='30'>
            <thead>
                <tr>
                    <th width='5%'>DNI</th>
                    <th width='30%'>NOMBRE</th>
                    <th width='30%'>DIRECCION</th>
                    <th width='10%'>RUC</th>
                </tr>
            </thead>
            <tbody>
            <?php
            include '../conectar.php';
            $sql_prod = "select * from tmpclientes";
            $res_prod = $db_connect ->query($sql_prod);

            while($fila = $res_prod -> fetch_assoc()){
                $cod=$fila['dni'];
            }
            $sql_cli = "select * from clientes where dni='$cod'";
            $res_cli = $db_connect ->query($sql_cli);
            while($filac = $res_cli -> fetch_assoc()) { 
                $dni=$filac['dni'];
                $nom=$filac['nombres'];
                $dire=$filac['dir'];
                $ruca=$filac['RUC'];
                echo "
                <tr>
                    <td>$dni</td>
                    <td>$nom</td>
                    <td>$dire</td>
                    <td>$ruca</td>
                </tr>
                ";
            }
            ?>
            
        </table>

<tbody>
    </fieldset>
    <br>
    <fieldset>
        <legend>Detalle de la venta</legend>   
        <table border="1" width="100%" height="75">
            <thead>
                <tr>
                    <th width='10%' align=center>ACCIÓN</th>
                    <th width='10%' align=center>CODIGO</th>
                    <th width='50%' align=center>DESCRIPCION</th>
                    <th width='10%' align=center>PRECIO UNITARIO</th>
                    <th width='10%' align=center>CANT.</th>
                    <th width='10%' align=center>SUBTOTAL</th>
                </tr>
            </thead>
            <tbody>
            <?php
            include '../conectar.php';
            $sql_prod = "select * from tmpventas";
            $res_prod = $db_connect -> query($sql_prod);
            $tot=0;
            while ($fila = $res_prod -> fetch_assoc())
            {
                $cod = str_pad($fila['codpro'], 4, '0', STR_PAD_LEFT);
                $name = $fila['descripcion'];
                $pre = number_format($fila['precio'], 2);
                $can = $fila['cant'];
                $stot = number_format($pre * $can, 2);
                $tot = $tot + ($pre * $can);

                echo "
                <tr>
                    <td align='center'>
                        <a title='Editar pedido' class='btn-op' href='prodpedidos.php?id=$cod'>
                            <i class='fa fa-edit'></i>
                        </a>
                        <a title='Eliminar pedido' class='btn-op' href='elipedidos.php?id=$cod'>
                            <i class='fa fa-trash'></i>
                        </a>
                    </td>
                    <td align='center'>$cod</td>
                    <td>$name</td>
                    <td align='center'>S/ $pre</td>
                    <td align='center'>$can</td>
                    <td align='center'>S/ $stot</td>
                </tr>
                ";
            }
            ?>
            </tbody>
            <tfoot>
            <?php 
            $sql_prod = "select * from tmpventas";
            $res_prod = $db_connect -> query($sql_prod);
            $total = 0;
            while ($fila =$res_prod -> fetch_assoc())
            {
                $total = $total+($fila['precio']*$fila['cant']);
            }
            ?>
                <tr>
                    <td colspan="4">
                    FECHA Y HORA DE EMISIÓN: 
                    <?php
                    ini_set('date.timezone','America/Lima');
                    echo date('d/m/y h:i A');
                    ?>
                    </td>
                    <td>TOTAL:</td>
                    <td>S/ <?php echo number_format($tot, 2);?></td>
                </tr>
            </tfoot>
        </table>

    </fieldset> 

    <span class="rapid">
        <p>Ctrl</p>
    </span>
    <span class="mas"> + </span>   
    <span class="rapid">
        <img src="../../img/shift.png" alt="Shift" width="40%">
    </span>
    <span class="mas"> + </span>
    <span class="rapid">
        <p>B</p>
    </span>
    <span class="mas">= Imprimir boleta</span>
 
</body>
</html>
