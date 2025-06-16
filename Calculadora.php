<?php
// Calculadora.php
// Clase que implementa operaciones aritméticas básicas para una calculadora

class Calculadora {
    /**
     * Realiza una operación aritmética entre dos números.
     * @param float $num1 Primer número
     * @param float $num2 Segundo número
     * @param string $operacion Operación a realizar: 'sumar', 'restar', 'multiplicar', 'dividir'
     * @return float Resultado de la operación
     * @throws Exception Si la operación no es válida o si hay división por cero
     */
    public static function operar($num1, $num2, $operacion) {
        switch ($operacion) {
            case 'sumar': // Suma
                return $num1 + $num2;
            case 'restar': // Resta
                return $num1 - $num2;
            case 'multiplicar': // Multiplicación
                return $num1 * $num2;
            case 'dividir': // División
                if ($num2 == 0) {
                    throw new Exception('No se puede dividir por cero');
                }
                return $num1 / $num2;
            default:
                throw new Exception('Operación no válida');
        }
    }
}
