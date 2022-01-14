<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="../css/style.css">
    <link rel="stylesheet" href="../css/style2.css">
    <title>Gimnasia Rocka's</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@100;400&display=swap" rel="stylesheet">
</head>

<script languaje="Javascript">   
    document.write('<style type="text/css">div.cp_oculta{display: none;}</style>');  
    function MostrarOcultar(capa,enlace)  
    {  if (document.getElementById)      {  
        var aux = document.getElementById(capa).style;  aux.display = aux.display? "":"block";  
    } }  
</script>

<body>

<a href="clientes/alumno.php"  target="izquierda" class="btn"><span>Alumno</span></a><br>
<a href="prof/profesor.php"  target="izquierda" class="btn"><span>Profesores</span></a><br>
<a href="usuario/usu.php" target="izquierda" class="btn"><span>Usuarios</span></a><br>
<a href="mod/mod.php" target="izquierda" class="btn"><span>Modalidad</span></a><br>
<a href="hora/hora.php" target="izquierda" class="btn"><span>Horario</span></a><br>
<hr>
<a href="matri/matricula.php" target="izquierda" class="otr"><span>Matriculas</span></a><br>
<a href="javascript:MostrarOcultar('texto1');" class="otr">  
    <span>Reportes</span>
</a>
<div class="cp_oculta" id="texto1"> 
    <br>
    <button type="button" role="link" onclick="parent.izquierda.location.href='reportes/vendihoy.php'" class="btn1">
            Ventas del día</button><br>
        <br>
    <button type="button" role="link" onclick="parent.izquierda.location.href='reportes/vendihoy.php'" class="btn1">
            Ventas por Fechas</button><br>
        <br>
    <button type="button" role="link" onclick="parent.izquierda.location.href='reportes/vendihoy.php'" class="btn1">
            Imprimir Doc.</button><br>
</div>
<br>
<a href="../index.php" target="_top" class="btn"><span>Salir</span></a>


</body>
</html>