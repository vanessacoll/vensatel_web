<section id="coberture_page" class="bg-200 text-center">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-lg-9 col-xl-8">





                <head>
                    <meta charset="UTF-8">
                    <meta name="viewport" content="width=device-width, initial-scale=1.0">
                    <title>Mapa de Cobertura </title>
                    <link rel="stylesheet" href="styles.css">
                </head>

                <body>
                    <h1>Rango de Cobertura</h1>
                    <div class="map-container">
                        <img src="page_template/img/49.png" alt="Venezuela" id="map-image">
                    </div>
                    <div class="buttons">
                        <button class="btn btn" id="bolivar-button">Bolívar</button>
                        <button class="btn btn" id="anzoategui-button">Anzoátegui</button>
                    </div>
                    <script src="script.js"></script>
                </body>



            </div>
        </div>
    </div>
</section>

<script>
    // Obtenemos referencias a los elementos HTML
    const bolivarButton = document.getElementById("bolivar-button");
    const anzoateguiButton = document.getElementById("anzoategui-button");
    const mapImage = document.getElementById("map-image");

    // Configuramos las imágenes correspondientes a cada estado
    const bolivarImage = "page_template/img/bolivar.png";
    const anzoateguiImage = "page_template/img/anzoategui.png";
    const originalImage = "page_template/img/49.png"; // Agregamos la imagen original

    // Asignamos funciones para cambiar la imagen al hacer clic en los botones
    bolivarButton.addEventListener("mouseover", () => {
        mapImage.src = bolivarImage;
    });

    anzoateguiButton.addEventListener("mouseover", () => {
        mapImage.src = anzoateguiImage;
    });

    // Agregamos event listeners para restaurar la imagen original al quitar el cursor del botón
    bolivarButton.addEventListener("mouseout", () => {
        mapImage.src = "page_template/img/49.png";
    });

    anzoateguiButton.addEventListener("mouseout", () => {
        mapImage.src = "page_template/img/49.png";
    });
</script>
