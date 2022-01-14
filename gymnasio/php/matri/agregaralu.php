<?php
    include("../conectar.php");
    $eliminar = ("truncate table tmpalumno");
    $eli= $db_connect ->query($eliminar);

    $codi=$_GET['id'];
    $modi="insert into tmpalumno (dni) values ($codi)";
    $result= $db_connect ->query($modi);
    echo "<meta http-equiv='refresh' content='2; URL=matricula.php'>";
?>