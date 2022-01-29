<?php ob_start();

include ('../../../controller/conexion.php');
$idCatalogo = $_GET['id'];

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
        margin-top: 100px;
        list-style: none;
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



    .titulos {
        font-size: 26px;
    }

    .logo {
        height: 100px;
        width: 150px;
        margin-left: 450px;
        padding-top: 100px;

    }

    img {
        max-width: 100%;
        max-height: 100%;
    }

    .imagenCatalogo {
        width: 300px;
        height: 300px;
    }



    .paginaInicio {
        height: 400px;
        margin-top: 200px;
    }

    .titulosPiezas {
        text-align: Center;
        margin-top: 50px;
        padding-bottom: 0px;
    }

    .contenedorImagen {
        padding-top: 30px;
    }
    </style>
    <title>Catalogos</title>
</head>
<!--Esta seccion permite cargar el logo-->
<?php
$nombreImagen = "../../../img/logoPYREI.jpg";
$imagenBase64 = "data:image/jpg;base64," . base64_encode(file_get_contents($nombreImagen));
?>


<body>


    <div class="paginaInicio">
        <H2 class="alineacionIzquierda">NOMBRE DEL CATALOGO</H2>
        <H2 class="alineacionIzquierda">PIEZAS Y REFACCCIONES INDUSTRIALES</H2>
        <div class="logo">
            <img src="<?php echo $imagenBase64 ?>" />
        </div>

    </div>

    <div class="contenedor">




        <?php

                                $queryConsulta = "SELECT idCatalogo, producto.nombre, producto.imagen FROM catalogo_producto
                                INNER JOIN producto ON  producto.idProducto=catalogo_producto.idProducto
                                WHERE idCatalogo = :idCatalogoV";
                                $resultado=$dbConexion->prepare($queryConsulta);
                                $resultado->execute(array(":idCatalogoV"=>$idCatalogo));                              
                                while($row=$resultado->fetch(PDO::FETCH_ASSOC)){
                                $resultadoImagenCatalogo = $row['imagen'];
                                $nombreImagenCatalogo = "$resultadoImagenCatalogo";
                                $imagenBase64Catalogo = "data:image/jpg;base64," . base64_encode(file_get_contents($nombreImagenCatalogo));
                                ?>

        <ul class="contenedor">
            <li class="titulosPiezas">
                <h3><?php echo $row['nombre'];	?></hr>
            </li>
            <li class="contenedorImagen"> <img class="imagenCatalogo" src="<?php echo $imagenBase64Catalogo ?>" /></li>

        </ul>

        <?php


                                    }
                                    $resultado->closeCursor();
                                    ?>

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
$filename = 'catalogo.pdf';
$dompdf->stream($filename, array("Attachment" =>0));

?>