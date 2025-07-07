<?php
/**
 * operar.php
 * 
 * Controlador API que procesa las solicitudes AJAX del frontend.
 * Este archivo actúa como puente entre la interfaz de usuario y la lógica de negocio.
 * 
 * Funcionalidades:
 * - Recibe datos POST del formulario de la calculadora
 * - Valida y sanitiza los datos de entrada
 * - Ejecuta la operación usando la clase Calculadora
 * - Retorna el resultado en formato JSON
 * - Maneja errores y excepciones
 * 
 * Flujo de procesamiento:
 * 1. Recibe datos POST (num1, num2, operacion)
 * 2. Valida y convierte datos a tipos apropiados
 * 3. Llama al método Calculadora::operar()
 * 4. Captura excepciones si ocurren
 * 5. Retorna respuesta JSON con resultado o error
 * 
 * @author Tu Nombre
 * @version 1.0
 * @since 2025-07-07
 */

// Incluir la clase que contiene la lógica de negocio
require_once 'Calculadora.php';

// Establecer el tipo de contenido como JSON para la respuesta
header('Content-Type: application/json');

// === PROCESAMIENTO DE DATOS DE ENTRADA ===

// Obtener y validar el primer número
// Si no se envía o es inválido, usar 0 como valor por defecto
$num1 = isset($_POST['num1']) ? floatval($_POST['num1']) : 0;

// Obtener y validar el segundo número
// Si no se envía o es inválido, usar 0 como valor por defecto
$num2 = isset($_POST['num2']) ? floatval($_POST['num2']) : 0;

// Obtener el tipo de operación
// Si no se envía, usar 'sumar' como operación por defecto
$operacion = isset($_POST['operacion']) ? $_POST['operacion'] : 'sumar';

// === EJECUCIÓN DE LA OPERACIÓN ===

try {
    // Intentar realizar la operación matemática
    $resultado = Calculadora::operar($num1, $num2, $operacion);
    
    // Si la operación es exitosa, retornar el resultado
    echo json_encode([
        'resultado' => $resultado,
        'status' => 'success'
    ]);
    
} catch (Exception $e) {
    // Si ocurre una excepción (división por cero, operación no válida, etc.)
    // Retornar el mensaje de error en formato JSON
    echo json_encode([
        'resultado' => $e->getMessage(),
        'status' => 'error'
    ]);
}
