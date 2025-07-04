<!-- Contenedor principal del formulario -->
<section class="container py-4">
    <div class="row justify-content-center"> 
        <div class="mb-3 d-flex justify-content-between align-items-center">
            <h2>Productos Eliminados</h2>
        <div>
            <!-- Botón que regresa a la vista anterior -->
            <a href="<?= base_url('crear'); ?>" class="btn btn-success">Volver</a>
        </div>
    </div>
    <div class="table-responsive">
        <table class="table custom-table table-hover table-bordered align-middle shadow rounded text-center">
            <!-- Encabezados de la tabla -->    
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
                <!-- Comprobamos si hay datos en $producto -->
                <?php if (!empty($producto)): ?>

                    <!-- Iteramos sobre cada producto -->
                    <?php foreach ($producto as $prod): ?>

                        <!-- Verificamos que el producto esté marcado como eliminado -->
                        <?php if ($prod['eliminado'] === 'SI'): ?>
                            <tr>
                                <!-- Columna: ID del producto -->
                                <td><?= esc($prod['id_producto']) ?></td>
                                <!-- Columna: Nombre del producto -->
                                <td><?= esc($prod['nombre_prod']) ?></td>
                                <!-- Columna: Precio -->
                                <td><?= esc($prod['precio']) ?></td>
                                <!-- Columna: Precio de venta -->
                                <td><?= esc($prod['precio_vta']) ?></td>
                                <!-- Columna: Stock disponible -->
                                <td><?= esc($prod['stock']) ?></td>
                                <!-- Columna: Imagen del producto -->    
                                <td>
                                    <img src="<?= base_url('assets/uploads/' . $prod['imagen']) ?>" width="60">
                                </td>
                                <td>
                                    <!-- Botón para editar producto -->
                                    <a href="<?= base_url('editar/' . $prod['id_producto']); ?>" class="btn btn-primary btn-sm">Editar</a>
                                    <!-- Botón para activar producto -->
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