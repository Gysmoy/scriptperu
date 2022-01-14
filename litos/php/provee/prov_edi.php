<html>
    <title>EDITOR-PRODUCTOS</title>
    <link href="../../css/estilospro.css" rel="stylesheet" type="text/css">
    <body >
<form  name="frm-modificar" method="post" action="prov_edi.php?id=$cod" >
<?php
include("../conectar.php");
$sql_prod = "SELECT * FROM `proveedor` where codigo='".$_GET['id']."' ";
$result_prod = $db_connect -> query($sql_prod);

if ($result_prod -> num_rows > 0) {
    while ($fila = $result_prod -> fetch_assoc() )
{
    $cod=$fila['codigo'];
    $des=$fila['nombre'];
    $pre=$fila['contac'];
    $can=$fila['empre'];
    $tlf=$fila['telefono'];
?>
<div >
    <fieldset>
        <legend>E D I T A R - P R O V E E D O R </legend>        
        <div class="mx-3">
            <label>CÓDIGO DEL PROVEEDOR </label><br>
            <input type="text"  name="text1" id="text1" class="cd" value="<?php echo $cod; ?>" readonly size="50">
        <div class="">
            <label>NOMBRE DEL PROVEEDOR </label><br>
            <input type="text" name="text2" id="text2" class="cd" value="<?php echo $des; ?>" size="50">
        <div class="">
            <label>CONTACTO </label><br>
            <input type="text" name="text3" id="text3" class="cd" value="<?php echo $pre; ?>" size="50">
        <div class="">
            <label>NOM. EMPRESA </label><br>
            <input type="text" name="text4" id="text4" class="cd" value="<?php echo $can; ?>" size="50" >
        <div class="">
            <label>TELEFONO </label><br>
            <input type="number" name="text5" id="text5" class="cd" value="<?php echo $tlf; ?>"  >
        </div>
        </div>
        </div>
        </div>     
        </div>
        </div>

        <?php } } ?><br>        
</fieldset>
<input type="submit" class="bt1" value="Modificar" >
<?php
    include("../conectar.php");
    if(!empty($_POST)=="")
    {}
    else
    {
        $codi=$_POST['text1'];
        $desc=$_POST['text2'];
        $prec=$_POST['text3'];
        $cant=$_POST['text4'];
        $tlf=$_POST['text5'];
        $modi=("update proveedor set nombre='$desc',contac='$prec',empre='$cant' ,telefono='$tlf' where codigo='$codi'");
        $result =$db_connect -> query($modi);
        echo "<meta http-equiv='refresh' content='2;URL=proveedor.php'>";
    }
?>
</form>
</body>
</html>