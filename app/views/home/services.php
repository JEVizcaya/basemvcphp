<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Servicios - Mi Proyecto MVC</title>
    <link rel="stylesheet" href="<?= base_url() ?>assets/css/basic.css">
</head>
<body>
    <?php include __DIR__ . '/../partials/nav.php'; ?>
    
    <main class="main-content">
        <div class="content-center">
            <h1>Nuestros Servicios</h1>
            <p>Soluciones profesionales para tus proyectos web</p>
            
            <div style="max-width: 1000px; margin: 2rem auto;">
                
                <!-- Grid de servicios -->
                <div style="display: grid; grid-template-columns: repeat(auto-fit, minmax(300px, 1fr)); gap: 2rem; margin: 3rem 0;">
                    
                    <!-- Servicio 1: Desarrollo Web -->
                    <div style="background: white; padding: 2rem; border-radius: 12px; box-shadow: 0 4px 15px rgba(0,0,0,0.1); border-top: 4px solid var(--primary-color); transition: transform 0.3s ease;">
                        <div style="text-align: center; margin-bottom: 1.5rem;">
                            <div style="font-size: 3rem; margin-bottom: 1rem;">🌐</div>
                            <h3 style="color: var(--primary-color); margin: 0;">Desarrollo Web</h3>
                        </div>
                        <ul style="list-style: none; padding: 0; margin: 0;">
                            <li style="padding: 0.5rem 0; border-bottom: 1px solid #eee;">✅ Aplicaciones MVC personalizadas</li>
                            <li style="padding: 0.5rem 0; border-bottom: 1px solid #eee;">✅ Sistemas de gestión (CMS/CRM)</li>
                            <li style="padding: 0.5rem 0; border-bottom: 1px solid #eee;">✅ E-commerce y tiendas online</li>
                            <li style="padding: 0.5rem 0; border-bottom: 1px solid #eee;">✅ APIs RESTful</li>
                            <li style="padding: 0.5rem 0;">✅ Integración de bases de datos</li>
                        </ul>
                        <div style="text-align: center; margin-top: 1.5rem;">
                            <span style="font-size: 1.2rem; font-weight: bold; color: var(--primary-color);">Desde $500</span>
                        </div>
                    </div>
                    
                    <!-- Servicio 2: Integración IA -->
                    <div style="background: white; padding: 2rem; border-radius: 12px; box-shadow: 0 4px 15px rgba(0,0,0,0.1); border-top: 4px solid #e74c3c; transition: transform 0.3s ease;">
                        <div style="text-align: center; margin-bottom: 1.5rem;">
                            <div style="font-size: 3rem; margin-bottom: 1rem;">🤖</div>
                            <h3 style="color: #e74c3c; margin: 0;">Integración IA</h3>
                        </div>
                        <ul style="list-style: none; padding: 0; margin: 0;">
                            <li style="padding: 0.5rem 0; border-bottom: 1px solid #eee;">✅ Chatbots inteligentes</li>
                            <li style="padding: 0.5rem 0; border-bottom: 1px solid #eee;">✅ Integración Google Gemini</li>
                            <li style="padding: 0.5rem 0; border-bottom: 1px solid #eee;">✅ Procesamiento de lenguaje natural</li>
                            <li style="padding: 0.5rem 0; border-bottom: 1px solid #eee;">✅ Análisis de datos con IA</li>
                            <li style="padding: 0.5rem 0;">✅ Automatización inteligente</li>
                        </ul>
                        <div style="text-align: center; margin-top: 1.5rem;">
                            <span style="font-size: 1.2rem; font-weight: bold; color: #e74c3c;">Desde $300</span>
                        </div>
                    </div>
                    
                    <!-- Servicio 3: Consultoría -->
                    <div style="background: white; padding: 2rem; border-radius: 12px; box-shadow: 0 4px 15px rgba(0,0,0,0.1); border-top: 4px solid #27ae60; transition: transform 0.3s ease;">
                        <div style="text-align: center; margin-bottom: 1.5rem;">
                            <div style="font-size: 3rem; margin-bottom: 1rem;">💼</div>
                            <h3 style="color: #27ae60; margin: 0;">Consultoría Tech</h3>
                        </div>
                        <ul style="list-style: none; padding: 0; margin: 0;">
                            <li style="padding: 0.5rem 0; border-bottom: 1px solid #eee;">✅ Auditoría de código</li>
                            <li style="padding: 0.5rem 0; border-bottom: 1px solid #eee;">✅ Optimización de rendimiento</li>
                            <li style="padding: 0.5rem 0; border-bottom: 1px solid #eee;">✅ Migración de sistemas</li>
                            <li style="padding: 0.5rem 0; border-bottom: 1px solid #eee;">✅ Arquitectura de software</li>
                            <li style="padding: 0.5rem 0;">✅ Capacitación técnica</li>
                        </ul>
                        <div style="text-align: center; margin-top: 1.5rem;">
                            <span style="font-size: 1.2rem; font-weight: bold; color: #27ae60;">$100/hora</span>
                        </div>
                    </div>
                    
                    <!-- Servicio 4: Mantenimiento -->
                    <div style="background: white; padding: 2rem; border-radius: 12px; box-shadow: 0 4px 15px rgba(0,0,0,0.1); border-top: 4px solid var(--secondary-color); transition: transform 0.3s ease;">
                        <div style="text-align: center; margin-bottom: 1.5rem;">
                            <div style="font-size: 3rem; margin-bottom: 1rem;">🔧</div>
                            <h3 style="color: var(--secondary-color); margin: 0;">Mantenimiento</h3>
                        </div>
                        <ul style="list-style: none; padding: 0; margin: 0;">
                            <li style="padding: 0.5rem 0; border-bottom: 1px solid #eee;">✅ Soporte técnico 24/7</li>
                            <li style="padding: 0.5rem 0; border-bottom: 1px solid #eee;">✅ Actualizaciones de seguridad</li>
                            <li style="padding: 0.5rem 0; border-bottom: 1px solid #eee;">✅ Backup automático</li>
                            <li style="padding: 0.5rem 0; border-bottom: 1px solid #eee;">✅ Monitoreo de rendimiento</li>
                            <li style="padding: 0.5rem 0;">✅ Hosting y dominio</li>
                        </ul>
                        <div style="text-align: center; margin-top: 1.5rem;">
                            <span style="font-size: 1.2rem; font-weight: bold; color: var(--secondary-color);">$50/mes</span>
                        </div>
                    </div>
                    
                    <!-- Servicio 5: Diseño UX/UI -->
                    <div style="background: white; padding: 2rem; border-radius: 12px; box-shadow: 0 4px 15px rgba(0,0,0,0.1); border-top: 4px solid #9b59b6; transition: transform 0.3s ease;">
                        <div style="text-align: center; margin-bottom: 1.5rem;">
                            <div style="font-size: 3rem; margin-bottom: 1rem;">🎨</div>
                            <h3 style="color: #9b59b6; margin: 0;">Diseño UX/UI</h3>
                        </div>
                        <ul style="list-style: none; padding: 0; margin: 0;">
                            <li style="padding: 0.5rem 0; border-bottom: 1px solid #eee;">✅ Diseño de interfaces modernas</li>
                            <li style="padding: 0.5rem 0; border-bottom: 1px solid #eee;">✅ Experiencia de usuario (UX)</li>
                            <li style="padding: 0.5rem 0; border-bottom: 1px solid #eee;">✅ Prototipado interactivo</li>
                            <li style="padding: 0.5rem 0; border-bottom: 1px solid #eee;">✅ Diseño responsivo</li>
                            <li style="padding: 0.5rem 0;">✅ Testing de usabilidad</li>
                        </ul>
                        <div style="text-align: center; margin-top: 1.5rem;">
                            <span style="font-size: 1.2rem; font-weight: bold; color: #9b59b6;">Desde $400</span>
                        </div>
                    </div>
                    
                    <!-- Servicio 6: Paquete Completo -->
                    <div style="background: linear-gradient(135deg, var(--primary-color), #2980b9); padding: 2rem; border-radius: 12px; box-shadow: 0 4px 15px rgba(0,0,0,0.2); color: white; transition: transform 0.3s ease;">
                        <div style="text-align: center; margin-bottom: 1.5rem;">
                            <div style="font-size: 3rem; margin-bottom: 1rem;">🚀</div>
                            <h3 style="color: white; margin: 0;">Paquete Premium</h3>
                            <small style="background: rgba(255,255,255,0.2); padding: 0.3rem 0.8rem; border-radius: 20px; font-size: 0.8rem;">POPULAR</small>
                        </div>
                        <ul style="list-style: none; padding: 0; margin: 0;">
                            <li style="padding: 0.5rem 0; border-bottom: 1px solid rgba(255,255,255,0.2);">✅ Desarrollo completo + IA</li>
                            <li style="padding: 0.5rem 0; border-bottom: 1px solid rgba(255,255,255,0.2);">✅ Diseño UX/UI profesional</li>
                            <li style="padding: 0.5rem 0; border-bottom: 1px solid rgba(255,255,255,0.2);">✅ 6 meses de mantenimiento</li>
                            <li style="padding: 0.5rem 0; border-bottom: 1px solid rgba(255,255,255,0.2);">✅ Capacitación incluida</li>
                            <li style="padding: 0.5rem 0;">✅ Soporte prioritario</li>
                        </ul>
                        <div style="text-align: center; margin-top: 1.5rem;">
                            <span style="font-size: 1.4rem; font-weight: bold;">$1,500</span>
                            <small style="display: block; opacity: 0.8; text-decoration: line-through;">$2,000</small>
                        </div>
                    </div>
                </div>
                
                <!-- Sección CTA -->
                <div style="background: #f8f9fa; padding: 3rem 2rem; border-radius: 12px; text-align: center; margin: 3rem 0;">
                    <h2 style="color: var(--primary-color); margin-bottom: 1rem;">¿Listo para empezar tu proyecto?</h2>
                    <p style="font-size: 1.1rem; color: #666; margin-bottom: 2rem;">
                        Contáctanos para una consulta gratuita y presupuesto personalizado
                    </p>
                    <div style="display: flex; gap: 1rem; justify-content: center; flex-wrap: wrap;">
                        <a href="<?= base_url() ?>home/contact" class="btn btn-primary">Solicitar Presupuesto</a>
                        <a href="<?= base_url() ?>home/about" class="btn btn-secondary">Conocer Más</a>
                    </div>
                </div>
            </div>
        </div>
    </main>

    <?php include __DIR__ . '/../partials/footer.php'; ?>
    
    <style>
        /* Hover effects para las cards */
        [style*="transition: transform"]:hover {
            transform: translateY(-5px);
        }
    </style>
</body>
</html>