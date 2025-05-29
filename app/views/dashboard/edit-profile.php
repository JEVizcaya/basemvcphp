<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Editar Perfil - Mi Proyecto MVC</title>
    <link rel="stylesheet" href="<?= base_url() ?>assets/css/basic.css">
    <style>
        /* Layout específico del formulario */
        .form-layout {
            max-width: 600px;
            margin: 0 auto;
            padding: 0 20px;
        }
        
        .form-card {
            background: white;
            padding: 2rem;
            border-radius: 12px;
            box-shadow: 0 4px 15px rgba(0,0,0,0.1);
            margin-bottom: 2rem;
        }
        
        .form-group {
            margin-bottom: 1.5rem;
        }
        
        .form-group label {
            display: block;
            font-weight: bold;
            color: var(--primary-color);
            margin-bottom: 0.5rem;
        }
        
        .form-group input {
            width: 100%;
            padding: 12px;
            border: 2px solid #e0e0e0;
            border-radius: 8px;
            font-size: 16px;
            transition: all 0.3s ease;
            box-sizing: border-box;
        }
        
        .form-group input:focus {
            border-color: var(--primary-color);
            outline: none;
            box-shadow: 0 0 10px rgba(52, 152, 219, 0.2);
        }
        
        .form-actions {
            display: flex;
            gap: 1rem;
            justify-content: center;
            flex-wrap: wrap;
            margin-top: 2rem;
        }
        
        .required {
            color: #e74c3c;
        }
        
        @media (max-width: 768px) {
            .form-actions {
                flex-direction: column;
                align-items: center;
            }
        }
    </style>
</head>
<body>
    <?php include __DIR__ . '/../partials/nav.php'; ?>
    
    <main class="main-content">
        <div class="form-layout">
            <div class="content-center">
                <h1>✏️ Editar Perfil</h1>
                <p>Actualiza tu información personal</p>
                
                <?php if (isset($data['error'])): ?>
                    <div style="background: #f8d7da; color: #721c24; padding: 1rem; border-radius: 8px; margin-bottom: 1.5rem; border-left: 4px solid #dc3545;">
                        <strong>❌ Error:</strong><br>
                        <?= htmlspecialchars($data['error']) ?>
                    </div>
                <?php endif; ?>
                
                <div class="form-card">
                    <form method="POST" action="<?= base_url() ?>dashboard/edit-profile">
                        <div class="form-group">
                            <label for="first_name">👤 Nombre <span class="required">*</span></label>
                            <input 
                                type="text" 
                                id="first_name" 
                                name="first_name" 
                                value="<?= htmlspecialchars($data['user']->first_name ?? '') ?>"
                                required
                                maxlength="50"
                                placeholder="Ingresa tu nombre"
                            >
                        </div>
                        
                        <div class="form-group">
                            <label for="last_name">👤 Apellido <span class="required">*</span></label>
                            <input 
                                type="text" 
                                id="last_name" 
                                name="last_name" 
                                value="<?= htmlspecialchars($data['user']->last_name ?? '') ?>"
                                required
                                maxlength="50"
                                placeholder="Ingresa tu apellido"
                            >
                        </div>
                        
                        <div class="form-group">
                            <label for="email">📧 Email <span class="required">*</span></label>
                            <input 
                                type="email" 
                                id="email" 
                                name="email" 
                                value="<?= htmlspecialchars($data['user']->email ?? '') ?>"
                                required
                                maxlength="100"
                                placeholder="tu@email.com"
                            >
                        </div>
                        
                        <div class="form-group">
                            <label for="username">🏷️ Nombre de Usuario <span class="required">*</span></label>
                            <input 
                                type="text" 
                                id="username" 
                                name="username" 
                                value="<?= htmlspecialchars($data['user']->username ?? '') ?>"
                                required
                                maxlength="30"
                                placeholder="nombredeusuario"
                                pattern="[a-zA-Z0-9_]+"
                                title="Solo letras, números y guiones bajos"
                            >
                        </div>
                        
                        <div class="form-actions">
                            <button type="submit" class="btn btn-primary">💾 Guardar Cambios</button>
                            <a href="<?= base_url() ?>dashboard/profile" class="btn btn-outline">❌ Cancelar</a>
                        </div>
                    </form>
                </div>
                
                <div style="background: #e3f2fd; color: #1565c0; padding: 1rem; border-radius: 8px; margin-top: 1rem; border-left: 4px solid #2196f3;">
                    <strong>💡 Consejos:</strong><br>
                    • Usa un email válido para recuperar tu cuenta<br>
                    • El nombre de usuario solo puede contener letras, números y guiones bajos<br>
                    • Todos los campos son obligatorios
                </div>
            </div>
        </div>
    </main>
    
    <?php include __DIR__ . '/../partials/footer.php'; ?>
</body>
</html>
