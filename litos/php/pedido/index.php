<?php
include 'assets/php/functions.php';

// Declaración de variables
$count_select = 0;

?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Chifa Raúl</title>
    <link rel="stylesheet" href="assets/css/style.css">
    <script type="text/javascript" src="assets/js/jquery-3.5.1.min.js"></script>
</head>
<body>
    <header>
        <img id="logo" src="img/logo.png" alt="logo-chifa-raul">
        <div id="navegacion">
            <button id="btn-chifa">Mariscos</button>
            <button id="btn-burguer">Especiales</button>
            <button id="btn-bebidas">Bebidas</button>
        </div>
    </header>
    <hr id="hr-header">
    <form action="assets/php/order.php" method="POST" id="form">
        <div id="chifa">
            <h3>Chifa</h3>
            <table>
                <thead>
                    <tr>
                        <td width="1%">Muestra</td>
                        <td width="99%">Nombre</td>
                        <td>Precio</td>
                        <td>Ordenar</td>
                    </tr>
                </thead>
                <tbody>
                <?php
                datosTabla('chifa', $count_select, 10)
                ?>
                </tbody>
            </table>
        </div>
        <div id="burguer">
            <h3>Hamburguesas</h3>
            <table>
                <thead>
                    <tr>
                        <td width="1%">Muestra</td>
                        <td width="99%">Nombre</td>
                        <td>Precio</td>
                        <td>Ordenar</td>
                    </tr>
                </thead>
                <tbody>
                <?php
                datosTabla('burguer', $count_select, 5)
                ?>
                </tbody>
            </table>
        </div>
        <div id="bebidas">
            <h3>Bebidas</h3>
            <table>
                <thead>
                    <tr>
                        <td width="1%">Muestra</td>
                        <td width="99%">Nombre</td>
                        <td>Precio</td>
                        <td>Ordenar</td>
                    </tr>
                </thead>
                <tbody>
                <tbody>
                <?php
                datosTabla('bebida', $count_select, 10)
                ?>
                </tbody>
            </table>
        </div>
        <div id="elegidos">
            <hr>
            <h3>Platos Elegidos</h3>
            <table>
                <thead>
                    <tr>
                        <td width="1%">✗</td>
                        <td width="99%">Nombre</td>
                        <td>Precio</td>
                        <td>Cant.</td>
                        <td>Subtotal</td>
                    </tr>
                </thead>
                <tbody id="list-elegidos">
                </tbody>
            </table>
        </div>
        <div id="ordenar">
            <button type="submit" id="btn-ordenar"></button>
            <span class="reset" id="btn-reset" title="Cancelar" onclick="resetear()">✘</span>
        </div>
    </form>
    <br><br><br><br>
    <script type="text/javascript" src="assets/js/toggle.js"></script>
    <script type="text/javascript" src="assets/php/data.php"></script>
</body>
</html>