<?php
/**
 * Archivo: Variables_Vectores_Aplicaciones.php
 * Descripción: Aplicaciones prácticas de variables y manipulación de vectores en PHP
 * Conceptos: Operaciones con arrays, algoritmos, manipulación de datos
 * Autor: Sistema de Desarrollo
 * Fecha: 8 de Julio, 2025
 */

// Incluir el archivo de fundamentos para tener ejemplos base
require_once 'Variables_Vectores_Fundamentos.php';

echo "\n\n=======================================================\n";
echo "   APLICACIONES Y MANIPULACIÓN DE VARIABLES Y VECTORES\n";
echo "=======================================================\n\n";

// ===== SECCIÓN 1: MANIPULACIÓN BÁSICA DE ARRAYS 1D =====
echo "1. MANIPULACIÓN BÁSICA DE ARRAYS 1D:\n";
echo "=====================================\n";

// Array inicial para trabajar
$numeros = [3, 1, 4, 1, 5, 9, 2, 6, 5, 3];
echo "Array inicial: ";
print_r($numeros);

// Agregar elementos al final
array_push($numeros, 8, 7);  // Agregar múltiples elementos
echo "Después de array_push(8, 7): ";
print_r($numeros);

// Agregar elemento al inicio
array_unshift($numeros, 0);  // Agregar al inicio
echo "Después de array_unshift(0): ";
print_r($numeros);

// Eliminar elemento del final
$ultimo = array_pop($numeros);  // Eliminar y obtener último elemento
echo "Elemento eliminado del final: $ultimo\n";
echo "Array después de array_pop(): ";
print_r($numeros);

// Eliminar elemento del inicio
$primero = array_shift($numeros);  // Eliminar y obtener primer elemento
echo "Elemento eliminado del inicio: $primero\n";
echo "Array después de array_shift(): ";
print_r($numeros);

// Buscar elementos
$buscar = 5;
$posicion = array_search($buscar, $numeros);  // Buscar primera ocurrencia
echo "Posición de '$buscar' en el array: " . ($posicion !== false ? $posicion : "No encontrado") . "\n";

// Verificar si existe un valor
$existe = in_array(9, $numeros);
echo "¿Existe el valor 9?: " . ($existe ? "Sí" : "No") . "\n";

// Contar ocurrencias de un valor
$conteo = array_count_values($numeros);
echo "Conteo de valores: ";
print_r($conteo);

echo "\n";

// ===== SECCIÓN 2: ORDENAMIENTO DE ARRAYS =====
echo "2. ORDENAMIENTO DE ARRAYS:\n";
echo "==========================\n";

$frutas = ["banana", "manzana", "naranja", "uva", "pera"];
echo "Array original de frutas: ";
print_r($frutas);

// Ordenamiento ascendente
$frutas_asc = $frutas;
sort($frutas_asc);  // Ordena valores, reindexando
echo "Ordenamiento ascendente (sort): ";
print_r($frutas_asc);

// Ordenamiento descendente
$frutas_desc = $frutas;
rsort($frutas_desc);  // Ordena valores descendente, reindexando
echo "Ordenamiento descendente (rsort): ";
print_r($frutas_desc);

// Ordenamiento manteniendo claves
$frutas_asort = $frutas;
asort($frutas_asort);  // Ordena valores manteniendo claves
echo "Ordenamiento ascendente manteniendo claves (asort): ";
print_r($frutas_asort);

// Array asociativo para ordenamiento
$edades = ["Juan" => 25, "Ana" => 30, "Pedro" => 20, "María" => 35];
echo "Array asociativo de edades: ";
print_r($edades);

// Ordenar por valores
$edades_por_valor = $edades;
asort($edades_por_valor);  // Ordenar por valores manteniendo asociaciones
echo "Ordenado por valores (asort): ";
print_r($edades_por_valor);

// Ordenar por claves
$edades_por_clave = $edades;
ksort($edades_por_clave);  // Ordenar por claves
echo "Ordenado por claves (ksort): ";
print_r($edades_por_clave);

// Ordenamiento personalizado
$numeros_custom = [3, 1, 4, 1, 5, 9, 2, 6];
usort($numeros_custom, function($a, $b) {
    return $b - $a;  // Ordenamiento descendente personalizado
});
echo "Ordenamiento personalizado descendente: ";
print_r($numeros_custom);

echo "\n";

