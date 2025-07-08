<?php
/**
 * Archivo: Variables_Vectores_Fundamentos.php
 * Descripción: Fundamentos de variables y vectores en PHP
 * Conceptos: Variables básicas, Arrays 1D, 2D, 3D y diferentes formas de crearlos
 * Autor: Sistema de Desarrollo
 * Fecha: 8 de Julio, 2025
 */

echo "=======================================================\n";
echo "    FUNDAMENTOS DE VARIABLES Y VECTORES EN PHP\n";
echo "=======================================================\n\n";

// ===== SECCIÓN 1: VARIABLES BÁSICAS =====
echo "1. VARIABLES BÁSICAS EN PHP:\n";
echo "============================\n";

// Variables de diferentes tipos
$entero = 42;                    // Variable tipo entero
$decimal = 3.14159;              // Variable tipo float/double
$cadena = "Hola PHP";            // Variable tipo string
$booleano = true;                // Variable tipo boolean
$nulo = null;                    // Variable tipo null

// Mostrar información de las variables
echo "Variable entero: $entero (Tipo: " . gettype($entero) . ")\n";
echo "Variable decimal: $decimal (Tipo: " . gettype($decimal) . ")\n";
echo "Variable cadena: $cadena (Tipo: " . gettype($cadena) . ")\n";
echo "Variable booleano: " . ($booleano ? 'true' : 'false') . " (Tipo: " . gettype($booleano) . ")\n";
echo "Variable nulo: " . var_export($nulo, true) . " (Tipo: " . gettype($nulo) . ")\n";

// Variables dinámicas en PHP
$nombre_variable = "dinamica";   // Variable que contiene el nombre de otra variable
$$nombre_variable = "Valor dinámico"; // Variable variable
echo "Variable dinámica: $dinamica\n";

echo "\n";

// ===== SECCIÓN 2: ARRAYS UNIDIMENSIONALES (1D) =====
echo "2. ARRAYS UNIDIMENSIONALES (1D):\n";
echo "=================================\n";

// Forma 1: Array indexado usando array()
$numeros = array(1, 2, 3, 4, 5);
echo "Array indexado con array(): ";
print_r($numeros);

// Forma 2: Array indexado usando sintaxis corta []
$colores = ["rojo", "verde", "azul", "amarillo"];
echo "Array indexado con []: ";
print_r($colores);

// Forma 3: Array asociativo usando array()
$persona = array(
    "nombre" => "Juan",
    "edad" => 30,
    "ciudad" => "Madrid"
);
echo "Array asociativo con array(): ";
print_r($persona);

// Forma 4: Array asociativo usando sintaxis corta []
$producto = [
    "id" => 1001,
    "nombre" => "Laptop",
    "precio" => 999.99,
    "disponible" => true
];
echo "Array asociativo con []: ";
print_r($producto);

// Forma 5: Array mixto (índices numéricos y asociativos)
$mixto = [
    0 => "primer elemento",
    "clave" => "valor asociativo",
    1 => "segundo elemento",
    "numero" => 42
];
echo "Array mixto: ";
print_r($mixto);

// Forma 6: Array creado dinámicamente
$dinamico = [];                  // Array vacío
$dinamico[0] = "elemento 1";     // Asignación por índice
$dinamico["clave"] = "valor";    // Asignación por clave
$dinamico[] = "elemento 2";      // Asignación automática de índice
echo "Array dinámico: ";
print_r($dinamico);

// Forma 7: Array usando range()
$rango = range(1, 10);           // Crea array del 1 al 10
echo "Array con range(1, 10): ";
print_r($rango);

$letras = range('A', 'E');       // Crea array de A a E
echo "Array con range('A', 'E'): ";
print_r($letras);

echo "\n";

// ===== SECCIÓN 3: ARRAYS BIDIMENSIONALES (2D) =====
echo "3. ARRAYS BIDIMENSIONALES (2D):\n";
echo "================================\n";

// Forma 1: Array 2D usando array() anidado
$matriz_numeros = array(
    array(1, 2, 3),
    array(4, 5, 6),
    array(7, 8, 9)
);
echo "Matriz 2D con array() anidado:\n";
for ($i = 0; $i < count($matriz_numeros); $i++) {
    for ($j = 0; $j < count($matriz_numeros[$i]); $j++) {
        echo $matriz_numeros[$i][$j] . " ";
    }
    echo "\n";
}

// Forma 2: Array 2D usando sintaxis corta []
$tabla_estudiantes = [
    ["Juan", 20, "Ingeniería"],
    ["María", 22, "Medicina"],
    ["Pedro", 19, "Derecho"]
];
echo "\nTabla de estudiantes:\n";
echo "Nombre\tEdad\tCarrera\n";
echo "------------------------\n";
foreach ($tabla_estudiantes as $estudiante) {
    echo $estudiante[0] . "\t" . $estudiante[1] . "\t" . $estudiante[2] . "\n";
}

