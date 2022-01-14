<?php
include '../database.php';
?>
<html>
<head>
    <title>Productos</title>
    <link href="../../css/estilospro.css" rel="stylesheet" type="text/css">
    <link href="../../css/estilosventas.css?v=<?php echo $id;?>" rel="stylesheet" type="text/css">
    <link href="../../css/btn.css" rel="stylesheet" type="text/css">
    <meta http-equiv="expires" content="0">
    <meta http-equiv="Cache-Control" content="no-cache">
    <meta http-equiv="Pragma" CONTENT="no-cache">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.15.3/css/all.css" integrity="sha384-SZXxX4whJ79/gErwcOYf+zWLeJdY/qpuqC4cAa9rOGUstPomtqpuNWT9wdPEn2fk" crossorigin="anonymous">
    <script src="https://kit.fontawesome.com/e57084e9c3.js" crossorigin="anonymous"></script>
    <script type="text/javascript" src="../../js/jquery.min.js"></script>
</head>
<body>
    <h2>Productos</h2>
    <fieldset>
        <legend>Agregar un producto</legend>
        <form id="formulario" name="frm_man" method="post" action="productos.php" autocomplete="off">
            <table border="1">
                <tr>
                    <td>DESCRIPCIÓN</td>
                    <td><input type="text" name="descripcion" class="cd"  size="50"></td>
                </tr>
                <tr>
                    <td>TIPO</td>
                    <td><input type="text" name="tipo" class="cd"  size="50" list="lista-tipos"></td>
                </tr>
                <tr>
                    <td>PRECIO</td>
                    <td>
                        <input type="hidden" name="precios" value="">
                        <div id="precios"></div>
                        <input style="display: none;" type="number" name="precio" id="precio" step="0.01">
                        <button type="button" id="addPrice">
                            <i class="fa fa-plus"></i>
                        </button>
                    </td>
                </tr>
            </table>
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
            <input type="submit" class="bt3" value="Agregar" name="guardar">
            <input type="reset" class="bt3" value="Cancelar" name="cancelar">
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
    <?php
    if (
        isset($_POST['descripcion']) &&
        isset($_POST['tipo']) &&
        isset($_POST['precios'])
    ) {
        $db = new Database();
        $query = $db -> connect() -> prepare('INSERT INTO productos (
            descri, precio, tipo
        ) VALUES (
            :descripcion, :precios, :tipo
        );');
        $query -> execute([
            ':descripcion' => $_POST['descripcion'],
            ':precios' => $_POST['precios'],
            ':tipo' => $_POST['tipo']
        ]);
        echo '<meta http-equiv="refresh" content="1, URL=productos.php">';
    }
    ?>

    <fieldset>
        <legend>Lista de Productos</legend>
        <table border="1" width="100%">
            <thead>
                <tr>
                    <th align="center" >ID</th>
                    <th align="center" >DESCRIPCIÓN</th>
                    <th align="center" >TIPO</th>
                    <th align="center" >PRECIO</th>
                    <th align="center" >ACCIÓN</th>
                </tr>
            </thead>
            <tbody>
            <?php
            $db = new Database();
            $query = $db -> connect() -> prepare('SELECT * FROM productos;');
            $query -> execute([]);
            $rows = $query->fetchAll(PDO::FETCH_ASSOC);
            foreach ($rows as $row) {
                $codigo = $row['codigo'];
                $descripcion = $row['descri'];
                $tipo = $row['tipo'];
                $precios = json_decode($row['precio'], true);
                echo '
                <tr>
                    <td valign="middle" align="CENTER">' . $codigo . '</td>
                    <td valign="middle" align="left">' . $descripcion . '</td>
                    <td valign="middle" align="left">' . $tipo . '</td>
                    <td valign="middle" align="center">
                        <div class="precios-tabla">
                ';
                foreach ($precios as $precio) {
                    echo '<span>' . number_format($precio, 2) . '</span>';
                }        
                echo '
                        </div>
                    </td>
                    <td valign="middle" align="center">
                        <a  href="prod_edit.php?id='.$codigo.' " title="Editar">
                            <i class="fa fa-edit"></i>
                        </a>
                        <a  href="prod_eli.php?id='.$codigo.' " title="Eliminar">
                            <i class="fa fa-trash"></i>
                        </a>
                    </td>
                </tr>
                ';
            }
            ?>
            </tbody>        
        </table>
    </fieldset>
</body>
</html>