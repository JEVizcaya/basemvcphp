<?php

namespace formacom\controllers;

use formacom\core\Controller;
use formacom\services\GeminiService;

class GeminiController extends Controller {

    public function index(...$params) {
        // Método index requerido por la clase base
        header('Content-Type: application/json');
        echo json_encode(['error' => 'Endpoint no encontrado']);
    }    public function chat() {
        // Limpiar cualquier salida previa
        ob_clean();
        
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $prompt = $_POST['prompt'] ?? '';
            
            if (empty($prompt)) {
                header('Content-Type: application/json');
                echo json_encode(['error' => 'El prompt no puede estar vacío']);
                return;
            }

            try {
                $geminiService = new GeminiService(GEMINI_API_KEY);
                $response = $geminiService->generateText($prompt);
                
                header('Content-Type: application/json');
                echo json_encode([
                    'success' => true,
                    'response' => $response
                ]);
            } catch (\Exception $e) {
                header('Content-Type: application/json');
                echo json_encode([
                    'error' => 'Error al procesar la petición: ' . $e->getMessage()
                ]);
            }
            return;
        }
          // Si no es POST, mostrar error
        header('Content-Type: application/json');
        echo json_encode(['error' => 'Método no permitido']);
    }

    public function models() {
        // Limpiar cualquier salida previa
        ob_clean();
        
        try {
            $geminiService = new GeminiService(GEMINI_API_KEY);
            $models = $geminiService->listAvailableModels();
            
            header('Content-Type: application/json');
            if ($models) {
                echo json_encode([
                    'success' => true,
                    'models' => $models
                ]);
            } else {
                echo json_encode([
                    'error' => 'No se pudieron obtener los modelos disponibles'
                ]);
            }
        } catch (\Exception $e) {
            header('Content-Type: application/json');
            echo json_encode([
                'error' => 'Error al obtener modelos: ' . $e->getMessage()
            ]);
        }
    }
}
