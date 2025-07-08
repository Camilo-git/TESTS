<?php
/**
 * Archivo: POO_Implementacion.php
 * Descripción: Implementación práctica de los principios de POO
 * Este archivo demuestra el uso de las clases creadas en POO_Principios.php
 * Autor: Sistema de Desarrollo
 * Fecha: 7 de Julio, 2025
 */

// Incluir el archivo con las clases base
require_once 'POO_Principios.php';

echo "=======================================================\n";
echo "    DEMOSTRACIÓN DE PRINCIPIOS DE POO EN PHP\n";
echo "=======================================================\n\n";

// ===== DEMOSTRACIÓN DE ENCAPSULACIÓN =====
echo "1. ENCAPSULACIÓN:\n";
echo "==================\n";

// Crear instancia de Auto
$miAuto = new Auto("Toyota", "Corolla", 2023, 25000, "Rojo", 4, "Automática");

// Acceso a variable pública (permitido)
echo "Acceso a variable pública - Color: " . $miAuto->color . "\n";

// Modificar variable pública directamente
$miAuto->color = "Azul";
echo "Color modificado directamente: " . $miAuto->color . "\n";

// Acceso a variables privadas a través de métodos getter (Encapsulación)
echo "Acceso a variables privadas con getters:\n";
echo "- Marca: " . $miAuto->getMarca() . "\n";
echo "- Modelo: " . $miAuto->getModelo() . "\n";
echo "- Año: " . $miAuto->getAño() . "\n";

// Modificar variables privadas a través de métodos setter (Encapsulación)
$miAuto->setMarca("Honda");
$miAuto->setModelo("Civic");
echo "Después de usar setters:\n";
echo "- Nueva marca: " . $miAuto->getMarca() . "\n";
echo "- Nuevo modelo: " . $miAuto->getModelo() . "\n";

// Intentar asignar un año inválido (validación en setter)
echo "Intentando asignar año inválido (1800):\n";
$miAuto->setAño(1800);

echo "\n";

// ===== DEMOSTRACIÓN DE HERENCIA =====
echo "2. HERENCIA:\n";
echo "============\n";

// Crear instancia de Motocicleta (hereda de Vehiculo)
$miMoto = new Motocicleta("Yamaha", "R1", 2024, 18000, "Negro", 1000, "Deportiva");

echo "Información de la motocicleta:\n";
$miMoto->mostrarInfo(); // Método heredado y sobrescrito

// Usar método específico de Motocicleta
$miMoto->hacerCaballito();

echo "\n";

// ===== DEMOSTRACIÓN DE POLIMORFISMO =====
echo "3. POLIMORFISMO:\n";
echo "================\n";

// Crear array con diferentes tipos de vehículos
$vehiculos = [
    new Auto("Ford", "Mustang", 2023, 35000, "Amarillo", 2, "Manual"),
    new Motocicleta("Harley-Davidson", "Sportster", 2023, 12000, "Cromado", 883, "Cruiser"),
    new AutoDeLujo("Mercedes-Benz", "S-Class", 2024, 80000, "Plata", 4, "Automática", true)
];

// Demostrar polimorfismo - mismo método, diferentes implementaciones
echo "Demostración de polimorfismo con método acelerar():\n";
foreach ($vehiculos as $index => $vehiculo) {
    echo "Vehículo " . ($index + 1) . ": ";
    $vehiculo->acelerar(); // Cada clase tiene su propia implementación
}

echo "\nDemostración de polimorfismo con método frenar():\n";
foreach ($vehiculos as $index => $vehiculo) {
    echo "Vehículo " . ($index + 1) . ": ";
    $vehiculo->frenar(); // Método sobrescrito en cada clase
}

echo "\n";

// ===== DEMOSTRACIÓN DE ABSTRACCIÓN =====
echo "4. ABSTRACCIÓN:\n";
echo "===============\n";

// Crear instancia de AutoDeLujo que implementa la interface Mantenible
$autoLujo = new AutoDeLujo("BMW", "X7", 2024, 90000, "Blanco", 4, "Automática", false);

echo "Información del auto de lujo:\n";
$autoLujo->mostrarInfo();

// Implementar método de la interface
echo "\nRealizando mantenimiento:\n";
$autoLujo->realizarMantenimiento();

// Activar GPS y realizar mantenimiento nuevamente
$autoLujo->activarGPS();
$autoLujo->realizarMantenimiento();

