<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Acerca de - Mi Proyecto MVC</title>
    <link rel="stylesheet" href="<?= base_url() ?>assets/css/basic.css">
</head>
<body>
    <?php include __DIR__ . '/../partials/nav.php'; ?>
    
    <main class="main-content">
        <div class="content-center">
            <h1>Acerca de Nosotros</h1>
            <p>Conoce más sobre nuestro proyecto y equipo</p>
            
            <div style="max-width: 800px; margin: 2rem auto; text-align: left;">
                <section style="margin-bottom: 3rem;">
                    <h2 style="color: var(--primary-color); margin-bottom: 1rem;">🎯 Nuestra Misión</h2>
                    <p style="font-size: 1.1rem; line-height: 1.6; margin-bottom: 1.5rem;">
                        Desarrollar soluciones web innovadoras utilizando arquitectura MVC con PHP, 
                        proporcionando una base sólida y escalable para aplicaciones modernas.
                    </p>
                </section>
                
                <section style="margin-bottom: 3rem;">
                    <h2 style="color: var(--primary-color); margin-bottom: 1rem;">🚀 Tecnologías</h2>
                    <div style="display: grid; grid-template-columns: repeat(auto-fit, minmax(200px, 1fr)); gap: 1rem;">
                        <div style="background: #f8f9fa; padding: 1.5rem; border-radius: 8px; border-left: 4px solid var(--primary-color);">
                            <h3 style="margin: 0 0 0.5rem 0; color: var(--primary-color);">Backend</h3>
                            <p style="margin: 0; color: #666;">PHP 8.2, MVC Architecture, PSR Standards</p>
                        </div>
                        <div style="background: #f8f9fa; padding: 1.5rem; border-radius: 8px; border-left: 4px solid var(--secondary-color);">
                            <h3 style="margin: 0 0 0.5rem 0; color: var(--secondary-color);">Frontend</h3>
                            <p style="margin: 0; color: #666;">HTML5, CSS3, JavaScript ES6+</p>
                        </div>
                        <div style="background: #f8f9fa; padding: 1.5rem; border-radius: 8px; border-left: 4px solid #27ae60;">
                            <h3 style="margin: 0 0 0.5rem 0; color: #27ae60;">Base de Datos</h3>
                            <p style="margin: 0; color: #666;">MySQL, PDO, Prepared Statements</p>
                        </div>
                        <div style="background: #f8f9fa; padding: 1.5rem; border-radius: 8px; border-left: 4px solid #e74c3c;">
                            <h3 style="margin: 0 0 0.5rem 0; color: #e74c3c;">IA Integration</h3>
                            <p style="margin: 0; color: #666;">Google Gemini AI, Chat Interface</p>
                        </div>
                    </div>
                </section>
                
                <section style="margin-bottom: 3rem;">
                    <h2 style="color: var(--primary-color); margin-bottom: 1rem;">✨ Características</h2>
                    <ul style="font-size: 1.1rem; line-height: 1.8;">
                        <li>🏗️ <strong>Arquitectura MVC</strong> - Separación clara de responsabilidades</li>
                        <li>🔐 <strong>Sistema de Autenticación</strong> - Login, registro y gestión de sesiones</li>
                        <li>🤖 <strong>Chat con IA</strong> - Integración con Google Gemini AI</li>
                        <li>📱 <strong>Diseño Responsivo</strong> - Compatible con todos los dispositivos</li>
                        <li>🛡️ <strong>Seguridad</strong> - Prepared statements, validación y sanitización</li>
                        <li>⚡ <strong>Rendimiento</strong> - Optimizado para velocidad y eficiencia</li>
                    </ul>
                </section>
            </div>
            
            <div style="text-align: center; margin-top: 3rem;">
                <a href="<?= base_url() ?>home/contact" class="btn btn-primary">Contáctanos</a>
                <a href="<?= base_url() ?>home/services" class="btn btn-secondary">Nuestros Servicios</a>
                <a href="<?= base_url() ?>" class="btn btn-outline">Volver al Inicio</a>
            </div>
        </div>
    </main>

    <?php include __DIR__ . '/../partials/footer.php'; ?>
</body>
</html>