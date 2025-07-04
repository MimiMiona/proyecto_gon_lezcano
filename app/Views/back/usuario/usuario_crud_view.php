<!-- Contenedor principal del formulario -->
    <div class="container mt-1 mb-0">
        <!-- Tarjeta centrada que contiene el formulario -->
        <div class="card" style="width: 50%;" >
            <div class="card-header text-center">
                <h5>Alta de Usuarios</h5>

                <?php 
                    // Se obtiene la instancia del servicio de validación de CodeIgniter
                    $validation = \Config\Services::validation(); 
                ?>

                <!-- Formulario de envío de datos del usuario -->
                <form method="post" action="<?php echo base_url('/enviar-usuario') ?>">
                    
                    <!-- Muestra un mensaje de error si no se registro el usuario-->
                    <?php if(!empty (session()->getFlashdata('fail'))): ?>
                        <div class="alert alert-danger"><?=session()->getFlashdata('fail');?></div>
                    <?php endif?>
                    
                    <!-- Muestra un mensaje de éxito si se registro el usuario-->
                    <?php if(!empty (session()->getFlashdata('success'))): ?>
                        <div class="alert alert-danger"><?=session()->getFlashdata('success'); ?></div> 
                    <?php endif?>

                    <div class="card-body" media="(max-width: 768px)">
                        <!-- Campo Nombre -->
                        <div class="mb-2">
                            <label for="exampleFormControlInput1" class="form-label">Nombre</label>
                            <input name="nombre" type="text" class="form-control" placeholder="nombre" value=""> 
                            <!-- Error para validación de nombre-->
                            <?php if($validation->getError('nombre')) { ?>
                                <div class='alert alert-danger mt-2'>
                                    <?= $error = $validation->getError('nombre'); ?> 
                                </div>
                            <?php } ?>
                        </div>

                        <!-- Campo Apellido -->
                        <div class="mb-3">
                            <label for="exampleFormControlTextareal" class="form-label">Apellido</label> 
                            <input type="text" name="apellido"class="form-control" placeholder="apellido" > 
                            <!-- Error para validación de apellido-->
                                <?php if($validation->getError('apellido')) {?>
                                    <div class='alert alert-danger mt-2'>
                                        <?= $error = $validation->getError('apellido'); ?> 
                                    </div>
                                <?php } ?>
                        </div>

                        <!-- Campo Email -->
                        <div class="mb-3">
                            <label for="exampleFormControlInput1" class="form-label">email</label>
                            <input name="email" type="femail" class="form-control" placeholder="correo@algo.com" > <!-- Error -->
                            <!--  Error para validación de email-->
                            <?php $error = $validation->getError('email'); ?>
                            <div class='alert alert-danger mt-2'>
                                <?= $error ?>
                            </div>
                        </div>

                        <!-- Campo Usuario -->
                        <div class="mb-3">
                            <label for="exampleFormControlInput1" class="form-label">Usuario</label>
                            <input tyupe="text" name="usuario" class="form-control" placeholder="usuario"> <!-- Error -->
                            <!-- Error para validación de usuario -->
                            <?php if($validation->getError('usuario')) {?>
                                <div class='alert alert-danger mt-2'>
                                    <?= $error = $validation->getError('usuario'); ?> 
                                </div>
                            <?php } ?>
                        </div>

                        <!-- Campo Contraseña -->
                        <div class="mb-3">
                            <label for="exampleFormControlInput1" class="form-label">Password</label> 
                            <input name="pass" type="text" class="form-control" placeholder="password"> <!-- Error -->
                            <!-- Error para validación de contraseña -->
                            <?php if($validation->getError('pass')) {?>
                                <div class='alert alert-danger mt-2'>
                                    <?= $error = $validation->getError('pass'); ?> 
                                </div>
                            <?php } ?>
                        </div>
                        <div class="col-12" style="text-align:center;">
                            <!-- Botón para guardar usuario -->
                            <input type="submit" value="Guardar" class="btn btn-success"> 
                            <!-- Botón para cancelar proceso -->
                            <input type="reset" value="Cancelar" class="btn btn-danger">
                            <!-- Botón para volver a vista anterior -->
                            <a href="<?php echo base_url('/vista')?>" class="btn btn-secondary">Volver</a>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>