// ===== SECCIÓN 3: FUNCIONES DE ARRAY AVANZADAS =====
echo "3. FUNCIONES DE ARRAY AVANZADAS:\n";
echo "================================\n";

$numeros_operaciones = [1, 2, 3, 4, 5, 6, 7, 8, 9, 10];
echo "Array para operaciones: ";
print_r($numeros_operaciones);

// Filtrar elementos
$pares = array_filter($numeros_operaciones, function($num) {
    return $num % 2 == 0;  // Filtrar números pares
});
echo "Números pares (array_filter): ";
print_r($pares);

// Transformar elementos
$cuadrados = array_map(function($num) {
    return $num * $num;  // Calcular cuadrados
}, $numeros_operaciones);
echo "Cuadrados (array_map): ";
print_r($cuadrados);

// Reducir array a un valor
$suma = array_reduce($numeros_operaciones, function($carry, $item) {
    return $carry + $item;  // Sumar todos los elementos
}, 0);
echo "Suma total (array_reduce): $suma\n";

// Extraer una porción del array
$porcion = array_slice($numeros_operaciones, 3, 4);  // Desde índice 3, 4 elementos
echo "Porción del array (índice 3, 4 elementos): ";
print_r($porcion);

// Dividir array en chunks
$chunks = array_chunk($numeros_operaciones, 3);  // Dividir en grupos de 3
echo "Array dividido en chunks de 3: ";
print_r($chunks);

// Voltear array
$volteado = array_reverse($numeros_operaciones);
echo "Array volteado (array_reverse): ";
print_r($volteado);

// Obtener elementos únicos
$con_duplicados = [1, 2, 2, 3, 3, 3, 4, 4, 5];
$unicos = array_unique($con_duplicados);
echo "Array con duplicados: ";
print_r($con_duplicados);
echo "Array sin duplicados (array_unique): ";
print_r($unicos);

echo "\n";

// ===== SECCIÓN 4: MANIPULACIÓN DE ARRAYS 2D =====
echo "4. MANIPULACIÓN DE ARRAYS 2D:\n";
echo "==============================\n";

// Array 2D de estudiantes con calificaciones
$estudiantes = [
    ["nombre" => "Juan", "matematicas" => 85, "fisica" => 90, "quimica" => 78],
    ["nombre" => "Ana", "matematicas" => 92, "fisica" => 88, "quimica" => 94],
    ["nombre" => "Pedro", "matematicas" => 78, "fisica" => 85, "quimica" => 82],
    ["nombre" => "María", "matematicas" => 95, "fisica" => 92, "quimica" => 89]
];

echo "Estudiantes y calificaciones:\n";
foreach ($estudiantes as $estudiante) {
    echo $estudiante["nombre"] . " - Mat: " . $estudiante["matematicas"] . 
         ", Fis: " . $estudiante["fisica"] . ", Qui: " . $estudiante["quimica"] . "\n";
}

// Calcular promedios por estudiante
echo "\nPromedios por estudiante:\n";
foreach ($estudiantes as &$estudiante) {
    $promedio = ($estudiante["matematicas"] + $estudiante["fisica"] + $estudiante["quimica"]) / 3;
    $estudiante["promedio"] = round($promedio, 2);  // Agregar promedio al array
    echo $estudiante["nombre"] . ": " . $estudiante["promedio"] . "\n";
}

// Extraer una columna específica
$nombres = array_column($estudiantes, "nombre");
echo "\nNombres de estudiantes (array_column): ";
print_r($nombres);

$matematicas = array_column($estudiantes, "matematicas");
echo "Calificaciones de matemáticas: ";
print_r($matematicas);

// Calcular estadísticas
$promedio_matematicas = array_sum($matematicas) / count($matematicas);
echo "Promedio general de matemáticas: " . round($promedio_matematicas, 2) . "\n";

$max_matematicas = max($matematicas);
$min_matematicas = min($matematicas);
echo "Calificación máxima en matemáticas: $max_matematicas\n";
echo "Calificación mínima en matemáticas: $min_matematicas\n";

// Ordenar estudiantes por promedio
usort($estudiantes, function($a, $b) {
    return $b["promedio"] <=> $a["promedio"];  // Orden descendente por promedio
});

echo "\nEstudiantes ordenados por promedio (descendente):\n";
foreach ($estudiantes as $estudiante) {
    echo $estudiante["nombre"] . " - Promedio: " . $estudiante["promedio"] . "\n";
}

