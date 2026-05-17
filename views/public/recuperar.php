<section class="auth-page">
    <form class="auth-card" method="post" action="<?= url('process/forgot_password.php') ?>" data-auth-form>
        <h1>Recuperar contrasena</h1>
        <?php if (isset($_GET['error'])): ?>
            <p class="form-alert error">No se pudo actualizar. Verifica el correo y que las contrasenas coincidan.</p>
        <?php endif; ?>
        <label>Correo de la cuenta<input type="email" name="email" placeholder="correo@ejemplo.com" required></label>
        <label>Nueva contrasena<input type="password" name="password" minlength="6" required data-password></label>
        <label>Confirmar nueva contrasena<input type="password" name="password_confirm" minlength="6" required data-password-confirm></label>
        <p class="password-hint" data-password-hint>Escribe y confirma tu nueva contrasena.</p>
        <button type="submit">Actualizar contrasena</button>
        <div class="auth-links">
            <a href="<?= url('?page=login') ?>">Volver al login</a>
            <a href="<?= url('?page=registro') ?>">Crear cuenta</a>
        </div>
    </form>
</section>
