<div class="container pt-5 mt-5 mb-5"> 
    <div class= "card-header text-justify"> 
        <div class="row d-flex justify-content-center"> 
            <div class="card col-lg-3" style="width: 50%;" > 
                <h4>Registrarse</h4> 
                <?php $validation \Config\Services::validation(); ?> 
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
                                        <?= $error $validation->getError('nombre'); ?> 
                                    </div> 
                                    <?php }?> 
                                </div> 
                            <div class="mb-3"> 
                                <label for="exampleFormControlTextareal" class="form-label">Apellido</label> 
                                <input type="text" name="apellido" class="form-control" placeholder="apellido" > 
                                <?php if($validation->getError('apellido')) {?>