echo "\n";

// ===== SECCIÓN 5: MANIPULACIÓN DE ARRAYS 3D =====
echo "5. MANIPULACIÓN DE ARRAYS 3D:\n";
echo "==============================\n";

// Array 3D de ventas por región, mes y producto
$ventas_regionales = [
    "Norte" => [
        "Enero" => ["Laptop" => 50, "Tablet" => 30, "Telefono" => 80],
        "Febrero" => ["Laptop" => 45, "Tablet" => 35, "Telefono" => 75],
        "Marzo" => ["Laptop" => 60, "Tablet" => 40, "Telefono" => 90]
    ],
    "Sur" => [
        "Enero" => ["Laptop" => 40, "Tablet" => 25, "Telefono" => 70],
        "Febrero" => ["Laptop" => 38, "Tablet" => 28, "Telefono" => 65],
        "Marzo" => ["Laptop" => 55, "Tablet" => 32, "Telefono" => 85]
    ],
    "Este" => [
        "Enero" => ["Laptop" => 35, "Tablet" => 20, "Telefono" => 60],
        "Febrero" => ["Laptop" => 42, "Tablet" => 22, "Telefono" => 68],
        "Marzo" => ["Laptop" => 48, "Tablet" => 25, "Telefono" => 75]
    ]
];

echo "Ventas regionales (3D):\n";

// Mostrar todas las ventas organizadamente
foreach ($ventas_regionales as $region => $meses) {
    echo "Región: $region\n";
    foreach ($meses as $mes => $productos) {
        echo "  $mes:\n";
        foreach ($productos as $producto => $cantidad) {
            echo "    $producto: $cantidad unidades\n";
        }
    }
    echo "\n";
}

// Calcular totales por región
echo "Totales por región:\n";
foreach ($ventas_regionales as $region => $meses) {
    $total_region = 0;
    foreach ($meses as $mes => $productos) {
        foreach ($productos as $producto => $cantidad) {
            $total_region += $cantidad;
        }
    }
    echo "$region: $total_region unidades\n";
}

// Calcular totales por producto (sumando todas las regiones y meses)
$totales_producto = [];
foreach ($ventas_regionales as $region => $meses) {
    foreach ($meses as $mes => $productos) {
        foreach ($productos as $producto => $cantidad) {
            if (!isset($totales_producto[$producto])) {
                $totales_producto[$producto] = 0;
            }
            $totales_producto[$producto] += $cantidad;
        }
    }
}

echo "\nTotales por producto (todas las regiones):\n";
foreach ($totales_producto as $producto => $total) {
    echo "$producto: $total unidades\n";
}

// Encontrar la región con mayores ventas en un mes específico
$mes_analizar = "Marzo";
$ventas_marzo = [];
foreach ($ventas_regionales as $region => $meses) {
    if (isset($meses[$mes_analizar])) {
        $total_mes = array_sum($meses[$mes_analizar]);
        $ventas_marzo[$region] = $total_mes;
    }
}

arsort($ventas_marzo);  // Ordenar descendente
echo "\nVentas por región en $mes_analizar (ordenado):\n";
foreach ($ventas_marzo as $region => $total) {
    echo "$region: $total unidades\n";
}

echo "\n";

// ===== SECCIÓN 6: ALGORITMOS CON ARRAYS =====
echo "6. ALGORITMOS CON ARRAYS:\n";
echo "=========================\n";

// Algoritmo de búsqueda lineal
function busqueda_lineal($array, $valor) {
    for ($i = 0; $i < count($array); $i++) {
        if ($array[$i] == $valor) {
            return $i;  // Retorna índice donde encontró el valor
        }
    }
    return -1;  // No encontrado
}

$lista_busqueda = [10, 25, 30, 45, 60, 75, 90];
$valor_buscar = 45;
$posicion_encontrada = busqueda_lineal($lista_busqueda, $valor_buscar);
echo "Búsqueda lineal de $valor_buscar en [" . implode(", ", $lista_busqueda) . "]: ";
echo ($posicion_encontrada != -1) ? "Encontrado en posición $posicion_encontrada" : "No encontrado";
echo "\n";

