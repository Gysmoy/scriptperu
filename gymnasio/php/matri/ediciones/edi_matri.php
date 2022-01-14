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
    <form  name="frm-modificar" method="post" action="edi_matri.php?id=$cod" >
<?php
include("../../conectar.php");
$sql_prod = "SELECT * FROM `matricula` where nmatric='".$_GET['id']."' ";
$result_prod = $db_connect -> query($sql_prod);

if ($result_prod -> num_rows > 0) {
    while ($fila = $result_prod -> fetch_assoc() )
{
    $cod=$fila['nmatric'];
    $des=$fila['dni_alu'];
    $pre=$fila['fecini'];
    $can=$fila['fecfin'];
    $dir=$fila['monto'];
    $adel=$fila['adelanto'];
    $sal=$fila['saldo'];
    $fecm=$fila['fecham'];
    $usu=$fila['dniusu'];
?>
<h5>Datos del Alumnos </h5>
<div class="mx-2">
	<div class="form-row">
	    
	    <div class="form-group col-md-2">
    	    <input type="text" name="text1" class="form-control" placeholder="Nº de Matric" value="<?php echo $cod; ?>">
    	    </div>
    	<div class="form-group col-md-2">
    	    <input type="number" name="text2" class="form-control" placeholder="Nº Dni" value="<?php echo $des; ?>">
    	    </div>
        <div class="form-group col-md-2">
            <input type="date" name="text3" class="form-control" placeholder="Fecha de Inicio" value="<?php echo $pre; ?>">
            </div>
        <div class="form-group col-md-2">
            <input type="date" name="text4" class="form-control" placeholder="Fecha de Cierre" value="<?php echo $can; ?>">
            </div>
        <div class="form-group col-md-2">
            <input type="text" name="text5" class="form-control" placeholder="Monto" value="<?php echo $dir; ?>">
            </div>
        </div>
        
        <div class="form-row">
        <div class="form-group col-md-2">
            <input type="text" name="text6" class="form-control" placeholder="Adelanto" value="<?php echo $adel; ?>">
            </div>
        <div class="form-group col-md-2">
           <input type="text" name="text7" class="form-control" placeholder="Saldo" value="<?php echo $sal; ?>">
            </div>
        <div class="form-group col-md-2">
            <input type="date" name="text8" class="form-control" placeholder="Fecha Limite" value="<?php echo $fecm; ?>">
            </div>
        <div class="form-group col-md-2">
           <input type="number" name="text9" class="form-control" placeholder="Dni Usuario" value="<?php echo $usu; ?>">
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
        $mon=$_POST['text5'];
        $adl=$_POST['text6'];
        $ldo=$_POST['text7'];
        $max=$_POST['text8'];
        $usu=$_POST['text9'];  
        $modi=("update matricula set dni_alu='$ape',fecini='$nom', fecfin='$tlf',monto='$mon' ,
        adelanto='$adl' ,saldo='$ldo' , fecham='$max' , dniusu='$usu' where nmatric='$dni'");
        $result =$db_connect -> query($modi);
        echo "MODIFICANDO";
        echo "<meta http-equiv='refresh' content='1;URL=../matricula.php'>";
    }
?>
</form>
</body>
</html>
    
</body>
</html>