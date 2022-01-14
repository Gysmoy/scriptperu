<?php
include 'connect.php';
session_start();
if(isset($_SESSION['rol'])){
    switch($_SESSION['rol']){
        case 'admin':
            if (isset($_POST['name']) && isset($_POST['price']) && isset($_POST['type'])) {
                $type = $_POST['type'];
                $description = $_POST['name'];
                $price = $_POST['price'];
                if (!isset($_FILES["image"]) || $_FILES["image"]["error"] > 0) {
                    $image = '';
                } else {
                    $image = addslashes(file_get_contents($_FILES['image']['tmp_name']));
                }
                $sql = "INSERT INTO `carta` (type, description, price, image)
                    VALUES ('$type', '$description', '$price', '$image')";
                if ($db_connect -> query($sql)) {
                    header('location: ../../edit/');
                } else {
                    echo '<script>alert("Ocurrió un problema"); location.href = \'../../edit/\'</script>';
                }
            }
            break;
        default:
            session_unset(); 
            session_destroy();
            header('location: ../../');
            break;
    }
} else {
    session_unset(); 
    session_destroy();
    header('location: ../../');
}
?>