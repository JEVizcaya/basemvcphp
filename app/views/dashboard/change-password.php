<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cambiar Contraseña - Mi Proyecto MVC</title>
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
        
        .password-strength {
            margin-top: 0.5rem;
            font-size: 0.9rem;
            color: #666;
        }
        
        .strength-bar {
            width: 100%;
            height: 6px;
            background: #e0e0e0;
            border-radius: 3px;
            margin-top: 0.5rem;
            overflow: hidden;
        }
        
        .strength-fill {
            height: 100%;
            transition: all 0.3s ease;
            border-radius: 3px;
        }
        
        .strength-weak { background: #e74c3c; width: 25%; }
        .strength-fair { background: #f39c12; width: 50%; }
        .strength-good { background: #f1c40f; width: 75%; }
        .strength-strong { background: #27ae60; width: 100%; }
        
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
                <h1>🔒 Cambiar Contraseña</h1>
                <p>Actualiza tu contraseña por seguridad</p>
                
                <?php if (isset($data['error'])): ?>
                    <div style="background: #f8d7da; color: #721c24; padding: 1rem; border-radius: 8px; margin-bottom: 1.5rem; border-left: 4px solid #dc3545;">
                        <strong>❌ Error:</strong><br>
                        <?= htmlspecialchars($data['error']) ?>
                    </div>
                <?php endif; ?>
                
                <div class="form-card">
                    <form method="POST" action="<?= base_url() ?>dashboard/change-password" id="passwordForm">
                        <div class="form-group">
                            <label for="current_password">🔐 Contraseña Actual <span class="required">*</span></label>
                            <input 
                                type="password" 
                                id="current_password" 
                                name="current_password" 
                                required
                                placeholder="Ingresa tu contraseña actual"
                            >
                        </div>
                        
                        <div class="form-group">
                            <label for="new_password">🆕 Nueva Contraseña <span class="required">*</span></label>
                            <input 
                                type="password" 
                                id="new_password" 
                                name="new_password" 
                                required
                                minlength="6"
                                placeholder="Mínimo 6 caracteres"
                            >
                            <div class="password-strength">
                                <div id="strength-text">Fortaleza de la contraseña</div>
                                <div class="strength-bar">
                                    <div id="strength-fill" class="strength-fill"></div>
                                </div>
                            </div>
                        </div>
                        
                        <div class="form-group">
                            <label for="confirm_password">✅ Confirmar Nueva Contraseña <span class="required">*</span></label>
                            <input 
                                type="password" 
                                id="confirm_password" 
                                name="confirm_password" 
                                required
                                minlength="6"
                                placeholder="Repite la nueva contraseña"
                            >
                            <div id="password-match" style="margin-top: 0.5rem; font-size: 0.9rem;"></div>
                        </div>
                        
                        <div class="form-actions">
                            <button type="submit" class="btn btn-primary" id="submitBtn">🔒 Cambiar Contraseña</button>
                            <a href="<?= base_url() ?>dashboard/profile" class="btn btn-outline">❌ Cancelar</a>
                        </div>
                    </form>
                </div>
                
                <div style="background: #fff3cd; color: #856404; padding: 1rem; border-radius: 8px; margin-top: 1rem; border-left: 4px solid #ffc107;">
                    <strong>🛡️ Consejos de Seguridad:</strong><br>
                    • Usa al menos 8 caracteres<br>
                    • Combina letras mayúsculas, minúsculas, números y símbolos<br>
                    • No uses información personal<br>
                    • No reutilices contraseñas de otras cuentas
                </div>
            </div>
        </div>
    </main>
    
    <script>
        // Validación en tiempo real de fortaleza de contraseña
        const newPasswordInput = document.getElementById('new_password');
        const confirmPasswordInput = document.getElementById('confirm_password');
        const strengthFill = document.getElementById('strength-fill');
        const strengthText = document.getElementById('strength-text');
        const passwordMatch = document.getElementById('password-match');
        const submitBtn = document.getElementById('submitBtn');
        
        function checkPasswordStrength(password) {
            let strength = 0;
            let feedback = [];
            
            if (password.length >= 6) strength += 1;
            else feedback.push('Al menos 6 caracteres');
            
            if (password.length >= 8) strength += 1;
            else feedback.push('Mejor con 8+ caracteres');
            
            if (/[a-z]/.test(password)) strength += 1;
            else feedback.push('Incluye minúsculas');
            
            if (/[A-Z]/.test(password)) strength += 1;
            else feedback.push('Incluye mayúsculas');
            
            if (/[0-9]/.test(password)) strength += 1;
            else feedback.push('Incluye números');
            
            if (/[^A-Za-z0-9]/.test(password)) strength += 1;
            else feedback.push('Incluye símbolos');
            
            return { strength, feedback };
        }
        
        newPasswordInput.addEventListener('input', function() {
            const password = this.value;
            const result = checkPasswordStrength(password);
            
            // Remover clases previas
            strengthFill.className = 'strength-fill';
            
            if (password.length === 0) {
                strengthText.textContent = 'Fortaleza de la contraseña';
                return;
            }
            
            if (result.strength <= 2) {
                strengthFill.classList.add('strength-weak');
                strengthText.textContent = 'Débil - ' + result.feedback.slice(0, 2).join(', ');
            } else if (result.strength <= 3) {
                strengthFill.classList.add('strength-fair');
                strengthText.textContent = 'Regular - ' + result.feedback.slice(0, 1).join(', ');
            } else if (result.strength <= 4) {
                strengthFill.classList.add('strength-good');
                strengthText.textContent = 'Buena - Considera agregar símbolos';
            } else {
                strengthFill.classList.add('strength-strong');
                strengthText.textContent = '¡Excelente! Contraseña segura';
            }
            
            checkPasswordMatch();
        });
        
        confirmPasswordInput.addEventListener('input', checkPasswordMatch);
        
        function checkPasswordMatch() {
            const newPassword = newPasswordInput.value;
            const confirmPassword = confirmPasswordInput.value;
            
            if (confirmPassword.length === 0) {
                passwordMatch.textContent = '';
                return;
            }
            
            if (newPassword === confirmPassword) {
                passwordMatch.textContent = '✅ Las contraseñas coinciden';
                passwordMatch.style.color = '#27ae60';
            } else {
                passwordMatch.textContent = '❌ Las contraseñas no coinciden';
                passwordMatch.style.color = '#e74c3c';
            }
        }
        
        // Validación del formulario
        document.getElementById('passwordForm').addEventListener('submit', function(e) {
            const newPassword = newPasswordInput.value;
            const confirmPassword = confirmPasswordInput.value;
            
            if (newPassword !== confirmPassword) {
                e.preventDefault();
                alert('Las contraseñas no coinciden');
                return false;
            }
            
            if (newPassword.length < 6) {
                e.preventDefault();
                alert('La contraseña debe tener al menos 6 caracteres');
                return false;
            }
        });
    </script>
    
    <?php include __DIR__ . '/../partials/footer.php'; ?>
</body>
</html>
