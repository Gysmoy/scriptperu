<?php
session_start();
session_destroy();
session_unset();
$id = uniqid();
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <link href="css/estilos.css?v=<?php echo $id;?>" rel="stylesheet" type="text/css">
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta http-equiv="expires" content="0">
    <meta http-equiv="Cache-Control" content="no-cache">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.15.3/css/all.css" integrity="sha384-SZXxX4whJ79/gErwcOYf+zWLeJdY/qpuqC4cAa9rOGUstPomtqpuNWT9wdPEn2fk" crossorigin="anonymous">
    <script src="https://kit.fontawesome.com/e57084e9c3.js" crossorigin="anonymous"></script>
    <title>Iniciar Sesión</title>
</head>
<body>
    <fieldset class="formulario">
        <form action="index.php" name="frm_acc" method="post" >
            <a align=center >
                <img src="img/logocevi.png"  title="Lito's restobar">
            </a>
            <h2>Iniciar sesión</h2>
            <input type="text" name="txlog" class='cdt' placeholder="Nombre de usuario">
            <input type="password" name="txpas" class='cdt' placeholder="Clave de usuario">
            <p class="simple-text">¿Eres nuevo aquí? <a href="php/login/crearlogin.php">Crear cuenta</a>.</p>
            <button type="submit" class="btn">
                <i class="fa fa-user"></i>
                Acceder
            </button>
            <?php
            if (!empty($_POST['txlog']) == "") {
            }
            else {
                include("php/conectar.php");
                $bus=$_POST['txlog'];
                $buscar_usu = "SELECT * FROM `usuario` where login='$bus'";
                $res =$db_connect-> query($buscar_usu);
                if ($res -> num_rows > 0 ) {
                    while ($fila = $res -> fetch_assoc()) {
                        $log = $fila['login'];
                        $pas = $fila['pass'];
                        $nom = $fila['nombre'];
                        $dnii = $fila['dni'];
                        $tipo = $fila['tipo'];
                    }
                    if ($_POST['txlog'] == $log && $_POST['txpas'] == $pas ) {
                        session_start();
                        $_SESSION['session'] = true;
                        if ($tipo=='1')
                        {
                            echo "
                            <script>
                                var button = document.querySelector(`button[type='submit']`);
                                button.innerHTML = `
                                    <i class='fa fa-spin fa-circle-notch'></i>
                                    Accediendo
                                `;
                            </script>
                            <meta http-equiv='refresh' content='2;URL=php/paginap.php?id=$dnii'>
                            ";
                            $_SESSION['rol'] = 1;
                        } elseif ($tipo=='2') {
                            echo "
                            <script>
                            var button = document.querySelector(`button[type='submit']`);
                            button.innerHTML = `
                                <i class='fa fa-spin fa-circle-notch'></i>
                                Accediendo
                            `;
                            </script>
                            <meta http-equiv='refresh' content='2;URL=php/paginap2.php?id=$dnii'>
                            ";
                            $_SESSION['rol'] = 2;
                        }
                    }
                }
            }
            ?>
            <hr>
             
            <div class="form1">
                <h3 class="simple-text">Realize su Pedido</h3>
                <h4 class="simple-text">Escanee el Codigo Qr</h4>
                <img class="size" src="https://www.codigos-qr.com/qr/php/qr_img.php?d=http%3A%2F%2Flitos.scriptperu.com%2Fphp%2Fpedido%2Findex.php&s=8&e=m"/>
                <h4 class="simple-text">O Haga Click Aqui</h4><br>
                <a href="php/pedido/index.php"  class="btn" ><i class="fas fa-shopping-cart"></i><span> Hacer pedido</span></a>
             </div>
             </fieldset>
</form>
</body>
</html>