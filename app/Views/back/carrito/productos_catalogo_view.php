<!-- GRID -->
<div class="container colorF">
    <div class="row">
        <div class="col-md-1"><!-- COLUMNA IZDA. GRID --></div>

        <div class="col"> <!-- COLUMNA CENTRAL GRID -->
            <div class="row">
                <div class="col-md-12">
                    <?php if (!$producto) { ?>
                        <div class="container-fluid">
                            <div class="well">
                                <h2 class="text-center tit">No hay Productos</h2>
                            </div>
                        </div>
                    <?php } else { ?>
                        <div class="container-fluid mt-2 mb-3">
                            <h2 class="text-center tit">Todos los Productos</h2>
                        </div>

                        <div class="row">
                            <?php foreach ($producto as $row): ?>
                                <div class="col-md-4 text-center mb-4">
                                    <div class="card p-3">
                                        <img src="<?= base_url('assets/uploads/' . $row['imagen']) ?>" class="card-img-top img-fluid" alt="Imagen del producto" style="height:150px; object-fit:contain;">
                                        <div class="card-body">
                                            <h5 class="card-title"><?= esc($row['nombre_prod']) ?></h5>
                                            <p class="card-text">Precio: $<?= number_format($row['precio_vta'], 2, ',', '.') ?></p>
                                            <?php if ($row['stock'] > 0): ?>
                                                <span class="badge bg-success mb-2">Hay Stock</span>
                                            <?php else: ?>
                                                <span class="badge bg-danger mb-2">Sin Stock</span>
                                            <?php endif; ?>
                                            <p class="card-text">Disponible: <?= $row['stock'] ?> unidades</p>

                                            <?php if ($row['stock'] > 0): ?>
                                                <?php
                                                    echo form_open(base_url('add'), ['method' => 'post']);
                                                    echo csrf_field(); 
                                                    echo form_hidden('id', $row['id_producto']);
                                                    echo form_hidden('precio_vta', $row['precio_vta']);
                                                    echo form_hidden('nombre_prod', $row['nombre_prod']);
                                                    echo form_hidden('imagen', $row['imagen']);
                                                    $btn = [
                                                        'class' => 'btn btn-secondary fuenteBotones',
                                                        'value' => 'Agregar al Carrito',
                                                        'name'  => 'action',
                                                        'type'  => 'submit'
                                                    ];
                                                    echo form_submit($btn);
                                                    echo form_close();
                                                ?>
                                            <?php else: ?>
                                                <button class="btn btn-secondary fuenteBotones" disabled>Sin Stock</button>
                                            <?php endif; ?>

                                            <!-- Botón que abre el modal -->
                                            <button class="btn btn-link mt-2" data-bs-toggle="modal" data-bs-target="#modalProducto<?= $row['id_producto'] ?>">
                                                Ver Detalles
                                            </button>
                                        </div>
                                    </div>
                                </div>

                                <!-- Modal para este producto -->
                                <div class="modal fade" id="modalProducto<?= $row['id_producto'] ?>" tabindex="-1" aria-labelledby="modalLabel<?= $row['id_producto'] ?>" aria-hidden="true">
                                    <div class="modal-dialog">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title" id="modalLabel<?= $row['id_producto'] ?>">Detalle del Producto</h5>
                                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Cerrar"></button>
                                            </div>
                                            <div class="modal-body text-start">
                                                <p><strong>Nombre:</strong> <?= esc($row['nombre_prod']) ?></p>
                                                <p><strong>Precio venta:</strong> $<?= esc($row['precio_vta']) ?></p>
                                                <p><strong>Stock:</strong> <?= esc($row['stock']) ?></p>
                                                <p><strong>Poster:</strong><br>
                                                    <?php if (!empty($row['imagen'])): ?>
                                                        <img src="<?= base_url('assets/uploads/' . $row['imagen']) ?>" alt="Imagen del producto" class="img-fluid">
                                                    <?php else: ?>
                                                        No disponible.
                                                    <?php endif; ?>
                                                </p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            <?php endforeach; ?>
                        </div>
                    <?php } ?>
                </div>
            </div>
        </div>
    </div>
</div>
