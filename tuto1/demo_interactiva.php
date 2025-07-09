<?php
/**
 * Archivo: demo_interactiva.php
 * Descripción: Demostración interactiva de clases normales vs abstractas
 * Propósito: Ejecutar ejemplos prácticos y mostrar diferencias en tiempo real
 * Autor: Sistema de Desarrollo
 * Fecha: 9 de Julio, 2025
 */

// Incluir archivos de fundamentos y ejemplos
require_once 'Clases_Normal_vs_Abstracta_Fundamentos.php';
require_once 'Clases_Normal_vs_Abstracta_Ejemplos.php';

echo "\n\n=======================================================\n";
echo "         DEMOSTRACIÓN INTERACTIVA COMPLETA\n";
echo "    CLASES NORMALES VS CLASES ABSTRACTAS EN PHP\n";
echo "=======================================================\n\n";

// ===== SECCIÓN 1: DEMOSTRACIÓN DE CLASES NORMALES =====
echo "🔹 DEMOSTRACIÓN 1: CLASES NORMALES (Instanciación Directa)\n";
echo "=" . str_repeat("=", 58) . "\n\n";

// Crear instancias de clase normal
echo "Creando vehículos con clase normal:\n";
$vehiculo1 = new Vehiculo("Honda", "Civic", 2023, "Negro");
$vehiculo2 = new Vehiculo("Ford", "Focus", 2022, "Blanco");

echo "✅ Vehículo 1: " . $vehiculo1->obtenerInfo() . "\n";
echo "✅ Vehículo 2: " . $vehiculo2->obtenerInfo() . "\n";

echo "\nProbando funcionalidades:\n";
echo "• " . $vehiculo1->arrancar() . "\n";
echo "• " . $vehiculo1->acelerar() . "\n";
echo "• " . $vehiculo1->frenar() . "\n";
echo "• " . $vehiculo1->cambiarColor("Rojo") . "\n";
echo "• Nuevo estado: " . $vehiculo1->obtenerInfo() . "\n";

echo "\n" . str_repeat("-", 60) . "\n\n";

// ===== SECCIÓN 2: DEMOSTRACIÓN DE CLASES ABSTRACTAS =====
echo "🔹 DEMOSTRACIÓN 2: CLASES ABSTRACTAS (Herencia Obligatoria)\n";
echo "=" . str_repeat("=", 63) . "\n\n";

// Intentar instanciar clase abstracta (esto causará error)
echo "❌ Intentando instanciar clase abstracta directamente:\n";
echo "// \$vehiculoAbstracto = new VehiculoAbstracto('Toyota', 'Prius', 2023, 'Azul', 'Híbrido');\n";
echo "RESULTADO: Fatal error - Cannot instantiate abstract class VehiculoAbstracto\n\n";

// Crear instancias de clases hijas
echo "✅ Creando instancias de clases hijas (implementación obligatoria):\n";
$auto1 = new Auto("Toyota", "Camry", 2023, "Plata", "Gasolina", 4, "Automática");
$motocicleta1 = new Motocicleta("Yamaha", "YZF-R1", 2023, "Azul", "Gasolina", 1000, "Deportiva");

echo "🚗 Auto: " . $auto1->obtenerInfo() . "\n";
echo "🏍️ Motocicleta: " . $motocicleta1->obtenerInfo() . "\n";

echo "\nProbando métodos implementados (polimorfismo):\n";
echo "• Auto arrancando: " . $auto1->arrancar() . "\n";
echo "• Auto acelerando: " . $auto1->acelerar() . "\n";
echo "• Auto frenando: " . $auto1->frenar() . "\n";
echo "• Consumo Auto (100km): " . $auto1->calcularConsumo(100) . "\n";

