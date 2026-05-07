<?php
require_once 'Estadistica.php';
$resultado = null;
if ($_SERVER['REQUEST_METHOD'] === 'POST' && !empty($_POST['numeros'])) {
    $numeros = array_map('floatval', explode(',', $_POST['numeros']));
    $est = new Estadistica($numeros);
    $resultado = ['promedio' => $est->promedio(), 'media' => $est->media(), 'moda' => $est->moda()];
}
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Estadística</title>
    <link rel="stylesheet" href="../css/ejercicios.css">
</head>
<body>
<div class="caja">
    <div class="caja-header">
        <h2>Promedio, media y moda</h2>
    </div>
    <div class="caja-body">
        <form method="POST">
            <label>Números separados por coma:</label>
            <input type="text" name="numeros" placeholder="Ej: 3, 7, 2, 7, 5"
                   value="<?= htmlspecialchars($_POST['numeros'] ?? '') ?>">
            <input type="submit" value="Calcular">
        </form>

        <?php if ($resultado): ?>
        <div class="resultado">
            <strong>Promedio:</strong> <?= $resultado['promedio'] ?><br>
            <strong>Mediana:</strong> <?= $resultado['media'] ?><br>
            <strong>Moda:</strong> <?= $resultado['moda'] ?>
        </div>
        <?php endif; ?>

        <a class="volver" href="../">← Volver al menú</a>
    </div>
</div>
</body>
</html>