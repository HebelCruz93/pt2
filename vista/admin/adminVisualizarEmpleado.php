<?php  include  ('../../controller/sessionAdmin.php');
 include ('../../controller/conexion.php');
    $idUsuario = ($_SESSION['nombreUsuario']['idUsuario']) ;
    $queryConsulta = "SELECT empleado.nombreCompleto FROM empleado INNER JOIN usuario 
    ON usuario.idUsuario = empleado.idUsuario
    WHERE usuario.idUsuario =:idUsuarioP ";
    $resultado=$dbConexion->prepare($queryConsulta);
    $resultado->execute(array(":idUsuarioP"=>$idUsuario));
    $row=$resultado->fetch(PDO::FETCH_ASSOC);
    $nombreUsuario = $row['nombreCompleto'];
                              
?>

<!DOCTYPE html>
<html lang="en">

<body>
    <?php include('../../Componentes/menuAdministracion.php'); ?>


    <h3 id="titulos">Empleados</h3>
    <div>
    <a  class="botonGenerarPDF" href="reportes/reporteEmpleados.php">
                            Generar PDF</a>
    </div>
    <div class="tabla-estilos">
        <table>
            <thead>
                <tr>
                    <th scope="col"> Id Empleado </th>
                    <th scope="col"> Nombre </th>
                    <th scope="col"> Fecha de entrada </th>
                    <th scope="col"> Edad </th>
                    <th scope="col"> Teléfono </th>
                    <th scope="col"> Correo </th>
                    

                </tr>
            </thead>
            <tbody>
                <?php
                        // Query select
                        $queryConsulta = "SELECT * FROM empleado";
                        $resultado=$dbConexion->prepare($queryConsulta);
                        $resultado->execute(); 
                        while($row=$resultado->fetch(PDO::FETCH_ASSOC)){
                    ?>


                <tr>
                    <th> <?php echo $row['idEmpleado'] ?> </th>
                    <th> <?php echo $row['nombreCompleto'] ?> </th>
                    <th> <?php echo $row['fechaEntrada'] ?> </th>
                    <th> <?php echo $row['edad'] ?> </th>
                    <th> <?php echo $row['telefono'] ?> </th>
                    <th> <?php echo $row['correo'] ?> </th>
                    <th class="sinBorde"><a href="detalleEmpleado.php?id=<?php echo $row['idEmpleado'];?>" class="botonEstilo">
                            Detalles</a></th>
                    <th class="sinBorde"><a href="modificacionEmpleados.php?id=<?php echo $row['idEmpleado'];?>" class="botonEstilo">
                            Modificar</a></th>
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