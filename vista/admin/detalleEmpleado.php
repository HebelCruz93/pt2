<?php  include  ('../../controller/sessionAdmin.php');
 include ('../../controller/conexion.php');

?>

<?php 
$idEmpleado = $_GET['id'];
$mensaje ='';


// Sentencia SQL para mostrar los datos en los input
$query = "SELECT * FROM empleado
WHERE idEmpleado = :idEmpleadoR";
$resultado=$dbConexion->prepare($query);
$resultado->execute(array(":idEmpleadoR"=>$idEmpleado)); 
$row=$resultado->fetch(PDO::FETCH_ASSOC);


?>



<!DOCTYPE html>
<html lang="en">


<body>
    <?php include('../../Componentes/menuAdministracion.php'); ?>

    <div class="contenedorServicios">



        <div class="formLogin">
            <h3 id="titulos">Detalle de Empleado</h3>
            <form action="" method="POST">

                <div class="flex-externo">
                    <ul>
                        <li>
                            <label for="idEmpleado">Id Empleado: <span><?php echo $idEmpleado; ?></span></label>

                        </li>
                        <li>
                            <label for="razonSocial">Nombre completo:
                                <span><?php echo $row['nombreCompleto']; ?></span></label>

                        </li>
                        <li>
                            <label for="fechaEntrada">Fecha de entrada:
                                <span><?php echo $row['fechaEntrada']; ?></span></label>

                        </li>
                        <li>
                            <label for="edad">Edad: <span><?php echo $row['edad']; ?></span></label>

                        </li>
                        <li>
                            <label for="sexo">Sexo: <span><?php echo $row['sexo']; ?></span></label>

                        </li>
                        <li>
                            <label for="curp">CURP: <span> <?php echo $row['curp']; ?></span></label>

                        </li>
                        <li>
                            <label for="rfc">RFC: <span> <?php echo $row['rfc']; ?></span></label>

                        </li>
                        <li>
                            <label for="nss">NSS: <span> <?php echo $row['nss']; ?></span></label>

                        </li>
                        <li>
                            <label for="telefono">Teléfono: <span> <?php echo $row['telefono']; ?></span></label>

                        </li>
                        <li>
                            <label for="correo">Correo: <span> <?php echo $row['correo']; ?></span></label>

                        </li>
                        <li>
                            <label for="estado">Estado: <span> <?php echo $row['estado']; ?></span></label>

                        </li>
                        <li>
                            <label for="ciudad">Ciudad: <span> <?php echo $row['ciudad']; ?></span></label>

                        </li>
                        <li>
                            <label for="colonia">Colonia: <span> <?php echo $row['colonia']; ?></span></label>

                        </li>
                        <li>
                            <label for="cp">CP: <span> <?php echo $row['cp']; ?></span></label>

                        </li>
                        <li>
                            <label for="noExterior">No. Exterior: <span>
                                    <?php echo $row['noExterior']; ?></span></label>

                        </li>
                        <li>
                            <label for="noInterior">No. Interior: <span>
                                    <?php echo $row['noInterior']; ?></span></label>

                        </li>
                        <li>
                            <label for="idUsuario">ID usuario: <span> <?php echo $row['idUsuario']; ?></span></label>

                        </li>
                        <li>
                            <label for="idPuestoEmpleado">ID puesto de empleado: <span>
                                    <?php echo $row['idPuestoEmpleado']; ?></span></label>

                        </li>
                    </ul>
                </div>

                <div class="flex-externo ">
                    <ul>
                        <li>
                            <a class="botonRegresar" href="../../vista/admin/adminVisualizarEmpleado.php">Regresar</a>

                        </li>

                    </ul>
                    <ul>
                        <li>
                            <a class="botonRegresar"
                                href="reportes/detalleEmpleadoPDF.php?id=<?php echo $idEmpleado;?>">Generar PDF </a>
                        </li>
                    </ul>
                    <div>


            </form>

        </div>
    </div>

</body>

</html>