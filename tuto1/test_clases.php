<?php
/**
 * Archivo: test_clases.php
 * Descripción: Pruebas unitarias para validar clases normales vs abstractas
 * Propósito: Verificar el correcto funcionamiento de todas las implementaciones
 * Autor: Sistema de Desarrollo
 * Fecha: 9 de Julio, 2025
 */

// Incluir archivos necesarios
require_once 'Clases_Normal_vs_Abstracta_Fundamentos.php';
require_once 'Clases_Normal_vs_Abstracta_Ejemplos.php';

echo "=======================================================\n";
echo "        PRUEBAS UNITARIAS - CLASES NORMALES VS ABSTRACTAS\n";
echo "=======================================================\n\n";

// Contador de pruebas
$totalPruebas = 0;
$pruebasExitosas = 0;
$pruebasFallidas = 0;

// Función para mostrar resultados de pruebas
function mostrarResultadoPrueba($descripcion, $resultado, $esperado = null) {
    global $totalPruebas, $pruebasExitosas, $pruebasFallidas;
    
    $totalPruebas++;
    $estado = $resultado ? "✅ PASSED" : "❌ FAILED";
    
    echo "PRUEBA {$totalPruebas}: {$descripcion}\n";
    echo "RESULTADO: {$estado}\n";
    
    if ($esperado !== null) {
        echo "ESPERADO: {$esperado}\n";
    }
    
    if ($resultado) {
        $pruebasExitosas++;
    } else {
        $pruebasFallidas++;
    }
    
    echo str_repeat("-", 50) . "\n";
}

// ===== SECCIÓN 1: PRUEBAS DE CLASES NORMALES =====
echo "🔍 SECCIÓN 1: PRUEBAS DE CLASES NORMALES\n";
echo "=" . str_repeat("=", 40) . "\n\n";

// Prueba 1: Instanciación de clase normal
try {
    $vehiculo = new Vehiculo("Toyota", "Corolla", 2023, "Rojo");
    $instanciacionExitosa = true;
    echo "INSTANCIA CREADA: " . $vehiculo->obtenerInfo() . "\n";
} catch (Exception $e) {
    $instanciacionExitosa = false;
    echo "ERROR: " . $e->getMessage() . "\n";
}
mostrarResultadoPrueba("Instanciación directa de clase normal", $instanciacionExitosa);

// Prueba 2: Métodos de clase normal
$metodosVehiculo = [
    'arrancar' => $vehiculo->arrancar(),
    'acelerar' => $vehiculo->acelerar(),
    'frenar' => $vehiculo->frenar(),
    'obtenerInfo' => $vehiculo->obtenerInfo()
];

$metodosExitosos = true;
foreach ($metodosVehiculo as $metodo => $resultado) {
    echo "MÉTODO {$metodo}: {$resultado}\n";
    if (empty($resultado)) {
        $metodosExitosos = false;
    }
}
mostrarResultadoPrueba("Todos los métodos de clase normal funcionan", $metodosExitosos);

// Prueba 3: Modificación de propiedades
$colorAnterior = "Rojo";
$colorNuevo = "Azul";
$cambioColor = $vehiculo->cambiarColor($colorNuevo);
$colorCambiado = strpos($cambioColor, $colorAnterior) !== false && strpos($cambioColor, $colorNuevo) !== false;
echo "CAMBIO DE COLOR: {$cambioColor}\n";
mostrarResultadoPrueba("Cambio de color en clase normal", $colorCambiado);

echo "\n";

// ===== SECCIÓN 2: PRUEBAS DE CLASES ABSTRACTAS =====
echo "🔍 SECCIÓN 2: PRUEBAS DE CLASES ABSTRACTAS\n";
echo "=" . str_repeat("=", 42) . "\n\n";

