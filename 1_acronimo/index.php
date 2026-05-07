<?php
require_once 'Acronimo.php';
$resultado = null;
if ($_SERVER['REQUEST_METHOD'] === 'POST' && !empty($_POST['frase'])) {
    $resultado = (new Acronimo(trim($_POST['frase'])))->convertir();
}
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Acrónimo</title>
    <link rel="stylesheet" href="../css/ejercicios.css">
</head>
<body>
<div class="caja">
    <div class="caja-header">
        <h2>Convertidor de acrónimos</h2>
    </div>
    <div class="caja-body">
        <form method="POST">
            <label>Frase:</label>
            <input type="text" name="frase" placeholder="Ej: As Soon As Possible"
                   value="<?= htmlspecialchars($_POST['frase'] ?? '') ?>">
            <input type="submit" value="Convertir">
        </form>

        <?php if ($resultado !== null): ?>
        <div class="resultado">
            <strong>Frase:</strong> <?= htmlspecialchars($_POST['frase']) ?><br>
            <strong>Acrónimo:</strong> <?= $resultado ?>
        </div>
        <?php endif; ?>

        <a class="volver" href="../">← Volver al menú</a>
    </div>
</div>
</body>
</html>