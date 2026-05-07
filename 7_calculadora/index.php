<?php
require_once 'Calculadora.php';
session_start();
if (!isset($_SESSION['historial'])) $_SESSION['historial'] = [];

$resultado = null;
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if (isset($_POST['limpiar'])) {
        $_SESSION['historial'] = [];
    } else {
        $a  = (float)$_POST['num1'];
        $b  = (float)$_POST['num2'];
        $op = $_POST['operacion'];
        $resultado = (new Calculadora())->calcular($a, $b, $op);
        $_SESSION['historial'][] = "$a $op $b = $resultado";
    }
}
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Calculadora</title>
    <link rel="stylesheet" href="../css/ejercicios.css">
</head>
<body>
<div class="caja">
    <div class="caja-header">
        <h2>Calculadora</h2>
    </div>
    <div class="caja-body">
        <form method="POST">
            <div class="fila">
                <div>
                    <label>Número 1:</label>
                    <input type="number" step="any" name="num1" value="<?= $_POST['num1'] ?? '' ?>">
                </div>
                <div>
                    <label>Operación:</label>
                    <select name="operacion">
                        <option value="+">Suma (+)</option>
                        <option value="-">Resta (-)</option>
                        <option value="*">Multiplicación (×)</option>
                        <option value="/">División (÷)</option>
                        <option value="%">Porcentaje (%)</option>
                    </select>
                </div>
                <div>
                    <label>Número 2:</label>
                    <input type="number" step="any" name="num2" value="<?= $_POST['num2'] ?? '' ?>">
                </div>
            </div>
            <input type="submit" value="Calcular">
        </form>

        <?php if ($resultado !== null): ?>
        <div class="resultado"><strong>Resultado:</strong> <?= $resultado ?></div>
        <?php endif; ?>

        <?php if (!empty($_SESSION['historial'])): ?>
        <div style="margin-top:1.5rem">
            <h3 style="font-size:0.88rem; font-weight:600; margin-bottom:8px">Historial</h3>
            <ul style="margin-left:16px; font-size:0.85rem; color:#555; line-height:2">
                <?php foreach ($_SESSION['historial'] as $entrada): ?>
                    <li><?= htmlspecialchars($entrada) ?></li>
                <?php endforeach; ?>
            </ul>
            <form method="POST" style="margin-top:10px">
                <button type="submit" name="limpiar" class="peligro">Borrar historial</button>
            </form>
        </div>
        <?php endif; ?>

        <a class="volver" href="../">← Volver al menú</a>
    </div>
</div>
</body>
</html>