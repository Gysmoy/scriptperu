<?php
include '../database.php';
if (
    isset($_POST['codigo']) &&
    isset($_POST['descripcion']) &&
    isset($_POST['tipo']) &&
    isset($_POST['precios'])
) {
    $db = new Database();
    $query = $db -> connect() -> prepare('UPDATE productos SET
        descri = :descripcion,
        precio = :precios,
        tipo = :tipo
    WHERE codigo = :codigo
    ;');
    $query -> execute([
        ':codigo' => $_POST['codigo'],
        ':descripcion' => $_POST['descripcion'],
        ':precios' => $_POST['precios'],
        ':tipo' => $_POST['tipo']
    ]);
    echo '<meta http-equiv="refresh" content="1, URL=productos.php">';
}
?>
<html>
<head>
    <title>EDITOR-PRODUCTOS</title>
    <link href="../../css/estilospro.css" rel="stylesheet" type="text/css">
    <link href="../../css/estilosventas.css" rel="stylesheet" type="text/css">
    <link href="../../css/btn.css" rel="stylesheet" type="text/css">
    <meta http-equiv="expires" content="0">
    <meta http-equiv="Cache-Control" content="no-cache">
    <meta http-equiv="Pragma" CONTENT="no-cache">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.15.3/css/all.css" integrity="sha384-SZXxX4whJ79/gErwcOYf+zWLeJdY/qpuqC4cAa9rOGUstPomtqpuNWT9wdPEn2fk" crossorigin="anonymous">
    <script src="https://kit.fontawesome.com/e57084e9c3.js" crossorigin="anonymous"></script>
    <script type="text/javascript" src="../../js/jquery.min.js"></script>
</head>
<body>
    <?php
    $db = new Database();
    $query = $db -> connect() -> prepare('SELECT * FROM productos WHERE codigo = :id;');
    $query -> execute([
        ':id' => $_GET['id']
    ]);
    $row = $query -> fetch(PDO::FETCH_ASSOC);
    if ($row) {
        $codigo = $row['codigo'];
        $descripcion = $row['descri'];
        $precios = json_decode($row['precio'], true);
        $tipo = $row['tipo'];
    
    ?>
    <div>
        <fieldset>
            <legend>Editar un producto</legend>
            <form id="formulario" name="frm_man" method="post" action="prod_edit.php?id=<?php echo $_GET['id']?>" autocomplete="off">
                <table border="1">
                    <input 
                        type="hidden" name="codigo" class="cd"
                        size="50" value="<?php echo $codigo;?>">
                    <tr>
                        <td>DESCRIPCIÓN</td>
                        <td>
                            <input
                                type="text" name="descripcion" class="cd"
                                size="50" value="<?php echo $descripcion;?>">
                        </td>
                    </tr>
                    <tr>
                        <td>TIPO</td>
                        <td>
                            <input
                                type="text" name="tipo" class="cd"
                                size="50" list="lista-tipos" value="<?php echo $tipo;?>">
                        </td>
                    </tr>
                    <tr>
                        <td>PRECIO</td>
                        <td>
                            <input type="hidden" name="precios" value="<?php echo json_encode($precios)?>">
                            <div id="precios">
                            <?php
                            foreach ($precios as $precio) {
                                echo '<span title="Quitar">' . number_format($precio, 2) . '</span>';
                            }
                            ?>
                            </div>
                            <input style="display: none;" type="number" name="precio" id="precio" step="0.01">
                            <button type="button" id="addPrice">
                                <i class="fa fa-plus"></i>
                            </button>
                        </td>
                    </tr>
                </table>
    <?php } ?>
                <br>
                <script>
                $(document).ready(function() {
                    $('#addPrice').on('click', function() {
                        var input = $('#precio');
                        if (input.is(':visible')) {
                            $(this).html('<i class="fa fa-plus"></i>');
                            input.hide(250);
                            var precio = parseFloat(input.val());
                            if (!isNaN(precio) && precio != 0) {
                                $('#precios').append(`<span title="Quitar">${precio.toFixed(2)}</span>`);
                            };
                        } else {
                            $(this).html('<i class="fa fa-check"></i>');
                            input.show(250);
                            input.val(0);
                            input.focus().select();
                        }
                    });
                });
                $(document).on('click', '#precios span', function() {
                    $(this).remove();
                });
                var tosubmit = false;
                $('#formulario').on('submit', form => {
                    if (!tosubmit) {
                        form.preventDefault();
                        var precios = [];
                        $('#precios span').each(function() {
                            var precio = parseFloat($(this).text());
                            precios.push(precio);
                        });
                        $('[name="precios"]').val(JSON.stringify(precios));
                        console.log('Enviando...');
                        tosubmit = true;
                        $('#formulario').submit();
                    }
                });
                </script>
                <input type="submit" class="bt3" value="Guardar">
                <a class="bt3" href="productos.php">Cancelar</a>
                <datalist id="lista-tipos">
                <?php
                $db = new Database();
                $query = $db -> connect() -> prepare('SELECT tipo FROM productos GROUP BY tipo');
                $query -> execute();
                $rows = $query -> fetchAll(PDO::FETCH_ASSOC);
                foreach ($rows as $row) {
                    echo '
                    <option value="' . $row["tipo"] . '"></option>
                    ';
                };
                ?>
                </datalist>
            </form>
        </fieldset>
    </div>
</body>
</html>