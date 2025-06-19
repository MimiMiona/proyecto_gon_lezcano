<section class="container-fluid contenido py-5 mt-5">
    <div class="container-fluid login">
        <div class="row d-flex justify-content-center">
            <div class="card col-md-4 col-lg-3 custom-register-card shadow-lg" style="width: 50%;"> 
                <div class="card-body">
                    <h4>Modificación Usuarios</h4>
                    <form method="post" id="update_user" name="update_user" action="<?= site_url('/update'); ?>"> 
                        <input type="hidden" name="id" id="id" value="<?=$user_obj['id_usuario']; ?>">
                        <?php if (session()->getFlashdata('success')): ?>
                            <div class="alert alert-success"><?= session()->getFlashdata('success'); ?></div>
                        <?php endif; ?>
                        <?php if (session()->getFlashdata('fail')): ?>
                            <div class="alert alert-danger"><?= session()->getFlashdata('fail'); ?></div>
                        <?php endif; ?>
                        <?php if (session()->getFlashdata('warning')): ?>
                            <div class="alert alert-warning"><?= session()->getFlashdata('warning'); ?></div>
                        <?php endif; ?>
                        <div class="form-group">
                            <label>Nombre</label>
                            <input type="text" name="nombre" class="form-control" value="<?php echo $user_obj['nombre']; ?>"> 
                        </div>
                        <br>
                        <div class="form-group">
                            <label>Apellido</label>
                            <input type="text" name="apellido" class="form-control" value="<?php echo $user_obj['apellido']; ?>"> 
                        </div>
                        <br>
                        <div class="form-group">
                            <label>Usuario</label>
                            <input type="text" name="usuario" class="form-control" value="<?php echo $user_obj['usuario']; ?>"> 
                        </div>
                        <br>
                        <div class="form-group">
                            <label>Email</label>
                            <input type="email" name="email" class="form-control" value="<?php echo $user_obj['email']; ?>"> 
                        </div>
                        <br>
                        <div class="form-group">
                            <label>Perfil_id</label>
                            <input type="text" name="perfil" class="form-control" value="<?php echo $user_obj['perfil_id']; ?>" autofocus> 
                        </div>
                        <br><br>
                        <div class="form-group">
                            <input type="submit" value="Guardar" class="btn btn-success"> 
                            <input type="reset" value="Borrar" class="btn btn-danger">
                            <a href="<?php echo base_url('/vista')?>" class="btn btn-secondary">Volver</a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</section>