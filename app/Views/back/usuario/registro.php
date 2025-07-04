<!-- Contenedor principal del formulario -->
<4div class="container-fluid py-5 mt-5"> 
    <div class= "container-fluid register"> 
        <div class="row d-flex justify-content-center"> 

            <!-- Tarjeta centrada que contiene el formulario -->
            <div class="card col-md-4 col-lg-3 custom-register-card shadow-lg" style="width: 80%;" > 
                <div class="card-body">
                    <h1>Registrarse</h1> 

                    <?php 
                        // Se obtiene la instancia del servicio de validación de CodeIgniter
                        $validation = \Config\Services::validation(); 7
                    ?> 

                    <!-- Formulario para actualizar usuario -->
                    <form method="post" action="<?php echo base_url('/enviar-form') ?>"> 

                        <!-- Campo CSRF para evitar ataques de tipo Cross-Site Request Forgery -->
                        <?=csrf_field();?> 

                        <!-- Mensaje de fallo si no se registro exitosamente-->
                        <?php if(!empty (session()->getFlashdata('fail'))):?> 
                            <div class="alert alert-danger"><?=session()->getFlashdata('fail'); ?></div> 
                        <?php endif?> 

                        <!-- Mensaje de éxito si se registro exitosamente-->
                        <?php if(!empty (session()->getFlashdata('success'))):?> 
                            <div class="alert alert-warning"><?=session()->getFlashdata('success'); ?></div> 
                        <?php endif?> 

                        <!-- Campo: Nombre -->
                        <div class="mb-3"> 
                            <label for="exampleFormControlInput1" class="form-label">Nombre</label> 
                            <input name="nombre" type="text" class="form-control" placeholder="nombre" > 
                            <?php if($validation->getError('nombre')) {?> 
                                <div class='alert alert-warning mt-2'> 
                                    <?= $error = $validation->getError('nombre'); ?> 
                                </div> 
                            <?php }?> 
                        </div> 

                        <!-- Campo: Apellido -->
                        <div class="mb-3"> 
                            <label for="exampleFormControlInput1" class="form-label">Apellido</label> 
                            <input name="apellido" type="text" class="form-control" placeholder="apellido" > 
                            <?php if($validation->getError('apellido')) {?> 
                                <div class='alert alert-warning mt-2'> 
                                    <?= $error = $validation->getError('apellido'); ?> 
                                </div> 
                            <?php }?> 
                        </div>

                        <!-- Campo: Usuario -->
                        <div class="mb-3"> 
                            <label for="exampleFormControlInput1" class="form-label">Nombre de Usuario</label> 
                            <input name="usuario" type="text" class="form-control" placeholder="usuario" > 
                            <?php if($validation->getError('usuario')) {?> 
                                <div class='alert alert-warning mt-2'> 
                                    <?= $error = $validation->getError('usuario'); ?> 
                                </div> 
                            <?php }?> 
                        </div>

                        <!-- Campo: Email -->
                        <div class="mb-3"> 
                            <label for="exampleFormControlInput1" class="form-label">Email</label> 
                            <input name="email" type="text" class="form-control" placeholder="email" > 
                            <?php if($validation->getError('email')) {?> 
                                <div class='alert alert-warning mt-2'> 
                                    <?= $error = $validation->getError('email'); ?> 
                                </div> 
                            <?php }?> 
                        </div>

                        <!-- Campo: Contraseña -->
                        <div class="mb-3"> 
                            <label class="form-label">Contraseña</label> 
                            <input name="pass" type="password" class="form-control" placeholder="contraseña"> 
                            <?php if ($validation->getError('pass')): ?> 
                                <div class="alert alert-warning mt-2"><?= $validation->getError('pass'); ?></div> 
                            <?php endif; ?> 
                        </div>
                        <!-- Botón para guardar el registro -->
                        <button type="submit" class="btn btn-primary w-100">Registrarse</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
