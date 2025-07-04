<!-- Sección principal del formulario -->
<section class="container mt-4">

    <!-- Muestra un mensaje de error si no se registro el usuario-->
    <?php if (session()->getFlashdata('success')): ?>
        <div class="alert alert-success"><?= session()->getFlashdata('success'); ?></div>
    <?php endif; ?>

    <div class="mb-3 d-flex justify-content-between align-items-center">
        <h2>Listado de Consultas</h2>
        <div>
            <!-- Botón que enlaza a la vista de consultas eliminadas -->
            <a href="<?= base_url('eliminadas'); ?>" class="btn btn-danger">Eliminados</a>
        </div>
    </div>

    
    <!-- Tabla que lista las consultas sin resolver -->
    <div class="table-responsive">
        <table class="table custom-table table-hover table-bordered align-middle shadow rounded text-center">
            <thead class="table-warning">
                <tr>
                    <th>ID</th>
                    <th>Nombre</th>
                    <th>Email</th>
                    <th>Mensaje</th>
                    <th>Acción</th>
                </tr>
            </thead>
            <tbody>
                <?php if (!empty($consultas)): ?>
                    <!-- Recorre el arreglo de consultas y muestra cada registro en una fila -->
                    <?php foreach ($consultas as $consulta): ?>
                            <?php if ($consulta['eliminado'] === 'NO'): ?>
                                <tr>
                                    <!-- ID de usuario -->
                                    <td><?= esc($consulta['id_usuario']) ?></td>
                                    <!-- Nombre -->
                                    <td><?= esc($consulta['nombre']) ?></td>
                                    <!-- Email -->
                                    <td><?= esc($consulta['email']) ?></td>
                                    <!-- Mensaje -->
                                    <td><?= esc($consulta['mensaje']) ?></td>
                                    <td>
                                        <!-- Botón de marcar como resuelto -->
                                        <a href="<?= base_url('borrarConsulta/' . $consulta['id_usuario']); ?>" class="btn btn-secondary btn-sm" onclick="return confirm('¿Está seguro de eliminar esta consulta?');">Resuelto</a>
                                    </td>
                                </tr>
                            <?php endif; ?>
                    <?php endforeach; ?>
                <!-- Si no hay consultas -->
                <?php else: ?>
                    <p>No hay consultas registradas.</p>
                <?php endif; ?>
            </tbody>
        </table>
    </div>
</section>
