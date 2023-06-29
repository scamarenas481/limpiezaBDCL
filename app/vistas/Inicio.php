<?php
class Inicio
{
    public function render()
    {
        ?>
        <html>
        <head>
            <title>Inicio</title>
            <link rel="stylesheet" href="estilos.css">
        </head>
        <body>
            <div class="container">
                <div class="logo">
                    <img src="th.jpeg" alt="Construrama Logo">
                </div>

                <button class="btn btn-primary" type="button" id="inventarioInicialBtn">Inventario Inicial</button>
                <button class="btn btn-primary" type="button" id="revisionButton">Revisión</button>
                <button class="btn btn-primary" type="button" id="faltantesBtn">Faltantes</button>
                <button class="btn btn-primary" type="button" id="bajaProductosBtn">Baja Productos</button>
                <button class="btn btn-primary" type="button" id="restructuraBtn">Reestructura</button>

                <script src="JS/MenuScripts.js"></script>
            </div>
        </body>
        </html>
        <?php
    }
}

// Crear una instancia de la clase Inicio y llamar al método render para generar el contenido HTML
$inicio = new Inicio();
$inicio->render();
?>
