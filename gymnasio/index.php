<!DOCTYPE html>
<html lang="es">
<head>
    <link rel="shortcut icon" href="img/favicon.ico">
    <link rel="stylesheet" href="css/form.css">
    <meta charset="UTF-8">
    <title>Iniciar Sesión</title>
</head>
<body style="background-color: #010001;">
<div class="login-box">
<img class="avatar" src="img/logop2.png" alt="Logo Tienda">	
	<h1>Gimnasio Rocka's</h1>
	<form name="frm_acc" method="post" action="index.php">

	<label>Usuario</label>
	<input type="text" name="txlog" placeholder="Ingrese Usuario"><br>
	<label>Contraseña</label>
	<input type="password" name="txpas" placeholder="Ingrese Contraseña"><br>
    <input type="submit" name="acceso" value="Acceder"><br>
            <?php
            if (!empty($_POST['txlog'])=="") {
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
                    if($_POST['txlog']==$log && $_POST['txpas']==$pas )
                    {
                        echo "<meta http-equiv='refresh' content='1;URL=php/marco.php?id=$dnii'>";
                    }
                else
                    {
                        echo "Existe un Error de Acceso";
                    }	
                        
                }
            }
            ?>
        </form>
    </fieldset> 
</body>
</html>