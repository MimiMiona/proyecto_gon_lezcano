    <div class="container mt-1 mb-0">
        <div class="card" style="width: 50%;" >
            <div class="card-header text-center">
                <h5>Alta de Usuarios</h5>
                <?php $validation = \Config\Services::validation(); ?>
                <form method="post" action="<?php echo base_url('/enviar-usuario') ?>">
                    <?php if(!empty (session()->getFlashdata('fail'))): ?>
                        <div class="alert alert-danger"><?=session()->getFlashdata('fail');?></div>
                    <?php endif?>
                    <?php if(!empty (session()->getFlashdata('success'))): ?>
                        <div class="alert alert-danger"><?=session()->getFlashdata('success'); ?></div> 
                    <?php endif?>
                    <div class="card-body" media="(max-width: 768px)">
                        <div class="mb-2">
                            <label for="exampleFormControlInput1" class="form-label">Nombre</label>
                            <input name="nombre" type="text" class="form-control" placeholder="nombre" value=""> <!-- Error -->
                            <?php if($validation->getError('nombre')) { ?>
                                <div class='alert alert-danger mt-2'>
                                    <?= $error = $validation->getError('nombre'); ?> 
                                </div>
                            <?php } ?>
                        </div>
                        <div class="mb-3">
                            <label for="exampleFormControlTextareal" class="form-label">Apellido</label> 
                            <input type="text" name="apellido"class="form-control" placeholder="apellido" > <!-- Error -->
                                <?php if($validation->getError('apellido')) {?>
                                    <div class='alert alert-danger mt-2'>
                                        <?= $error = $validation->getError('apellido'); ?> 
                                    </div>
                                <?php } ?>
                        </div>
                        <div class="mb-3">
                            <label for="exampleFormControlInput1" class="form-label">email</label>
                            <input name="email" type="femail" class="form-control" placeholder="correo@algo.com" > <!-- Error -->
                            <?php $error = $validation->getError('email'); ?>
                            <div class='alert alert-danger mt-2'>
                                <?= $error ?>
                            </div>
                        </div>
                        <div class="mb-3">
                            <label for="exampleFormControlInput1" class="form-label">Usuario</label>
                            <input tyupe="text" name="usuario" class="form-control" placeholder="usuario"> <!-- Error -->
                            <?php if($validation->getError('usuario')) {?>
                                <div class='alert alert-danger mt-2'>
                                    <?= $error = $validation->getError('usuario'); ?> 
                                </div>
                            <?php } ?>
                        </div>
                        <div class="mb-3">
                            <label for="exampleFormControlInput1" class="form-label">Password</label> 
                            <input name="pass" type="text" class="form-control" placeholder="password"> <!-- Error -->
                            <?php if($validation->getError('pass')) {?>
                                <div class='alert alert-danger mt-2'>
                                    <?= $error = $validation->getError('pass'); ?> 
                                </div>
                            <?php } ?>
                        </div>
                        <div class="col-12" style="text-align:center;">
                            <input type="submit" value="guardar" class="btn btn-success"> 
                            <input type="reset" value="cancelar" class="btn btn-danger">
                            <a href="<?php echo base_url('/vista')?>" class="btn btn-secondary">volver</a>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>