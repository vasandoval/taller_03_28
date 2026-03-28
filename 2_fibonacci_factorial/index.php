<?php
require_once 'Calculadora.php';
$resultado = null;

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $n  = (int)$_POST['numero'];
    $op = $_POST['operacion'];
    $calc = new Calculadora($n);

    if ($op === 'fibonacci') {
        $serie = $calc->fibonacci();
        $resultado = implode(' → ', $serie);
    } else {
        $resultado = $calc->factorial();
    }
}
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Fibonacci / Factorial</title>
    <link rel="stylesheet" href="../css/ejercicios.css">
</head>
<body>
<div class="container">
    <h2>Fibonacci y Factorial</h2>
    <form method="POST">
        <label>Número:</label>
        <input type="number" name="numero" min="0"
               value="<?= $_POST['numero'] ?? '' ?>">

        <label>Operación:</label>
        <select name="operacion">
            <option value="fibonacci" <?= ($_POST['operacion'] ?? '') === 'fibonacci' ? 'selected' : '' ?>>
                Sucesión de Fibonacci
            </option>
            <option value="factorial" <?= ($_POST['operacion'] ?? '') === 'factorial' ? 'selected' : '' ?>>
                Factorial
            </option>
        </select>

        <input type="submit" value="Calcular">
    </form>

    <?php if ($resultado !== null): ?>
    <div class="resultado">
        <strong>Resultado:</strong><br><?= $resultado ?>
    </div>
    <?php endif; ?>

    <a class="back" href="../">← Volver al menú</a>
</div>
</body>
</html>