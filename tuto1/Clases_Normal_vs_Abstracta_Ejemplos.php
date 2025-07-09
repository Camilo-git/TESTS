<?php
/**
 * Archivo: Clases_Normal_vs_Abstracta_Ejemplos.php
 * Descripción: Ejemplos prácticos y casos de uso para clases normales vs abstractas
 * Conceptos: Casos reales, cuándo usar cada una, ejemplos del mundo real
 * Autor: Sistema de Desarrollo
 * Fecha: 9 de Julio, 2025
 */

// Incluir el archivo de fundamentos
require_once 'Clases_Normal_vs_Abstracta_Fundamentos.php';

echo "\n\n=======================================================\n";
echo "   EJEMPLOS PRÁCTICOS: CLASES NORMALES VS ABSTRACTAS\n";
echo "=======================================================\n\n";

// ===== SECCIÓN 1: EJEMPLO DE SISTEMA DE EMPLEADOS =====
echo "1. EJEMPLO: SISTEMA DE EMPLEADOS\n";
echo "=================================\n";

/**
 * CLASE NORMAL - Empleado básico
 * Se puede usar directamente para empleados genéricos
 */
class Empleado {
    protected $nombre;
    protected $salarioBase;
    protected $departamento;
    protected $fechaIngreso;
    
    public function __construct($nombre, $salarioBase, $departamento) {
        $this->nombre = $nombre;
        $this->salarioBase = $salarioBase;
        $this->departamento = $departamento;
        $this->fechaIngreso = date('Y-m-d');
    }
    
    // Método concreto - funcionalidad básica
    public function trabajar() {
        return "{$this->nombre} está trabajando en {$this->departamento}";
    }
    
    // Método concreto - cálculo básico de salario
    public function calcularSalario() {
        return $this->salarioBase;
    }
    
    // Método concreto - información del empleado
    public function obtenerInfo() {
        return "Empleado: {$this->nombre} - Depto: {$this->departamento} - Salario: $" . $this->calcularSalario();
    }
    
    // Método concreto - puede ser sobrescrito
    public function obtenerBeneficios() {
        return "Beneficios básicos: Seguro médico, vacaciones";
    }
}

/**
 * CLASE ABSTRACTA - Empleado especializado
 * Fuerza implementación específica según el tipo de empleado
 */
abstract class EmpleadoEspecializado {
    protected $nombre;
    protected $salarioBase;
    protected $departamento;
    protected $fechaIngreso;
    protected $nivel;
    
    public function __construct($nombre, $salarioBase, $departamento, $nivel) {
        $this->nombre = $nombre;
        $this->salarioBase = $salarioBase;
        $this->departamento = $departamento;
        $this->nivel = $nivel;
        $this->fechaIngreso = date('Y-m-d');
    }
    
    // Método concreto - funcionalidad compartida
    public function trabajar() {
        return "{$this->nombre} está trabajando como {$this->nivel} en {$this->departamento}";
    }
    
    // Método concreto - información básica
    public function obtenerInfo() {
        return "Empleado: {$this->nombre} - Nivel: {$this->nivel} - Depto: {$this->departamento}";
    }
    
    // Método abstracto - cada tipo de empleado calcula salario diferente
    abstract public function calcularSalario();
    
    // Método abstracto - cada tipo tiene tareas específicas
    abstract public function realizarTareaEspecifica();
    
    // Método abstracto - cada tipo tiene diferentes beneficios
    abstract public function obtenerBeneficios();
    
    // Método abstracto - cada tipo evalúa rendimiento diferente
    abstract public function evaluarRendimiento();
}

// ✅ DEMOSTRACIÓN: Usando clase normal directamente
echo "Usando CLASE NORMAL (Empleado):\n";
$empleadoGenerico = new Empleado("Carlos García", 2500, "Administración");
echo $empleadoGenerico->obtenerInfo() . "\n";
echo $empleadoGenerico->trabajar() . "\n";
echo $empleadoGenerico->obtenerBeneficios() . "\n";

echo "\n" . str_repeat("-", 40) . "\n\n";

// ✅ CLASES HIJAS DE CLASE ABSTRACTA
echo "Usando CLASE ABSTRACTA (EmpleadoEspecializado):\n";

