<?php
/**
 * Calculadora.php
 * 
 * Clase que implementa operaciones aritméticas básicas para una calculadora web.
 * Esta clase contiene la lógica de negocio principal de la aplicación.
 * 
 * Características:
 * - Implementa 4 operaciones básicas: suma, resta, multiplicación y división
 * - Maneja errores como división por cero
 * - Valida operaciones no permitidas
 * - Utiliza métodos estáticos para facilitar el uso
 * 
 * @author Tu Nombre
 * @version 1.0
 * @since 2025-07-07
 */

/**
 * Clase Calculadora
 * 
 * Proporciona métodos estáticos para realizar operaciones aritméticas básicas.
 * Esta clase es el núcleo de la lógica de negocio de la calculadora.
 */
class Calculadora {
    /**
     * Realiza una operación aritmética entre dos números.
     * 
     * Este método es el punto de entrada principal para todas las operaciones
     * matemáticas de la calculadora. Recibe dos números y una operación,
     * y devuelve el resultado correspondiente.
     * 
     * Operaciones soportadas:
     * - 'sumar': Suma dos números
     * - 'restar': Resta el segundo del primero
     * - 'multiplicar': Multiplica dos números
     * - 'dividir': Divide el primer número por el segundo
     * 
     * @param float $num1 Primer número (dividendo en división)
     * @param float $num2 Segundo número (divisor en división)
     * @param string $operacion Tipo de operación a realizar
     * @return float Resultado de la operación aritmética
     * @throws Exception Si la operación no es válida
     * @throws Exception Si hay división por cero
     * 
     * @example
     * $resultado = Calculadora::operar(10, 5, 'sumar'); // Retorna 15
     * $resultado = Calculadora::operar(10, 0, 'dividir'); // Lanza excepción
     */
    public static function operar($num1, $num2, $operacion) {
        // Switch para determinar qué operación realizar
        switch ($operacion) {
            case 'sumar': // Operación de suma
                return $num1 + $num2;
                
            case 'restar': // Operación de resta
                return $num1 - $num2;
                
            case 'multiplicar': // Operación de multiplicación
                return $num1 * $num2;
                
            case 'dividir': // Operación de división con validación
                // Verificar división por cero antes de operar
                if ($num2 == 0) {
                    throw new Exception('No se puede dividir por cero');
                }
                return $num1 / $num2;
                
            default:
                // Manejar operaciones no válidas
                throw new Exception('Operación no válida');
        }
    }
}
