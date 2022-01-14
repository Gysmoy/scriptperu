<?php
function datosTabla($type, $count_select, $platos) {
    include 'connect.php';
    $sql = "SELECT * FROM `carta` WHERE `type` = '$type' ORDER BY `carta`.`id` ASC";
    $result = $db_connect -> query($sql);
    if ($result -> num_rows > 0) {
        while ( $rows = $result -> fetch_assoc() ) {
            $code = $rows['id'];
            $name = $rows['description'];
            $price = $rows['price'];
            echo '
        <tr>
            <td valign="middle" align="center"><img src="assets/php/image.php?id=' . $code . '" width=100 height=60></td>
            <td valign="middle" align="left" id="name' . $count_select . '">' . $name . '</td>
            <td valign="middle" align="center"><p class="precio">S/' . $price . '</p></td>
            <td valign="middle" align="center">
                <select name="select' . $code . '" id="select' . $count_select . '" onchange="total()">
                    <option value="0">&#128722;</option>
                    <option value="1">1</option>
            ';
            for ($i = 2; $i <= $platos ; $i++) { 
                echo '<option value="'.$i.'">'.$i.'</option>';
            }
            echo '
                </select>
            </td>
        </tr>
            ';
            $count_select += 1;
        }
    } else {
        echo '';
    }
    return $count_select;
}
?>