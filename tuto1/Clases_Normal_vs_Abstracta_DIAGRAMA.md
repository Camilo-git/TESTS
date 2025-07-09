# Diagrama de Flujo - Clases Normales vs Abstractas

## Flujo Principal de Decisión

```
┌─────────────────────────────────────────┐
│            CREAR CLASE                  │
└─────────────────┬───────────────────────┘
                  │
                  ▼
┌─────────────────────────────────────────┐
│    ¿Necesitas instanciar directamente?  │
└─────────────────┬───────────────────────┘
                  │
        ┌─────────┴─────────┐
        │                   │
       SI                   NO
        │                   │
        ▼                   ▼
┌─────────────────┐   ┌─────────────────┐
│  ¿Funcionalidad │   │ ¿Necesitas      │
│  completa?      │   │ garantizar      │
│                 │   │ implementación  │
│                 │   │ específica?     │
└─────────────────┘   └─────────────────┘
        │                   │
       SI                  SI
        │                   │
        ▼                   ▼
┌─────────────────┐   ┌─────────────────┐
│  CLASE NORMAL   │   │ CLASE ABSTRACTA │
│                 │   │                 │
│  class MiClase  │   │ abstract class  │
│  {              │   │ MiClase {       │
│    // métodos   │   │   // métodos    │
│    // concretos │   │   // concretos  │
│  }              │   │   // y abstractos│
│                 │   │ }               │
└─────────────────┘   └─────────────────┘
        │                   │
        ▼                   ▼
┌─────────────────┐   ┌─────────────────┐
│ Se puede usar   │   │ Crear clases    │
│ directamente    │   │ hijas que       │
│                 │   │ implementen     │
│ $obj = new      │   │ métodos         │
│ MiClase();      │   │ abstractos      │
└─────────────────┘   └─────────────────┘
```

## Flujo de Creación de Clase Normal

```
┌─────────────────────────────────────────┐
│         CLASE NORMAL (class)            │
└─────────────────┬───────────────────────┘
                  │
                  ▼
┌─────────────────────────────────────────┐
│      Declarar propiedades               │
│      private/protected/public           │
└─────────────────┬───────────────────────┘
                  │
                  ▼
┌─────────────────────────────────────────┐
│      Definir constructor                │
│      public function __construct()      │
└─────────────────┬───────────────────────┘
                  │
                  ▼
┌─────────────────────────────────────────┐
│      Implementar métodos concretos      │
│      (todos con implementación)         │
└─────────────────┬───────────────────────┘
                  │
                  ▼
┌─────────────────────────────────────────┐
│      ¿Más métodos necesarios?           │
└─────────────────┬───────────────────────┘
                  │
        ┌─────────┴─────────┐
        │                   │
       SI                   NO
        │                   │
        ▼                   ▼
┌─────────────────┐   ┌─────────────────┐
│  Agregar más    │   │  Clase lista    │
│  métodos        │   │  para usar      │
│  concretos      │   │                 │
└─────────────────┘   │  $obj = new     │
        │             │  MiClase();     │
        │             │                 │
        └─────────────┤  $obj->metodo();│
                      └─────────────────┘
```

## Flujo de Creación de Clase Abstracta

```
┌─────────────────────────────────────────┐
│      CLASE ABSTRACTA (abstract)         │
└─────────────────┬───────────────────────┘
                  │
                  ▼
┌─────────────────────────────────────────┐
│      Declarar propiedades               │
│      protected (para herencia)          │
└─────────────────┬───────────────────────┘
                  │
                  ▼
┌─────────────────────────────────────────┐
│      Definir constructor                │
│      public function __construct()      │
└─────────────────┬───────────────────────┘
                  │
                  ▼
┌─────────────────────────────────────────┐
│      Implementar métodos CONCRETOS      │
│      (código compartido)                │
└─────────────────┬───────────────────────┘
                  │
                  ▼
┌─────────────────────────────────────────┐
│      Declarar métodos ABSTRACTOS        │
│      abstract public function metodo(); │
└─────────────────┬───────────────────────┘
                  │
                  ▼
┌─────────────────────────────────────────┐
│      ¿Más métodos abstractos?           │
└─────────────────┬───────────────────────┘
                  │
        ┌─────────┴─────────┐
        │                   │
       SI                   NO
        │                   │
        ▼                   ▼
┌─────────────────┐   ┌─────────────────┐
│  Agregar más    │   │  Clase abstracta│
│  métodos        │   │  terminada      │
│  abstractos     │   │                 │
└─────────────────┘   │  Crear clases   │
        │             │  hijas          │
        │             │                 │
        └─────────────┤                 │
                      └─────────────────┘
```

