<?php
    include("../conectar.php");
    $eliminar = ("truncate table tmpclientes");
    $eli= $db_connect ->query($eliminar);

    $codi=$_GET['id'];
    $modi="insert into tmpclientes (dni) values ($codi)";
    $result= $db_connect ->query($modi);
    echo "<meta http-equiv='refresh' content='2; URL=documento.php'>";
?>