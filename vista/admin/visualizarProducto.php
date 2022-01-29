<?php  include  ('../../controller/sessionAdmin.php');
 include ('../../controller/conexion.php');

?>

<!DOCTYPE html>
<html lang="en">

<body>
<?php include('../../Componentes/menuAdministracion.php'); ?>


    <h3 id="titulos">Productos</h3>
    <div>
    <a  class="botonGenerarPDF" href="reportes/reporteProducto.php">
                            Generar PDF</a>
    </div>
    <div class="tabla-estilos">
        <table >
            <thead>
                <tr>
                    <th scope="col"> Id Producto </th>
                    <th scope="col"> Nombre </th>                                    
                    <th scope="col"> Material </th>  
                            
                  
                   
                </tr>
            </thead>
            <tbody>
                <?php
                        // Query select
                        $queryConsulta = "SELECT * FROM producto";
                        $resultado=$dbConexion->prepare($queryConsulta);
                        $resultado->execute(); 
                        while($row=$resultado->fetch(PDO::FETCH_ASSOC)){
                    ?>


                <tr>
                    <th> <?php echo $row['idProducto'] ?> </th>
                    <th> <?php echo $row['nombre'] ?> </th>                  
                    <th> <?php echo $row['material'] ?> </th>  
                    <th class="sinBorde"><a href="detalleProducto.php?id=<?php echo $row['idProducto'];?>"
                         class="botonEstilo"  > Detalles</a></th>                    
                    <th class="sinBorde"><a href="modificacionProducto.php?id=<?php echo $row['idProducto'];?>"
                         class="botonEstilo"  > Modificar</a></th>                    
                </tr>
                <?php

                        }
                        $resultado->closeCursor();
                    ?>
            </tbody>

        </table>
    </div>
    </div>
    </body>

