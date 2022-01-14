<!DOCTYPE html>
<html lang="es">
<head>
    <link href="../../css/style.css" rel="stylesheet" type="text/css">
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Crear Cuenta</title>
</head>
<body>
    <form  name="frm_man" method="post" action="crearlogin.php">
        <div class="text">
         <h3> Ingrese sus Datos </h3>
         <label> DNI </label>
         <input type="number" name="dni" placeholder="Ingrese Dni Valido">
         <label> Nombre </label>
         <input type="text" name="nom" placeholder="Ejem: Restobar">
         <label> Apellido </label>
         <input type="text" name="ape" placeholder="Ejem: Lito's">
         <label> Acceso </label>
         <input type="text" name="acc" placeholder="Ejem: Restobar13">
         <label> Contraseña </label>
         <input type="password" name="pas" placeholder="Ejem: Litos101">
<div class="btn">
<button type="submit" name="crear">Crear Cuenta</button>
</div>       
<?php
include '../conectar.php' ;
if(!empty($_POST['dni'])=="")
{}
else
{
    $dni=$_POST['dni'];
    $nom=$_POST['nom'];
    $ape=$_POST['ape']; 
    $acc=$_POST['acc'];
    $pas=$_POST['pas'];
    $tip=2;
    $consulta="insert into usuario (dni,nombre,apellido,login,pass,tipo) 
                values ('$dni','$nom','$ape','$acc','$pas','$tip')";
    $result= $db_connect -> query($consulta);
    echo "<meta http-equiv='refresh' content='0.5,URL=../../index.php' >";
    }
?>
</div>
</form>
</body>
</html>