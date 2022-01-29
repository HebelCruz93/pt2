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


    <h3 id="titulos">Catalogo - &nbsp;<span> <?php echo $nombreCatalogo?></span></h3>
    <div>
        <a class="botonGenerarPDF" href="reportes/reporteImagenes.php?id=<?php echo $idCatalogo;?>">
            Generar PDF</a>
    </div>
    <div class="tabla-estilos">
        <table>
            <thead>
                <tr>
                    <th scope="col"> Id Catalogo </th>
                    <th scope="col"> Nombre Producto</th>
                 



                </tr>
            </thead>
            <tbody>
                <?php
               
                        // Query select
                        $queryConsulta = "SELECT idCatalogo, catalogo_producto.idProducto, producto.nombre FROM catalogo_producto
                        INNER JOIN producto ON  producto.idProducto=catalogo_producto.idProducto
                        WHERE idCatalogo = :idCatalogoV";
                         $resultado=$dbConexion->prepare($queryConsulta);
                         $resultado->execute(array(":idCatalogoV"=>$idCatalogo));
                         $row=$resultado->fetch(PDO::FETCH_ASSOC);
                       
                        while($row=$resultado->fetch(PDO::FETCH_ASSOC)){
                    ?>


                <tr>
                    <th> <?php echo $row['idCatalogo'] ?> </th>
                    <th> <?php echo $row['nombre'] ?> </th>
                                              
                    <th class="sinBorde"><a href="../../controller/eliminarProductoCatalogo.php?id=<?php echo $row['idProducto'];?>"
                            class="botonEstilo"> Eliminar</a></th>           
                  
                </tr>
                <?php

                        }
                        $resultado->closeCursor();
                    ?>
            </tbody>

        </table>
        <div class="flex-externo aumento">
                
                <ul>
                <li>
                        <a  class="botonRegresar" href="../../vista/admin/visualizarCatalogos.php">Regresar</a>
                </li>
                </ul>
                <div>
    </div>
    </div>
</body>