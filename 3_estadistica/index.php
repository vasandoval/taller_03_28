<?php
require_once 'Estadistica.php';
$resultado = null;

if ($_SERVER['REQUEST_METHOD'] === 'POST' && !empty($_POST['numeros'])) {
    $raw     = explode(',', $_POST['numeros']);
    $numeros = array_map('floatval', $raw);
    $est     = new Estadistica($numeros);
    $resultado = [
        'promedio' => $est->promedio(),
        'media'    => $est->media(),
        'moda'     => $est->moda(),
    ];
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
<div class="container">
    <h2>Promedio, media y moda</h2>
    <form method="POST">
        <label>Ingresa los números separados por coma:</label>
        <input type="text" name="numeros"
               placeholder="Ej: 3, 7, 2, 7, 5"
               value="<?= htmlspecialchars($_POST['numeros'] ?? '') ?>">
        <input type="submit" value="Calcular">
    </form>

    <?php if ($resultado): ?>
    <div class="resultado">
        <strong>Promedio:</strong> <?= $resultado['promedio'] ?><br>
        <strong>Media (mediana):</strong> <?= $resultado['media'] ?><br>
        <strong>Moda:</strong> <?= $resultado['moda'] ?>
    </div>
    <?php endif; ?>

    <a class="back" href="../">← Volver al menú</a>
</div>
</body>
</html>