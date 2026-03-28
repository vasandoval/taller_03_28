<?php
class Estadistica {
    private array $numeros;

    public function __construct(array $numeros) {
        $this->numeros = $numeros;
    }

    public function promedio(): float {
        return array_sum($this->numeros) / count($this->numeros);
    }

    public function media(): float {
        $sorted = $this->numeros;
        sort($sorted);
        $n = count($sorted);
        $medio = (int)($n / 2);
        return ($n % 2 === 0)
            ? ($sorted[$medio - 1] + $sorted[$medio]) / 2
            : $sorted[$medio];
    }

    public function moda(): string {
        // Convertimos a string para que array_count_values funcione con decimales
        $convertidos = array_map('strval', $this->numeros);
        $frecuencias = array_count_values($convertidos);
        $maxFreq = max($frecuencias);
        $modas = array_keys($frecuencias, $maxFreq);
        return implode(', ', $modas) . " (frecuencia: $maxFreq)";
    }
}