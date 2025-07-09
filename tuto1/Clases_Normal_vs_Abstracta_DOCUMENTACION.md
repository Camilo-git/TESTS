# Documentación - Clases Normales vs Abstractas en PHP

## Índice
1. [Introducción](#introducción)
2. [Clases Normales](#clases-normales)
3. [Clases Abstractas](#clases-abstractas)
4. [Comparación Detallada](#comparación-detallada)
5. [Casos de Uso](#casos-de-uso)
6. [Ejemplos Prácticos](#ejemplos-prácticos)
7. [Mejores Prácticas](#mejores-prácticas)
8. [Conclusiones](#conclusiones)

---

## Introducción

Este documento explora las **diferencias fundamentales** entre las clases normales (`class`) y las clases abstractas (`abstract class`) en PHP, proporcionando ejemplos prácticos y guías para tomar la decisión correcta en cada situación.

### Objetivos del Documento

1. **Comprender** las diferencias conceptuales y técnicas
2. **Identificar** cuándo usar cada tipo de clase
3. **Implementar** ejemplos prácticos del mundo real
4. **Aplicar** mejores prácticas en el diseño de clases
5. **Dominar** el polimorfismo con clases abstractas

### Archivos del Proyecto

- **`Clases_Normal_vs_Abstracta_Fundamentos.php`**: Conceptos básicos y diferencias
- **`Clases_Normal_vs_Abstracta_Ejemplos.php`**: Ejemplos prácticos detallados
- **`Clases_Normal_vs_Abstracta_DIAGRAMA.md`**: Diagramas de flujo y decisión
- **`Clases_Normal_vs_Abstracta_DOCUMENTACION.md`**: Documentación completa

---

## Clases Normales

### Definición

Una **clase normal** es una clase tradicional que se puede instanciar directamente y contiene únicamente métodos concretos (con implementación completa).

### Características Principales

#### 1. Instanciación Directa
```php
class Usuario {
    private $nombre;
    private $email;
    
    public function __construct($nombre, $email) {
        $this->nombre = $nombre;
        $this->email = $email;
    }
    
    public function saludar() {
        return "Hola, soy {$this->nombre}";
    }
}

// ✅ Se puede instanciar directamente
$usuario = new Usuario("Juan", "juan@email.com");
echo $usuario->saludar(); // "Hola, soy Juan"
```

#### 2. Métodos Concretos
```php
class Calculadora {
    // Todos los métodos tienen implementación completa
    public function sumar($a, $b) {
        return $a + $b;
    }
    
    public function restar($a, $b) {
        return $a - $b;
    }
    
    public function multiplicar($a, $b) {
        return $a * $b;
    }
    
    public function dividir($a, $b) {
        if ($b == 0) {
            throw new InvalidArgumentException("División por cero");
        }
        return $a / $b;
    }
}

// Uso inmediato
$calc = new Calculadora();
echo $calc->sumar(5, 3); // 8
```

#### 3. Herencia Opcional
```php
class Vehiculo {
    protected $marca;
    protected $modelo;
    
    public function __construct($marca, $modelo) {
        $this->marca = $marca;
        $this->modelo = $modelo;
    }
    
    public function arrancar() {
        return "El vehículo {$this->marca} {$this->modelo} está arrancando";
    }
    
    public function acelerar() {
        return "Acelerando...";
    }
}

// Clase hija puede heredar y sobrescribir OPCIONALMENTE
class Auto extends Vehiculo {
    // Puede sobrescribir métodos si quiere
    public function acelerar() {
        return "El auto está acelerando con motor de gasolina";
    }
    
    // Puede agregar métodos nuevos
    public function abrirPuertas() {
        return "Abriendo puertas del auto";
    }
}

// Ambas se pueden instanciar
$vehiculo = new Vehiculo("Toyota", "Genérico"); // ✅ Válido
$auto = new Auto("Honda", "Civic");            // ✅ Válido
```

### Ventajas de las Clases Normales

1. **Simplicidad**: Fácil de crear y entender
2. **Uso inmediato**: Se puede instanciar directamente
3. **Flexibilidad**: No impone restricciones estrictas
4. **Desarrollo rápido**: Ideal para prototipos y desarrollo ágil

### Desventajas de las Clases Normales

1. **Falta de control**: No garantiza implementaciones específicas
2. **Inconsistencia**: Clases hijas pueden no implementar métodos importantes
3. **Mantenimiento**: Difícil garantizar comportamiento uniforme

---

## Clases Abstractas

### Definición

Una **clase abstracta** es una clase que no puede ser instanciada directamente y que puede contener tanto métodos concretos como métodos abstractos (sin implementación).

### Características Principales

#### 1. No Instanciable
```php
abstract class Forma {
    protected $color;
    
    public function __construct($color) {
        $this->color = $color;
    }
    
    // Método concreto - implementación compartida
    public function obtenerColor() {
        return $this->color;
    }
    
    // Método abstracto - debe ser implementado por clases hijas
    abstract public function calcularArea();
}

// ❌ ERROR: No se puede instanciar
// $forma = new Forma("rojo"); // Fatal error
```

#### 2. Métodos Abstractos
```php
abstract class Empleado {
    protected $nombre;
    protected $salario;
    
    public function __construct($nombre, $salario) {
        $this->nombre = $nombre;
        $this->salario = $salario;
    }
    
    // Método concreto - compartido por todas las subclases
    public function trabajar() {
        return "{$this->nombre} está trabajando";
    }
    
    // Método abstracto - DEBE ser implementado por cada subclase
    abstract public function calcularSalario();
    
    // Método abstracto - DEBE ser implementado por cada subclase
    abstract public function realizarTareaEspecifica();
}
```

#### 3. Implementación Obligatoria
```php
class Desarrollador extends Empleado {
    private $lenguajes;
    
    public function __construct($nombre, $salario, $lenguajes) {
        parent::__construct($nombre, $salario);
        $this->lenguajes = $lenguajes;
    }
    
    // OBLIGATORIO: Implementar método abstracto
    public function calcularSalario() {
        $bono = count($this->lenguajes) * 500;
        return $this->salario + $bono;
    }
    
    // OBLIGATORIO: Implementar método abstracto
    public function realizarTareaEspecifica() {
        return "Desarrollando con " . implode(", ", $this->lenguajes);
    }
}

// Si no implementa TODOS los métodos abstractos = ERROR
// class EmpleadoIncompleto extends Empleado {
//     // ❌ ERROR: No implementa calcularSalario() ni realizarTareaEspecifica()
// }
```

### Ventajas de las Clases Abstractas

1. **Control estricto**: Garantiza implementación de métodos críticos
2. **Consistencia**: Estructura uniforme en todas las subclases
3. **Reutilización**: Código común compartido en métodos concretos
4. **Polimorfismo**: Excelente para interfaces uniformes con implementaciones específicas

### Desventajas de las Clases Abstractas

1. **Complejidad**: Requiere planificación y diseño previo
2. **Rigidez**: Cambios en la clase abstracta afectan todas las subclases
3. **Overhead**: Necesita crear clases hijas siempre

---

## Comparación Detallada

### Tabla Comparativa

| Aspecto | Clase Normal | Clase Abstracta |
|---------|--------------|----------------|
| **Instanciación** | ✅ Directa | ❌ Prohibida |
| **Métodos abstractos** | ❌ No permitidos | ✅ Permitidos |
| **Métodos concretos** | ✅ Todos deben tenerlos | ✅ Opcionales |
| **Herencia** | ✅ Opcional | ✅ Obligatoria para uso |
| **Implementación forzada** | ❌ No | ✅ Sí (métodos abstractos) |
| **Flexibilidad** | ✅ Alta | ⚠️ Controlada |
| **Uso inmediato** | ✅ Sí | ❌ No |
| **Polimorfismo** | ✅ Posible | ✅ Excelente |
| **Mantenimiento** | ⚠️ Puede ser complejo | ✅ Estructura clara |

### Sintaxis Comparativa

```php
// CLASE NORMAL
class NombreClase {
    // Todas las propiedades y métodos concretos
    public function metodo() {
        return "Implementación completa";
    }
}

// CLASE ABSTRACTA
abstract class NombreClase {
    // Métodos concretos (opcionales)
    public function metodoConcreto() {
        return "Implementación compartida";
    }
    
    // Métodos abstractos (obligatorios en hijas)
    abstract public function metodoAbstracto();
}
```

---

## Casos de Uso

### Cuándo Usar Clases Normales

#### 1. **Funcionalidad Completa e Independiente**
```php
// Ejemplo: Sistema de logging
class Logger {
    private $archivo;
    
    public function __construct($archivo) {
        $this->archivo = $archivo;
    }
    
    public function log($mensaje) {
        file_put_contents($this->archivo, date('Y-m-d H:i:s') . " - " . $mensaje . "\n", FILE_APPEND);
    }
    
    public function error($mensaje) {
        $this->log("ERROR: " . $mensaje);
    }
    
    public function info($mensaje) {
        $this->log("INFO: " . $mensaje);
    }
}

// Uso directo - funcionalidad completa
$logger = new Logger("app.log");
$logger->info("Aplicación iniciada");
$logger->error("Error en base de datos");
```

#### 2. **Entidades de Datos**
```php
// Ejemplo: Modelo de usuario
class Usuario {
    private $id;
    private $nombre;
    private $email;
    private $fechaCreacion;
    
    public function __construct($id, $nombre, $email) {
        $this->id = $id;
        $this->nombre = $nombre;
        $this->email = $email;
        $this->fechaCreacion = new DateTime();
    }
    
    // Getters y setters
    public function getId() { return $this->id; }
    public function getNombre() { return $this->nombre; }
    public function getEmail() { return $this->email; }
    
    // Funcionalidad específica
    public function esAdmin() {
        return strpos($this->email, '@admin.') !== false;
    }
    
    public function toArray() {
        return [
            'id' => $this->id,
            'nombre' => $this->nombre,
            'email' => $this->email,
            'fecha_creacion' => $this->fechaCreacion->format('Y-m-d H:i:s')
        ];
    }
}

// Uso directo - entidad completa
$usuario = new Usuario(1, "Ana García", "ana@empresa.com");
echo $usuario->getNombre(); // "Ana García"
```

#### 3. **Utilidades y Herramientas**
```php
// Ejemplo: Validador de datos
class Validador {
    public static function email($email) {
        return filter_var($email, FILTER_VALIDATE_EMAIL) !== false;
    }
    
    public static function longitud($texto, $min, $max) {
        $longitud = strlen($texto);
        return $longitud >= $min && $longitud <= $max;
    }
    
    public static function numero($valor) {
        return is_numeric($valor);
    }
    
    public static function fechaValida($fecha) {
        $d = DateTime::createFromFormat('Y-m-d', $fecha);
        return $d && $d->format('Y-m-d') === $fecha;
    }
}

// Uso directo - herramientas listas
echo Validador::email("test@email.com") ? "Válido" : "Inválido";
echo Validador::longitud("password", 8, 20) ? "OK" : "Muy corto/largo";
```

### Cuándo Usar Clases Abstractas

#### 1. **Jerarquías con Comportamiento Específico**
```php
// Ejemplo: Sistema de reportes
abstract class Reporte {
    protected $titulo;
    protected $fecha;
    protected $datos;
    
    public function __construct($titulo, $datos) {
        $this->titulo = $titulo;
        $this->fecha = new DateTime();
        $this->datos = $datos;
    }
    
    // Método concreto - funcionalidad compartida
    public function obtenerEncabezado() {
        return "Reporte: {$this->titulo}\nFecha: " . $this->fecha->format('Y-m-d H:i:s') . "\n" . str_repeat('-', 50);
    }
    
    // Método abstracto - cada tipo de reporte se genera diferente
    abstract public function generar();
    
    // Método abstracto - cada tipo tiene formato diferente
    abstract public function exportar($formato);
}

class ReporteVentas extends Reporte {
    public function generar() {
        $reporte = $this->obtenerEncabezado() . "\n";
        $total = 0;
        
        foreach ($this->datos as $venta) {
            $reporte .= "Producto: {$venta['producto']} - Cantidad: {$venta['cantidad']} - Total: $" . number_format($venta['total'], 2) . "\n";
            $total += $venta['total'];
        }
        
        $reporte .= str_repeat('-', 50) . "\n";
        $reporte .= "TOTAL GENERAL: $" . number_format($total, 2);
        
        return $reporte;
    }
    
    public function exportar($formato) {
        $contenido = $this->generar();
        
        switch ($formato) {
            case 'pdf':
                return "Exportando reporte de ventas a PDF...";
            case 'excel':
                return "Exportando reporte de ventas a Excel...";
            default:
                return $contenido;
        }
    }
}

class ReporteInventario extends Reporte {
    public function generar() {
        $reporte = $this->obtenerEncabezado() . "\n";
        
        foreach ($this->datos as $producto) {
            $estado = $producto['stock'] < 10 ? "BAJO STOCK" : "OK";
            $reporte .= "Producto: {$producto['nombre']} - Stock: {$producto['stock']} - Estado: {$estado}\n";
        }
        
        return $reporte;
    }
    
    public function exportar($formato) {
        $contenido = $this->generar();
        
        switch ($formato) {
            case 'csv':
                return "Exportando inventario a CSV...";
            case 'json':
                return json_encode($this->datos);
            default:
                return $contenido;
        }
    }
}
```

#### 2. **Conexiones a Bases de Datos**
```php
// Ejemplo: Sistema de conexión a BD
abstract class ConexionBD {
    protected $host;
    protected $usuario;
    protected $password;
    protected $baseDatos;
    
    public function __construct($host, $usuario, $password, $baseDatos) {
        $this->host = $host;
        $this->usuario = $usuario;
        $this->password = $password;
        $this->baseDatos = $baseDatos;
    }
    
    // Método concreto - funcionalidad común
    public function obtenerConfiguracion() {
        return "Conectando a {$this->baseDatos} en {$this->host} como {$this->usuario}";
    }
    
    // Métodos abstractos - cada BD se conecta diferente
    abstract public function conectar();
    abstract public function desconectar();
    abstract public function ejecutarQuery($sql);
    abstract public function obtenerError();
}

class ConexionMySQL extends ConexionBD {
    private $conexion;
    
    public function conectar() {
        $this->conexion = new mysqli($this->host, $this->usuario, $this->password, $this->baseDatos);
        
        if ($this->conexion->connect_error) {
            throw new Exception("Error conectando a MySQL: " . $this->conexion->connect_error);
        }
        
        return "Conectado a MySQL exitosamente";
    }
    
    public function desconectar() {
        if ($this->conexion) {
            $this->conexion->close();
            return "Desconectado de MySQL";
        }
        return "No había conexión activa";
    }
    
    public function ejecutarQuery($sql) {
        if (!$this->conexion) {
            throw new Exception("No hay conexión activa");
        }
        
        $resultado = $this->conexion->query($sql);
        
        if ($resultado === false) {
            throw new Exception("Error ejecutando query: " . $this->conexion->error);
        }
        
        return $resultado;
    }
    
    public function obtenerError() {
        return $this->conexion ? $this->conexion->error : "No hay conexión";
    }
}
```

---

## Ejemplos Prácticos

### Ejemplo 1: Sistema de Formas Geométricas

```php
// Clase abstracta base
abstract class Forma {
    protected $color;
    
    public function __construct($color) {
        $this->color = $color;
    }
    
    // Método concreto común
    public function obtenerColor() {
        return $this->color;
    }
    
    // Métodos abstractos - cada forma es diferente
    abstract public function calcularArea();
    abstract public function calcularPerimetro();
    abstract public function dibujar();
}

// Implementaciones específicas
class Circulo extends Forma {
    private $radio;
    
    public function __construct($color, $radio) {
        parent::__construct($color);
        $this->radio = $radio;
    }
    
    public function calcularArea() {
        return pi() * $this->radio * $this->radio;
    }
    
    public function calcularPerimetro() {
        return 2 * pi() * $this->radio;
    }
    
    public function dibujar() {
        return "Dibujando círculo {$this->color} con radio {$this->radio}";
    }
}

class Rectangulo extends Forma {
    private $ancho;
    private $alto;
    
    public function __construct($color, $ancho, $alto) {
        parent::__construct($color);
        $this->ancho = $ancho;
        $this->alto = $alto;
    }
    
    public function calcularArea() {
        return $this->ancho * $this->alto;
    }
    
    public function calcularPerimetro() {
        return 2 * ($this->ancho + $this->alto);
    }
    
    public function dibujar() {
        return "Dibujando rectángulo {$this->color} de {$this->ancho}x{$this->alto}";
    }
}

// Uso polimórfico
function procesarFormas(array $formas) {
    foreach ($formas as $forma) {
        echo $forma->dibujar() . "\n";
        echo "Área: " . round($forma->calcularArea(), 2) . "\n";
        echo "Perímetro: " . round($forma->calcularPerimetro(), 2) . "\n";
        echo "---\n";
    }
}

$formas = [
    new Circulo("rojo", 5),
    new Rectangulo("azul", 10, 8),
    new Circulo("verde", 3)
];

procesarFormas($formas);
```

### Ejemplo 2: Sistema de Autenticación

```php
// Clase abstracta para proveedores de autenticación
abstract class ProveedorAutenticacion {
    protected $configuracion;
    
    public function __construct($configuracion) {
        $this->configuracion = $configuracion;
    }
    
    // Método concreto común
    public function validarCredenciales($usuario, $password) {
        if (empty($usuario) || empty($password)) {
            return false;
        }
        
        // Validación específica del proveedor
        return $this->autenticar($usuario, $password);
    }
    
    // Método concreto para logging
    public function log($mensaje) {
        error_log("[" . get_class($this) . "] " . $mensaje);
    }
    
    // Métodos abstractos - cada proveedor implementa diferente
    abstract protected function autenticar($usuario, $password);
    abstract public function obtenerUsuario($usuario);
    abstract public function cerrarSesion($usuario);
}

// Proveedor para base de datos
class AutenticacionBD extends ProveedorAutenticacion {
    private $conexion;
    
    public function __construct($configuracion) {
        parent::__construct($configuracion);
        $this->conexion = new PDO($configuracion['dsn'], $configuracion['usuario'], $configuracion['password']);
    }
    
    protected function autenticar($usuario, $password) {
        $stmt = $this->conexion->prepare("SELECT password FROM usuarios WHERE usuario = ?");
        $stmt->execute([$usuario]);
        $resultado = $stmt->fetch();
        
        if ($resultado && password_verify($password, $resultado['password'])) {
            $this->log("Usuario $usuario autenticado exitosamente");
            return true;
        }
        
        $this->log("Falló autenticación para usuario $usuario");
        return false;
    }
    
    public function obtenerUsuario($usuario) {
        $stmt = $this->conexion->prepare("SELECT * FROM usuarios WHERE usuario = ?");
        $stmt->execute([$usuario]);
        return $stmt->fetch();
    }
    
    public function cerrarSesion($usuario) {
        $this->log("Usuario $usuario cerró sesión");
        return true;
    }
}

// Proveedor para LDAP
class AutenticacionLDAP extends ProveedorAutenticacion {
    private $servidor;
    
    public function __construct($configuracion) {
        parent::__construct($configuracion);
        $this->servidor = ldap_connect($configuracion['servidor']);
    }
    
    protected function autenticar($usuario, $password) {
        $dn = "uid={$usuario}," . $this->configuracion['base_dn'];
        
        if (@ldap_bind($this->servidor, $dn, $password)) {
            $this->log("Usuario $usuario autenticado via LDAP");
            return true;
        }
        
        $this->log("Falló autenticación LDAP para usuario $usuario");
        return false;
    }
    
    public function obtenerUsuario($usuario) {
        $dn = "uid={$usuario}," . $this->configuracion['base_dn'];
        $resultado = ldap_search($this->servidor, $dn, "uid=$usuario");
        $entrada = ldap_get_entries($this->servidor, $resultado);
        
        return $entrada[0] ?? null;
    }
    
    public function cerrarSesion($usuario) {
        $this->log("Usuario $usuario cerró sesión LDAP");
        return true;
    }
}
```

---

## Mejores Prácticas

### Para Clases Normales

#### 1. **Principio de Responsabilidad Única**
```php
// ❌ Malo - clase que hace demasiadas cosas
class Usuario {
    public function crearUsuario($datos) { /* ... */ }
    public function enviarEmail($mensaje) { /* ... */ }
    public function generarReporte() { /* ... */ }
    public function conectarBD() { /* ... */ }
}

// ✅ Bueno - cada clase tiene una responsabilidad
class Usuario {
    private $id;
    private $nombre;
    private $email;
    
    public function __construct($id, $nombre, $email) {
        $this->id = $id;
        $this->nombre = $nombre;
        $this->email = $email;
    }
    
    public function getId() { return $this->id; }
    public function getNombre() { return $this->nombre; }
    public function getEmail() { return $this->email; }
}

class ServicioEmail {
    public function enviar($destinatario, $mensaje) {
        // Lógica de envío
    }
}

class GeneradorReportes {
    public function generar($tipo, $datos) {
        // Lógica de generación
    }
}
```

#### 2. **Encapsulación Adecuada**
```php
// ✅ Bueno - propiedades privadas con acceso controlado
class CuentaBancaria {
    private $saldo;
    private $numeroCuenta;
    
    public function __construct($numeroCuenta, $saldoInicial) {
        $this->numeroCuenta = $numeroCuenta;
        $this->saldo = $saldoInicial;
    }
    
    public function getSaldo() {
        return $this->saldo;
    }
    
    public function depositar($cantidad) {
        if ($cantidad > 0) {
            $this->saldo += $cantidad;
            return true;
        }
        return false;
    }
    
    public function retirar($cantidad) {
        if ($cantidad > 0 && $cantidad <= $this->saldo) {
            $this->saldo -= $cantidad;
            return true;
        }
        return false;
    }
}
```

### Para Clases Abstractas

#### 1. **Diseño de Métodos Abstractos**
```php
// ✅ Bueno - métodos abstractos bien definidos
abstract class Procesador {
    protected $datos;
    
    public function __construct($datos) {
        $this->datos = $datos;
    }
    
    // Método concreto - algoritmo común
    public function procesar() {
        $this->validar();
        $resultado = $this->ejecutar();
        $this->finalizar();
        return $resultado;
    }
    
    // Métodos abstractos - implementación específica
    abstract protected function validar();
    abstract protected function ejecutar();
    abstract protected function finalizar();
}

class ProcesadorPagos extends Procesador {
    protected function validar() {
        // Validación específica de pagos
        if (empty($this->datos['monto']) || $this->datos['monto'] <= 0) {
            throw new Exception("Monto inválido");
        }
    }
    
    protected function ejecutar() {
        // Lógica de procesamiento de pagos
        return "Pago procesado: $" . $this->datos['monto'];
    }
    
    protected function finalizar() {
        // Logging, notificaciones, etc.
        error_log("Pago completado");
    }
}
```

#### 2. **Métodos Concretos Útiles**
```php
// ✅ Bueno - métodos concretos que agregan valor
abstract class Entidad {
    protected $id;
    protected $fechaCreacion;
    protected $fechaModificacion;
    
    public function __construct($id) {
        $this->id = $id;
        $this->fechaCreacion = new DateTime();
        $this->fechaModificacion = new DateTime();
    }
    
    // Método concreto útil - funcionalidad común
    public function actualizar() {
        $this->fechaModificacion = new DateTime();
        return $this->guardar();
    }
    
    // Método concreto útil - serialización común
    public function toArray() {
        return [
            'id' => $this->id,
            'fecha_creacion' => $this->fechaCreacion->format('Y-m-d H:i:s'),
            'fecha_modificacion' => $this->fechaModificacion->format('Y-m-d H:i:s')
        ];
    }
    
    // Método abstracto - cada entidad se guarda diferente
    abstract protected function guardar();
}
```

#### 3. **Validación en Constructor**
```php
// ✅ Bueno - validación en clase abstracta
abstract class Vehiculo {
    protected $marca;
    protected $modelo;
    protected $año;
    
    public function __construct($marca, $modelo, $año) {
        $this->validarDatos($marca, $modelo, $año);
        
        $this->marca = $marca;
        $this->modelo = $modelo;
        $this->año = $año;
    }
    
    private function validarDatos($marca, $modelo, $año) {
        if (empty($marca) || empty($modelo)) {
            throw new InvalidArgumentException("Marca y modelo son obligatorios");
        }
        
        if (!is_int($año) || $año < 1900 || $año > date('Y')) {
            throw new InvalidArgumentException("Año inválido");
        }
    }
    
    // Método concreto común
    public function obtenerInfo() {
        return "{$this->marca} {$this->modelo} ({$this->año})";
    }
    
    // Método abstracto
    abstract public function calcularImpuesto();
}
```

---

## Patrones de Diseño Relacionados

### 1. Template Method Pattern
```php
// Clase abstracta que define el esqueleto del algoritmo
abstract class AlgoritmoOrdenamiento {
    // Método template - define el flujo
    public function ordenar($array) {
        echo "Iniciando ordenamiento...\n";
        
        $inicio = microtime(true);
        $resultado = $this->ejecutarOrdenamiento($array);
        $fin = microtime(true);
        
        echo "Ordenamiento completado en " . round($fin - $inicio, 4) . " segundos\n";
        
        return $resultado;
    }
    
    // Método abstracto - algoritmo específico
    abstract protected function ejecutarOrdenamiento($array);
}

class OrdenamientoBurbuja extends AlgoritmoOrdenamiento {
    protected function ejecutarOrdenamiento($array) {
        $n = count($array);
        for ($i = 0; $i < $n - 1; $i++) {
            for ($j = 0; $j < $n - $i - 1; $j++) {
                if ($array[$j] > $array[$j + 1]) {
                    $temp = $array[$j];
                    $array[$j] = $array[$j + 1];
                    $array[$j + 1] = $temp;
                }
            }
        }
        return $array;
    }
}
```

### 2. Strategy Pattern con Clases Abstractas
```php
// Estrategia abstracta
abstract class EstrategiaDescuento {
    protected $configuracion;
    
    public function __construct($configuracion) {
        $this->configuracion = $configuracion;
    }
    
    // Método concreto común
    public function aplicarDescuento($precio) {
        if ($precio <= 0) {
            throw new InvalidArgumentException("Precio debe ser mayor a 0");
        }
        
        return $this->calcularDescuento($precio);
    }
    
    // Método abstracto - cada estrategia calcula diferente
    abstract protected function calcularDescuento($precio);
}

class DescuentoPorcentaje extends EstrategiaDescuento {
    protected function calcularDescuento($precio) {
        $descuento = $precio * ($this->configuracion['porcentaje'] / 100);
        return $precio - $descuento;
    }
}

class DescuentoFijo extends EstrategiaDescuento {
    protected function calcularDescuento($precio) {
        return max(0, $precio - $this->configuracion['monto']);
    }
}
```

---

## Conclusiones

### Criterios de Decisión

#### Usa **Clase Normal** cuando:
- ✅ Necesitas funcionalidad **inmediata y completa**
- ✅ El objeto tiene **sentido por sí solo**
- ✅ No necesitas **forzar implementaciones específicas**
- ✅ Quieres **simplicidad y desarrollo rápido**
- ✅ Estás creando **entidades de datos** o **utilidades**

#### Usa **Clase Abstracta** cuando:
- ✅ Quieres **garantizar implementaciones específicas**
- ✅ Necesitas **compartir código común** entre clases relacionadas
- ✅ Quieres **crear una plantilla** o contrato
- ✅ Necesitas **polimorfismo controlado**
- ✅ Estás diseñando **frameworks** o **bibliotecas**

### Mejores Prácticas Generales

1. **Planificación**: Diseña la jerarquía antes de implementar
2. **Documentación**: Documenta claramente el propósito de cada método abstracto
3. **Validación**: Incluye validaciones en constructores de clases abstractas
4. **Coherencia**: Mantén consistencia en la nomenclatura y estructura
5. **Testing**: Prueba todas las implementaciones de métodos abstractos

### Beneficios del Enfoque Mixto

En proyectos reales, es común combinar ambos enfoques:

```php
// Clase abstracta para estructura
abstract class Modelo {
    protected $id;
    protected $datos;
    
    public function __construct($id) {
        $this->id = $id;
        $this->datos = [];
    }
    
    abstract public function guardar();
    abstract public function cargar();
}

// Clase normal para funcionalidad específica
class ValidadorDatos {
    public static function validarEmail($email) {
        return filter_var($email, FILTER_VALIDATE_EMAIL) !== false;
    }
    
    public static function validarTelefono($telefono) {
        return preg_match('/^\+?[1-9]\d{1,14}$/', $telefono);
    }
}

// Implementación que usa ambos
class Usuario extends Modelo {
    use ValidadorDatos;
    
    public function guardar() {
        // Usar validador (clase normal)
        if (!$this->validarEmail($this->datos['email'])) {
            throw new Exception("Email inválido");
        }
        
        // Implementar método abstracto
        return $this->insertarEnBD();
    }
    
    public function cargar() {
        return $this->cargarDesdeBD();
    }
}
```

### Impacto en el Mantenimiento

#### Clases Normales:
- **Ventaja**: Cambios localizados, fácil modificación
- **Desventaja**: Puede llevar a inconsistencias entre clases similares

#### Clases Abstractas:
- **Ventaja**: Cambios centralizados, consistencia garantizada
- **Desventaja**: Cambios en la clase abstracta afectan todas las subclases

### Recomendación Final

**Empieza simple** con clases normales y **evoluciona** hacia clases abstractas cuando:
- Identifiques **patrones repetitivos**
- Necesites **garantizar comportamiento específico**
- Quieras **centralizar funcionalidad común**
- El sistema **crezca en complejidad**

La clave está en **encontrar el equilibrio** entre simplicidad y control, adaptándose a las necesidades específicas del proyecto.

---

**Fecha de Creación**: 9 de Julio, 2025  
**Versión**: 1.0  
**Autor**: Sistema de Desarrollo  
**Licencia**: MIT
