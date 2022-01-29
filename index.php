<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>PYREI</title>
    <link rel="stylesheet" type="text/css" href="css/estilosIndexFlex.css">
</head>

<body>

   <?php include("./Componentes/menuPrincipalIndex.php") ?>

   
    <h3 id="titulos">Conoce nuestros servicios</h3>


    <div class="contenedorServicios">

        <ul>
            <li class="imgServicios"><img class="imgInicio" src="img/maquinadoCNC.png" alt="logoSiec" loading="lazy">
            </li>
            <li class="textoServicios">
                <p> Nuestros procesos de maquinado CNC de alto desempeño, permiten realizar cortes
                    y desbastes de materiales pesados con la mas alta precisión. </p>
                
                    <input onclick="location.href='/vista/servicios.php'" type='button' value=' Ver servicios ' id="buttonServicios">
             
            </li>
        </ul>

    </div>
    <hr>
    <h3 id="titulos">Nuestra historia</h3>

    <div class="contenedorHistoria">

        <p>
            Piezas y refacciones industriales SAS de CV o PYREI es una empresa joven,
            pero con mucha experiencia, se integró en el mercado en el año 2007 en el ramo metalmecánica,
            especializada en refracciones para maquinaria industrial, especialmente dando soporte a procesos
            de rolado y doblado de tubos junto de la fabricación de moldes de aluminio para vaciado.
        </p>

    </div>
    <hr>
    <h3 id="titulos">Clientes</h3>
    <div>
        <img class="imgClientes" src="img/clientes.png" alt="logoSiec" loading="lazy">
    </div>
    <hr>
    <?php include("./Componentes/footer.php") ?>
</body>

</html>