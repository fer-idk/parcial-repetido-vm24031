<?php 
session_start();

$_SESSION["datos"] ??=[];

$TIPO_DE_EQUIPO = ["Laptop", "Desktop", "Telefono", "Reloj"];
$MARCAS = ["SAMSUMG", "HP", "ASUS", "APPLE"];

//Empezando con el arreglo de los distintos diagnosticos (EL TIEMPO ESTIMADO SERA TOMADO EN HORAS)
$SERVICIOS_DISPONIBLES = [
    "limpieza" => ["codigo" => "1", "nombre" => "Limpieza interna", "categoria" => "hardware", "precio" => 15.00, "tiempo" => 1.5],
    "sistema" => ["codigo" => "2", "nombre" => "Instalación de sistema operativo", "categoria" => "sotware", "precio" => 10.00, "tiempo" => 1.0],
    "malware" => ["codigo" => "3", "nombre" => "Eliminacion de malware", "categoria" => "sotware", "precio" => 10.00, "tiempo" => 1.5],
    "respaldo" => ["codigo" => "4", "nombre" => "Respaldo de datos", "categoria" => "sotware", "precio" => 20.00, "tiempo" => 2.5],
    "componentes" => ["codigo" => "5", "nombre" => "Cambio de componentes", "categoria" => "hardware", "precio" => 25.00, "tiempo" => 0.5],
    "mantenimiento" => ["codigo" => "6", "nombre" => "Mantenimiento preventivo", "categoria" => "hardware", "precio" => 25.00, "tiempo" => 1.0],
];

$errores = [];
if($_SERVER["REQUEST_METHOD"]){
    if(empty($_POST["nombre"]) || empty($_POST["correo"]) || empty($_POST["descripcion"])){
        $errores[] = "Por favor rellene todos los parametros";
    }
    if(empty($errores)){

        $precio = $SERVICIOS_DISPONIBLES[$_POST["servicio"]]["precio"];
        $_SESSION["datos"] = [
            "nombre" => $_POST["nombre"],
            "correo" => $_POST["correo"],
            "tipo" => $_POST["tipo_dispositivo"],
            "marca" => $_POST["marca_seleccionada"],
            "descripcion" => $_POST["descripcion"],
            "servicio" => $_POST["servicio"],
            ""
        ];
    }
}

function calcularDescuento(){

}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <h1>Taller Fernando Melendez</h1>
    <div class="container-form">
        <form action="" method="post">
            <h2>Ingrese la información del equipo:</h2><p>(Todos los campos son obligatorios)</p>
            <label for="">Nombre:</label>
            <input type="text" name="nombre">
            <label for="">Correo</label>
            <input type="email" name="correo">
            <label for="">Tipo de dispositivo:</label>
            <select name="tipo_dispositivo" id="">
                <?php foreach($TIPO_DE_EQUIPO as $value): ?>
                <option value="<?= $value ?>"><?= $value ?></option>
                <?php endforeach ?>
            </select>
            <label for="">Seleccione marca:</label>
            <select name="marca_seleccionada" id="">
                <?php foreach($MARCAS as $value): ?>
                    <option value="<?= $value ?>"><?= $value ?></option>
                <?php endforeach; ?>
            </select>
            <label for="">Descipción del problema:</label>
            <input type="text" name="descripcion">     
            <label for="">Servicios disponibles:</label>       
            <select name="servicio" id="">
                <?php foreach($SERVICIOS_DISPONIBLES as $key => $value): ?>
                    <option value="<?= $key ?>"><?= $value["nombre"] ?></option>
                <?php endforeach; ?>
            </select>
            <input type="submit">
        </form>
    </div>
    <div class="container-info">
        <h2>Comprobante de solicitud:</h2>
        <?php if($_SERVER["REQUEST_METHOD"] === "POST"): ?>
            <label for="">Nombre: <?= $_POST["nombre"] ?></label>
            <label for="">Correo: <?= $_POST["correo"] ?></label>
            <label for="">Tipo de dispositivo seleccionado: <?= $_POST["tipo_dispositivo"] ?></label>
            <label for="">Tipo de marca: <?=  $_POST["marca_seleccionada"]?></label>
            <label for="">descripción del problema: <?=  $_POST["descripcion"]?></label>
            <label for="">Servicio seleccionado: <?=  $_POST["servicio"]?></label>

        <?php endif; ?>
    </div>
</body>
</html>