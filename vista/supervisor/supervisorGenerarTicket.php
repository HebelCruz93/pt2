<?php  include  ('../../controller/sessionSupervisor.php');
 include ('../../controller/conexion.php');

 $queryConsultaProducto = "SELECT idProducto, nombre FROM producto";
 $resultadoConsultaProducto=$dbConexion->prepare($queryConsultaProducto);

 $idUsuario = ($_SESSION['nombreUsuario']['idUsuario']) ;
 $queryConsulta = "SELECT empleado.nombreCompleto FROM empleado INNER JOIN usuario 
 ON usuario.idUsuario = empleado.idUsuario
 WHERE usuario.idUsuario =:idUsuarioP ";
 $resultado=$dbConexion->prepare($queryConsulta);
 $resultado->execute(array(":idUsuarioP"=>$idUsuario));
 $row=$resultado->fetch(PDO::FETCH_ASSOC);
 $nombreCompletoUsuario = $row['nombreCompleto'];

?>


<!DOCTYPE html>
<html lang="en">


<body>
    <?php include('../../Componentes/menuSupervisor.php'); ?>

    <div class="contenedorServicios">



        <div class="formLogin">
            <form action="../../controller/registrarTicket.php" method="POST">

                <div class="flex-externo">

                    <ul>
                        <li>
                            <label for="producto">Producto:</label>
                            <?php
                    $queryConsulta = "SELECT idProducto, nombre FROM producto";
                    $resultado=$dbConexion->prepare($queryConsulta);
                    ?>


                            <select name="idProducto" id="tipoProducto" class="input-texto">
                                <option value="" hidden> Selecciona el producto </option>
                                <?php
                        $resultado->execute(); 
                        while($row=$resultado->fetch(PDO::FETCH_ASSOC)){
                            echo "<option value=".$row['idProducto'].">".$row['nombre']."</option>";
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
                            <label for="cantidad">Cantidad:</label>
                            <input class="" type="text" name="cantidad" id="cantidad" placeholder="Ingresa la cantidad"
                                required>
                        </li>
                    </ul>

                </div>

                <div class="flex-externo">

                    <ul>
                        <li>
                            <label for="material">Material:</label>
                            <?php
                    $queryConsulta = "SELECT idMaterial, material FROM material";
                    $resultado=$dbConexion->prepare($queryConsulta);
                    ?>


                            <select name="idMaterial" id="tipoMaterial" class="input-texto">
                                <option value="" hidden> Selecciona el material </option>
                                <?php
                        $resultado->execute(); 
                        while($row=$resultado->fetch(PDO::FETCH_ASSOC)){
                            echo "<option value=".$row['idMaterial'].">".$row['material']."</option>";
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
                            <label for="empleado">Empleado:</label>
                            <?php
                    $queryConsulta = "SELECT idEmpleado, nombreCompleto FROM empleado WHERE idPuestoEmpleado=5";
                    $resultado=$dbConexion->prepare($queryConsulta);
                    ?>


                            <select name="idEmpleado" id="empleado" class="input-texto">
                                <option value="" hidden> Asigna un empleado</option>
                                <?php
                        $resultado->execute(); 
                        while($row=$resultado->fetch(PDO::FETCH_ASSOC)){
                            echo "<option value=".$row['idEmpleado'].">".$row['nombreCompleto']."</option>";
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
                            <label for="nombreCompletoUsuario" >Generado por: <span><?php echo $nombreCompletoUsuario; ?></span></label>
                            <input type="hidden" id="nombreCompletoUsuario" name="nombreCompletoUsuario"  value="<?php echo $nombreCompletoUsuario; ?>">  
                        </li>
                    </ul>
                </div>


                <div class="flex-externo aumento">
                    <ul>
                        <li>
                            <button type="submit">Generar Ticket</button>
                        </li>
                    </ul>
                    <div>
            </form>
</body>

</html>