## Flujo de Implementación de Clase Hija

```
┌─────────────────────────────────────────┐
│      CLASE HIJA (extends abstracta)     │
└─────────────────┬───────────────────────┘
                  │
                  ▼
┌─────────────────────────────────────────┐
│      class Hija extends Abstracta       │
└─────────────────┬───────────────────────┘
                  │
                  ▼
┌─────────────────────────────────────────┐
│      Definir constructor                │
│      parent::__construct()              │
└─────────────────┬───────────────────────┘
                  │
                  ▼
┌─────────────────────────────────────────┐
│      Implementar TODOS los métodos      │
│      abstractos (OBLIGATORIO)           │
└─────────────────┬───────────────────────┘
                  │
                  ▼
┌─────────────────────────────────────────┐
│      ¿Quedan métodos abstractos?        │
└─────────────────┬───────────────────────┘
                  │
        ┌─────────┴─────────┐
        │                   │
       SI                   NO
        │                   │
        ▼                   ▼
┌─────────────────┐   ┌─────────────────┐
│  Implementar    │   │  Clase hija     │
│  método faltante│   │  completa       │
│                 │   │                 │
│  ERROR si no    │   │  $obj = new     │
│  implementa     │   │  Hija();        │
└─────────────────┘   │                 │
        │             │  $obj->metodo();│
        │             │                 │
        └─────────────┤                 │
                      └─────────────────┘
```

## Flujo de Decisión: ¿Cuándo usar cada una?

```
┌─────────────────────────────────────────┐
│      NECESIDAD DE DISEÑO                │
└─────────────────┬───────────────────────┘
                  │
                  ▼
┌─────────────────────────────────────────┐
│  ¿El objeto tiene sentido por sí solo?  │
└─────────────────┬───────────────────────┘
                  │
        ┌─────────┴─────────┐
        │                   │
       SI                   NO
        │                   │
        ▼                   ▼
┌─────────────────┐   ┌─────────────────┐
│  ¿Necesitas     │   │  ¿Necesitas     │
│  herencia?      │   │  compartir      │
│                 │   │  código común?  │
└─────────────────┘   └─────────────────┘
        │                   │
       NO                  SI
        │                   │
        ▼                   ▼
┌─────────────────┐   ┌─────────────────┐
│  CLASE NORMAL   │   │  ¿Necesitas     │
│                 │   │  garantizar     │
│  - Usuario      │   │  implementación │
│  - Calculadora  │   │  específica?    │
│  - Configuración│   │                 │
└─────────────────┘   └─────────────────┘
        │                   │
       SI                  SI
        │                   │
        ▼                   ▼
┌─────────────────┐   ┌─────────────────┐
│  CLASE NORMAL   │   │ CLASE ABSTRACTA │
│  (heredable)    │   │                 │
│                 │   │ - Empleado      │
│  - Vehiculo     │   │ - Forma         │
│  - Animal       │   │ - Reporte       │
│  - Producto     │   │ - Conexión      │
└─────────────────┘   └─────────────────┘
```

## Flujo de Polimorfismo con Clases Abstractas

