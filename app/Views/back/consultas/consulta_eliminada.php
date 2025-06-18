<section class="container py-4">
    <div class="row justify-content-center"> 
        <div class="mb-3 d-flex justify-content-between align-items-center">
            <h2>Consultas Resueltas</h2>
        <div>
            <a href="<?= base_url('ver-consultas'); ?>" class="btn btn-success">Volver</a>
        </div>
    </div>
    <div class="table-responsive">
        <table class="table custom-table table-hover table-bordered align-middle shadow rounded text-center">
            <thead>
                <tr>
                    <th>Id</th>
                    <th>Nombre</th>
                    <th>Email</th>
                    <th>Mensaje</th>
                </tr>
            </thead>
                <?php if (!empty($consulta)): ?>
                    <?php foreach ($consulta as $consultas): ?>
                        <?php if ($consultas['eliminado'] === 'SI'): ?>
                            <tr>
                                <td><?= esc($consultas['id_usuario']) ?></td>
                                <td><?= esc($consultas['nombre']) ?></td>
                                <td><?= esc($consultas['email']) ?></td>
                                <td><?= esc($consultas['mensaje']) ?></td>
                            </tr>
                        <?php endif; ?>
                    <?php endforeach; ?>
                <?php else: ?>
                    <tr>
                        <td colspan="7">No hay consultas resueltas.</td>
                    </tr>
                <?php endif; ?>
            </table>
        </div>
    </div>
</div>
</section>
