<?php
    include ("../conectar.php");
    $eliminar=("truncate table tmpclientes");
    $eli = $db_connect -> query($eliminar);

    $modi=("truncate table tmpventas");
    $result=$db_connect -> query($modi);

    echo "<meta http-equiv='refresh' content='1;URL=documento.php'>";
?>