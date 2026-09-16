<?php 
session_start();

$_SESSION["datos"] ??=[];

$TIPO_DE_EQUIPO = ["Laptop", "Desktop", "Telefono", "Reloj"];
$MARCAS = ["SAMSUMG", "HP", "ASUS", "APPLE"];

//Empezando con el arreglo asociativo

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <div class="container-form">
        <form action="" method="post">
            <label for="">Nombre:</label>
            <input type="text" name="nombre">
            <label for="">Correo</label>
            <input type="email" name="correo">
            <select name="tipo_dispositivo" id="">
                <?php foreach($TIPO_DE_EQUIPO as $value): ?>
                <option value="<?= $value ?>"><?= $value ?></option>
                <?php endforeach ?>
            </select>
            <select name="marca_seleccionada" id="">
                <?php foreach($MARCAS as $value): ?>
                    <option value="<?= $value ?>"><?= $value ?></option>
                <?php endforeach; ?>
            </select>
            <label for="">Descipción del problema:</label>
            <input type="text" name="descripcion">            
        </form>
    </div>
</body>
</html>