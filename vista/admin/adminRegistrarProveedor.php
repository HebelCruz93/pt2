<?php  include  ('../../controller/sessionAdmin.php');
 include ('../../controller/conexion.php');

?>

<!DOCTYPE html>
<html lang="en">

<body>
<?php include('../../Componentes/menuAdministracion.php'); ?>

    
    <H3 id="titulos"> Registro de proveedor</H3>
    <div class="formContacto">
        <form action="../../controller/registrarProveedor.php" method="POST">      
            <div class="flex-externo">
                <ul>
                    <li>
                        <label for="razonSocial">Razón social:</label>
                        <input class="aumentoEspecial" type="text" id="razonSocial" name="razonSocial" required
                            placeholder="Ingresa la razón social">
                    </li>
                </ul>
                <ul>
                    <li>
                        <label for="rfc">RFC:</label>
                        <input class="aumentoEspecial" type="text" id="rfc" name="rfc" required
                            placeholder="Ingresa RFC">
                    </li>
                </ul>
                <ul>
                    <li>
                        <label for="telefono">Teléfono:</label>
                        <input class="reduccion aumentoEspecial" type="text" id="telefono" name="telefono" required placeholder="Ingresa Teléfono">
                    </li>
                </ul>
                <ul>
                    <li>
                        <label for="correo">Correo:</label>
                        <input class="aumentoEspecial"  type="text" id="correo" name="correo" required placeholder="Ingresa Correo">
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
                        <button  type="submit">Registrar proveedor</button>
                    </li>
                </ul>
                <div>
        </form>


</body>

</html>