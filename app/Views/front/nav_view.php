<html>
    <head>
    <link href="assets/css/bootstrap.min.css" rel="stylesheet">
    <link href="<?= base_url('assets/css/miestilo.css') ?>" rel="stylesheet">
    <script src="assets/js/bootstrap.bundle.min.js"></script>
        <title>Proyecto</title>
    </head>
    <body>
    <section class="w-100 m-0 p-0">    <!-- barra de nav -->
        <nav class="navbar navbar-expand-lg custom-navbar navbar-dark">
            <div class="container-fluid">
                <a class="nav-link active" aria-current="page" href="<?= base_url('inicio') ?>">
                    <img src="assets/img/logo.png" alt="" width="77" height="77" class="img-fluid">
                </a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
                </button> 
                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                    <li class="nav-item">
                    <a class="nav-link active nav_color" href="<?= base_url('quienes_somos') ?>">Nosotros</a>
                    </li>
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="<?= base_url('catalogo') ?>" id="catalogoDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                            Catálogo
                        </a>
                        <ul class="dropdown-menu" aria-labelledby="catalogoDropdown">
                            <li><a class="dropdown-item" href="<?= base_url('catalogo#terror') ?>">Terror</a></li>
                            <li><a class="dropdown-item" href="<?= base_url('catalogo#ciencia_ficcion') ?>">Ciencia Ficción</a></li>
                            <li><a class="dropdown-item" href="<?= base_url('catalogo#comedia') ?>">Comedia</a></li>
                        </ul>
                    </li>
                    <li class="nav-item">
                    <a class="nav-link active" href="<?= base_url('comercializacion') ?>">Comercializacion</a>
                    </li>
                    <li class="nav-item">
                    <a class="nav-link active" href="<?= base_url('contacto') ?>">Contacto</a>
                    </li>
                </ul>
               <!-- <form class="d-flex" role="search">
                    <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search">
                    <button class="btn btn-outline-success" type="submit">Search</button>
                </form>
                </div>
                -->
            </div>
        </nav>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
  </body>
</html>