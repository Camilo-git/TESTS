<?php
/**
 * Archivo: POO_Principios.php
 * Descripción: Implementación de los principios básicos de la Programación Orientada a Objetos
 * Principios implementados: Encapsulación, Herencia, Polimorfismo y Abstracción
 * Autor: Sistema de Desarrollo
 * Fecha: 7 de Julio, 2025
 */

// Clase base abstracta para implementar el principio de Abstracción
abstract class Vehiculo {
    // Variables privadas (Encapsulación - no accesibles directamente desde fuera)
    private $marca;
    private $modelo;
    private $año;
    
    // Variable protegida (accesible por clases hijas)
    protected $precio;
    
    // Variable pública (accesible desde cualquier lugar)
    public $color;
    
    /**
     * Constructor de la clase Vehiculo
     * @param string $marca - Marca del vehículo
     * @param string $modelo - Modelo del vehículo
     * @param int $año - Año de fabricación
     * @param float $precio - Precio del vehículo
     * @param string $color - Color del vehículo
     */
    public function __construct($marca, $modelo, $año, $precio, $color) {
        // Asignación de valores a las variables privadas
        $this->marca = $marca;
        $this->modelo = $modelo;
        $this->año = $año;
        $this->precio = $precio; // Variable protegida
        $this->color = $color;   // Variable pública
    }
    
    // Métodos getter para acceder a variables privadas (Encapsulación)
    public function getMarca() {
        return $this->marca;
    }
    
    public function getModelo() {
        return $this->modelo;
    }
    
    public function getAño() {
        return $this->año;
    }
    
    // Métodos setter para modificar variables privadas (Encapsulación)
    public function setMarca($marca) {
        $this->marca = $marca;
    }
    
    public function setModelo($modelo) {
        $this->modelo = $modelo;
    }
    
    public function setAño($año) {
        // Validación antes de asignar
        if ($año > 1900 && $año <= date('Y')) {
            $this->año = $año;
        } else {
            echo "Año inválido\n";
        }
    }
    
    // Método público para mostrar información básica
    public function mostrarInfo() {
        echo "Marca: " . $this->marca . "\n";
        echo "Modelo: " . $this->modelo . "\n";
        echo "Año: " . $this->año . "\n";
        echo "Precio: $" . $this->precio . "\n";
        echo "Color: " . $this->color . "\n";
    }
    
    // Método abstracto que debe ser implementado por las clases hijas (Abstracción)
    abstract public function acelerar();
    
    // Método que será sobrescrito por las clases hijas (Polimorfismo)
    public function frenar() {
        echo "El vehículo está frenando...\n";
    }
}

/**
 * Clase Auto que hereda de Vehiculo (Herencia)
 * Implementa métodos específicos para automóviles
 */
class Auto extends Vehiculo {
    // Variable privada específica de Auto
    private $numeroPuertas;
    
    // Variable pública específica de Auto
    public $tipoTransmision;
    
    /**
     * Constructor de la clase Auto
     * Utiliza el constructor de la clase padre
     */
    public function __construct($marca, $modelo, $año, $precio, $color, $numeroPuertas, $tipoTransmision) {
        // Llamada al constructor de la clase padre
        parent::__construct($marca, $modelo, $año, $precio, $color);
        
        // Asignación de variables específicas de Auto
        $this->numeroPuertas = $numeroPuertas;
        $this->tipoTransmision = $tipoTransmision;
    }
    
    // Getter para variable privada específica
    public function getNumeroPuertas() {
        return $this->numeroPuertas;
    }
    
    // Setter para variable privada específica
    public function setNumeroPuertas($numeroPuertas) {
        if ($numeroPuertas >= 2 && $numeroPuertas <= 5) {
            $this->numeroPuertas = $numeroPuertas;
        } else {
            echo "Número de puertas inválido\n";
        }
    }
    
    // Implementación del método abstracto (Abstracción)
    public function acelerar() {
        echo "El auto está acelerando con el motor encendido...\n";
    }
    
    // Sobrescritura del método frenar (Polimorfismo)
    public function frenar() {
        echo "El auto está frenando con frenos de disco...\n";
    }
    
    // Método específico de Auto
    public function abrirPuertas() {
        echo "Abriendo las " . $this->numeroPuertas . " puertas del auto...\n";
    }
    
