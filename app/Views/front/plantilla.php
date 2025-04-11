<!DOCTYPE html>
<html>
    <head>
    <link href="assets/css/bootstrap.min.css" rel="stylesheet">
    <script src="assets/js/bootstrap.bundle.min.js"></script>
        <title>Ejemplo 1</title>
    </head>
    <body>
     <!-- carrusel -->
    <!--    <section class="container">
        <div id="carouselExampleFade" class="carousel slide carousel-fade">
            <div class="carousel-inner">
                <div class="carousel-item active">
                <img src="assets/img/wow.jpg" class="d-block w-100" alt="pepe">
                </div>
                <div class="carousel-item">
                <img src="assets/img/hola.jpg" class="d-block w-100" alt="pepe2">
                </div>
                <div class="carousel-item">
                <img src="assets/img/adios.jpg" class="d-block w-100" alt="pepe">
                </div>
            </div>
            <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleFade" data-bs-slide="prev">
                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Previous</span>
            </button>
            <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleFade" data-bs-slide="next">
                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Next</span>
            </button>
            </div>
        </section>  
    -->
        <!-- Carrusel -->
        <div id="carouselExampleIndicators" class="carousel slide" data-bs-ride="carousel">
            <div class="carousel-indicators">
                <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
                <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="1" aria-label="Slide 2"></button>
                <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="2" aria-label="Slide 3"></button>
            </div>
            <div class="carousel-inner">
                <div class="carousel-item active">
                    <img src="assets/img/pepe.jpg" class="d-block w-100" alt="First slide">
                </div>
                <div class="carousel-item">
                    <img src="assets/img/pepe2.jpg" class="d-block w-100" alt="Second slide">
                </div>
                <div class="carousel-item">
                    <img src="assets/img/pepe3.jpg" class="d-block w-100" alt="Third slide">
                </div>
            </div>
            <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide="prev">
                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Previous</span>
            </button>
            <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide="next">
                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Next</span>
            </button>
        </div>
        <section> <!-- 4 parrafos con el margin por eso la clase-->
            <p class="display-3" class="text-center" class="text-uppercase" class="fw-bold" class="fst-italic">Lorem ipsum dolor sit amet.</p> <!-- hacerlo titulo y negrita y cursiva usando las clases de bootstrap-->
            <p class="mx-auto p-2">Lorem ipsum, dolor sit amet consectetur adipisicing elit. Voluptatum similique deserunt optio perspiciatis voluptatem rerum ipsa reiciendis voluptatibus suscipit aspernatur aliquid atque, facilis ducimus molestias, deleniti placeat repudiandae nisi labore!</p>
            <p class="mx-auto p-2">Lorem ipsum dolor sit, amet consectetur adipisicing elit. Animi nam eligendi natus iusto dolore? Aut consequuntur, error officia, aspernatur quasi asperiores deleniti, cupiditate repellat doloribus sunt nam hic odit ut?</p>
            <p class="mx-auto p-2">Lorem ipsum dolor sit amet consectetur adipisicing elit. Repellat provident fugit odio molestiae exercitationem quam assumenda repellendus dolorum vel, maxime facilis commodi perspiciatis porro, cupiditate eligendi dolores fugiat suscipit odit.</p>
        </section>
        <section>
            <footer><!--esto ya te dejo para vos, tampoco voy a hacer todo, lo probe y es responsive esto-->

            </footer>
        </section>
    </body>
</html>