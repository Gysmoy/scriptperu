<!DOCTYPE html>
<html lang="es">
<head>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <meta charset="UTF-8">
    <title>Alumno</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@100;400&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="../../../css/table.css">
    <link rel="stylesheet" href="../../../css/style.css">
    <meta charset="UTF-8">
    <title>Document</title>
</head>
<body style="background-color:#A4A3A3;">  
    <form  name="frm-modificar" method="post" action="alumedit.php?id=$cod" >
<?php
include("../../conectar.php");
$sql_prod = "SELECT * FROM `alumno` where dni='".$_GET['id']."' ";
$result_prod = $db_connect -> query($sql_prod);

if ($result_prod -> num_rows > 0) {
    while ($fila = $result_prod -> fetch_assoc() )
{
    $num=$fila['nmatri'];
    $cod=$fila['dni'];
    $des=$fila['nombre'];
    $pre=$fila['apellido'];
    $can=$fila['celular'];
    $pes=$fila['peso'];
    $tal=$fila['talla'];
    $sex=$fila['sexo'];
?>

<h5>Datos del Alumno</h5>
    <div class="mx-2">
	<div class="form-row">
	
    	<div class="form-group col-md-2">
    	   <input type="text" class="form-control" name="text1" id="text1" placeholder="N° DNI" value="<?php echo $cod; ?>">
    	</div>
    	<div class="form-group col-md-4">
    	   <input type="text" class="form-control" name="text2" id="text2" placeholder="Nombre del Alumno" value="<?php echo $des; ?>">
    	</div>
    	<div class="form-group col-md-4">
    	   <input type="text" class="form-control" name="text3" id="text3" placeholder="Apellidos del Alumno" value="<?php echo $pre; ?>">
    	</div>
    </div>
    
    <div class="form-row">
       <div class="form-group col-md-2">
    	   <input type="text" class="form-control" name="text4" id="text4" placeholder="N° Celular" value="<?php echo $can; ?>">
       </div>
       <div class="form-group col-md-2">
    	   <input type="text" class="form-control" name="text5" id="text5" placeholder="Peso Kilos" value="<?php echo $pes; ?>">
       </div>
       <div class="form-group col-md-2">
    	   <input type="text" class="form-control" name="text6" id="text6" placeholder="Talla Centimetros" value="<?php echo $tal; ?>">
       </div>	
       <div class="form-group col-md-2">
    	   <input type="text" class="form-control" name="text7" id="text7" placeholder="Sexo" value="<?php echo $sex; ?>">
       </div>		   
   </div>
   
</div>    
<hr>  

        <?php } } ?><br>        

<input class="btn1 "type="submit"  value="Modificar" >
<?php
    include("../../conectar.php");
    if(!empty($_POST)=="")
    {}
    else
    {
        $dni=$_POST['text1'];
        $ape=$_POST['text2'];
        $nom=$_POST['text3'];
        $tlf=$_POST['text4'];
        $peso=$_POST['text5'];
        $tall=$_POST['text6'];
        $sexo=$_POST['text7'];
        $modi=("update alumno set nombre='$ape',apellido='$nom', celular='$tlf', peso='$peso', talla='$tall', sexo='$sexo' where dni='$dni'");
        $result =$db_connect -> query($modi);
        echo "MODIFICANDO";
        echo "<meta http-equiv='refresh' content='1;URL=../alumno.php'>";
    }
?>
</form>
</body>
</html>
    
</body>
</html>