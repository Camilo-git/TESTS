<?php
/**
 * Archivo: index.php
 * Descripción: Menú principal para el tutorial de clases normales vs abstractas
 * Propósito: Proporcionar acceso fácil a todos los archivos del tutorial
 * Autor: Sistema de Desarrollo
 * Fecha: 9 de Julio, 2025
 */

echo "=======================================================\n";
echo "        TUTORIAL: CLASES NORMALES vs ABSTRACTAS\n";
echo "                    MENÚ PRINCIPAL\n";
echo "=======================================================\n\n";

echo "🎯 BIENVENIDO AL TUTORIAL COMPLETO DE PHP POO\n";
echo "Este tutorial te enseña las diferencias entre clases normales y abstractas\n";
echo "con ejemplos prácticos, documentación y demostraciones interactivas.\n\n";

echo "📚 ARCHIVOS DISPONIBLES:\n";
echo "=" . str_repeat("=", 25) . "\n";

$archivos = [
    "1" => [
        "archivo" => "Clases_Normal_vs_Abstracta_Fundamentos.php",
        "descripcion" => "Conceptos básicos y diferencias fundamentales",
        "tiempo" => "10-15 min",
        "nivel" => "Principiante"
    ],
    "2" => [
        "archivo" => "Clases_Normal_vs_Abstracta_Ejemplos.php",
        "descripcion" => "Ejemplos prácticos del mundo real",
        "tiempo" => "15-20 min",
        "nivel" => "Intermedio"
    ],
    "3" => [
        "archivo" => "demo_interactiva.php",
        "descripcion" => "Demostración interactiva completa",
        "tiempo" => "8-12 min",
        "nivel" => "Todos"
    ],
    "4" => [
        "archivo" => "test_clases.php",
        "descripcion" => "Pruebas unitarias y validación",
        "tiempo" => "5-8 min",
        "nivel" => "Intermedio"
    ],
    "5" => [
        "archivo" => "Clases_Normal_vs_Abstracta_DOCUMENTACION.md",
        "descripcion" => "Documentación completa (texto)",
        "tiempo" => "20-30 min",
        "nivel" => "Referencia"
    ],
    "6" => [
        "archivo" => "Clases_Normal_vs_Abstracta_DIAGRAMA.md",
        "descripcion" => "Diagramas de flujo (texto)",
        "tiempo" => "10-15 min",
        "nivel" => "Visual"
    ],
    "7" => [
        "archivo" => "README.md",
        "descripcion" => "Guía de uso del tutorial (texto)",
        "tiempo" => "5-10 min",
        "nivel" => "Referencia"
    ]
];

foreach ($archivos as $num => $info) {
    echo "{$num}. {$info['archivo']}\n";
    echo "   📖 {$info['descripcion']}\n";
    echo "   ⏱️  Tiempo: {$info['tiempo']} | 🎓 Nivel: {$info['nivel']}\n";
    echo "   💻 Comando: php {$info['archivo']}\n";
    echo str_repeat("-", 50) . "\n";
}

echo "\n🚀 ORDEN RECOMENDADO DE APRENDIZAJE:\n";
echo "=" . str_repeat("=", 37) . "\n";
echo "1️⃣  Leer README.md (orientación general)\n";
echo "2️⃣  Ejecutar Fundamentos.php (conceptos básicos)\n";
echo "3️⃣  Ejecutar Ejemplos.php (casos prácticos)\n";
echo "4️⃣  Ejecutar demo_interactiva.php (demostración)\n";
echo "5️⃣  Ejecutar test_clases.php (validación)\n";
echo "6️⃣  Consultar Documentación.md (referencia)\n";
echo "7️⃣  Revisar Diagrama.md (visualización)\n\n";

echo "🔍 COMPARACIÓN RÁPIDA:\n";
echo "=" . str_repeat("=", 22) . "\n";
echo "┌─────────────────────┬─────────────────┬─────────────────┐\n";
echo "│ CARACTERÍSTICA      │ CLASE NORMAL    │ CLASE ABSTRACTA │\n";
echo "├─────────────────────┼─────────────────┼─────────────────┤\n";
echo "│ Instanciación       │ ✅ Directa      │ ❌ Solo herencia │\n";
echo "│ Métodos abstractos  │ ❌ No           │ ✅ Sí           │\n";
echo "│ Métodos concretos   │ ✅ Sí           │ ✅ Sí           │\n";
echo "│ Herencia            │ ✅ Opcional     │ ✅ Obligatoria  │\n";
echo "│ Polimorfismo        │ ✅ Opcional     │ ✅ Forzado      │\n";
echo "│ Uso principal       │ 📦 Objetos      │ 📐 Plantillas   │\n";
echo "└─────────────────────┴─────────────────┴─────────────────┘\n\n";

echo "📌 CASOS DE USO:\n";
echo "=" . str_repeat("=", 16) . "\n";
echo "🔸 CLASE NORMAL → Calculadora, Usuario, Configuración\n";
echo "🔸 CLASE ABSTRACTA → Vehículo, Empleado, Forma Geométrica\n\n";

echo "🎓 OBJETIVOS DE APRENDIZAJE:\n";
echo "=" . str_repeat("=", 28) . "\n";
echo "✅ Entender diferencias entre class y abstract class\n";
echo "✅ Saber cuándo usar cada tipo de clase\n";
echo "✅ Implementar herencia correctamente\n";
echo "✅ Aplicar polimorfismo efectivamente\n";
echo "✅ Escribir código POO bien estructurado\n\n";

echo "🛠️  COMANDOS ÚTILES:\n";
echo "=" . str_repeat("=", 20) . "\n";
echo "• php -l archivo.php          → Verificar sintaxis\n";
echo "• php archivo.php             → Ejecutar archivo\n";
echo "• cat archivo.md              → Ver documentación\n";
echo "• ls -la                      → Listar archivos\n\n";

echo "💡 CONSEJOS:\n";
echo "=" . str_repeat("=", 12) . "\n";
echo "• Ejecuta los archivos en orden para mejor comprensión\n";
echo "• Lee los comentarios en el código para entender cada línea\n";
echo "• Experimenta modificando los ejemplos\n";
echo "• Consulta la documentación cuando tengas dudas\n\n";

echo "🎯 PARA EMPEZAR:\n";
echo "=" . str_repeat("=", 16) . "\n";
echo "1. Ejecuta: php Clases_Normal_vs_Abstracta_Fundamentos.php\n";
echo "2. O lee: cat README.md\n\n";

echo "=======================================================\n";
echo "           ¡DISFRUTA APRENDIENDO PHP POO!\n";
echo "=======================================================\n";

?>
