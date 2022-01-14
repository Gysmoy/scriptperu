<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Profesor</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@100;400&display=swap" rel="stylesheet">
    <link href="../../css/estilospro.css" rel="stylesheet" type="text/css">
    <link href="../../css/btn.css" rel="stylesheet" type="text/css">
    <link href="../../css/estilosventas.css" rel="stylesheet" type="text/css">
</head>
<body style="background-color:#A4A3A3;">
<form  name="frm_man" method="post" action="profesor.php">

<fieldset>
    <legend>Datos del profesor </legend>
<div class="mx-2">
	<div class="form-row">
	
    	<div class="form-group col-md-2">
    	   <input type="text" class="form-control" name="txdni" id="txdni" placeholder="N° DNI">
    	</div>
    	<div class="form-group col-md-4">
    	   <input type="text" class="form-control" name="txnom" id="txnom" placeholder="Nombre del Profesor">
    	</div>
    	<div class="form-group col-md-4">
    	   <input type="text" class="form-control" name="txdir" id="txdir" placeholder="Direccion">
    	</div>
    </div>
    
    <div class="form-row">
       <div class="form-group col-md-2">
    	   <input type="text" class="form-control" name="txtlf" id="txtlf" placeholder="N° Celular">
       </div>
   </div>
   
</div>
</fieldset>

<input  type="submit" value="GUARDAR " name="guardar" class="bt3">&nbsp;
<a href="../center.php" class="bt3"> CERRAR </a>
<hr>

<?php
    include '../conectar.php' ;

    if(!empty($_POST['txdni'])=="")
    {}
    else
    {
        $cod=$_POST['txdni'];
        $nom=$_POST['txnom'];
        $drc=$_POST['txdir']; 
        $cel=$_POST['txtlf'];
        $var_consulta="insert into profesor (dni,nombre,direccion,celular) 
        values ('$cod','$nom','$drc','$cel')";
        $result= $db_connect -> query($var_consulta);   
        echo "<meta http-equiv='refresh' content='0,URL=profesor.php' >";
    }
?>
</form>
<fieldset>
    <legend>Lista de Profesores </legend>
    <table style="text-align: center;" border=1 width="100%">
        <thead>
            <tr>
                <th>OPCIONES</th>
                <th>DNI</th>
                <th>NOMBRES</th>
                <th>DIRECCION</th>  
                <th>CELULAR</th> 
            </tr>
        </thead>
        <tbody>
<?php
include '../conectar.php';
$sql_prod = "SELECT * FROM `profesor`";
$result_prod = $db_connect -> query($sql_prod);
if ($result_prod -> num_rows > 0) {
    while ( $rows = $result_prod -> fetch_assoc() ) {
        $doc = $rows['dni'];
        $nom = $rows['nombre'];
        $dre = $rows['direccion'];
        $tlf = $rows['celular'];
        echo '
        <tr>
            <td valign="middle" align="center" id="name">
            <a href="edit/edipro.php?id='.$doc.' "><img src="../../img/edit.png"  title="Editar" width=25 height=15></a>
            <a href="elipro.php?id='.$doc.' "><img src="../../img/borrar.png"  title="Eliminar" width=25 height=15></a>
            </td>
            <td valign="middle" align="center" id="name">' . $doc . '</td>
            <td valign="middle" align="center" id="name">' . $nom . '</td>
            <td valign="middle" align="center" id="name">' . $dre . '</td>
            <td valign="middle" align="center">' . $tlf . '</td>
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