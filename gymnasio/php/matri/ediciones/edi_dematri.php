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
    <form  name="frm-modificar" method="post" action="edi_dematri.php?id=$cod" >
<?php
include("../../conectar.php");
$sql_prod = "SELECT * FROM `detallematri` where nmatri='".$_GET['id']."' ";
$result_prod = $db_connect -> query($sql_prod);

if ($result_prod -> num_rows > 0) {
    while ($fila = $result_prod -> fetch_assoc() )
{
    $cod=$fila['nmatri'];
    $des=$fila['maquina'];
    $pre=$fila['horario1'];
    $can=$fila['aerobico'];
    $dir=$fila['horario2'];
    $adel=$fila['baile'];
    $sal=$fila['horario3'];
    $fecm=$fila['mixto'];
    $usu=$fila['horario4'];
?>
<h5>Det Matricula</h5>
<div class="mx-2">
	<div class="form-row">
	    <div class="form-group col-md-2">
            <input type="number" name="text1" id="text1" class="form-control" placeholder="Nº Matric" value="<?php echo $cod; ?>">
            </div>

    	<div class="form-group col-md-2">
            <input type="text" name="text2" id="text2" class="form-control" placeholder="Maquina" value="<?php echo $des; ?>">
            </div>

        <div class="form-group col-md-2">
            <input type="text" name="text3" id="text3" class="form-control" placeholder="Horario 1" value="<?php echo $pre; ?>">
            </div>

        <div class="form-group col-md-2">    
            <input type="text" name="text4" id="text4" class="form-control" placeholder="Aerobico" value="<?php echo $can; ?>">
            </div>

        <div class="form-group col-md-2">    
            <input type="text" name="text5" id="text5" class="form-control" placeholder="Horario 2" value="<?php echo $dir; ?>">
            </div>

        <div class="form-group col-md-2">   
            <input type="text" name="text6" id="text6" class="form-control" placeholder="Baile"value="<?php echo $adel; ?>">
            </div>

        <div class="form-group col-md-2">     
            <input type="text" name="text7" id="text7" class="form-control" placeholder="Horario 3" value="<?php echo $sal; ?>">
            </div>

        <div class="form-group col-md-2">    
            <input type="text" name="text8" id="text8" class="form-control" placeholder="Mixto" value="<?php echo $fecm; ?>">
            </div>
  
        <div class="form-group col-md-2">    
            <input type="text" name="text9" id="text9" class="form-control" placeholder="Horario 4" value="<?php echo $usu; ?>">
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
        $modi=("update detallematri set maquina='$ape',horario1='$nom', aerobico='$tlf',horario2='$mon' ,
        baile='$adl' ,horario3='$ldo' , mixto='$max' , horario4='$usu' where nmatri='$dni'");
        $result =$db_connect -> query($modi);
        echo "MODIFICANDO";
        echo "<meta http-equiv='refresh' content='1;URL=../dematricula.php'>";
    }
?>
</form>
</body>
</html>
    
</body>
</html>