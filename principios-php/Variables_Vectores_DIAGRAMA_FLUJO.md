# Diagrama de Flujo - Variables y Vectores en PHP

## Flujo Principal del Sistema

```
┌─────────────────────────────────────────┐
│              INICIO                      │
└─────────────────┬───────────────────────┘
                  │
                  ▼
┌─────────────────────────────────────────┐
│    1. FUNDAMENTOS DE VARIABLES          │
│                                         │
│  ┌─────────────────────────────────┐    │
│  │  Declarar variables básicas     │    │
│  │  - $entero = 42                 │    │
│  │  - $decimal = 3.14              │    │
│  │  - $cadena = "texto"            │    │
│  │  - $booleano = true             │    │
│  │  - $nulo = null                 │    │
│  └─────────────────────────────────┘    │
│                                         │
│  ┌─────────────────────────────────┐    │
│  │  Verificar tipos                │    │
│  │  - gettype()                    │    │
│  │  - var_export()                 │    │
│  └─────────────────────────────────┘    │
└─────────────────┬───────────────────────┘
                  │
                  ▼
┌─────────────────────────────────────────┐
│    2. ARRAYS UNIDIMENSIONALES (1D)      │
│                                         │
│  ┌─────────────────────────────────┐    │
│  │  Métodos de creación:           │    │
│  │  ┌─────────────────────────┐    │    │
│  │  │ array(1, 2, 3)          │    │    │
│  │  └─────────────────────────┘    │    │
│  │  ┌─────────────────────────┐    │    │
│  │  │ [1, 2, 3]               │    │    │
│  │  └─────────────────────────┘    │    │
│  │  ┌─────────────────────────┐    │    │
│  │  │ ["a" => 1, "b" => 2]    │    │    │
│  │  └─────────────────────────┘    │    │
│  │  ┌─────────────────────────┐    │    │
│  │  │ range(1, 10)            │    │    │
│  │  └─────────────────────────┘    │    │
│  └─────────────────────────────────┘    │
└─────────────────┬───────────────────────┘
                  │
                  ▼
┌─────────────────────────────────────────┐
│    3. ARRAYS BIDIMENSIONALES (2D)       │
│                                         │
│  ┌─────────────────────────────────┐    │
│  │  Crear matriz 2D                │    │
│  │  array(                         │    │
│  │    array(1, 2, 3),              │    │
│  │    array(4, 5, 6)               │    │
│  │  )                              │    │
│  └─────────────────────────────────┘    │
│                                         │
│  ┌─────────────────────────────────┐    │
│  │  Recorrer con doble foreach     │    │
│  │  foreach($matriz as $fila)      │    │
│  │    foreach($fila as $elemento)  │    │
│  └─────────────────────────────────┘    │
└─────────────────┬───────────────────────┘
                  │
                  ▼
┌─────────────────────────────────────────┐
│    4. ARRAYS TRIDIMENSIONALES (3D)      │
│                                         │
│  ┌─────────────────────────────────┐    │
│  │  Crear cubo 3D                  │    │
│  │  array(                         │    │
│  │    "capa1" => array(            │    │
│  │      "fila1" => array(1, 2),    │    │
│  │      "fila2" => array(3, 4)     │    │
│  │    )                            │    │
│  │  )                              │    │
│  └─────────────────────────────────┘    │
│                                         │
│  ┌─────────────────────────────────┐    │
│  │  Recorrer con triple foreach    │    │
│  │  foreach($cubo as $capa)        │    │
│  │    foreach($capa as $fila)      │    │
│  │      foreach($fila as $elem)    │    │
│  └─────────────────────────────────┘    │
└─────────────────┬───────────────────────┘
                  │
                  ▼
┌─────────────────────────────────────────┐
│    5. MANIPULACIÓN DE ARRAYS            │
│                                         │
│  ┌─────────────────────────────────┐    │
│  │  Operaciones básicas:           │    │
│  │  - array_push() (agregar)       │    │
│  │  - array_pop() (quitar final)   │    │
│  │  - array_shift() (quitar inicio)│    │
│  │  - array_unshift() (agregar ini)│    │
│  └─────────────────────────────────┘    │
│                                         │
│  ┌─────────────────────────────────┐    │
│  │  Búsqueda y filtrado:           │    │
│  │  - array_search()              │    │
│  │  - in_array()                  │    │
│  │  - array_filter()              │    │
│  └─────────────────────────────────┘    │
└─────────────────┬───────────────────────┘
                  │
                  ▼
┌─────────────────────────────────────────┐
│    6. ORDENAMIENTO                      │
│                                         │
│  ┌─────────────────────────────────┐    │
│  │  Tipos de ordenamiento:         │    │
│  │  - sort() (ascendente)          │    │
│  │  - rsort() (descendente)        │    │
│  │  - asort() (mantiene claves)    │    │
│  │  - ksort() (por claves)         │    │
│  │  - usort() (personalizado)      │    │
│  └─────────────────────────────────┘    │
└─────────────────┬───────────────────────┘
                  │
                  ▼
┌─────────────────────────────────────────┐
│    7. ALGORITMOS AVANZADOS              │
│                                         │
│  ┌─────────────────────────────────┐    │
│  │  - Búsqueda lineal              │    │
│  │  - Búsqueda binaria             │    │
│  │  - Ordenamiento burbuja         │    │
│  │  - Análisis estadístico         │    │
│  └─────────────────────────────────┘    │
└─────────────────┬───────────────────────┘
                  │
                  ▼
┌─────────────────────────────────────────┐
│                  FIN                    │
└─────────────────────────────────────────┘
```

