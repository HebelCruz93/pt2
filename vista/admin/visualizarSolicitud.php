<?php  include  ('../../controller/sessionAdmin.php');
 include ('../../controller/conexion.php');

?>

<!DOCTYPE html>
<html lang="en">

<body>
<?php include('../../Componentes/menuAdministracion.php'); ?>


    <h3 id="titulos">Solicitudes</h3>
    <div>
    <a  class="botonGenerarPDF" href="reportes/reporteSolicitudes.php">
                            Generar PDF</a>
    </div>
    <div class="tabla-estilos">
        <table >
            <thead>
                <tr>
                    <th scope="col"> Id ticket</th>
                    <th scope="col"> Tipo de solicitud </th>                                    
                    <th scope="col"> Fecha </th>  
                    <th scope="col"> Asunto </th>                      
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
                        INNER JOIN estatussolicitud ON estatussolicitud.idEstatusSolicitud = solicitud.idEstatus";
                        $resultado=$dbConexion->prepare($queryConsulta);
                        $resultado->execute(); 
                        while($row=$resultado->fetch(PDO::FETCH_ASSOC)){
                    ?>


                <tr>
                    <th> <?php echo $row['idSolicitud'] ?> </th>
                    <th> <?php echo $row['asunto'] ?> </th>                  
                    <th> <?php echo $row['fecha'] ?> </th>                   
                    <th> <?php echo $row['solicitud'] ?> </th> 
                    <th> <?php echo $row['nombreCompleto'] ?> </th> 
                    <th> <?php echo $row['estatus'] ?> </th>                         
                    <th class="sinBorde"><a href="../../controller/aceptarSolicitud.php?id=<?php echo $row['idSolicitud'];?>"
                         class="botonEstilo" > Aceptar</a></th> 
                    <th class="sinBorde"><a href="../../controller/rechazarSolicitud.php?id=<?php echo $row['idSolicitud'];?>"
                         class="botonEstilo" > Rechazar</a></th>                      
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

