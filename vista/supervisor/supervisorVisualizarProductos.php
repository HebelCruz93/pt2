<?php  include  ('../../controller/sessionSupervisor.php');
 include ('../../controller/conexion.php');

?>

<!DOCTYPE html>
<html lang="en">

<body>
<?php include('../../Componentes/menuSupervisor.php'); ?>


    <h3 id="titulos">Productos</h3>
    <div class="tabla-estilos">
        <table >
            <thead>
                <tr>
                    <th scope="col"> Id producto </th>
                    <th scope="col"> Nombre </th>                    
                    <th scope="col"> Material </th>          
                    <th scope="col"> Dimensiones </th>           
                    <th scope="col"> Precio unitario </th>
                   
                </tr>
            </thead>
            <tbody>
                <?php
                        // Query select
                        $queryConsulta = "SELECT idProducto, nombre, material, dimensiones, precioUnitario
                        FROM producto ";
                        $resultado=$dbConexion->prepare($queryConsulta);
                        $resultado->execute(); 
                        while($row=$resultado->fetch(PDO::FETCH_ASSOC)){
                    ?>


                <tr>
                    <th> <?php echo $row['idProducto'] ?> </th>
                    <th> <?php echo $row['nombre'] ?> </th>                    
                    <th> <?php echo $row['material'] ?> </th>      
                    <th> <?php echo $row['dimensiones'] ?> </th>
                    <th> $<?php echo $row['precioUnitario'] ?> </th>                   
                                
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