## Flujo de Creación de Arrays 1D

```
┌─────────────────────────────────────────┐
│        Crear Array 1D                   │
└─────────────────┬───────────────────────┘
                  │
                  ▼
┌─────────────────────────────────────────┐
│    ¿Qué tipo de array crear?            │
└─────────────────┬───────────────────────┘
                  │
        ┌─────────┼─────────┐
        │         │         │
        ▼         ▼         ▼
┌─────────────┐ ┌─────────────┐ ┌─────────────┐
│   Indexado  │ │ Asociativo  │ │    Mixto    │
│             │ │             │ │             │
│ [1, 2, 3]   │ │["a" => 1]   │ │[0 => "a",   │
│ array(1,2)  │ │array("a"=>1)│ │"key" => "b"]│
└─────────────┘ └─────────────┘ └─────────────┘
        │         │         │
        └─────────┼─────────┘
                  │
                  ▼
┌─────────────────────────────────────────┐
│         Array Creado                    │
└─────────────────────────────────────────┘
```

## Flujo de Manipulación de Arrays

```
┌─────────────────────────────────────────┐
│          Array Existente                │
└─────────────────┬───────────────────────┘
                  │
                  ▼
┌─────────────────────────────────────────┐
│    ¿Qué operación realizar?             │
└─────────────────┬───────────────────────┘
                  │
        ┌─────────┼─────────┐
        │         │         │
        ▼         ▼         ▼
┌─────────────┐ ┌─────────────┐ ┌─────────────┐
│   Agregar   │ │   Eliminar  │ │   Buscar    │
│             │ │             │ │             │
│array_push() │ │ array_pop() │ │array_search│
│array_unshift│ │array_shift()│ │ in_array() │
└─────────────┘ └─────────────┘ └─────────────┘
        │         │         │
        │         │         │
        ▼         ▼         ▼
┌─────────────┐ ┌─────────────┐ ┌─────────────┐
│ ¿Al final?  │ │¿Del final?  │ │¿Encontrado? │
└─────────────┘ └─────────────┘ └─────────────┘
        │         │         │
       SI        SI        SI
        │         │         │
        ▼         ▼         ▼
┌─────────────┐ ┌─────────────┐ ┌─────────────┐
│array_push() │ │array_pop()  │ │Devolver pos.│
└─────────────┘ └─────────────┘ └─────────────┘
        │         │         │
       NO        NO        NO
        │         │         │
        ▼         ▼         ▼
┌─────────────┐ ┌─────────────┐ ┌─────────────┐
│array_unshift│ │array_shift()│ │Devolver -1  │
└─────────────┘ └─────────────┘ └─────────────┘
```

