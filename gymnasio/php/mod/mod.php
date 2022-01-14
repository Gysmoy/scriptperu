<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Modalidad</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <meta charset="UTF-8">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@100;400&display=swap" rel="stylesheet">
    <link href="../../css/estilospro.css" rel="stylesheet" type="text/css">
    <link href="../../css/btn.css" rel="stylesheet" type="text/css">
    <link href="../../css/estilosventas.css" rel="stylesheet" type="text/css">
</head>
<body style="background-color:#A4A3A3;">
<form  name="frm_man" method="post" action="mod.php">
    <fieldset>
        <legend>Modalidad</legend>
        <div class="mx-2">
            <div class="form-row">
                <div class="form-group col-md-2">
                    <input type="text" class="form-control" name="txcod" id="txcod" placeholder="Codigo de Modalidad">
                </div>
                <div class="form-group col-md-4">
                    <input type="text" class="form-control" name="txmod" id="txmod" placeholder="Modalidad">
                </div>
                <div class="form-group col-md-2">
                    <input type="text" class="form-control" name="txmon" id="txmon" placeholder="Monto">
                </div>
            </div>
        </div>
    </fieldset>
<input  type="submit" value="GUARDAR " name="guardar" class="bt3">
<a href="../center.php" class="bt3"> CERRAR </a>
<hr>
<?php
    include '../conectar.php' ;

    if(!empty($_POST['txcod'])=="")
    {}
    else
    {
        $cdm=$_POST['txcod'];
        $mod=$_POST['txmod'];
        $mon=$_POST['txmon'];
        $var_consulta="insert into modalidad (codmod,modalidad,monto) 
        values ('$cdm','$mod','$mon')";
        $result= $db_connect -> query($var_consulta);   
        echo "<meta http-equiv='refresh' content='0,URL=mod.php' >";
    }
?>
</form>
<fieldset>
    <legend> Modalidad </legend>
    <table style="text-align: center;" border="1" width="100%">
        <thead>
            <tr>
                <th>OPCIONES</th>
                <th>CODIGO</th>
                <th>MODALIDAD</th>
                <th>MONTO</th>
            </tr>
        </thead>
    <tbody>
<?php
include '../conectar.php';
$sql_prod = "SELECT * FROM `modalidad`";
$result_prod = $db_connect -> query($sql_prod);
if ($result_prod -> num_rows > 0) {
    while ( $rows = $result_prod -> fetch_assoc() ) {
        $doc = $rows['codmod'];
        $nom = $rows['modalidad'];
        $tlf = $rows['monto'];
        echo '
        <tr>
            <td valign="middle" align="center" id="name">
            <a href="edimod.php?id='.$doc.' "><img src="../../img/edit.png"  title="Editar" width=25 height=15></a>
            <a href="elimod.php?id='.$doc.' "><img src="../../img/borrar.png"  title="Eliminar" width=25 height=15></a>
            </td>
            <td valign="middle" align="center" id="name">' . $doc . '</td>
            <td valign="middle" align="center" id="name">' . $nom . '</td>
            <td valign="middle" align="center">' . $tlf . '</td>
        </tr>
            ';
        }
    if (!empty($_POST['txcod'])=="") {
        
    }
    else{

    }
    }
    
    ?>
        </tbody>        
</table>
</fieldset>
</body>
</html>