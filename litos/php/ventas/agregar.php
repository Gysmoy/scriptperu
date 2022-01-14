<?php
include '../database.php';
if (
    isset($_POST['codigo']) &&
    isset($_POST['descripcion']) &&
    isset($_POST['precio']) &&
    isset($_POST['cantidad'])
) {
    $db = new Database();
    $query = $db -> connect() -> prepare('INSERT INTO tmpventas 
             VALUES (:codigo, :descripcion, :cantidad, :precio
    )');
    $query -> execute([
        ':codigo' => $_POST['codigo'],
        ':descripcion' => $_POST['descripcion'],
        ':precio' => $_POST['precio'],
        ':cantidad' => $_POST['cantidad']
    ]);
    echo '
    <meta http-equiv="refresh" content="1;URL=documento.php">
    ';
}
?>
<html>
<head>
    <title>EDITOR-PRODUCTOS</title>
    <link href="../../css/estilosventas.css" rel="stylesheet" type="text/css">
</head>
<body>
    <?php
    $db = new Database();
    $query = $db -> connect() -> prepare('SELECT * FROM productos WHERE codigo = :codigo;');
    $query -> execute([
        ':codigo' => $_GET['id']
    ]);
    $row = $query -> fetch(PDO::FETCH_ASSOC);
    if ($row) {
        $codigo = $row['codigo'];
        $descripcion = $row['descri'];
        $precios = json_decode($row['precio'], true);
        $tipo = $row['tipo'];
    ?>
    <div >
        <fieldset>
            <legend>AGREGAR PRODUCTO AL CARRITO</legend>
            <form  name="frm-modificar" method="post" action="agregar.php?id=<?php echo $codigo; ?>" >
                <div>
                    <label>CÓDIGO DEL PRODUCTO </label><br>
                    <input type="text"  name="codigo" class="cd" value="<?php echo $codigo; ?>" readonly size="50">
                </div>
                <div>
                    <label>DESCRIPCIÓN DEL PRODUCTO </label><br>
                    <input type="text" name="descripcion" class="cd" value="<?php echo $descripcion; ?>" readonly size="50">
                </div>
                <div>
                    <label>PRECIO DEL PRODUCTO </label><br>
                    <select name="precio" class="cd">
                    <?php
                    foreach($precios as $precio) {
                        echo '
                        <option value="' . $precio . '">S/ ' . number_format($precio, 2) . '</option>
                        ';
                    }
                    ?>
                    </select>
                </div>
                <div>
                    <label>CANTIDAD DEL PRODUCTO </label><br>
                    <input type="number" name="cantidad" class="cd" value=""  >
                </div>
                <br>
                <input type="submit" class="bt1" value="AGREGAR AL CARRITO">
                <a href="busprod.php" class="bt1">CANCELAR</a>
            </form>
        </fieldset>
    </div>
    <?php
    };
    ?>
</body>
</html>