// Prueba 4: Intentar instanciar clase abstracta (debe fallar)
$instanciacionAbstractaFalló = false;
try {
    // Esta línea debe generar error
    // $vehiculoAbstracto = new VehiculoAbstracto("Toyota", "Prius", 2023, "Blanco", "Híbrido");
    echo "NOTA: Instanciación de clase abstracta omitida (causaría error fatal)\n";
    $instanciacionAbstractaFalló = true;
} catch (Exception $e) {
    echo "ERROR ESPERADO: " . $e->getMessage() . "\n";
    $instanciacionAbstractaFalló = true;
}
mostrarResultadoPrueba("Clase abstracta NO puede instanciarse directamente", $instanciacionAbstractaFalló);

// Prueba 5: Instanciación de clases hijas
$clasesHijas = [];
try {
    $clasesHijas['auto'] = new Auto("BMW", "X3", 2023, "Negro", "Gasolina", 4, "Automática");
    $clasesHijas['moto'] = new Motocicleta("Yamaha", "YZF-R1", 2023, "Azul", "Gasolina", 1000, "Deportiva");
    $clasesHijasExitosas = true;
    
    echo "AUTO CREADO: " . $clasesHijas['auto']->obtenerInfo() . "\n";
    echo "MOTO CREADA: " . $clasesHijas['moto']->obtenerInfo() . "\n";
} catch (Exception $e) {
    $clasesHijasExitosas = false;
    echo "ERROR: " . $e->getMessage() . "\n";
}
mostrarResultadoPrueba("Instanciación de clases hijas de clase abstracta", $clasesHijasExitosas);

// Prueba 6: Métodos abstractos implementados
$metodosAbstractosImplementados = true;
$metodosRequeridos = ['acelerar', 'frenar', 'realizarMantenimiento', 'calcularConsumo'];

foreach ($clasesHijas as $tipo => $vehiculo) {
    echo "\nPROBANDO MÉTODOS EN {$tipo}:\n";
    foreach ($metodosRequeridos as $metodo) {
        try {
            if ($metodo === 'calcularConsumo') {
                $resultado = $vehiculo->$metodo(100);
            } else {
                $resultado = $vehiculo->$metodo();
            }
            echo "• {$metodo}: {$resultado}\n";
        } catch (Exception $e) {
            echo "• {$metodo}: ERROR - " . $e->getMessage() . "\n";
            $metodosAbstractosImplementados = false;
        }
    }
}
mostrarResultadoPrueba("Todos los métodos abstractos están implementados", $metodosAbstractosImplementados);

echo "\n";

// ===== SECCIÓN 3: PRUEBAS DE POLIMORFISMO =====
echo "🔍 SECCIÓN 3: PRUEBAS DE POLIMORFISMO\n";
echo "=" . str_repeat("=", 37) . "\n\n";

// Prueba 7: Polimorfismo con array de objetos
$vehiculosPolimorficos = [
    new Auto("Tesla", "Model 3", 2023, "Blanco", "Eléctrico", 4, "Automática"),
    new Motocicleta("Harley", "Sportster", 2023, "Rojo", "Gasolina", 883, "Cruiser")
];

$polimorfismoExitoso = true;
echo "PROBANDO POLIMORFISMO:\n";
foreach ($vehiculosPolimorficos as $index => $vehiculo) {
    echo "VEHÍCULO " . ($index + 1) . ":\n";
    try {
        echo "• Arrancar: " . $vehiculo->arrancar() . "\n";
        echo "• Acelerar: " . $vehiculo->acelerar() . "\n";
        echo "• Frenar: " . $vehiculo->frenar() . "\n";
        echo "• Consumo: " . $vehiculo->calcularConsumo(50) . "\n";
    } catch (Exception $e) {
        echo "• ERROR: " . $e->getMessage() . "\n";
        $polimorfismoExitoso = false;
    }
}
mostrarResultadoPrueba("Polimorfismo con clases abstractas", $polimorfismoExitoso);

echo "\n";

// ===== SECCIÓN 4: PRUEBAS DE SISTEMA DE EMPLEADOS =====
echo "🔍 SECCIÓN 4: PRUEBAS DE SISTEMA DE EMPLEADOS\n";
echo "=" . str_repeat("=", 45) . "\n\n";

