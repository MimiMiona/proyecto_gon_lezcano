<body>
    <section class="w-100 m-0 p-0">   
        <nav class="navbar navbar-expand-lg custom-navbar navbar-dark">
            <div class="container-fluid">
                <?php if (session('perfil_id') != 1): ?>
                    <a class="nav-link active" aria-current="page" href="<?= base_url('inicio') ?>">
                        <img src="<?= base_url('assets/img/logo.png') ?>" alt="Logo" width="77" height="77" class="img-fluid">
                    </a>
                <?php endif; ?>
                <?php if (session('perfil_id') == 1): ?>
                    <a class="nav-link active" aria-current="page" href="<?= base_url('logueado') ?>">
                        <img src="<?= base_url('assets/img/logo.png') ?>" alt="Logo" width="77" height="77" class="img-fluid">
                    </a>
                <?php endif; ?>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button> 
                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                        <?php if (session('perfil_id') != 1): ?>
                            <li class="nav-item">
                                <a class="nav-link active" href="<?= base_url('comercializacion') ?>">Comercializacion</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link active nav_color" href="<?= base_url('quienes_somos') ?>">Nosotros</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link active" href="<?= base_url('/todos_p') ?>">Catalogo</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link active" href="<?= base_url('contacto') ?>">Contacto</a>
                            </li>
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
                        <?php if (session('perfil_id') == 1): ?>
                            <li class="nav-item">
                                <a class="nav-link active" href="<?= base_url('/crear') ?>">CRUD Productos</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link active" href="<?= base_url('/ver-consultas') ?>">CRUD Consultas</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link active" href="<?= base_url('/vista') ?>">CRUD Usuarios</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link active" href="<?= base_url('ventas') ?>">CRUD Ventas</a>
                            </li>
                        <?php endif; ?>
                    </ul>
                    <ul class="navbar-nav ms-auto"> 
                        <li class="nav-item dropdown">
                            <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="perfilDropdown">
                                <li><a class="dropdown-item"href="<?= base_url('registro') ?>">Registro</a></li>
                                <li><a class="dropdown-item"href="<?= base_url('login') ?>">Login</a></li>
                                <li><a class="dropdown-item" href="<?= base_url('datos_personales') ?>">Datos Personales</a></li>
                                <?php if (session('perfil_id') == 2): ?>
                                    <li><a class="dropdown-item"href="<?= base_url('ver_factura_usuario/' . session()->get('id_usuario')) ?>">Mis Compras</a></li>
                                <?php endif; ?>
                                <li><a class="dropdown-item" href="<?= base_url('/logout') ?>">Cerrar sesión</a></li>
                            </li>
                            </ul>
                            <a class="nav-link dropdown-toggle active" href="#" id="perfilDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                                <img src="<?= base_url('assets/img/perfil.jpg') ?>" alt="Ayuda" width="67" height="67" class="rounded-circle">
                            </a>
                        </li>
                    </ul>
                    <?php if (session('perfil_id') == 2): ?>
                        <ul class="navbar-nav ml-auto">
                            <li class="nav-item">
                                <a class="nav-link" href="<?= base_url('/muestro') ?>">
                                    <img src="<?= base_url('assets/img/carrito.png') ?>" alt="Carrito" width="67" height="67" class="rounded-circle">
                                </a>
                            </li>
                        </ul>
                    <?php endif; ?>
                </div>
            </div>
        </nav>
    </section>