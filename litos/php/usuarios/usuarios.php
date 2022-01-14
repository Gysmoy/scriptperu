<html>
    <title>U S U A R I O S  </title>
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
    <h2> Mantenimiento de usuarios </h2>

<form  name="frm_man" method="post" action="usuarios.php">
<fieldset>
    <legend>D A T O S - D E - L O S - U S U A R I O S </legend>  
        <table border=1>
        <tr>
            <td>DNI</td>
            <td ><input type="number" name="txdni" class="cd" size="50"></td>
        </tr>
        <tr>
            <td>NOMBRES</td>
            <td><input type="text" name="txape" class="cd" size="50"></td>
        </tr>
        <tr>
            <td>CORREO</td>
            <td><input type="text" name="txnom" class="cd" size="50"></td>
        </tr>
        <tr>
            <td>CONTRASEÑA</td>
            <td><input type="TEXT" name="txtlf" class="cd" size="25"></td>
        </tr>
            
</tr>
</table></fieldset><br> 
<fieldset>
<legend>O P C I O N E S</legend>  
<input  class="bt3" type="submit" value="G U A R D A R " name="guardar">
<input  class="bt3" type="button" value="S A L I R" name="salir">
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
        $var_consulta="insert into usuario (dni,nombre,login,pass) values ('$cod','$des','$pre','$can')";
        $result= $db_connect -> query($var_consulta);   
        echo "<meta http-equiv='refresh' content='1,URL=usuarios.php' >";
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
            <th>NOMBRES</th>       
            <th>CORREO</th>
            <th>PASSWORD</th> 
            <th>ACCION</th>
        </tr>
        </thead>
        <tbody>
<?php
include '../conectar.php';
$sql_prod = "SELECT * FROM `usuario`";
$result_prod = $db_connect -> query($sql_prod);
if ($result_prod -> num_rows > 0) {
    while ( $rows = $result_prod -> fetch_assoc() ) {
        $doc = $rows['dni'];
        $ape = $rows['nombre'];
        $nom = $rows['login'];
        $tlf = $rows['pass'];
        echo '
        <tr>
            <td valign="middle" align="center" id="name">' . $doc . '</td>
            <td valign="middle" align="center" id="name">' . $ape . '</td>
            <td valign="middle" align="center" id="name">' . $nom . '</td>
            <td valign="middle" align="center">' . $tlf . '</td>
            <td valign="middle" align="center">
                        <a  href="usu_edit.php?id='.$doc.' " title="Editar">
                            <i class="fa fa-edit"></i>
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