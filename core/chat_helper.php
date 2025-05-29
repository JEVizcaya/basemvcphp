<?php
/**
 * Helper para incluir el chat de Gemini en cualquier página
 * Incluye automáticamente CSS, HTML y JavaScript necesarios
 */

function includeGeminiChat($includeCSS = true, $includeJS = true) {
    // CSS del chat (solo si se solicita)
    if ($includeCSS) {
        echo '<link rel="stylesheet" href="' . base_url() . 'assets/css/chat.css">' . "\n";
    }
    
    // HTML del chat
    include __DIR__ . '/../app/views/partials/chat.php';
    
    // JavaScript del chat (solo si se solicita)
    if ($includeJS) {
        echo '<script src="' . base_url() . 'assets/js/chat.js"></script>' . "\n";
    }
}

/**
 * Función para incluir solo el CSS del chat en el <head>
 */
function includeChatCSS() {
    if (function_exists('base_url')) {
        echo '<link rel="stylesheet" href="' . base_url() . 'assets/css/chat.css">';
    } else {
        echo '<link rel="stylesheet" href="/basemvcphp/assets/css/chat.css">';
    }
}

/**
 * Función para incluir solo el HTML del chat
 */
function includeChatHTML() {
    include __DIR__ . '/../app/views/partials/chat.php';
}

/**
 * Función para incluir solo el JavaScript del chat
 */
function includeChatJS() {
    if (function_exists('base_url')) {
        echo '<script src="' . base_url() . 'assets/js/chat.js"></script>';
    } else {
        echo '<script src="/basemvcphp/assets/js/chat.js"></script>';
    }
}
?>
