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


    <h3 id="titulos">Mis solicitudes</h3>
    <div class="tabla-estilos">
        <table >
            <thead>
                <tr>
                    <th scope="col"> Id Solicitud</th>
                    <th scope="col"> Asunto </th>                                    
                    <th scope="col"> Fecha </th>  
                    <th scope="col"> Solicitud </th>                      
                    <th scope="col"> Empleado </th>   
                    <th scope="col"> Estatus </th>
                  
                   
                </tr>
            </thead>
            <tbody>
                <?php
                        // Query select
                        $queryConsulta = "SELECT idSolicitud, asuntosolicitud.asunto, fecha, solicitud, empleado.nombreCompleto, estatussolicitud.estatus
                         FROM solicitud
                         INNER JOIN asuntosolicitud ON asuntosolicitud.idAsunto = solicitud.idSolicitud 
                         INNER JOIN empleado ON empleado.idEmpleado = solicitud.idEmpleado 
                         INNER JOIN estatussolicitud ON estatussolicitud.idEstatusSolicitud = solicitud.idEstatus 
                         WHERE empleado.idEmpleado=:idEmpleadoP";
                        $resultado=$dbConexion->prepare($queryConsulta);
                        $resultado->execute(array(":idEmpleadoP"=>$idEmpleadoC)); 
                        while($row=$resultado->fetch(PDO::FETCH_ASSOC)){
                    ?>


                <tr>
                    <th> <?php echo $row['idSolicitud'] ?> </th>
                    <th> <?php echo $row['asunto'] ?> </th>                  
                    <th> <?php echo $row['fecha'] ?> </th>                   
                    <th> <?php echo $row['solicitud'] ?> </th> 
                    <th> <?php echo $row['nombreCompleto'] ?> </th> 
                    <th> <?php echo $row['estatus'] ?> </th>                           
                    
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