/**
 * Desarrollador - hereda de EmpleadoEspecializado
 */
class Desarrollador extends EmpleadoEspecializado {
    private $lenguajesProgramacion;
    private $proyectosCompletados;
    
    public function __construct($nombre, $salarioBase, $nivel, $lenguajes) {
        parent::__construct($nombre, $salarioBase, "Desarrollo", $nivel);
        $this->lenguajesProgramacion = $lenguajes;
        $this->proyectosCompletados = 0;
    }
    
    // IMPLEMENTACIÓN OBLIGATORIA - cálculo específico para desarrolladores
    public function calcularSalario() {
        $bonoLenguajes = count($this->lenguajesProgramacion) * 200;
        $bonoProyectos = $this->proyectosCompletados * 100;
        $bonoNivel = ($this->nivel === "Senior") ? 1000 : 0;
        
        return $this->salarioBase + $bonoLenguajes + $bonoProyectos + $bonoNivel;
    }
    
    // IMPLEMENTACIÓN OBLIGATORIA - tarea específica de desarrolladores
    public function realizarTareaEspecifica() {
        $lenguajes = implode(", ", $this->lenguajesProgramacion);
        return "Desarrollando software usando: {$lenguajes}";
    }
    
    // IMPLEMENTACIÓN OBLIGATORIA - beneficios específicos
    public function obtenerBeneficios() {
        $beneficios = "Beneficios de desarrollador:\n";
        $beneficios .= "- Trabajo remoto\n";
        $beneficios .= "- Capacitación técnica\n";
        $beneficios .= "- Licencias de software\n";
        $beneficios .= "- Bono por certificaciones";
        return $beneficios;
    }
    
    // IMPLEMENTACIÓN OBLIGATORIA - evaluación específica
    public function evaluarRendimiento() {
        $puntaje = ($this->proyectosCompletados * 10) + (count($this->lenguajesProgramacion) * 5);
        return "Rendimiento del desarrollador: {$puntaje} puntos";
    }
    
    // Método específico de Desarrollador
    public function completarProyecto() {
        $this->proyectosCompletados++;
        return "Proyecto completado. Total: {$this->proyectosCompletados}";
    }
}

/**
 * Gerente - hereda de EmpleadoEspecializado
 */
class Gerente extends EmpleadoEspecializado {
    private $equipoTamaño;
    private $presupuesto;
    
    public function __construct($nombre, $salarioBase, $nivel, $equipoTamaño, $presupuesto) {
        parent::__construct($nombre, $salarioBase, "Gerencia", $nivel);
        $this->equipoTamaño = $equipoTamaño;
        $this->presupuesto = $presupuesto;
    }
    
    // IMPLEMENTACIÓN OBLIGATORIA - cálculo específico para gerentes
    public function calcularSalario() {
        $bonoEquipo = $this->equipoTamaño * 150;
        $bonoPresupuesto = $this->presupuesto * 0.01; // 1% del presupuesto
        $bonoNivel = ($this->nivel === "Senior") ? 1500 : 0;
        
        return $this->salarioBase + $bonoEquipo + $bonoPresupuesto + $bonoNivel;
    }
    
    // IMPLEMENTACIÓN OBLIGATORIA - tarea específica de gerentes
    public function realizarTareaEspecifica() {
        return "Gestionando equipo de {$this->equipoTamaño} personas con presupuesto de $" . number_format($this->presupuesto);
    }
    
    // IMPLEMENTACIÓN OBLIGATORIA - beneficios específicos
    public function obtenerBeneficios() {
        $beneficios = "Beneficios de gerente:\n";
        $beneficios .= "- Seguro médico premium\n";
        $beneficios .= "- Carro de empresa\n";
        $beneficios .= "- Bonos por resultados\n";
        $beneficios .= "- Participación en utilidades";
        return $beneficios;
    }
    
    // IMPLEMENTACIÓN OBLIGATORIA - evaluación específica
    public function evaluarRendimiento() {
        $eficienciaEquipo = ($this->equipoTamaño <= 10) ? 100 : 80;
        $gestionPresupuesto = ($this->presupuesto > 50000) ? 100 : 70;
        $puntaje = ($eficienciaEquipo + $gestionPresupuesto) / 2;
        
        return "Rendimiento del gerente: {$puntaje}% - Equipo: {$this->equipoTamaño} personas";
    }
    
