<?php
class Acronimo {
    private string $frase;

    public function __construct(string $frase) {
        $this->frase = $frase;
    }

    public function convertir(): string {
        // Reemplaza guiones por espacios
        $frase = str_replace('-', ' ', $this->frase);
        // Elimina signos de puntuación excepto espacios y letras
        $frase = preg_replace('/[^a-zA-Z\s]/', '', $frase);
        // Separa por espacios
        $palabras = explode(' ', trim($frase));
        // Toma la primera letra de cada palabra
        $acronimo = '';
        foreach ($palabras as $palabra) {
            if (!empty($palabra)) {
                $acronimo .= strtoupper($palabra[0]);
            }
        }
        return $acronimo;
    }
}