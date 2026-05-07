<?php
require_once 'Conversor.php';
$resultado = null;
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $resultado = (new Conversor((int)$_POST['numero']))->aBinario();
}
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Binario</title>
    <link rel="stylesheet" href="../css/ejercicios.css">
</head>
<body>
<div class="caja">
    <div class="caja-header">
        <h2>Conversor a binario</h2>
    </div>
    <div class="caja-body">
        <form method="POST">
            <label>Número entero:</label>
            <input type="number" name="numero" min="0" value="<?= $_POST['numero'] ?? '' ?>">
            <input type="submit" value="Convertir">
        </form>

        <?php if ($resultado !== null): ?>
        <div class="resultado">
            <strong><?= $_POST['numero'] ?></strong> en binario es: <strong><?= $resultado ?></strong>
        </div>
        <?php endif; ?>

        <a class="volver" href="../">← Volver al menú</a>
    </div>
</div>
</body>
</html>