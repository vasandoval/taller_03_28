<?php
class Calculadora {
    private int $numero;

    public function __construct(int $numero) {
        $this->numero = $numero;
    }

    public function esValido(): bool {
        return $this->numero >= 0;
    }

    public function fibonacci(): array {
        $serie = [];
        $a = 0;
        $b = 1;
        for ($i = 0; $i <= $this->numero; $i++) {
            $serie[] = $a;
            $temp = $a + $b;
            $a = $b;
            $b = $temp;
        }
        return $serie;
    }

    public function factorial(): string {
        if ($this->numero === 0) return "0! = 1";
        $resultado = 1;
        $pasos = [];
        for ($i = 1; $i <= $this->numero; $i++) {
            $resultado *= $i;
            $pasos[] = $i;
        }
        return implode(' × ', $pasos) . ' = ' . $resultado;
    }
}