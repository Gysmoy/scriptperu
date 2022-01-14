<!DOCTYPE html>
<html lang="es">
<head>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <meta charset="UTF-8">
    <title>Usuario</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@100;400&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="../../../css/table.css">
    <link rel="stylesheet" href="../../../css/style.css">
    <meta charset="UTF-8">
    <title>Document</title>
</head>
<body style="background-color:#A4A3A3;">
    <form  name="frm-modificar" method="post" action="ediusu.php?id=$cod" >
<?php
include("../../conectar.php");
$sql_prod = "SELECT * FROM `usuario` where dni='".$_GET['id']."' ";
$result_prod = $db_connect -> query($sql_prod);

if ($result_prod -> num_rows > 0) {
    while ($fila = $result_prod -> fetch_assoc() )
{
    $cod=$fila['dni'];
    $nom=$fila['nombre'];
    $ape=$fila['apellido'];
    $can=$fila['login'];
    $pas=$fila['pass'];
    $tip=$fila['tipo'];
?>
<form  name="frm_man" method="post" action="ediusu.php">
<h5>Datos del Usuario </h5>
<div class="mx-2">
	<div class="form-row">
	
    	<div class="form-group col-md-2">
    	   <input type="text" class="form-control" name="text1" id="text1" placeholder="N° DNI" value="<?php echo $cod; ?>">
    	</div>
    	<div class="form-group col-md-4">
    	   <input type="text" class="form-control" name="text2" id="text2" placeholder="Nombre del Usuario" value="<?php echo $nom; ?>">
    	</div>
    	<div class="form-group col-md-4">
    	   <input type="text" class="form-control" name="text3" id="text3" placeholder="Apellido del Usuario" value="<?php echo $ape; ?>">
    	</div>
    </div>
    <div class="form-row">
       <div class="form-group col-md-2">
    	   <input type="text" class="form-control" name="text4" id="text4" placeholder="Login de Acceso" value="<?php echo $can; ?>">
       </div>
       <div class="form-group col-md-2">
    	   <input type="password" class="form-control" name="text5" id="text5" placeholder="Password" value="<?php echo $pas; ?>">
       </div>
       <div class="form-group col-md-2">
           <select name="text6" size="1" id="text6" class="form-control" placeholder="Tipo">
			<option value="0" selected="selected"><?php echo $tip; ?></option>
			<option value="1">Administrador</option>
			<option value="2">Usuario</option>
		</select>
    	   
       </div>
   </div>
   
</div>    
<hr>
<?php } } ?><br>
<input class="btn1 "type="submit"  value="Modificar" >
<?php
    include("../../conectar.php");
    if(!empty($_POST)=="")
    {}
    else
    {
        $dni=$_POST['text1'];
        $nom=$_POST['text2'];
        $ape=$_POST['text3'];
        $log=$_POST['text4'];
        $pas=$_POST['text5'];
        $tip=$_POST['text6'];
        $modi=("update usuario set nombre='$nom',apellido='$nom',login='$log', pass='$pas', tipo='$tip' where dni='$dni'");
        $result =$db_connect -> query($modi);
        echo "MODIFICANDO";
        echo "<meta http-equiv='refresh' content='1;URL=../usu.php'>";
    }
?>
</form>
</body>
</html>
    
</body>
</html>