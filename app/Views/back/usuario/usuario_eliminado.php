<section class="container py-4">
    <div class="row justify-content-center"> 
        <div class="mb-3 d-flex justify-content-between align-items-center">
            <h2>Usuarios Desactivados</h2>
        <div>
            <a href="<?= base_url('/vista'); ?>" class="btn btn-success">Volver</a>
        </div>
    </div>
    <div class="table-responsive">
        <table class="table custom-table table-hover table-bordered align-middle shadow rounded text-center">
           <thead>
                <tr>
                    <th>Id</th>
                    <th>Nombre</th> 
                    <th>Apellido</th>
                    <th>Email</th>
                    <th>Perfil</th>
                    <th>Accion</th>
                </tr>
            </thead>
                <?php if (!empty($producto)): ?>
                    <?php foreach ($producto as $prod): ?>
                        <?php if ($prod['eliminado'] === 'SI'): ?>
                            <tr>
                                <td><?= esc($prod['id_usuario']) ?></td>
                                <td><?= esc($prod['nombre']) ?></td>
                                <td><?= esc($prod['apellido']) ?></td>
                                <td><?= esc($prod['email']) ?></td>
                                <td><?= esc($prod['perfil']) ?></td>
                                <td>
                                    <a href="<?= base_url('activar_usuario/' . $prod['id_producto']); ?>" class="btn btn-secondary btn-sm" onclick="return confirm('¿Está seguro de activar este usuario?');">Activar</a>
                                </td>
                            </tr>
                        <?php endif; ?>
                    <?php endforeach; ?>
                <?php else: ?>
                    <tr>
                        <td colspan="7">No hay usuarios inactivos.</td>
                    </tr>
                <?php endif; ?>
            </table>
        </div>
    </div>
</div>
</section>