echo "\n";

// ===== DEMOSTRACIÓN DE VARIABLES ESTÁTICAS =====
echo "5. VARIABLES ESTÁTICAS:\n";
echo "=======================\n";

// Crear múltiples instancias para demostrar variables estáticas
$contador1 = new ContadorVehiculos();
$contador2 = new ContadorVehiculos();
$contador3 = new ContadorVehiculos();

echo "ID del contador 1: " . $contador1->getId() . "\n";
echo "ID del contador 2: " . $contador2->getId() . "\n";
echo "ID del contador 3: " . $contador3->getId() . "\n";
echo "Total de vehículos creados: " . ContadorVehiculos::getContador() . "\n";

echo "\n";

// ===== DEMOSTRACIÓN DE ACCESO A DIFERENTES TIPOS DE VARIABLES =====
echo "6. TIPOS DE VARIABLES Y ACCESO:\n";
echo "===============================\n";

// Crear nuevo auto para demostrar acceso a variables
$autoDemo = new Auto("Nissan", "Sentra", 2023, 22000, "Gris", 4, "CVT");

echo "Acceso a variable PÚBLICA (color):\n";
echo "- Valor actual: " . $autoDemo->color . "\n";
echo "- Modificando directamente...\n";
$autoDemo->color = "Verde";
echo "- Nuevo valor: " . $autoDemo->color . "\n";

echo "\nAcceso a variable PRIVADA (marca) - Solo a través de métodos:\n";
echo "- Valor actual (getter): " . $autoDemo->getMarca() . "\n";
echo "- Modificando con setter...\n";
$autoDemo->setMarca("Hyundai");
echo "- Nuevo valor (getter): " . $autoDemo->getMarca() . "\n";

echo "\nAcceso a variable PROTEGIDA (precio) - Solo desde clases hijas:\n";
echo "- El precio se puede acceder desde métodos de la clase Auto\n";
echo "- Pero no directamente desde fuera de la clase\n";

echo "\n";

// ===== DEMOSTRACIÓN DE VALIDACIONES EN SETTERS =====
echo "7. VALIDACIONES EN SETTERS:\n";
echo "===========================\n";

$autoValidacion = new Auto("Kia", "Rio", 2023, 18000, "Blanco", 4, "Manual");

echo "Probando validaciones:\n";
echo "- Asignando número de puertas válido (2):\n";
$autoValidacion->setNumeroPuertas(2);
echo "  Puertas: " . $autoValidacion->getNumeroPuertas() . "\n";

echo "- Asignando número de puertas inválido (10):\n";
$autoValidacion->setNumeroPuertas(10);
echo "  Puertas: " . $autoValidacion->getNumeroPuertas() . " (sin cambios)\n";

echo "\n";

// ===== RESUMEN DE PRINCIPIOS APLICADOS =====
echo "8. RESUMEN DE PRINCIPIOS APLICADOS:\n";
echo "===================================\n";

echo "✓ ENCAPSULACIÓN:\n";
echo "  - Variables privadas: marca, modelo, año, numeroPuertas, cilindrada\n";
echo "  - Variables protegidas: precio\n";
echo "  - Variables públicas: color, tipoTransmision, tipoMoto\n";
echo "  - Métodos getter/setter para acceso controlado\n";

echo "\n✓ HERENCIA:\n";
echo "  - Clase Auto hereda de Vehiculo\n";
echo "  - Clase Motocicleta hereda de Vehiculo\n";
echo "  - Clase AutoDeLujo hereda de Auto\n";
echo "  - Uso de parent:: para acceder a métodos del padre\n";

echo "\n✓ POLIMORFISMO:\n";
echo "  - Método acelerar() implementado diferente en cada clase\n";
echo "  - Método frenar() sobrescrito en cada clase\n";
echo "  - Método mostrarInfo() personalizado en cada clase\n";

echo "\n✓ ABSTRACCIÓN:\n";
echo "  - Clase abstracta Vehiculo con método abstracto acelerar()\n";
echo "  - Interface Mantenible con método realizarMantenimiento()\n";
echo "  - Implementación obligatoria en clases concretas\n";

echo "\n=======================================================\n";
echo "    DEMOSTRACIÓN COMPLETADA EXITOSAMENTE\n";
echo "=======================================================\n";
?>
