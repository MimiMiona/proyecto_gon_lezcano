<?php
    $session=session();
    if(empty($ventas)){ ?>
    <div class="container">
        <div class="alert alert-dark text-center" role="alert">
            <h4 class="alert-heading">No posee compras registradas</h4>
            <p>Para realizar una compra, visite nuestro catalogo</p>
            <hr>
            <a class="btn btn-warning my-2 w-10" href="<?php echo base_url('todo_p') ?>">Catalogo</a>
        </div>
    <?php }?>
    </div>
    <?php if(session()->getFlashdata('mensaje')):?>
        <div class="alert alert-warning alert-dismissible fade show mt-3 mx-3" role="alert">
            <?= session()-<getFlashdata('mensaje') ?>
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Cerrar"></button>
        </div>
    <?php endif; ?>
    <div class="row">
        <div class="container">
            <div class="cl-xl-12 col-xs-10">
                <table class="table table-hover table-dark table-responsive-md">
                    <thead class="table-dark">
                        <tr>
                            <th>IMAGEN</th>
                            <th>PRODUCTO</th>
                            <th>PRECIO</th>
                            <th>CANTIDAD</th>
                            <th>TOTAL</th>
                            <th>Cancelar</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php $i = 0;
                            $total = 0;
                        ?>
                        <?php if (!empty($venta) && is_array($venta)){
                            foreach ($venta as $row){
                                $imagen=$row['imagen'];
                                $i++;
                            ?>
                            <tr class="text-center">
                                <th><?php echo $i ?></th>
                                <td><?php echo $row['nombre_prod']; ?></td>
                                <td>
                                    <img width="100" height="65" src="<?php echo base_url('assets/uploads/'.$imagen)?>">
                                </td>
                                <td><?php echo number_format($row['cantidad']) ?></td>
                                <td><?php echo $row['precio_vta']; ?></td>
                                <?php $subtotal=($row['precio_vta'] = $row['cantidad']); ?>
                                <td>$<?php echo number_format($subtotal, 2) ?></td>
                                <?php
                                    $total += $subtotal;
                                ?>
                            </tr>
                        <?php }?>
                    </tbody>
                    <tfoot>
                        <tr>
                            <td colspan="5" class="text-right">
                                <h4>Total</h4>
                            </td>
                            <td colspan="6" class="text-right">
                                <h4>$<?php echo number_format($total, 2) ?></h4>
                            </td>
                        </tr>
                    </tfoot>
                </table>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-xl-12 col-xs-12 text-center">
            <p class="h5 text-warning">Gracias por su compra</p>
        </div>
    </div>
<?php }?>