// Forma 3: Array 2D asociativo
$productos_tienda = [
    "electronicos" => [
        "laptop" => 999.99,
        "telefono" => 599.99,
        "tablet" => 399.99
    ],
    "ropa" => [
        "camisa" => 29.99,
        "pantalon" => 49.99,
        "zapatos" => 79.99
    ]
];
echo "\nProductos de tienda (array 2D asociativo):\n";
foreach ($productos_tienda as $categoria => $productos) {
    echo "Categoría: $categoria\n";
    foreach ($productos as $producto => $precio) {
        echo "  $producto: $precio\n";
    }
}

// Forma 4: Array 2D mixto
$inventario = [
    "almacen_1" => [
        0 => "Producto A",
        1 => "Producto B",
        "especial" => "Producto Premium"
    ],
    "almacen_2" => [
        0 => "Producto C",
        1 => "Producto D",
        "especial" => "Producto Deluxe"
    ]
];
echo "\nInventario (array 2D mixto):\n";
print_r($inventario);

// Forma 5: Array 2D creado dinámicamente
$notas_estudiantes = [];
$notas_estudiantes["Juan"]["matematicas"] = 85;
$notas_estudiantes["Juan"]["fisica"] = 92;
$notas_estudiantes["Juan"]["quimica"] = 88;
$notas_estudiantes["María"]["matematicas"] = 90;
$notas_estudiantes["María"]["fisica"] = 87;
$notas_estudiantes["María"]["quimica"] = 94;
echo "\nNotas de estudiantes (creado dinámicamente):\n";
print_r($notas_estudiantes);

echo "\n";

// ===== SECCIÓN 4: ARRAYS TRIDIMENSIONALES (3D) =====
echo "4. ARRAYS TRIDIMENSIONALES (3D):\n";
echo "=================================\n";

// Forma 1: Array 3D usando array() anidado
$cubo_numeros = array(
    array(
        array(1, 2),
        array(3, 4)
    ),
    array(
        array(5, 6),
        array(7, 8)
    )
);
echo "Cubo 3D con array() anidado:\n";
for ($i = 0; $i < count($cubo_numeros); $i++) {
    echo "Capa $i:\n";
    for ($j = 0; $j < count($cubo_numeros[$i]); $j++) {
        for ($k = 0; $k < count($cubo_numeros[$i][$j]); $k++) {
            echo $cubo_numeros[$i][$j][$k] . " ";
        }
        echo "\n";
    }
    echo "\n";
}

// Forma 2: Array 3D usando sintaxis corta []
$empresa_empleados = [
    "sede_madrid" => [
        "desarrollo" => [
            "junior" => ["Ana", "Carlos"],
            "senior" => ["Luis", "Elena"]
        ],
        "marketing" => [
            "junior" => ["Sofia", "Diego"],
            "senior" => ["Carmen", "Roberto"]
        ]
    ],
    "sede_barcelona" => [
        "desarrollo" => [
            "junior" => ["Miguel", "Laura"],
            "senior" => ["Fernando", "Patricia"]
        ],
        "ventas" => [
            "junior" => ["Javier", "Isabel"],
            "senior" => ["Antonio", "Mónica"]
        ]
    ]
];
echo "Estructura de empresa (array 3D asociativo):\n";
foreach ($empresa_empleados as $sede => $departamentos) {
    echo "Sede: $sede\n";
    foreach ($departamentos as $departamento => $niveles) {
        echo "  Departamento: $departamento\n";
        foreach ($niveles as $nivel => $empleados) {
            echo "    Nivel $nivel: " . implode(", ", $empleados) . "\n";
        }
    }
}

// Forma 3: Array 3D para almacenar datos de ventas
$ventas_mensuales = [
    "2024" => [
        "enero" => [
            "semana_1" => 1200,
            "semana_2" => 1450,
            "semana_3" => 1680,
            "semana_4" => 1320
        ],
        "febrero" => [
            "semana_1" => 1100,
            "semana_2" => 1250,
            "semana_3" => 1480,
            "semana_4" => 1690
        ]
    ],
    "2025" => [
        "enero" => [
            "semana_1" => 1350,
            "semana_2" => 1520,
            "semana_3" => 1780,
            "semana_4" => 1440
        ]
    ]
];
echo "\nVentas mensuales (array 3D):\n";
foreach ($ventas_mensuales as $año => $meses) {
    echo "Año: $año\n";
    foreach ($meses as $mes => $semanas) {
        echo "  Mes: $mes\n";
        $total_mes = 0;
        foreach ($semanas as $semana => $venta) {
            echo "    $semana: $venta\n";
            $total_mes += $venta;
        }
        echo "    Total del mes: $total_mes\n";
    }
}

