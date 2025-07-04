<!-- Sección que contiene el formulario de inicio de sesión -->
<section class="container-fluid contenido py-5 mt-5">

    <!-- Contenedor general que centra el formulario -->
    <div class="container-fluid login">
        <div class="row d-flex justify-content-center">

            <!-- Tarjeta que contiene el formulario -->
            <div class="card col-md-4 col-lg-3 custom-register-card shadow-lg"> 
                <div class="card-body">
                    <h1>Iniciar Sesión</h1>

                    <!-- Muestra un mensaje de error general si existe -->
                    <?php if (session()->getFlashdata('msg')) : ?>
                        <div class="alert alert-warning">
                                <?= session()->getFlashdata('msg') ?>
                        </div>
                    <?php endif; ?>

                    <!-- Formulario de login -->
                    <form method="post" action="<?php echo base_url('/enviarlogin'); ?>">

                        <!-- Campo de email -->
                        <div class="mb-3">
                            <label for="Email" class="registro-label">
                            <p class="supertexto">Email</p>
                            </label>
                            <input name="email" type="text" class="form-control" placeholder="Email" > 
                        </div>

                        <!-- Campo de Contraseña -->
                        <div class="mb-3">
                            <label for="password" class="registro-label">
                                <p class="supertexto">Contraseña</p>
                            </label>
                            <input name="pass" type="password" class="form-control" placeholder="Contraseña"> </div>
                            <div class="d-grid gap-2">
                                <input class="btn btn-primary m-2" type="submit" value="Ingresar"></input>
                            </div>

                            <!-- Botón para registrar usuario -->
                            <div class="text-center">
                                <a href="<?= base_url('registro') ?>" class="btn btn-secondary m-2">Registrarse</a>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</section>