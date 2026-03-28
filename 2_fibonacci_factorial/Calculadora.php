<?php
class Calculadora {
    private int $numero;

    public function __construct(int $numero) {
        $this->numero = $numero;
    }

    public function fibonacci(): array {
        $serie = [];
        $a = 0; $b = 1;
        for ($i = 0; $i <= $this->numero; $i++) {
            $serie[] = $a;
            [$a, $b] = [$b, $a + $b];
        }
        return $serie;
    }

    public function factorial(): string {
        if ($this->numero < 0) return "No definido para negativos";
        $resultado = 1;
        $serie = ['1'];
        for ($i = 2; $i <= $this->numero; $i++) {
            $resultado *= $i;
            $serie[] = $i;
        }
        return implode(' × ', $serie) . ' = ' . $resultado;
    }
}