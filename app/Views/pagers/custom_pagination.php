<?php 
    //Verifica si hay mas de una pagina o si la pagina actual es mayor a 1
    if ($pager->getPageCount() > 1 || $pager->getCurrentPage() > 1): ?>
    
    <?php 
        //Recorre todos los enlaces de paginación generados por el pager
        foreach ($pager->links() as $link): 
    ?>
        <!-- Si el enlace esta activo (pagina actual), se agrega la clase 'active' -->    
        <li class="page-item <?= $link['active'] ? 'active' : '' ?>">
            <!-- Enlace de paginacion -->    
            <a class="page-link" href="<?= $link['uri'] ?>">
                <?= $link['title'] ?>
            </a>
        </li>
    <?php endforeach; ?>
<?php endif; ?>