    // Sobrescritura del método mostrarInfo para incluir información específica
    public function mostrarInfo() {
        // Llamada al método de la clase padre
        parent::mostrarInfo();
        echo "Número de puertas: " . $this->numeroPuertas . "\n";
        echo "Tipo de transmisión: " . $this->tipoTransmision . "\n";
    }
}

/**
 * Clase Motocicleta que hereda de Vehiculo (Herencia)
 * Implementa métodos específicos para motocicletas
 */
class Motocicleta extends Vehiculo {
    // Variable privada específica de Motocicleta
    private $cilindrada;
    
    // Variable pública específica de Motocicleta
    public $tipoMoto;
    
    /**
     * Constructor de la clase Motocicleta
     */
    public function __construct($marca, $modelo, $año, $precio, $color, $cilindrada, $tipoMoto) {
        // Llamada al constructor de la clase padre
        parent::__construct($marca, $modelo, $año, $precio, $color);
        
        // Asignación de variables específicas de Motocicleta
        $this->cilindrada = $cilindrada;
        $this->tipoMoto = $tipoMoto;
    }
    
    // Getter para variable privada específica
    public function getCilindrada() {
        return $this->cilindrada;
    }
    
    // Setter para variable privada específica
    public function setCilindrada($cilindrada) {
        if ($cilindrada > 0) {
            $this->cilindrada = $cilindrada;
        } else {
            echo "Cilindrada inválida\n";
        }
    }
    
    // Implementación del método abstracto (Abstracción)
    public function acelerar() {
        echo "La motocicleta está acelerando con rugido del motor...\n";
    }
    
    // Sobrescritura del método frenar (Polimorfismo)
    public function frenar() {
        echo "La motocicleta está frenando con frenos de tambor...\n";
    }
    
    // Método específico de Motocicleta
    public function hacerCaballito() {
        echo "¡La motocicleta está haciendo un caballito!\n";
    }
    
    // Sobrescritura del método mostrarInfo
    public function mostrarInfo() {
        // Llamada al método de la clase padre
        parent::mostrarInfo();
        echo "Cilindrada: " . $this->cilindrada . "cc\n";
        echo "Tipo de moto: " . $this->tipoMoto . "\n";
    }
}

/**
 * Clase para demostrar el uso de variables estáticas
 */
class ContadorVehiculos {
    // Variable estática (compartida entre todas las instancias)
    private static $contador = 0;
    
    // Variable privada para el ID único
    private $id;
    
    public function __construct() {
        // Incrementar el contador estático
        self::$contador++;
        
        // Asignar ID único
        $this->id = self::$contador;
    }
    
    // Método estático para obtener el contador
    public static function getContador() {
        return self::$contador;
    }
    
    // Método para obtener el ID
    public function getId() {
        return $this->id;
    }
}

/**
 * Interface para demostrar el principio de Abstracción
 */
interface Mantenible {
    // Método que debe ser implementado por las clases que usen esta interface
    public function realizarMantenimiento();
}

/**
 * Clase que implementa la interface Mantenible
 */
class AutoDeLujo extends Auto implements Mantenible {
    // Variable privada específica
    private $sistemaGPS;
    
    public function __construct($marca, $modelo, $año, $precio, $color, $numeroPuertas, $tipoTransmision, $sistemaGPS) {
        // Llamada al constructor de la clase padre
        parent::__construct($marca, $modelo, $año, $precio, $color, $numeroPuertas, $tipoTransmision);
        
        // Asignación de variable específica
        $this->sistemaGPS = $sistemaGPS;
    }
    
    // Implementación del método de la interface
    public function realizarMantenimiento() {
        echo "Realizando mantenimiento premium del auto de lujo...\n";
        echo "Revisando sistema GPS: " . ($this->sistemaGPS ? "Activo" : "Inactivo") . "\n";
    }
    
    // Método específico de AutoDeLujo
    public function activarGPS() {
        $this->sistemaGPS = true;
        echo "Sistema GPS activado\n";
    }
}

// Mensaje de confirmación
echo "========================================\n";
echo "PRINCIPIOS DE POO IMPLEMENTADOS:\n";
echo "========================================\n";
echo "✓ Encapsulación: Variables privadas, protegidas y públicas\n";
echo "✓ Herencia: Clases hijas heredan de clase padre\n";
echo "✓ Polimorfismo: Métodos sobrescritos\n";
echo "✓ Abstracción: Clases abstractas e interfaces\n";
echo "========================================\n";
?>
