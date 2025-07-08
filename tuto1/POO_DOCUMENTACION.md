# Documentación - Principios de Programación Orientada a Objetos

## Índice
1. [Introducción](#introducción)
2. [Principios Fundamentales](#principios-fundamentales)
3. [Estructura del Proyecto](#estructura-del-proyecto)
4. [Clases Implementadas](#clases-implementadas)
5. [Ejemplos de Uso](#ejemplos-de-uso)
6. [Mejores Prácticas](#mejores-prácticas)
7. [Conclusiones](#conclusiones)

---

## Introducción

Este proyecto demuestra la implementación práctica de los **cuatro principios fundamentales de la Programación Orientada a Objetos (POO)** en PHP:

- **Encapsulación**: Control de acceso a datos y métodos
- **Herencia**: Reutilización de código a través de jerarquías de clases
- **Polimorfismo**: Múltiples formas de implementar el mismo método
- **Abstracción**: Ocultación de detalles de implementación

### Objetivos del Proyecto

1. Demostrar el uso correcto de variables privadas, protegidas y públicas
2. Implementar herencia multinivel con clases base y derivadas
3. Mostrar polimorfismo a través de sobrescritura de métodos
4. Aplicar abstracción mediante clases abstractas e interfaces
5. Proporcionar ejemplos prácticos y documentación completa

---

## Principios Fundamentales

### 1. Encapsulación

La **encapsulación** es el principio que permite ocultar los detalles internos de una clase y controlar el acceso a sus datos.

#### Tipos de Variables por Acceso:

```php
class MiClase {
    private $variablePrivada;    // Solo accesible dentro de la clase
    protected $variableProtegida; // Accesible en la clase y clases hijas
    public $variablePublica;     // Accesible desde cualquier lugar
}
```

#### Ventajas:
- **Seguridad**: Protege datos sensibles
- **Validación**: Permite validar datos antes de asignar
- **Mantenibilidad**: Facilita cambios internos sin afectar código externo
- **Integridad**: Garantiza que los datos estén en un estado válido

### 2. Herencia

La **herencia** permite crear nuevas clases basadas en clases existentes, reutilizando código y estableciendo relaciones jerárquicas.

#### Características:
- **Reutilización**: Evita duplicación de código
- **Jerarquía**: Establece relaciones "es-un"
- **Extensibilidad**: Permite agregar funcionalidad específica
- **Polimorfismo**: Facilita la sobrescritura de métodos

#### Ejemplo:
```php
class Animal {           // Clase base
    protected $nombre;
    public function comer() { /* ... */ }
}

class Perro extends Animal {  // Clase derivada
    public function ladrar() { /* ... */ }
}
```

### 3. Polimorfismo

El **polimorfismo** permite que objetos de diferentes clases respondan al mismo método de manera diferente.

#### Tipos:
- **Sobrescritura**: Redefinir métodos en clases hijas
- **Sobrecarga**: Múltiples versiones del mismo método (limitado en PHP)
- **Interfaces**: Múltiples implementaciones del mismo contrato

#### Beneficios:
- **Flexibilidad**: Mismo código funciona con diferentes tipos
- **Extensibilidad**: Fácil agregar nuevos tipos
- **Mantenibilidad**: Menos código duplicado

### 4. Abstracción

La **abstracción** oculta los detalles de implementación y expone solo la funcionalidad esencial.

#### Implementación:
- **Clases abstractas**: Plantillas con métodos abstractos
- **Interfaces**: Contratos que deben implementarse
- **Métodos abstractos**: Deben ser implementados por clases hijas

---

## Estructura del Proyecto

```
/workspaces/TESTS/
├── POO_Principios.php        # Definiciones de clases y principios
├── POO_Implementacion.php    # Ejemplos prácticos y demostraciones
├── POO_DIAGRAMA_FLUJO.md     # Diagramas de flujo del sistema
└── POO_DOCUMENTACION.md      # Documentación completa (este archivo)
```

### Archivo Principal: `POO_Principios.php`

Contiene las definiciones de todas las clases que demuestran los principios de POO:

1. **Vehiculo** (Clase abstracta base)
2. **Auto** (Hereda de Vehiculo)
3. **Motocicleta** (Hereda de Vehiculo)
4. **AutoDeLujo** (Hereda de Auto, implementa Mantenible)
5. **ContadorVehiculos** (Demuestra variables estáticas)
6. **Mantenible** (Interface)

### Archivo de Implementación: `POO_Implementacion.php`

Demuestra el uso práctico de todas las clases con ejemplos detallados de:

1. Encapsulación con getters/setters
2. Herencia multinivel
3. Polimorfismo en acción
4. Abstracción con interfaces
5. Variables estáticas
6. Validaciones en métodos

---

## Clases Implementadas

### Clase `Vehiculo` (Abstracta)

**Propósito**: Clase base que define la estructura común para todos los vehículos.

```php
abstract class Vehiculo {
    private $marca;           // Encapsulación - privada
    private $modelo;          // Encapsulación - privada
    private $año;             // Encapsulación - privada
    protected $precio;        // Encapsulación - protegida
    public $color;            // Encapsulación - pública
    
    abstract public function acelerar();  // Abstracción
    public function frenar() { /* ... */ } // Polimorfismo
}
```

**Características**:
- Variables privadas con getters/setters
- Variable protegida accesible por herencia
- Variable pública de acceso directo
- Método abstracto que obliga implementación
- Método virtual para polimorfismo

### Clase `Auto` (Hereda de Vehiculo)

**Propósito**: Implementa funcionalidad específica para automóviles.

```php
class Auto extends Vehiculo {
    private $numeroPuertas;    // Específico de Auto
    public $tipoTransmision;   // Específico de Auto
    
    public function acelerar() {
        echo "El auto está acelerando con el motor encendido...\n";
    }
    
    public function abrirPuertas() { /* ... */ }
}
```

**Características**:
- Hereda todas las propiedades de Vehiculo
- Implementa el método abstracto acelerar()
- Sobrescribe el método frenar()
- Agrega funcionalidad específica

### Clase `Motocicleta` (Hereda de Vehiculo)

**Propósito**: Implementa funcionalidad específica para motocicletas.

```php
class Motocicleta extends Vehiculo {
    private $cilindrada;       // Específico de Motocicleta
    public $tipoMoto;          // Específico de Motocicleta
    
    public function acelerar() {
        echo "La motocicleta está acelerando con rugido del motor...\n";
    }
    
    public function hacerCaballito() { /* ... */ }
}
```

**Características**:
- Implementación diferente de acelerar() (Polimorfismo)
- Funcionalidad específica de motocicletas
- Misma jerarquía que Auto pero comportamiento diferente

### Clase `AutoDeLujo` (Hereda de Auto, Implementa Mantenible)

**Propósito**: Demuestra herencia multinivel e implementación de interfaces.

```php
class AutoDeLujo extends Auto implements Mantenible {
    private $sistemaGPS;
    
    public function realizarMantenimiento() {
        echo "Realizando mantenimiento premium del auto de lujo...\n";
    }
}
```

**Características**:
- Herencia multinivel (AutoDeLujo -> Auto -> Vehiculo)
- Implementa interface Mantenible
- Funcionalidad específica de lujo

### Interface `Mantenible`

**Propósito**: Define un contrato para objetos que requieren mantenimiento.

```php
interface Mantenible {
    public function realizarMantenimiento();
}
```

**Características**:
- Abstracción pura - solo define el contrato
- Implementación obligatoria en clases que la usen
- Permite polimorfismo a través de interfaces

### Clase `ContadorVehiculos`

**Propósito**: Demuestra el uso de variables estáticas.

```php
class ContadorVehiculos {
    private static $contador = 0;  // Variable estática
    private $id;                   // Variable de instancia
    
    public static function getContador() {
        return self::$contador;
    }
}
```

**Características**:
- Variable estática compartida entre todas las instancias
- Método estático para acceder a la variable estática
- Demuestra la diferencia entre variables de clase e instancia

---

## Ejemplos de Uso

### Ejemplo 1: Encapsulación

```php
$auto = new Auto("Toyota", "Corolla", 2023, 25000, "Rojo", 4, "Automática");

// Acceso a variable pública - PERMITIDO
echo $auto->color; // "Rojo"
$auto->color = "Azul"; // Modificación directa

// Acceso a variable privada - SOLO con métodos
echo $auto->getMarca(); // "Toyota"
$auto->setMarca("Honda"); // Modificación controlada

// Acceso directo a variable privada - ERROR
// echo $auto->marca; // Fatal error
```

### Ejemplo 2: Herencia

```php
$moto = new Motocicleta("Yamaha", "R1", 2024, 18000, "Negro", 1000, "Deportiva");

// Método heredado de Vehiculo
$moto->mostrarInfo();

// Método específico de Motocicleta
$moto->hacerCaballito();

// Método implementado (abstracto en padre)
$moto->acelerar(); // "La motocicleta está acelerando con rugido del motor..."
```

### Ejemplo 3: Polimorfismo

```php
$vehiculos = [
    new Auto("Ford", "Mustang", 2023, 35000, "Amarillo", 2, "Manual"),
    new Motocicleta("Harley-Davidson", "Sportster", 2023, 12000, "Cromado", 883, "Cruiser")
];

foreach ($vehiculos as $vehiculo) {
    $vehiculo->acelerar(); // Diferente implementación según el tipo
    // Auto: "El auto está acelerando con el motor encendido..."
    // Moto: "La motocicleta está acelerando con rugido del motor..."
}
```

### Ejemplo 4: Abstracción

```php
$autoLujo = new AutoDeLujo("BMW", "X7", 2024, 90000, "Blanco", 4, "Automática", false);

// Método de la interface Mantenible
$autoLujo->realizarMantenimiento(); // Implementación obligatoria

// Método específico
$autoLujo->activarGPS();
```

### Ejemplo 5: Variables Estáticas

```php
$contador1 = new ContadorVehiculos();
$contador2 = new ContadorVehiculos();

echo $contador1->getId(); // 1
echo $contador2->getId(); // 2
echo ContadorVehiculos::getContador(); // 2 (total de instancias)
```

---

## Mejores Prácticas

### 1. Encapsulación

✅ **Hacer**:
- Usar variables privadas para datos sensibles
- Proporcionar getters/setters para acceso controlado
- Validar datos en los setters
- Usar variables protegidas para herencia

❌ **Evitar**:
- Hacer públicas variables que no deben modificarse externamente
- Setters sin validación
- Acceso directo a variables internas

### 2. Herencia

✅ **Hacer**:
- Usar herencia para relaciones "es-un"
- Llamar al constructor padre con `parent::__construct()`
- Sobrescribir métodos cuando sea necesario
- Mantener la jerarquía simple y lógica

❌ **Evitar**:
- Herencia profunda (más de 3-4 niveles)
- Herencia para reutilización de código sin relación lógica
- Modificar el comportamiento base drásticamente

### 3. Polimorfismo

✅ **Hacer**:
- Usar interfaces para definir contratos
- Implementar métodos abstractos en clases hijas
- Mantener la misma signatura en métodos sobrescritos
- Usar polimorfismo para extensibilidad

❌ **Evitar**:
- Cambiar el tipo de retorno en métodos sobrescritos
- Implementaciones completamente diferentes del comportamiento esperado
- Romper el principio de sustitución de Liskov

### 4. Abstracción

✅ **Hacer**:
- Usar clases abstractas para plantillas
- Definir interfaces para contratos
- Ocultar detalles de implementación
- Proporcionar métodos de alto nivel

❌ **Evitar**:
- Exponer detalles internos innecesarios
- Interfaces demasiado específicas
- Clases abstractas con demasiada implementación

---

## Patrones de Diseño Aplicados

### 1. Template Method Pattern
- **Implementación**: Clase abstracta `Vehiculo` con método `mostrarInfo()`
- **Uso**: Define el algoritmo general, las subclases completan los detalles

### 2. Strategy Pattern
- **Implementación**: Diferentes implementaciones de `acelerar()`
- **Uso**: Permite cambiar el comportamiento según el tipo de vehículo

### 3. Factory Pattern (Implícito)
- **Implementación**: Creación de diferentes tipos de vehículos
- **Uso**: Facilita la creación de objetos de diferentes tipos

---

## Ventajas de la Implementación

### 1. Mantenibilidad
- Código organizado en clases lógicas
- Cambios localizados en clases específicas
- Fácil agregar nuevos tipos de vehículos

### 2. Reutilización
- Código común en clase base
- Herencia evita duplicación
- Métodos compartidos entre clases

### 3. Extensibilidad
- Fácil agregar nuevas funcionalidades
- Polimorfismo permite nuevas implementaciones
- Interfaces definen contratos extensibles

### 4. Testabilidad
- Clases independientes
- Métodos públicos testeable
- Polimorfismo facilita mocking

---

## Casos de Uso Reales

### 1. Sistema de Gestión de Vehículos
```php
class FlotaVehiculos {
    private $vehiculos = [];
    
    public function agregarVehiculo(Vehiculo $vehiculo) {
        $this->vehiculos[] = $vehiculo;
    }
    
    public function acelerar() {
        foreach ($this->vehiculos as $vehiculo) {
            $vehiculo->acelerar(); // Polimorfismo
        }
    }
}
```

### 2. Sistema de Mantenimiento
```php
class ServicioMantenimiento {
    public function realizarMantenimiento(Mantenible $objeto) {
        $objeto->realizarMantenimiento(); // Abstracción
    }
}
```

### 3. Reporte de Vehículos
```php
class ReporteVehiculos {
    public function generarReporte(array $vehiculos) {
        foreach ($vehiculos as $vehiculo) {
            $vehiculo->mostrarInfo(); // Herencia + Polimorfismo
        }
    }
}
```

---

## Conclusiones

### Beneficios Alcanzados

1. **Código Modular**: Cada clase tiene responsabilidades específicas
2. **Reutilización**: Herencia evita duplicación de código
3. **Flexibilidad**: Polimorfismo permite diferentes implementaciones
4. **Seguridad**: Encapsulación protege datos críticos
5. **Mantenibilidad**: Estructura clara facilita modificaciones

### Principios Demostrados

✅ **Encapsulación**: Variables privadas, protegidas y públicas con acceso controlado
✅ **Herencia**: Jerarquía de clases con reutilización de código
✅ **Polimorfismo**: Múltiples implementaciones del mismo método
✅ **Abstracción**: Clases abstractas e interfaces ocultan detalles

### Aplicaciones Prácticas

- **Sistemas de Gestión**: Inventarios, recursos humanos, finanzas
- **Videojuegos**: Personajes, objetos, habilidades
- **Aplicaciones Web**: Usuarios, productos, servicios
- **APIs**: Servicios web, microservicios, integraciones

### Recomendaciones

1. **Practicar** con diferentes ejemplos y casos de uso
2. **Estudiar** patrones de diseño para aplicaciones avanzadas
3. **Aplicar** principios SOLID junto con POO
4. **Testear** código usando frameworks de pruebas
5. **Refactorizar** código existente aplicando principios de POO

---

## Recursos Adicionales

### Documentación PHP
- [PHP Manual - Classes and Objects](https://www.php.net/manual/en/language.oop5.php)
- [PHP Manual - Object Inheritance](https://www.php.net/manual/en/language.oop5.inheritance.php)

### Libros Recomendados
- "Clean Code" by Robert C. Martin
- "Design Patterns" by Gang of Four
- "Effective Java" by Joshua Bloch (conceptos aplicables)

### Herramientas de Desarrollo
- **PHPUnit**: Para pruebas unitarias
- **Composer**: Para gestión de dependencias
- **PHPStan**: Para análisis estático de código

---

**Fecha de Creación**: 7 de Julio, 2025  
**Versión**: 1.0  
**Autor**: Sistema de Desarrollo  
**Licencia**: MIT
