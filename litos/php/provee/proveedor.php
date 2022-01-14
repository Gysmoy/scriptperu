<html>
    <title>  </title>
    <link href="../../css/estilospro.css" rel="stylesheet" type="text/css">
<body>
    <h2> Mantenimiento de Proveedores </h2>

<form  name="frm_man" method="post" action="proveedor.php">
<fieldset>
    <legend>D A T O S - D E L - P R O V E E D O R E S </legend>  
        <table border=1>
        <tr>
            <td>CÓDIGO</td>
            <td ><input type="text" name="txcod" class="cd" size="50"></td>
        </tr>
        <tr>
            <td>NOMBRE</td>
            <td><input type="text" name="txdes" class="cd"  size="50"></td>
        </tr>
        <tr>
            <td>CONTACTO</td>
            <td><input type="text" name="txpre" class="cd"  size="50"></td>
        </tr>
        <tr>
            <td>NOM. EMPRESA</td>
            <td><input type="text" name="txcan"  class="cd" size="50"></td>
        </tr>
        <tr>
            <td>TELEFONO</td>
            <td><input type="number" name="txtlf"  class="cd" size="50"></td>
        </tr>
            
</tr>
</table></fieldset><br> 
<fieldset>
<legend>O P C I O N E S</legend>  
<input type="submit" class="bt1" value="G U A R D A R " name="guardar">
<?php
    include '../conectar.php' ;

    if(!empty($_POST['txcod'])=="")
    {}
    else
    {
        $cod=$_POST['txcod'];
        $des=$_POST['txdes'];
        $pre=$_POST['txpre']; 
        $can=$_POST['txcan'];
        $tlf=$_POST['txtlf'];
        $var_consulta="insert into proveedor (codigo,nombre,contac,empre,telefono) values ('$cod','$des','$pre','$can','$tlf')";
        $result= $db_connect -> query($var_consulta);   
        echo "<meta http-equiv='refresh' content='1,URL=proveedor.php'>";
    }
?>
</form>

</fieldset><br>
<fieldset>
<legend>L I S T A - D E - P R O V E E D O R E S  </legend>  
<table border=1 width="100%">
        <thead>
        <tr>
            <td align="center" bgcolor="#76D7C4">OPCIONES</td>
            <td align="center" bgcolor="#76D7C4">CÓDIGO</td>
            <td align="center" bgcolor="#76D7C4">NOMBRE</td>       
            <td align="center" bgcolor="#76D7C4">CONTACTO</td>
            <td align="center" bgcolor="#76D7C4">NOM. EMPRESA</td>
            <td align="center" bgcolor="#76D7C4">TELEFONO</td>     
        </tr>
        </thead>
        <tbody>
<?php
include '../conectar.php';
$sql_prod = "SELECT * FROM `proveedor`";
$result_prod = $db_connect -> query($sql_prod);
if ($result_prod -> num_rows > 0) {
    while ( $rows = $result_prod -> fetch_assoc() ) {
        $code = $rows['codigo'];
        $desc = $rows['nombre'];
        $price = $rows['contac'];
        $cant = $rows['empre'];
        $tlf = $rows['telefono'];
        echo '
        <tr>
            <td valign="middle" align="CENTER" id="name">
            <a  href="prov_edi.php?id='.$code.' "><img src="../../img/edit.png"  title="Editar" width=40 height=25></a>
            <a  href="prov_eli.php?id='.$code.' "><img src="../../img/borrar.png"  title="borrar" width=40 height=30></a>
            </td>
            <td valign="middle" align="left" id="name">' . $code . '</td>
            <td valign="middle" align="left" id="name">' . $desc . '</td>
            <td valign="middle" align="center" id="name"> ' . $price . '</td>
            <td valign="middle" align="center">' . $cant . '</td>
            <td valign="middle" align="center">' . $tlf . '</td>
    
        </tr>
            ';
        }
    if (!empty($_POST['txcod'])=="") {
        
    }
    else{

    }
    }
    
    ?>
        </tbody>        
</table>
</fieldset>


</body>
</html>