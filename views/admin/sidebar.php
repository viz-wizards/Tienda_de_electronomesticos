<aside class="admin-sidebar">
    <a class="admin-brand" href="admin.php">
        <span>EH</span>
        <strong><?= e(APP_NAME) ?></strong>
    </a>

    <nav class="admin-nav">
        <a class="<?= ($section ?? 'dashboard') === 'dashboard' ? 'active' : '' ?>" href="admin.php">Dashboard</a>
        <a class="<?= ($section ?? '') === 'productos' ? 'active' : '' ?>" href="admin.php?section=productos">Productos</a>
        <a class="<?= ($section ?? '') === 'categorias' ? 'active' : '' ?>" href="admin.php?section=categorias">Categorias</a>
        <a class="<?= ($section ?? '') === 'clientes' ? 'active' : '' ?>" href="admin.php?section=clientes">Clientes</a>
        <a class="<?= ($section ?? '') === 'proveedores' ? 'active' : '' ?>" href="admin.php?section=proveedores">Proveedores</a>
        <a class="<?= ($section ?? '') === 'ventas' ? 'active' : '' ?>" href="admin.php?section=ventas">Ventas</a>
        <a class="<?= ($section ?? '') === 'pagos' ? 'active' : '' ?>" href="admin.php?section=pagos">Pagos</a>
        <a class="<?= ($section ?? '') === 'usuarios' ? 'active' : '' ?>" href="admin.php?section=usuarios">Usuarios</a>
        <a href="index.php">Ver tienda</a>
    </nav>

    <div class="admin-user">
        <p><?= e($_SESSION['admin_user']['name'] ?? 'Administrador') ?></p>
        <span><?= e($_SESSION['admin_user']['role'] ?? 'Admin') ?></span>
        <a href="process/logout.php">Cerrar sesion</a>
    </div>
</aside>
