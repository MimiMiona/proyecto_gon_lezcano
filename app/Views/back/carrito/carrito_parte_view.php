<!-- Contenedor principal del formulario -->
<div class="container-fluid" id="carrito">
    <div class="cart">
        
        <!-- Muestra un mensaje de error si no se agrego el producto-->
        <?php if (session()->getFlashdata('mensaje')): ?>
            <div class="alert alert-warning alert-dismissible fade show mt-3 mx-3" role="alert">
                <?= session()->getFlashdata('mensaje') ?>
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Cerrar"></button>
            </div>
        <?php endif; ?>
    </div>

    <div class="text-center">
        <?php if (empty($cart)): ?>
            <div class="alert alert-dark text-center" role="alert">
                <div class="container">
                    <h4 class="alert-heading">Productos en tu carrito</h4>
                    <p>Para agregar productos al carrito, hacé clic en:</p>
                    
                    <!-- Botón para volver al catálogo de productos -->
                    <a class="btn btn-warning my-2 w-10" href="<?php echo base_url('/todos_p') ?>">Volver al Catálogo</a>
                </div>
            </div>
        <?php endif; ?>
    </div>

    <!-- Si el carrito NO está vacío, se muestra la tabla con productos -->
    <?php if (!empty($cart)): ?>
        <form action="<?= base_url('carrito_actualiza') ?>" method="post">
            <div class="container my-3">

                <!-- Tabla que lista los productos por comprar -->
                <table class="table custom-table table-hover table-responsive-md">
                    <thead>
                        <tr>
                            <th>Poster</th>
                            <th>Nombre</th>
                            <th>Precio</th>
                            <th>Cantidad</th>
                            <th>Total</th>
                            <th>Cancelar</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php $gran_total = 0; ?>
                        <?php foreach ($cart as $item): ?>
                            <!-- Recorre el arreglo de productos y muestra cada registro en una fila -->
                            <?php $gran_total += $item['price'] * $item['qty']; ?>

                            <!-- con inputs ocultos, el usuario no ve esos datos pero el formulario los envía. -->
                            <input type="hidden" name="cart[<?= esc($item['rowid']) ?>][id]" value="<?= esc($item['id']) ?>">
                            <!-- usando esc() se asegura que los datos se pasen seguros para imprimir en Html -->
                            <!-- cart es un arreglo multidimensional -->
                            <input type="hidden" name="cart[<?= esc($item['rowid']) ?>][rowid]" value="<?= esc($item['rowid']) ?>">
                            <input type="hidden" name="cart[<?= esc($item['rowid']) ?>][price]" value="<?= esc($item['price']) ?>">
                            <input type="hidden" name="cart[<?= esc($item['rowid']) ?>][qty]" value="<?= esc($item['qty']) ?>"><input type="hidden" name="cart[<?= esc($item['rowid']) ?>][imagen]" 
                                value="<?= isset($item['options']['imagen']) ? esc($item['options']['imagen']) : '' ?>">
                            <tr class="align-middle">
                                <td>
                                    <img src="<?= base_url('assets/uploads/' . (isset($item['options']['imagen']) ? $item['options']['imagen'] : 'default.png')) ?>" 
                                         width="80" height="80" alt="<?= esc($item['name']) ?>">

                                </td>
                                <td><?= esc($item['name']) ?></td>
                                <td>$ <?= number_format($item['price'], 2) ?></td>
                                <td>

                                    <!-- Botón para aumentar cantidad -->
                                    <a class="btn btn-success" href="<?= base_url('carrito_suma/' . $item['rowid']) ?>">+</a>
                                    
                                    <!-- Cantidad actual -->
                                    <?= number_format($item['qty'], 0) ?>
                                    
                                    <!-- Botón para disminuir cantidad -->
                                    <a class="btn btn-danger" href="<?= base_url('carrito_resta/' . $item['rowid']) ?>">-</a>
                                </td>
                                <td>$ <?= number_format($item['subtotal'], 2) ?></td>
                                <td>

                                    <!-- Botón para eliminar este producto -->
                                    <a href="<?= base_url('carrito_elimina/' . $item['rowid']) ?>">
                                        <img src="<?= base_url('assets/img/cancelar.png') ?>" width="40" height="40" alt="Eliminar">
                                    </a>
                                </td>
                            </tr>
                        <?php endforeach; ?>
                        <tr class="table-light">
                            <td colspan="4" class="text-end">
                                <strong>Total: $ <?= number_format($gran_total, 2) ?></strong>
                            </td>
                            <td colspan="2" class="text-end">
                                <!-- Botón para borrar todo el carrito -->
                                <input type="button" class="btn btn-primary btn-lg" value="Borrar Carrito" onclick="window.location='<?= base_url('borrar') ?>';">
                                <!-- Botón para ir a la compra -->
                                <input type="button" class="btn btn-secondary btn-lg" value="Comprar" onclick="window.location='<?= base_url('/carrito-comprar') ?>';">
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </form>
    <?php endif; ?>
</div>
