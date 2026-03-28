<?php
class Nodo {
    public string $valor;
    public ?Nodo $izquierda = null;
    public ?Nodo $derecha   = null;

    public function __construct(string $valor) {
        $this->valor = $valor;
    }
}

class ArbolBinario {
    public ?Nodo $raiz = null;

    public function construirDesdePreInorden(array $pre, array $ino): ?Nodo {
        if (empty($pre) || empty($ino)) return null;

        $raizVal = $pre[0];
        $nodo    = new Nodo($raizVal);
        $idx     = array_search($raizVal, $ino);

        $inoIzq = array_slice($ino, 0, $idx);
        $inoDer = array_slice($ino, $idx + 1);
        $preIzq = array_slice($pre, 1, count($inoIzq));
        $preDer = array_slice($pre, 1 + count($inoIzq));

        $nodo->izquierda = $this->construirDesdePreInorden($preIzq, $inoIzq);
        $nodo->derecha   = $this->construirDesdePreInorden($preDer, $inoDer);

        return $nodo;
    }

    public function dibujar(?Nodo $nodo): string {
        if ($nodo === null) return '';
        $html  = '<ul>';
        $html .= '<li><span>' . htmlspecialchars($nodo->valor) . '</span>';
        if ($nodo->izquierda || $nodo->derecha) {
            if ($nodo->izquierda) $html .= $this->dibujar($nodo->izquierda);
            if ($nodo->derecha)   $html .= $this->dibujar($nodo->derecha);
        }
        $html .= '</li></ul>';
        return $html;
    }
}