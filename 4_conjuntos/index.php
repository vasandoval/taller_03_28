<?php
require_once 'Conjunto.php';
$resultado = null;

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $a = array_map('intval', explode(',', $_POST['conjunto_a']));
    $b = array_map('intval', explode(',', $_POST['conjunto_b']));
    $c = new Conjunto($a, $b);
    $resultado = [
        'union' => $c->union(),
        'inter' => $c->interseccion(),
        'a_b'   => $c->diferencia_AB(),
        'b_a'   => $c->diferencia_BA(),
    ];
}

function fmt(array $arr): string {
    return '{' . implode(', ', $arr) . '}';
}
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Conjuntos</title>
    <link rel="stylesheet" href="../css/ejercicios.css">
</head>
<body>
<div class="container">
    <h2>Operaciones de conjuntos</h2>
    <form method="POST">
        <label>Conjunto A (separado por comas):</label>
        <input type="text" name="conjunto_a"
               placeholder="Ej: 1, 2, 3, 4"
               value="<?= htmlspecialchars($_POST['conjunto_a'] ?? '') ?>">

        <label>Conjunto B (separado por comas):</label>
        <input type="text" name="conjunto_b"
               placeholder="Ej: 3, 4, 5, 6"
               value="<?= htmlspecialchars($_POST['conjunto_b'] ?? '') ?>">

        <input type="submit" value="Calcular">
    </form>

    <?php if ($resultado): ?>
    <div class="resultado">
        <strong>Unión (A ∪ B):</strong> <?= fmt($resultado['union']) ?><br>
        <strong>Intersección (A ∩ B):</strong> <?= fmt($resultado['inter']) ?><br>
        <strong>Diferencia (A - B):</strong> <?= fmt($resultado['a_b']) ?><br>
        <strong>Diferencia (B - A):</strong> <?= fmt($resultado['b_a']) ?>
    </div>
    <?php endif; ?>

    <a class="back" href="../">← Volver al menú</a>
</div>
</body>
</html>