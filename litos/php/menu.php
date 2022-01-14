<?php
$id = uniqid();
?>
<html>
<link href="../css/estilosmen.css?v=<?echo $id;?>" rel="stylesheet" type="text/css">

<script languaje="Javascript">   
    document.write('<style type="text/css">div.cp_oculta{display: none;}</style>');  
    function MostrarOcultar(capa,enlace)  
    {  if (document.getElementById)      {  
        var aux = document.getElementById(capa).style;  aux.display = aux.display? "":"block";  
    } }  
</script>

<body style="background-color:#D6DBDF ;">
<a href="ventas/documento.php" class="button-64" target="izquierda"><span class="text">Ventas</span></a><BR>
<a href="javascript:MostrarOcultar('texto1');" class="button-64">  
    <span class="text">Reportes</span>
</a>
<div class="cp_oculta" id="texto1"> 
    <br>
    <button type="button" class="button-64" role="link" onclick="parent.izquierda.location.href='reportes/vendihoy.php'" >
            Ventas del día</button>
        <br><br>
    <button type="button" class="button-64" role="link" onclick="parent.izquierda.location.href='reportes/vendidos.php'" >
            Ventas por Fechas</button>
        <br><br>
    <button type="button" class="button-64" role="link" onclick="parent.izquierda.location.href='reportes/vendihoy.php'" >
            Imprimir Doc.</button>
</div>
<br>
<a href="productos/productos.php" class="button-64" target="izquierda"><span class="text">Productos</span></a><BR>
<a href="clientes/clientes.php" class="button-64" target="izquierda"><span class="text">Clientes</span></a><BR>
<a href="usuarios/usuarios.php" class="button-64" target="izquierda"><span class="text">Usuarios</span></a><br>

<br><br>
<a href="#" class="button-64" ><span class="text">SALIR</span></a>

</body>
</html>