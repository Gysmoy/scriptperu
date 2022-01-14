<html>
    <title>EDITOR-CLIENTE</title>
    <link href="../../css/estiloscli.css" rel="stylesheet" type="text/css">
    <link href="../../css/estilosventas.css" rel="stylesheet" type="text/css">
    <link href="../../css/btn.css" rel="stylesheet" type="text/css">
    <body >
<form  name="frm-modificar" method="post" action="clie_edit.php?id=$cod" >
<?php
include("../conectar.php");
$sql_prod = "SELECT * FROM `clientes` where dni='".$_GET['id']."' ";
$result_prod = $db_connect -> query($sql_prod);

if ($result_prod -> num_rows > 0) {
    while ($fila = $result_prod -> fetch_assoc() )
{
    $cod=$fila['dni'];
    $des=$fila['apellidos'];
    $pre=$fila['nombres'];
    $can=$fila['RUC'];
    $dir=$fila['dir'];
?>
<fieldset>
    <legend>E D I T A R - C L I E N T E S </legend>
    <table border=1>
        <tr>
            <td>DNI DEL CLIENTES </td>
            <td><input type="number"  name="text1" id="text1" class="cd" value="<?php echo $cod; ?>"></td>
        </tr>
        <tr>
            <td>APELLIDOS DEL CLIENTE </td>
            <td><input type="text" name="text2" id="text2"  class="cd" value="<?php echo $des; ?>"></td>
        </tr>
        <tr>
            <td>NOMBRES DEL CLIENTE </td>
            <td><input type="text" name="text3" id="text3" class="cd" value="<?php echo $pre; ?>"></td>
        <tr>
            <td>TELEFONO </td>
            <td><input type="number" name="text4" id="text4" class="cd"  value="<?php echo $can; ?>"></td>
        </tr>
        <tr>
            <td>DIRECCION </td>
            <td><input type="text" name="text5" id="text5" class="cd"  value="<?php echo $dir; ?>"></td>
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
        $cio=$_POST['text5'];
        $modi=("update clientes set apellidos='$ape',nombres='$nom', RUC='$tlf',dir='$cio' where dni='$dni'");
        $result =$db_connect -> query($modi);
        echo "M O D I F I C A N D O ...";
        echo "<meta http-equiv='refresh' content='2;URL=clientes.php'>";
    }
?>
</form>
</body>
</html>