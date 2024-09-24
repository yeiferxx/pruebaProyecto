<?php

include("conexion.php");

if (isset($_POST['send'])) {
    // Verifica si los campos del formulario están completos
    if (
        strlen($_POST['name']) >= 1 &&
        strlen($_POST['raza']) >= 1 &&
        strlen($_POST['sexo']) >= 1 &&
        strlen($_POST['padres']) >= 1 &&
        strlen($_POST['birthdate']) >= 1 &&
        strlen($_POST['foodType']) >= 1
    ) {
        // Elimina espacios en blanco de las entradas del usuario
        $name = trim($_POST['name']);
        $raza = trim($_POST['raza']);
        $sexo = trim($_POST['sexo']);
        $padres = trim($_POST['padres']);
        $birthdate = trim($_POST['birthdate']);
        $foodType = trim($_POST['foodType']);
        
        // Prepara la declaración SQL para prevenir inyecciones SQL
        $stmt = $conex->prepare("INSERT INTO datosbovinos (nombreBovino, raza, sexo, padres, fechaNacimiento, tipoAlimentacion) VALUES (?, ?, ?, ?, ?, ?)");
        
        if ($stmt) {
            // Asigna los parámetros
            $stmt->bind_param("ssssss", $name, $raza, $sexo, $padres, $birthdate, $foodType);
            

            // Ejecuta la consulta
            if ($stmt->execute()) {
                // Mensaje de éxito
                echo "Datos guardados exitosamente.";
            } else {
                // Mensaje de error
                echo "Error al guardar los datos: " . $stmt->error;
            }

            // Cierra la declaración
            $stmt->close();
        } else {
            echo "Error al preparar la consulta: " . $conex->error;
        }
    } else {
        echo "Por favor, completa todos los campos.";
    }
}

?>