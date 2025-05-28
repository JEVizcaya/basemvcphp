<nav class="main-nav">
    <div class="nav-container">
        <div class="nav-brand">
            <a href="<?= base_url() ?>">Mi Proyecto MVC</a>
        </div>        <div class="nav-links">
            <?php if (isset($_SESSION['user_id'])): ?>
                <a href="<?= base_url() ?>dashboard" class="nav-link">Dashboard</a>
                <a href="<?= base_url() ?>auth/logout" class="nav-link">Cerrar Sesión</a>
            <?php else: ?>
                <a href="<?= base_url() ?>auth/login" class="nav-link">Iniciar Sesión</a>
                <a href="<?= base_url() ?>auth/register" class="nav-link">Registrarse</a>
            <?php endif; ?>
        </div>
    </div>
</nav>