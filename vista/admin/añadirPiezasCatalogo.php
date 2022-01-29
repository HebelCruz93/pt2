<?php  include  ('../../controller/sessionAdmin.php');
 include ('../../controller/conexion.php');

 $idCatalogo = $_GET['id'];
?>


<!DOCTYPE html>
<html lang="en">


<body>
    <?php include('../../Componentes/menuAdministracion.php'); 
     $queryConsultaCatalogo = "SELECT nombreCatalogo FROM catalogo WHERE idCatalogo =:idCatalogoA";
     $resultadoCatalogo=$dbConexion->prepare($queryConsultaCatalogo);    
     $resultadoCatalogo->execute(array(":idCatalogoA"=>$idCatalogo)); 
     $rowCatalogo=$resultadoCatalogo->fetch(PDO::FETCH_ASSOC); 
     $nombreCatalogo = $rowCatalogo['nombreCatalogo'];
    ?>

    <h3 id="titulos">Añadir piezas al catalogo  - &nbsp;<span> <?php echo $nombreCatalogo?></span></h3>
    <div class="contenedorServicios">



        <div class="formLogin">
            <form action="../../controller/registrarProductoCatalogo.php" method="POST">
            <input type="hidden" id="idCatalogo" name="idCatalogo"  value="<?php echo $idCatalogo; ?>">
                <div class="flex-externo">

                    <ul>
                        <li>
                            <label for="producto">Producto:</label>
                            <?php
                            $queryConsulta = "SELECT idProducto, nombre FROM producto";
                            $resultado=$dbConexion->prepare($queryConsulta);
                            ?>


                            <select name="idProducto" id="tipoProducto" class="input-texto">
                                <option value="" hidden> Selecciona el producto </option>
                                <?php
                                $resultado->execute(); 
                                while($row=$resultado->fetch(PDO::FETCH_ASSOC)){
                                 echo "<option value=".$row['idProducto'].">".$row['nombre']."</option>";
                                }
                                $resultado->closeCursor();
                                ?>

                            </select>
                        </li>
                    </ul>

                </div>


                <div class="flex-externo aumento">
                    <ul>
                        <li>
                            <button type="submit">Añadir al catalogo</button>
                        </li>
                    </ul>
                    <div>
            </form>
</body>

</html>