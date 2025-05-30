<!-- Chat con Google Gemini - Componente Reutilizable -->
<!-- Botón para mostrar/ocultar chat -->
<button class="chat-toggle-btn" id="chatToggle" onclick="toggleChat()" title="Chat con Gemini">
    💬
</button>

<!-- Chat con Google Gemini - Panel lateral -->
<div class="gemini-chat-container" id="chatContainer">
    <div class="chat-header">
        <h3>🤖 Chat con Gemini AI</h3>
    </div>                
    
    <div class="chat-messages" id="chatMessages">
        <div class="message ai-message">
            <strong>Gemini:</strong> ¡Hola! Soy Gemini, tu asistente de inteligencia artificial. ¿En qué puedo ayudarte hoy?
        </div>
    </div>
    
    <div class="loading" id="loading">
        Generando respuesta...
    </div>
    
    <div class="chat-input-container">
        <textarea class="chat-input" id="chatInput" placeholder="Escribe tu pregunta aquí..." maxlength="500" rows="3"></textarea>
        <button class="chat-btn" id="sendBtn" onclick="sendMessage()">Enviar</button>
    </div>
</div>
