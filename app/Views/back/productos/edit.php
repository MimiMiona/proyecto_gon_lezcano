<!-- Seccion principal del formulario-->
<section class="container-fluid contenido py-5 mt-5">
    <div class="container-fluid login">
        <div class="row d-flex justify-content-center">
            
            <!-- Card que contiene el formulario -->
            <div class="card col-md-4 col-lg-3 custom-register-card shadow-lg" style="width: 80%;"> 
                <div class="card-body">
                    <h3>Editar Producto</h3>
                    <div class="card-body">

                         <!-- Formulario de edición -->
                        <form action="<?= base_url('modifica/' . $old['id_producto']) ?>" method="post" enctype="multipart/form-data">
                            
                            <div class="mb-3">
                                <label for="nombre_prod" class="form-label">Producto</label>
                                <input type="text" name="nombre_prod" id="nombre_prod" class="form-control"
                                    value="<?= esc($old['nombre_prod']) ?>">
                            </div>

                            <!-- Campo: Nombre -->
                            <div class="mb-3">
                                <label for="categoria" class="form-label">Categoría</label>
                                <select name="categoria" id="categoria" class="form-control">
                                    <?php foreach ($categorias as $cat): ?>
                                        <option value="<?= $cat['id'] ?>"
                                            <?= ($cat['id'] == $old['categoria_id']) ? 'selected' : '' ?>>
                                            <?= $cat['id'] . '. ' . $cat['descripcion'] ?>
                                        </option>
                                    <?php endforeach; ?>
                                </select>
                            </div>

                            <!-- Campo: Precio compra -->
                            <div class="mb-3">
                                <label for="precio" class="form-label">Precio</label>
                                <input type="text" name="precio" id="precio" class="form-control"
                                    value="<?= esc($old['precio']) ?>">
                            </div>

                            <!-- Campo: Precio venta -->
                            <div class="mb-3">
                                <label for="precio_vta" class="form-label">Precio Vta</label>
                                <input type="text" name="precio_vta" id="precio_vta" class="form-control"
                                    value="<?= esc($old['precio_vta']) ?>">
                            </div>

                            <!-- Campo: Stock -->
                            <div class="mb-3">
                                <label for="stock" class="form-label">Stock</label>
                                <input type="text" name="stock" id="stock" class="form-control"
                                    value="<?= esc($old['stock']) ?>">
                            </div>

                            <!-- Campo: Stock minimo -->
                            <div class="mb-3">
                                <label for="stock_min" class="form-label">Stock Min</label>
                                <input type="text" name="stock_min" id="stock_min" class="form-control"
                                    value="<?= esc($old['stock_min']) ?>">
                            </div>

                            <!-- Campo: Imagen antigua -->
                            <div class="mb-3">
                                <label class="form-label">Imagen actual:</label><br>
                                <img src="<?= base_url('assets/uploads/' . $old['imagen']) ?>" width="100" alt="Imagen actual">
                            </div>

                            <!-- Campo: Imagen nueva -->
                            <div class="mb-3">
                                <label for="imagen" class="form-label">Imagen del producto (formatos compatibles: .jpg, .png)</label>
                                <input type="file" name="imagen" id="imagen" class="form-control">
                            </div>

                            <div class="form-group mt-3 d-flex gap-2">
                                <!-- Botón para guardar usuario editado-->
                                <button type="submit" class="btn btn-success">Enviar</button>
                                <!-- Botón para volver a vista anterior -->
                                <a href="<?= base_url('crear'); ?>" class="btn btn-danger">Volver</a>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