echo "\n• Moto arrancando: " . $motocicleta1->arrancar() . "\n";
echo "• Moto acelerando: " . $motocicleta1->acelerar() . "\n";
echo "• Moto frenando: " . $motocicleta1->frenar() . "\n";
echo "• Consumo Moto (100km): " . $motocicleta1->calcularConsumo(100) . "\n";

echo "\n" . str_repeat("-", 60) . "\n\n";

// ===== SECCIÓN 3: POLIMORFISMO EN ACCIÓN =====
echo "🔹 DEMOSTRACIÓN 3: POLIMORFISMO CON CLASES ABSTRACTAS\n";
echo "=" . str_repeat("=", 52) . "\n\n";

// Crear array de vehículos (polimorfismo)
$vehiculos = [
    new Auto("BMW", "X3", 2023, "Negro", "Gasolina", 4, "Automática"),
    new Motocicleta("Harley-Davidson", "Sportster", 2023, "Rojo", "Gasolina", 883, "Cruiser"),
    new Auto("Tesla", "Model 3", 2023, "Blanco", "Eléctrico", 4, "Automática")
];

echo "Procesando flota de vehículos (polimorfismo):\n";
$totalConsumo = 0;
$distancia = 150; // km

foreach ($vehiculos as $index => $vehiculo) {
    echo "\n" . str_repeat("•", 40) . "\n";
    echo "VEHÍCULO " . ($index + 1) . ":\n";
    echo "Info: " . $vehiculo->obtenerInfo() . "\n";
    echo "Proceso: " . $vehiculo->arrancar() . "\n";
    echo "Acción: " . $vehiculo->acelerar() . "\n";
    echo "Consumo: " . $vehiculo->calcularConsumo($distancia) . "\n";
    echo "Mantenimiento: " . $vehiculo->realizarMantenimiento() . "\n";
    echo "Final: " . $vehiculo->frenar() . "\n";
}

echo "\n" . str_repeat("-", 60) . "\n\n";

// ===== SECCIÓN 4: COMPARACIÓN LADO A LADO =====
echo "🔹 DEMOSTRACIÓN 4: COMPARACIÓN LADO A LADO\n";
echo "=" . str_repeat("=", 41) . "\n\n";

// Crear tabla comparativa
echo "CARACTERÍSTICA           | CLASE NORMAL    | CLASE ABSTRACTA\n";
echo str_repeat("-", 25) . "|" . str_repeat("-", 17) . "|" . str_repeat("-", 16) . "\n";
echo "Instanciación directa    | ✅ Sí           | ❌ No\n";
echo "Herencia                 | ✅ Opcional     | ✅ Obligatoria\n";
echo "Métodos abstractos       | ❌ No           | ✅ Sí\n";
echo "Métodos concretos        | ✅ Sí           | ✅ Sí\n";
echo "Polimorfismo             | ✅ Opcional     | ✅ Forzado\n";
echo "Uso como plantilla       | ✅ Opcional     | ✅ Principal\n";
echo "Flexibilidad             | ✅ Alta         | ✅ Estructurada\n";

echo "\n" . str_repeat("-", 60) . "\n\n";

// ===== SECCIÓN 5: CASOS DE USO RECOMENDADOS =====
echo "🔹 DEMOSTRACIÓN 5: CASOS DE USO RECOMENDADOS\n";
echo "=" . str_repeat("=", 44) . "\n\n";

echo "📌 USAR CLASES NORMALES CUANDO:\n";
echo "  • Necesitas instanciar la clase directamente\n";
echo "  • La funcionalidad es completa y autónoma\n";
echo "  • No requieres implementación obligatoria\n";
echo "  • Ejemplo: Calculadora, Usuario, Producto\n\n";

echo "📌 USAR CLASES ABSTRACTAS CUANDO:\n";
echo "  • Quieres definir una plantilla común\n";
echo "  • Necesitas métodos obligatorios específicos\n";
echo "  • Quieres forzar polimorfismo\n";
echo "  • Ejemplo: Vehículo, Empleado, Figura Geométrica\n\n";

