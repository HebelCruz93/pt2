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
    <title>Empleados</title>
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
    <H3 class="alineacionIzquierda">REPORTE DE EMPLEADOS</H3>
    <div class="contenedor">
        <TABLE BORDER>
            <TR>
                <TH>
                    <div class="borde margenSuperior ">
                    
                        <TABLE BORDER>
                            <thead>

                               

                                <tr>
                                    <th class="bordeInferior" width="20px" scope="col">ID</th>
                                    <th class="bordeInferior" width= "150px" scope="col">NOMBRE COMPLETO</th>
                                    <th class="bordeInferior" width="110px" scope="col">FECHA ENTRADA</th>
                                    <th class="bordeInferior" width="20px" Scope="col">EDAD</span></th>
                                    <th class="bordeInferior" width="50px" scope="col">SEXO</th>
                                    <th class="bordeInferior" width="100px" scope="col">CURP</th>
                                    <th class="bordeInferior" width="100px" scope="col">RFC</th>
                                    <th class="bordeInferior" width="80px" scope="col">NSS</th>
                                    <th class="bordeInferior" width="1%" scope="col">TELÉFONO</th>
                                    <th class="bordeInferior" width="1%" scope="col">CORREO</th>
                                    <th class="bordeInferior" width="1%" scope="col">ESTADO</th>                                   
                                   
                                </tr>

                            </thead>

                            <tbody>
                                <?php
                                $queryConsulta = "SELECT * FROM empleado";
                                $resultado=$dbConexion->prepare($queryConsulta);
                                $resultado->execute(); 
                                while($row=$resultado->fetch(PDO::FETCH_ASSOC)){
                                
                                ?>
                                <tr>

                                    <TD><?php echo $row['idEmpleado'];	?></TD>
                                    <TD><?php echo $row['nombreCompleto'];	?></TD>
                                    <TD><?php echo $row['fechaEntrada'];	?></TD>
                                    <TD><?php echo $row['edad'];	?></TD>
                                    <TD><?php echo $row['sexo'];	?></TD>
                                    <TD><?php echo $row['curp'];	?></TD>
                                    <TD><?php echo $row['rfc'];	?></TD>
                                    <TD><?php echo $row['nss'];	?></TD>
                                    <TD><?php echo $row['telefono'];	?></TD>
                                    <TD><?php echo $row['correo'];	?></TD>
                                    <TD><?php echo $row['estado'];	?></TD>
                                   


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
$filename = 'nombre.pdf';
$dompdf->stream($filename, array("Attachment" =>0));

?>