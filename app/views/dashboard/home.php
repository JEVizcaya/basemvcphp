<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">    <title>Dashboard - Mi Proyecto MVC</title>
    <link rel="stylesheet" href="<?= base_url() ?>assets/css/basic.css">
</head>
<body>
    <?php include __DIR__ . '/../partials/nav.php'; ?>
      <main class="main-content">
        <div class="content-center">
            <h1>Dashboard</h1>
            <p>Bienvenido a tu dashboard personal</p>
            <p>Este es tu espacio de trabajo, personalízalo según tus necesidades.</p>
            
            <div style="display: flex; gap: 1rem; justify-content: center; flex-wrap: wrap; margin-top: 2rem;">
                <a href="<?= base_url() ?>auth/logout" class="btn btn-secondary">Cerrar Sesión</a>
            </div>
        </div>
    </main>

    <?php include __DIR__ . '/../partials/footer.php'; ?>
</body>
</html>