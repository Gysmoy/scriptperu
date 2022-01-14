<?php
    include("../conectar.php");
    $eliminar = ("truncate table tmpmatri");
    $eli= $db_connect ->query($eliminar);

    $codi=$_GET['id'];

    $sql_mod = "select * from modalidad where codmod='$codi'";
    $res_mod = $db_connect -> query($sql_mod);
    while ($fila =$res_mod -> fetch_assoc())
    {
        $moda=$fila['modalidad'];
        $fini=$fila[''];
        $ffin=$fila[''];
        $mon=$fila['moto'];
    }
    
    $modi="insert into tmpmatri (codmod) values ($codi)";
    $result= $db_connect ->query($modi);
    echo "<meta http-equiv='refresh' content='2; URL=matricula.php'>";
?>

