<?php  include  ('../../controller/sessionAdmin.php');
 include ('../../controller/conexion.php');

?>

<?php 

$idEmpleado = $_GET['id'];

$queryConsultaTipoUsuario="SELECT * FROM `usuario` LEFT JOIN empleado ON usuario.idUsuario = empleado.idUsuario WHERE empleado.idUsuario IS null";
$consultaUsuario = $dbConexion->prepare($queryConsultaTipoUsuario);
$consultaUsuario->execute();
$valores = $consultaUsuario->fetchAll();

$queryConsultaPuestoEmpleado="SELECT * FROM puesto_empleado";
$consultaPuesto = $dbConexion->prepare($queryConsultaPuestoEmpleado);
$consultaPuesto->execute();
$valoresPuesto = $consultaPuesto->fetchAll();


// Sentencia SQL para mostrar los datos en los input
$query = "SELECT idEmpleado, nombreCompleto, fechaEntrada, edad, sexo, curp, rfc, nss, telefono, correo, estado, ciudad, colonia, cp, noExterior, noInterior, idUsuario, idPuestoEmpleado
FROM empleado
WHERE idEmpleado = :idEmpleado";
$resultado=$dbConexion->prepare($query);
$resultado->execute(array(":idEmpleado"=>$idEmpleado)); 
$row=$resultado->fetch(PDO::FETCH_ASSOC);   
?>


<!DOCTYPE html>
<html lang="en">



<body>
    
<?php include('../../Componentes/menuAdministracion.php'); ?>

    <H3 id="titulos"> Modificación de empleado</H3>
    <div class="formContacto">
        <form action="../../controller/actualizarEmpleados.php" method="POST">
        <input type="hidden" id="idUsuario" name="idEmpleado"  value="<?php echo $idEmpleado; ?>"> 
            <div class="flex-externo">
                <ul>
                    <li>
                        <label for="nombreCompleto">Nombre completo:</label>
                        <input class="aumento" type="text" id="nombreCompleto" name="nombreCompleto" required value="<?php echo $row['nombreCompleto']; ?>">
                    </li>
                </ul>
                <ul>
                    <li>
                        <label for="fechaEntrada">Fecha de entrada:</label>
                        <input class="aumento" type="text" id="fechaEntrada"  name="fechaEntrada" required value="<?php echo $row['fechaEntrada']; ?>">
                    </li>
                </ul>
                <ul>
                    <li>
                        <label for="edad">Edad:</label>
                        <input class="reduccion aumento" type="text" id="edad"  name="edad" required value="<?php echo $row['edad']; ?>">
                    </li>
                </ul>
            </div>

            <div class="flex-externo">
                <ul>
                    <li>
                        <label for="sexo">Sexo:</label>

                        <input type="radio" id="sexo1"  name="sexo" value="Masculino" checked>
                        <label for="sexo1">Masculino</label>

                        <input type="radio" id="sexo2" name="sexo" value="Femenino">
                        <label for="sexo2">Femenino</label>

                    </li>
                </ul>
                <ul>
                    <li>
                        <label for="curp">CURP:</label>
                        <input  type="text"  name="curp" id="curp" required value="<?php echo $row['curp']; ?>">
                    </li>
                </ul>
                <ul>
                    <li>
                        <label for="rfc">RFC:</label>
                        <input type="text"  name="rfc" id="rfc" required value="<?php echo $row['rfc']; ?>">
                    </li>
                </ul>
                <ul>
                    <li>
                        <label for="nss">NSS:</label>
                        <input  type="text"  name="nss" id="nss" required value="<?php echo $row['nss']; ?>">
                    </li>
                </ul>
            </div>

            <div class="flex-externo">
                <ul>
                    <li>
                        <label for="puesto">Puesto</label>
                        <select name="idPuestoEmpleado">
                        <?php                                
                                foreach ($valoresPuesto as $puesto):
                                 echo'<option value="'.$puesto["idPuestoEmpleado"].'">'.$puesto["puesto"].'</option>';
                             
                                endforeach;
                                ?>
                        </select>
                        </select>
                    </li>
                </ul>
                <ul>
                    <li>
                        <label for="telefono">Teléono:</label>
                        <input type="text" id="telefono"  name="telefono" required value="<?php echo $row['telefono']; ?>">
                    </li>
                </ul>
                <ul>
                    <li>
                        <label for="correo">Correo:</label>
                        <input type="text" id="correo"  name="correo" required  value="<?php echo $row['correo']; ?>">
                    </li>
                </ul>
            </div>

            <div class="flex-externo">
                <ul>
                    <li>
                        <label for="estado">Estado:</label>
                        <input class="aumento" type="text" id="estado" required name="estado"  value="<?php echo $row['estado']; ?>">
                    </li>
                </ul>
                <ul>
                    <li>
                        <label for="ciudad">Ciudad:</label>
                        <input class="aumento" type="text" id="ciudad" required  name="ciudad"  value="<?php echo $row['ciudad']; ?>">
                    </li>
                </ul>
                <ul>
                    <li>
                        <label for="colonia">Colonia:</label>
                        <input class="aumento" type="text" id="colonia" required name="colonia"  value="<?php echo $row['colonia']; ?>">
                    </li>
                </ul>
            </div>


            <div class="flex-externo">
                <ul>
                    <li>
                        <label for="cp">CP:</label>
                        <input class="aumento" type="text" id="cp"  name="cp" required  value="<?php echo $row['cp']; ?>">
                    </li>
                </ul>
                <ul>
                    <li>
                        <label for="noExterior">No. Exterior:</label>
                        <input class="aumento" type="text" id="noExterior" required name="noExterior"  value="<?php echo $row['noExterior']; ?>">
                    </li>
                </ul>
                <ul>
                    <li>
                        <label for="noInterior">No. Interior:</label>
                        <input class="aumento" type="text" id="noInterior" required name="noInterior" value="<?php echo $row['noInterior']; ?>">
                    </li>
                </ul>
            </div>


            <div class="flex-externo aumento">
                <ul>
                    <li>
                        <button type="submit" value="modificarEmpleado">Modificar empleado</button>
                    </li>
                </ul>
                <ul>
                    <li>
                        <a  class="botonRegresar" href="../../vista/admin/adminVisualizarEmpleado.php">Regresar</a>
                    </li>
                </ul>
                <div>
        </form>


</body>

</html>