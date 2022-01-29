<?php  include  ('../../controller/sessionAdmin.php');
 include ('../../controller/conexion.php');



$idProveedor = $_GET['id'];



// Sentencia SQL para mostrar los datos en los input
$query = "SELECT *
FROM proveedor
WHERE idProveedor = :idProveedor";
$resultado=$dbConexion->prepare($query);
$resultado->execute(array(":idProveedor"=>$idProveedor)); 
$row=$resultado->fetch(PDO::FETCH_ASSOC);   
?>



<!DOCTYPE html>
<html lang="en">

<body>
<?php include('../../Componentes/menuAdministracion.php'); ?>

    
    <H3 id="titulos"> Modificación de proveedor</H3>
    <div class="formContacto">
        <form action="../../controller/modificarProveedor.php" method="POST">     
        <input type="hidden" id="idProveedor" name="idProveedor"  value="<?php echo $idProveedor; ?>">  
            <div class="flex-externo">
                <ul>
                    <li>
                        <label for="razonSocial">Razón social:</label>
                        <input class="aumentoEspecial" type="text" id="razonSocial" name="razonSocial" required
                        value="<?php echo $row['razonSocial']; ?>">
                    </li>
                </ul>
                <ul>
                    <li>
                        <label for="rfc">RFC:</label>
                        <input class="aumentoEspecial" type="text" id="rfc" name="rfc" required
                        value="<?php echo $row['rfc']; ?>">
                    </li>
                </ul>
                <ul>
                    <li>
                        <label for="telefono">Teléfono:</label>
                        <input class="reduccion aumentoEspecial" type="text" id="telefono" name="telefono" required value="<?php echo $row['telefono']; ?>">
                    </li>
                </ul>
                <ul>
                    <li>
                        <label for="correo">Correo:</label>
                        <input class="aumentoEspecial"  type="text" id="correo" name="correo" required value="<?php echo $row['correo']; ?>">
                    </li>
                </ul>
                
            </div>
           
        

            <div class="flex-externo">
                <ul>
                    <li>
                        <label for="estado">Estado:</label>
                        <input class="aumento" type="text" id="estado" name="estado" required value="<?php echo $row['estado']; ?>">
                    </li>
                </ul>
                <ul>
                    <li>
                        <label for="ciudad">Ciudad:</label>
                        <input class="aumento" type="text" id="ciudad" name="ciudad" required  value="<?php echo $row['ciudad']; ?>" >
                    </li>
                </ul>
                <ul>
                    <li>
                        <label for="colonia">Colonia:</label>
                        <input class="aumento" type="text" id="colonia" name="colonia" required  value="<?php echo $row['colonia']; ?>" >
                    </li>
                </ul>
            </div>


            <div class="flex-externo">
                <ul>
                    <li>
                        <label for="cp">CP:</label>
                        <input class="aumento" type="text" id="cp" name="cp" required value="<?php echo $row['cp']; ?>" >
                    </li>
                </ul>
                <ul>
                    <li>
                        <label for="noExterior">No. Exterior:</label>
                        <input class="aumento" type="text" id="noExterior" name="noExterior" required
                        value="<?php echo $row['noExterior']; ?>">
                    </li>
                </ul>
                <ul>
                    <li>
                        <label for="noInterior">No. Interior:</label>
                        <input class="aumento" type="text" id="noInterior" name="noInterior" required
                        value="<?php echo $row['noInterior']; ?>">
                    </li>
                </ul>
            </div>


            <div class="flex-externo aumento">
                <ul>
                    <li>
                        <button  type="submit">Modificar proveedor</button>
                    </li>
                </ul>
                <ul>
                <li>
                        <a  class="botonRegresar" href="../../vista/admin/visualizarProveedor.php">Regresar</a>
                </li>
                </ul>
                <div>
        </form>


</body>

</html>