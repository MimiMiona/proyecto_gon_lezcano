<section class="conteiner-fluid">
  <div class="container-fluid login">
    <div class="row justify-content-center">
      <div class="col-md-4 col-lg-3">
        <div class="card shadow-lg">
          <div class="card-body">
            <h1 class="supertitulo" id="login">Iniciar Sesión</h1>
            <!-- Mensaje de error -->
            <?php if (session()->getFlashdata('msg')) : ?>
              <div class="alert alert-warning">
                <?= session()->getFlashdata('msg') ?>
              </div>
            <?php endif; ?>

            <!-- Inicio formulario login -->
            <form method="post" action="<?php echo base_url('/enviarlogin'); ?>">
              <div class="mb-3">
                <label for="usuario" class="registro-label">
                  <p class="supertexto">Nombre de usuario</p>
                </label>
            <input name="usuario" type="text" class="form-control" placeholder="usuario" > </div>
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
            </form>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>