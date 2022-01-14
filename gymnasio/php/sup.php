<?php
$id = uniqid();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <link href="../css/sup.css?v=<?echo $id;?>" rel="stylesheet" type="text/css">
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.15.3/css/all.css" integrity="sha384-SZXxX4whJ79/gErwcOYf+zWLeJdY/qpuqC4cAa9rOGUstPomtqpuNWT9wdPEn2fk" crossorigin="anonymous">
    <script src="https://kit.fontawesome.com/e57084e9c3.js" crossorigin="anonymous"></script>
</head>

<body >
<?php
    include("conectar.php");
    $cod=$_GET['id'];
    $buscar="SELECT * FROM usuario where dni='$cod'";
    $result = $db_connect -> query($buscar);
    while ($fila = $result -> fetch_assoc() )
    {
        $nom = $fila['nombre'];
        $cor = $fila['login'];
    ?>
    <table width="100%">
        <tr>
            <td rowspan="2" width="100%" align="left">
                <img src="../img/logo1.png" width="17.4%">
            </td>
            <td rowspan="2">
                <i class="fa fa-user"></i>
            </td>
            <td class="no-margin" valign="bottom" height="50%">
                <span class="name"><?php echo $nom; ?></span>
            </td>
            <td rowspan="2">
                <a href="../index.php" target='_top' class="btn-sign-out">
                    <i class="fa fa-sign-out-alt"></i>
                <a>
            </td>
        </tr>
        <tr>
            <td class="no-margin" valign="top" height="50%">
                <span class="username"><?php echo "$cor"; ?></span>
            </td>
        </tr>
    </table>
<?php } ?>
</body>
</form>
</html>