<!DOCTYPE html>
<html lang="es">
<head>
    <link rel="stylesheet" href="../../../css/table.css">
    <link rel="stylesheet" href="../../../css/style.css">
    <meta charset="UTF-8">
    <title>Eliminar</title>
</head>
<body >
<form  name="frm-eliminar" method="post" action="eliusu.php?id=$cod" >
    <?php
    include "../../conectar.php";
    $codi=$_GET['id'];
    $sql_d="DELETE FROM `usuario` WHERE dni='$codi'";
    $delete = $db_connect -> query($sql_d);
    ?>
    <div align="center"><img src="../../../img/delete.gif" width=400></div>
    <meta http-equiv='refresh' content='1.5,URl=../usu.php'>
</form>
</body>
</html>