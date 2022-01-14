<html>
    <title> P R O D U C T O S </title>
    <link href="../../css/estilospro.css" rel="stylesheet" type="text/css">
    <link href="../../css/btn.css" rel="stylesheet" type="text/css">
    <link href="../../css/estilosventas.css?v=<?php echo $id;?>" rel="stylesheet" type="text/css">
<body>
    <h3>CARTA</h3>
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
        $var_consulta="insert into productos (codigo,descri,precio,canti) values ('$cod','$des','$pre','$can')";
        $result= $db_connect -> query($var_consulta);   
        echo "<meta http-equiv='refresh' content='1,URL=productos.php' >";
    }
?>
</form>

</fieldset><br>
<fieldset>
<legend>L I S T A - D E - P R O D U C T O S </legend>  
<table border=1 width="100%">
        <thead>
        <tr>
            <th>CÓDIGO</th>
            <th>DESCRIPCIÓN</th>       
            <th>PRECIO</th>
        </tr>
        </thead>
        <tbody>
<?php
include 'conectar.php';
$sql_prod = "SELECT * FROM `productos`";
$result_prod = $db_connect -> query($sql_prod);
if ($result_prod -> num_rows > 0) {
    while ( $rows = $result_prod -> fetch_assoc() ) {
        $code = $rows['codigo'];
        $desc = $rows['descri'];
        $price = $rows['precio'];
        $cant = $rows['canti'];
        echo '
        <tr>
        <td valign="middle" align="left" id="name">' . $code . '</td>
        <td valign="middle" align="left" id="name">' . $desc . '</td>
        <td valign="middle" align="center" id="name">S/. ' . $price . '</td>
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