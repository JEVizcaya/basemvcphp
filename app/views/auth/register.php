<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registro - Mi Proyecto MVC</title>
    <link rel="stylesheet" href="<?= base_url() ?>assets/css/basic.css">
</head>
<body style="justify-content: center; align-items: center; min-height: 100vh;">
    <div class="form-container">
        <div style="text-align: center; margin-bottom: 2rem;">
            <h1 style="color: var(--primary-color); margin-bottom: 0.5rem;">Mi Proyecto MVC</h1>
            <h2>Crear Cuenta</h2>
        </div>
        
        <form action="<?=base_url()?>auth/register" method="post">
            <div class="form-group">
                <label for="username">Usuario:</label>
                <input type="text" id="username" name="username" required />
            </div>
            
            <div class="form-group">
                <label for="email">Email:</label>
                <input type="email" id="email" name="email" required />
            </div>
            
            <div class="form-group">
                <label for="first_name">Nombre:</label>
                <input type="text" id="first_name" name="first_name" required />
            </div>
            
            <div class="form-group">
                <label for="last_name">Apellido:</label>
                <input type="text" id="last_name" name="last_name" required />
            </div>
            
            <div class="form-group">
                <label for="password">Contraseña:</label>
                <input type="password" id="password" name="password" required />
            </div>
            
            <div class="form-group">
                <label for="confirm_password">Confirmar Contraseña:</label>
                <input type="password" id="confirm_password" name="confirm_password" required />
            </div>
            
            <button type="submit">Registrarse</button>
        </form>
        
        <div style="text-align: center; margin-top: 1.5rem;">
            <p>¿Ya tienes cuenta? <a href="<?=base_url()?>auth/login">Inicia sesión</a></p>
            <p><a href="<?=base_url()?>">Volver al inicio</a></p>
        </div>
    </div>
</body>
</html>