// Algoritmo de búsqueda binaria (requiere array ordenado)
function busqueda_binaria($array, $valor) {
    $izquierda = 0;
    $derecha = count($array) - 1;
    
    while ($izquierda <= $derecha) {
        $medio = intval(($izquierda + $derecha) / 2);
        
        if ($array[$medio] == $valor) {
            return $medio;  // Encontrado
        } elseif ($array[$medio] < $valor) {
            $izquierda = $medio + 1;
        } else {
            $derecha = $medio - 1;
        }
    }
    return -1;  // No encontrado
}

$lista_ordenada = [10, 25, 30, 45, 60, 75, 90];
$busqueda_binaria_resultado = busqueda_binaria($lista_ordenada, $valor_buscar);
echo "Búsqueda binaria de $valor_buscar: ";
echo ($busqueda_binaria_resultado != -1) ? "Encontrado en posición $busqueda_binaria_resultado" : "No encontrado";
echo "\n";

// Algoritmo de ordenamiento burbuja
function ordenamiento_burbuja($array) {
    $n = count($array);
    for ($i = 0; $i < $n - 1; $i++) {
        for ($j = 0; $j < $n - $i - 1; $j++) {
            if ($array[$j] > $array[$j + 1]) {
                // Intercambiar elementos
                $temp = $array[$j];
                $array[$j] = $array[$j + 1];
                $array[$j + 1] = $temp;
            }
        }
    }
    return $array;
}

$desordenado = [64, 34, 25, 12, 22, 11, 90];
echo "Array desordenado: [" . implode(", ", $desordenado) . "]\n";
$ordenado_burbuja = ordenamiento_burbuja($desordenado);
echo "Ordenado con burbuja: [" . implode(", ", $ordenado_burbuja) . "]\n";

// Encontrar elemento más frecuente
function elemento_mas_frecuente($array) {
    $frecuencias = array_count_values($array);
    $max_frecuencia = max($frecuencias);
    $elementos_frecuentes = array_keys($frecuencias, $max_frecuencia);
    return ["elemento" => $elementos_frecuentes[0], "frecuencia" => $max_frecuencia];
}

$array_frecuencias = [1, 3, 2, 3, 4, 3, 2, 5, 3];
$mas_frecuente = elemento_mas_frecuente($array_frecuencias);
echo "Array: [" . implode(", ", $array_frecuencias) . "]\n";
echo "Elemento más frecuente: " . $mas_frecuente["elemento"] . " (aparece " . $mas_frecuente["frecuencia"] . " veces)\n";

echo "\n";

// ===== SECCIÓN 7: VALIDACIÓN Y LIMPIEZA DE DATOS =====
echo "7. VALIDACIÓN Y LIMPIEZA DE DATOS:\n";
echo "===================================\n";

// Array con datos que necesitan validación y limpieza
$datos_usuario = [
    "nombre" => "  Juan Pérez  ",
    "email" => "JUAN@EXAMPLE.COM",
    "edad" => "25",
    "telefono" => "123-456-7890",
    "activo" => "true"
];

echo "Datos originales:\n";
print_r($datos_usuario);

// Función para limpiar y validar datos
function limpiar_datos($datos) {
    $datos_limpios = [];
    
    foreach ($datos as $campo => $valor) {
        switch ($campo) {
            case "nombre":
                // Eliminar espacios y capitalizar
                $datos_limpios[$campo] = trim($valor);
                $datos_limpios[$campo] = ucwords(strtolower($datos_limpios[$campo]));
                break;
                
            case "email":
                // Convertir a minúsculas y validar
                $email_limpio = strtolower(trim($valor));
                if (filter_var($email_limpio, FILTER_VALIDATE_EMAIL)) {
                    $datos_limpios[$campo] = $email_limpio;
                } else {
                    $datos_limpios[$campo] = null;
                    $datos_limpios[$campo . "_error"] = "Email inválido";
                }
                break;
                
            case "edad":
                // Convertir a entero y validar rango
                $edad = intval($valor);
                if ($edad >= 0 && $edad <= 120) {
                    $datos_limpios[$campo] = $edad;
                } else {
                    $datos_limpios[$campo] = null;
                    $datos_limpios[$campo . "_error"] = "Edad inválida";
                }
                break;
                
            case "telefono":
                // Eliminar caracteres no numéricos
                $telefono_limpio = preg_replace("/[^0-9]/", "", $valor);
                $datos_limpios[$campo] = $telefono_limpio;
                break;
                
            case "activo":
                // Convertir a booleano
                $datos_limpios[$campo] = filter_var($valor, FILTER_VALIDATE_BOOLEAN);
                break;
                
            default:
                $datos_limpios[$campo] = trim($valor);
        }
    }
    
    return $datos_limpios;
}

