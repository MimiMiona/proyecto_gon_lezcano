<?php 
// Verifica si es de perfil Usuario
if (session('perfil_id') == 2): ?>

    <!-- Seccion principal -->
    <section class="container py-5" style="max-width: 1200px; margin: 0 auto; padding: 20px;"> 
        <div class="mb-5 text-center">
            <h1 class="display-4">📽️ Bienvenido <?= session('nombre'); ?> a Rebobinar 📽️</h1>
            <p class="lead"> Por ser parte de nuestra comunidad cinéfila. Como usuario registrado, podés descubrir, disfrutar y apoyar la difusión del cine clásico en dominio público. 
                Si tenés dudas, comentarios o simplemente querés recomendar una película, ¡no dudes en escribirnos!
                Gracias por ser parte de este viaje al pasado del cine 🎞️✨.</p>
        </div>

        <!-- Imagen ilustrativa -->
        <div class="mb-4 text-center">
            <img src="<?= base_url('assets/img/myManGodFrey_gif.gif') ?>" alt="Cine clásico" class="img-fluid rounded">
        </div>
    
        <!-- Invitación a explorar el catálogo -->
        <div class="mb-4 text-center">
            <h2>
            ¡Empezá a explorar el catálogo y viajá en el tiempo con nosotros!</h2>
        </div>
    </section>
<?php endif; ?>

<?php 
// Verifica si es de perfil Admin
if (session('perfil_id') == 1): ?>

    <!-- Seccion principal -->
    <section class="container py-5"> 
        <div class="mb-5 text-center">
            <h1 class="display-4">📽️ Bienvenido Admin <?= session('nombre'); ?> 📽️</h1>
            <p class="lead">Tu rincón para descubrir y disfrutar del cine clásico en dominio público.</p>
            <h1>Enlaces Útiles</h1>
        </div>

        <!-- Grilla de enlaces administrativos -->
        <div class="row justify-content-center text-center g-4">
            
            <!-- Enlace: Consultas de usuarios -->
            <div class="col-6 col-sm-4 col-md-3">
                <a href="<?= base_url('/ver-consultas') ?>">
                    <img src="<?= base_url('assets/img/consultas.png') ?>" alt="Consultas" width="200" height="200" class="img-fluid mb-2">
                </a>
            </div>

            <!-- Enlace: Crear productos-->
            <div class="col-6 col-sm-4 col-md-3">
                <a href="<?= base_url('/crear') ?>">
                    <img src="<?= base_url('assets/img/productos.png') ?>" alt="Productos" width="200" height="200" class="img-fluid mb-2">
                </a>
            </div>

            <!-- Enlace: Gestión de usuarios -->
            <div class="col-6 col-sm-4 col-md-3">
                <a href="<?= base_url('/vista') ?>">
                    <img src="<?= base_url('assets/img/usuarios.png') ?>" alt="Usuarios" width="200" height="200" class="img-fluid mb-2">
                </a>
            </div>

            <!-- Enlace: Ver ventas -->
            <div class="col-6 col-sm-4 col-md-3">
                <a href="<?= base_url('ventas') ?>">
                    <img src="<?= base_url('assets/img/ventas.png') ?>" alt="Ventas" width="200" height="200" class="img-fluid mb-2">
                </a>
            </div>
        </div>
    </section>
<?php endif; ?>