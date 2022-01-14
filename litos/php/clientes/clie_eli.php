<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>C L I E N T E  - E L I M I N A D O </title>
    <style>
body {
    background-color: #DFE6EC;
}
</style>
</head>
<body >
    <?php
    include "../conectar.php";
    $codi=$_GET['id'];
    $sql_d="DELETE FROM `clientes` WHERE dni='$codi'";
    $delete = $db_connect -> query($sql_d);
    ?>
    <div align="center"><img src="../../img/delete.gif" width=400></div>
    <meta http-equiv='refresh' content='3.5,URl=clientes.php'>
</body>
</html>