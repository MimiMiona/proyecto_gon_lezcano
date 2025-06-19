<div class="container mt-4">
    <div class="d-flex justify-content-end">
        <a href="<?php echo site_url('/usuario-form') ?>" class="btn btn-success mb-2">Agregar Usuarios</a> 
    </div>
    <?php
        if(isset($_SESSION['msg'])){
            echo $_SESSION['msg'];
        }
    ?>
    <div class="mt-2">
        <table class="table custom-table table-hover table-bordered align-middle shadow rounded text-center" id="users-list">
            <thead>
                <tr>
                    <th>Id</th>
                    <th>Nombre</th> 
                    <th>Email</th>
                    <th>Perfil</th>
                    <th>Baja</th>
                    <th>Accion</th>
                </tr>
            </thead>
            <tbody>
                <?php if($users): ?>
                    <?php foreach($users as $user): ?>
                        <tr>
                            <td><?php echo $user['id_usuario']; ?></td> 
                            <td><?php echo $user['nombre']; ?></td> 
                            <td><?php echo $user['email']; ?></td>
                            <td><?php echo ($user['perfil_id'] == 1) ? 'Admin' : 'Usuario'; ?></td>
                            <td><?php echo $user['baja']; ?></td>
                            <td>
                                <a href="<?php echo base_url('editar-usuario/'.$user['id_usuario']);?>" class="btn btn-success btn-sm">Editar</a> 
                                <a href="<?php echo base_url('borrar_usuario/'.$user['id_usuario']);?>" class="btn btn-danger btn-sm">Borrar</a> 
                                <a href="<?php echo base_url('activar_usuario/'.$user['id_usuario']);?>" class="btn btn-primary btn-sm">Activar</a> 
                            </td>
                        </tr>
                    <?php endforeach; ?>
                <?php endif; ?>
            </tbody>
        </table>
    </div>
</div>