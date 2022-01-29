<?php  include  ('../../controller/sessionSupervisor.php');
 include ('../../controller/conexion.php');

?>

<!DOCTYPE html>
<html lang="en">

<body>
<?php include('../../Componentes/menuSupervisor.php'); ?>


    <h3 id="titulos">Empleados</h3>
    <div class="tabla-estilos">
        <table >
            <thead>
                <tr>
                    <th scope="col"> Id Empleado </th>
                    <th scope="col"> Nombre </th>                    
                    <th scope="col"> Teléfono </th>          
                    <th scope="col"> Correo </th>           
                    <th scope="col"> Puesto </th>
                   
                </tr>
            </thead>
            <tbody>
                <?php
                        // Query select
                        $queryConsulta = "SELECT empleado.idEmpleado, empleado.nombreCompleto, empleado.telefono, empleado.correo, puesto_empleado.puesto 
                        FROM empleado INNER JOIN puesto_empleado ON empleado.idPuestoEmpleado = puesto_empleado.idPuestoEmpleado;";
                        $resultado=$dbConexion->prepare($queryConsulta);
                        $resultado->execute(); 
                        while($row=$resultado->fetch(PDO::FETCH_ASSOC)){
                    ?>


                <tr>
                    <th> <?php echo $row['idEmpleado'] ?> </th>
                    <th> <?php echo $row['nombreCompleto'] ?> </th>                    
                    <th> <?php echo $row['telefono'] ?> </th>      
                    <th> <?php echo $row['correo'] ?> </th>
                    <th> <?php echo $row['puesto'] ?> </th>                   
                                
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

