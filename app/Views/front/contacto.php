<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Formulario Contacto</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>

<div class="container d-flex justify-content-center align-items-center min-vh-100">
  <div class="col-lg-6 col-md-8 col-sm-10">
    <div class="card shadow p-4">
      <form action="" method="post">
        <h2 class="text-center mb-4">¡Contáctanos!</h2>

        <div class="mb-3">
          <label for="name" class="form-label">Nombre completo</label>
          <input id="name" name="name" type="text" placeholder="Tu nombre" class="form-control">
        </div>

        <div class="mb-3">
          <label for="email" class="form-label">Gmail</label>
          <input id="email" name="email" type="email" placeholder="Tu Gmail" class="form-control">
        </div>

        <div class="mb-3">
          <label for="message" class="form-label">Tu mensaje</label>
          <textarea class="form-control" id="message" name="message" placeholder="Por favor, ingresa tu mensaje aquí..." rows="5"></textarea>
        </div>

        <div class="d-grid">
          <button type="submit" class="btn btn-primary btn-lg">Subir</button>
        </div>
      </form>
    </div>
  </div>
</div>

</body>
</html>
