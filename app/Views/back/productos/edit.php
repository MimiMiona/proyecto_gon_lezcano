<section>
    <div class="container mt-4 mb-4 d-flex justify-content-center">
        <div class="card" style="width: 70%;">
            <div class="card-header text-center">
                <h3>Editar productos</h3>
            </div>
            <div class="card-body">
                <form action="<?= base_url('modifica/' . $old['id_producto']) ?>" method="post" enctype="multipart/form-data">
                    
                    <div class="mb-3">
                        <label for="nombre_prod" class="form-label">Producto</label>
                        <input type="text" name="nombre_prod" id="nombre_prod" class="form-control"
                               value="<?= esc($old['nombre_prod']) ?>">
                    </div>

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

                    <div class="mb-3">
                        <label for="precio" class="form-label">Precio</label>
                        <input type="text" name="precio" id="precio" class="form-control"
                               value="<?= esc($old['precio']) ?>">
                    </div>

                    <div class="mb-3">
                        <label for="precio_vta" class="form-label">Precio Vta</label>
                        <input type="text" name="precio_vta" id="precio_vta" class="form-control"
                               value="<?= esc($old['precio_vta']) ?>">
                    </div>

                    <div class="mb-3">
                        <label for="stock" class="form-label">Stock</label>
                        <input type="text" name="stock" id="stock" class="form-control"
                               value="<?= esc($old['stock']) ?>">
                    </div>

                    <div class="mb-3">
                        <label for="stock_min" class="form-label">Stock Min</label>
                        <input type="text" name="stock_min" id="stock_min" class="form-control"
                               value="<?= esc($old['stock_min']) ?>">
                    </div>

                    <div class="mb-3">
                        <label class="form-label">Imagen actual:</label><br>
                        <img src="<?= base_url('assets/uploads/' . $old['imagen']) ?>" width="100" alt="Imagen actual">
                    </div>

                    <div class="mb-3">
                        <label for="imagen" class="form-label">Imagen del producto (formatos compatibles: .jpg, .png)</label>
                        <input type="file" name="imagen" id="imagen" class="form-control">
                    </div>

                    <div class="form-group mt-3 d-flex gap-2">
                        <button type="submit" class="btn btn-success">enviar</button>
                        <button type="reset" class="btn btn-danger">cancelar</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</section>
