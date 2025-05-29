<nav class="main-nav">
    <div class="nav-container">
        <div class="nav-brand">
            <a href="<?= base_url() ?>">Mi Proyecto MVC</a>
        </div>        
        
        <!-- Botón hamburguesa para móvil -->
        <button class="nav-toggle" onclick="toggleNavMenu()" aria-label="Toggle navigation">
            <span></span>
            <span></span>
            <span></span>
        </button>        <div class="nav-links" id="navLinks">
            <?php if (isset($_SESSION['user_id'])): ?>
                <a href="<?= base_url() ?>dashboard" class="nav-link nav-link-primary">Dashboard</a>
                <a href="<?= base_url() ?>dashboard/profile" class="nav-link nav-link-secondary">👤 Mi Perfil</a>
                <a href="#" class="nav-link nav-link-logout" onclick="handleLogout(event)">Cerrar Sesión</a>
            <?php else: ?>
                <a href="<?= base_url() ?>auth/login" class="nav-link nav-link-primary">Iniciar Sesión</a>
                <a href="<?= base_url() ?>auth/register" class="nav-link nav-link-secondary">Registrarse</a>
            <?php endif; ?>
        </div>
    </div>
</nav>

<script>
function handleLogout(event) {
    event.preventDefault();
    
    // Limpiar historial del chat si la función existe
    if (typeof window.clearChatHistory === 'function') {
        window.clearChatHistory();
    }
    
    // Limpiar cualquier otro dato de sessionStorage relacionado con el chat
    sessionStorage.removeItem('gemini_chat_history');
    
    // Redireccionar al logout
    window.location.href = '<?= base_url() ?>auth/logout';
}

function toggleNavMenu() {
    const navLinks = document.getElementById('navLinks');
    const navToggle = document.querySelector('.nav-toggle');
    
    navLinks.classList.toggle('nav-links-open');
    navToggle.classList.toggle('nav-toggle-open');
}

// Cerrar menú al hacer clic en un enlace (móvil)
document.addEventListener('DOMContentLoaded', function() {
    const navLinks = document.querySelectorAll('.nav-link');
    navLinks.forEach(link => {
        link.addEventListener('click', function() {
            const navLinksContainer = document.getElementById('navLinks');
            const navToggle = document.querySelector('.nav-toggle');
            navLinksContainer.classList.remove('nav-links-open');
            navToggle.classList.remove('nav-toggle-open');
        });
    });
});
</script>