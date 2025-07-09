<?php
/**
 * Archivo: Clases_Normal_vs_Abstracta_Fundamentos.php
 * Descripción: Comparación práctica entre clases normales y abstractas
 * Conceptos: class vs abstract class, métodos concretos vs abstractos
 * Autor: Sistema de Desarrollo
 * Fecha: 9 de Julio, 2025
 */

echo "=======================================================\n";
echo "    CLASES NORMALES VS CLASES ABSTRACTAS EN PHP\n";
echo "=======================================================\n\n";

// ===== SECCIÓN 1: CLASE NORMAL =====
echo "1. CLASE NORMAL (class):\n";
echo "========================\n";

/**
 * Clase normal - SE PUEDE INSTANCIAR DIRECTAMENTE
 * Todos los métodos tienen implementación completa
 */
class Vehiculo {
    // Propiedades protegidas (accesibles por herencia)
    protected $marca;
    protected $modelo;
    protected $año;
    protected $color;
    
    /**
     * Constructor - inicializa las propiedades
     * @param string $marca - Marca del vehículo
     * @param string $modelo - Modelo del vehículo
     * @param int $año - Año de fabricación
     * @param string $color - Color del vehículo
     */
    public function __construct($marca, $modelo, $año, $color) {
        $this->marca = $marca;
        $this->modelo = $modelo;
        $this->año = $año;
        $this->color = $color;
    }
    
    /**
     * Método concreto - tiene implementación completa
     * Puede ser usado tal como está
     */
    public function arrancar() {
        return "El vehículo {$this->marca} {$this->modelo} está arrancando...";
    }
    
    /**
     * Método concreto - implementación básica
     * Puede ser sobrescrito por clases hijas si es necesario
     */
    public function acelerar() {
        return "El vehículo está acelerando...";
    }
    
    /**
     * Método concreto - funcionalidad completa
     */
    public function frenar() {
        return "El vehículo está frenando...";
    }
    
    /**
     * Método concreto - obtener información del vehículo
     */
    public function obtenerInfo() {
        return "Vehículo: {$this->marca} {$this->modelo} ({$this->año}) - Color: {$this->color}";
    }
    
    /**
     * Método concreto - cambiar color del vehículo
     */
    public function cambiarColor($nuevoColor) {
        $colorAnterior = $this->color;
        $this->color = $nuevoColor;
        return "Color cambiado de {$colorAnterior} a {$nuevoColor}";
    }
}

// ✅ DEMOSTRACIÓN: SE PUEDE INSTANCIAR DIRECTAMENTE
echo "Creando instancia de Vehiculo (clase normal):\n";
$vehiculo1 = new Vehiculo("Toyota", "Corolla", 2023, "Rojo");
echo $vehiculo1->obtenerInfo() . "\n";
echo $vehiculo1->arrancar() . "\n";
echo $vehiculo1->acelerar() . "\n";
echo $vehiculo1->frenar() . "\n";
echo $vehiculo1->cambiarColor("Azul") . "\n";
echo $vehiculo1->obtenerInfo() . "\n";

echo "\n" . str_repeat("-", 50) . "\n\n";

// ===== SECCIÓN 2: CLASE ABSTRACTA =====
echo "2. CLASE ABSTRACTA (abstract class):\n";
echo "====================================\n";

/**
 * Clase abstracta - NO SE PUEDE INSTANCIAR DIRECTAMENTE
 * Sirve como plantilla para otras clases
 * Puede tener métodos concretos Y métodos abstractos
 */
abstract class VehiculoAbstracto {
    // Propiedades protegidas (igual que en clase normal)
    protected $marca;
    protected $modelo;
    protected $año;
    protected $color;
    protected $combustible;
    
    /**
     * Constructor - funciona igual que en clase normal
     */
    public function __construct($marca, $modelo, $año, $color, $combustible) {
        $this->marca = $marca;
        $this->modelo = $modelo;
        $this->año = $año;
        $this->color = $color;
        $this->combustible = $combustible;
    }
    
    /**
     * Método CONCRETO - tiene implementación completa
     * Compartido por todas las clases hijas
     */
    public function arrancar() {
        return "Encendiendo el vehículo {$this->marca} {$this->modelo}...";
    }
    
