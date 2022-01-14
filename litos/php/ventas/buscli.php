<html>
<link href="../../css/estilosventas.css" rel="stylesheet" type="text/css">
<body>
<form name="frm_budcli" method="post" action="buscli.php">
    BUSCAR CLIENTES
    <input  class="cd" type="text" name="bus">
    <input class="bt2"type="submit" name="buscar" value="BUSCAR">
<table border="1" width="100%">
    <tr>
       <th width='10%'> OPC. </th>
       <th width='10%'> DNI </th>
       <th width='30%'>APELLIDOS </th>
       <th width='30%'> NOMBRE </th>
       <th width='20%' align=center> RUC </th>
    </tr>
    <?php
            //cargar los satos
                    include '../conectar.php';
                    // php buscar
                    if (!empty($_POST['bus'])=='')
                        {
                            $sql_prod = "select * from clientes";
                            $res_prod = $db_connect -> query($sql_prod);

                    while ($fila =$res_prod -> fetch_assoc())
                    {
                        $cod=$fila['dni'];
                        $name=$fila['apellidos'];
                        $pre=$fila['nombres'];
                        $can=$fila['RUC'];


                        echo "<tr>";
                            echo "<td align=center>
                                <a href='agregarcli.php?id=$cod'>
                                <img src='../../img/editc.png' width='35' title='Agregar Cliente'>
                                </a>
                            </td>";
                            echo "<td>".$cod. "</td>";                       
                            echo "<td>".$name. "</td>";
                            echo "<td>".$pre. "</td>"; 
                            echo "<td align=center>".$can. "</td>";

                        echo "</tr>";
                        }
                    }
                    else
                        //parea filtrar registro de un texto inicial
                            {
                                $bprod=$_POST['bus'];
                                $sql_prod = "select * from clientes where apellidos LIKE '%$bprod%' ";
                                $res_prod = $db_connect -> query($sql_prod);

                    while ($fila =$res_prod -> fetch_assoc())
                    {
                        
                    // rellenar la lista
                        $cod=$fila['dni'];
                        $name=$fila['apellidos'];
                        $pre=$fila['nombres'];
                        $can=$fila['RUC'];


                        echo "<tr>";
                            echo "<td>
                                <a href='agregarcli.php?id=$cod'>
                                <img src='../../img/agreg.png' width='35' title='Editar Registro'>
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