<?php if ($pager->getPageCount() > 1 || $pager->getCurrentPage() > 1): ?>
    <?php foreach ($pager->links() as $link): ?>
        <li class="page-item <?= $link['active'] ? 'active' : '' ?>">
            <a class="page-link" href="<?= $link['uri'] ?>">
                <?= $link['title'] ?>
            </a>
        </li>
    <?php endforeach; ?>
<?php endif; ?>
