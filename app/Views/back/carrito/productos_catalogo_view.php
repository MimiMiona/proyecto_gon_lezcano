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
                                <h2 class="text-center tit">No hay Productos</h1>
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
                                            <a href="<?= base_url('producto/detalles/' . $row['id_producto']) ?>" class="d-block mt-2">Ver Detalles</a>
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