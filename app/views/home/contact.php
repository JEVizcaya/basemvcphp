<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Contacto - Mi Proyecto MVC</title>
    <link rel="stylesheet" href="<?= base_url() ?>assets/css/basic.css">
</head>
<body>
    <?php include __DIR__ . '/../partials/nav.php'; ?>
    
    <main class="main-content">
        <div class="content-center">
            <h1>Contáctanos</h1>
            <p>Estamos aquí para ayudarte con tu próximo proyecto</p>
            
            <div style="max-width: 1000px; margin: 2rem auto;">
                <div style="display: grid; grid-template-columns: 1fr 1fr; gap: 3rem; margin: 3rem 0;">
                    
                    <!-- Formulario de contacto -->                    <div style="background: white; padding: 2rem; border-radius: 12px; box-shadow: 0 4px 15px rgba(0,0,0,0.1);">
                        <h2 style="color: var(--primary-color); margin-bottom: 1.5rem; text-align: center;">📧 Envíanos un mensaje</h2>
                        
                        <?php if (isset($data['success'])): ?>
                            <div style="background: #d4edda; color: #155724; padding: 1rem; border-radius: 8px; margin-bottom: 1.5rem; border-left: 4px solid #28a745;">
                                <strong>✅ ¡Mensaje enviado!</strong><br>
                                <?= htmlspecialchars($data['success']) ?>
                            </div>
                        <?php endif; ?>
                        
                        <?php if (isset($data['error'])): ?>
                            <div style="background: #f8d7da; color: #721c24; padding: 1rem; border-radius: 8px; margin-bottom: 1.5rem; border-left: 4px solid #dc3545;">
                                <strong>❌ Error:</strong><br>
                                <?= htmlspecialchars($data['error']) ?>
                            </div>
                        <?php endif; ?>
                        
                        <form action="<?= base_url() ?>home/contact" method="post" style="display: flex; flex-direction: column; gap: 1rem;">
                            <div class="form-group">
                                <label for="name">Nombre completo:</label>
                                <input type="text" id="name" name="name" required placeholder="Tu nombre completo" />
                            </div>
                            
                            <div class="form-group">
                                <label for="email">Email:</label>
                                <input type="email" id="email" name="email" required placeholder="tu@email.com" />
                            </div>
                            
                            <div class="form-group">
                                <label for="phone">Teléfono (opcional):</label>
                                <input type="tel" id="phone" name="phone" placeholder="+1 (555) 123-4567" />
                            </div>
                            
                            <div class="form-group">
                                <label for="service">Servicio de interés:</label>
                                <select id="service" name="service" required style="width: 100%; padding: 0.8rem; border: 1px solid var(--border-color); border-radius: 5px; font-size: 1rem;">
                                    <option value="">Selecciona un servicio</option>
                                    <option value="desarrollo-web">Desarrollo Web</option>
                                    <option value="integracion-ia">Integración IA</option>
                                    <option value="consultoria">Consultoría Tech</option>
                                    <option value="mantenimiento">Mantenimiento</option>
                                    <option value="diseno-ux-ui">Diseño UX/UI</option>
                                    <option value="paquete-premium">Paquete Premium</option>
                                    <option value="otro">Otro</option>
                                </select>
                            </div>
                            
                            <div class="form-group">
                                <label for="budget">Presupuesto estimado:</label>
                                <select id="budget" name="budget" style="width: 100%; padding: 0.8rem; border: 1px solid var(--border-color); border-radius: 5px; font-size: 1rem;">
                                    <option value="">Selecciona un rango</option>
                                    <option value="menos-500">Menos de $500</option>
                                    <option value="500-1000">$500 - $1,000</option>
                                    <option value="1000-2500">$1,000 - $2,500</option>
                                    <option value="2500-5000">$2,500 - $5,000</option>
                                    <option value="mas-5000">Más de $5,000</option>
                                </select>
                            </div>
                            
                            <div class="form-group">
                                <label for="message">Describe tu proyecto:</label>
                                <textarea id="message" name="message" rows="5" required placeholder="Cuéntanos sobre tu proyecto, objetivos y cualquier detalle relevante..." style="width: 100%; padding: 0.8rem; border: 1px solid var(--border-color); border-radius: 5px; font-size: 1rem; font-family: inherit; resize: vertical;"></textarea>
                            </div>
                            
                            <button type="submit" class="btn btn-primary" style="margin-top: 1rem;">
                                Enviar Mensaje
                            </button>
                        </form>
                    </div>
                    
                    <!-- Información de contacto -->
                    <div>
                        <div style="background: white; padding: 2rem; border-radius: 12px; box-shadow: 0 4px 15px rgba(0,0,0,0.1); margin-bottom: 2rem;">
                            <h2 style="color: var(--primary-color); margin-bottom: 1.5rem; text-align: center;">📞 Información de contacto</h2>
                            
                            <div style="display: flex; flex-direction: column; gap: 1.5rem;">
                                <div style="display: flex; align-items: center; gap: 1rem;">
                                    <div style="width: 50px; height: 50px; background: var(--primary-color); border-radius: 50%; display: flex; align-items: center; justify-content: center; color: white; font-size: 1.2rem;">
                                        📧
                                    </div>
                                    <div>
                                        <h4 style="margin: 0; color: var(--primary-color);">Email</h4>
                                        <p style="margin: 0; color: #666;">contacto@mvcproyecto.com</p>
                                    </div>
                                </div>
                                
                                <div style="display: flex; align-items: center; gap: 1rem;">
                                    <div style="width: 50px; height: 50px; background: #27ae60; border-radius: 50%; display: flex; align-items: center; justify-content: center; color: white; font-size: 1.2rem;">
                                        📱
                                    </div>
                                    <div>
                                        <h4 style="margin: 0; color: #27ae60;">WhatsApp</h4>
                                        <p style="margin: 0; color: #666;">+1 (555) 123-4567</p>
                                    </div>
                                </div>
                                
                                <div style="display: flex; align-items: center; gap: 1rem;">
                                    <div style="width: 50px; height: 50px; background: #3498db; border-radius: 50%; display: flex; align-items: center; justify-content: center; color: white; font-size: 1.2rem;">
                                        💼
                                    </div>
                                    <div>
                                        <h4 style="margin: 0; color: #3498db;">LinkedIn</h4>
                                        <p style="margin: 0; color: #666;">linkedin.com/company/mvc-proyecto</p>
                                    </div>
                                </div>
                                
                                <div style="display: flex; align-items: center; gap: 1rem;">
                                    <div style="width: 50px; height: 50px; background: #e74c3c; border-radius: 50%; display: flex; align-items: center; justify-content: center; color: white; font-size: 1.2rem;">
                                        🕒
                                    </div>
                                    <div>
                                        <h4 style="margin: 0; color: #e74c3c;">Horario</h4>
                                        <p style="margin: 0; color: #666;">Lun - Vie: 9:00 AM - 6:00 PM</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                        
                        <!-- FAQ rápidas -->
                        <div style="background: white; padding: 2rem; border-radius: 12px; box-shadow: 0 4px 15px rgba(0,0,0,0.1);">
                            <h3 style="color: var(--primary-color); margin-bottom: 1.5rem; text-align: center;">❓ Preguntas frecuentes</h3>
                            
                            <div style="display: flex; flex-direction: column; gap: 1rem;">
                                <details style="border: 1px solid #eee; border-radius: 8px; padding: 1rem;">
                                    <summary style="font-weight: bold; color: var(--primary-color); cursor: pointer;">¿Cuánto tiempo toma un proyecto?</summary>
                                    <p style="margin: 0.5rem 0 0 0; color: #666;">Depende del alcance. Proyectos simples: 2-4 semanas. Proyectos complejos: 2-3 meses.</p>
                                </details>
                                
                                <details style="border: 1px solid #eee; border-radius: 8px; padding: 1rem;">
                                    <summary style="font-weight: bold; color: var(--primary-color); cursor: pointer;">¿Ofrecen mantenimiento?</summary>
                                    <p style="margin: 0.5rem 0 0 0; color: #666;">Sí, ofrecemos planes de mantenimiento desde $50/mes con soporte 24/7.</p>
                                </details>
                                
                                <details style="border: 1px solid #eee; border-radius: 8px; padding: 1rem;">
                                    <summary style="font-weight: bold; color: var(--primary-color); cursor: pointer;">¿Trabajan con IA?</summary>
                                    <p style="margin: 0.5rem 0 0 0; color: #666;">Sí, integramos soluciones de IA como Google Gemini, ChatGPT y más.</p>
                                </details>
                            </div>
                        </div>
                    </div>
                </div>
                
                <!-- Sección de proceso -->
                <div style="background: #f8f9fa; padding: 3rem 2rem; border-radius: 12px; text-align: center; margin: 3rem 0;">
                    <h2 style="color: var(--primary-color); margin-bottom: 2rem;">🚀 Nuestro proceso de trabajo</h2>
                    
                    <div style="display: grid; grid-template-columns: repeat(auto-fit, minmax(200px, 1fr)); gap: 2rem;">
                        <div>
                            <div style="width: 60px; height: 60px; background: var(--primary-color); border-radius: 50%; display: flex; align-items: center; justify-content: center; color: white; font-size: 1.5rem; margin: 0 auto 1rem auto;">1</div>
                            <h4 style="color: var(--primary-color); margin-bottom: 0.5rem;">Consulta</h4>
                            <p style="color: #666; font-size: 0.9rem;">Analizamos tus necesidades y objetivos</p>
                        </div>
                        
                        <div>
                            <div style="width: 60px; height: 60px; background: #27ae60; border-radius: 50%; display: flex; align-items: center; justify-content: center; color: white; font-size: 1.5rem; margin: 0 auto 1rem auto;">2</div>
                            <h4 style="color: #27ae60; margin-bottom: 0.5rem;">Propuesta</h4>
                            <p style="color: #666; font-size: 0.9rem;">Creamos una propuesta detallada y presupuesto</p>
                        </div>
                        
                        <div>
                            <div style="width: 60px; height: 60px; background: #e74c3c; border-radius: 50%; display: flex; align-items: center; justify-content: center; color: white; font-size: 1.5rem; margin: 0 auto 1rem auto;">3</div>
                            <h4 style="color: #e74c3c; margin-bottom: 0.5rem;">Desarrollo</h4>
                            <p style="color: #666; font-size: 0.9rem;">Desarrollamos tu proyecto con actualizaciones regulares</p>
                        </div>
                        
                        <div>
                            <div style="width: 60px; height: 60px; background: #9b59b6; border-radius: 50%; display: flex; align-items: center; justify-content: center; color: white; font-size: 1.5rem; margin: 0 auto 1rem auto;">4</div>
                            <h4 style="color: #9b59b6; margin-bottom: 0.5rem;">Entrega</h4>
                            <p style="color: #666; font-size: 0.9rem;">Lanzamos tu proyecto y brindamos soporte</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </main>    <?php include __DIR__ . '/../partials/footer.php'; ?>
    
    <style>
        /* Responsive para contacto */
        @media (max-width: 768px) {
            [style*="grid-template-columns: 1fr 1fr"] {
                grid-template-columns: 1fr !important;
            }
        }
        
        /* Estilo para los details */
        details[open] summary {
            margin-bottom: 0.5rem;
        }
    </style>
</body>
</html>