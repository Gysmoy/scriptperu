<html>
    <title> C L I E N T E S </title>
    <link href="../../css/estilospro.css" rel="stylesheet" type="text/css">
    <link href="../../css/estilosventas.css?v=<?php echo $id;?>" rel="stylesheet" type="text/css">
    <link href="../../css/btn.css" rel="stylesheet" type="text/css">
    <meta http-equiv="expires" content="0">
    <meta http-equiv="Cache-Control" content="no-cache">
    <meta http-equiv="Pragma" CONTENT="no-cache">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.15.3/css/all.css" integrity="sha384-SZXxX4whJ79/gErwcOYf+zWLeJdY/qpuqC4cAa9rOGUstPomtqpuNWT9wdPEn2fk" crossorigin="anonymous">
    <script src="https://kit.fontawesome.com/e57084e9c3.js" crossorigin="anonymous"></script>
    <script type="text/javascript" src="../../js/jquery.min.js"></script>
<body >
    <h2> Mantenimiento de clientes </h2>

<form  name="frm_man" method="post" action="clientes.php">
<fieldset>
    <legend>D A T O S - D E - L O S - C L I E N T E S </legend>  
        <table border=1>
        <tr>
            <td>DNI</td>
            <td ><input type="number" name="txdni" class="cd" size="50"></td>
        </tr>
        <tr>
            <td>APELLIDOS</td>
            <td><input type="text" name="txape" class="cd" size="50"></td>
        </tr>
        <tr>
            <td>NOMBRES</td>
            <td><input type="text" name="txnom" class="cd" size="50"></td>
        </tr>
        <tr>
            <td>R U C</td>
            <td><input type="number" name="txtlf" class="cd" size="50"></td>
        </tr>
        <tr>
            <td>DIRECCION</td>
            <td><input type="text" name="txdir" class="cd" size="50"></td>
        </tr>
            
</tr>
</table></fieldset><br> 
<fieldset>
<legend>O P C I O N E S</legend>  
<input  class="bt3" type="submit" value="GUARDAR " name="guardar">
<input  class="bt3" type="button" value="SALIR" name="salir">
<?php
    include '../conectar.php' ;

    if(!empty($_POST['txdni'])=="")
    {}
    else
    {
        $cod=$_POST['txdni'];
        $des=$_POST['txape'];
        $pre=$_POST['txnom']; 
        $can=$_POST['txtlf'];
        $dir=$_POST['txdir'];
        $var_consulta="insert into clientes (dni,apellidos,nombres,RUC,dir) values ('$cod','$des','$pre','$can','$dir')";
        $result= $db_connect -> query($var_consulta);   
        echo "<meta http-equiv='refresh' content='0,URL=clientes.php' >";
    }
?>
</form>

</fieldset><br>
<fieldset>
<legend>L I S T A - D E - P R O D U C T O S </legend>  
<table border=1 width="100%">
        <thead>
        <tr>
            <th>DNI</th>
            <th>APELLIDO</th>       
            <th>NOMBRES</th>
            <th>RUC</th>
            <th>DIRECCION</th>   
            <th>ACCION</th>
        </tr>
        </thead>
        <tbody>
<?php
include '../conectar.php';
$sql_prod = "SELECT * FROM `clientes`";
$result_prod = $db_connect -> query($sql_prod);
if ($result_prod -> num_rows > 0) {
    while ( $rows = $result_prod -> fetch_assoc() ) {
        $doc = $rows['dni'];
        $ape = $rows['apellidos'];
        $nom = $rows['nombres'];
        $tlf = $rows['RUC'];
        $cci = $rows['dir'];
        echo '
        <tr>
            <td valign="middle" align="center" id="name">' . $doc . '</td>
            <td valign="middle" align="center" id="name">' . $ape . '</td>
            <td valign="middle" align="center" id="name">' . $nom . '</td>
            <td valign="middle" align="center">' . $tlf . '</td>
            <td valign="middle" align="center">' . $cci . '</td>
            <td valign="middle" align="center">
                        <a  href="clie_edit.php?id='.$doc.' " title="Editar">
                            <i class="fa fa-edit"></i>
                        </a>
                        <a  href="clie_eli.php?id='.$doc.' " title="Eliminar">
                            <i class="fa fa-trash"></i>
                        </a>
                    </td>
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