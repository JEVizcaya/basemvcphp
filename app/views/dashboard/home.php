<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard - Mi Proyecto MVC</title>
    <link rel="stylesheet" href="<?= base_url() ?>assets/css/basic.css">
    <link rel="stylesheet" href="<?= base_url() ?>assets/css/charla.css">
    <style>
        /* Layout específico del dashboard */
        .dashboard-layout {
            display: flex;
            gap: 2rem;
            max-width: 1400px;
            margin: 0 auto;
            padding: 0 20px;
            transition: all 0.3s ease;
        }
        
        .main-dashboard-content {
            flex: 1;
            transition: all 0.3s ease;
        }
          /* Dashboard content styling */
        .dashboard-content {
            text-align: center;
            padding: 2rem 0;
        }
        
        .welcome-message {
            max-width: 600px;
            margin: 0 auto;
        }
        
        .welcome-message h1 {
            color: var(--primary-color);
            margin-bottom: 1rem;
        }
        
        .welcome-message p {
            font-size: 1.1rem;
            color: #666;
            line-height: 1.6;
        }
    </style>
</head>
<body>
    <?php include __DIR__ . '/../partials/nav.php'; ?>
    
    <main class="main-content">        <div class="dashboard-layout">
            <div class="main-dashboard-content">
                <div class="dashboard-content">
                    <div class="welcome-message">
                        <h1>Dashboard</h1>
                        <p>Bienvenido a tu dashboard personal</p>
                        <p>Este es tu espacio de trabajo, personalízalo según tus necesidades.</p>
                        
                        <!-- Aquí puedes agregar tu contenido personalizado -->
                    </div>
                </div>
            </div>
        </div>
    </main>

    <?php include __DIR__ . '/../partials/footer.php'; ?>
    
    <!-- Chat con Google Gemini -->
    <?php include __DIR__ . '/../partials/charla.php'; ?>
    
    <script src="<?= base_url() ?>assets/js/charla.js"></script>
</body>
</html>