// Forma 4: Array 3D creado dinámicamente
$registro_temperaturas = [];
$registro_temperaturas["2024"]["verano"]["madrid"] = [32, 35, 28, 30];
$registro_temperaturas["2024"]["verano"]["barcelona"] = [29, 31, 26, 28];
$registro_temperaturas["2024"]["invierno"]["madrid"] = [8, 12, 5, 10];
$registro_temperaturas["2024"]["invierno"]["barcelona"] = [12, 15, 9, 14];
echo "\nRegistro de temperaturas (creado dinámicamente):\n";
print_r($registro_temperaturas);

echo "\n";

// ===== SECCIÓN 5: MÉTODOS ESPECIALES DE CREACIÓN =====
echo "5. MÉTODOS ESPECIALES DE CREACIÓN:\n";
echo "===================================\n";

// Usando array_fill()
$array_fill = array_fill(0, 5, "valor");  // Llena array con 5 elementos iguales
echo "Array con array_fill(0, 5, 'valor'): ";
print_r($array_fill);

// Usando array_fill_keys()
$claves = ["a", "b", "c"];
$array_fill_keys = array_fill_keys($claves, 0);  // Llena con claves específicas
echo "Array con array_fill_keys(['a', 'b', 'c'], 0): ";
print_r($array_fill_keys);

// Usando array_pad()
$original = [1, 2, 3];
$array_pad = array_pad($original, 6, 0);  // Extiende array hasta 6 elementos
echo "Array con array_pad([1, 2, 3], 6, 0): ";
print_r($array_pad);

// Usando array_combine()
$claves_combine = ["nombre", "edad", "ciudad"];
$valores_combine = ["Ana", 25, "Sevilla"];
$array_combine = array_combine($claves_combine, $valores_combine);
echo "Array con array_combine(): ";
print_r($array_combine);

// Usando array_merge()
$array1 = ["a", "b"];
$array2 = ["c", "d"];
$array_merge = array_merge($array1, $array2);
echo "Array con array_merge(['a', 'b'], ['c', 'd']): ";
print_r($array_merge);

// Usando explode()
$cadena = "uno,dos,tres,cuatro";
$array_explode = explode(",", $cadena);
echo "Array con explode(',', 'uno,dos,tres,cuatro'): ";
print_r($array_explode);

// Usando str_split()
$cadena_split = "ABCDEF";
$array_str_split = str_split($cadena_split, 2);  // Divide en chunks de 2
echo "Array con str_split('ABCDEF', 2): ";
print_r($array_str_split);

echo "\n";

// ===== SECCIÓN 6: CONSTANTES Y ARRAYS =====
echo "6. CONSTANTES Y ARRAYS:\n";
echo "=======================\n";

// Constantes tradicionales
define("MI_CONSTANTE", "Valor constante");
echo "Constante tradicional: " . MI_CONSTANTE . "\n";

// Constantes de array (PHP 5.6+)
define("DIAS_SEMANA", ["Lunes", "Martes", "Miércoles", "Jueves", "Viernes"]);
echo "Constante de array: ";
print_r(DIAS_SEMANA);

// Constantes de clase
class MiClase {
    const COLORES = ["rojo", "verde", "azul"];
    const VERSION = "1.0";
}
echo "Constante de clase (array): ";
print_r(MiClase::COLORES);
echo "Constante de clase (string): " . MiClase::VERSION . "\n";

echo "\n";

// ===== SECCIÓN 7: INFORMACIÓN SOBRE ARRAYS =====
echo "7. INFORMACIÓN SOBRE ARRAYS:\n";
echo "============================\n";

$array_info = [1, 2, 3, "cuatro", 5.5];

// Funciones de información
echo "Tamaño del array: " . count($array_info) . "\n";
echo "Tamaño del array (sizeof): " . sizeof($array_info) . "\n";
echo "¿Es array?: " . (is_array($array_info) ? "Sí" : "No") . "\n";
echo "¿Array vacío?: " . (empty($array_info) ? "Sí" : "No") . "\n";
echo "¿Existe índice 2?: " . (isset($array_info[2]) ? "Sí" : "No") . "\n";
echo "¿Existe índice 10?: " . (isset($array_info[10]) ? "Sí" : "No") . "\n";

// Claves y valores
echo "Claves del array: ";
print_r(array_keys($array_info));
echo "Valores del array: ";
print_r(array_values($array_info));

echo "\n";

// ===== MENSAJE FINAL =====
echo "=======================================================\n";
echo "    FUNDAMENTOS COMPLETADOS EXITOSAMENTE\n";
echo "=======================================================\n";
echo "✓ Variables básicas: entero, decimal, string, boolean, null\n";
echo "✓ Arrays 1D: indexados, asociativos, mixtos\n";
echo "✓ Arrays 2D: matrices, tablas, estructuras anidadas\n";
echo "✓ Arrays 3D: cubos, estructuras complejas\n";
echo "✓ Métodos especiales: fill, merge, explode, etc.\n";
echo "✓ Constantes: tradicionales, arrays, de clase\n";
echo "✓ Información: count, isset, keys, values\n";
echo "=======================================================\n";
?>