## Flujo de Ordenamiento

```
┌─────────────────────────────────────────┐
│       Array Desordenado                 │
└─────────────────┬───────────────────────┘
                  │
                  ▼
┌─────────────────────────────────────────┐
│    ¿Tipo de ordenamiento?               │
└─────────────────┬───────────────────────┘
                  │
        ┌─────────┼─────────┐
        │         │         │
        ▼         ▼         ▼
┌─────────────┐ ┌─────────────┐ ┌─────────────┐
│Por valores  │ │ Por claves  │ │Personalizado│
└─────────────┘ └─────────────┘ └─────────────┘
        │         │         │
        ▼         ▼         ▼
┌─────────────┐ ┌─────────────┐ ┌─────────────┐
│¿Ascendente? │ │¿Ascendente? │ │Definir func.│
└─────────────┘ └─────────────┘ └─────────────┘
        │         │         │
       SI        SI         │
        │         │         ▼
        ▼         ▼    ┌─────────────┐
┌─────────────┐ ┌─────────────┐ │   usort()   │
│   sort()    │ │   ksort()   │ └─────────────┘
└─────────────┘ └─────────────┘         │
        │         │                     │
       NO        NO                     │
        │         │                     │
        ▼         ▼                     │
┌─────────────┐ ┌─────────────┐         │
│   rsort()   │ │  krsort()   │         │
└─────────────┘ └─────────────┘         │
        │         │                     │
        └─────────┼─────────────────────┘
                  │
                  ▼
┌─────────────────────────────────────────┐
│         Array Ordenado                  │
└─────────────────────────────────────────┘
```

## Flujo de Búsqueda Binaria

```
┌─────────────────────────────────────────┐
│    Array Ordenado + Valor a Buscar     │
└─────────────────┬───────────────────────┘
                  │
                  ▼
┌─────────────────────────────────────────┐
│    Inicializar: izq=0, der=n-1         │
└─────────────────┬───────────────────────┘
                  │
                  ▼
┌─────────────────────────────────────────┐
│           ¿izq <= der?                  │
└─────────────────┬───────────────────────┘
                  │
                 SI
                  │
                  ▼
┌─────────────────────────────────────────┐
│      medio = (izq + der) / 2            │
└─────────────────┬───────────────────────┘
                  │
                  ▼
┌─────────────────────────────────────────┐
│      ¿array[medio] == valor?            │
└─────────────────┬───────────────────────┘
                  │
        ┌─────────┼─────────┐
       SI         │        NO
        │         │         │
        ▼         ▼         ▼
┌─────────────┐ ┌─────────────┐ ┌─────────────┐
│ Encontrado  │ │¿array[medio]│ │¿array[medio]│
│Devolver pos.│ │  < valor?   │ │  > valor?   │
└─────────────┘ └─────────────┘ └─────────────┘
                        │         │
                       SI        SI
                        │         │
                        ▼         ▼
                ┌─────────────┐ ┌─────────────┐
                │ izq=medio+1 │ │ der=medio-1 │
                └─────────────┘ └─────────────┘
                        │         │
                        └────┬────┘
                             │
                             ▼
                    ┌─────────────────┐
                    │  Repetir bucle  │
                    └─────────────────┘
                             │
                            NO (izq > der)
                             │
                             ▼
                    ┌─────────────────┐
                    │  No encontrado  │
                    │  Devolver -1    │
                    └─────────────────┘
```

## Flujo de Análisis Estadístico

