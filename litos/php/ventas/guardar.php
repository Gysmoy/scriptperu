<?php 
/* conectar base de datos*/
include("../conectar.php");

/* variables iniciales*/
$mov=strtotime('now');
$fec = date("Y-m-d");
$hor = date("H:i:s");
$ven= '12345678';
$tot= 0;
$nb= 0;

/* crear el numero de Boleta*/
    $nbol= "select * from ventas";
    $bol = $db_connect -> query($nbol);
    while($nbol = $bol -> fetch_assoc())
    {   $nb=$nb+1;  }
    $nbb='0000' .($nb+1);

/* contar registros para poder guardar*/
    $cven= "select * from tmpventas";
    $conven = $db_connect -> query($cven);
    while($cven = $conven -> fetch_assoc())
    {   $t=$t+1;  }

/* preguntar para guardar*/
   if ($t>0)
    {
        /* encontrando monto total*/
        $rven= "select * from tmpventas";
        $resven = $db_connect -> query($rven);
        while($fven = $resven -> fetch_assoc())
        {   
            $t=$fven['cant'] * $fven['precio']; 
            $tot=$tot+$t; 
            
            }

        /* encontrando el dni del cliente*/
        $cli = "select * from tmpclientes";
        $rescli = $db_connect -> query($cli);
        while($fcli = $rescli -> fetch_assoc())
        {   $dni=$fcli['dni'];   }

        /* guardar en la tabla ventas*/
        $modi=("insert into ventas (coddoc,numdoc,montot,fecha,hora,dni,vendedor) 
                values('$mov','$nbb','$tot','$fec','$hor','$dni','$ven')");
            $result= $db_connect -> query($modi);

         /* guardar en la tabla detalle de ventas*/
        $tven = "select * from tmpventas";
        $restv = $db_connect -> query($tven);
        while($ftv = $restv -> fetch_assoc())
        {   $can=$ftv['cant']; 
            $pre=$ftv['precio'];
            $cpr=$ftv['codpro'];

            $modi2=("insert into detalleven (coddoc,canti,precio,codpro) 
                values('$mov','$can','$pre','$cpr')");
            $result2= $db_connect -> query($modi2);
        
          }    

    /* Poner en blanco la Boleta*/
            $eliminar=("truncate table tmpclientes");
            $eli = $db_connect -> query($eliminar);
            $modi=("truncate table tmpventas");
            $result3=$db_connect -> query($modi);

        echo "<meta http-equiv='refresh' content='0;URL=documento.php'>";
       
    }
    else
    {    echo "<meta http-equiv='refresh' content='0;URL=documento.php'>";  }


  ?>