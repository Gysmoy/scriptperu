<!DOCTYPE html>
<html lang="es">
<head>
    <link rel="stylesheet" href="../../../css/table.css">
    <link rel="stylesheet" href="../../../css/style.css">
    <meta charset="UTF-8">
    <title>Eliminar</title>
</head>
<body >
<form  name="frm-eliminar" method="post" action="eli_matri.php?id=$cod" >
    <?php
    include "../../conectar.php";
    $codi=$_GET['id'];
    $sql_d="DELETE FROM `matricula` WHERE nmatric='$codi'";
    $delete = $db_connect -> query($sql_d);

    $sql_d="DELETE FROM `detallematri` WHERE nmatri='$codi'";
    $delete = $db_connect -> query($sql_d);
    ?>
    <div align="center"><img src="../../../img/delete.gif" width=400></div>
    <meta http-equiv='refresh' content='1.5,URl=../matricula.php'>

</form>
</body>
</html>