$datos_limpios = limpiar_datos($datos_usuario);
echo "\nDatos después de limpieza:\n";
print_r($datos_limpios);

// Validar array completo
function validar_array_completo($array, $campos_requeridos) {
    $errores = [];
    
    foreach ($campos_requeridos as $campo) {
        if (!isset($array[$campo]) || empty($array[$campo])) {
            $errores[] = "Campo '$campo' es requerido";
        }
    }
    
    return $errores;
}

$campos_requeridos = ["nombre", "email", "edad"];
$errores_validacion = validar_array_completo($datos_limpios, $campos_requeridos);

echo "\nValidación de campos requeridos:\n";
if (empty($errores_validacion)) {
    echo "✓ Todos los campos requeridos están presentes\n";
} else {
    echo "❌ Errores encontrados:\n";
    foreach ($errores_validacion as $error) {
        echo "  - $error\n";
    }
}

echo "\n";

// ===== SECCIÓN 8: ESTADÍSTICAS Y ANÁLISIS =====
echo "8. ESTADÍSTICAS Y ANÁLISIS DE DATOS:\n";
echo "====================================\n";

$calificaciones = [85, 92, 78, 96, 88, 73, 91, 87, 94, 82, 89, 95];
echo "Calificaciones: [" . implode(", ", $calificaciones) . "]\n";

// Estadísticas básicas
$cantidad = count($calificaciones);
$suma_total = array_sum($calificaciones);
$promedio = $suma_total / $cantidad;
$maximo = max($calificaciones);
$minimo = min($calificaciones);

echo "\nEstadísticas básicas:\n";
echo "Cantidad: $cantidad\n";
echo "Suma total: $suma_total\n";
echo "Promedio: " . round($promedio, 2) . "\n";
echo "Máximo: $maximo\n";
echo "Mínimo: $minimo\n";
echo "Rango: " . ($maximo - $minimo) . "\n";

// Mediana
sort($calificaciones);  // Ordenar para calcular mediana
$mediana = ($cantidad % 2 == 0) 
    ? ($calificaciones[$cantidad/2 - 1] + $calificaciones[$cantidad/2]) / 2
    : $calificaciones[floor($cantidad/2)];
echo "Mediana: $mediana\n";

// Moda (valor más frecuente)
$frecuencias = array_count_values($calificaciones);
$max_frecuencia = max($frecuencias);
$modas = array_keys($frecuencias, $max_frecuencia);
echo "Moda(s): " . implode(", ", $modas) . " (frecuencia: $max_frecuencia)\n";

// Percentiles
function calcular_percentil($array, $percentil) {
    sort($array);
    $indice = ($percentil / 100) * (count($array) - 1);
    $indice_bajo = floor($indice);
    $indice_alto = ceil($indice);
    
    if ($indice_bajo == $indice_alto) {
        return $array[$indice_bajo];
    } else {
        $peso = $indice - $indice_bajo;
        return $array[$indice_bajo] * (1 - $peso) + $array[$indice_alto] * $peso;
    }
}

echo "Percentil 25: " . round(calcular_percentil($calificaciones, 25), 2) . "\n";
echo "Percentil 75: " . round(calcular_percentil($calificaciones, 75), 2) . "\n";

echo "\n";

// ===== MENSAJE FINAL =====
echo "=======================================================\n";
echo "    APLICACIONES COMPLETADAS EXITOSAMENTE\n";
echo "=======================================================\n";
echo "✓ Manipulación básica: push, pop, shift, unshift\n";
echo "✓ Ordenamiento: sort, rsort, asort, ksort, usort\n";
echo "✓ Funciones avanzadas: filter, map, reduce, slice\n";
echo "✓ Arrays 2D: manipulación, extracción, estadísticas\n";
echo "✓ Arrays 3D: análisis complejo, totales, comparaciones\n";
echo "✓ Algoritmos: búsqueda lineal, binaria, ordenamiento\n";
echo "✓ Validación: limpieza, validación, manejo de errores\n";
echo "✓ Estadísticas: promedio, mediana, moda, percentiles\n";
echo "=======================================================\n";
?>
