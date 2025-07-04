<!-- Sección de modificación de usuarios -->
<section class="container-fluid contenido py-5 mt-5">

    <!-- Contenedor principal del formulario -->
    <div class="container-fluid login">
        <div class="row d-flex justify-content-center">
            <div class="card col-md-4 col-lg-3 custom-register-card shadow-lg" style="width: 50%;"> 
                <div class="card-body">
                    <h4>Modificación Usuarios</h4>

                    <!-- Formulario para actualizar usuario -->
                    <form method="post" id="update_user" name="update_user" action="<?= site_url('/update'); ?>"> 
                        
                        <!-- Campo oculto que contiene el ID del usuario -->
                        <input type="hidden" name="id" id="id" value="<?=$user_obj['id_usuario']; ?>">
                        
                        <!-- Mensaje de éxito si se guardó exitosamente-->
                        <?php if (session()->getFlashdata('success')): ?>
                            <div class="alert alert-success"><?= session()->getFlashdata('success'); ?></div>
                        <?php endif; ?>

                        <!-- Mensaje de error si no se guardó-->
                        <?php if (session()->getFlashdata('fail')): ?>
                            <div class="alert alert-danger"><?= session()->getFlashdata('fail'); ?></div>
                        <?php endif; ?>

                        <!-- Mensaje de error por escritura en los campos-->
                        <?php if (session()->getFlashdata('warning')): ?>
                            <div class="alert alert-warning"><?= session()->getFlashdata('warning'); ?></div>
                        <?php endif; ?>

                        <!-- Campo: Nombre -->
                        <div class="form-group">
                            <label>Nombre</label>
                            <input type="text" name="nombre" class="form-control" value="<?php echo $user_obj['nombre']; ?>"> 
                        </div>
                        <br>

                        <!-- Campo: Apellido -->
                        <div class="form-group">
                            <label>Apellido</label>
                            <input type="text" name="apellido" class="form-control" value="<?php echo $user_obj['apellido']; ?>"> 
                        </div>
                        <br>

                        <!-- Campo: Usuario -->
                        <div class="form-group">
                            <label>Usuario</label>
                            <input type="text" name="usuario" class="form-control" value="<?php echo $user_obj['usuario']; ?>"> 
                        </div>
                        <br>

                        <!-- Campo: Email -->
                        <div class="form-group">
                            <label>Email</label>
                            <input type="email" name="email" class="form-control" value="<?php echo $user_obj['email']; ?>"> 
                        </div>
                        <br>

                        <!-- Campo: Tipo de Perfil -->
                        <div class="form-group">
                            <label>Tipo de Perfil</label>
                            <input type="text" name="perfil" class="form-control" value="<?php echo $user_obj['perfil_id']; ?>" autofocus> 
                        </div>
                        <br><br>
                        <div class="form-group">
                            <!-- Botón para guardar usuario editado-->
                            <input type="submit" value="Guardar" class="btn btn-success"> 
                            <!-- Botón para resetear formulario -->
                            <input type="reset" value="Borrar" class="btn btn-danger">
                            <!-- Botón para volver a vista anterior-->
                            <a href="<?php echo base_url('/vista')?>" class="btn btn-secondary">Volver</a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</section>