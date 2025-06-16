<?php
// operar.php
// Recibe datos del formulario por POST, ejecuta la operación y devuelve el resultado en formato JSON

require_once 'Calculadora.php'; // Incluye la lógica de la calculadora
header('Content-Type: application/json'); // Indica que la respuesta será JSON

// Obtiene los valores enviados por POST y los valida
$num1 = isset($_POST['num1']) ? floatval($_POST['num1']) : 0;
$num2 = isset($_POST['num2']) ? floatval($_POST['num2']) : 0;
$operacion = isset($_POST['operacion']) ? $_POST['operacion'] : 'sumar';

try {
    // Realiza la operación y devuelve el resultado
    $resultado = Calculadora::operar($num1, $num2, $operacion);
    echo json_encode(['resultado' => $resultado]);
} catch (Exception $e) {
    // Devuelve el mensaje de error si ocurre una excepción
    echo json_encode(['resultado' => $e->getMessage()]);
}
