<?php ob_start();

include ('../../../controller/conexion.php');


?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content=" class th=device- class th, initial-scale=1.0">

    <link rel="stylesheet" type="text/css" media="screen" href="styleReportePhp.css" />

    <style>
    p {
        color: black;
        font-size: 12px;

    }

    .contenedor {
        margin-top: 200px;
        height: 20px;
        width: 100%;
        justify-content: center;
        text-align: center;
    }

    .izquierda {
        width: 30%;
    }

    .derecha {
        width: 70%;

    }

    .espaciosCelda {
        width: 1%;
        white-space: nowrap;
    }



    .bordeInferior {
        border-bottom: 1px solid black;

    }

    .bordePunteado {
        border: 1px dotted black;
        background-color: #F4F016;
    }

    TABLE {
        width: 100%;
        font-family: Arial;
        color: black;
        font-size: 12px;

    }

    .borde {
        border: 1px solid black;
    }

    TABLE:TR,
    TH {

        text-align: left;
    }

    .reduccionLetra {
        font-size: 8px;
    }

    .tamañoColumnaTitulo {
        width: 100px;
    }

    .alineacionIzquierda {
        text-align: center;
        margin-top: -10px;
        margin-left: 100px;
    }

    .alineacionDerecha {
        text-align: right;
    }

    .alineacionCentrado {
        text-align: Center;
        margin-top: 0px;

    }

    .tamañoDiv {
        width: 200px;
    }

    .margenSuperior {
        margin-top: 18px;


    }

    .titulos {
        font-size: 26px;
    }

    .logo {
        height: 50px;
        width: 100px;
        margin-left: 20px;

    }

    img {
        max-width: 100%;
        max-height: 100%;
    }

    .contenedor{
        margin-top:50px;
    }
    </style>
    <title>Clientes</title>
</head>
<!--Esta seccion permite cargar el logo-->
<?php
$nombreImagen = "../../../img/logoPYREI.jpg";
$imagenBase64 = "data:image/jpg;base64," . base64_encode(file_get_contents($nombreImagen));
?>


<body>
    <div class="logo">
        <img src="<?php echo $imagenBase64 ?>" />
    </div>
    <H3 class="alineacionIzquierda">REPORTE DE CLIENTES</H3>
    <div class="contenedor">
        <TABLE BORDER>
            <TR>
                <TH>
                    <div class="borde margenSuperior ">
                    
                        <TABLE BORDER>
                            <thead>

                               

                                <tr>
                                    <th class="bordeInferior" width="20px" scope="col">ID</th>
                                    <th class="bordeInferior" width= "300px" scope="col">RAZON SOCIAL</th>
                                    <th class="bordeInferior" width="110px" scope="col">RFC</th>
                                    <th class="bordeInferior" width="20px" Scope="col">TELÉFONO</span></th>
                                    <th class="bordeInferior" width="100px" scope="col">CORREO</th>
                                    <th class="bordeInferior" width="100px" scope="col">ESTADO</th>
                                    <th class="bordeInferior" width="100px" scope="col">CIUDAD</th>                                 
                                    <th class="bordeInferior" width="1%" scope="col">CP</th>
                                                                  
                                   
                                </tr>

                            </thead>

                            <tbody>
                                <?php
                                $queryConsulta = "SELECT * FROM cliente";
                                $resultado=$dbConexion->prepare($queryConsulta);
                                $resultado->execute(); 
                                while($row=$resultado->fetch(PDO::FETCH_ASSOC)){
                                
                                ?>
                                <tr>

                                    <TD><?php echo $row['idCliente'];	?></TD>
                                    <TD><?php echo $row['razonSocial'];	?></TD>
                                    <TD><?php echo $row['rfc'];	?></TD>
                                    <TD><?php echo $row['telefono'];	?></TD>
                                    <TD><?php echo $row['correo'];	?></TD>
                                    <TD><?php echo $row['estado'];	?></TD>
                                    <TD><?php echo $row['ciudad'];	?></TD>
                                    <TD><?php echo $row['cp'];	?></TD>
                                   
                                   


                                </tr>
                                <?php

                                    }
                                    $resultado->closeCursor();
                                    ?>

                             
                            </tbody>

                        </TABLE>
                     

                    </div>
                </TH>
            </TR>
        </TABLE>
    </div>


   

        

     

    </div>



</body>

</html>

<?php

require_once("../dompdf/autoload.inc.php");
use Dompdf\Dompdf;
$dompdf = new dompdf();
$dompdf->set_paper('letter', 'landscape');
$dompdf ->load_html(ob_get_clean());
$dompdf ->render();
$pdf = $dompdf -> output();
$filename = 'clientes.pdf';
$dompdf->stream($filename, array("Attachment" =>0));

?>