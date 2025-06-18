<section class="container py-4">
    <div class="row justify-content-center"> 
        <div class="mb-3 d-flex justify-content-between align-items-center">
            <h2>Productos Eliminados</h2>
        <div>
            <a href="<?= base_url('crear'); ?>" class="btn btn-success">Volver</a>
        </div>
    </div>
    <div class="table-responsive">
        <table class="table custom-table table-hover table-bordered align-middle shadow rounded text-center">
            <thead>
                <tr>
                    <th>Id</th>
                    <th>Nombre</th>
                    <th>Precio</th>
                    <th>Precio Venta</th>
                    <th>Stock</th>
                    <th>Imagen</th>
                    <th>Accion</th>
                </tr>
            </thead>
                <?php if (!empty($producto)): ?>
                    <?php foreach ($producto as $prod): ?>
                        <?php if ($prod['eliminado'] === 'SI'): ?>
                            <tr>
                                <td><?= esc($prod['id_producto']) ?></td>
                                <td><?= esc($prod['nombre_prod']) ?></td>
                                <td><?= esc($prod['precio']) ?></td>
                                <td><?= esc($prod['precio_vta']) ?></td>
                                <td><?= esc($prod['stock']) ?></td>
                                <td>
                                    <img src="<?= base_url('assets/uploads/' . $prod['imagen']) ?>" width="60">
                                </td>
                                <td>
                                    <a href="<?= base_url('editar/' . $prod['id_producto']); ?>" class="btn btn-primary btn-sm">Editar</a>
                                    <a href="<?= base_url('activar_pro/' . $prod['id_producto']); ?>" class="btn btn-secondary btn-sm" onclick="return confirm('¿Está seguro de activar este producto?');">Activar</a>
                                </td>
                            </tr>
                        <?php endif; ?>
                    <?php endforeach; ?>
                <?php else: ?>
                    <tr>
                        <td colspan="7">No hay productos eliminados.</td>
                    </tr>
                <?php endif; ?>
            </table>
        </div>
    </div>
</div>
</section>