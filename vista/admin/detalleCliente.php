<?php  include  ('../../controller/sessionAdmin.php');
 include ('../../controller/conexion.php');

?>

<?php 
$idCliente = $_GET['id'];
$mensaje ='';


// Sentencia SQL para mostrar los datos en los input
$query = "SELECT * FROM cliente
WHERE idCliente = :idCliente";
$resultado=$dbConexion->prepare($query);
$resultado->execute(array(":idCliente"=>$idCliente)); 
$row=$resultado->fetch(PDO::FETCH_ASSOC);


?>



<!DOCTYPE html>
<html lang="en">


<body>
    <?php include('../../Componentes/menuAdministracion.php'); ?>

    <div class="contenedorServicios">



        <div class="formLogin">
            <h3 id="titulos">Detalle de cliente</h3>
            <form action="" method="POST">

                <div class="flex-externo">
                    <ul>
                        <li>
                            <label for="idCliente">Id cliente: <span><?php echo $idCliente; ?></span></label>

                        </li>
                        <li>
                            <label for="razonSocial">Razón Social:
                                <span><?php echo $row['razonSocial']; ?></span></label>

                        </li>
                        <li>
                            <label for="rfc">RFC: <span> <?php echo $row['rfc']; ?></span></label>

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
                    </ul>
                </div>

                <div class="flex-externo">
                    <UL>
                        <li>
                            <a class="botonRegresar" href="../../vista/admin/visualizarCliente.php">Regresar</a>
                        </li>
                    </ul>
                    <ul>
                        <li>
                            <a class="botonRegresar"
                                href="reportes/detalleClientePDF.php?id=<?php echo $idCliente;?>">Generar PDF </a>
                        </li>
                    </ul>
                    <div>


            </form>

        </div>
    </div>

</body>

</html>