    // Método específico de Gerente
    public function aprobarPresupuesto($monto) {
        if ($monto <= $this->presupuesto) {
            return "Presupuesto de $" . number_format($monto) . " aprobado";
        } else {
            return "Presupuesto de $" . number_format($monto) . " excede el límite";
        }
    }
}

// Crear instancias de empleados especializados
$desarrollador = new Desarrollador("Ana López", 3500, "Senior", ["PHP", "JavaScript", "Python", "React"]);
$gerente = new Gerente("Miguel Torres", 5000, "Senior", 8, 75000);

echo "=== DESARROLLADOR ===\n";
echo $desarrollador->obtenerInfo() . "\n";
echo "Salario: $" . number_format($desarrollador->calcularSalario()) . "\n";
echo $desarrollador->trabajar() . "\n";
echo $desarrollador->realizarTareaEspecifica() . "\n";
echo $desarrollador->completarProyecto() . "\n";
echo $desarrollador->completarProyecto() . "\n";
echo $desarrollador->evaluarRendimiento() . "\n";
echo $desarrollador->obtenerBeneficios() . "\n";

echo "\n" . str_repeat("-", 25) . "\n\n";

echo "=== GERENTE ===\n";
echo $gerente->obtenerInfo() . "\n";
echo "Salario: $" . number_format($gerente->calcularSalario()) . "\n";
echo $gerente->trabajar() . "\n";
echo $gerente->realizarTareaEspecifica() . "\n";
echo $gerente->aprobarPresupuesto(25000) . "\n";
echo $gerente->evaluarRendimiento() . "\n";
echo $gerente->obtenerBeneficios() . "\n";

echo "\n" . str_repeat("-", 50) . "\n\n";

// ===== SECCIÓN 2: EJEMPLO DE SISTEMA DE FORMAS GEOMÉTRICAS =====
echo "2. EJEMPLO: SISTEMA DE FORMAS GEOMÉTRICAS\n";
echo "=========================================\n";

/**
 * CLASE NORMAL - Punto (funcionalidad completa)
 */
class Punto {
    private $x;
    private $y;
    
    public function __construct($x, $y) {
        $this->x = $x;
        $this->y = $y;
    }
    
    // Método concreto - funcionalidad completa
    public function mover($deltaX, $deltaY) {
        $this->x += $deltaX;
        $this->y += $deltaY;
        return "Punto movido a ({$this->x}, {$this->y})";
    }
    
    // Método concreto - cálculo específico
    public function distanciaAlOrigen() {
        return sqrt($this->x * $this->x + $this->y * $this->y);
    }
    
    // Método concreto - información del punto
    public function obtenerCoordenadas() {
        return "Punto: ({$this->x}, {$this->y})";
    }
    
    // Getters
    public function getX() { return $this->x; }
    public function getY() { return $this->y; }
}

/**
 * CLASE ABSTRACTA - Forma geométrica
 * Cada forma calcula área y perímetro de manera diferente
 */
abstract class FormaGeometrica {
    protected $color;
    protected $posicion;
    
    public function __construct($color, Punto $posicion) {
        $this->color = $color;
        $this->posicion = $posicion;
    }
    
    // Método concreto - funcionalidad compartida
    public function mover($deltaX, $deltaY) {
        return $this->posicion->mover($deltaX, $deltaY);
    }
    
    // Método concreto - información básica
    public function obtenerInfo() {
        return "Forma {$this->color} en " . $this->posicion->obtenerCoordenadas();
    }
    
    // Método concreto - cambiar color
    public function cambiarColor($nuevoColor) {
        $colorAnterior = $this->color;
        $this->color = $nuevoColor;
        return "Color cambiado de {$colorAnterior} a {$nuevoColor}";
    }
    
    // Método abstracto - cada forma calcula área diferente
    abstract public function calcularArea();
    
    // Método abstracto - cada forma calcula perímetro diferente
    abstract public function calcularPerimetro();
    
    // Método abstracto - cada forma se dibuja diferente
    abstract public function dibujar();
    
