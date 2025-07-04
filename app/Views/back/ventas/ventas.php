<?php
    
    // Inicia la sesión para usar mensajes flash o variables de sesión
    $session = session();

    // Verifica si la variable $venta está vacía (no hay ventas registradas)
    if (empty($venta)) { ?>
        <div class="container">
            <div class="alert alert-dark text-center" role="alert">
                <h4 class="alert-heading">No posee ventas registradas</h4>
            </div>
        </div>
<?php } else { ?>
<!-- Si hay ventas, mostrar tabla con detalles -->

<div class="row container-fluid">

    <!-- Tabla que lista las ventas -->
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
                // Inicializa contador y total de ventas
                $i = 0; 
                $total = 0;

                // Verifica que $venta sea un array y no esté vacío
                if (!empty($venta) && is_array($venta)) {

                    // Recorre el arreglo de usuarios y muestra cada registro en una fila -->
                    foreach ($venta as $row) {
                        $imagen = $row['imagen'];
                        $i++; // Incrementa el contador de filas
                        // Calcula el subtotal: precio x cantidad
                        $subtotal = $row['precio'] * $row['cantidad'];
                        // Acumula el total general de ventas
                        $total += $subtotal;
                ?>
                        <tr>
                            <td><?php echo $i; ?></td>
                            <!-- Nombre del cliente-->
                            <td class="text-center"><h6><?php echo $row['nombre']; ?></h6></td>
                            <!-- Nombre del producto-->
                            <td><?php echo $row['nombre_prod']; ?></td>
                            <!-- Imagen del producto-->
                            <td><img width="55" height="55" src="<?php echo base_url('assets/uploads/' . $imagen); ?>"></td>
                            <!-- Cantidad del producto-->
                            <td><?php echo number_format($row['cantidad']); ?></td>
                            <!-- Precio del producto-->
                            <td>$<?php echo number_format($row['precio'], 2); ?></td>
                            <!-- Subtotal de las compras-->
                            <td>$<?php echo number_format($subtotal, 2); ?></td>
                        </tr>
                <?php } } ?>
                <!-- Fila con total acumulado -->
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