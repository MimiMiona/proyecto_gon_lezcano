<section>
    <h2>Detalle del Producto</h2>

    <p><strong>ID:</strong> <?= esc($producto['id_producto']) ?></p>
    <p><strong>Nombre:</strong> <?= esc($producto['nombre_prod']) ?></p>
    <p><strong>Precio de compra:</strong> $<?= esc($producto['precio']) ?></p>
    <p><strong>Precio de venta:</strong> $<?= esc($producto['precio_vta']) ?></p>
    <p><strong>Stock:</strong> <?= esc($producto['stock']) ?></p>
    <p><strong>Stock mínimo:</strong> <?= esc($producto['stock_min']) ?></p>

    <?php if (!empty($producto['imagen'])): ?>
        <p><strong>Imagen:</strong></p>
        <img src="<?= base_url('assets/uploads/' . esc($producto['imagen'])) ?>" alt="Imagen del producto" width="200">
    <?php else: ?>
        <p>No hay imagen disponible.</p>
    <?php endif; ?>

</section>