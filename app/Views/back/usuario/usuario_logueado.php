<?php if (session('perfil_id') == 2): ?>
    <section class="container py-5" style="max-width: 1200px; margin: 0 auto; padding: 20px;"> 
        <div class="mb-5 text-center">
            <h1 class="display-4">📽️ Bienvenido <?= session('nombre'); ?> a Rebobinar 📽️</h1>
            <p class="lead"> por ser parte de nuestra comunidad cinéfila. Como usuario registrado, podés descubrir, disfrutar y apoyar la difusión del cine clásico en dominio público. 
                ¡Empezá a explorar el catálogo y viajá en el tiempo con nosotros!</p>
        </div>

        <div class="row align-items-center mb-5">
            <div class="col-lg-6 mb-4 mb-lg-0">
                <h2 class="h4">¿Cómo funciona nuestra tienda?</h2>
                <p>
                    ¡Bienvenido a nuestro rincón del cine clásico! Aquí te ofrecemos una forma simple y legal de acceder a películas
                    antiguas que han pasado al dominio público, es decir, que ya no están protegidas por derechos de autor y pueden
                    compartirse libremente.
                </p>
            </div>
            <div class="col-lg-6">
                <img src="<?= base_url('assets/img/myManGodFrey_gif.gif') ?>" alt="Cine clásico" class="img-fluid rounded">
            </div>
        </div>

        <div class="row align-items-center mb-5 flex-lg-row-reverse">
            <div class="col-lg-6 mb-4 mb-lg-0">
                <img src="<?= base_url('assets/img/theGhoul_gif.gif') ?>" alt="Ejemplo de correo" class="img-fluid rounded">
            </div>
            <div class="col-lg-6">
                <h2 class="h4">¿Cómo consigo una película?</h2>
                <p>El proceso es muy sencillo, y lo hicimos pensando en que no tengas que complicarte:</p>
                <ul>
                    <li>Explorá el catálogo: Navegá entre las películas disponibles.</li>
                    <li>Elegí tu favorita: Hacé clic en "Comprar".</li>
                    <li>Dejanos tu email: Para enviarte el enlace.</li>
                    <li>Revisá tu bandeja: Recibirás un correo con el link directo a la película en Internet Archive.</li>
                </ul>
            </div>
        </div>

        <div class="row align-items-center mb-5">
            <div class="col-lg-6 mb-4 mb-lg-0">
                <h2 class="h4">¿Por qué hacemos esto?</h2>
                <p>
                    Esta página forma parte de un proyecto académico con fines educativos y culturales. Facilitamos el acceso de forma ordenada, amigable y en español, para que más personas conozcan el valor del cine clásico.
                </p>
            </div>
            <div class="col-lg-6">
                <img src="<?= base_url('assets/img/thingsToCome_gif.gif') ?>" alt="Proyecto académico" class="img-fluid rounded">
            </div>
        </div>

        <div class="mb-4 text-center">
            <h2 class="h4">¿Algo más?</h2>
            <p>
                Si tenés dudas, comentarios o simplemente querés recomendar una película, ¡no dudes en escribirnos!
                Gracias por ser parte de este viaje al pasado del cine 🎞️✨.
            </p>
        </div>
    </section>
<?php endif; ?>
<?php if (session('perfil_id') == 1): ?>
    <section class="container py-5"> 
        <div class="mb-5 text-center">
            <h1 class="display-4">📽️ Bienvenido Admin <?= session('nombre'); ?> 📽️</h1>
            <p class="lead">Tu rincón para descubrir y disfrutar del cine clásico en dominio público.</p>
            <h1>Enlaces Útiles</h1>
        </div>

        <div class="row justify-content-center text-center g-4">
            <div class="col-6 col-sm-4 col-md-3">
                <a href="<?= base_url('/ver-consultas') ?>">
                    <img src="<?= base_url('assets/img/consultas.png') ?>" alt="Consultas" width="200" height="200" class="img-fluid mb-2">
                </a>
            </div>
            <div class="col-6 col-sm-4 col-md-3">
                <a href="<?= base_url('/crear') ?>">
                    <img src="<?= base_url('assets/img/productos.png') ?>" alt="Productos" width="200" height="200" class="img-fluid mb-2">
                </a>
            </div>
            <div class="col-6 col-sm-4 col-md-3">
                <a href="<?= base_url('/ver-usuarios') ?>">
                    <img src="<?= base_url('assets/img/usuarios.png') ?>" alt="Usuarios" width="200" height="200" class="img-fluid mb-2">
                </a>
            </div>
        </div>
    </section>
<?php endif; ?>