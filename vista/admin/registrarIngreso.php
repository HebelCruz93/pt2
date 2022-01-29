<?php  include  ('../../controller/sessionAdmin.php');
 include ('../../controller/conexion.php');

?>


<!DOCTYPE html>
<html lang="en">


<body>
    <?php include('../../Componentes/menuAdministracion.php'); ?>

    <div class="contenedorServicios">



        <div class="formLogin">
            <h3 id="titulos">Registro de ingresos</h3>
            <form action="../../controller/registrarIngresos.php" method="POST">
                <div class="flex-externo">

                    <ul>
                        <li>
                            <label for="factura">No. Factura:</label>
                            <input class="" type="text" name="factura" id="factura"
                                placeholder="Ingresa el numero de factura" required>
                        </li>
                    </ul>

                </div>
                <div class="flex-externo">

                    <ul>
                        <li>
                            <label for="razonSocial">Razon social:</label>
                            <?php
                    $queryConsulta = "SELECT idCliente, razonSocial FROM cliente";
                    $resultado=$dbConexion->prepare($queryConsulta);
                    ?>


                            <select name="razonSocial" id="razonSocial" class="input-texto">
                                <option value="" hidden> Selecciona el cliente </option>
                                <?php
                        $resultado->execute(); 
                        while($row=$resultado->fetch(PDO::FETCH_ASSOC)){
                            echo "<option value=".$row['idCliente'].">".$row['razonSocial']."</option>";
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
                            <label for="fechaEmision">Fecha de emisión:</label>
                            <input class="" type="text" name="fechaEmision" id="fechaEmision"
                                placeholder="Ingresa la fecha de la factura" required>
                        </li>
                    </ul>

                </div>
                <div class="flex-externo">

                    <ul>
                        <li>
                            <label for="fechaPago">Fecha de pago:</label>
                            <input class="" type="text" name="fechaPago" id="fechaPago"
                                placeholder="Ingresa la fecha de pago" required>
                        </li>
                    </ul>

                </div>
                <div class="flex-externo">

                    <ul>
                        <li>
                            <label for="total">Total:</label>
                            <input class="" type="text" name="total" id="total"
                                placeholder="Ingresa el total" required>
                        </li>
                    </ul>

                </div>




                <div class="flex-externo aumento">
                    <ul>
                        <li>
                            <button type="submit">Registrar Ingreso</button>
                        </li>
                    </ul>
                    <div>
            </form>
</body>

</html>