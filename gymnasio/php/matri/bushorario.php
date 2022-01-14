<html>
<link href="../../css/estilosventas.css" rel="stylesheet" type="text/css">
<body>
<form name="frm_budcli" method="post" action="buscli.php">
    BUSCAR HORARIO
    <input  class="cd" type="date" name="bus">
    <input class="bt2"type="submit" name="buscar" value="BUSCAR">
<table border="1" width="100%">
    <tr>
       <th width='10%'> OP </th>
       <th width='10%'> COD HORARIO </th>
       <th width='10%'> FECHA INI </th>
       <th width='10%'> FECHA FIN</th>
       <th width='50%'> MODALIDAD </th>
       <th width='20%'> MONTO </th>
       <th width='10%'> PROFESOR </th>
    </tr>
    <?php
            //cargar los satos
                    include '../conectar.php';
                    // php buscar
                    if (!empty($_POST['bus'])=='')
                        {
                            $sql_prod = "select * from horario";
                            $res_prod = $db_connect -> query($sql_prod);

                    while ($fila =$res_prod -> fetch_assoc())
                    {
                        $codh=$fila['codhora'];
                        $codm=$fila['codmod'];
                        $fini=$fila['fechai'];
                        $ffin=$fila['fechaf'];
                        $dnip=$fila['deniprofe'];

                        echo "<tr>";
                            echo "<td align=center>
                                <a href='agregarmod.php?id=$cod'>
                                <img src='../../img/edit.png' width='30' title='Agregar Modalidad'>
                                </a>
                            </td>";
                            echo "<td>".$codh. "</td>";
                            echo "<td>".$fini. "</td>";
                            echo "<td>".$ffin. "</td>"; 
                            echo "<td>".$codm. "</td>"; 
                            echo "<td>".$dnip. "</td>"; 

                        echo "</tr>";
                        }
                    }
                    else
                        //parea filtrar registro de un texto inicial
                            {
                                $bprod=$_POST['bus'];
                                $sql_prod = "select * from alumno where apellido LIKE '%$bprod%' ";
                                $res_prod = $db_connect -> query($sql_prod);

                    while ($fila =$res_prod -> fetch_assoc())
                    {
                        
                    // rellenar la lista
                        $cod=$fila['codmod'];
                        $mod=$fila['modalidad'];
                        $mon=$fila['monto'];

                        echo "<tr>";
                            echo "<td>
                                <a href='agregarmod.php?id=$cod'>
                                <img src='../../img/edit.png' width='30' title='Agregar Modalidad'>
                                </a>
                            </td>";
                            echo "<td>".$cod. "</td>";                       
                            echo "<td>".$mod. "</td>";
                            echo "<td>".$mon. "</td>"; 

                        echo "</tr>";
                        }

                }
    ?>
    </form> 
   </table>
</body>
</html>