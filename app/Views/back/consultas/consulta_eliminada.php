<section class="container py-4">
    <div class="row justify-content-center"> 
        <div class="mb-3 d-flex justify-content-between align-items-center">
            <h2>Consultas Eliminadas</h2>
        <div>
            <a href="<?= base_url('ver-consultas'); ?>" class="btn btn-success">Volver</a>
        </div>
    </div>
    <div class="col-12 col-sm-10 col-md-8 col-lg-6">
        <div class="card shadow p-4 bg-consulta">
            <table border="1" cellpadding="5" cellspacing="0">
                <tr>
                    <th>Id</th>
                    <th>Nombre</th>
                    <th>Email</th>
                    <th>Mensaje</th>
                </tr>
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
                        <td colspan="7">No hay consultas eliminados.</td>
                    </tr>
                <?php endif; ?>
            </table>
        </div>
    </div>
</div>
</section>