    /**
     * Método CONCRETO - implementación común
     * Puede ser sobrescrito por clases hijas
     */
    public function obtenerInfo() {
        return "Vehículo: {$this->marca} {$this->modelo} ({$this->año}) - Color: {$this->color} - Combustible: {$this->combustible}";
    }
    
    /**
     * Método CONCRETO - funcionalidad compartida
     */
    public function cambiarColor($nuevoColor) {
        $colorAnterior = $this->color;
        $this->color = $nuevoColor;
        return "Color del {$this->marca} {$this->modelo} cambiado de {$colorAnterior} a {$nuevoColor}";
    }
    
    /**
     * Método ABSTRACTO - SIN implementación
     * DEBE ser implementado por todas las clases hijas
     * Cada tipo de vehículo acelera de manera diferente
     */
    abstract public function acelerar();
    
    /**
     * Método ABSTRACTO - SIN implementación
     * DEBE ser implementado por todas las clases hijas
     * Cada tipo de vehículo frena de manera diferente
     */
    abstract public function frenar();
    
    /**
     * Método ABSTRACTO - SIN implementación
     * DEBE ser implementado por todas las clases hijas
     * Cada tipo de vehículo tiene un mantenimiento específico
     */
    abstract public function realizarMantenimiento();
    
    /**
     * Método ABSTRACTO - SIN implementación
     * DEBE ser implementado por todas las clases hijas
     * Cada tipo de vehículo consume combustible diferente
     */
    abstract public function calcularConsumo($kilometros);
}

// ❌ DEMOSTRACIÓN: NO SE PUEDE INSTANCIAR DIRECTAMENTE
echo "Intentando crear instancia de VehiculoAbstracto (clase abstracta):\n";
echo "// \$vehiculoAbstracto = new VehiculoAbstracto('Toyota', 'Prius', 2023, 'Blanco', 'Híbrido');\n";
echo "❌ ERROR: Cannot instantiate abstract class VehiculoAbstracto\n";

echo "\n" . str_repeat("-", 50) . "\n\n";

// ===== SECCIÓN 3: CLASES HIJAS DE CLASE ABSTRACTA =====
echo "3. CLASES HIJAS DE CLASE ABSTRACTA:\n";
echo "===================================\n";

/**
 * Clase Auto - hereda de VehiculoAbstracto
 * DEBE implementar TODOS los métodos abstractos
 */
class Auto extends VehiculoAbstracto {
    private $numeroPuertas;
    private $tipoTransmision;
    
    /**
     * Constructor - llama al constructor padre y añade propiedades específicas
     */
    public function __construct($marca, $modelo, $año, $color, $combustible, $numeroPuertas, $tipoTransmision) {
        // Llamar al constructor de la clase padre
        parent::__construct($marca, $modelo, $año, $color, $combustible);
        
        // Inicializar propiedades específicas de Auto
        $this->numeroPuertas = $numeroPuertas;
        $this->tipoTransmision = $tipoTransmision;
    }
    
    /**
     * IMPLEMENTACIÓN OBLIGATORIA del método abstracto acelerar()
     * Específica para automóviles
     */
    public function acelerar() {
        return "El auto {$this->marca} {$this->modelo} está acelerando con transmisión {$this->tipoTransmision}";
    }
    
    /**
     * IMPLEMENTACIÓN OBLIGATORIA del método abstracto frenar()
     * Específica para automóviles
     */
    public function frenar() {
        return "El auto {$this->marca} {$this->modelo} está frenando con sistema ABS";
    }
    
    /**
     * IMPLEMENTACIÓN OBLIGATORIA del método abstracto realizarMantenimiento()
     * Específica para automóviles
     */
    public function realizarMantenimiento() {
        return "Mantenimiento del auto {$this->marca} {$this->modelo}:\n" .
               "- Cambio de aceite\n" .
               "- Revisión de frenos\n" .
               "- Alineación y balanceo\n" .
               "- Revisión de transmisión {$this->tipoTransmision}";
    }
    
    /**
     * IMPLEMENTACIÓN OBLIGATORIA del método abstracto calcularConsumo()
     * Específica para automóviles
     */
    public function calcularConsumo($kilometros) {
        $consumoPorKm = 0.08; // 8 litros por 100 km
        $consumoTotal = $kilometros * $consumoPorKm;
        return "Consumo del auto {$this->marca} {$this->modelo}: {$consumoTotal} litros para {$kilometros} km";
    }
    
