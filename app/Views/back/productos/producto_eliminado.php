<h3>Productos Eliminados</h3>

<a href="<?= site_url('crear') ?>">Volver</a><br><br>

<section class="container py-4">
    <div class="row justify-content-center"> 
        <div class="col-12 col-sm-10 col-md-8 col-lg-6">
            <div class="card shadow p-4 bg-consulta">
                <table cellpadding="5" cellspacing="0">
                    <tr>
                        <th>Id</th>
                        <th>Producto</th>
                        <th>Precio</th>
                        <th>Precio Venta</th>
                        <th>Stock</th>
                        <th>Imagen</th>
                        <th>Acción</th>
                    </tr>

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
                                        <a href="<?= site_url('editar/' . $prod['id_producto']) ?>">Editar</a>
                                        <a href="<?= site_url('activar_pro/' . $prod['id_producto']) ?>">Activar</a>
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
