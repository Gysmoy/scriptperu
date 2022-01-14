<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title></title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <meta charset="UTF-8">
    <title>Alumno</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@100;400&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="../../css/table.css">
    <link rel="stylesheet" href="../../css/style.css">
</head>
<body style="background-color:#A4A3A3;">
<form  name="frm_man" method="post" action="dematricula.php">
<h5>Det Matricula</h5>
<div class="mx-2">
	<div class="form-row">

    	<div class="form-group col-md-2">
            <input type="text" name="txmaq" class="form-control" placeholder=" Maquina">
            </div>

        <div class="form-group col-md-2">
            <input type="text" name="txho1" class="form-control" placeholder="Horario 1">
            </div>

        <div class="form-group col-md-2">    
            <input type="text" name="txaer" class="form-control" placeholder="Aerobico">
            </div>

        <div class="form-group col-md-2">    
            <input type="text" name="txpho2" class="form-control" placeholder="Horario 2">
            </div>

        <div class="form-group col-md-2">   
            <input type="text" name="txbai" class="form-control" placeholder=" Baile">
            </div>

        <div class="form-group col-md-2">     
            <input type="text" name="txho3" class="form-control" placeholder="Horario 3">
            </div>

        <div class="form-group col-md-2">    
            <input type="text" name="txmix" class="form-control" placeholder="Mixto">
            </div>

  
        <div class="form-group col-md-2">    
            <input type="text" name="txho4" class="form-control" placeholder="Horario 4">
            </div>
</div>
<hr> 
<input  type="submit" value="GUARDAR " name="guardar" class="btn1">
<input  type="button" value="SALIR" name="salir" class="btn1">
<hr>
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
        $ho2=$_POST['txho2'];
        $bai=$_POST['txbai'];
        $ho3=$_POST['txho3'];
        $mix=$_POST['txmix'];
        $ho4=$_POST['txho4'];
        $var_consulta="insert into detallematri (nmatri,maquina,horario1,aerobico,horario2,baile,horario3,mixto,horario4) 
        values ('$num','$maq','$ho1','$aer','$ho2','$bai','$ho3','$mix','$ho4')";
        $result= $db_connect -> query($var_consulta);   
        echo "<meta http-equiv='refresh' content='0,URL=dematricula.php' >";
    }
?>
</form>
<h5>Detalle de Matricula </h5>  
<table style="text-align: center;">
        <thead>
        <tr>
            <th width="5%">OPC</th>
            <th width="6%">NUM MATRICULA</th>
            <th width="5%">MAQUINA</th>
            <th width="10%">HORARIO1</th>       
            <th width="5%">AEROBICO</th>
            <th width="10%">HORARIO2</th>
            <th width="5%">BAILE</th>
            <th width="10%">HORARIO3</th>
            <th width="5%">MIXTO</th>
            <th width="10%">HORARIO4</th>   
        </tr>
        </thead>
        <tbody>
<?php
include '../conectar.php';
$sql_prod = "SELECT * FROM `detallematri`";
$result_prod = $db_connect -> query($sql_prod);
if ($result_prod -> num_rows > 0) {
    while ( $rows = $result_prod -> fetch_assoc() ) {
        $doc = $rows['nmatri'];
        $nom = $rows['maquina'];
        $ape = $rows['horario1'];
        $tlf = $rows['aerobico'];
        $pes = $rows['horario2'];
        $tal = $rows['baile'];
        $sex = $rows['horario3'];
        $mix = $rows['mixto'];
        $hor = $rows['horario4'];
        echo '
        <tr>
            <td valign="middle" align="center" id="name">
            <a href="ediciones/edi_dematri.php?id='.$doc.' "><img src="../../img/edit.png"  title="Editar" width=25 height=15></a>
            <a href="borrar/eli_dematri.php?id='.$doc.' "><img src="../../img/borrar.png"  title="Eliminar" width=25 height=15></a>
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