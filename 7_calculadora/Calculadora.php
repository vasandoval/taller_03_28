<?php
class Calculadora {
    public function calcular(float $a, float $b, string $op): float|string {
        return match($op) {
            '+'  => $a + $b,
            '-'  => $a - $b,
            '*'  => $a * $b,
            '/'  => $b != 0 ? $a / $b : 'Error: División por cero',
            '%'  => $a * $b / 100,
            default => 'Operación no válida'
        };
    }
}