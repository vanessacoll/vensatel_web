<section id="coberture_page" class="bg-200 text-center">
    <div class="container">
        <div class="row justify-content-center">

            <h1>Rango de Cobertura</h1>
            <div class="row">
                <div class="col-lg-6">
                    <div class="map-container">
                        <img src="page_template/img/mapa vector png pagina.png" alt="Venezuela" id="map-image">
                    </div>
                </div>
                <div class="col-lg-6">
                    <div class="">


                        <div class="card text-center p ">
                            <div class="card-body">
                                <h5 class="card-title">Velocidad de descarga</h5>
                                <p class="card-text">Gracias a nuestra tecnología inhalambrica se garantiza la velocidad
                                    de conexión a internet mas serca de ti.
                                </p>

                            </div>
                        </div>
                        <br>
                        <div class="card text-center" id="bolivar-button">
                            <div class="card-body">
                                <h5 class="card-title">Bolívar</h5>
                                <p class="card-text">Gracias a nuestra tecnología inhalambrica se garantiza la velocidad
                                    de conexión a internet mas serca de ti.
                                </p>

                            </div>
                        </div>
                        <br>
                        <div class="card text-center" id="anzoategui-button">
                            <div class="card-body">
                                <h5 class="card-title">Anzoátegui</h5>
                                <p class="card-text">Gracias a nuestra tecnología inhalambrica se garantiza la velocidad
                                    de conexión a internet mas serca de ti.
                                </p>

                            </div>
                        </div>

                    </div>
                    <!-- Aquí puedes agregar tu espacio para el texto a la derecha -->
                </div>
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
    const originalImage = "page_template/img/mapa vector png pagina.png"; // Agregamos la imagen original

    // Asignamos funciones para cambiar la imagen al hacer clic en los botones
    bolivarButton.addEventListener("mouseover", () => {
        mapImage.src = bolivarImage;
    });

    anzoateguiButton.addEventListener("mouseover", () => {
        mapImage.src = anzoateguiImage;
    });

    // Agregamos event listeners para restaurar la imagen original al quitar el cursor del botón
    bolivarButton.addEventListener("mouseout", () => {
        mapImage.src = "page_template/img/mapa vector png pagina.png";
    });

    anzoateguiButton.addEventListener("mouseout", () => {
        mapImage.src = "page_template/img/mapa vector png pagina.png";
    });
</script>
