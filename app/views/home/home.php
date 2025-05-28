<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Inicio - Mi Proyecto MVC</title>
    <link rel="stylesheet" href="<?= base_url() ?>assets/css/basic.css">
</head>
<body>
    <?php include __DIR__ . '/../partials/nav.php'; ?>
    
    <main class="main-content">
        <div class="content-center">
            <h1>Mi Proyecto MVC</h1>
            <p>Bienvenido al sistema base para desarrollo web con PHP</p>
            <p>Este proyecto utiliza arquitectura MVC, proporcionando una base sólida y escalable para tus aplicaciones web.</p>
            
            <?php if (!isset($_SESSION['user_id'])): ?>
                <div style="margin-top: 2rem;">
                    <a href="<?= base_url() ?>auth/register" class="btn btn-primary">Comenzar</a>
                    <a href="<?= base_url() ?>auth/login" class="btn btn-secondary">Iniciar Sesión</a>
                </div>            <?php else: ?>
                <div style="margin-top: 2rem;">
                    <a href="<?= base_url() ?>dashboard" class="btn btn-primary">Ir al Dashboard</a>
                </div>
            <?php endif; ?>
        </div>
    </main>

    <?php include __DIR__ . '/../partials/footer.php'; ?>
</body>
</html>