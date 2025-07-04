    <footer class="text-center text-lg-start custom-footer text-muted w-100 m-0 p-0">
        
        <!-- Sección superior del footer con redes sociales -->
        <section class="d-flex justify-content-center justify-content-lg-between align-items-center p-4 border-bottom">
            <div class="me-5">
                <span>Síguenos por nuestras redes sociales</span>
            </div>
            <div class="d-flex align-items-center">
                <!-- Ícono de Facebook -->
                <a href="https://www.facebook.com" target="_blank" class="me-3 text-reset">
                    <img src="<?= base_url('assets/img/logo_facebook.png') ?>" alt="Facebook" width="40" height="40" class="img-fluid rounded">
                </a>
                <!-- Ícono de X (Twitter) -->
                <a href="https://www.x.com" target="_blank" class="me-3 text-reset">
                    <img src="<?= base_url('assets/img/logo_x.png') ?>" alt="X" width="40" height="40" class="img-fluid rounded">
                </a>
                <!-- Ícono de Instagram -->
                <a href="https://www.instagram.com" target="_blank" class="me-3 text-reset">
                    <img src="<?= base_url('assets/img/logo_instagram.png') ?>" alt="Instagram" width="40" height="40" class="img-fluid rounded">
                </a>
            </div>
        </section>

        <!-- Sección inferior del footer con contenido adicional -->
        <section>
            <div class="container text-center text-md-start mt-5">
                <div class="row mt-3">

                    <!-- Columna: Descripción de la empresa -->
                    <div class="col-md-3 col-lg-4 col-xl-3 mx-auto mb-4">
                        <h6 class="text-uppercase fw-bold mb-4">
                            <i class="fas fa-gem me-3"></i>Rebobinar
                        </h6>
                        <p>
                            ¡Reviviendo los inicios de un arte que nos une!
                        </p>
                        <p>
                            Encontrando la belleza y siguiendo el encanto de pasado
                        </p>
                    </div>

                    <!-- Columna: Enlaces útiles -->
                    <?php if (session('perfil_id') != 1): ?>
                        <div class="col-md-3 col-lg-2 col-xl-2 mx-auto mb-4">
                            <h6 class="text-uppercase fw-bold mb-4">
                                Enlaces Utiles
                            </h6>
                            <p>
                                <a href="<?= base_url('quienes_somos') ?>" class="text-reset">¿Quienes Somos?</a>
                            </p>
                            <p>
                                <a href="<?= base_url('/todos_p') ?>" class="text-reset">Catalogo</a>
                            </p>
                            <p>
                                <a href="<?= base_url('contacto') ?>" class="text-reset">Contacto</a>
                            </p>
                        </div>
                        <div class="col-md-4 col-lg-3 col-xl-3 mx-auto mb-md-0 mb-4">
                            <h6 class="text-uppercase fw-bold mb-4">Ayuda</h6>
                            <p>
                                <a href="<?= base_url('preguntas_frecuentes') ?>" class="text-reset">Preguntas Frecuentes</a>
                            </p>
                            <p>
                                <a href="<?= base_url('terminos') ?>" class="text-reset">Terminos y Condiciones</a>
                            </p>
                            <p>
                                <a href="<?= base_url('privacidad') ?>" class="text-reset">Politica de privacidad</a>
                            </p>
                        </div>
                    <?php endif; ?>
                </div>
            </div>
        </section>
    </footer>
</html>