<?php

namespace formacom\services;

class GeminiService {
    private $apiKey;    private $availableModels = [
        // Gemini 1.5 Flash - Modelo principal estable (gratis)
        'https://generativelanguage.googleapis.com/v1/models/gemini-1.5-flash:generateContent',
        // Gemini 1.5 Pro - Modelo más potente (gratis)
        'https://generativelanguage.googleapis.com/v1/models/gemini-1.5-pro:generateContent',
        // Gemini Pro - Modelo clásico (gratis)
        'https://generativelanguage.googleapis.com/v1/models/gemini-pro:generateContent',
        // Fallbacks con v1beta (por si algunos modelos nuevos están disponibles)
        'https://generativelanguage.googleapis.com/v1beta/models/gemini-1.5-flash:generateContent',
        'https://generativelanguage.googleapis.com/v1beta/models/gemini-1.5-pro:generateContent',
        'https://generativelanguage.googleapis.com/v1beta/models/gemini-pro:generateContent'
    ];
    private $apiUrl;

    public function __construct($apiKey) {
        $this->apiKey = $apiKey;
        $this->apiUrl = $this->availableModels[0]; // Empezar con el primero
    }    public function generateText($prompt) {
        $lastError = null;
        $modelsTested = [];
        
        // Intentar con cada modelo disponible
        foreach ($this->availableModels as $apiUrl) {
            try {
                $modelName = $this->extractModelName($apiUrl);
                $modelsTested[] = $modelName;
                $result = $this->makeRequest($apiUrl, $prompt);
                
                // Si llegamos aquí, el modelo funcionó
                error_log("Gemini: Modelo exitoso: " . $modelName);
                return $result;
                
            } catch (\Exception $e) {
                $lastError = $e;
                $modelName = $this->extractModelName($apiUrl);
                error_log("Gemini: Error con modelo " . $modelName . ": " . $e->getMessage());
                
                // Si es un error 404 o NOT_FOUND, intentar con el siguiente modelo
                if (strpos($e->getMessage(), '404') !== false || 
                    strpos($e->getMessage(), 'NOT_FOUND') !== false ||
                    strpos($e->getMessage(), 'not found') !== false) {
                    continue;
                }
                // Si es otro tipo de error crítico, lanzarlo inmediatamente
                if (strpos($e->getMessage(), 'API_KEY') !== false || 
                    strpos($e->getMessage(), 'PERMISSION') !== false) {
                    throw $e;
                }
                continue;
            }
        }
        
        // Si llegamos aquí, ningún modelo funcionó
        $testedModelsStr = implode(', ', $modelsTested);
        throw new \Exception('No se pudo conectar con ningún modelo de Gemini. Modelos probados: ' . $testedModelsStr . '. Último error: ' . $lastError->getMessage());
    }
    
    private function extractModelName($apiUrl) {
        if (preg_match('/models\/([^:]+)/', $apiUrl, $matches)) {
            return $matches[1];
        }
        return 'unknown';
    }
    
    private function makeRequest($apiUrl, $prompt) {
        $data = [
            'contents' => [
                [
                    'parts' => [
                        [
                            'text' => $prompt
                        ]
                    ]
                ]
            ],
            'generationConfig' => [
                'temperature' => 0.7,
                'maxOutputTokens' => 1000
            ]
        ];

        $ch = curl_init();
        
        curl_setopt($ch, CURLOPT_URL, $apiUrl . '?key=' . $this->apiKey);
        curl_setopt($ch, CURLOPT_POST, true);
        curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode($data));
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_HTTPHEADER, [
            'Content-Type: application/json',
        ]);
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
        curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, false);
        curl_setopt($ch, CURLOPT_TIMEOUT, 30);

        $response = curl_exec($ch);
        $httpCode = curl_getinfo($ch, CURLINFO_HTTP_CODE);
        
        if (curl_error($ch)) {
            $error = curl_error($ch);
            curl_close($ch);
            throw new \Exception('cURL Error: ' . $error);
        }
        
        curl_close($ch);

        if ($httpCode !== 200) {
            // Intentar decodificar el error para obtener más información
            $errorInfo = json_decode($response, true);
            if ($errorInfo && isset($errorInfo['error']['message'])) {
                throw new \Exception('API Error: ' . $errorInfo['error']['message'] . ' (Model: ' . $apiUrl . ')');
            } else {
                throw new \Exception('API Error: HTTP ' . $httpCode . ' - ' . $response . ' (Model: ' . $apiUrl . ')');
            }
        }

        $result = json_decode($response, true);
        
        if (isset($result['candidates'][0]['content']['parts'][0]['text'])) {
            return $result['candidates'][0]['content']['parts'][0]['text'];
        } else if (isset($result['error'])) {
            throw new \Exception('API Error: ' . $result['error']['message']);
        } else {
            throw new \Exception('Unexpected API response format: ' . json_encode($result));
        }
    }

    public function listAvailableModels() {
        $url = 'https://generativelanguage.googleapis.com/v1/models?key=' . $this->apiKey;
        
        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, $url);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
        curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, false);
        curl_setopt($ch, CURLOPT_TIMEOUT, 30);
        
        $response = curl_exec($ch);
        $httpCode = curl_getinfo($ch, CURLINFO_HTTP_CODE);
        curl_close($ch);
        
        if ($httpCode === 200) {
            return json_decode($response, true);
        } else {
            return null;
        }
    }
}
