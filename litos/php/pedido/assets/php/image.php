<?php
if(!empty($_GET['id'])){
    include 'connect.php';

    // Obteniendo datos de la imagen
    $result = $db_connect -> query("SELECT image FROM carta WHERE id = {$_GET['id']}");
    
    if($result -> num_rows > 0){
        $imgData = $result -> fetch_assoc();
        
        // Renderizando la imagen
        header("Content-type: image/jpg"); 
        echo $imgData['image'];
    }else{
        echo 'No disponible';
    }
}
?>