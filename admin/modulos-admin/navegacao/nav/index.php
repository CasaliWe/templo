<nav class="d-flex flex-column w-100 mt-5 pt-5 mt-lg-0 pt-lg-0">
    <a href="dashboard.php" class="link-nav-desktop <?= \Core\RoutesAdmin::isActive('dashboard') ?>">Contatos</a>
    <a href="galeria.php" class="link-nav-desktop <?= \Core\RoutesAdmin::isActive('galeria') ?>">Galeria</a>
    <a href="blog.php" class="link-nav-desktop <?= \Core\RoutesAdmin::isActive('blog') ?>">Projetos e Shows (blog)</a>
    <a href="lancamento.php" class="link-nav-desktop <?= \Core\RoutesAdmin::isActive('lancamento') ?>">Lançamento</a>
    <a href="banners.php" class="link-nav-desktop <?= \Core\RoutesAdmin::isActive('banners') ?>">Banners</a>
    <a class="link-nav-desktop"><?php include __DIR__ . "/../../btn-logout/index.php"; ?></a>
</nav>