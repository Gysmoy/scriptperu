<?php
include 'connect.php';
session_start();
if(isset($_SESSION['rol'])){
    switch($_SESSION['rol']){
        case 'admin':
            if (isset($_GET['id'])) {
                $id = $_GET['id'];
                $sql = "DELETE FROM `carta` WHERE `carta`.`id` = $id";
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