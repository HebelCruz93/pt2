<?php  include  ('../../controller/sessionEmpleado.php');
 include ('../../controller/conexion.php');

?>

<!DOCTYPE html>
<html lang="en">

<body>
<?php include('../../Componentes/menuEmpleado.php'); ?>


    <h3 id="titulos">Productos</h3>
    <div class="tabla-estilos">
        <table >
            <thead>
                <tr>
                    <th scope="col"> Id Producto </th>
                    <th scope="col"> Nombre </th>                                    
                    <th scope="col"> Material </th>  
                    <th scope="col"> Dimensiones </th> 
                    <th scope="col"> Imagen </th>     
                     
                </tr>
            </thead>
            <tbody>
                <?php
                        // Query select
                        $queryConsulta = "SELECT idProducto, nombre, material, dimensiones FROM producto";
                        $resultado=$dbConexion->prepare($queryConsulta);
                        $resultado->execute(); 
                        while($row=$resultado->fetch(PDO::FETCH_ASSOC)){
                    ?>


                <tr>
                    <th> <?php echo $row['idProducto'] ?> </th>
                    <th> <?php echo $row['nombre'] ?> </th>                  
                    <th> <?php echo $row['material'] ?> </th>                   
                    <th> <?php echo $row['dimensiones'] ?> </th>      
                                
                                  
                    <th><a href="modificacionProducto.php?id=<?php echo $row['idProducto'];?>"
                         class="botonEstilo"  >  Ver imagen</a></th>                    
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

