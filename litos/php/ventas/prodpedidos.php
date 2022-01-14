<?php
include '../database.php';
if (
    isset($_POST['codigo']) &&
    isset($_POST['precio']) &&
    isset($_POST['cantidad'])
) {
    $db = new Database();
    $query = $db -> connect() -> prepare('UPDATE tmpventas SET
        precio = :precio,
        cant = :cantidad
    WHERE codpro = :codigo
    ;');
    $query -> execute([
        ':precio' => $_POST['precio'],
        ':cantidad' => $_POST['cantidad'],
        ':codigo' => $_POST['codigo']
    ]);
    echo "
        Actualizando...
        <meta http-equiv='refresh' content='1;URL=documento.php'>
    ";
};
?>

<html>
<head>
    <title>EDITOR-PRODUCTOS</title>
    <link href="../../css/estilosventas.css" rel="stylesheet" type="text/css">
    <link href="../../css/btn.css" rel="stylesheet" type="text/css">
</head>
<body>
<?php

$db = new Database();
$query = $db -> connect() -> prepare('SELECT
    v.*, p.precio AS precios
FROM tmpventas v INNER
JOIN productos p ON v.codpro = p.codigo
WHERE v.codpro = :codigo
;');
$query -> execute([
    ':codigo' => $_GET['id']
]);
$row = $query -> fetch(PDO::FETCH_ASSOC);
if ($row) {
    $codigo = $row['codpro'];
    $descripcion = $row['descripcion'];
    $precios = json_decode($row['precios'], true);
    $precio = $row['precio'];
    $cantidad = $row['cant'];
?>
    <fieldset>
        <legend>E D I T A R - P R O D U C T O S </legend>        
        <form  name="frm-modificar" method="post" action="prodpedidos.php?id=<?php echo $codigo; ?>" >
            <div class="mx-3">
                <label>CÓDIGO DEL PRODUCTO </label><br>
                <input type="text"  name="codigo" id="text1" class="cd" value="<?php echo $codigo; ?>" readonly size="50">
            </div>
            <div class="">
                <label>DESCRIPCIÓN DEL PRODUCTO </label><br>
                <input type="text" name="descripcion" id="text2" class="cd" value="<?php echo $descripcion; ?>" readonly size="50">
            </div>
            <div class="">
                <label>PRECIO DEL PRODUCTO </label><br>
                <select name="precio">
                <?php
                foreach ($precios as $p) {
                    $selected = $p == $precio ? 'selected': '';
                    echo '
                    <option value="'.$p.'" '.$selected.'>S/ ' .number_format($p, 2). '</option>
                    ';
                };
                ?>
                </select>
            </div>
            <div class="">
                <label>CANTIDAD DEL PRODUCTO </label><br>
                <input type="number" name="cantidad" id="text4" class="cd" value="<?php echo $cantidad; ?>"  >
            </div>
            <input type="submit" class="bt3" value="Modificar" >
        </form>
    </fieldset>
    <?php }; ?>
<body>  
</form>
</body>
</html>