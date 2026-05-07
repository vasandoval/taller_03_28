<?php
require_once 'ArbolBinario.php';
$arbolHTML = null;
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $pre = array_values(array_filter(array_map('trim', explode(',', strtoupper($_POST['preorden'])))));
    $ino = array_values(array_filter(array_map('trim', explode(',', strtoupper($_POST['inorden'])))));
    $arbol = new ArbolBinario();
    $arbol->raiz = $arbol->construirDesdePreInorden($pre, $ino);
    $arbolHTML = $arbol->dibujar($arbol->raiz);
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
<div class="caja">
    <div class="caja-header">
        <h2>Árbol binario</h2>
    </div>
    <div class="caja-body">
        <form method="POST">
            <label>Preorden (separado por comas):</label>
            <input type="text" name="preorden" placeholder="A, B, D, E, C"
                   value="<?= htmlspecialchars($_POST['preorden'] ?? '') ?>">
            <label>Inorden (separado por comas):</label>
            <input type="text" name="inorden" placeholder="D, B, E, A, C"
                   value="<?= htmlspecialchars($_POST['inorden'] ?? '') ?>">
            <input type="submit" value="Construir árbol">
        </form>

        <?php if ($arbolHTML): ?>
        <div class="resultado">
            <strong>Árbol generado:</strong>
            <div class="arbol"><?= $arbolHTML ?></div>
        </div>
        <?php endif; ?>

        <a class="volver" href="../">← Volver al menú</a>
    </div>
</div>
</body>
</html>