<section class="container mt-4">
    <?php if (session()->getFlashdata('success')): ?>
        <div class="alert alert-success"><?= session()->getFlashdata('success'); ?></div>
    <?php endif; ?>

    <div class="mb-3 d-flex justify-content-between align-items-center">
        <h2>Listado de Consultas</h2>
        <div>
            <a href="<?= base_url('eliminadas'); ?>" class="btn btn-danger">Eliminados</a>
        </div>
    </div>

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
                    <?php foreach ($consultas as $consulta): ?>
                            <?php if ($consulta['eliminado'] === 'NO'): ?>
                                <tr>
                                    <td><?= esc($consulta['id_usuario']) ?></td>
                                    <td><?= esc($consulta['nombre']) ?></td>
                                    <td><?= esc($consulta['email']) ?></td>
                                    <td><?= esc($consulta['mensaje']) ?></td>
                                    <td>
                                        <a href="<?= base_url('borrarConsulta/' . $consulta['id_usuario']); ?>" class="btn btn-secondary btn-sm" onclick="return confirm('¿Está seguro de eliminar esta consulta?');">Resuelto</a>
                                    </td>
                                </tr>
                            <?php endif; ?>
                    <?php endforeach; ?>
                <?php else: ?>
                    <p>No hay consultas registradas.</p>
                <?php endif; ?>
            </tbody>
        </table>
    </div>
</section>
