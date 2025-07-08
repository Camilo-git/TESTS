# Diagrama de Flujo - Principios de POO

## Flujo Principal del Sistema

```
┌─────────────────────────────────────────┐
│              INICIO                      │
└─────────────────┬───────────────────────┘
                  │
                  ▼
┌─────────────────────────────────────────┐
│        Incluir POO_Principios.php       │
└─────────────────┬───────────────────────┘
                  │
                  ▼
┌─────────────────────────────────────────┐
│      1. DEMOSTRACIÓN ENCAPSULACIÓN      │
│                                         │
│  ┌─────────────────────────────────┐    │
│  │  Crear instancia Auto           │    │
│  │  - Variables privadas           │    │
│  │  - Variables protegidas         │    │
│  │  - Variables públicas           │    │
│  └─────────────────────────────────┘    │
│                                         │
│  ┌─────────────────────────────────┐    │
│  │  Acceso a variables             │    │
│  │  - Getters para privadas        │    │
│  │  - Setters para privadas        │    │
│  │  - Acceso directo a públicas    │    │
│  └─────────────────────────────────┘    │
└─────────────────┬───────────────────────┘
                  │
                  ▼
┌─────────────────────────────────────────┐
│        2. DEMOSTRACIÓN HERENCIA         │
│                                         │
│  ┌─────────────────────────────────┐    │
│  │  Crear instancia Motocicleta    │    │
│  │  - Hereda de Vehiculo           │    │
│  │  - Métodos heredados            │    │
│  │  - Métodos específicos          │    │
│  └─────────────────────────────────┘    │
│                                         │
│  ┌─────────────────────────────────┐    │
│  │  Mostrar información            │    │
│  │  - Método heredado              │    │
│  │  - Método sobrescrito           │    │
│  └─────────────────────────────────┘    │
└─────────────────┬───────────────────────┘
                  │
                  ▼
┌─────────────────────────────────────────┐
│       3. DEMOSTRACIÓN POLIMORFISMO      │
│                                         │
│  ┌─────────────────────────────────┐    │
│  │  Crear array de vehículos       │    │
│  │  - Auto                         │    │
│  │  - Motocicleta                  │    │
│  │  - AutoDeLujo                   │    │
│  └─────────────────────────────────┘    │
│                                         │
│  ┌─────────────────────────────────┐    │
│  │  Foreach vehículos              │    │
│  │  ┌─────────────────────────┐    │    │
│  │  │ Llamar acelerar()       │    │    │
│  │  │ - Implementación única  │    │    │
│  │  │   por cada clase        │    │    │
│  │  └─────────────────────────┘    │    │
│  │  ┌─────────────────────────┐    │    │
│  │  │ Llamar frenar()         │    │    │
│  │  │ - Método sobrescrito    │    │    │
│  │  │   en cada clase         │    │    │
│  │  └─────────────────────────┘    │    │
│  └─────────────────────────────────┘    │
└─────────────────┬───────────────────────┘
                  │
                  ▼
┌─────────────────────────────────────────┐
│       4. DEMOSTRACIÓN ABSTRACCIÓN       │
│                                         │
│  ┌─────────────────────────────────┐    │
│  │  Crear AutoDeLujo               │    │
│  │  - Implementa Interface         │    │
│  │  - Hereda de Auto               │    │
│  └─────────────────────────────────┘    │
│                                         │
│  ┌─────────────────────────────────┐    │
│  │  Ejecutar métodos               │    │
│  │  - realizarMantenimiento()      │    │
│  │  - activarGPS()                 │    │
│  └─────────────────────────────────┘    │
└─────────────────┬───────────────────────┘
                  │
                  ▼
┌─────────────────────────────────────────┐
│    5. DEMOSTRACIÓN VARIABLES ESTÁTICAS  │
│                                         │
│  ┌─────────────────────────────────┐    │
│  │  Crear múltiples instancias     │    │
│  │  ContadorVehiculos              │    │
│  │  - contador estático            │    │
│  │  - ID único por instancia       │    │
│  └─────────────────────────────────┘    │
│                                         │
│  ┌─────────────────────────────────┐    │
│  │  Mostrar contadores             │    │
│  │  - ID individual                │    │
│  │  - Contador global              │    │
│  └─────────────────────────────────┘    │
└─────────────────┬───────────────────────┘
                  │
                  ▼
┌─────────────────────────────────────────┐
│   6. DEMOSTRACIÓN TIPOS DE VARIABLES    │
│                                         │
│  ┌─────────────────────────────────┐    │
│  │  Variable PÚBLICA               │    │
│  │  - Acceso directo               │    │
│  │  - Modificación directa         │    │
│  └─────────────────────────────────┘    │
│                                         │
│  ┌─────────────────────────────────┐    │
│  │  Variable PRIVADA               │    │
│  │  - Solo con getter/setter       │    │
│  │  - Acceso controlado            │    │
│  └─────────────────────────────────┘    │
│                                         │
│  ┌─────────────────────────────────┐    │
│  │  Variable PROTEGIDA             │    │
│  │  - Acceso desde clases hijas    │    │
│  │  - No acceso directo externo    │    │
│  └─────────────────────────────────┘    │
└─────────────────┬───────────────────────┘
                  │
                  ▼
┌─────────────────────────────────────────┐
│      7. DEMOSTRACIÓN VALIDACIONES       │
│                                         │
│  ┌─────────────────────────────────┐    │
│  │  Probar setters                 │    │
│  │  ┌─────────────────────────┐    │    │
│  │  │ Valor válido            │    │    │
│  │  │ - Se asigna             │    │    │
│  │  └─────────────────────────┘    │    │
│  │  ┌─────────────────────────┐    │    │
│  │  │ Valor inválido          │    │    │
│  │  │ - Se rechaza            │    │    │
│  │  │ - Mensaje de error      │    │    │
│  │  └─────────────────────────┘    │    │
│  └─────────────────────────────────┘    │
└─────────────────┬───────────────────────┘
                  │
                  ▼
┌─────────────────────────────────────────┐
│       8. RESUMEN DE PRINCIPIOS          │
│                                         │
│  ┌─────────────────────────────────┐    │
│  │  Mostrar resumen de:            │    │
│  │  - Encapsulación aplicada       │    │
│  │  - Herencia implementada        │    │
│  │  - Polimorfismo demostrado      │    │
│  │  - Abstracción utilizada        │    │
│  └─────────────────────────────────┘    │
└─────────────────┬───────────────────────┘
                  │
                  ▼
┌─────────────────────────────────────────┐
│                  FIN                    │
└─────────────────────────────────────────┘
```

