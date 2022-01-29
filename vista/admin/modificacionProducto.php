<?php  include  ('../../controller/sessionAdmin.php');
 include ('../../controller/conexion.php');


 $idProducto = $_GET['id'];



 // Sentencia SQL para mostrar los datos en los input
 $query = "SELECT *
 FROM producto
 WHERE idProducto = :idProducto";
 $resultado=$dbConexion->prepare($query);
 $resultado->execute(array(":idProducto"=>$idProducto)); 
 $row=$resultado->fetch(PDO::FETCH_ASSOC);   
 ?>
 

?>


<!DOCTYPE html>
<html lang="en">


<body>
    <?php include('../../Componentes/menuAdministracion.php'); ?>

    <div class="contenedorServicios">



        <div class="formLogin">
            <h3 id="titulos">Modificar Producto</h3>
            <form action="../../controller/registrarProducto.php" method="POST">

                <div class="flex-externo">
                    <ul>
                        <li>
                            <label for="nombreProducto">Nombre: </label>
                            <input class="aumentoProducto" type="text" id="nombreProducto" name="nombreProducto"
                            value="<?php echo $row['nombre']; ?>">

                        </li>
                        <li>
                            <label for="material">Material: </label>
                            <input class="aumentoProducto" type="text" id="material" name="material" 
                            value="<?php echo $row['material']; ?>">

                        </li>
                        <li>
                            <label for="dimensiones">Dimensiones: </label>
                            <input class="aumentoProducto" type="text" id="dimensiones" name="dimensiones" 
                            value="<?php echo $row['dimensiones']; ?>">

                        </li>
                        <li>
                            <label for="precio">Precio: </label>
                            <input class="aumentoProducto" type="text" id="precio" name="precio" 
                            value="<?php echo $row['precioUnitario']; ?>">

                        </li>
                        <li>
                            <label for="cantidad">Cantidad: </label>
                            <input class="aumentoProducto" type="text" id="cantidad" name="cantidad" 
                            value="<?php echo $row['cantidad']; ?>">

                        </li>

                    </ul>
                </div>


                <div class="flex-externo aumentoProducto ">
                    <ul>
                        <li class="aumentoBtnProducto">
                            <button type="submit">Modificar Producto</button>
                        </li>
                    </ul>
                  

            </form>

        </div>
    </div>

</body>

</html>