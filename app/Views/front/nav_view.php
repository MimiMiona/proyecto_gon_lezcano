<body>
    <section class="w-100 m-0 p-0">   
        <nav class="navbar navbar-expand-lg custom-navbar navbar-dark">
            <div class="container-fluid">
                <a class="nav-link active" aria-current="page" href="<?= base_url('inicio') ?>">
                    <img src="<?= base_url('assets/img/logo.png') ?>" alt="Logo" width="77" height="77" class="img-fluid">
                </a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button> 
                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                        <?php if (session('perfil_id') != 1): ?>
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle active" href="<?= base_url('catalogo') ?>" id="catalogoDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                                Catálogo
                            </a>
                            <ul class="dropdown-menu" aria-labelledby="catalogoDropdown">
                                <li><a class="dropdown-item" href="<?= base_url('catalogo#terror') ?>">Terror</a></li>
                                <li><a class="dropdown-item" href="<?= base_url('catalogo#ciencia') ?>">Ciencia Ficción</a></li>
                                <li><a class="dropdown-item" href="<?= base_url('catalogo#comedia') ?>">Comedia</a></li>
                            </ul>
                        </li>
                        <?php endif; ?>
                        <?php if (session('perfil_id') != 1): ?>
                            <li class="nav-item">
                                <a class="nav-link active" href="<?= base_url('comercializacion') ?>">Comercializacion</a>
                            </li>
                        <?php endif; ?>
                        <?php if (session('perfil_id') != 1): ?>
                            <li class="nav-item">
                                <a class="nav-link active nav_color" href="<?= base_url('quienes_somos') ?>">Nosotros</a>
                            </li>
                        <?php endif; ?>
                        <?php if (session('perfil_id') == 1): ?>
                            <li class="nav-item">
                                <a class="nav-link active" href="<?= base_url('contacto') ?>">Contacto</a>
                            </li>
                        <?php endif; ?>
                        <?php if (session('perfil_id') != 1): ?>
                            <li class="nav-item">
                                <a class="nav-link active" href="<?= base_url('registro') ?>">Registro</a>
                            </li>
                        <?php endif; ?>
                        <?php if (session('perfil_id') != 1): ?>
                            <li class="nav-item">
                                <a class="nav-link active" href="<?= base_url('login') ?>">Login</a>
                            </li>
                        <?php endif; ?>
                        <?php if (session('perfil_id') == 1): ?>
                            <li class="nav-item">
                                <a class="nav-link active" href="<?= base_url('/crear') ?>">CRUD Productos</a>
                            </li>
                        <?php endif; ?>
                        <?php if (session('perfil_id') == 1): ?>
                            <li class="nav-item">
                                <a class="nav-link active" href="<?= base_url('/ver-consultas') ?>">CRUD Consultas</a>
                            </li>
                        <?php endif; ?>
                        <?php if (session('perfil_id') == 1): ?>
                            <li class="nav-item">
                                <a class="nav-link active" href="<?= base_url('/ver-usuarios') ?>">CRUD Usuarios</a>
                            </li>
                        <?php endif; ?>
                        <?php if (in_array(session('perfil_id'), [1, 2])): ?>
                            <li class="nav-item">
                                <a class="nav-link active" href="<?= base_url('/logout') ?>">Cerrar sesión</a>
                            </li>
                        <?php endif; ?>
                        <?php if (session('perfil_id') != 1): ?>
                            <li class="nav-item dropdown">
                            <span class="nav-link dropdown-toggle active" id="ayudaDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                                Ayuda
                            </span>
                                <ul class="dropdown-menu" aria-labelledby="Ayuda">
                                    <li><a class="dropdown-item" href="<?= base_url('preguntas_frecuentes') ?>">Preguntas Frecuentes</a></li>
                                    <li><a class="dropdown-item" href="<?= base_url('terminos') ?>">Términos y Condiciones</a></li>
                                    <li><a class="dropdown-item" href="<?= base_url('privacidad') ?>">Politica de Privacidad</a></li>
                                </ul>
                            </li>
                        <?php endif; ?>
                    </ul>
                 <!-- <form class="d-flex" role="search">
                    <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search">
                    <button class="btn btn-outline-success" type="submit">Search</button>
                </form>
                </div>
                -->
            </div>
        </nav>
    </section>