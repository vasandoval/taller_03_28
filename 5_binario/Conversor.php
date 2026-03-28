<?php
class Conversor {
    private int $numero;

    public function __construct(int $numero) {
        $this->numero = $numero;
    }

    public function aBinario(): string {
        return decbin($this->numero);
    }
}