    // Método abstracto - cada forma se redimensiona diferente
    abstract public function redimensionar($factor);
}

// ✅ DEMOSTRACIÓN: Usando clase normal directamente
echo "Usando CLASE NORMAL (Punto):\n";
$punto1 = new Punto(3, 4);
echo $punto1->obtenerCoordenadas() . "\n";
echo "Distancia al origen: " . round($punto1->distanciaAlOrigen(), 2) . "\n";
echo $punto1->mover(2, -1) . "\n";

echo "\n" . str_repeat("-", 40) . "\n\n";

// ✅ CLASES HIJAS DE CLASE ABSTRACTA
echo "Usando CLASE ABSTRACTA (FormaGeometrica):\n";

/**
 * Círculo - hereda de FormaGeometrica
 */
class Circulo extends FormaGeometrica {
    private $radio;
    
    public function __construct($color, Punto $posicion, $radio) {
        parent::__construct($color, $posicion);
        $this->radio = $radio;
    }
    
    // IMPLEMENTACIÓN OBLIGATORIA - área del círculo
    public function calcularArea() {
        return pi() * $this->radio * $this->radio;
    }
    
    // IMPLEMENTACIÓN OBLIGATORIA - perímetro del círculo
    public function calcularPerimetro() {
        return 2 * pi() * $this->radio;
    }
    
    // IMPLEMENTACIÓN OBLIGATORIA - dibujo específico
    public function dibujar() {
        return "Dibujando círculo {$this->color} con radio {$this->radio} en " . $this->posicion->obtenerCoordenadas();
    }
    
    // IMPLEMENTACIÓN OBLIGATORIA - redimensionado específico
    public function redimensionar($factor) {
        $radioAnterior = $this->radio;
        $this->radio *= $factor;
        return "Radio cambiado de {$radioAnterior} a {$this->radio}";
    }
    
    // Método específico de Círculo
    public function calcularDiametro() {
        return 2 * $this->radio;
    }
}

/**
 * Rectángulo - hereda de FormaGeometrica
 */
class Rectangulo extends FormaGeometrica {
    private $ancho;
    private $alto;
    
    public function __construct($color, Punto $posicion, $ancho, $alto) {
        parent::__construct($color, $posicion);
        $this->ancho = $ancho;
        $this->alto = $alto;
    }
    
    // IMPLEMENTACIÓN OBLIGATORIA - área del rectángulo
    public function calcularArea() {
        return $this->ancho * $this->alto;
    }
    
    // IMPLEMENTACIÓN OBLIGATORIA - perímetro del rectángulo
    public function calcularPerimetro() {
        return 2 * ($this->ancho + $this->alto);
    }
    
    // IMPLEMENTACIÓN OBLIGATORIA - dibujo específico
    public function dibujar() {
        return "Dibujando rectángulo {$this->color} de {$this->ancho}x{$this->alto} en " . $this->posicion->obtenerCoordenadas();
    }
    
    // IMPLEMENTACIÓN OBLIGATORIA - redimensionado específico
    public function redimensionar($factor) {
        $this->ancho *= $factor;
        $this->alto *= $factor;
        return "Rectángulo redimensionado a {$this->ancho}x{$this->alto}";
    }
    
    // Método específico de Rectángulo
    public function esCuadrado() {
        return $this->ancho === $this->alto;
    }
}

// Crear formas geométricas
$circulo = new Circulo("Rojo", new Punto(0, 0), 5);
$rectangulo = new Rectangulo("Azul", new Punto(10, 10), 8, 6);

echo "=== CÍRCULO ===\n";
echo $circulo->obtenerInfo() . "\n";
echo $circulo->dibujar() . "\n";
echo "Área: " . round($circulo->calcularArea(), 2) . "\n";
echo "Perímetro: " . round($circulo->calcularPerimetro(), 2) . "\n";
echo "Diámetro: " . $circulo->calcularDiametro() . "\n";
echo $circulo->redimensionar(1.5) . "\n";
echo $circulo->cambiarColor("Verde") . "\n";

echo "\n" . str_repeat("-", 25) . "\n\n";

