<?php
$id = uniqid();
?>
<html>
<head>
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.15.3/css/all.css" integrity="sha384-SZXxX4whJ79/gErwcOYf+zWLeJdY/qpuqC4cAa9rOGUstPomtqpuNWT9wdPEn2fk" crossorigin="anonymous">
    <script src="https://kit.fontawesome.com/e57084e9c3.js" crossorigin="anonymous"></script>
    <link href="../../css/estilosventas.css?v=<?php echo $id;?>" rel="stylesheet" type="text/css">
    <link href="../../css/multiprecios.css?v=<?php echo $id;?>" rel="stylesheet" type="text/css">
</head>
<body>
    <form name="frm_busprod" method="post" action="busprod.php">
        BUSCAR PRODUCTO
        <input  class="cd" type="text" name="bus">
        <input class="bt2"type="submit" name="buscar" value="BUSCAR">
    </form>
    <table border="1" width="100%">
        <thead>
            <tr>
                <th>OP.</th>
                <th>ID</th>
                <th>DESCRIPCIÓN</th>
                <th>PRECIOS</th>
            </tr>
        </thead>
        <tbody>
        <?php
        include '../database.php';
        $descripcion = isset($_POST['bus']) ? '%' . $_POST['bus'] . '%' : '%%';
        $db = new Database();
        $query = $db -> connect() -> prepare("SELECT * FROM productos WHERE descri LIKE :descripcion ORDER BY codigo ASC");
        $query -> execute([
            ':descripcion' => $descripcion
        ]);
        $rows = $query -> fetchAll(PDO::FETCH_ASSOC);
        foreach ($rows as $row) {
            $codigo = $row['codigo'];
            $descri = $row['descri'];
            $precios = json_decode($row['precio'], true);
            $tipo = $row['tipo'];
            echo '
            <tr>
                <td align="center">
                    <a href="agregar.php?id=' . $codigo . '" class="btn-op">
                        <i class="fa fa-cart-plus"></i>
                    </a>
                </td align="center">
                <td align="center">' . $codigo . '</td>
                <td align="left">' . $descri . '</td>
                <td align="center">
                    <div class="precios-tabla">
            ';
            foreach ($precios as $precio) {
                echo '
                    <span>' . number_format($precio, 2) . '</span>
                ';
            };
            echo '
                    </div>
                </td>
            </tr>
            ';
        };
        ?>
        <tbody>
   </table>
</body>
</html>