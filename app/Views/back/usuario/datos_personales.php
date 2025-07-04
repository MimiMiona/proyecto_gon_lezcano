<?php 
    // Verifica si el usuario es de perfil admitido
    if (in_array(session('perfil_id'), [1, 2])): 
?>
    <!-- Sección principal visible solo para usuarios admitidos -->
    <section class="container py-5" style="max-width: 1200px;">
        <div class="mb-5 text-center">
            <h1 class="display-4">Datos Personales</h1>
            <p class="lead">Tu rincón para descubrir y disfrutar del cine clásico en dominio público.</p>
        </div>

        <!-- Muestra de datos personales del usuario -->
        <div class="row justify-content-center text-center">

            <!-- Columna: Nombre -->
            <div class="col-md-6 mb-4">
                <h2 class="h4">Nombre</h2>
                <p><?= session('nombre'); ?></p>
            </div>

            <!-- Columna: Apellido -->
            <div class="col-md-6 mb-4">
                <h2 class="h4">Apellido</h2>
                <p><?= session('apellido'); ?></p>
            </div>

            <!-- Columna: Usuario -->
            <div class="col-md-6 mb-4">
                <h2 class="h4">Usuario</h2>
                <p><?= session('usuario'); ?></p>
            </div>

            <!-- Columna: Email -->
            <div class="col-md-6 mb-4">
                <h2 class="h4">Email</h2>
                <p><?= session('email'); ?></p>
            </div>
        </div>
    </section>
<?php else: ?>

    <!-- Si el perfil no es admitido, muestra mensaje de acceso denegado -->
    <section class="container d-flex justify-content-center align-items-center" style="height: 80vh;">
        <div class="card text-center shadow" style="max-width: 500px;">
            <div class="card-body">
                <h3 class="card-title text-danger">Acceso Denegado</h3>
                <p class="card-text">No tenés permiso para acceder a esta sección.</p>
                <!-- Botón de acceso a login -->
                <a href="<?= base_url('login') ?>" class="btn btn-primary m-2">Iniciar Sesión</a>
                <!-- Botón de acceso a registro -->
                <a href="<?= base_url('registro') ?>" class="btn btn-secondary m-2">Registrarse</a>
            </div>
        </div>
    </section>
<?php endif; ?>
