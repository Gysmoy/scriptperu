let precios = [
<?php
include 'connect.php';
// Platos de Chifa
$sql_chifa = "SELECT * FROM `carta` WHERE `type` = 'chifa' ORDER BY `carta`.`id` ASC";
$result_chifa = $db_connect -> query($sql_chifa);
if ($result_chifa -> num_rows > 0) {
    while ( $rows = $result_chifa -> fetch_assoc() ) {
        $price = $rows['price'];
        echo $price . ', ';
    }
}
// Hamburguesas
$sql_burguer = "SELECT * FROM `carta` WHERE `type` = 'burguer' ORDER BY `carta`.`id` ASC";
$result_burguer = $db_connect -> query($sql_burguer);
if ($result_burguer -> num_rows > 0) {
    while ( $rows = $result_burguer -> fetch_assoc() ) {
        $price = $rows['price'];
        echo $price . ', ';
    }
}
// Bebidas
$sql_bebida = "SELECT * FROM `carta` WHERE `type` = 'bebida' ORDER BY `carta`.`id` ASC";
$result_bebida = $db_connect -> query($sql_bebida);
if ($result_bebida -> num_rows > 0) {
    while ( $rows = $result_bebida -> fetch_assoc() ) {
        $price = $rows['price'];
        echo $price . ', ';
    }
}
?>
]

function total() {
    var cantidad = document.getElementsByTagName("select");
    var suma = 0;
    var listElegidos = document.getElementById("list-elegidos");
    listElegidos.innerHTML = "";
    for (var i = 0; i < cantidad.length; i++) {
        suma = suma + (precios[i] * cantidad[i].value);
        if (cantidad[i].value > 0) {
            $("#select" + i).css({
                "background": "var(--rojo)",
                "color": "var(--blanco)",
            })
            var nombre = document.getElementById("name" + i).innerHTML;
            listElegidos.innerHTML += "<tr>" +
                '<td valign="middle" align="center"><p class="delete" title="Quitar" onclick="resetOne(' + i + ')">✗</p></td>' +
                '<td valign="middle">' + nombre + '</td>' +
                '<td valign="middle" align="center">S/' + precios[i].toFixed(2) + '</td>' +
                '<td valign="middle" align="center">' + cantidad[i].value + '</td>' +
                '<td valign="middle" align="center"><p class="precio">S/' + (precios[i] * cantidad[i].value).toFixed(2) + '</td>' +
                "</tr>";
        } else {
            $("#select" + i).css({
                "background": "var(--blanco)",
                "color": "var(--rojo)",
            })
        }
    }
    $("#btn-ordenar").text("🛒 Realizar pedido S/" + suma.toFixed(2));
    if (suma == 0) {
        $("#btn-ordenar").hide(250);
        $("#btn-reset").hide(250);
        $("#elegidos").hide(250);
    } else {
        $("#btn-ordenar").show(250);
        $("#btn-reset").show(250);
        $("#elegidos").show(250);
    }
}

function resetear() {
    document.getElementById("form").reset();
    total();
}
function resetOne(borrar) {
    document.getElementById("select" + borrar).value = 0;
    total();
}