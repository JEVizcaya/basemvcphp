<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard - Mi Proyecto MVC</title>
    <link rel="stylesheet" href="<?= base_url() ?>assets/css/basic.css">
    <style>        /* Layout del dashboard con chat lateral */
        .dashboard-layout {
            display: flex;
            gap: 2rem;
            max-width: 1400px;
            margin: 0 auto;
            padding: 0 20px;
            transition: all 0.3s ease;
        }
        
        .main-dashboard-content {
            flex: 1;
            transition: all 0.3s ease;
        }        .gemini-chat-container {
            width: 33.33vw;
            position: fixed;
            top: 120px;
            right: -35vw;
            height: 80vh;
            background: white;
            border-radius: 12px 0 0 12px;
            box-shadow: -4px 0 20px rgba(0,0,0,0.15);
            padding: 1.5rem;
            border: 1px solid #e9ecef;
            z-index: 1000;
            transition: right 0.3s ease;
            overflow: hidden;
            display: flex;
            flex-direction: column;
        }
        
        .gemini-chat-container.show {
            right: 0;
        }
        
        .chat-toggle-btn {
            position: fixed;
            top: 120px;
            right: 20px;
            background: var(--primary-color);
            color: white;
            border: none;
            border-radius: 50%;
            width: 60px;
            height: 60px;
            font-size: 1.5rem;
            cursor: pointer;
            box-shadow: 0 4px 15px rgba(0,0,0,0.2);
            z-index: 1001;
            transition: all 0.3s ease;
        }
        
        .chat-toggle-btn:hover {
            background: #2980b9;
            transform: scale(1.1);
        }        .chat-toggle-btn.chat-open {
            right: 33.33vw;
        }        .chat-messages {
            height: 420px;
            overflow-y: auto;
            border: 2px solid var(--border-color);
            border-radius: 8px;
            padding: 1rem;
            margin-bottom: 1rem;
            background-color: #f8f9fa;
            flex: 1;
        }
          .chat-header {
            text-align: center;
            margin-bottom: 1rem;
            padding-bottom: 0.5rem;
            border-bottom: 2px solid var(--border-color);
            flex-shrink: 0;
        }
        
        .chat-header h3 {
            color: var(--primary-color);
            margin: 0;
            font-size: 1.3rem;
        }        .chat-input-container {
            display: flex;
            flex-direction: column;
            gap: 0.8rem;
            margin-top: 0.5rem;
            padding: 1rem;
            background-color: #f8f9fa;
            border-radius: 8px;
            border: 1px solid var(--border-color);
            flex-shrink: 0;
        }        .chat-input {
            width: 100%;
            padding: 12px 16px;
            border: 2px solid var(--border-color);
            border-radius: 8px;
            font-size: 1rem;
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            color: #333;
            background-color: white;
            min-height: 60px;
            line-height: 1.4;
            transition: all 0.3s ease;
            resize: none;
            overflow-y: auto;
            box-sizing: border-box;
        }
        
        .chat-input:focus {
            outline: none;
            border-color: var(--primary-color);
            box-shadow: 0 0 0 3px rgba(52, 152, 219, 0.1);
            background-color: #fff;
            transform: translateY(-1px);
            box-shadow: 0 4px 15px rgba(52, 152, 219, 0.2);
        }
        
        .chat-input::placeholder {
            color: #999;
            font-style: italic;
        }        .chat-btn {
            padding: 12px 20px;
            background-color: var(--primary-color);
            color: white;
            border: none;
            border-radius: 8px;
            cursor: pointer;
            font-size: 1rem;
            font-weight: 600;
            transition: all 0.3s ease;
            height: 44px;
            white-space: nowrap;
            align-self: center;
            min-width: 100px;
        }
        
        .chat-btn:hover {
            background-color: #2980b9;
        }
        
        .chat-btn:disabled {
            background-color: #bdc3c7;
            cursor: not-allowed;
        }        .loading {
            display: none;
            text-align: center;
            color: var(--secondary-color);
            font-style: italic;
            padding: 1rem;
            background-color: #e3f2fd;
            border-radius: 8px;
            margin: 1rem 0;
            border-left: 4px solid var(--primary-color);
        }
        
        /* Mejorar los mensajes */
        .message {
            margin-bottom: 1rem;
            padding: 1rem;
            border-radius: 12px;
            box-shadow: 0 2px 8px rgba(0,0,0,0.1);
            animation: slideIn 0.3s ease-out;
        }
        
        @keyframes slideIn {
            from {
                opacity: 0;
                transform: translateY(10px);
            }
            to {
                opacity: 1;
                transform: translateY(0);
            }
        }
          .user-message {
            background: linear-gradient(135deg, var(--primary-color), #2980b9);
            color: white;
            text-align: right;
            margin-left: 15%;
            border-bottom-right-radius: 4px;
        }
          .ai-message {
            background-color: white;
            border: 1px solid var(--border-color);
            margin-right: 15%;
            border-bottom-left-radius: 4px;
        }        /* Responsive para el chat lateral */
        @media (max-width: 768px) {
            .gemini-chat-container {
                width: 100%;
                right: -100%;
                border-radius: 0;
                top: 80px;
                height: 80vh;
            }
            
            .chat-toggle-btn.chat-open {
                right: 20px;
            }
        }
    </style>
</head>
<body>
    <?php include __DIR__ . '/../partials/nav.php'; ?>
      <main class="main-content">
        <!-- Botón para mostrar/ocultar chat -->
        <button class="chat-toggle-btn" id="chatToggle" onclick="toggleChat()" title="Chat con Gemini">
            💬
        </button>
        
        <div class="dashboard-layout">
            <div class="main-dashboard-content">
                <div class="content-center">
                    <h1>Dashboard</h1>
                    <p>Bienvenido a tu dashboard personal</p>
                    <p>Este es tu espacio de trabajo, personalízalo según tus necesidades.</p>
                    
                </div>
            </div>
            
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
                </div>                <div class="chat-input-container">
                    <textarea class="chat-input" id="chatInput" placeholder="Escribe tu pregunta aquí..." maxlength="500" rows="3"></textarea>
                    <button class="chat-btn" id="sendBtn" onclick="sendMessage()">Enviar</button>
                </div>
            </div>
        </div>
    </main>

    <?php include __DIR__ . '/../partials/footer.php'; ?>
      <script>
        let isProcessing = false;
        const CHAT_STORAGE_KEY = 'gemini_chat_history';
        
        // Cargar historial del chat al inicializar
        function loadChatHistory() {
            const savedHistory = sessionStorage.getItem(CHAT_STORAGE_KEY);
            if (savedHistory) {
                const messages = JSON.parse(savedHistory);
                const messagesContainer = document.getElementById('chatMessages');
                
                // Limpiar mensajes existentes excepto el mensaje de bienvenida
                messagesContainer.innerHTML = '';
                
                // Agregar mensaje de bienvenida
                const welcomeDiv = document.createElement('div');
                welcomeDiv.className = 'message ai-message';
                welcomeDiv.innerHTML = '<strong>Gemini:</strong> ¡Hola! Soy Gemini, tu asistente de inteligencia artificial. ¿En qué puedo ayudarte hoy?';
                messagesContainer.appendChild(welcomeDiv);
                
                // Agregar mensajes guardados
                messages.forEach(msg => {
                    addMessageToDOM(msg.text, msg.type, false);
                });
                
                messagesContainer.scrollTop = messagesContainer.scrollHeight;
            }
        }
        
        // Guardar historial en sessionStorage
        function saveChatHistory() {
            const messagesContainer = document.getElementById('chatMessages');
            const messages = Array.from(messagesContainer.querySelectorAll('.message')).slice(1); // Excluir mensaje de bienvenida
            
            const chatHistory = messages.map(msg => {
                const isUser = msg.classList.contains('user-message');
                const text = msg.innerHTML.replace(/<strong>.*?<\/strong>\s*/, '').replace(/<br>/g, '\n');
                return {
                    text: text,
                    type: isUser ? 'user' : 'ai'
                };
            });
            
            sessionStorage.setItem(CHAT_STORAGE_KEY, JSON.stringify(chatHistory));
        }
        
        // Limpiar historial del chat (para logout)
        function clearChatHistory() {
            sessionStorage.removeItem(CHAT_STORAGE_KEY);
        }
        
        function sendMessage() {
            if (isProcessing) return;
            
            const input = document.getElementById('chatInput');
            const message = input.value.trim();
            
            if (!message) {
                alert('Por favor, escribe un mensaje');
                return;
            }
            
            isProcessing = true;
            document.getElementById('sendBtn').disabled = true;
            document.getElementById('loading').style.display = 'block';
              // Agregar mensaje del usuario
            addMessage(message, 'user');
            input.value = '';
            
            // Enviar petición a Gemini
            fetch('<?= base_url() ?>gemini/chat', {
                method: 'POST',
                headers: {
                    'Content-Type': 'application/x-www-form-urlencoded',
                },
                body: 'prompt=' + encodeURIComponent(message)
            })
            .then(response => response.json())
            .then(data => {
                document.getElementById('loading').style.display = 'none';
                
                if (data.success) {
                    addMessage(data.response, 'ai');
                } else {
                    addMessage('Error: ' + (data.error || 'Error desconocido'), 'ai');
                }
            })
            .catch(error => {
                document.getElementById('loading').style.display = 'none';
                addMessage('Error de conexión: ' + error.message, 'ai');
            })
            .finally(() => {
                isProcessing = false;
                document.getElementById('sendBtn').disabled = false;
            });
        }
        
        // Función para agregar mensaje y guardarlo en sessionStorage
        function addMessage(text, type) {
            addMessageToDOM(text, type, true);
            saveChatHistory();
        }
        
        // Función para agregar mensaje solo al DOM (sin guardar)
        function addMessageToDOM(text, type, scroll = true) {
            const messagesContainer = document.getElementById('chatMessages');
            const messageDiv = document.createElement('div');
            messageDiv.className = 'message ' + (type === 'user' ? 'user-message' : 'ai-message');
            
            const prefix = type === 'user' ? '<strong>Tú:</strong> ' : '<strong>Gemini:</strong> ';
            messageDiv.innerHTML = prefix + text.replace(/\n/g, '<br>');
            
            messagesContainer.appendChild(messageDiv);
            if (scroll) {
                messagesContainer.scrollTop = messagesContainer.scrollHeight;
            }
        }// Permitir enviar con Enter (Shift+Enter para nueva línea)
        document.getElementById('chatInput').addEventListener('keypress', function(e) {
            if (e.key === 'Enter' && !e.shiftKey && !isProcessing) {
                e.preventDefault();
                sendMessage();
            }
        });        // Función para mostrar/ocultar el chat
        function toggleChat() {
            const chatContainer = document.getElementById('chatContainer');
            const chatToggle = document.getElementById('chatToggle');
            
            if (chatContainer.classList.contains('show')) {
                // Ocultar chat
                chatContainer.classList.remove('show');
                chatToggle.classList.remove('chat-open');
                chatToggle.innerHTML = '💬';
                chatToggle.title = 'Abrir Chat con Gemini';
            } else {
                // Mostrar chat
                chatContainer.classList.add('show');
                chatToggle.classList.add('chat-open');
                chatToggle.innerHTML = '✖️';                chatToggle.title = 'Cerrar Chat';
            }
        }
        
        // Inicializar el chat al cargar la página
        document.addEventListener('DOMContentLoaded', function() {
            loadChatHistory();
        });
        
        // Exponer función para limpiar historial (será llamada en logout)
        window.clearChatHistory = clearChatHistory;
    </script>
</body>
</html>