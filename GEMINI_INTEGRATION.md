# Integración con Google Gemini AI

## ✨ Funcionalidades Implementadas

Se ha integrado Google Gemini AI en el dashboard de tu aplicación MVC, permitiendo a los usuarios tener conversaciones inteligentes con la IA directamente desde el panel de control.

## 🚀 Características

- **Chat en tiempo real** con Google Gemini
- **Interfaz moderna** y responsiva
- **Gestión de errores** robusta
- **Configuración fácil** de API key
- **Indicadores visuales** de carga
- **Historial de conversación** en la sesión

## ⚙️ Configuración

### 1. Obtener API Key de Google Gemini

1. Ve a [Google AI Studio](https://makersuite.google.com/app/apikey)
2. Inicia sesión con tu cuenta de Google
3. Crea una nueva API key (es gratuita)
4. Copia la API key generada

### 2. Configurar la API Key

1. Abre el archivo `config/config.php`
2. Encuentra la línea:
   ```php
   define("GEMINI_API_KEY", "TU_API_KEY_AQUI");
   ```
3. Reemplaza `TU_API_KEY_AQUI` con tu API key real:
   ```php
   define("GEMINI_API_KEY", "tu_api_key_real_aqui");
   ```

## 📁 Archivos Modificados/Creados

### Nuevos Archivos:
- `app/services/GeminiService.php` - Servicio para comunicarse con la API de Gemini
- `app/controllers/GeminiController.php` - Controlador para manejar las peticiones de chat

### Archivos Modificados:
- `config/config.php` - Agregada configuración de API key
- `index.php` - Agregada carga del archivo de configuración
- `app/views/dashboard/home.php` - Integrada interfaz de chat
- `assets/css/basic.css` - Arreglados estilos de hover en botones

## 🎯 Cómo Usar

1. Inicia sesión en tu aplicación
2. Ve al Dashboard
3. Si no has configurado tu API key, verás instrucciones para hacerlo
4. Una vez configurada, podrás:
   - Escribir preguntas en el campo de texto
   - Presionar "Enviar" o usar Enter
   - Ver las respuestas de Gemini en tiempo real
   - Mantener una conversación fluida

## 🔧 Funcionalidades Técnicas

### GeminiService.php
- Maneja las peticiones HTTP a la API de Google Gemini
- Gestiona errores de conexión y respuesta
- Formato JSON de peticiones y respuestas

### GeminiController.php
- Endpoint: `/gemini/chat` (POST)
- Valida entrada del usuario
- Retorna respuestas en formato JSON
- Manejo de errores

### Interfaz de Usuario
- Chat en tiempo real con scroll automático
- Diferenciación visual entre mensajes de usuario y IA
- Indicador de carga durante procesamiento
- Diseño responsivo y moderno

## 💡 Cuota Gratuita de Google Gemini

Google Gemini ofrece una cuota gratuita generosa que incluye:
- Miles de peticiones por mes
- Perfecto para desarrollo y testing
- Sin necesidad de tarjeta de crédito para empezar

## 🛠️ Solución de Problemas

### Error: "API Key no configurada"
- Verifica que hayas reemplazado `TU_API_KEY_AQUI` con tu API key real
- Asegúrate de que no haya espacios extra en la API key

### Error: "SSL certificate problem"
- Esto es normal en entornos de desarrollo local
- El código ya incluye configuración para omitir verificación SSL en desarrollo

### Error: "Unexpected API response format"
- Verifica que tu API key sea válida
- Comprueba tu conexión a internet

## 📝 Próximas Mejoras Posibles

- Persistencia de historial de chat en base de datos
- Diferentes modelos de Gemini (Pro, Flash, etc.)
- Subida de imágenes para análisis multimodal
- Configuraciones de personalidad del asistente
- Límites de tokens por usuario

---

¡Tu integración con Google Gemini está lista para usar! 🎉
