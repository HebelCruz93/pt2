<?php  include  ('../../controller/sessionAdmin.php');
 include ('../../controller/conexion.php');

?>


<!DOCTYPE html>
<html lang="en">


<body>
    <?php include('../../Componentes/menuAdministracion.php'); ?>

    <div class="contenedorServicios">



        <div class="formLogin">
            <h3 id="titulos">Registrar Producto</h3>
            <form action="../../controller/registrarProducto.php" method="POST">

                <div class="flex-externo">
                    <ul>
                        <li>
                            <label for="nombreProducto">Nombre: </label>
                            <input class="aumentoProducto" type="text" id="nombreProducto" name="nombreProducto" required
                                placeholder="Ingresa el nombre del producto">

                        </li>
                        <li>
                            <label for="material">Material: </label>
                            <input class="aumentoProducto" type="text" id="material" name="material" required
                                placeholder="Ingresa el tipo de material">

                        </li>
                        <li>
                            <label for="dimensiones">Dimensiones: </label>
                            <input class="aumentoProducto" type="text" id="dimensiones" name="dimensiones" required
                                placeholder="Ingresas dimensiones">

                        </li>
                        <li>
                            <label for="precio">Precio: </label>
                            <input class="aumentoProducto" type="text" id="precio" name="precio" required
                                placeholder="Ingresa el precio unitario">

                        </li>
                        <li>
                            <label for="cantidad">Cantidad: </label>
                            <input class="aumentoProducto" type="text" id="cantidad" name="cantidad" required
                                placeholder="Ingresa la cantidad">

                        </li>

                    </ul>
                </div>
                <div class="flex-externo">
                    <ul>
                        <li>
                        <textarea name="imagen" rows="10" cols="43"></textarea>
                        </li>
                    </ul>
                </div>



                <div class="flex-externo aumentoProducto ">
                    <ul>
                        <li class="aumentoBtnProducto">
                            <button type="submit">Registrar Producto</button>
                        </li>
                    </ul>
                  

            </form>

        </div>
    </div>

</body>

</html>