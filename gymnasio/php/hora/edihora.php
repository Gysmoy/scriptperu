<!DOCTYPE html>
<html lang="es">
<head>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <meta charset="UTF-8">
    <title>Usuario</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@100;400&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="../../css/table.css">
    <link rel="stylesheet" href="../../css/style.css">
    <meta charset="UTF-8">
    <title>Document</title>
</head>
<body style="background-color:#A4A3A3;">
    <form  name="frm-modificar" method="post" action="edihora.php?id=$cod" >
<?php
include("../conectar.php");
$sql_prod = "SELECT * FROM `horario` where codhora='".$_GET['id']."' ";
$result_prod = $db_connect -> query($sql_prod);

if ($result_prod -> num_rows > 0) {
    while ($fila = $result_prod -> fetch_assoc() )
{
    $chora=$fila['codhora'];
    $cmoda=$fila['codmod'];
    $fecin=$fila['fechai'];
    $fecfi=$fila['fechaf'];
    $dnipr=$fila['dniprofe'];
?>
<form  name="frm_man" method="post" action="edihora.php">
<h5>Modificar datos del Horario </h5>
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
    	   <input type="date" class="form-control" value= <?php echo $fecin; ?> name="txfini" id="txfini">
       </div>
       <div class="form-group col-md-2">
           <span>Fecha Final</span>
    	   <input type="date" class="form-control" value= <?php echo $fecfi; ?> name="txffin" id="txffin">
       </div>    	
       <div class="form-group col-md-3">
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
        $dni=$_POST['txmod'];
        $nom=$_POST['txfini'];
        $ape=$_POST['txffin'];
        $log=$_POST['txprof'];

        $modi=("update horario set nombre='$nom',apellido='$nom',login='$log', pass='$pas', tipo='$tip' where dni='$dni'");
        $result =$db_connect -> query($modi);
        echo "MODIFICANDO";
        echo "<meta http-equiv='refresh' content='1;URL=hora.php'>";
    }
?>
</form>
</body>
</html>
    
</body>
</html>