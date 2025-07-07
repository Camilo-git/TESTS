<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Calculadora PHP Bootstrap</title>
    <!-- Bootstrap CSS para diseño moderno y responsivo -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
<!-- 
    CALCULADORA WEB INTERACTIVA
    ===========================
    
    Esta página presenta una calculadora web que funciona en tiempo real.
    Características principales:
    - Interfaz moderna con Bootstrap
    - Actualización automática sin botones
    - Comunicación AJAX con el backend
    - Manejo de errores integrado
    
    Flujo de funcionamiento:
    1. Usuario modifica campos (números u operación)
    2. Event listeners detectan cambios automáticamente
    3. JavaScript envía datos via AJAX a operar.php
    4. Se actualiza el resultado en tiempo real
-->

<!-- Contenedor principal con Bootstrap -->
<div class="container mt-5">
    <div class="row justify-content-center">
        <div class="col-md-6">
            <div class="card">
                <!-- Encabezado de la calculadora -->
                <div class="card-header bg-primary text-white">
                    <h4 class="mb-0">🧮 Calculadora PHP</h4>
                </div>
                
                <div class="card-body">
                    <!-- Formulario de la calculadora -->
                    <!-- Este formulario NO se envía de forma tradicional, 
                         sino que se procesa con JavaScript -->
                    <form id="calcForm">
                        <!-- Campo para el primer número -->
                        <div class="mb-3">
                            <label for="num1" class="form-label">Primer Número</label>
                            <input type="number" 
                                   class="form-control" 
                                   id="num1" 
                                   name="num1" 
                                   value="0" 
                                   step="any"
                                   required>
                        </div>
                        
                        <!-- Campo para el segundo número -->
                        <div class="mb-3">
                            <label for="num2" class="form-label">Segundo Número</label>
                            <input type="number" 
                                   class="form-control" 
                                   id="num2" 
                                   name="num2" 
                                   value="0" 
                                   step="any"
                                   required>
                        </div>
                        
                        <!-- Selector de operación -->
                        <div class="mb-3">
                            <label for="operacion" class="form-label">Operación</label>
                            <select class="form-select" id="operacion" name="operacion">
                                <option value="sumar">➕ Sumar</option>
                                <option value="restar">➖ Restar</option>
                                <option value="multiplicar">✖️ Multiplicar</option>
                                <option value="dividir">➗ Dividir</option>
                            </select>
                        </div>
                    </form>
                    
                    <!-- Resultado de la operación -->
                    <!-- Este div se actualiza automáticamente con JavaScript -->
                    <div class="alert alert-info" id="resultado">
                        <strong>Resultado:</strong> 0
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<script>
/**
 * LÓGICA JAVASCRIPT DE LA CALCULADORA
 * ====================================
 * 
 * Este script maneja toda la interactividad del frontend:
 * - Detecta cambios en los campos del formulario
 * - Envía peticiones AJAX al backend
 * - Actualiza el resultado en tiempo real
 * - Maneja errores de comunicación
 */

/**
 * Función principal que realiza el cálculo.
 * 
 * Esta función:
 * 1. Obtiene los datos del formulario
 * 2. Los envía via AJAX a operar.php
 * 3. Procesa la respuesta JSON
 * 4. Actualiza el DOM con el resultado
 * 
 * @returns {void}
 */
function calcular() {
    // Obtener referencia al formulario
    const form = document.getElementById('calcForm');
    
    // Crear objeto FormData con los datos del formulario
    // FormData automáticamente incluye todos los campos del formulario
    const formData = new FormData(form);
    
    // Enviar petición AJAX POST a operar.php
    fetch('operar.php', {
        method: 'POST',
        body: formData
    })
    .then(response => {
        // Verificar que la respuesta sea exitosa
        if (!response.ok) {
            throw new Error('Error en la comunicación con el servidor');
        }
        // Parsear la respuesta JSON
        return response.json();
    })
    .then(data => {
        // Actualizar el DOM con el resultado
        const resultadoDiv = document.getElementById('resultado');
        resultadoDiv.innerHTML = `<strong>Resultado:</strong> ${data.resultado}`;
        
        // Cambiar el estilo según si hay error o no
        if (data.status === 'error') {
            resultadoDiv.className = 'alert alert-danger';
        } else {
            resultadoDiv.className = 'alert alert-success';
        }
    })
    .catch(error => {
        // Manejar errores de comunicación
        console.error('Error:', error);
        const resultadoDiv = document.getElementById('resultado');
        resultadoDiv.innerHTML = '<strong>Error:</strong> No se pudo realizar la operación';
        resultadoDiv.className = 'alert alert-danger';
    });
}

/**
 * CONFIGURACIÓN DE EVENT LISTENERS
 * ================================
 * 
 * Se configuran los event listeners para detectar cambios en:
 * - Campo del primer número
 * - Campo del segundo número  
 * - Selector de operación
 * 
 * Cuando cualquiera de estos campos cambia, se ejecuta automáticamente
 * la función calcular() para mostrar el resultado actualizado.
 */

// Obtener todos los campos que necesitan monitoring
const campos = document.querySelectorAll('#num1, #num2, #operacion');

// Agregar event listener a cada campo
campos.forEach(campo => {
    // Usar 'input' para detectar cambios inmediatos en campos numéricos
    // Usar 'change' para detectar cambios en el selector
    const evento = campo.type === 'number' ? 'input' : 'change';
    campo.addEventListener(evento, calcular);
});

/**
 * INICIALIZACIÓN
 * ==============
 * 
 * Ejecutar cálculo inicial cuando la página se carga completamente.
 * Esto asegura que se muestre un resultado desde el primer momento.
 */
window.addEventListener('load', calcular);
</script>
</body>
</html>
