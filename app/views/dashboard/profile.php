<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">    <title>Mi Perfil - Mi Proyecto MVC</title>
    <link rel="stylesheet" href="<?= base_url() ?>assets/css/basic.css">
    <style>
        /* Layout específico del perfil */
        .profile-layout {
            display: flex;
            gap: 2rem;
            max-width: 1000px;
            margin: 0 auto;
            padding: 0 20px;
        }
        
        .profile-content {
            flex: 1;
        }
        
        .profile-card {
            background: white;
            padding: 2rem;
            border-radius: 12px;
            box-shadow: 0 4px 15px rgba(0,0,0,0.1);
            margin-bottom: 2rem;
        }
        
        .profile-header {
            text-align: center;
            margin-bottom: 2rem;
        }
        
        .profile-avatar {
            width: 100px;
            height: 100px;
            background: var(--primary-color);
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            color: white;
            font-size: 2.5rem;
            margin: 0 auto 1rem auto;
        }
        
        .profile-info {
            display: grid;
            grid-template-columns: 1fr 1fr;
            gap: 1rem;
            margin-bottom: 2rem;
        }
        
        .info-item {
            background: #f8f9fa;
            padding: 1rem;
            border-radius: 8px;
            border-left: 4px solid var(--primary-color);
        }
        
        .info-label {
            font-weight: bold;
            color: var(--primary-color);
            margin-bottom: 0.5rem;
        }
        
        .info-value {
            color: #666;
        }        .profile-actions {
            display: flex;
            gap: 1rem;
            justify-content: center;
            flex-wrap: wrap;
            margin-top: 1rem;
        }
        
        @media (max-width: 768px) {
            .profile-info {
                grid-template-columns: 1fr;
            }
            
            .profile-actions {
                flex-direction: column;
                align-items: center;
            }
        }
    </style>
</head>
<body>
    <?php include __DIR__ . '/../partials/nav.php'; ?>
    
    <main class="main-content">
        <div class="profile-layout">
            <div class="profile-content">
                <div class="content-center">
                    <h1>Mi Perfil</h1>
                    <p>Gestiona tu información personal y configuración de cuenta</p>
                    
                    <?php if (isset($data['success'])): ?>
                        <div style="background: #d4edda; color: #155724; padding: 1rem; border-radius: 8px; margin-bottom: 1.5rem; border-left: 4px solid #28a745;">
                            <strong>✅ ¡Éxito!</strong><br>
                            <?= htmlspecialchars($data['success']) ?>
                        </div>
                    <?php endif; ?>
                    
                    <?php if (isset($data['error'])): ?>
                        <div style="background: #f8d7da; color: #721c24; padding: 1rem; border-radius: 8px; margin-bottom: 1.5rem; border-left: 4px solid #dc3545;">
                            <strong>❌ Error:</strong><br>
                            <?= htmlspecialchars($data['error']) ?>
                        </div>
                    <?php endif; ?>
                    
                    <div class="profile-card">
                        <div class="profile-header">
                            <div class="profile-avatar">
                                <?= strtoupper(substr($data['user']->first_name ?? 'U', 0, 1)) ?>
                            </div>
                            <h2><?= htmlspecialchars($data['user']->first_name ?? '') ?> <?= htmlspecialchars($data['user']->last_name ?? '') ?></h2>
                            <p style="color: #666;">@<?= htmlspecialchars($data['user']->username ?? '') ?></p>
                        </div>
                        
                        <div class="profile-info">
                            <div class="info-item">
                                <div class="info-label">👤 Nombre de Usuario</div>
                                <div class="info-value"><?= htmlspecialchars($data['user']->username ?? 'No definido') ?></div>
                            </div>
                            
                            <div class="info-item">
                                <div class="info-label">📧 Email</div>
                                <div class="info-value"><?= htmlspecialchars($data['user']->email ?? 'No definido') ?></div>
                            </div>
                            
                            <div class="info-item">
                                <div class="info-label">👤 Nombre</div>
                                <div class="info-value"><?= htmlspecialchars($data['user']->first_name ?? 'No definido') ?></div>
                            </div>
                            
                            <div class="info-item">
                                <div class="info-label">👤 Apellido</div>
                                <div class="info-value"><?= htmlspecialchars($data['user']->last_name ?? 'No definido') ?></div>
                            </div>
                            
                            <div class="info-item">
                                <div class="info-label">🆔 ID de Usuario</div>
                                <div class="info-value">#<?= htmlspecialchars($data['user']->user_id ?? 'N/A') ?></div>
                            </div>                            <div class="info-item">
                                <div class="info-label">📅 Miembro desde</div>
                                <div class="info-value">
                                    <?php 
                                    if (method_exists($data['user'], 'getFormattedCreatedAt')) {
                                        echo $data['user']->getFormattedCreatedAt();
                                    } elseif (isset($data['user']->created_at) && $data['user']->created_at) {
                                        try {
                                            $date = new DateTime($data['user']->created_at);
                                            $now = new DateTime();
                                            $interval = $now->diff($date);
                                            
                                            echo $date->format('d/m/Y');
                                            
                                            if ($interval->y > 0) {
                                                echo " (hace " . $interval->y . " año" . ($interval->y > 1 ? "s" : "") . ")";
                                            } elseif ($interval->m > 0) {
                                                echo " (hace " . $interval->m . " mes" . ($interval->m > 1 ? "es" : "") . ")";
                                            } elseif ($interval->d > 0) {
                                                echo " (hace " . $interval->d . " día" . ($interval->d > 1 ? "s" : "") . ")";
                                            } else {
                                                echo " (hoy)";
                                            }
                                        } catch (Exception $e) {
                                            echo "Fecha no válida";
                                        }
                                    } else {
                                        echo "Fecha no disponible";
                                    }
                                    ?>
                                </div>
                            </div>
                        </div>                        <div class="profile-actions">
                            <a href="<?= base_url() ?>dashboard/edit-profile" class="btn btn-primary">✏️ Editar Perfil</a>
                            <a href="<?= base_url() ?>dashboard/change-password" class="btn btn-secondary">🔒 Cambiar Contraseña</a>
                            <a href="<?= base_url() ?>dashboard" class="btn btn-outline">⬅️ Volver al Dashboard</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </main>    <?php include __DIR__ . '/../partials/footer.php'; ?>
</body>
</html>
