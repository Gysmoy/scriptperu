<html>
<title>Pagina Principal</title>
<head>
</head>
<frameset rows="10%,*">

<?php 
       $cod=$_GET['id'];
       echo "<frame name='superior' src='superior.php?id=$cod' marginwidth='15' marginheight='5' scrolling='SI' frameborder='0'>";
?>
   <frameset cols="20%,*">
    <frame name="arriba" src="menu.php" noresize="noresize" marginwidth="10" marginheight="10" 
        scrolling="SI" frameborder="1">
     <frameset cols="75%,1">
      <frame name="izquierda" src="central.php" marginwidth="10" marginheight="10" 
        scrolling="SI" frameborder="0">
</frameset>
</frameset>
</frameset>
</html>