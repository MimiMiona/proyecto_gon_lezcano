<div id="carouselExampleCaptions" class="carousel slide">
  <div class="carousel-indicators">
    <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
    <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="1" aria-label="Slide 2"></button>
    <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="2" aria-label="Slide 3"></button>
  </div>
    <div class="carousel-inner">
        <div class="carousel-item active">
            <img src="assets/img/nosferatu_gif.gif" class="d-block w-100" alt="nosferatu_carrusel">
            <div class="carousel-caption d-none d-md-block">
              <div class="card" style="width: 18rem;">
                <img src="assets\img\nosferatu.jpg" class="card-img-top">
              </div>
              <h1 class="titulo">Nosferatu</h1>
            </div>
        </div>
        <div class="carousel-item">
            <img src="assets/img/theGhoul_gif.gif" class="d-block w-100" alt="TheGhoul_carrusel">
            <div class="carousel-caption d-none d-md-block">
                <div class="card" style="width: 18rem;">
                  <img src="assets\img\theGhoul.jpg" class="card-img-top">
                </div>
                <h1 class="titulo">The Ghoul</h1>
            </div>
        </div>
        <div class="carousel-item">
            <img src="assets/img/duckSoup_gif.gif" class="d-block w-100" alt="duckSoup_carrusel">
            <div class="carousel-caption d-none d-md-block">
                <div class="card" style="width: 18rem;">
                    <img src="assets\img\duckSoup.jpg" class="card-img-top">
                </div>
                <h1 class="titulo">Duck Soup</h1>
            </div>
        </div>
    </div>
  <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide="prev">
    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
    <span class="visually-hidden">Previous</span>
  </button>
  <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide="next">
    <span class="carousel-control-next-icon" aria-hidden="true"></span>
    <span class="visually-hidden">Next</span>
  </button>
</div>
<section id="hero" class="hero section custom-hero">
    <div class="container-fluid">
        <div class="row gy-4 justify-content-between">
            <div class="col-lg-4 order-lg-last hero-img">
                <img src="assets/img/logo.png" class="img-fluid animate__animated animate__zoomIn" alt="">
            </div>
            <div class="col-lg-6 d-flex flex-column justify-content-center text-center">
                <h1 class="animate__animated animate__fadeInUp">¡Reviviendo los inicios de un arte que nos une!</h1>
                <p class="animate__animated animate__fadeInUp animate__delay-1s">Acompañanos a descubir las maravillas que esconden los filmes mas famosos de antaño</p>
            </div>
        </div>
    </div>
</section>
<section class="carrusel-personalizado"> <!--cards-->
    <div>
    <p class="fs-3">Recomendados</p>
    </div>
<div id="carouselExample" class="carousel slide" data-bs-ride="carousel">
  <div class="carousel-inner">
    <!-- Primer slide -->
    <div class="carousel-item active">
      <div class="d-flex justify-content-around">
        <div class="card custom-card" style="width: 18rem;">
          <img src="assets/img/20000Leagues.jpg" class="card-img-top" alt="20000 Leguas">
          <div class="card-body">
            <h5 class="card-title">20.000 Leguas de Viaje Submarino</h5>
            <p class="card-text"><strong>Precio: $2000</strong></p>
          </div>
        </div>
        <div class="card custom-card" style="width: 18rem;">
          <img src="assets/img/battleOfTheWorlds.jpg" class="card-img-top" alt="Card image">
          <div class="card-body">
            <h5 class="card-title">La Batalla de los Mundos</h5>
            <p class="card-text"><strong>Precio: $2000</strong></p>
          </div>
        </div>
        <div class="card custom-card" style="width: 18rem;">
          <img src="assets/img/duckSoup.jpg" class="card-img-top" alt="Card image">
          <div class="card-body">
            <h5 class="card-title">Duck Soup</h5>
            <p class="card-text"><strong>Precio: $2000</strong></p>
          </div>
        </div>
      </div>
    </div>
    
    <!-- Segundo slide -->
    <div class="carousel-item">
      <div class="d-flex justify-content-around">
        <div class="card custom-card" style="width: 18rem;">
          <img src="assets/img/houseOnHauntedHill.jpg" class="card-img-top" alt="Card image">
          <div class="card-body">
            <h5 class="card-title">House on Haunted Hill</h5>
            <p class="card-text"><strong>Precio: $2000</strong></p>
          </div>
        </div>
        <div class="card custom-card" style="width: 18rem;">
          <img src="assets/img/myManGodfrey.jpg" class="card-img-top" alt="Card image">
          <div class="card-body">
            <h5 class="card-title">My Man Godfrey</h5>
            <p class="card-text"><strong>Precio: $2000</strong></p>
          </div>
        </div>
        <div class="card custom-card" style="width: 18rem;">
          <img src="assets/img/nosferatu.jpg" class="card-img-top" alt="Nosferatu">
          <div class="card-body">
            <h5 class="card-title">Nosferatu</h5>
            <p class="card-text"><strong>Precio: $2000</strong></p>
          </div>
        </div>
      </div>
    </div>
  </div>

  <!-- Controles del carrusel -->
  <button class="carousel-control-prev" type="button" data-bs-target="#carouselExample" data-bs-slide="prev">
    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
    <span class="visually-hidden">Previous</span>
  </button>
  <button class="carousel-control-next" type="button" data-bs-target="#carouselExample" data-bs-slide="next">
    <span class="carousel-control-next-icon" aria-hidden="true"></span>
    <span class="visually-hidden">Next</span>
  </button>
</div>

</section>