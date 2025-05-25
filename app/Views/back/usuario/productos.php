<section>
    <div class="container mt-1 mb-1 d-flex justify-content-center">
        <div class="container mt-1 mb-1 d-flex justify-content-center">
            <div class="card" style="width:75%">
                <div class="card-header text-center">
                    <h2>Alta de Productos</h2>
                </div>
                <div>
                    <?php if (!empty/(session()->getFlashdata('fail'))): ?>
                        <div class="alert alert-danger"><?= session()->getFlashdata('fail'); ?><div>
                    <?php endif
                </div>
            </div>
        </div>  
    </div>
</section> 