<?php
    $session = session();
    if (empty($venta)) { ?>
        <div class="container">
            <div class="alert alert-dark text-center" role="alert">
                <h4 class="alert-heading">No posee ventas registradas</h4>
            </div>
        </div>
<?php } else { ?>

<div class="row container-fluid">
    <div class="table-responsive-sm text-center">
        <h1 class="text-center">DETALLE DE VENTAS</h1>
        <table class="table custom-table table-hover table-bordered align-middle shadow rounded text-center" id="users-list">
            <thead class="thead-dark">
                <tr class="text-center">
                    <th>Orden</th>
                    <th>Usuario</th>
                    <th>Nombre Producto</th>
                    <th>Imagen</th>
                    <th>Cantidad</th>
                    <th>Costo</th>
                    <th>Sub-total</th>
                </tr>
            </thead>
            <tbody>
                <?php
                $i = 0; $total = 0;
                // Si es array de ventas y no está vacío -->
                if (!empty($venta) && is_array($venta)) {
                    foreach ($venta as $row) {
                        $imagen = $row['imagen'];
                        $i++;
                        $subtotal = $row['precio'] * $row['cantidad'];
                        $total += $subtotal;
                ?>
                        <tr>
                            <td><?php echo $i; ?></td>
                            <td class="text-center"><h6><?php echo $row['nombre']; ?></h6></td>
                            <td><?php echo $row['nombre_prod']; ?></td>
                            <td><img width="55" height="55" src="<?php echo base_url('assets/uploads/' . $imagen); ?>"></td>
                            <td><?php echo number_format($row['cantidad']); ?></td>
                            <td>$<?php echo number_format($row['precio'], 2); ?></td>
                            <td>$<?php echo number_format($subtotal, 2); ?></td>
                        </tr>
                <?php } } ?>
                <tr>
                    <td colspan="5" class="text-right"><h4>Total de ventas</h4></td>
                    <td colspan="6" class="text-right">
                        <h3>$<?php echo number_format($total, 2); ?></h3>
                    </td>
                </tr>

            </tbody>
        </table>
    </div>
</div>
<?php } ?>

<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.21/css/jquery.dataTables.min.css">
<script type="text/javascript" src="https://cdn.datatables.net/1.10.21/js/jquery.dataTables.min.js"></script>
<script>
    $(document).ready(function () {
        $('#users-list').DataTable();
    });
</script>
