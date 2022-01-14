<!DOCTYPE html>
<html>
    <link rel="shortcut icon" href="../img/favicon.ico">
    <title>Gimnasia Rocka's</title>
<head>    
</head>

<frameset rows="10%,*" border="0">

<?php 
       $cod=$_GET['id'];
       echo "<frame name='superior' src='sup.php?id=$cod' marginwidth='15' marginheight='5' frameborder='0'>";
?>
   <frameset cols="15%,*">

    <frame name="arriba" src="menu.php" noresize="noresize" marginwidth="10" marginheight="10" 
        scrolling="SI" frameborder="1">
     <frameset cols="85%,1">

      <frame name="izquierda" src="center.php" marginwidth="10" marginheight="10" 
        scrolling="SI" frameborder="0">
</frameset>
</frameset>
</frameset>

</html>