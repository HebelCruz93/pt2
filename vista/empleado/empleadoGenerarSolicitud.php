<?php  include  ('../../controller/sessionEmpleado.php');
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
    <?php include('../../Componentes/menuEmpleado.php'); ?>
    <h3 id="titulos">Generar solicitud</h3>
    <div class="contenedorServicios">



        <div class="formLogin">
            <form action="../../controller/registrarSolicitudEmpleado.php" method="POST">

                <div class="flex-externo">

                    <ul>
                        <li>
                            <label for="asunto">Asunto:</label>
                            <?php
                    $queryConsulta = "SELECT * FROM asuntosolicitud";
                    $resultado=$dbConexion->prepare($queryConsulta);
                    ?>


                            <select name="IdAsunto" id="asunto" class="input-texto">
                                <option value="" hidden> Selecciona el asunto </option>
                                <?php
                        $resultado->execute(); 
                        while($row=$resultado->fetch(PDO::FETCH_ASSOC)){
                            echo "<option value=".$row['idAsunto'].">".$row['asunto']."</option>";
                        }
                        $resultado->closeCursor();
                        ?>

                            </select>
                        </li>
                    </ul>

                </div>
                <div class="flex-externo">

                    <ul>
                        <li>
                            <label for="fecha">Fecha:</label>
                            <input class="" type="text" name="fecha" id="fecha" placeholder="Ingresa la fecha de la solicitud"
                                required>
                        </li>
                    </ul>

                </div>

                <div class="flex-externo">

                    <ul>
                        <li>
                            <label for="material">Escribe tu solicitud:</label>
                           
                        </li>
                    </ul>

                </div>


                <div class="flex-externo">
                    <ul>
                        <li>
                        <textarea name="solicitud" rows="10" cols="50"></textarea>
                        </li>
                    </ul>
                </div>

                <div class="flex-externo">
                    <ul>
                        <li>
                            <label for="nombreCompletoUsuario" >Generado por: <span><?php echo $nombreCompletoUsuario; ?></span></label>
                            <input type="hidden" id="nombreCompletoUsuario" name="idEmpleado"  value="<?php echo $idEmpleado; ?>">  
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