<?php
class Conjunto {
    private array $a;
    private array $b;

    public function __construct(array $a, array $b) {
        $this->a = array_unique($a);
        $this->b = array_unique($b);
    }

    public function union(): array {
        return array_unique(array_merge($this->a, $this->b));
    }

    public function interseccion(): array {
        return array_intersect($this->a, $this->b);
    }

    public function diferencia_AB(): array {
        return array_diff($this->a, $this->b);
    }

    public function diferencia_BA(): array {
        return array_diff($this->b, $this->a);
    }
}