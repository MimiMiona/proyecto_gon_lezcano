<section class="container py-4">
  <div class="row justify-content-center"> 
    <div class="col-12 col-md-8 col-lg-6">
      <div class="text-center bg-custom p-4 rounded shadow-sm">
        <p class="mb-1">Argentina, Corrientes, 9 de julio</p>
        <p class="mb-1">contactorebobinar@rebobinar.com</p>
        <p class="mb-0">+54 3794815400</p>   
      </div>
    </div>
  </div>
</section>

<?php
  $session = session();
  $usuarioLogueado = $session->get('id_usuario') !== null;
  $perfil_id = $session->get('perfil_id'); 
  $nombre = $session->get('nombre') ?? '';
  $email = $session->get('email') ?? '';
  $soloLectura = ($usuarioLogueado && $perfil_id == 2);
?>


<section class="container py-4">
  <div class="row justify-content-center"> 
    <div class="col-12 col-sm-10 col-md-8 col-lg-6">
      <div class="card shadow p-4 bg-consulta">
        <?php $validation = \Config\Services::validation(); ?>
        <form method="post" action="<?php echo base_url('/enviar-formulario'); ?>">
          <h2 class="text-center mb-4">¡Contáctanos!</h2>
          <?php if (session()->getFlashdata('success')) : ?>
            <div class="alert alert-warning">
                    <?= session()->getFlashdata('success') ?>
            </div>
          <?php endif; ?>
          <div class="mb-3">
            <label for="nombre" class="form-label">Tu Nombre</label>
            <input id="nombre" name="nombre" type="text" placeholder="Tu Nombre" class="form-control"
              value="<?= esc($nombre) ?>" <?= $soloLectura ? 'readonly' : '' ?>>
            <?php if ($validation->getError('nombre')) : ?>
              <div class="alert alert-warning mt-2">
                <?= $validation->getError('nombre') ?>
              </div>
            <?php endif; ?>
          </div>

          <div class="mb-3">
            <label for="email" class="form-label">Tu Email</label>
            <input id="email" name="email" type="email" placeholder="Tu Gmail" class="form-control"
              value="<?= esc($email) ?>" <?= $soloLectura ? 'readonly' : '' ?>>
            <?php if ($validation->getError('email')) : ?>
              <div class="alert alert-warning mt-2">
                <?= $validation->getError('email') ?>
              </div>
            <?php endif; ?>
          </div>

          <div class="mb-3">
            <label for="message" class="form-label">Tu mensaje</label>
            <textarea class="form-control" id="message" name="mensaje" placeholder="Por favor, ingresa tu mensaje aquí..." rows="5"></textarea>
            <br>
            <?php if ($validation->getError('mensaje')) : ?>
              <div class="alert alert-warning mt-2'">
                  <?= $validation->getError('mensaje') ?>
              </div>
            <?php endif; ?>
          </div>

          <div class="d-grid gap-2">
            <button type="submit" class="btn btn-primary btn-lg">Enviar</button>
            <button type="reset" class="btn btn-secondary btn-lg">Borrar</button>
          </div>
        </form>
      </div>
    </div>
  </div>
</section>