// ===== SECCIÓN 6: EJEMPLO PRÁCTICO CON EMPLEADOS =====
echo "🔹 DEMOSTRACIÓN 6: EJEMPLO PRÁCTICO - SISTEMA DE EMPLEADOS\n";
echo "=" . str_repeat("=", 58) . "\n\n";

// Crear empleados usando clase normal
echo "Empleados con clase normal:\n";
$empleado1 = new Empleado("Juan Pérez", 50000, "Sistemas");
$empleado2 = new Empleado("Ana García", 45000, "Marketing");

echo "✅ " . $empleado1->obtenerInfo() . "\n";
echo "✅ " . $empleado2->obtenerInfo() . "\n";
echo "• Actividad: " . $empleado1->trabajar() . "\n";
echo "• Salario calculado: $" . $empleado1->calcularSalario() . "\n";

echo "\nEmpleados especializados con clase abstracta:\n";
$gerente = new Gerente("Carlos López", 80000, "Administración", 5, 20000);
$desarrollador = new Desarrollador("María Rodríguez", 70000, "Senior", ["PHP", "JavaScript", "Python"]);

echo "✅ " . $gerente->obtenerInfo() . "\n";
echo "✅ " . $desarrollador->obtenerInfo() . "\n";
echo "• Gerente trabajando: " . $gerente->trabajar() . "\n";
echo "• Desarrollador trabajando: " . $desarrollador->trabajar() . "\n";
echo "• Salario Gerente: $" . $gerente->calcularSalario() . "\n";
echo "• Salario Desarrollador: $" . $desarrollador->calcularSalario() . "\n";

echo "\n" . str_repeat("-", 60) . "\n\n";

// ===== SECCIÓN 7: RESUMEN DE DIFERENCIAS =====
echo "🔹 RESUMEN FINAL: DIFERENCIAS CLAVE\n";
echo "=" . str_repeat("=", 35) . "\n\n";

echo "🎯 CLASE NORMAL (class):\n";
echo "  ✅ Se puede instanciar directamente\n";
echo "  ✅ Todos los métodos tienen implementación\n";
echo "  ✅ Herencia opcional\n";
echo "  ✅ Más flexibilidad\n";
echo "  ✅ Ideal para objetos funcionales completos\n\n";

echo "🎯 CLASE ABSTRACTA (abstract class):\n";
echo "  ❌ NO se puede instanciar directamente\n";
echo "  ✅ Puede tener métodos abstractos (sin implementación)\n";
echo "  ✅ Herencia obligatoria\n";
echo "  ✅ Fuerza implementación específica\n";
echo "  ✅ Ideal para plantillas y polimorfismo\n\n";

echo "🔍 DECISIÓN CLAVE:\n";
echo "  • ¿Necesitas instanciar directamente? → Clase Normal\n";
echo "  • ¿Quieres forzar implementación? → Clase Abstracta\n";
echo "  • ¿Necesitas plantilla común? → Clase Abstracta\n";
echo "  • ¿Funcionalidad completa? → Clase Normal\n\n";

echo "=======================================================\n";
echo "              ✅ DEMOSTRACIÓN COMPLETADA\n";
echo "=======================================================\n\n";

echo "📚 ARCHIVOS RELACIONADOS:\n";
echo "• Clases_Normal_vs_Abstracta_Fundamentos.php - Conceptos básicos\n";
echo "• Clases_Normal_vs_Abstracta_Ejemplos.php - Casos prácticos\n";
echo "• Clases_Normal_vs_Abstracta_DOCUMENTACION.md - Documentación completa\n";
echo "• Clases_Normal_vs_Abstracta_DIAGRAMA.md - Diagramas de flujo\n";
echo "• demo_interactiva.php - Esta demostración\n\n";

echo "🚀 PARA EJECUTAR:\n";
echo "  php demo_interactiva.php\n\n";

?>
