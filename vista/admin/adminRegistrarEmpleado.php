<?php  include  ('../../controller/sessionAdmin.php');
 include ('../../controller/conexion.php');

?>

<!DOCTYPE html>
<html lang="en">

<body>
    <?php include('../../Componentes/menuAdministracion.php'); ?>


    <H3 id="titulos"> Registro de empleados</H3>
    <div class="formContacto">
        <form action="../../controller/registrarEmpleados.php" method="POST">
            <div class="flex-externo">
                <ul>
                    <li>
                        <label for="nombreCompleto">Nombre completo:</label>
                        <input class="aumento" type="text" id="nombreCompleto" name="nombreCompleto" required
                            placeholder="Ingresa el nombre">
                    </li>
                </ul>
                <ul>
                    <li>
                        <label for="fechaEntrada">Fecha de entrada:</label>
                        <input type="text" id="fechaEntrada" name="fechaEntrada" required placeholder="dd-mm-aaaa">
                    </li>
                </ul>
                <ul>
                    <li>
                        <label for="edad">Edad:</label>
                        <input class="reduccion aumento" type="text" id="edad" name="edad" required placeholder="Edad">
                    </li>
                </ul>
            </div>

            <div class="flex-externo">
                <ul>
                    <li>
                        <label for="sexo">Sexo:</label>

                        <input type="radio" id="sexo1" name="sexo" value="Masculino" checked>
                        <label for="sexo1">Masculino</label>

                        <input type="radio" id="sexo2" name="sexo" value="Femenino">
                        <label for="sexo2">Femenino</label>

                    </li>
                </ul>
                <ul>
                    <li>
                        <label for="curp">CURP:</label>
                        <input class="aumento" type="text" name="curp" id="curp" placeholder="Ingresa CURP" required>
                    </li>
                </ul>

                <ul>
                    <li>
                        <label for="nss">NSS:</label>
                        <input class="aumento" type="text" name="nss" id="nss" placeholder="Ingresa NSS" required>
                    </li>
                </ul>
            </div>

            <div class="flex-externo">
                <ul>
                    <li>
                        <label for="rfc">RFC:</label>
                        <input type="text" name="rfc" id="nss" placeholder="Ingresa RFC" required>
                    </li>
                </ul>
                <ul>
                    <li>
                        <label for="material">Puesto</label>

                        <select name="idPuestoEmpleado">
                            <option value="1">Gerente</option>
                            <option value="2">Supervisor</option>
                            <option value="3">Jefe de empleados</option>
                            <option value="4">Secretaria</option>
                            <option value="5">Operador</option>
                        </select>
                    </li>
                </ul>
                <!--<ul>
                    <li>
                        <label for="usuario">Usuario</label>
                        <?php
                    $queryConsulta = "SELECT idUsuario, nombreUsuario FROM usuario WHERE idUsuario=2";
                    $resultado=$dbConexion->prepare($queryConsulta);
                    ?>


                        <select name="idUsuario" id="tipoUsuario" class="input-texto">
                            <option value="" hidden> Selecciona el usuario </option>
                            <?php
                        $resultado->execute(); 
                        while($row=$resultado->fetch(PDO::FETCH_ASSOC)){
                            echo "<option value=".$row['idUsuario'].">".$row['nombreUsuario']."</option>";
                        }
                        $resultado->closeCursor();
                        ?>

                        </select>
                    </li>
                </ul>-->
                <ul>
                    <li>
                        <label for="telefono">Teléono:</label>
                        <input type="text" id="telefono" name="telefono" placeholder="Ingresa teléfono" required>
                    </li>
                </ul>
                <ul>
                    <li>
                        <label for="correo">Correo:</label>
                        <input type="text" id="correo" name="correo" placeholder="Ingresa correo" required>
                    </li>
                </ul>
            </div>
            <div class="flex-externo">
                <ul>
                    <li>
                        <label for="idTipoUsuario">Tipo de usuario</label>
                        <select name="idTipoUsuario">
                            <option value="1">Administrador</option>
                            <option value="2">Supervisor</option>
                            <option value="3">Empleado</option>
                        </select>
                    </li>
                </ul>
                <ul>
                <li>
                            <label for="usuario">Usuario</label>
                            <input class="separacionInput" type="text" name="nombreUsuario" id="usuario"
                                placeholder="Ingresa el nombre del usuario" required>
                        </li>
                </ul>
                <ul>
                <li>
                            <label for="contraseña">Contraseña</label>
                            <input type="password" name="contraUsuario" id="contraseña"
                                placeholder="Ingresa tu contraseña" required>
                        </li>
                </ul>
            </div>

            <div class="flex-externo">
                <ul>
                    <li>
                        <label for="estado">Estado:</label>
                        <input class="aumento" type="text" id="estado" name="estado" placeholder="Estado" required>
                    </li>
                </ul>
                <ul>
                    <li>
                        <label for="ciudad">Ciudad:</label>
                        <input class="aumento" type="text" id="ciudad" name="ciudad" placeholder="Ciudad" required>
                    </li>
                </ul>
                <ul>
                    <li>
                        <label for="colonia">Colonia:</label>
                        <input class="aumento" type="text" id="colonia" name="colonia" placeholder="Colonia" required>
                    </li>
                </ul>
            </div>


            <div class="flex-externo">
                <ul>
                    <li>
                        <label for="cp">CP:</label>
                        <input class="aumento" type="text" id="cp" name="cp" placeholder="Codigo postal" required>
                    </li>
                </ul>
                <ul>
                    <li>
                        <label for="noExterior">No. Exterior:</label>
                        <input class="aumento" type="text" id="noExterior" name="noExterior" required
                            placeholder="Número exterior ">
                    </li>
                </ul>
                <ul>
                    <li>
                        <label for="noInterior">No. Interior:</label>
                        <input class="aumento" type="text" id="noInterior" name="noInterior" required
                            placeholder="Número interior">
                    </li>
                </ul>
            </div>


            <div class="flex-externo aumento">
                <ul>
                    <li>
                        <button type="submit">Registrar empleado</button>
                    </li>
                </ul>
                <div>
        </form>


</body>

</html>