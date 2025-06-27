<div class="container mt-5">
    <h2 class="mb-4 text-center">Catálogo de Productos</h2>

    <?php if (!empty($productos)): ?>
        <div class="row">
            <?php foreach ($productos as $prod): ?>
                <div class="col-md-4 mb-4">
                    <div class="card h-100 shadow-sm">
                        <img src="<?= base_url('assets/uploads/' . $prod['imagen']) ?>" class="card-img-top" alt="Imagen de <?= esc($prod['nombre_prod']) ?>">
                        <div class="card-body">
                            <h5 class="card-title"><?= esc($prod['nombre_prod']) ?></h5>
                            <p class="card-text">Precio: $<?= esc($prod['precio_vta']) ?></p>
                            <form action="<?= base_url('add') ?>" method="post">
                                <?= csrf_field() ?>
                                <input type="hidden" name="id" value="<?= esc($prod['id_producto']) ?>">
                                <input type="hidden" name="nombre_prod" value="<?= esc($prod['nombre_prod']) ?>">
                                <input type="hidden" name="precio_vta" value="<?= esc($prod['precio_vta']) ?>">
                                <input type="hidden" name="imagen" value="<?= esc($prod['imagen']) ?>">
                                <button type="submit" class="btn btn-primary">Agregar al carrito</button>
                            </form>
                        </div>
                    </div>
                </div>
            <?php endforeach; ?>
        </div>
    <?php else: ?>
        <p class="text-center">No se encontraron productos con ese nombre.</p>
    <?php endif; ?>
</div>
