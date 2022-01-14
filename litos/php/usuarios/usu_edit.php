<html>
    <title>editar usuarios</title>
    <link href="../../css/estiloscli.css" rel="stylesheet" type="text/css">
    <link href="../../css/estilosventas.css" rel="stylesheet" type="text/css">
    <link href="../../css/btn.css" rel="stylesheet" type="text/css">
    <body >
<form  name="frm-modificar" method="post" action="usu_edit.php?id=$cod" >
<?php
include("../conectar.php");
$sql_prod = "SELECT * FROM `usuario` where dni='".$_GET['id']."' ";
$result_prod = $db_connect -> query($sql_prod);

if ($result_prod -> num_rows > 0) {
    while ($fila = $result_prod -> fetch_assoc() )
{
    $cod=$fila['dni'];
    $des=$fila['nombre'];
    $pre=$fila['login'];
    $can=$fila['pass'];
?>
<fieldset>
    <legend>E D I T A R - U S U A R I O S </legend>
    <table broder=1>
        <tr>
            <td>DNI</td>
            <td><input type="number"  name="text1" id="text1" class="cd" value="<?php echo $cod; ?>"  ></td>
        </tr>
        <tr>
            <td>NOMBRES </td>
            <td><input type="text" name="text2" id="text2"  class="cd" value="<?php echo $des; ?>" size="50"></td>
        </tr>
        <tr>
            <td>CORREO DE TIENDA</td>
            <td><input type="text" name="text3" id="text3" class="cd" value="<?php echo $pre; ?>" size="50"></td>
        </tr>
        <tr>
            <td>PASSWORD</td>
            <td><input type="number" name="text4" id="text4" class="cd"  value="<?php echo $can; ?>"  ></td>
        </tr>
    </table>
        <?php } } ?><br>        
</fieldset>
<input class="bt3 "type="submit"  value="Modificar" >
<?php
    include("../conectar.php");
    if(!empty($_POST)=="")
    {}
    else
    {
        $dni=$_POST['text1'];
        $ape=$_POST['text2'];
        $nom=$_POST['text3'];
        $tlf=$_POST['text4'];
        $modi=("update usuario set nombre='$ape',login='$nom', pass='$tlf' where dni='$dni'");
        $result =$db_connect -> query($modi);
        echo "M O D I F I C A N D O ...";
        echo "<meta http-equiv='refresh' content='3;URL=usuarios.php'>";
    }
?>
</form>
</body>
</html>