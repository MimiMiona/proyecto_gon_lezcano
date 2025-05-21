<div class="container pt-5 mt-5 mb-5"> 
    <div class= "card-header text-justify"> 
        <div class="row d-flex justify-content-center"> 
            <div class="card col-lg-3" style="width: 50%;" > 
                <h4>Registrarse</h4> 
                <?php $validation = \Config\Services::validation(); ?> 
                <form method="post" action="<?php echo base_url('/enviar-form') ?>"> 
                    <?=csrf_field();?> <!-- genera un campo oculto o token de seguridad--> 
                    <?php if(!empty (session()->getFlashdata('fail'))):?> 
                        <div class="alert alert-danger"><?=session()->getFlashdata('fail'); ?></div> 
                    <?php endif?> 
                    <?php if(!empty (session()->getFlashdata('success'))):?> 
                        <div class="alert alert-danger"><?=session()->getFlashdata('success'); ?></div> 
                    <?php endif?> 

                    <div class="card-body justify-content-center" media="(max-width:768px)"> 
                        <div class="mb-2"> 
                            <label for="exampleFormControlInput1" class="form-label">Nombre</label> 
                            <input name="nombre" type="text" class="form-control" placeholder="nombre" > 
                            <?php if($validation->getError('nombre')) {?> 
                                <div class='alert alert-danger mt-2'> 
                                    <?= $error = $validation->getError('nombre'); ?> 
                                </div> 
                            <?php }?> 
                        </div> 
                        <div class="mb-3"> 
                            <label for="exampleFormControlInput1" class="form-label">Apellido</label> 
                            <input name="apellido" type="text" class="form-control" placeholder="apellido" > 
                                <?php if($validation->getError('apellido')) {?> 
                                    <div class='alert alert-danger mt-3'> 
                                        <?= $error = $validation->getError('apellido'); ?> 
                                    </div> 
                                <?php }?> 
                        </div>
                        <div class="mb-4"> 
                            <label for="exampleFormControlInput1" class="form-label">Nombre de Usuario</label> 
                            <input name="usuario" type="text" class="form-control" placeholder="usuario" > 
                                <?php if($validation->getError('usuario')) {?> 
                                    <div class='alert alert-danger mt-4'> 
                                        <?= $error = $validation->getError('usuario'); ?> 
                                    </div> 
                                <?php }?> 
                        </div>
                        <div class="mb-4"> 
                            <label for="exampleFormControlInput1" class="form-label">Email</label> 
                            <input name="email" type="text" class="form-control" placeholder="email" > 
                                <?php if($validation->getError('email')) {?> 
                                    <div class='alert alert-danger mt-4'> 
                                        <?= $error = $validation->getError('usuario'); ?> 
                                    </div> 
                                <?php }?> 
                        </div>
                        <div class="mb-4"> 
                            <label class="form-label">Contraseña</label> 
                            <input name="pass" type="password" class="form-control" placeholder="Contraseña"> 
                            <?php if ($validation->getError('pass')): ?> 
                                <div class="alert alert-danger mt-2"><?= $validation->getError('pass'); ?></div> 
                            <?php endif; ?> 
                        </div>
                        <button type="submit" class="btn btn-primary w-100">Registrarse</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