```
┌─────────────────────────────────────────┐
│      FUNCIÓN POLIMÓRFICA                │
│   function procesar(Abstracta $obj)     │
└─────────────────┬───────────────────────┘
                  │
                  ▼
┌─────────────────────────────────────────┐
│      Array de objetos diferentes        │
│      [Hija1, Hija2, Hija3]              │
└─────────────────┬───────────────────────┘
                  │
                  ▼
┌─────────────────────────────────────────┐
│      Foreach objeto en array            │
└─────────────────┬───────────────────────┘
                  │
                  ▼
┌─────────────────────────────────────────┐
│      Llamar método abstracto             │
│      $obj->metodoAbstracto()            │
└─────────────────┬───────────────────────┘
                  │
                  ▼
┌─────────────────────────────────────────┐
│      ¿Qué tipo de objeto es?            │
└─────────────────┬───────────────────────┘
                  │
        ┌─────────┼─────────┐
        │         │         │
        ▼         ▼         ▼
┌─────────────┐ ┌─────────────┐ ┌─────────────┐
│   Hija1     │ │   Hija2     │ │   Hija3     │
│             │ │             │ │             │
│ Implementa  │ │ Implementa  │ │ Implementa  │
│ método A    │ │ método B    │ │ método C    │
└─────────────┘ └─────────────┘ └─────────────┘
        │         │         │
        └─────────┼─────────┘
                  │
                  ▼
┌─────────────────────────────────────────┐
│      Mismo método, diferentes           │
│      implementaciones ejecutadas        │
└─────────────────┬───────────────────────┘
                  │
                  ▼
┌─────────────────────────────────────────┐
│      ¿Más objetos en array?             │
└─────────────────┬───────────────────────┘
                  │
        ┌─────────┴─────────┐
        │                   │
       SI                   NO
        │                   │
        ▼                   ▼
┌─────────────────┐   ┌─────────────────┐
│  Siguiente      │   │  Polimorfismo   │
│  objeto         │   │  completado     │
└─────────────────┘   └─────────────────┘
```

## Flujo de Herencia vs Implementación

```
┌─────────────────────────────────────────┐
│             HERENCIA                    │
└─────────────────┬───────────────────────┘
                  │
                  ▼
┌─────────────────────────────────────────┐
│      ¿Tipo de clase padre?              │
└─────────────────┬───────────────────────┘
                  │
        ┌─────────┴─────────┐
        │                   │
       NORMAL             ABSTRACTA
        │                   │
        ▼                   ▼
┌─────────────────┐   ┌─────────────────┐
│  HERENCIA       │   │  IMPLEMENTACIÓN │
│  OPCIONAL       │   │  OBLIGATORIA    │
│                 │   │                 │
│  - Puede usar   │   │  - Debe         │
│    métodos      │   │    implementar  │
│    padre        │   │    métodos      │
│  - Puede        │   │    abstractos   │
│    sobrescribir │   │  - Puede usar   │
│  - Puede        │   │    métodos      │
│    agregar      │   │    concretos    │
│    nuevos       │   │  - Puede        │
│                 │   │    sobrescribir │
└─────────────────┘   └─────────────────┘
        │                   │
        ▼                   ▼
┌─────────────────┐   ┌─────────────────┐
│  class Hija     │   │  class Hija     │
│  extends Padre  │   │  extends Padre  │
│  {              │   │  {              │
│    // opcional  │   │    // OBLIGATORIO│
│  }              │   │    implementar  │
│                 │   │    abstractos   │
│                 │   │  }              │
└─────────────────┘   └─────────────────┘
```

## Flujo de Validación en Tiempo de Ejecución

```
┌─────────────────────────────────────────┐
│      CREAR INSTANCIA                    │
└─────────────────┬───────────────────────┘
                  │
                  ▼
┌─────────────────────────────────────────┐
│      ¿Tipo de clase?                    │
└─────────────────┬───────────────────────┘
                  │
        ┌─────────┴─────────┐
        │                   │
       NORMAL             ABSTRACTA
        │                   │
        ▼                   ▼
┌─────────────────┐   ┌─────────────────┐
│  new Clase()    │   │  new Abstracta()│
│                 │   │                 │
│  ✅ PERMITIDO   │   │  ❌ ERROR       │
│                 │   │                 │
│  Se crea        │   │  "Cannot        │
│  instancia      │   │  instantiate    │
│  exitosamente   │   │  abstract class"│
└─────────────────┘   └─────────────────┘
        │                   │
        ▼                   ▼
┌─────────────────┐   ┌─────────────────┐
│  Objeto listo   │   │  Debe crear     │
│  para usar      │   │  clase hija     │
│                 │   │                 │
│  $obj->metodo();│   │  new Hija()     │
└─────────────────┘   └─────────────────┘
```
