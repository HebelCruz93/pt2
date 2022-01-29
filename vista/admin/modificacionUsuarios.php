<?php  include  ('../../controller/sessionAdmin.php');
 include ('../../controller/conexion.php');

?>

<?php 
$idUsuario = $_GET['id'];
$mensaje ='';


$queryConsultaTipoUsuario="SELECT * FROM tipo_usuario";
$consultaPuesto = $dbConexion->prepare($queryConsultaTipoUsuario);
$consultaPuesto->execute();
$valores = $consultaPuesto->fetchAll();

// Sentencia SQL para mostrar los datos en los input
$query = "SELECT idUsuario, nombreUsuario, contraUsuario 
FROM usuario
WHERE idUsuario = :idUsuario";
$resultado=$dbConexion->prepare($query);
$resultado->execute(array(":idUsuario"=>$idUsuario)); 
$row=$resultado->fetch(PDO::FETCH_ASSOC);


?>



<!DOCTYPE html>
<html lang="en">


<body>
<?php include('../../Componentes/menuAdministracion.php'); ?>

    <div class="contenedorServicios">

      
       
        <div class="formLogin">
            <h3 id="titulos">Modificación de usuario</h3>
            <form action="../../controller/actualizarUsuarios.php" method="POST">
            <input type="hidden" id="idUsuario" name="idUsuario"  value="<?php echo $idUsuario; ?>"> 
            <div class="flex-externo">
                    <ul>
                        <li>
                            <label for="idTipoUsuario">Usuario: <span><?php echo $idUsuario; ?></span></label>
                            
                            
                            </select>
                        </li>
                    </ul>
                </div>

                <div class="flex-externo">
                    <ul>
                        <li>
                            <label for="idTipoUsuario">Tipo de usuario</label>
                            <select name="idTipoUsuario">
                                <?php                                
                                foreach ($valores as $tipoUsuario):
                                 echo'<option value="'.$tipoUsuario["idTipoUsuario"].'">'.$tipoUsuario["tipo"].'</option>';
                             
                                endforeach;
                                ?>
                            </select>
                        </li>
                    </ul>
                </div>
                <div class="flex-externo">
                    <ul>
                        <li>
                            <label for="usuario">Usuario</label>
                            <input class="separacionInput" type="text" name="nombreUsuario" id="usuario" required
                               value="<?php echo $row['nombreUsuario']; ?>">
                        </li>
                    </ul>
                </div>
                <div class="flex-externo">
                    <ul>
                        <li>
                            <label for="contraseña">Contraseña</label>
                            <input type="password" name="contraUsuario" id="contraseña" required
                            value="<?php echo $row['contraUsuario']; ?>">
                        </li>
                    </ul>
                </div>
                <div class="flex-externo aumento">
                    <ul>
                        <li>
                            <button type="submit">Modificar usuario</button>
                        </li>
                    </ul>
                    <ul>
                    <li>
                        <a  class="botonRegresar" href="../../vista/admin/adminVisualizarUsuario.php">Regresar</a>
                    </li>
                    </ul>
                    <div>


            </form>

        </div>
    </div>

</body>

</html>