<section class="auth-page">
    <form class="auth-card" method="post" action="<?= url('process/login.php') ?>">
        <h1>Ingreso administrativo</h1>
        <?php if (isset($_GET['error'])): ?>
            <p class="form-alert error">Correo o contrasena incorrectos.</p>
        <?php endif; ?>
        <?php if (isset($_GET['logout'])): ?>
            <p class="form-alert success">Sesion cerrada correctamente.</p>
        <?php endif; ?>
        <label>Correo<input type="email" name="email" value="admin@electrohogar.com" required></label>
        <label>Contrasena<input type="password" name="password" value="password123" required></label>
        <button type="submit">Entrar</button>
        <p>Demo: admin@electrohogar.com / password123</p>
    </form>
</section>
