<?php
// CalculadoraTest.php
// Archivo de pruebas unitarias para la clase Calculadora
// Ejecuta este archivo con PHP para verificar el correcto funcionamiento de la lógica de la calculadora

require_once 'Calculadora.php'; // Incluye la clase Calculadora

/**
 * Compara dos valores y muestra un mensaje según si son iguales o no.
 * @param mixed $expected Valor esperado
 * @param mixed $actual Valor actual
 * @param string $message Mensaje descriptivo de la prueba
 */
function assertEquals($expected, $actual, $message = '') {
    if ($expected !== $actual) {
        echo "Fallo: $message. Esperado: $expected, Actual: $actual\n";
    } else {
        echo "OK: $message\n";
    }
}

// Pruebas básicas de operaciones aritméticas
assertEquals(5, Calculadora::operar(2, 3, 'sumar'), '2 + 3'); // Suma
assertEquals(-1, Calculadora::operar(2, 3, 'restar'), '2 - 3'); // Resta
assertEquals(6, Calculadora::operar(2, 3, 'multiplicar'), '2 * 3'); // Multiplicación
assertEquals(2, Calculadora::operar(6, 3, 'dividir'), '6 / 3'); // División

// Prueba: división por cero debe lanzar excepción
try {
    Calculadora::operar(2, 0, 'dividir');
    echo "Fallo: División por cero no lanzó excepción\n";
} catch (Exception $e) {
    echo "OK: División por cero lanza excepción\n";
}

// Prueba: operación no válida debe lanzar excepción
try {
    Calculadora::operar(2, 3, 'potencia');
    echo "Fallo: Operación no válida no lanzó excepción\n";
} catch (Exception $e) {
    echo "OK: Operación no válida lanza excepción\n";
}
