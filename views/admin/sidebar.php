<aside class="admin-sidebar">
    <a class="admin-brand" href="admin.php">
        <span>EH</span>
        <strong><?= e(APP_NAME) ?></strong>
    </a>

    <nav class="admin-nav">
        <a class="<?= $adminPage === 'dashboard' ? 'active' : '' ?>" href="admin.php">Dashboard</a>
        <a class="<?= $adminPage === 'productos' ? 'active' : '' ?>" href="admin.php?page=productos">Productos</a>
        <a class="<?= $adminPage === 'ventas' ? 'active' : '' ?>" href="admin.php?page=ventas">Ventas</a>
        <a class="<?= $adminPage === 'clientes' ? 'active' : '' ?>" href="admin.php?page=clientes">Clientes</a>
        <a href="index.php">Ver tienda</a>
    </nav>

    <div class="admin-user">
        <p><?= e($_SESSION['admin_user']['name'] ?? 'Administrador') ?></p>
        <span><?= e($_SESSION['admin_user']['role'] ?? 'Admin') ?></span>
        <a href="process/logout.php">Cerrar sesion</a>
    </div>
</aside>