    /**
     * Método específico de Auto - no existe en la clase abstracta
     */
    public function abrirPuertas() {
        return "Abriendo las {$this->numeroPuertas} puertas del auto {$this->marca} {$this->modelo}";
    }
    
    /**
     * Sobrescribir método concreto de la clase padre
     */
    public function obtenerInfo() {
        return parent::obtenerInfo() . " - Puertas: {$this->numeroPuertas} - Transmisión: {$this->tipoTransmision}";
    }
}

/**
 * Clase Motocicleta - hereda de VehiculoAbstracto
 * DEBE implementar TODOS los métodos abstractos
 */
class Motocicleta extends VehiculoAbstracto {
    private $cilindrada;
    private $tipoMoto;
    
    /**
     * Constructor específico para motocicletas
     */
    public function __construct($marca, $modelo, $año, $color, $combustible, $cilindrada, $tipoMoto) {
        // Llamar al constructor de la clase padre
        parent::__construct($marca, $modelo, $año, $color, $combustible);
        
        // Inicializar propiedades específicas de Motocicleta
        $this->cilindrada = $cilindrada;
        $this->tipoMoto = $tipoMoto;
    }
    
    /**
     * IMPLEMENTACIÓN OBLIGATORIA del método abstracto acelerar()
     * Específica para motocicletas
     */
    public function acelerar() {
        return "La motocicleta {$this->marca} {$this->modelo} está acelerando con rugido del motor de {$this->cilindrada}cc";
    }
    
    /**
     * IMPLEMENTACIÓN OBLIGATORIA del método abstracto frenar()
     * Específica para motocicletas
     */
    public function frenar() {
        return "La motocicleta {$this->marca} {$this->modelo} está frenando con frenos de disco delantero y trasero";
    }
    
    /**
     * IMPLEMENTACIÓN OBLIGATORIA del método abstracto realizarMantenimiento()
     * Específica para motocicletas
     */
    public function realizarMantenimiento() {
        return "Mantenimiento de la motocicleta {$this->marca} {$this->modelo}:\n" .
               "- Cambio de aceite del motor\n" .
               "- Limpieza del filtro de aire\n" .
               "- Ajuste de cadena\n" .
               "- Calibración de carburador (motor {$this->cilindrada}cc)";
    }
    
    /**
     * IMPLEMENTACIÓN OBLIGATORIA del método abstracto calcularConsumo()
     * Específica para motocicletas
     */
    public function calcularConsumo($kilometros) {
        $consumoPorKm = 0.03; // 3 litros por 100 km (más eficiente)
        $consumoTotal = $kilometros * $consumoPorKm;
        return "Consumo de la motocicleta {$this->marca} {$this->modelo}: {$consumoTotal} litros para {$kilometros} km";
    }
    
    /**
     * Método específico de Motocicleta
     */
    public function hacerCaballito() {
        return "¡La motocicleta {$this->marca} {$this->modelo} está haciendo un caballito!";
    }
    
    /**
     * Sobrescribir método concreto de la clase padre
     */
    public function obtenerInfo() {
        return parent::obtenerInfo() . " - Cilindrada: {$this->cilindrada}cc - Tipo: {$this->tipoMoto}";
    }
}

// ✅ DEMOSTRACIÓN: USAR CLASES HIJAS DE CLASE ABSTRACTA
echo "Creando instancias de clases hijas de VehiculoAbstracto:\n\n";

// Crear un auto
$auto = new Auto("Honda", "Civic", 2024, "Negro", "Gasolina", 4, "Manual");
echo "=== AUTO ===\n";
echo $auto->obtenerInfo() . "\n";
echo $auto->arrancar() . "\n";
echo $auto->acelerar() . "\n";
echo $auto->frenar() . "\n";
echo $auto->abrirPuertas() . "\n";
echo $auto->calcularConsumo(100) . "\n";
echo $auto->cambiarColor("Rojo") . "\n";
echo "\nMantenimiento del auto:\n" . $auto->realizarMantenimiento() . "\n";

echo "\n" . str_repeat("-", 30) . "\n\n";

