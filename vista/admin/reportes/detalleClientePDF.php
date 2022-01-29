<?php ob_start();
 include ('../../../controller/conexion.php');
$idCliente = $_GET[ 'id'];


$query = "SELECT * FROM cliente
WHERE idCliente = :idClienteR";
$resultado=$dbConexion->prepare($query);
$resultado->execute(array(":idClienteR"=>$idCliente)); 
$row=$resultado->fetch(PDO::FETCH_ASSOC);
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
        color: grey;

    }

    .contenedor {
        margin-top: -10px;
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

    .borde {
        border-radius: 10px;
        border: 1px solid grey;
        background: #F9F8F8;
        padding-left: 5px;
    }

    TABLE {
        width: 100%;
        font-family: Arial;
        color: grey;
        margin-top: 50px;
    }

    .alineacionIzquierda {
        text-align: center;
        margin-top: -10px;
        margin-left: 160px;
    }

    .logo {
        height: 50px;
        width: 100px;
        margin-left: 100px;

    }

    img {
        max-width: 100%;
        max-height: 100%;
    }
    </style>
    <title>Reporte cliente</title>
</head>

<?php
$nombreImagen = "../../../img/logoPYREI.jpg";
$imagenBase64 = "data:image/jpg;base64," . base64_encode(file_get_contents($nombreImagen));
?>

<body>

    <div class="logo">
        <img src="<?php echo $imagenBase64 ?>">
    </div>

    <div class="contenedor">

        <H3 class="alineacionIzquierda">REPORTE INDIVIDUAL DE CLIENTE</H3>
        <H3 class="alineacionIzquierda"> ID DE CLIENTE: <span><?php echo $idCliente;	?></span></H3>
        <TABLE BORDER>
            <TR>
                <TH>Razon Social</TH>
                <TD class="borde"><?php echo $row['razonSocial'];	?></TD>
            <TR>
                <TH>RFC</TH>
                <TD class="borde"><?php echo $row['rfc'];	?></TD>
            <TR>
                <TH>Teléfono</TH>
                <TD class="borde"><?php echo $row['telefono'];	?></TD>
            <TR>
                <TH>Correo</TH>
                <TD class="borde"><?php echo $row['correo'];	?></TD>
            <TR>
                <TH>Estado</TH>
                <TD class="borde"><?php echo $row['estado'];	?></TD>
            <TR>
                <TH>Ciudad</TH>
                <TD class="borde"><?php echo $row['ciudad'];	?></TD>
            <TR>
                <TH>Colonia</TH>
                <TD class="borde"><?php echo $row['colonia'];	?></TD>
            <TR>
                <TH>CP</TH>
                <TD class="borde"><?php echo $row['cp'];	?></TD>
            <TR>
                <TH>No. Exterior</TH>
                <TD class="borde"><?php echo $row['noExterior'];	?></TD>
            <TR>
                <TH>No. Interior</TH>
                <TD class="borde"><?php echo $row['noInterior'];	?></TD>
        </TABLE>



        <?php
       
        
        ?>
    </div>
</body>

</html>

<?php

require_once("../dompdf/autoload.inc.php");
use Dompdf\Dompdf;
$dompdf = new dompdf();
$dompdf ->load_html(ob_get_clean());
$dompdf ->render();
$pdf = $dompdf -> output();
$filename = 'cliente.pdf';
$dompdf->stream($filename, array("Attachment" =>0));

?>