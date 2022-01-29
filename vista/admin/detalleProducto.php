<?php  include  ('../../controller/sessionAdmin.php');
 include ('../../controller/conexion.php');

?>

<?php 
$idProducto = $_GET['id'];
$mensaje ='';


// Sentencia SQL para mostrar los datos en los input
$query = "SELECT * FROM producto
WHERE idProducto = :idProducto";
$resultado=$dbConexion->prepare($query);
$resultado->execute(array(":idProducto"=>$idProducto)); 
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
                            <label for="idCliente">Id producto: <span><?php echo $idProducto; ?></span></label>

                        </li>
                        <li>
                            <label for="razonSocial">Nombre:
                                <span><?php echo $row['nombre']; ?></span></label>

                        </li>
                        <li>
                            <label for="rfc">Material: <span> <?php echo $row['material']; ?></span></label>

                        </li>
                        <li>
                            <label for="telefono">Dimensiones: <span> <?php echo $row['dimensiones']; ?></span></label>

                        </li>
                        <li>
                            <label for="correo">Precio unitario: <span> <?php echo $row['precioUnitario']; ?></span></label>

                        </li>
                        <li>
                            <label for="estado">Cantidad: <span> <?php echo $row['cantidad']; ?></span></label>

                        </li>
                        <li>
                            <label class="limiteImagen" for="ciudad">Imagen: </label>

                        </li>
                       
                    </ul>
                </div>

                <div class="flex-externo">
                    <ul>
                        <li>
                        <textarea name="imagen" rows="10" cols="50"><?php echo $row['imagen']; ?></textarea>
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