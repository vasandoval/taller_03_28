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

        $tieneHijos = $nodo->izquierda || $nodo->derecha;

        $html = '<div style="display:inline-flex; flex-direction:column; align-items:center; margin:0 6px;">';

        // Nodo
        $html .= '<div style="width:36px; height:36px; background:#f97316; color:white; border-radius:50%;
                    display:flex; align-items:center; justify-content:center;
                    font-weight:600; font-size:0.85rem;">'
               . htmlspecialchars($nodo->valor)
               . '</div>';

        if ($tieneHijos) {
            // Línea vertical hacia abajo desde el nodo
            $html .= '<div style="width:2px; height:14px; background:#f97316;"></div>';

            // Línea horizontal que conecta hijos
            $izq = $nodo->izquierda;
            $der = $nodo->derecha;

            if ($izq && $der) {
                $html .= '<div style="display:flex; align-items:flex-start; position:relative;">';
                // Rama izquierda
                $html .= '<div style="display:inline-flex; flex-direction:column; align-items:center;">';
                $html .= '<div style="width:2px; height:14px; background:#f97316; margin-left:auto;"></div>';
                $html .= $this->dibujar($izq);
                $html .= '</div>';
                // Línea horizontal entre ramas
                $html .= '<div style="width:40px; height:2px; background:#f97316; margin-top:0; align-self:flex-start; margin-top:0;"></div>';
                // Rama derecha
                $html .= '<div style="display:inline-flex; flex-direction:column; align-items:center;">';
                $html .= '<div style="width:2px; height:14px; background:#f97316; margin-right:auto;"></div>';
                $html .= $this->dibujar($der);
                $html .= '</div>';
                $html .= '</div>';
            } elseif ($izq) {
                $html .= '<div style="display:inline-flex; flex-direction:column; align-items:center;">';
                $html .= $this->dibujar($izq);
                $html .= '</div>';
            } elseif ($der) {
                $html .= '<div style="display:inline-flex; flex-direction:column; align-items:center;">';
                $html .= $this->dibujar($der);
                $html .= '</div>';
            }
        }

        $html .= '</div>';
        return $html;
    }
}