```
┌─────────────────────────────────────────┐
│         Array de Datos                  │
└─────────────────┬───────────────────────┘
                  │
                  ▼
┌─────────────────────────────────────────┐
│      Calcular Estadísticas Básicas     │
│                                         │
│  ┌─────────────────────────────────┐    │
│  │  - count() → cantidad           │    │
│  │  - array_sum() → suma total     │    │
│  │  - suma/cantidad → promedio     │    │
│  │  - max() → valor máximo         │    │
│  │  - min() → valor mínimo         │    │
│  └─────────────────────────────────┘    │
└─────────────────┬───────────────────────┘
                  │
                  ▼
┌─────────────────────────────────────────┐
│        Ordenar Array                    │
│          sort($array)                   │
└─────────────────┬───────────────────────┘
                  │
                  ▼
┌─────────────────────────────────────────┐
│         Calcular Mediana                │
│                                         │
│  ┌─────────────────────────────────┐    │
│  │      ¿Cantidad es par?          │    │
│  │  ┌─────────────┬─────────────┐  │    │
│  │  │     SI      │     NO      │  │    │
│  │  │             │             │  │    │
│  │  │ Promedio de │ Elemento    │  │    │
│  │  │ 2 centrales │ central     │  │    │
│  │  └─────────────┴─────────────┘  │    │
│  └─────────────────────────────────┘    │
└─────────────────┬───────────────────────┘
                  │
                  ▼
┌─────────────────────────────────────────┐
│          Calcular Moda                  │
│                                         │
│  ┌─────────────────────────────────┐    │
│  │  array_count_values()           │    │
│  │  → frecuencias                  │    │
│  │                                 │    │
│  │  max(frecuencias)               │    │
│  │  → máxima frecuencia            │    │
│  │                                 │    │
│  │  array_keys() con max_freq      │    │
│  │  → valores más frecuentes       │    │
│  └─────────────────────────────────┘    │
└─────────────────┬───────────────────────┘
                  │
                  ▼
┌─────────────────────────────────────────┐
│        Calcular Percentiles             │
│                                         │
│  ┌─────────────────────────────────┐    │
│  │  Para percentil P:              │    │
│  │  índice = (P/100) * (n-1)       │    │
│  │                                 │    │
│  │  Si índice es entero:           │    │
│  │    valor = array[índice]        │    │
│  │  Si no:                         │    │
│  │    interpolar entre valores     │    │
│  └─────────────────────────────────┘    │
└─────────────────┬───────────────────────┘
                  │
                  ▼
┌─────────────────────────────────────────┐
│      Mostrar Resultados                 │
└─────────────────────────────────────────┘
```

## Flujo de Validación de Datos

```
┌─────────────────────────────────────────┐
│       Array de Datos Crudos            │
└─────────────────┬───────────────────────┘
                  │
                  ▼
┌─────────────────────────────────────────┐
│      Foreach campo en datos             │
└─────────────────┬───────────────────────┘
                  │
                  ▼
┌─────────────────────────────────────────┐
│       ¿Qué tipo de campo?               │
└─────────────────┬───────────────────────┘
                  │
        ┌─────────┼─────────┐
        │         │         │
        ▼         ▼         ▼
┌─────────────┐ ┌─────────────┐ ┌─────────────┐
│   Nombre    │ │    Email    │ │    Edad     │
│             │ │             │ │             │
│ trim()      │ │strtolower() │ │ intval()    │
│ ucwords()   │ │filter_var() │ │ validar     │
└─────────────┘ └─────────────┘ │ rango       │
        │         │         └─────────────┘
        │         │         │
        │         ▼         ▼
        │ ┌─────────────┐ ┌─────────────┐
        │ │¿Email valid?│ │¿Edad valid? │
        │ └─────────────┘ └─────────────┘
        │         │         │
        │        SI        SI
        │         │         │
        └─────────┼─────────┘
                  │
                  ▼
┌─────────────────────────────────────────┐
│      Agregar a datos limpios            │
└─────────────────┬───────────────────────┘
                  │
                  ▼
┌─────────────────────────────────────────┐
│     ¿Más campos por procesar?           │
└─────────────────┬───────────────────────┘
                  │
                 SI
                  │
                  ▼
        ┌─────────────────┐
        │  Siguiente      │
        │  campo          │
        └─────────────────┘
                  │
                 NO
                  │
                  ▼
┌─────────────────────────────────────────┐
│       Datos Validados y Limpios        │
└─────────────────────────────────────────┘
```
