<!-- Sección principal del formulario -->
<section class="container mt-4">
    <!-- Muestra un mensaje de exito si se registro el producto-->
    <?php if (session()->getFlashdata('success')): ?>
        <div class="alert alert-success"><?= session()->getFlashdata('success'); ?></div>
    <?php endif; ?>
    
    <!-- Encabezado del listado con título y botones -->
    <div class="mb-3 d-flex justify-content-between align-items-center">
        <h2>Listado de Productos</h2>
        <div>
            <!-- Botón para agregar un producto nuevo -->
            <a href="<?= base_url('produ-form'); ?>" class="btn btn-success">Agregar</a>
            <!-- Botón para ver productos eliminados -->
            <a href="<?= base_url('eliminados'); ?>" class="btn btn-danger">Eliminados</a>
        </div>
    </div>
    
    <!-- Tabla con los productos -->
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
                <!-- Verificar si hay productos -->
                <?php if (!empty($producto) && is_array($producto)): ?>
                    <!-- Iterar sobre los productos -->
                    <?php foreach ($producto as $prod): ?>
                        <!-- Mostrar solo productos que NO estén eliminados -->
                        <?php if ($prod['eliminado'] != 'SI'): ?>
                            <tr>
                               <!-- ID del producto -->
                                <td><?= esc($prod['id_producto']); ?></td>
                                <!-- Nombre del producto -->
                                <td><?= esc($prod['nombre_prod']); ?></td>
                                <!-- Precio compra -->
                                <td><?= number_format($prod['precio'], 2); ?></td>
                                <!-- Precio de venta -->
                                <td><?= number_format($prod['precio_vta'], 2); ?></td>
                                <!-- Stock -->
                                <td><?= $prod['stock']; ?></td>
                                <!-- Imagen del producto -->
                                <td>
                                    <?php if (!empty($prod['imagen'])): ?>
                                        <img src="<?= base_url('assets/uploads/' . $prod['imagen']); ?>" alt="img" width="50">
                                    <?php else: ?>
                                        <span>Sin imagen</span>
                                    <?php endif; ?>
                                </td>
                                <td>
                                    <!-- Botón para editar productos-->
                                    <a href="<?= base_url('editar/' . $prod['id_producto']); ?>" class="btn btn-primary btn-sm">Editar</a>
                                    <!-- Botón para eliminar con confirmación -->
                                    <a href="<?= base_url('borrar_producto/' . $prod['id_producto']); ?>" class="btn btn-secondary btn-sm" onclick="return confirm('¿Está seguro de borrar este producto?');">Eliminar</a>
                                </td>
                            </tr>
                        <?php endif; ?>
                    <?php endforeach; ?>
                <!-- Si no hay productos, mostrar mensaje -->
                <?php else: ?>
                    <tr><td colspan="7" class="text-center">No hay productos disponibles</td></tr>
                <?php endif; ?>
            </tbody>
        </table>
    </div>
    <!-- Paginación centrada -->
    <div class="d-flex justify-content-center mt-3">
        <nav>
            <ul class="pagination">
                <!-- Renderiza enlaces de paginación personalizados -->
                <?= $pager->links('default', 'custom_pagination') ?>
            </ul>
        </nav>
    </div>
</section>