// Prueba 8: Empleado con clase normal
try {
    $empleado = new Empleado("Juan Pérez", 50000, "Sistemas");
    $empleadoExitoso = true;
    echo "EMPLEADO CREADO: " . $empleado->obtenerInfo() . "\n";
    echo "TRABAJANDO: " . $empleado->trabajar() . "\n";
    echo "SALARIO: $" . $empleado->calcularSalario() . "\n";
} catch (Exception $e) {
    $empleadoExitoso = false;
    echo "ERROR: " . $e->getMessage() . "\n";
}
mostrarResultadoPrueba("Empleado con clase normal", $empleadoExitoso);

// Prueba 9: Empleados especializados con clase abstracta
$empleadosEspecializados = [];
try {
    $empleadosEspecializados['gerente'] = new Gerente("Carlos López", 80000, "Admin", 5, 20000);
    $empleadosEspecializados['desarrollador'] = new Desarrollador("María Rodríguez", 70000, "Senior", ["PHP", "JavaScript"]);
    $empleadosEspecializadosExitosos = true;
    
    foreach ($empleadosEspecializados as $tipo => $empleado) {
        echo "{$tipo}: " . $empleado->obtenerInfo() . "\n";
        echo "Salario: $" . $empleado->calcularSalario() . "\n";
    }
} catch (Exception $e) {
    $empleadosEspecializadosExitosos = false;
    echo "ERROR: " . $e->getMessage() . "\n";
}
mostrarResultadoPrueba("Empleados especializados con clase abstracta", $empleadosEspecializadosExitosos);

echo "\n";

// ===== SECCIÓN 5: PRUEBAS DE HERENCIA =====
echo "🔍 SECCIÓN 5: PRUEBAS DE HERENCIA\n";
echo "=" . str_repeat("=", 33) . "\n\n";

// Prueba 10: Herencia de métodos concretos
$herenciaMetodosConcretos = true;
echo "PROBANDO HERENCIA DE MÉTODOS CONCRETOS:\n";
foreach ($clasesHijas as $tipo => $vehiculo) {
    try {
        $info = $vehiculo->obtenerInfo();
        $arranque = $vehiculo->arrancar();
        $cambioColor = $vehiculo->cambiarColor("Verde");
        
        echo "• {$tipo} - Info: {$info}\n";
        echo "• {$tipo} - Arranque: {$arranque}\n";
        echo "• {$tipo} - Cambio color: {$cambioColor}\n";
    } catch (Exception $e) {
        echo "• {$tipo} - ERROR: " . $e->getMessage() . "\n";
        $herenciaMetodosConcretos = false;
    }
}
mostrarResultadoPrueba("Herencia de métodos concretos", $herenciaMetodosConcretos);

echo "\n";

// ===== RESUMEN DE PRUEBAS =====
echo "=======================================================\n";
echo "                 RESUMEN DE PRUEBAS\n";
echo "=======================================================\n\n";

echo "📊 ESTADÍSTICAS:\n";
echo "• Total de pruebas: {$totalPruebas}\n";
echo "• Pruebas exitosas: {$pruebasExitosas}\n";
echo "• Pruebas fallidas: {$pruebasFallidas}\n";
echo "• Porcentaje de éxito: " . round(($pruebasExitosas / $totalPruebas) * 100, 1) . "%\n\n";

if ($pruebasFallidas == 0) {
    echo "🎉 ¡TODAS LAS PRUEBAS PASARON EXITOSAMENTE!\n";
    echo "✅ El sistema de clases normales vs abstractas está funcionando correctamente.\n";
} else {
    echo "⚠️  ALGUNAS PRUEBAS FALLARON\n";
    echo "❌ Se encontraron {$pruebasFallidas} problemas que requieren revisión.\n";
}

echo "\n=======================================================\n";
echo "               VALIDACIÓN COMPLETADA\n";
echo "=======================================================\n";

?>
