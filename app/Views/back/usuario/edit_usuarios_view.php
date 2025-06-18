<div class="container mt-1 mb-0">
    <div class="card" style="width: 50%;" >
        <div class="card-header text-center">
            <h4>Modificación Usuarios</h4>
            <form method="post" id="update_user" name="update_user" action="<?= site_url('/update'); ?>"> 
                <input type="hidden" name="id" id="id" value="<?=$user_obj['id_usuario']; ?>">
                <div class="form-group">
                    <label>Nombre</label>
                    <input type="text" name="nombre" class="form-control" value="<?php echo $user_obj['nombre']; ?>"> 
                </div>
                <div class="form-group">
                    <label>Apellido</label>
                    <input type="text" name="apellido" class="form-control" value="<?php echo $user_obj['apellido']; ?>"> 
                </div>
                <div class="form-group">
                    <label>Usuario</label>
                    <input type="text" name="usuario" class="form-control" value="<?php echo $user_obj['usuario']; ?>"> 
                </div>
                <div class="form-group">
                    <label>Email</label>
                    <input type="email" name="email" class="form-control" value="<?php echo $user_obj['email']; ?>"> 
                </div>
                <div class="form-group">
                    <label>Perfil_id</label>
                    <input type="text" name="perfil" class="form-control" value="<?php echo $user_obj['perfil_id']; ?>" autofocus> 
                </div>
                <br><br>
                <div class="form-group">
                    <input type="submit" value="guardar" class="btn btn-success"> 
                    <input type="reset" value="cancelar" class="btn btn-danger">
                    <a href="<?php echo base_url('/vista')?>" class="btn btn-secondary">Volver</a>
                </div>
            </form>
        </div>
    </div>
</div>