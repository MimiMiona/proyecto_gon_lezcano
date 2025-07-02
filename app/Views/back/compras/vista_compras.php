<?php 
$session=session();
if (empty($venta)) { ?>
<!-- Avisamos que no hay consultas -->
<div class="alert alert-dark text-center" role="alert">
    <div class="container">
        <h4 class="alert-heading">No posee compras registradas</h4>
        <p>Para realizar una compra visite nuestro catálogo.</p>
        <a class="btn btn-warning my-2 w-10" href="<?php echo base_url('catalogo') ?>">Catálogo</a>
    </div>
</div>
<?php } ?>

<!-- Mostrar mensaje Flash si existe -->
<?php if ($session->getFlashdata('mensaje')) { ?>
<div class="alert alert-warning alert-dismissible fade show mt-3 mx-3" role="alert">
    <?= $session->getFlashdata('mensaje') ?>
    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Cerrar"></button>
</div>
<?php } ?>

<?php if (!empty($venta)) { ?>
<div class="row">
    <div class="col-xl-12 col-xs-10">
        <table class="table custom-table table-responsive table-bordered table-striped rounded">
            <thead>
                <tr class="text-center">
                    <th>N° de orden</th>
                    <th>Producto</th>
                    <th>Poster</th>
                    <th>Cantidad</th>
                    <th>Costo</th>
                    <th>Costo sub-total</th>
                </tr>
            </thead>
            <tbody>
                <?php 
                $i = 1;
                $total = 0;
                // Si es array de ventas y no está vacío
                if (!empty($venta) && is_array($venta)) {
                    foreach ($venta as $row) {
                        $imagen = $row['imagen'];
                        $subtotal = $row['precio'] * $row['cantidad'];
                        $total += $subtotal;
                        ?>
                        <tr class="text-center">
                            <td><?php echo $i++; ?></td>
                            <td><?php echo $row['nombre_prod']; ?></td>
                            <td><img width="65" height="100" src="<?php echo base_url('assets/uploads/'.$imagen); ?>"></td>
                            <td><?php echo number_format($row['cantidad'], 0); ?></td>
                            <td><?php echo $row['precio']; ?></td>
                            <td><?php echo number_format($subtotal, 2); ?></td>
                        </tr>
                        <?php
                    }
                }
                ?>
                <tr>
                    <td colspan="5" class="text-right"><h6>Total:</h6></td>
                    <td colspan="6" class="text-center"><h6><?php echo number_format($total, 2) ?></h6></td>
                </tr>
            </tbody>
        </table>
    </div>
</div>
        <h1 class="text-center">¡Gracias por su compra!</h1>
        <a href="<?= base_url('finalizar_compra') ?>" class="btn btn-success">Finalizar compra</a>
<?php } ?>