// Crear una motocicleta
$moto = new Motocicleta("Yamaha", "R1", 2024, "Azul", "Gasolina", 1000, "Deportiva");
echo "=== MOTOCICLETA ===\n";
echo $moto->obtenerInfo() . "\n";
echo $moto->arrancar() . "\n";
echo $moto->acelerar() . "\n";
echo $moto->frenar() . "\n";
echo $moto->hacerCaballito() . "\n";
echo $moto->calcularConsumo(100) . "\n";
echo $moto->cambiarColor("Verde") . "\n";
echo "\nMantenimiento de la motocicleta:\n" . $moto->realizarMantenimiento() . "\n";

echo "\n" . str_repeat("-", 50) . "\n\n";

// ===== SECCIÓN 4: POLIMORFISMO CON CLASES ABSTRACTAS =====
echo "4. POLIMORFISMO CON CLASES ABSTRACTAS:\n";
echo "=====================================\n";

/**
 * Función que acepta cualquier objeto que herede de VehiculoAbstracto
 * Demuestra polimorfismo - mismo método, diferentes implementaciones
 */
function probarVehiculo(VehiculoAbstracto $vehiculo) {
    echo "=== PRUEBA DE VEHÍCULO ===\n";
    echo $vehiculo->obtenerInfo() . "\n";
    echo $vehiculo->arrancar() . "\n";
    echo $vehiculo->acelerar() . "\n";  // Comportamiento específico según el tipo
    echo $vehiculo->frenar() . "\n";    // Comportamiento específico según el tipo
    echo $vehiculo->calcularConsumo(50) . "\n";
    echo str_repeat("-", 25) . "\n";
}

// Array de vehículos de diferentes tipos
$vehiculos = [
    new Auto("Ford", "Mustang", 2023, "Amarillo", "Gasolina", 2, "Automática"),
    new Motocicleta("Harley-Davidson", "Street 750", 2024, "Negro", "Gasolina", 750, "Cruiser"),
    new Auto("Tesla", "Model 3", 2024, "Blanco", "Eléctrico", 4, "Automática")
];

echo "Probando diferentes vehículos con polimorfismo:\n\n";
foreach ($vehiculos as $vehiculo) {
    probarVehiculo($vehiculo);  // Cada vehículo se comporta según su tipo
}

echo "\n" . str_repeat("-", 50) . "\n\n";

// ===== SECCIÓN 5: VENTAJAS Y DESVENTAJAS =====
echo "5. COMPARACIÓN DE VENTAJAS:\n";
echo "===========================\n";

echo "CLASE NORMAL (Vehiculo):\n";
echo "✅ Ventajas:\n";
echo "   - Se puede instanciar directamente\n";
echo "   - Todos los métodos están implementados\n";
echo "   - Fácil de usar inmediatamente\n";
echo "   - Menos complejidad\n";
echo "   - Ideal para funcionalidades completas\n";

echo "\n❌ Desventajas:\n";
echo "   - No garantiza implementación específica en clases hijas\n";
echo "   - Puede tener implementaciones genéricas poco útiles\n";
echo "   - Menos control sobre la estructura de herencia\n";

echo "\n" . str_repeat("-", 30) . "\n";

echo "CLASE ABSTRACTA (VehiculoAbstracto):\n";
echo "✅ Ventajas:\n";
echo "   - Fuerza implementación específica en clases hijas\n";
echo "   - Garantiza estructura consistente\n";
echo "   - Permite compartir código común\n";
echo "   - Excelente para polimorfismo\n";
echo "   - Ideal para plantillas y frameworks\n";

echo "\n❌ Desventajas:\n";
echo "   - No se puede instanciar directamente\n";
echo "   - Requiere crear clases hijas siempre\n";
echo "   - Mayor complejidad inicial\n";
echo "   - Puede ser excesivo para casos simples\n";

echo "\n" . str_repeat("-", 50) . "\n\n";

// ===== MENSAJE FINAL =====
echo "=======================================================\n";
echo "    COMPARACIÓN COMPLETADA EXITOSAMENTE\n";
echo "=======================================================\n";
echo "✓ Clase Normal: Funcionalidad completa e instantánea\n";
echo "✓ Clase Abstracta: Plantilla que fuerza implementación\n";
echo "✓ Métodos Concretos: Implementación compartida\n";
echo "✓ Métodos Abstractos: Implementación obligatoria\n";
echo "✓ Polimorfismo: Mismo método, diferentes comportamientos\n";
echo "✓ Herencia: Reutilización de código común\n";
echo "=======================================================\n";
?>
