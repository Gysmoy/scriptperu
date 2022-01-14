<!DOCTYPE html>
<html lang="es">
<head>
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <meta charset="UTF-8">
    <meta http-equiv="expires" content="0">
    <meta http-equiv="Cache-Control" content="no-cache">
    <meta http-equiv="Pragma" CONTENT="no-cache">
    <script src="https://kit.fontawesome.com/e57084e9c3.js" crossorigin="anonymous"></script>
    <script type="text/javascript" src="../../js/jquery.min.js"></script>
    
    <title>Alumno</title>
    <link href="../../css/estilospro.css" rel="stylesheet" type="text/css">

    <link href="../../css/estilosventas.css" rel="stylesheet" type="text/css">

</head>
<body style="background-color:#A4A3A3;">

<form  name="frm_man" method="post" action="alumno.php">

<fieldset>
    <legend>Datos del Alumnos </legend>  
<div class="mx-2">
	<div class="form-row">
	
    	<div class="form-group col-md-2">
    	   <input type="text" class="form-control" name="txdni" id="txdni" placeholder="N° DNI">
    	</div>
    	<div class="form-group col-md-4">
    	   <input type="text" class="form-control" name="txnom" id="txnom" placeholder="Nombre del Alumno">
    	</div>
    	<div class="form-group col-md-4">
    	   <input type="text" class="form-control" name="txape" id="txape" placeholder="Apellidos del Alumno">
    	</div>
    </div>
    
    <div class="form-row">
       <div class="form-group col-md-2">
    	   <input type="text" class="form-control" name="txtlf" id="txtlf" placeholder="N° Celular">
       </div>
       <div class="form-group col-md-2">
    	   <input type="text" class="form-control" name="txpes" id="txpes" placeholder="Peso Kilos">
       </div>
       <div class="form-group col-md-2">
    	   <input type="text" class="form-control" name="txtal" id="txtal" placeholder="Talla Centimetros">
       </div>	
       <div class="form-group col-md-2">

   		<select name="txsex" size="1" id="txsex" placeholder="Sexo" class="form-control">
			<option value="0" selected="selected">Seleccione sexo</option>
			<option value="F">Femenino</option>
			<option value="M">Masculino</option>
		</select>    
       </div>		   
   </div>
   
</div>

</fieldset>
     
 
<input  type="submit" value="GUARDAR " name="guardar" class="bt3"> &nbsp;
<a href="../center.php" class="bt3"> CERRAR </a>
 
<?php
    include '../conectar.php' ;

    if(!empty($_POST['txdni'])=="")
    {}
    else
    {
        $mat=strtotime('now');
        $cod=$_POST['txdni'];
        $ape=$_POST['txape'];
        $nom=$_POST['txnom']; 
        $cel=$_POST['txtlf'];
        $pes=$_POST['txpes'];
        $tal=$_POST['txtal'];
        $sex=$_POST['txsex'];
        $var_consulta="insert into alumno (nmatri,dni,nombre,apellido,celular,peso,talla,sexo) 
        values ('$mat','$cod','$nom','$ape','$cel','$pes','$tal','$sex')";
        $result= $db_connect -> query($var_consulta);
        
        $var_consulta2="insert into matricula (nmatric,dni_alu) 
        values ('$mat','$cod')";
        $result2= $db_connect -> query($var_consulta2);
        
        $var_consulta3="insert into detallematri (nmatri) 
        values ('$mat')";
        $result3= $db_connect -> query($var_consulta3);  
        echo "<meta http-equiv='refresh' content='0,URL=alumno.php' >";
    }
?>
</form>

<hr>
<h5>Lista de Alumnos </h5>

<table style="text-align: center;" border=1 width="100%">
        <thead>
        <tr>
            <th>OPCIONES</th>
            <th width="10%">DNI</th>
            <th>NOMBRES</th>
            <th>APELLIDO</th>       
            <th>CELULAR</th>
            <th>PESO</th>
            <th>TALLA</th>
            <th>SEXO</th>   
        </tr>
        </thead>
        <tbody>
<?php
include '../conectar.php';
$sql_prod = "SELECT * FROM `alumno`";
$result_prod = $db_connect -> query($sql_prod);
if ($result_prod -> num_rows > 0) {
    while ( $rows = $result_prod -> fetch_assoc() ) {
        $mat = $rows['nmatri'];
        $doc = $rows['dni'];
        $nom = $rows['nombre'];
        $ape = $rows['apellido'];
        $tlf = $rows['celular'];
        $pes = $rows['peso'];
        $tal = $rows['talla'];
        $sex = $rows['sexo'];
        echo '
        <tr>
            <td valign="middle" align="center" id="name">
            <a href="edit/alumedit.php?id='.$doc.' "><img src="../../img/edit.png"  title="Editar" width=25 height=15></a>
            <a href="alumeli.php?id='.$doc.' "><img src="../../img/borrar.png"  title="Eliminar" width=25 height=15></a>
            </td>
            <td valign="middle" align="center" id="name">' . $doc . '</td>
            <td valign="middle" align="center" id="name">' . $nom . '</td>
            <td valign="middle" align="center" id="name">' . $ape . '</td>
            <td valign="middle" align="center">' . $tlf . '</td>
            <td valign="middle" align="center">' . $pes . '</td>
            <td valign="middle" align="center">' . $tal . '</td>
            <td valign="middle" align="center">' . $sex . '</td>  
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
</body>
</html>