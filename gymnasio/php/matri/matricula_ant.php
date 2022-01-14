<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <meta charset="UTF-8">
    <meta http-equiv="expires" content="0">
    <meta http-equiv="Cache-Control" content="no-cache">
    <meta http-equiv="Pragma" CONTENT="no-cache">
    <script src="https://kit.fontawesome.com/e57084e9c3.js" crossorigin="anonymous"></script>
    <script type="text/javascript" src="../../js/jquery.min.js"></script>
    <link href="../../css/estilospro.css" rel="stylesheet" type="text/css">
    <link href="../../css/estilosventas.css" rel="stylesheet" type="text/css">
    
    <title>Matricula</title>
    
</head>
<body style="background-color:#A4A3A3;">
<form  name="frm_man" method="post" action="matricula.php">
    
<fieldset>
    <legend>Datos del Alumnos </legend> 
<div class="mx-2">
	<div class="form-row">
    	    <div class="form-group col-md-3">
    	        <span> Fecha </span>
    	        <?php $fcha = date("Y-m-d");?>
    	        <input type="date" class="form-control" value="<?php echo $fcha;?>" >
    	    </div>
    	<div class="form-group col-md-2">
    	    <span> DNI Alumno </span>
    	    <input type="number" name="txmaq" class="form-control" placeholder="Nº Dni">
    	</div>    
    	
        <div class="form-group col-md-4">
            <span> Nombre Alumno </span>
            <input type="text" name="txho1" class="form-control" placeholder="Alumno">
        </div>
        <div class="form-group col-md-2">
            <span> </span>
            <a href="#" class="bt3"> Buscar Alumno</a>
        </div>        
    </div>
    	
<div class="form-row">
    </div>    
    <div class="form-row">    
        <div class="form-group col-md-2">
            <span> Codigo hora. </span>
            <input type="text" name="txaer" class="form-control" placeholder="Codigo de Horario">
        </div>
        <div class="form-group col-md-2">
            <span> Profesor </span>
            <input type="text" name="txmon" class="form-control" placeholder="Instructor">
        </div>
        <div class="form-group col-md-2">
            <span> Fecha Inicial </span>
            <input type="date" name="txbai" class="form-control">
        </div>
        <div class="form-group col-md-2">
            <span> Fecha Final </span>
           <input type="date" name="txho3" class="form-control">
        </div>
        <div class="form-group col-md-2">
            <span>Modalidad </span>
            <input type="text" name="txmix" class="form-control" placeholder="Modalidad">
        </div>
        <div class="form-group col-md-2">
            <span> </span>
            <a href="#" class="bt3"> Buscar Horario</a>
        </div> 
    </div>
    <span> Formas de Pago</span>
    <input type="radio" name="txho4">
    <label>Contado</label>
    <input type="radio" name="txho4">
    <label>A cuenta</label>
    <input type="radio" name="txho4">
    <label>Debe</label>
    
    <span>
        <input type="number" name="txho4" placeholder="Monto">
    </span>
</fieldset>

    <input  type="submit" value="Matricular " name="guardar" class="bt3">
    <a href="../center.php" class="bt3"> CERRAR </a>
</div>    
 
<?php
    include '../conectar.php' ;

    if(!empty($_POST['txmaq'])=="")
    {}
    else
    {
        $num=strtotime('now');
        $maq=$_POST['txmaq'];
        $ho1=$_POST['txho1']; 
        $aer=$_POST['txaer'];
        $mon=$_POST['txmon'];
        $bai=$_POST['txbai'];
        $ho3=$_POST['txho3'];
        $mix=$_POST['txmix'];
        $ho4=$_POST['txho4'];
        $var_consulta="insert into matricula (nmatric,dni_alu,fecini,fecfin,monto,adelanto,saldo,fecham,dniusu) 
        values ('$num','$maq','$ho1','$aer','$mon','$bai','$ho3','$mix','$ho4')";
        $result= $db_connect -> query($var_consulta);

        $consulta="insert into detallematri (nmatri) 
        values ('$num')";
        $result2= $db_connect -> query($consulta);
        echo "<meta http-equiv='refresh' content='0,URL=matricula.php' >";
    }
?>
</form>
<h5> Matriculados </h5>  
<table style="text-align: center;">
        <thead>
        <tr>
            <th>OPC</th>
            <th>NUM MATRICULA</th>
            <th>DNI ALUMNO</th>
            <th>FECHA INICIO</th>       
            <th>FECHA CIERRE</th>
            <th>MONTO</th>
            <th>ADELANTO</th>
            <th>SALDO</th>
            <th>FECHA LIMITE</th>
            <th>DNI USUARIO</th> 
        </tr>
        </thead>
        <tbody>
<?php
include '../conectar.php';
$sql_prod = "SELECT * FROM `matricula`";
$result_prod = $db_connect -> query($sql_prod);
if ($result_prod -> num_rows > 0) {
    while ( $rows = $result_prod -> fetch_assoc() ) {
        $doc = $rows['nmatric'];
        $nom = $rows['dni_alu'];
        $ape = $rows['fecini'];
        $tlf = $rows['fecfin'];
        $pes = $rows['monto'];
        $tal = $rows['adelanto'];
        $sex = $rows['saldo'];
        $mix = $rows['fecham'];
        $hor = $rows['dniusu'];
        echo '
        <tr>
            <td valign="middle" align="center" id="name">
            <a href="ediciones/edi_matri.php?id='.$doc.' "><img src="../../img/edit.png"  title="Editar" width=25 height=15></a>
            <a href="borrar/eli_matri.php?id='.$doc.' "><img src="../../img/borrar.png"  title="Eliminar" width=25 height=15></a>
            </td>
            <td valign="middle" align="center" id="name">' . $doc . '</td>
            <td valign="middle" align="center" id="name">' . $nom . '</td>
            <td valign="middle" align="center" id="name">' . $ape . '</td>
            <td valign="middle" align="center">' . $tlf . '</td>
            <td valign="middle" align="center">' . $pes . '</td>
            <td valign="middle" align="center">' . $tal . '</td>
            <td valign="middle" align="center">' . $sex . '</td>
            <td valign="middle" align="center">' . $mix . '</td>
            <td valign="middle" align="center">' . $hor . '</td>  
        </tr>
            ';
        }
    if (!empty($_POST['txmaq'])=="") {
        
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