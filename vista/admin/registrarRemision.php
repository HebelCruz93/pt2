<?php  include  ('../../controller/sessionAdmin.php');
 include ('../../controller/conexion.php');

 $queryConsultaProducto = "SELECT idProducto, nombre FROM producto";
 $resultadoConsultaProducto=$dbConexion->prepare($queryConsultaProducto);

 $idUsuario = ($_SESSION['nombreUsuario']['idUsuario']) ;
 $queryConsulta = "SELECT empleado.idEmpleado, empleado.nombreCompleto FROM empleado INNER JOIN usuario 
 ON usuario.idUsuario = empleado.idUsuario
 WHERE usuario.idUsuario =:idUsuarioP ";
 $resultado=$dbConexion->prepare($queryConsulta);
 $resultado->execute(array(":idUsuarioP"=>$idUsuario));
 $row=$resultado->fetch(PDO::FETCH_ASSOC);
 $idEmpleado = $row['idEmpleado'];
 $nombreCompletoUsuario = $row['nombreCompleto'];

?>


<!DOCTYPE html>
<html lang="en">


<body>
    <?php include('../../Componentes/menuAdministracion.php'); ?>
    <h3 id="titulos">Generar remisión</h3>
    <div class="contenedorServicios">



        <div class="formLogin">
            <form action="../../controller/registrarRemisiones.php" method="POST">

                <div class="flex-externo">

                <ul>
                        <li>
                            <label for="factura">FACTURA:</label>
                            <input class="" type="text" name="factura" id="factura" placeholder="Ingresa la factura"
                                required>
                        </li>
                    </ul>

                </div>
               
                <div class="flex-externo">

                    <ul>
                        <li>
                            <label for="motivo">Escribe el motivo de la remisión:</label>
                           
                        </li>
                    </ul>

                </div>


                <div class="flex-externo">
                    <ul>
                        <li>
                        <textarea name="motivo" rows="10" cols="50"></textarea>
                        </li>
                    </ul>
                </div>

             

                <div class="flex-externo aumento">
                    <ul>
                        <li>
                            <button type="submit">Generar solicitud</button>
                        </li>
                    </ul>
                    <div>
            </form>
</body>

</html>