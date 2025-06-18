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
            <label for="message" class="form-label">Tu Nombre</label>
            <input id="nombre" name="nombre" type="text" placeholder="Tu Nombre" class="form-control"
            value="<?= session()->get('nombre') ?>" readonly>
          </div>

          <div class="mb-3">
            <label for="message" class="form-label">Tu Email</label>
            <input id="email" name="email" type="email" placeholder="Tu Gmail" class="form-control"
            value="<?= session()->get('email') ?>" readonly>
          </div>
          
          <div class="mb-3">
            <label for="message" class="form-label">Tu mensaje</label>
            <textarea class="form-control" id="message" name="mensaje" placeholder="Por favor, ingresa tu mensaje aquí..." rows="5"></textarea>
          </div>

          <div class="d-grid gap-2">
            <button type="submit" class="btn btn-primary btn-lg">Enviar</button>
            <button type="reset" class="btn btn-secondary btn-lg">Limpiar</button>
          </div>
        </form>
      </div>
    </div>
  </div>
</section>