<?php  include  ('../../controller/sessionAdmin.php');
 include ('../../controller/conexion.php');

?>

<!DOCTYPE html>
<html lang="en">

<body>
<?php include('../../Componentes/menuAdministracion.php'); ?>


    <h3 id="titulos">Ingresos</h3>
    <div>
    <a  class="botonGenerarPDF" href="reportes/reporteIngresos.php">
                            Generar PDF</a>
    </div>
    <div class="tabla-estilos">
        <table >
            <thead>
                <tr>
                    <th scope="col"> No factura </th>
                    <th scope="col"> Razón social </th>                                    
                    <th scope="col"> Fecha de emisión </th>  
                    <th scope="col"> Fecha de pago </th>   
                    <th scope="col"> Total </th>                      
                
                   
                </tr>
            </thead>
            <tbody>
                <?php
                        // Query select
                        $queryConsulta = "SELECT noFactura, cliente.razonSocial, fecha, fechaPago, total FROM ingreso 
                        INNER JOIN cliente ON ingreso.idCliente = cliente.idCliente";
                        $resultado=$dbConexion->prepare($queryConsulta);
                        $resultado->execute(); 
                        while($row=$resultado->fetch(PDO::FETCH_ASSOC)){
                    ?>


                <tr>
                    <th> <?php echo $row['noFactura'] ?> </th>
                    <th> <?php echo $row['razonSocial'] ?> </th>                  
                    <th> <?php echo $row['fecha'] ?> </th>                   
                    <th> <?php echo $row['fechaPago'] ?> </th>   
                    <th> $<?php echo $row['total'] ?> </th> 
                    <th class="sinBorde"><a href="reportes/reporteIndividualIngreso.php?id=<?php echo $row['noFactura'];?>" class="botonEstilo">
                            Generar PDF</a></th>                                  
                                       
                </tr>
                <?php

                        }
                        $resultado->closeCursor();
                    ?>
            </tbody>

        </table>
    </div>
    </div>
    </body>

