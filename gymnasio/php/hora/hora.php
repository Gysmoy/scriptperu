<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Horario</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <meta charset="UTF-8">
    <title>Usuario</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@100;400&display=swap" rel="stylesheet">
    <link href="../../css/estilospro.css" rel="stylesheet" type="text/css">
    <link href="../../css/btn.css" rel="stylesheet" type="text/css">
    <link href="../../css/estilosventas.css" rel="stylesheet" type="text/css">
    
</head>
<body style="background-color:#A4A3A3;">
<form  name="frm_man" method="post" action="hora.php">
    <fieldset>
        <legend> Horario </legend>
        <div class="mx-2">
            <div class="form-row">
                <div class="form-group col-md-3">
                    <span>Modalidad </span>
                    <select name="txmod" size="1" id="txmod" placeholder="Modalidad" class="form-control">
                    <?php    
                    include '../conectar.php';
                    $sql_mod = "SELECT * FROM modalidad";
                    $result_mod = $db_connect -> query($sql_mod);
                    while ( $rowm = $result_mod -> fetch_assoc() ) 
                    {
                        $codm = $rowm['codmod'];
                        $modm = $rowm['modalidad'];
                        echo "<option value=$codm >"; echo $modm;  echo "</option>";
                    }
                    ?> 
                    </select>
                </div>
                <div class="form-group col-md-2">
                    <span>Fecha de Inicio</span>
                    <input type="date" class="form-control" name="txfini" id="txfini">
                </div>
                <div class="form-group col-md-2">
                    <span>Fecha Final</span>
                    <input type="date" class="form-control" name="txffin" id="txffin">
                </div>
                <div class="form-group col-md-2">
                    <span>Profesor</span>
                    <select name="txprof" size="1" id="txprof" placeholder="Dni Del Instructor" class="form-control">
                        <?php    
                        include '../conectar.php';
                        $sql_prof = "SELECT * FROM profesor";
                        $result_prof = $db_connect -> query($sql_prof);
                        while ( $rowsp = $result_prof -> fetch_assoc() ) 
                        {
                            $pdni = $rowsp['dni'];
                            $pnom = $rowsp['nombre'];
                            echo "<option value="; echo $pdni; echo ">"; echo $pnom; echo "</option>";
                        }
                        ?> 
                    </select> 
                </div>
            </div>
        </div>
    </fieldset>

<input  type="submit" value="GUARDAR " name="guardar" class="bt3">
<a href="../center.php" class="bt3"> CERRAR </a>
<hr>
<?php
    include '../conectar.php' ;

    if(!empty($_POST['txfini'])=="")
    {}
    else
    {
        $codi=strtotime('now');
        $moda=$_POST['txmod'];
        $feci=$_POST['txfini'];
        $fecf=$_POST['txffin'];
        $prof=$_POST['txprof'];
        $var_consulta="insert into horario (codhora,codmod,fechai,fechaf,dniprofe) 
        values ('$codi','$moda','$feci','$fecf','$prof')";
        $result= $db_connect -> query($var_consulta);   
        echo "<meta http-equiv='refresh' content='0,URL=hora.php' >";
    }
?>
</form>
<fieldset>
    <legend> Horario </legend>  
<table style="text-align: center;" border="1" width="100%">
        <thead>
        <tr>
            <th>OPCIONES</th>
            <th>COD HORA.</th>
            <th>MODALIDAD</th>
            <th>FECHA INI</th>
            <th>FECHA FIN</th>
            <th>DNI PROF.</th>
            <th>PROFESOR</th>
        </tr>
        </thead>
        <tbody>
<?php
include '../conectar.php';
$sql_prod = "SELECT * FROM `horario`";
$result_prod = $db_connect -> query($sql_prod);
if ($result_prod -> num_rows > 0) {
    while ( $rows = $result_prod -> fetch_assoc() ) {
        $doc = $rows['codhora'];
        $nom = $rows['codmod'];
        $tlf = $rows['fechai'];
        $pes = $rows['fechaf'];
        $tal = $rows['dniprofe'];
        
    $sql_bmod = "SELECT * FROM modalidad where codmod='$nom'";
    $result_bmod = $db_connect -> query($sql_bmod);
    while ( $rmod = $result_bmod -> fetch_assoc() ) 
    {    $moda = $rmod['modalidad'];   }

    $sql_bprof = "SELECT * FROM profesor where dni='$tal'";
    $result_bprof = $db_connect -> query($sql_bprof);
    while ( $rprof = $result_bprof -> fetch_assoc() ) 
    {    $prof = $rprof['nombre'];   }
    
        echo '
        <tr>
            <td valign="middle" align="center" id="name">
            <a href="edihora.php?id='.$doc.' "><img src="../../img/edit.png"  title="Editar" width=25 height=15></a>
            <a href="elihora.php?id='.$doc.' "><img src="../../img/borrar.png"  title="Eliminar" width=25 height=15></a>
            </td>
            <td valign="middle" align="center" id="name">' . $doc . '</td>
            <td valign="middle" align="center" id="name">' . $moda . '</td>
            <td valign="middle" align="center">' . $tlf . '</td>
            <td valign="middle" align="center">' . $pes . '</td>
            <td valign="middle" align="center">' . $tal . '</td>
            <td valign="middle" align="center">' . $prof . '</td>
        </tr>
            ';
        }
    if (!empty($_POST['txdni'])=="") {
        
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