<!-- Contenedor principal del formulario -->
<div class="container mt-4">
    <!-- Botón para agregar un nuevo usuario -->
    <div class="d-flex justify-content-end">
        <a href="<?php echo site_url('/usuario-form') ?>" class="btn btn-success mb-2">Agregar Usuarios</a> 
    </div>
    <?php
        // Muestra mensaje de sesión si existe (por ejemplo, confirmación o error)
        if(isset($_SESSION['msg'])){
            echo $_SESSION['msg'];
        }
    ?>
    <div class="mt-2">
        <!-- Tabla que lista los usuarios -->
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
                    <!-- Recorre el arreglo de usuarios y muestra cada registro en una fila -->
                    <?php foreach($users as $user): ?>
                        <tr>
                            <!-- Id del usuario -->
                            <td><?php echo $user['id_usuario']; ?></td> 
                            <!-- Nombre del usuario -->
                            <td><?php echo $user['nombre']; ?></td> 
                            <!-- Email del usuario -->
                            <td><?php echo $user['email']; ?></td>
                            <!-- Muestra el perfil según el valor de perfil_id -->
                            <td>
                                <?php echo ($user['perfil_id'] == 1) ? 'Admin' : 'Usuario'; ?>
                            </td>
                            <!-- Estado de baja del usuario -->
                            <td><?php echo $user['baja']; ?></td>
                            <td>
                                <!-- Botón para editar usuario -->
                                <a href="<?php echo base_url('editar-usuario/'.$user['id_usuario']);?>" class="btn btn-success btn-sm">Editar</a> 
                                <!-- Botón para borrar usuario -->
                                <a href="<?php echo base_url('borrar_usuario/'.$user['id_usuario']);?>" class="btn btn-danger btn-sm">Borrar</a> 
                                <!-- Botón para activar usuario -->
                                <a href="<?php echo base_url('activar_usuario/'.$user['id_usuario']);?>" class="btn btn-primary btn-sm">Activar</a>  
                            </td>
                        </tr>
                    <?php endforeach; ?>
                <?php endif; ?>
            </tbody>
        </table>
    </div>
</div>