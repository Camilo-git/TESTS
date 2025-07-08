# Documentación - Variables y Vectores en PHP

## Índice
1. [Introducción](#introducción)
2. [Variables Básicas](#variables-básicas)
3. [Arrays Unidimensionales](#arrays-unidimensionales)
4. [Arrays Bidimensionales](#arrays-bidimensionales)
5. [Arrays Tridimensionales](#arrays-tridimensionales)
6. [Manipulación de Arrays](#manipulación-de-arrays)
7. [Algoritmos y Análisis](#algoritmos-y-análisis)
8. [Mejores Prácticas](#mejores-prácticas)
9. [Ejemplos Prácticos](#ejemplos-prácticos)
10. [Conclusiones](#conclusiones)

---

## Introducción

Este proyecto proporciona una guía completa sobre **variables y vectores (arrays) en PHP**, cubriendo desde conceptos básicos hasta técnicas avanzadas de manipulación y análisis de datos.

### Objetivos del Proyecto

1. **Comprender** los tipos básicos de variables en PHP
2. **Dominar** la creación y manipulación de arrays 1D, 2D y 3D
3. **Aplicar** algoritmos de búsqueda, ordenamiento y análisis
4. **Implementar** validación y limpieza de datos
5. **Desarrollar** habilidades de análisis estadístico

### Archivos del Proyecto

- **`Variables_Vectores_Fundamentos.php`**: Conceptos básicos y diferentes formas de crear arrays
- **`Variables_Vectores_Aplicaciones.php`**: Aplicaciones prácticas y manipulación avanzada
- **`Variables_Vectores_DIAGRAMA_FLUJO.md`**: Diagramas de flujo del sistema
- **`Variables_Vectores_DOCUMENTACION.md`**: Documentación completa (este archivo)

---

## Variables Básicas

### Tipos de Variables en PHP

PHP es un lenguaje **débilmente tipado**, lo que significa que no necesitas declarar el tipo de variable explícitamente.

#### 1. Enteros (Integer)
```php
$edad = 25;                    // Entero positivo
$temperatura = -5;             // Entero negativo
$hexadecimal = 0xFF;          // Hexadecimal (255)
$octal = 0755;                // Octal (493)
$binario = 0b1010;            // Binario (10)
```

#### 2. Números Decimales (Float/Double)
```php
$precio = 99.99;              // Decimal estándar
$cientifico = 1.23e4;         // Notación científica (12300)
$pi = 3.14159;                // Valor matemático
```

#### 3. Cadenas de Texto (String)
```php
$nombre = "Juan Pérez";       // Comillas dobles
$apellido = 'García';         // Comillas simples
$mensaje = "Hola $nombre";    // Interpolación de variables
$multilinea = <<<EOT
Este es un texto
de múltiples líneas
EOT;
```

#### 4. Booleanos (Boolean)
```php
$activo = true;               // Verdadero
$inactivo = false;            // Falso
$resultado = (5 > 3);         // true
$comparacion = (2 == "2");    // true (comparación débil)
$estricta = (2 === "2");      // false (comparación estricta)
```

#### 5. Nulo (NULL)
```php
$vacio = null;                // Valor nulo
$no_inicializada;             // null por defecto
unset($variable);             // Convierte a null
```

### Variables Dinámicas

PHP permite crear **variables variables**, donde el nombre de la variable se almacena en otra variable:

```php
$nombre_var = "dinamica";
$$nombre_var = "Valor dinámico";
echo $dinamica;               // Output: "Valor dinámico"
```

### Verificación de Tipos

```php
$valor = 42;
echo gettype($valor);         // "integer"
echo var_dump($valor);        // int(42)
echo is_int($valor);          // true
echo is_string($valor);       // false
```

---

## Arrays Unidimensionales

Los arrays 1D son estructuras que almacenan múltiples valores en una sola variable.

### Métodos de Creación

#### 1. Función array()
```php
// Array indexado
$numeros = array(1, 2, 3, 4, 5);

// Array asociativo
$persona = array(
    "nombre" => "Juan",
    "edad" => 30,
    "ciudad" => "Madrid"
);
```

#### 2. Sintaxis Corta [] (PHP 5.4+)
```php
// Array indexado
$colores = ["rojo", "verde", "azul"];

// Array asociativo
$config = [
    "host" => "localhost",
    "puerto" => 3306,
    "base_datos" => "mi_db"
];
```

#### 3. Asignación Directa
```php
$frutas = [];                 // Array vacío
$frutas[0] = "manzana";       // Índice específico
$frutas[] = "banana";         // Índice automático
$frutas["favorita"] = "uva";  // Clave asociativa
```

#### 4. Funciones Especializadas
```php
// Range - secuencia de números
$numeros = range(1, 10);      // [1, 2, 3, ..., 10]
$letras = range('A', 'Z');    // ['A', 'B', 'C', ..., 'Z']

// Array_fill - llenar con valor
$ceros = array_fill(0, 5, 0); // [0, 0, 0, 0, 0]

// Array_fill_keys - llenar con claves específicas
$default = array_fill_keys(['a', 'b', 'c'], null);

// Explode - convertir string a array
$palabras = explode(" ", "Hola mundo PHP");

// Str_split - dividir string en caracteres
$chars = str_split("ABCDE");
```

### Tipos de Arrays 1D

#### Arrays Indexados
```php
$lista = [1, 2, 3, 4, 5];
echo $lista[0];               // 1
echo $lista[4];               // 5
```

#### Arrays Asociativos
```php
$usuario = [
    "id" => 123,
    "nombre" => "Ana",
    "email" => "ana@email.com"
];
echo $usuario["nombre"];      // "Ana"
```

#### Arrays Mixtos
```php
$mixto = [
    0 => "primer elemento",
    "clave" => "valor asociativo",
    1 => "segundo elemento"
];
```

### Información sobre Arrays

```php
$datos = [1, 2, 3, "cuatro", 5.5];

// Tamaño y verificación
echo count($datos);           // 5
echo sizeof($datos);          // 5 (alias de count)
echo is_array($datos);        // true
echo empty($datos);           // false

// Verificar existencia
echo isset($datos[2]);        // true
echo array_key_exists("clave", $datos); // false

// Obtener claves y valores
$claves = array_keys($datos);
$valores = array_values($datos);
```

---

## Arrays Bidimensionales

Los arrays 2D son estructuras que contienen arrays dentro de arrays, formando matrices o tablas.

### Métodos de Creación

#### 1. Arrays Anidados
```php
// Matriz numérica
$matriz = array(
    array(1, 2, 3),
    array(4, 5, 6),
    array(7, 8, 9)
);

// Tabla de datos
$estudiantes = [
    ["Juan", 20, "Ingeniería"],
    ["Ana", 22, "Medicina"],
    ["Pedro", 19, "Derecho"]
];
```

#### 2. Arrays Asociativos Anidados
```php
$empresa = [
    "desarrollo" => [
        "frontend" => ["React", "Vue", "Angular"],
        "backend" => ["PHP", "Python", "Node.js"]
    ],
    "diseño" => [
        "ui" => ["Figma", "Sketch"],
        "ux" => ["Research", "Testing"]
    ]
];
```

#### 3. Creación Dinámica
```php
$notas = [];
$notas["Juan"]["matematicas"] = 85;
$notas["Juan"]["fisica"] = 90;
$notas["Ana"]["matematicas"] = 92;
$notas["Ana"]["fisica"] = 88;
```

### Recorrido de Arrays 2D

#### Con Bucles For
```php
$matriz = [[1, 2, 3], [4, 5, 6]];

for ($i = 0; $i < count($matriz); $i++) {
    for ($j = 0; $j < count($matriz[$i]); $j++) {
        echo $matriz[$i][$j] . " ";
    }
    echo "\n";
}
```

#### Con Foreach Anidado
```php
foreach ($empresa as $departamento => $areas) {
    echo "Departamento: $departamento\n";
    foreach ($areas as $area => $tecnologias) {
        echo "  Área: $area\n";
        foreach ($tecnologias as $tech) {
            echo "    - $tech\n";
        }
    }
}
```

### Manipulación de Arrays 2D

#### Extraer Columnas
```php
$estudiantes = [
    ["Juan", 20, "Ingeniería"],
    ["Ana", 22, "Medicina"]
];

// Extraer nombres (columna 0)
$nombres = array_column($estudiantes, 0);
// Resultado: ["Juan", "Ana"]

// Con arrays asociativos
$personas = [
    ["nombre" => "Juan", "edad" => 20],
    ["nombre" => "Ana", "edad" => 22]
];
$nombres = array_column($personas, "nombre");
```

#### Ordenamiento 2D
```php
// Ordenar por una columna específica
usort($estudiantes, function($a, $b) {
    return $a["promedio"] <=> $b["promedio"];
});
```

---

## Arrays Tridimensionales

Los arrays 3D son estructuras de tres dimensiones, útiles para datos complejos como cubos de información.

### Métodos de Creación

#### 1. Estructura Cúbica
```php
$cubo = array(
    array(
        array(1, 2),
        array(3, 4)
    ),
    array(
        array(5, 6),
        array(7, 8)
    )
);
```

#### 2. Estructura Organizacional
```php
$empresa = [
    "madrid" => [
        "desarrollo" => [
            "junior" => ["Ana", "Carlos"],
            "senior" => ["Luis", "Elena"]
        ],
        "marketing" => [
            "junior" => ["Sofia"],
            "senior" => ["Carmen"]
        ]
    ],
    "barcelona" => [
        "desarrollo" => [
            "junior" => ["Miguel"],
            "senior" => ["Fernando"]
        ]
    ]
];
```

#### 3. Datos de Ventas Temporales
```php
$ventas = [
    "2024" => [
        "enero" => [
            "semana_1" => 1200,
            "semana_2" => 1450,
            "semana_3" => 1680,
            "semana_4" => 1320
        ],
        "febrero" => [
            "semana_1" => 1100,
            "semana_2" => 1250
        ]
    ]
];
```

### Recorrido de Arrays 3D

```php
// Triple foreach para recorrer completamente
foreach ($empresa as $ciudad => $departamentos) {
    echo "Ciudad: $ciudad\n";
    foreach ($departamentos as $depto => $niveles) {
        echo "  Departamento: $depto\n";
        foreach ($niveles as $nivel => $empleados) {
            echo "    Nivel $nivel: " . implode(", ", $empleados) . "\n";
        }
    }
}
```

### Análisis de Arrays 3D

#### Calcular Totales
```php
// Total de ventas por año
foreach ($ventas as $año => $meses) {
    $total_año = 0;
    foreach ($meses as $mes => $semanas) {
        $total_mes = array_sum($semanas);
        $total_año += $total_mes;
    }
    echo "Total $año: $total_año\n";
}
```

#### Encontrar Máximos/Mínimos
```php
// Encontrar la mejor semana de ventas
$mejor_semana = 0;
$info_mejor = [];

foreach ($ventas as $año => $meses) {
    foreach ($meses as $mes => $semanas) {
        foreach ($semanas as $semana => $venta) {
            if ($venta > $mejor_semana) {
                $mejor_semana = $venta;
                $info_mejor = [$año, $mes, $semana];
            }
        }
    }
}
```

---

## Manipulación de Arrays

### Operaciones Básicas

#### Agregar Elementos
```php
$array = [1, 2, 3];

// Al final
array_push($array, 4, 5);        // [1, 2, 3, 4, 5]
$array[] = 6;                    // [1, 2, 3, 4, 5, 6]

// Al inicio
array_unshift($array, 0);        // [0, 1, 2, 3, 4, 5, 6]
```

#### Eliminar Elementos
```php
// Del final
$ultimo = array_pop($array);     // Elimina y retorna último

// Del inicio
$primero = array_shift($array);  // Elimina y retorna primero

// Por clave/índice
unset($array[2]);                // Elimina elemento en índice 2
```

#### Búsqueda
```php
$frutas = ["manzana", "banana", "naranja"];

// Buscar valor
$posicion = array_search("banana", $frutas);  // 1

// Verificar existencia
$existe = in_array("uva", $frutas);          // false

// Buscar con función personalizada
$resultado = array_filter($frutas, function($fruta) {
    return strlen($fruta) > 6;
});
```

### Funciones Avanzadas

#### array_map() - Transformar elementos
```php
$numeros = [1, 2, 3, 4, 5];
$cuadrados = array_map(function($n) {
    return $n * $n;
}, $numeros);
// Resultado: [1, 4, 9, 16, 25]
```

#### array_filter() - Filtrar elementos
```php
$numeros = [1, 2, 3, 4, 5, 6];
$pares = array_filter($numeros, function($n) {
    return $n % 2 == 0;
});
// Resultado: [2, 4, 6]
```

#### array_reduce() - Reducir a un valor
```php
$numeros = [1, 2, 3, 4, 5];
$suma = array_reduce($numeros, function($carry, $item) {
    return $carry + $item;
}, 0);
// Resultado: 15
```

#### Manipulación de Arrays
```php
$array = [1, 2, 3, 4, 5];

// Extraer porción
$slice = array_slice($array, 1, 3);     // [2, 3, 4]

// Dividir en chunks
$chunks = array_chunk($array, 2);       // [[1, 2], [3, 4], [5]]

// Voltear
$reverse = array_reverse($array);       // [5, 4, 3, 2, 1]

// Eliminar duplicados
$unicos = array_unique([1, 2, 2, 3]);   // [1, 2, 3]

// Combinar arrays
$merge = array_merge([1, 2], [3, 4]);   // [1, 2, 3, 4]
```

### Ordenamiento

#### Ordenamiento Básico
```php
$numeros = [3, 1, 4, 1, 5];

sort($numeros);          // [1, 1, 3, 4, 5] - ascendente
rsort($numeros);         // [5, 4, 3, 1, 1] - descendente
```

#### Ordenamiento Manteniendo Claves
```php
$edades = ["Juan" => 25, "Ana" => 30, "Pedro" => 20];

asort($edades);          // Ordenar por valores
ksort($edades);          // Ordenar por claves
arsort($edades);         // Descendente por valores
krsort($edades);         // Descendente por claves
```

#### Ordenamiento Personalizado
```php
$estudiantes = [
    ["nombre" => "Juan", "nota" => 85],
    ["nombre" => "Ana", "nota" => 92]
];

usort($estudiantes, function($a, $b) {
    return $b["nota"] <=> $a["nota"];  // Por nota descendente
});
```

---

## Algoritmos y Análisis

### Algoritmos de Búsqueda

#### Búsqueda Lineal
```php
function busqueda_lineal($array, $valor) {
    for ($i = 0; $i < count($array); $i++) {
        if ($array[$i] == $valor) {
            return $i;
        }
    }
    return -1;
}

// Complejidad: O(n)
// Uso: Arrays no ordenados
```

#### Búsqueda Binaria
```php
function busqueda_binaria($array, $valor) {
    $izq = 0;
    $der = count($array) - 1;
    
    while ($izq <= $der) {
        $medio = intval(($izq + $der) / 2);
        
        if ($array[$medio] == $valor) {
            return $medio;
        } elseif ($array[$medio] < $valor) {
            $izq = $medio + 1;
        } else {
            $der = $medio - 1;
        }
    }
    return -1;
}

// Complejidad: O(log n)
// Requisito: Array ordenado
```

### Algoritmos de Ordenamiento

#### Ordenamiento Burbuja
```php
function ordenamiento_burbuja($array) {
    $n = count($array);
    for ($i = 0; $i < $n - 1; $i++) {
        for ($j = 0; $j < $n - $i - 1; $j++) {
            if ($array[$j] > $array[$j + 1]) {
                // Intercambiar
                $temp = $array[$j];
                $array[$j] = $array[$j + 1];
                $array[$j + 1] = $temp;
            }
        }
    }
    return $array;
}

// Complejidad: O(n²)
// Uso: Didáctico, arrays pequeños
```

### Análisis Estadístico

#### Estadísticas Básicas
```php
function estadisticas_basicas($array) {
    return [
        "cantidad" => count($array),
        "suma" => array_sum($array),
        "promedio" => array_sum($array) / count($array),
        "maximo" => max($array),
        "minimo" => min($array),
        "rango" => max($array) - min($array)
    ];
}
```

#### Mediana
```php
function calcular_mediana($array) {
    sort($array);
    $n = count($array);
    
    if ($n % 2 == 0) {
        // Par: promedio de los dos centrales
        return ($array[$n/2 - 1] + $array[$n/2]) / 2;
    } else {
        // Impar: elemento central
        return $array[floor($n/2)];
    }
}
```

#### Moda
```php
function calcular_moda($array) {
    $frecuencias = array_count_values($array);
    $max_frecuencia = max($frecuencias);
    $modas = array_keys($frecuencias, $max_frecuencia);
    
    return [
        "valores" => $modas,
        "frecuencia" => $max_frecuencia
    ];
}
```

#### Percentiles
```php
function calcular_percentil($array, $percentil) {
    sort($array);
    $indice = ($percentil / 100) * (count($array) - 1);
    $bajo = floor($indice);
    $alto = ceil($indice);
    
    if ($bajo == $alto) {
        return $array[$bajo];
    } else {
        $peso = $indice - $bajo;
        return $array[$bajo] * (1 - $peso) + $array[$alto] * $peso;
    }
}
```

### Validación y Limpieza

#### Validación de Datos
```php
function validar_email($email) {
    return filter_var($email, FILTER_VALIDATE_EMAIL) !== false;
}

function validar_edad($edad) {
    return is_numeric($edad) && $edad >= 0 && $edad <= 120;
}

function validar_telefono($telefono) {
    $limpio = preg_replace("/[^0-9]/", "", $telefono);
    return strlen($limpio) >= 10;
}
```

#### Limpieza de Datos
```php
function limpiar_string($texto) {
    $texto = trim($texto);                    // Eliminar espacios
    $texto = htmlspecialchars($texto);        // Escapar HTML
    $texto = strip_tags($texto);              // Eliminar tags
    return $texto;
}

function limpiar_array($array) {
    return array_map(function($valor) {
        if (is_string($valor)) {
            return limpiar_string($valor);
        }
        return $valor;
    }, $array);
}
```

---

## Mejores Prácticas

### 1. Nomenclatura y Estructura

#### Variables Descriptivas
```php
// ❌ Malo
$d = ["Juan", "Ana"];
$x = 25;

// ✅ Bueno
$nombres_estudiantes = ["Juan", "Ana"];
$edad_minima = 25;
```

#### Estructura Consistente
```php
// ✅ Estructura clara para arrays asociativos
$usuario = [
    "id" => 123,
    "datos_personales" => [
        "nombre" => "Juan",
        "apellido" => "Pérez",
        "email" => "juan@email.com"
    ],
    "configuracion" => [
        "tema" => "oscuro",
        "idioma" => "es"
    ]
];
```

### 2. Validación y Seguridad

#### Validar Antes de Usar
```php
function procesar_array($array) {
    if (!is_array($array) || empty($array)) {
        throw new InvalidArgumentException("Array válido requerido");
    }
    
    foreach ($array as $item) {
        if (!is_string($item)) {
            throw new InvalidArgumentException("Solo strings permitidos");
        }
    }
    
    return array_map('strtolower', $array);
}
```

#### Escapar Datos de Usuario
```php
function mostrar_datos_usuario($datos) {
    $datos_seguros = [];
    
    foreach ($datos as $clave => $valor) {
        if (is_string($valor)) {
            $datos_seguros[$clave] = htmlspecialchars($valor, ENT_QUOTES);
        } else {
            $datos_seguros[$clave] = $valor;
        }
    }
    
    return $datos_seguros;
}
```

### 3. Rendimiento

#### Usar Funciones Nativas
```php
// ❌ Lento
$suma = 0;
foreach ($numeros as $numero) {
    $suma += $numero;
}

// ✅ Rápido
$suma = array_sum($numeros);
```

#### Evitar Bucles Innecesarios
```php
// ❌ Ineficiente
$encontrado = false;
foreach ($array as $item) {
    if ($item == $buscar) {
        $encontrado = true;
        break;
    }
}

// ✅ Eficiente
$encontrado = in_array($buscar, $array);
```

### 4. Manejo de Errores

#### Verificar Existencia
```php
function obtener_valor_seguro($array, $clave, $default = null) {
    return isset($array[$clave]) ? $array[$clave] : $default;
}

// Uso
$nombre = obtener_valor_seguro($usuario, "nombre", "Anónimo");
```

#### Validar Tipos
```php
function sumar_numeros($array) {
    if (!is_array($array)) {
        return 0;
    }
    
    $suma = 0;
    foreach ($array as $valor) {
        if (is_numeric($valor)) {
            $suma += $valor;
        }
    }
    
    return $suma;
}
```

---

## Ejemplos Prácticos

### 1. Sistema de Calificaciones

```php
class SistemaCalificaciones {
    private $estudiantes = [];
    
    public function agregar_estudiante($nombre, $calificaciones) {
        $this->estudiantes[$nombre] = [
            "calificaciones" => $calificaciones,
            "promedio" => array_sum($calificaciones) / count($calificaciones)
        ];
    }
    
    public function obtener_ranking() {
        $ranking = $this->estudiantes;
        uasort($ranking, function($a, $b) {
            return $b["promedio"] <=> $a["promedio"];
        });
        return $ranking;
    }
    
    public function estadisticas_generales() {
        $todos_promedios = array_column($this->estudiantes, "promedio");
        
        return [
            "promedio_general" => array_sum($todos_promedios) / count($todos_promedios),
            "mejor_promedio" => max($todos_promedios),
            "peor_promedio" => min($todos_promedios),
            "mediana" => $this->calcular_mediana($todos_promedios)
        ];
    }
}
```

### 2. Análisis de Ventas

```php
class AnalisisVentas {
    private $ventas_3d = [];
    
    public function agregar_venta($region, $mes, $producto, $cantidad) {
        $this->ventas_3d[$region][$mes][$producto] = $cantidad;
    }
    
    public function total_por_region($region) {
        $total = 0;
        if (isset($this->ventas_3d[$region])) {
            foreach ($this->ventas_3d[$region] as $mes => $productos) {
                $total += array_sum($productos);
            }
        }
        return $total;
    }
    
    public function producto_mas_vendido() {
        $totales_producto = [];
        
        foreach ($this->ventas_3d as $region => $meses) {
            foreach ($meses as $mes => $productos) {
                foreach ($productos as $producto => $cantidad) {
                    if (!isset($totales_producto[$producto])) {
                        $totales_producto[$producto] = 0;
                    }
                    $totales_producto[$producto] += $cantidad;
                }
            }
        }
        
        arsort($totales_producto);
        return array_key_first($totales_producto);
    }
}
```

### 3. Validador de Formularios

```php
class ValidadorFormulario {
    private $reglas = [];
    private $errores = [];
    
    public function agregar_regla($campo, $tipo, $parametros = []) {
        $this->reglas[$campo] = ["tipo" => $tipo, "parametros" => $parametros];
    }
    
    public function validar($datos) {
        $this->errores = [];
        
        foreach ($this->reglas as $campo => $regla) {
            $valor = isset($datos[$campo]) ? $datos[$campo] : null;
            
            if (!$this->validar_campo($campo, $valor, $regla)) {
                continue;
            }
        }
        
        return empty($this->errores);
    }
    
    private function validar_campo($campo, $valor, $regla) {
        switch ($regla["tipo"]) {
            case "requerido":
                if (empty($valor)) {
                    $this->errores[$campo] = "Campo requerido";
                    return false;
                }
                break;
                
            case "email":
                if (!filter_var($valor, FILTER_VALIDATE_EMAIL)) {
                    $this->errores[$campo] = "Email inválido";
                    return false;
                }
                break;
                
            case "rango":
                $min = $regla["parametros"]["min"] ?? 0;
                $max = $regla["parametros"]["max"] ?? PHP_INT_MAX;
                if ($valor < $min || $valor > $max) {
                    $this->errores[$campo] = "Valor fuera de rango";
                    return false;
                }
                break;
        }
        
        return true;
    }
    
    public function obtener_errores() {
        return $this->errores;
    }
}
```

---

## Casos de Uso Avanzados

### 1. Cache de Arrays

```php
class CacheArray {
    private static $cache = [];
    
    public static function obtener($clave, $callback) {
        if (!isset(self::$cache[$clave])) {
            self::$cache[$clave] = $callback();
        }
        return self::$cache[$clave];
    }
    
    public static function limpiar($clave = null) {
        if ($clave) {
            unset(self::$cache[$clave]);
        } else {
            self::$cache = [];
        }
    }
}

// Uso
$datos_pesados = CacheArray::obtener('usuarios', function() {
    // Simulación de operación costosa
    return range(1, 10000);
});
```

### 2. Pipeline de Transformación

```php
class ArrayPipeline {
    private $data;
    
    public function __construct($data) {
        $this->data = $data;
    }
    
    public function filtrar($callback) {
        $this->data = array_filter($this->data, $callback);
        return $this;
    }
    
    public function mapear($callback) {
        $this->data = array_map($callback, $this->data);
        return $this;
    }
    
    public function ordenar($callback = null) {
        if ($callback) {
            usort($this->data, $callback);
        } else {
            sort($this->data);
        }
        return $this;
    }
    
    public function obtener() {
        return $this->data;
    }
}

// Uso
$resultado = (new ArrayPipeline([1, 2, 3, 4, 5, 6]))
    ->filtrar(function($n) { return $n % 2 == 0; })
    ->mapear(function($n) { return $n * 2; })
    ->ordenar()
    ->obtener();
```

---

## Conclusiones

### Conceptos Clave Aprendidos

1. **Variables Básicas**: Comprensión de tipos dinámicos en PHP
2. **Arrays 1D**: Dominio de diferentes métodos de creación y manipulación
3. **Arrays 2D**: Manejo de estructuras tabulares y matrices
4. **Arrays 3D**: Gestión de datos complejos multidimensionales
5. **Algoritmos**: Implementación de búsqueda, ordenamiento y análisis
6. **Validación**: Técnicas de limpieza y verificación de datos
7. **Optimización**: Mejores prácticas para rendimiento y mantenibilidad

### Ventajas de Dominar Arrays en PHP

#### 1. Flexibilidad de Datos
- **Tipado dinámico** permite almacenar diferentes tipos
- **Estructuras mixtas** (indexadas y asociativas)
- **Crecimiento dinámico** sin declaración de tamaño

#### 2. Funciones Integradas
- **Más de 70 funciones** nativas para arrays
- **Rendimiento optimizado** en el núcleo de PHP
- **Sintaxis expresiva** para operaciones complejas

#### 3. Casos de Uso Reales
- **APIs JSON** ↔ Arrays PHP conversión natural
- **Bases de datos** resultados como arrays asociativos
- **Configuraciones** estructuras jerárquicas
- **Cachés** almacenamiento en memoria

### Recomendaciones para Proyectos

#### 1. Estructura de Datos
- **Planificar** la estructura antes de implementar
- **Documentar** el formato esperado de arrays complejos
- **Validar** entrada de datos externos
- **Normalizar** estructuras para consistencia

#### 2. Rendimiento
- **Usar** funciones nativas cuando sea posible
- **Evitar** bucles anidados profundos
- **Implementar** cache para operaciones costosas
- **Perfilar** código con arrays grandes

#### 3. Mantenibilidad
- **Nombrar** variables descriptivamente
- **Comentar** estructuras complejas
- **Modularizar** lógica en funciones/clases
- **Testing** con diferentes tipos de datos

### Próximos Pasos

#### 1. Profundización
- **SPL (Standard PHP Library)** estructuras de datos avanzadas
- **Iteradores** para manejo eficiente de memoria
- **Generadores** para conjuntos de datos grandes
- **Reflection** para análisis dinámico de arrays

#### 2. Frameworks y Librerías
- **Collections** en Laravel (Eloquent Collections)
- **Doctrine Collections** para ORM
- **Symfony OptionsResolver** para validación
- **Respect/Validation** para reglas complejas

#### 3. Casos Avanzados
- **Big Data** procesamiento de datasets grandes
- **APIs REST** serialización/deserialización
- **Machine Learning** preparación de datos
- **Microservicios** intercambio de información

---

**Fecha de Creación**: 8 de Julio, 2025  
**Versión**: 1.0  
**Autor**: Sistema de Desarrollo  
**Licencia**: MIT

---

## Recursos Adicionales

### Documentación Oficial
- [PHP Manual - Arrays](https://www.php.net/manual/en/language.types.array.php)
- [PHP Array Functions](https://www.php.net/manual/en/ref.array.php)
- [PHP Variable Functions](https://www.php.net/manual/en/ref.var.php)

### Herramientas Recomendadas
- **PHPStan**: Análisis estático para detectar errores en arrays
- **Psalm**: Verificación de tipos estática
- **XDebug**: Profiling y debugging de arrays grandes
- **Blackfire**: Profiling de rendimiento

### Librerías Útiles
- **ramsey/collection**: Collections inmutables
- **doctrine/collections**: Collections avanzadas
- **illuminate/collections**: Laravel Collections standalone
- **mtdowling/jmespath.php**: Query language para arrays
