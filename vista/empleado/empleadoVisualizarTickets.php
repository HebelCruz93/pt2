<?php  include  ('../../controller/sessionEmpleado.php');
 include ('../../controller/conexion.php');

 $idUsuario = ($_SESSION['nombreUsuario']['idUsuario']) ;
 $queryConsulta = "SELECT empleado.idEmpleado FROM empleado INNER JOIN usuario 
 ON usuario.idUsuario = empleado.idUsuario
 WHERE usuario.idUsuario =:idUsuarioP ";
 $resultado=$dbConexion->prepare($queryConsulta);
 $resultado->execute(array(":idUsuarioP"=>$idUsuario));
 $row=$resultado->fetch(PDO::FETCH_ASSOC);
 $idEmpleadoC = $row['idEmpleado'];

?>

<!DOCTYPE html>
<html lang="en">

<body>
<?php include('../../Componentes/menuEmpleado.php'); ?>


    <h3 id="titulos">Mis tickets</h3>
    <div class="tabla-estilos">
        <table >
            <thead>
                <tr>
                    <th scope="col"> Id ticket</th>
                    <th scope="col"> Nombre Pieza </th>                                    
                    <th scope="col"> Cantidad </th>  
                    <th scope="col"> Material </th>                      
                    <th scope="col"> Empleado asignado </th>         
                    <th scope="col"> Generado por </th>
                    <th scope="col"> Estatus </th>
                    <th scope="col"> Modificar </th>
                   
                </tr>
            </thead>
            <tbody>
                <?php
                        // Query select
                        $queryConsulta = "SELECT idTicket, producto.nombre, ticket.cantidad, material.material, empleado.nombreCompleto, ticket.generadoPor, estatusticket.estatus FROM ticket 
                        INNER JOIN producto ON producto.idProducto = ticket.idProducto 
                        INNER JOIN material ON material.idMaterial = ticket.idMaterial 
                        INNER JOIN empleado ON empleado.idEmpleado = ticket.idEmpleado 
                        INNER JOIN estatusticket ON estatusticket.idStatusTicket = ticket.idEstatus
                        WHERE empleado.idEmpleado= :idEmpleadoP";
                        $resultado=$dbConexion->prepare($queryConsulta);
                        $resultado->execute(array(":idEmpleadoP"=>$idEmpleadoC)); 
                        while($row=$resultado->fetch(PDO::FETCH_ASSOC)){
                    ?>


                <tr>
                    <th> <?php echo $row['idTicket'] ?> </th>
                    <th> <?php echo $row['nombre'] ?> </th>                  
                    <th> <?php echo $row['cantidad'] ?> </th>                   
                    <th> <?php echo $row['material'] ?> </th> 
                    <th> <?php echo $row['nombreCompleto'] ?> </th> 
                    <th> <?php echo $row['generadoPor'] ?> </th> 
                    <th> <?php echo $row['estatus'] ?> </th>              
                    <th><a href="../../controller/terminarTicket.php?id=<?php echo $row['idTicket'];?>"
                         class="botonEstilo" > Terminar</a></th>                 
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

