<section class="container mt-4">
    <?php if (session()->getFlashdata('success')): ?>
        <div class="alert alert-success"><?= session()->getFlashdata('success'); ?></div>
    <?php endif; ?>

    <div class="mb-3 d-flex justify-content-between align-items-center">
        <h2>Listado de Productos</h2>
        <div>
            <a href="<?= base_url('produ-form'); ?>" class="btn btn-success">Agregar</a>
            <a href="<?= base_url('eliminados'); ?>" class="btn btn-danger">Eliminados</a>
        </div>
    </div>
    
    <div class="table-responsive">
        <table class="table custom-table table-hover table-bordered align-middle shadow rounded text-center">
            <thead>
                <tr>
                    <th>Id</th>
                    <th>Producto</th>
                    <th>Precio</th>
                    <th>Precio Venta</th>
                    <th>Stock</th>
                    <th>Imagen</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                <?php if (!empty($producto) && is_array($producto)): ?>
                    <?php foreach ($producto as $prod): ?>
                        <?php if ($prod['eliminado'] === 'NO'): ?>
                            <tr>
                                <td><?= $prod['id']; ?></td>
                                <td><?= esc($prod['nombre_prod']); ?></td>
                                <td><?= number_format($prod['precio'], 2); ?></td>
                                <td><?= number_format($prod['precio_vta'], 2); ?></td>
                                <td><?= $prod['stock']; ?></td>
                                <td>
                                    <?php if (!empty($prod['imagen'])): ?>
                                        <img src="<?= base_url('assets/uploads/' . $prod['imagen']); ?>" alt="img" width="50">
                                    <?php else: ?>
                                        <span>Sin imagen</span>
                                    <?php endif; ?>
                                </td>
                                <td>
                                    <a href="<?= base_url('editar/' . $prod['id']); ?>" class="btn btn-primary btn-sm">Editar</a>
                                    <a href="<?= base_url('borrar/' . $prod['id']); ?>" class="btn btn-secondary btn-sm" onclick="return confirm('¿Está seguro de borrar este producto?');">Borrar</a>
                                </td>
                            </tr>
                        <?php endif; ?>
                    <?php endforeach; ?>
                <?php else: ?>
                    <tr><td colspan="7" class="text-center">No hay productos disponibles</td></tr>
                <?php endif; ?>
            </tbody>
        </table>
    </div>
</section>
