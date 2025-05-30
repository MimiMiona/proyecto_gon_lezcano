<section class="container-fluid contenido py-5 mt-5">
    <div class="container-fluid login">
        <div class="row d-flex justify-content-center">
            <div class="card col-md-4 col-lg-3 custom-register-card shadow-lg"> 
                <div class="card-body">
                    <h1>Iniciar Sesión</h1>
                    <?php if (session()->getFlashdata('msg')) : ?>
                        <div class="alert alert-warning">
                                <?= session()->getFlashdata('msg') ?>
                        </div>
                    <?php endif; ?>
                    <form method="post" action="<?php echo base_url('/enviarlogin'); ?>">
                        <div class="mb-3">
                            <label for="Email" class="registro-label">
                            <p class="supertexto">Email</p>
                            </label>
                            <input name="email" type="text" class="form-control" placeholder="Email" > 
                        </div>
                        <div class="mb-3">
                            <label for="password" class="registro-label">
                                <p class="supertexto">Contraseña</p>
                            </label>
                            <input name="pass" type="password" class="form-control" placeholder="Contraseña"> </div>
                            <div class="d-grid gap-2">
                                <input class="btn btn-primary btn-block" type="submit" value="Ingresar"></input>
                            </div>
                            <div class="text-center">
                                <!--<button class="btn btn-link btn-sm" type="button">Reestablecer contraseña</button>-->
                                <button class="btn btn-link btn-sm" type="button"><a href="<?php echo base_url('registro'); ?>">Registrarse</a></button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</section>