<?php 
session_start();

if(isset($_GET['logout'])){
    session_unset(); 
    session_destroy();
    header('location: index.php');
}

if(isset($_SESSION['rol'])){
    switch($_SESSION['rol']){
        case 'admin':
            break;
        default:
            session_unset(); 
            session_destroy();
            header('location: index.php');
            break;
    }
}

if(isset($_POST['username']) && isset($_POST['password'])){
    $user = 'admin';
    $pass = 'admin';
    $username = $_POST['username'];
    $password = $_POST['password'];
    
    if($username == $user && $password == $pass){
        $_SESSION['rol'] = 'admin';
        header('location: index.php');
    } else{
        session_unset(); 
        session_destroy();
        header('location: index.php');
    }
}
echo '
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../assets/css/edit.css">
    <link rel="stylesheet" href="../assets/css/add.css">
    <script src="../assets/js/jquery-3.5.1.min.js" type="text/javascript"></script>
</head>
<body>
';

if (!isset($_SESSION['rol'])) {
    echo '
    <div id="login">
        <title>Login | Chifa Raúl</title>
        <form action="" method="post" autocomplete="off">
            <center>
                <img src="../img/logo.png" alt="">
                <h2>Login | Chifa Raúl</h2>
                <p>Bienvenido al centro de edición de la carta.</p>
                <input type="text" name="username" placeholder="Usuario"><br>
                <input type="password" name="password" placeholder="Contraseña"><br>
                <input type="submit" value="Iniciar sesión">
            </center>
        </form>
    </div>
    ';
} else {
?>
    <div id="edit">
        <title>Centro de Edición</title>
        <header>
            <h2>Centro de edición</h2>
            <a href="?logout=1">Cerrar sesión</a>
        </header>
        <main>
            <button class="btn" onclick="efectoToggle('add')">☍ Agregar un nuevo insumo</button>
            <div id="add">    
                <form action="../assets/php/add.php" method="post" enctype="multipart/form-data">
                    <center>    
                        <input type="file" name="image">
                    </center>
                    <textarea name="name" rows="2" placeholder="Nombre del insumo"></textarea>
                    <input type="number" name="price" step="0.05" placeholder="Precio del insumo">
                    <select name="type">
                        <option value="chifa">Chifa (defecto)</option>
                        <option value="burguer">Hamburguesa</option>
                        <option value="bebida">Bebida</option>
                    </select>
                    <center>
                        <input type="submit" value="✔ Agregar">
                        <input type="reset" value="✘ Cancelar">
                    </center>
                </form>
            </div>
            <button class="btn" onclick="efectoToggle('chifa')">☍ Editar Chifa</button>
            <div id="chifa">    
                <table>
                    <thead>
                        <tr>
                            <td width="1%">Imagen</td>
                            <td width="99%">Nombre</td>
                            <td>Precio</td>
                            <td>Acción</td>
                        </tr>
                    </thead>
                    <tbody>
                    <?php
                    include '../assets/php/connect.php';
                    $sql_chifa = "SELECT * FROM `carta` WHERE `type` = 'chifa' ORDER BY `carta`.`id` ASC";
                    $result_chifa = $db_connect -> query($sql_chifa);
                    if ($result_chifa -> num_rows > 0) {
                        while ( $rows = $result_chifa -> fetch_assoc() ) {
                            $code = $rows['id'];
                            $name = $rows['description'];
                            $price = $rows['price'];
                            echo '
                        <tr>
                            <td valign="middle" align="center"><img id="image' . $code . '" src="../assets/php/image.php?id=' . $code . '" width="100" height="60"></td>
                            <td valign="middle" align="left" id="name' . $code . '">' . $name . '</td>
                            <td valign="middle" align="center" id="price' . $code . '">' . $price . '</td>
                            <td valign="middle" align="center">
                                <button onclick="edit(' . $code . ')">Editar</button><br>
                                <button onclick="location.href=\'../assets/php/delete.php?id=' . $code . '\'" class="delete">Quitar</button>
                            </td>
                        </tr>
                            ';
                        }
                    }
                    ?>
                    </tbody>
                </table>
            </div>
            <button class="btn" onclick="efectoToggle('burguer')">☍ Editar Hamburguesas</button>
            <div id="burguer">    
                <table>
                    <thead>
                        <tr>
                            <td width="1%">Imagen</td>
                            <td width="99%">Nombre</td>
                            <td>Precio</td>
                            <td>Acción</td>
                        </tr>
                    </thead>
                    <?php
                    include '../assets/php/connect.php';
                    $sql_burguer = "SELECT * FROM `carta` WHERE `type` = 'burguer' ORDER BY `carta`.`id` ASC";
                    $result_burguer = $db_connect -> query($sql_burguer);
                    if ($result_burguer -> num_rows > 0) {
                        while ( $rows = $result_burguer -> fetch_assoc() ) {
                            $code = $rows['id'];
                            $name = $rows['description'];
                            $price = $rows['price'];
                            echo '
                        <tr>
                            <td valign="middle" align="center"><img id="image' . $code . '" src="../assets/php/image.php?id=' . $code . '" width="100" height="60"></td>
                            <td valign="middle" align="left" id="name' . $code . '">' . $name . '</td>
                            <td valign="middle" align="center" id="price' . $code . '">' . $price . '</td>
                            <td valign="middle" align="center">
                                <button onclick="edit(' . $code . ')">Editar</button><br>
                                <button onclick="location.href=\'../assets/php/delete.php?id=' . $code . '\'" class="delete">Quitar</button>
                            </td>
                        </tr>
                            ';
                        }
                    }
                    ?>
                </table>
            </div>
            <button class="btn" onclick="efectoToggle('bebidas')">☍ Editar Bebidas</button>
            <div id="bebidas">    
                <table>
                    <thead>
                        <tr>
                            <td width="1%">Imagen</td>
                            <td width="99%">Nombre</td>
                            <td>Precio</td>
                            <td>Acción</td>
                        </tr>
                    </thead>
                    <?php
                    include '../assets/php/connect.php';
                    $sql_bebida = "SELECT * FROM `carta` WHERE `type` = 'bebida' ORDER BY `carta`.`id` ASC";
                    $result_bebida = $db_connect -> query($sql_bebida);
                    if ($result_bebida -> num_rows > 0) {
                        while ( $rows = $result_bebida -> fetch_assoc() ) {
                            $code = $rows['id'];
                            $name = $rows['description'];
                            $price = $rows['price'];
                            echo '
                        <tr>
                            <td valign="middle" align="center"><img id="image' . $code . '" src="../assets/php/image.php?id=' . $code . '" width="100" height="60"></td>
                            <td valign="middle" align="left" id="name' . $code . '">' . $name . '</td>
                            <td valign="middle" align="center" id="price' . $code . '">' . $price . '</td>
                            <td valign="middle" align="center">
                                <button onclick="edit(' . $code . ')">Editar</button><br>
                                <button onclick="location.href=\'../assets/php/delete.php?id=' . $code . '\'" class="delete">Quitar</button>
                            </td>
                        </tr>
                            ';
                        }
                    }
                    ?>
                </table>
            </div>
        </main>
    </div>
    <div id="frame-edit">
        <button onclick="cancelEdit()">✗</button>
        <form action="../assets/php/edit.php" method="post" id="form-edit" enctype="multipart/form-data">
            <h2>Editar producto</h2>
            <center>
            <input type="hidden" name="code" id="code" value="">
            <img src="" alt="" width="200" height="120" id="image-prev"><br>
            <input type="file" name="image" id="image" value=""/><br>
            <input type="submit" name="tipoCambio" value="Actualizar imagen">
            <textarea type="text" name="name" id="name" placeholder="Nombre del producto"  rows="2"></textarea><br>
            <input type="number" name="price" id="price" step="0.05" value="" placeholder="Precio en soles"/><br>
            <input type="submit" name="tipoCambio" value="Actualizar datos">
            </center>
        </form>
    </div>
<?php
}
?>
    <script src="../assets/js/edit.js" type="text/javascript"></script>
</body>
</html>