<!DOCTYPE html>
<html lang="es">
<head>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <meta charset="UTF-8">
    <title>Alumno</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@100;400&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="../../css/table.css">
    <link rel="stylesheet" href="../../css/style.css">
    <meta charset="UTF-8">
    <title>Document</title>
</head>
<body style="background-color:#A4A3A3;">
    <form  name="frm-modificar" method="post" action="edimod.php?id=$cod" >
<?php
include("../conectar.php");
$sql_prod = "SELECT * FROM `modalidad` where codmod='".$_GET['id']."' ";
$result_prod = $db_connect -> query($sql_prod);

if ($result_prod -> num_rows > 0) {
    while ($fila = $result_prod -> fetch_assoc() )
{
    $cod=$fila['codmod'];
    $mod=$fila['modalidad'];
    $mon=$fila['monto'];
?>
<h5>Modificar datos de la Modalidad </h5>
<div class="mx-2">
	<div class="form-row">
    	<div class="form-group col-md-2">
    	   <input type="text" class="form-control" name="text1" id="text1" placeholder="N° DNI" value="<?php echo $cod;?>">
    	</div>
    	<div class="form-group col-md-4">
    	   <input type="text" class="form-control" name="text2" id="text2" placeholder="Modalidad" value="<?php echo $mod;?>">
    	</div>
    	<div class="form-group col-md-4">
    	   <input type="text" class="form-control" name="text3" id="text3" placeholder="Monto" value="<?php echo $mon;?>">
    	</div>
</div> 
</div>    
<hr>   
        <?php } } ?><br>        

<input class="btn1 "type="submit"  value="Modificar" >
<?php
    include("../conectar.php");
    if(!empty($_POST)=="")
    {}
    else
    {
        $mcod=$_POST['text1'];
        $mmod=$_POST['text2'];
        $mmon=$_POST['text3'];
        $modi=("update modalidad set modalidad='$mmod',monto='$mmon' where codmod='$mcod'");
        $result =$db_connect -> query($modi);
        echo "MODIFICANDO";
        echo "<meta http-equiv='refresh' content='1;URL=mod.php'>";
    }
?>
</form>
</body>
</html>
    
</body>
</html>