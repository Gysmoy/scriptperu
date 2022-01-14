<?php
include 'connect.php';
if (isset($_POST['code'])) {

    // Obtención de los datos
    $id = $_POST['code'];
    $name = $_POST['name'];
    $precio = $_POST['price'];

    switch ($_POST['tipoCambio']) {
        case 'Actualizar imagen':
            if (!isset($_FILES["image"]) || $_FILES["image"]["error"] > 0) {
                echo '<script>alert("Ha ocurrido un error"); location.href = \'../../edit/\'</script>';
            } else {
                $image = $_FILES['image']['tmp_name'];
                $imgContent = addslashes(file_get_contents($image));

                $sql = "UPDATE `carta` SET `carta`.`image`='$imgContent' WHERE `carta`.`id`=$id";
                if($db_connect -> query($sql)){
                    header('location: ../../edit/');
                } else {
                    echo '<script>alert("No se pudo actualizar la imagen, revise que el archivo sea menor a 16MB"); location.href = \'../../edit/\'</script>';
                }
            }
            break;
        case 'Actualizar datos':
            $sql = "UPDATE `carta` SET `carta`.`description`='$name', `carta`.`price`=$precio WHERE `carta`.`id`=$id";
            if ($db_connect -> query($sql)) {
                header('location: ../../edit/');
            } else {
                echo '<script>alert("No se pudo editar"); location.href = \'../../edit/\'</script>';
            }
            break;
        default:
            header('location: ../../');
            break;
    }
} else {
    header('location: ../../');
}
?>