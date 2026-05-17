<section class="auth-page">
    <form class="auth-card" method="post" action="<?= url('process/register.php') ?>" data-auth-form>
        <h1>Crear cuenta</h1>
        <?php if (isset($_GET['error'])): ?>
            <p class="form-alert error">
                <?= ($_GET['error'] ?? '') === 'password' ? 'Las contrasenas no coinciden.' : 'No se pudo crear la cuenta. Revisa los datos o usa otro correo.' ?>
            </p>
        <?php endif; ?>
        <label>Nombre completo<input type="text" name="nombre" placeholder="Nombre completo" required></label>
        <label>Correo<input type="email" name="email" placeholder="correo@ejemplo.com" required></label>
        <label>Telefono<input type="tel" name="telefono" placeholder="3001234567"></label>
        <label>Direccion<input type="text" name="direccion" placeholder="Ciudad, barrio, direccion"></label>
        <label>Contrasena<input type="password" name="password" minlength="6" required data-password></label>
        <label>Confirmar contrasena<input type="password" name="password_confirm" minlength="6" required data-password-confirm></label>
        <p class="password-hint" data-password-hint>Usa minimo 6 caracteres.</p>
        <button type="submit">Registrarme</button>
        <div class="auth-links">
            <a href="<?= url('?page=login') ?>">Ya tengo cuenta</a>
        </div>
    </form>
</section>
