<?php ob_start();
 include ('../../../controller/conexion.php');
$noRemision = $_GET[ 'id'];


$query = "SELECT noRemision, ingreso.noFactura, cliente.razonSocial, fecha, fechaPago, total, remision.motivo FROM remision 
INNER JOIN ingreso ON ingreso.noFactura = remision.noFactura
INNER JOIN cliente ON ingreso.idCliente = cliente.idCliente
WHERE noRemision = :noRemisionR";
$resultado=$dbConexion->prepare($query);
$resultado->execute(array(":noRemisionR"=>$noRemision)); 
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
        margin-top: 90px;
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
    <title>Reporte remisión</title>
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

        <H3 class="alineacionIzquierda">REPORTE INDIVIDUAL DE REMISIÓN</H3>
        
        <TABLE BORDER>
        <TR>
                <TH>No Remisión</TH>
                <TD class="borde"><?php echo $noRemision;	?></TD>
            <TR>
                <TH>No Factura</TH>
                <TD class="borde"><?php echo$row['noFactura'];	?></TD>
            <TR>
                <TH>Razón social</TH>
                <TD class="borde"><?php echo $row['razonSocial'];	?></TD>
            <TR>
                <TH>Fecha de emisión</TH>
                <TD class="borde"><?php echo $row['fecha'];	?></TD>
            <TR>
                <TH>Fecha de pago</TH>
                <TD class="borde"><?php echo $row['fechaPago'];	?></TD>
            <TR>
                <TH>Total</TH>
                <TD class="borde">$<?php echo $row['total'];	?></TD>
                <TR>
            <TH>Motivo de remisión</TH>
                <TD class="borde"><?php echo $row['motivo'];	?></TD>
           

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
$filename = 'remision.pdf';
$dompdf->stream($filename, array("Attachment" =>0));

?>