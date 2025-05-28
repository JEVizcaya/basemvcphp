<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Iniciar Sesión - Mi Proyecto MVC</title>
    <link rel="stylesheet" href="<?= base_url() ?>assets/css/basic.css">
</head>
<body style="justify-content: center; align-items: center; min-height: 100vh;">
    <div class="form-container">
        <div style="text-align: center; margin-bottom: 2rem;">
            <h1 style="color: var(--primary-color); margin-bottom: 0.5rem;">Mi Proyecto MVC</h1>
            <h2>Iniciar Sesión</h2>
        </div>
        
        <?php if(isset($data[0])): ?>
            <div style="background: #f8d7da; color: #721c24; padding: 1rem; border-radius: 5px; margin-bottom: 1rem;">
                <?php echo $data[0]; ?>
            </div>
        <?php endif; ?>
        
        <form action="<?=base_url()?>auth/login" method="post">
            <div class="form-group">
                <label for="username">Usuario:</label>
                <input required name="username" type="text" id="username" placeholder="Ingresa tu usuario" />
            </div>
            
            <div class="form-group">
                <label for="password">Contraseña:</label>
                <input required name="password" type="password" id="password" placeholder="Ingresa tu contraseña" />
            </div>
            
            <div class="form-group">
                <input type="checkbox" id="remember" style="width: auto; margin-right: 0.5rem;" />
                <label for="remember" style="display: inline;">Recordarme</label>
            </div>
            
            <button type="submit">Iniciar Sesión</button>
        </form>
        
        <div style="text-align: center; margin-top: 1.5rem;">
            <p>¿No tienes cuenta? <a href="<?=base_url()?>auth/register">Regístrate</a></p>
            <p><a href="<?=base_url()?>">Volver al inicio</a></p>
        </div>
    </div>
</body>
</html>