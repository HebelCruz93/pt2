<?php  include  ('../../controller/sessionSupervisor.php');
 include ('../../controller/conexion.php');

?>

<!DOCTYPE html>
<html lang="en">

<body>
<?php include('../../Componentes/menuSupervisor.php'); ?>


    <h3 id="titulos">Tickets en progreso</h3>
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
                  
                   
                </tr>
            </thead>
            <tbody>
                <?php
                        // Query select
                        $queryConsulta = "SELECT idTicket, producto.nombre, ticket.cantidad, material.material, empleado.nombreCompleto, ticket.generadoPor, estatusticket.estatus FROM ticket 
                        INNER JOIN producto ON producto.idProducto = ticket.idProducto 
                        INNER JOIN material ON material.idMaterial = ticket.idMaterial 
                        INNER JOIN empleado ON empleado.idEmpleado = ticket.idEmpleado 
                        INNER JOIN estatusticket ON estatusticket.idStatusTicket = ticket.idEstatus";
                        $resultado=$dbConexion->prepare($queryConsulta);
                        $resultado->execute(); 
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
                    <th><a href="../../controller/cancelarTicketSupervisor.php?id=<?php echo $row['idTicket'];?>"
                         class="botonEstilo"  > Cancelar</a></th>  
                    <th><a href="../../controller/eliminarTicketSupervisor.php?id=<?php echo $row['idTicket'];?>"
                     class="botonEstilo"  > Eliminar</a></th>                    
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

