<section>
    <div class="container mt-1 mb-1 d-flex justify-content-center">
        <div class="container mt-1 mb-1 d-flex justify-content-center">
            <div class="card" style="width:75%">
                <div class="card-header text-center">
                    <h2>Alta de Productos</h2>
                </div>
                <div>
                    <?php if (!empty(session()->getFlashdata('fail'))): ?>
                        <div class="alert alert-danger"><?= session()->getFlashdata('fail'); ?><div>
                    <?php endif; ?>
                    <?php if(!empty (session()->getFlashdata('success'))):?> 
                        <div class="alert alert-danger"><?=session()->getFlashdata('success'); ?></div> 
                    <?php endif?> 
                    <?php $validation = \Config\Services::validation(); ?>
                    <form action="<?php echo base_url('/enviar-form') method="post" enctype="multipart/form-data" ?>">
                        <div class="card-body" media="(max-width:568px)">
                            <div class="mb-2"> 
                                <label for="nombre_prod" class="form-label">Producto</label> 
                                <input class="form-control" type="text" name="nombre_prod" id="nombre_prod" value="<?= set_value('nombre_prod'); ?>" 
                                placeholder="Nombre del Producto" autofocus> 
                                <?php if($validation->getError('nombre_prod')) {?> 
                                    <div class='alert alert-danger mt-2'> 
                                        <?= $validation->getError('nombre_prod'); ?> 
                                    </div> 
                                <?php }?> 
                            </div>
                            <div class="mb-2"> 
                                <select class="form-label" name="categoria" id="categoria"> 
                                    <option value="0">Seleccionar Categoria</option>
                                        <?php foreach ($categorias as $categoria): ?>
                                            <option value="<?= $categoria['id']; ?>" <?= set_select('categoria', $categoria['id']); ?>>
                                                <?= $categoria['id'], ". ", $categoria['descripcion']; ?>
                                            </option>
                                        <?php endforeach; ?>
                                </select>
                                <?php if($validation->getError('categoria')) {?> 
                                    <div class='alert alert-danger mt-2'> 
                                        <?= $validation->getError('categoria'); ?> 
                                    </div> 
                                <?php }?> 
                            </div>
                            <div class="mb-2"> 
                                <label for="precio" class="form-label">precio de Costo</label> 
                                <input class="form-control" type="text" name="precio" id="precio" value="<?= set_value('precio'); ?>"> 
                                <?php if($validation->getError('precio')) {?> 
                                    <div class='alert alert-danger mt-2'> 
                                        <?= $validation->getError('precio'); ?> 
                                    </div> 
                                <?php }?> 
                            </div>
                            <div class="mb-2"> 
                                <label for="precio_vta" class="form-label">Precio de Venta</label> 
                                <input class="form-control" type="text" name="precio_vta" id="precio_vta" value="<?= set_value('precio_vta'); ?>"> 
                                <?php if($validation->getError('precio_vta')) {?> 
                                    <div class='alert alert-danger mt-2'> 
                                        <?= $validation->getError('precio_vta'); ?> 
                                    </div> 
                                <?php }?> 
                            </div>
                            <div class="mb-2"> 
                                <label for="stock" class="form-label">Stock</label> 
                                <input class="form-control" type="text" name="stock" id="stock" value="<?= set_value('stock'); ?>"> 
                                <?php if($validation->getError('stock')) {?> 
                                    <div class='alert alert-danger mt-2'> 
                                        <?= $validation->getError('stock'); ?> 
                                    </div> 
                                <?php }?> 
                            </div>
                            <div class="mb-2"> 
                                <label for="stock_min" class="form-label">Stock Minimo</label> 
                                <input class="form-control" type="text" name="stock_min" id="stock_min" value="<?= set_value('stock_min'); ?>"> 
                                <?php if($validation->getError('stock_min')) {?> 
                                    <div class='alert alert-danger mt-2'> 
                                        <?= $validation->getError('stock_min'); ?> 
                                    </div> 
                                <?php }?> 
                            </div>
                            <div class="mb-2"> 
                                <label for="imagen" class="form-label">Imagen</label> 
                                <input class="form-control" type="file" name="imagen" id="imagen" value="<?= set_value('imagen'); ?>"> 
                                <?php if($validation->getError('imagen')) {?> 
                                    <div class='alert alert-danger mt-2'> 
                                        <?= $validation->getError('imagen'); ?> 
                                    </div> 
                                <?php }?> 
                            </div>

                            <div class="form-group">
                                <button type="submit" id="sent_form" class="btn btn-sucess">Enviar</button>
                                <button type="reset" class="btn btn-danger">Cancelar</button>
                                <a href="<?= base_url('crear'); ?>" class="btn btn-secondary">Volver</a>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</section>    