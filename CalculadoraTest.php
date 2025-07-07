<?php
/**
 * CalculadoraTest.php
 * 
 * Suite de pruebas unitarias para la clase Calculadora.
 * Este archivo contiene todos los casos de prueba para verificar el correcto
 * funcionamiento de la lógica de negocio de la calculadora.
 * 
 * Casos de prueba incluidos:
 * - Operaciones aritméticas básicas (suma, resta, multiplicación, división)
 * - Manejo de errores (división por cero)
 * - Validación de operaciones no válidas
 * 
 * Para ejecutar las pruebas:
 * php CalculadoraTest.php
 * 
 * @author Tu Nombre
 * @version 1.0
 * @since 2025-07-07
 */

// Incluir la clase que vamos a probar
require_once 'Calculadora.php';

/**
 * Función auxiliar para comparar resultados esperados con resultados actuales.
 * 
 * Esta función implementa una versión simplificada de assertions para
 * verificar que los resultados de las operaciones sean los esperados.
 * 
 * @param mixed $expected Valor que se espera obtener
 * @param mixed $actual Valor que se obtuvo realmente
 * @param string $message Mensaje descriptivo de la prueba
 * @return void
 */
function assertEquals($expected, $actual, $message = '') {
    if ($expected !== $actual) {
        echo "❌ FALLO: $message. Esperado: $expected, Obtenido: $actual\n";
    } else {
        echo "✅ ÉXITO: $message\n";
    }
}

// === INICIO DE PRUEBAS ===
echo "=== EJECUTANDO PRUEBAS UNITARIAS DE CALCULADORA ===\n\n";

// === PRUEBAS DE OPERACIONES ARITMÉTICAS BÁSICAS ===
echo "📊 Probando operaciones aritméticas básicas:\n";

// Prueba de suma: 2 + 3 = 5
assertEquals(5, Calculadora::operar(2, 3, 'sumar'), 'Suma: 2 + 3 = 5');

// Prueba de resta: 2 - 3 = -1
assertEquals(-1, Calculadora::operar(2, 3, 'restar'), 'Resta: 2 - 3 = -1');

// Prueba de multiplicación: 2 * 3 = 6
assertEquals(6, Calculadora::operar(2, 3, 'multiplicar'), 'Multiplicación: 2 * 3 = 6');

// Prueba de división: 6 / 3 = 2
assertEquals(2, Calculadora::operar(6, 3, 'dividir'), 'División: 6 / 3 = 2');

echo "\n";

// === PRUEBAS DE MANEJO DE ERRORES ===
echo "⚠️  Probando manejo de errores:\n";

// Prueba: división por cero debe lanzar excepción
echo "Probando división por cero...\n";
try {
    Calculadora::operar(5, 0, 'dividir');
    echo "❌ FALLO: División por cero no lanzó excepción\n";
} catch (Exception $e) {
    echo "✅ ÉXITO: División por cero lanza excepción correctamente\n";
    echo "   Mensaje: " . $e->getMessage() . "\n";
}

// Prueba: operación no válida debe lanzar excepción
echo "Probando operación no válida...\n";
try {
    Calculadora::operar(2, 3, 'potencia');
    echo "❌ FALLO: Operación no válida no lanzó excepción\n";
} catch (Exception $e) {
    echo "✅ ÉXITO: Operación no válida lanza excepción correctamente\n";
    echo "   Mensaje: " . $e->getMessage() . "\n";
}

echo "\n=== PRUEBAS COMPLETADAS ===\n";
echo "📋 Resumen: Se han ejecutado todas las pruebas unitarias.\n";
echo "🔍 Revisa los resultados arriba para verificar que todo funcione correctamente.\n";
