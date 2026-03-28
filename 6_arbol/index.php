<?php
require_once 'ArbolBinario.php';
$arbolHTML = null;

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $pre = array_values(array_filter(
        array_map('trim', explode(',', strtoupper($_POST['preorden'])))
    ));
    $ino = array_values(array_filter(
        array_map('trim', explode(',', strtoupper($_POST['inorden'])))
    ));

    $arbol       = new ArbolBinario();
    $arbol->raiz = $arbol->construirDesdePreInorden($pre, $ino);
    $arbolHTML   = $arbol->dibujar($arbol->raiz);
}
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Árbol Binario</title>
    <link rel="stylesheet" href="../css/ejercicios.css">
</head>
<body>
<div class="container">
    <h2>Árbol binario</h2>
    <p style="font-size:0.85rem; color:#888; margin-bottom:1rem;">
        Ingresa los nodos separados por coma. Ej: <code>A, B, D, E, C</code>
    </p>
    <form method="POST">
        <label>Preorden:</label>
        <input type="text" name="preorden"
               placeholder="A, B, D, E, C"
               value="<?= htmlspecialchars($_POST['preorden'] ?? '') ?>">

        <label>Inorden:</label>
        <input type="text" name="inorden"
               placeholder="D, B, E, A, C"
               value="<?= htmlspecialchars($_POST['inorden'] ?? '') ?>">

        <input type="submit" value="Construir árbol">
    </form>

    <?php if ($arbolHTML): ?>
    <div class="resultado">
        <strong>Árbol generado:</strong>
        <div class="tree" style="margin-top:14px"><?= $arbolHTML ?></div>
    </div>
    <?php endif; ?>

    <a class="back" href="../">← Volver al menú</a>
</div>
</body>
</html>