echo "=== RECTÁNGULO ===\n";
echo $rectangulo->obtenerInfo() . "\n";
echo $rectangulo->dibujar() . "\n";
echo "Área: " . $rectangulo->calcularArea() . "\n";
echo "Perímetro: " . $rectangulo->calcularPerimetro() . "\n";
echo "¿Es cuadrado? " . ($rectangulo->esCuadrado() ? "Sí" : "No") . "\n";
echo $rectangulo->redimensionar(0.8) . "\n";
echo $rectangulo->mover(5, -3) . "\n";

echo "\n" . str_repeat("-", 50) . "\n\n";

// ===== SECCIÓN 3: CUÁNDO USAR CADA UNA =====
echo "3. CUÁNDO USAR CADA TIPO DE CLASE\n";
echo "=================================\n";

echo "USA CLASE NORMAL cuando:\n";
echo "✅ Necesitas funcionalidad completa e inmediata\n";
echo "✅ El objeto tiene sentido por sí solo\n";
echo "✅ No necesitas forzar implementaciones específicas\n";
echo "✅ Quieres simplicidad y uso directo\n";
echo "\nEjemplos ideales:\n";
echo "- Calculadora (funcionalidad completa)\n";
echo "- Usuario (entidad independiente)\n";
echo "- Configuración (datos y métodos básicos)\n";
echo "- Utilidades (herramientas independientes)\n";

echo "\n" . str_repeat("-", 30) . "\n";

echo "USA CLASE ABSTRACTA cuando:\n";
echo "✅ Quieres crear una plantilla o contrato\n";
echo "✅ Necesitas garantizar implementaciones específicas\n";
echo "✅ Tienes código común que quieres compartir\n";
echo "✅ Quieres forzar una estructura coherente\n";
echo "\nEjemplos ideales:\n";
echo "- Formas geométricas (cada una calcula área diferente)\n";
echo "- Empleados especializados (cada uno tiene tareas específicas)\n";
echo "- Vehículos (cada uno acelera/frena diferente)\n";
echo "- Reportes (cada uno se genera diferente)\n";

echo "\n" . str_repeat("-", 50) . "\n\n";

// ===== SECCIÓN 4: FUNCIÓN POLIMÓRFICA =====
echo "4. POLIMORFISMO EN ACCIÓN\n";
echo "=========================\n";

/**
 * Función que demuestra polimorfismo con clases abstractas
 */
function procesarFormas(array $formas) {
    $totalArea = 0;
    $totalPerimetro = 0;
    
    echo "Procesando formas geométricas:\n";
    foreach ($formas as $forma) {
        // Polimorfismo: mismo método, diferentes implementaciones
        echo $forma->dibujar() . "\n";
        
        $area = $forma->calcularArea();
        $perimetro = $forma->calcularPerimetro();
        
        echo "- Área: " . round($area, 2) . "\n";
        echo "- Perímetro: " . round($perimetro, 2) . "\n";
        echo str_repeat("-", 20) . "\n";
        
        $totalArea += $area;
        $totalPerimetro += $perimetro;
    }
    
    echo "TOTALES:\n";
    echo "Área total: " . round($totalArea, 2) . "\n";
    echo "Perímetro total: " . round($totalPerimetro, 2) . "\n";
}

// Array de diferentes formas
$formas = [
    new Circulo("Rojo", new Punto(0, 0), 3),
    new Rectangulo("Azul", new Punto(5, 5), 4, 6),
    new Circulo("Verde", new Punto(-2, 3), 2.5)
];

procesarFormas($formas);

echo "\n" . str_repeat("-", 50) . "\n\n";

// ===== MENSAJE FINAL =====
echo "=======================================================\n";
echo "    EJEMPLOS PRÁCTICOS COMPLETADOS\n";
echo "=======================================================\n";
echo "✓ Clase Normal: Funcionalidad inmediata (Empleado, Punto)\n";
echo "✓ Clase Abstracta: Plantilla con implementación forzada\n";
echo "✓ Polimorfismo: Misma interfaz, diferentes comportamientos\n";
echo "✓ Casos reales: Empleados, formas geométricas, vehículos\n";
echo "✓ Decisión: Según necesidad de control vs simplicidad\n";
echo "=======================================================\n";
?>