## Flujo de Clases y Herencia

```
┌─────────────────────────────────────────┐
│              Vehiculo                   │
│            (Clase Abstracta)            │
│                                         │
│  Variables:                             │
│  - marca (privada)                      │
│  - modelo (privada)                     │
│  - año (privada)                        │
│  - precio (protegida)                   │
│  - color (pública)                      │
│                                         │
│  Métodos:                               │
│  - __construct()                        │
│  - getters/setters                      │
│  - mostrarInfo()                        │
│  - acelerar() (abstracto)               │
│  - frenar()                             │
└─────────────────┬───────────────────────┘
                  │
        ┌─────────┴─────────┐
        │                   │
        ▼                   ▼
┌─────────────────┐   ┌─────────────────┐
│      Auto       │   │   Motocicleta   │
│                 │   │                 │
│  Variables:     │   │  Variables:     │
│  - numeroPuertas│   │  - cilindrada   │
│  - tipoTransm.  │   │  - tipoMoto     │
│                 │   │                 │
│  Métodos:       │   │  Métodos:       │
│  - acelerar()   │   │  - acelerar()   │
│  - frenar()     │   │  - frenar()     │
│  - abrirPuertas │   │  - hacerCaball. │
└─────────────────┘   └─────────────────┘
        │
        ▼
┌─────────────────┐
│   AutoDeLujo    │
│                 │
│  Variables:     │
│  - sistemaGPS   │
│                 │
│  Métodos:       │
│  - realizarMant.│
│  - activarGPS() │
└─────────────────┘
```

## Flujo de Decisiones en Validaciones

```
┌─────────────────────────────────────────┐
│          Llamar setter                  │
└─────────────────┬───────────────────────┘
                  │
                  ▼
┌─────────────────────────────────────────┐
│        ¿Valor es válido?                │
└─────────────────┬───────────────────────┘
                  │
        ┌─────────┴─────────┐
        │                   │
       SI                   NO
        │                   │
        ▼                   ▼
┌─────────────────┐   ┌─────────────────┐
│  Asignar valor  │   │  Mostrar error  │
│  a variable     │   │  No asignar     │
└─────────────────┘   └─────────────────┘
        │                   │
        └─────────┬─────────┘
                  │
                  ▼
┌─────────────────────────────────────────┐
│           Continuar flujo               │
└─────────────────────────────────────────┘
```

## Flujo de Polimorfismo

```
┌─────────────────────────────────────────┐
│        Array de vehículos               │
│     [Auto, Moto, AutoLujo]              │
└─────────────────┬───────────────────────┘
                  │
                  ▼
┌─────────────────────────────────────────┐
│           Foreach vehículo              │
└─────────────────┬───────────────────────┘
                  │
                  ▼
┌─────────────────────────────────────────┐
│      Llamar método acelerar()           │
└─────────────────┬───────────────────────┘
                  │
        ┌─────────┼─────────┐
        │         │         │
        ▼         ▼         ▼
┌─────────────┐ ┌─────────────┐ ┌─────────────┐
│Auto::       │ │Moto::       │ │AutoLujo::   │
│acelerar()   │ │acelerar()   │ │acelerar()   │
│"motor       │ │"rugido del  │ │"motor       │
│encendido"   │ │motor"       │ │encendido"   │
└─────────────┘ └─────────────┘ └─────────────┘
        │         │         │
        └─────────┼─────────┘
                  │
                  ▼
┌─────────────────────────────────────────┐
│     ¿Más vehículos en array?            │
└─────────────────┬───────────────────────┘
                  │
        ┌─────────┴─────────┐
        │                   │
       SI                   NO
        │                   │
        ▼                   ▼
┌─────────────────┐   ┌─────────────────┐
│  Siguiente      │   │   Continuar     │
│  vehículo       │   │   flujo         │
└─────────────────┘   └─────────────────┘
```
