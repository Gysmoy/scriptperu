<html>
<link href="../../css/estilosventas.css" rel="stylesheet" type="text/css">
<body>
<form name="frm_budcli" method="post" action="buscli.php">
    BUSCAR ALUMNOS
    <input  class="cd" type="text" name="bus">
    <input class="bt2"type="submit" name="buscar" value="BUSCAR">
<table border="1" width="100%">
    <tr>
       <th width='10%'> OPC. </th>
       <th width='10%'> DNI </th>
       <th width='30%'>APELLIDOS </th>
       <th width='30%'> NOMBRE </th>
    </tr>
    <?php
            //cargar los satos
                    include '../conectar.php';
                    // php buscar
                    if (!empty($_POST['bus'])=='')
                        {
                            $sql_prod = "select * from alumno";
                            $res_prod = $db_connect -> query($sql_prod);

                    while ($fila =$res_prod -> fetch_assoc())
                    {
                        $dni=$fila['dni'];
                        $nom=$fila['nombre'];
                        $ape=$fila['apellido'];

                        echo "<tr>";
                            echo "<td align=center>
                                <a href='agregaralu.php?id=$dni'>
                                <img src='../../img/edit.png' width='30' title='Agregar Alumno'>
                                </a>
                            </td>";
                            echo "<td>".$dni. "</td>";                       
                            echo "<td>".$ape. "</td>";
                            echo "<td>".$nom. "</td>"; 

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
                        $dni=$fila['dni'];
                        $nom=$fila['nombre'];
                        $ape=$fila['apellido'];

                        echo "<tr>";
                            echo "<td>
                                <a href='agregaralu.php?id=$dni'>
                                <img src='../../img/edit.png' width='30' title='Agregar Alumno'>
                                </a>
                            </td>";
                            echo "<td>".$cod. "</td>";                       
                            echo "<td>".$name. "</td>";
                            echo "<td>".$pre. "</td>"; 
                            echo "<td>".$can. "</td>";

                        echo "</tr>";
                        }

                }
    ?>
    </form> 
   </table>
</body>
</html>