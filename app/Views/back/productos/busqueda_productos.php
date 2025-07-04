<!-- Contenedor principal del formulario-->
<div class="container mt-5">
    <h2 class="mb-4 text-center">Catálogo de Productos</h2>

    <!-- Verifica si el arreglo $productos no está vacío -->
    <?php if (!empty($productos)): ?>
        <div class="row">
            <!-- Bucle que recorre cada producto en el arreglo $productos -->
            <?php foreach ($productos as $prod): ?>
                <div class="col-md-4 mb-4">
                    <div class="card h-100 shadow-sm">

                        <!-- Imagen del producto -->
                        <img src="<?= base_url('assets/uploads/' . $prod['imagen']) ?>" class="card-img-top" alt="Imagen de <?= esc($prod['nombre_prod']) ?>">
                        
                        <!-- Cuerpo de la tarjeta -->
                        <div class="card-body">

                            <!-- Nombre del producto -->
                            <h5 class="card-title"><?= esc($prod['nombre_prod']) ?></h5>
                            
                            <!-- Precio del producto -->
                            <p class="card-text">Precio: $<?= esc($prod['precio_vta']) ?></p>
                            
                            <!-- Formulario para agregar el producto al carrito -->
                            <form action="<?= base_url('add') ?>" method="post">

                                <!-- Campo de seguridad CSRF -->
                                <?= csrf_field() ?>

                                <!-- Campos ocultos con los datos del producto -->
                                <input type="hidden" name="id" value="<?= esc($prod['id_producto']) ?>">
                                <input type="hidden" name="nombre_prod" value="<?= esc($prod['nombre_prod']) ?>">
                                <input type="hidden" name="precio_vta" value="<?= esc($prod['precio_vta']) ?>">
                                <input type="hidden" name="imagen" value="<?= esc($prod['imagen']) ?>">
                                
                                <!-- Botón de envio de busqueda-->
                                <button type="submit" class="btn btn-primary">Agregar al carrito</button>
                            </form>
                        </div>
                    </div>
                </div>
            <?php endforeach; ?>
        </div>
    
    
    <!-- Si $productos está vacío, se muestra un mensaje -->
    <?php else: ?>
        <p class="text-center">No se encontraron productos con ese nombre.</p>
    <?php endif; ?>
</div>
