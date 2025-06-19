<?php if (empty($ventas)) { ?>
    <!-- Avisamos que no hay consultas -->
    <div class="container py-5">
        <div class="alert alert-dark text-center shadow-sm rounded" role="alert">
            <h4 class="alert-heading">No posee compras registradas</h4>
            <p>Para realizar una compra visite nuestro catálogo.</p>
            <a class="btn btn-warning my-2" href="<?php echo base_url('todos_p') ?>">Catálogo</a>
        </div>
    </div>
<?php } else { ?>
    <div class="container py-5">
        <h1 class="text-center">Mis compras</h1>
        <div class="table-responsive">
            <table class="table custom-table table-hover table-bordered align-middle shadow rounded text-center">
                <thead>
                    <tr>
                        <th>Cliente</th>
                        <th>Email</th>
                        <th>Usuario</th>
                        <th>Total</th>
                        <th>Fecha</th>
                        <th>Opción</th>
                    </tr>
                </thead>
                <tbody>
                    <!-- Si es array de reservas y no está vacío -->
                    <?php if (!empty($ventas) && is_array($ventas)) {
                        foreach ($ventas as $row) { ?>
                            <tr>
                                <td><?= $row['nombre'] ?></td>
                                <td><?= $row['email'] ?></td>
                                <td><?= $row['usuario'] ?></td>
                                <td><?= $row['total_venta'] ?></td>
                                <td><?= $row['fecha'] ?></td>
                                <td>
                                    <a href="<?= base_url('vista_compras/' . $row['id']) ?>" class="btn btn-success btn-sm">Ver Detalle</a>
                                </td>
                            </tr>
                    <?php } } ?>
                </tbody>
            </table>
        </div>
    </div>
<?php } ?>
