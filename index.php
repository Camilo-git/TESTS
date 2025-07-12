<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Calculadora PHP Bootstrap</title>
    <!-- Bootstrap CSS para diseño moderno y responsivo -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Bootstrap Icons para el botón de modo oscuro -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.0/font/bootstrap-icons.css" rel="stylesheet">
    
    <!-- CSS personalizado para modo oscuro -->
    <style>
        /* Variables CSS para manejar los temas */
        :root {
            --bs-body-bg: #ffffff;
            --bs-body-color: #212529;
            --calculator-bg: #ffffff;
            --calculator-border: #dee2e6;
            --header-bg: #0d6efd;
            --header-color: #ffffff;
        }

        /* Tema oscuro */
        [data-bs-theme="dark"] {
            --bs-body-bg: #212529;
            --bs-body-color: #ffffff;
            --calculator-bg: #343a40;
            --calculator-border: #495057;
            --header-bg: #0d6efd;
            --header-color: #ffffff;
        }

        /* Aplicar variables a los elementos */
        body {
            background-color: var(--bs-body-bg);
            color: var(--bs-body-color);
            transition: background-color 0.3s ease, color 0.3s ease;
        }

        .card {
            background-color: var(--calculator-bg);
            border-color: var(--calculator-border);
            transition: background-color 0.3s ease, border-color 0.3s ease;
        }

        .card-header {
            background-color: var(--header-bg) !important;
            color: var(--header-color) !important;
        }

        /* Botón de toggle para modo oscuro */
        .theme-toggle {
            position: fixed;
            top: 20px;
            right: 20px;
            z-index: 1000;
            border-radius: 50%;
            width: 50px;
            height: 50px;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 1.2rem;
            box-shadow: 0 2px 10px rgba(0, 0, 0, 0.2);
            transition: all 0.3s ease;
        }

        .theme-toggle:hover {
            transform: scale(1.1);
            box-shadow: 0 4px 15px rgba(0, 0, 0, 0.3);
        }

        /* Animación suave para el ícono */
        .theme-toggle i {
            transition: transform 0.3s ease;
        }

        .theme-toggle:hover i {
            transform: rotate(180deg);
        }

        /* Estilos para inputs en modo oscuro */
        [data-bs-theme="dark"] .form-control,
        [data-bs-theme="dark"] .form-select {
            background-color: #495057;
            border-color: #6c757d;
            color: #ffffff;
        }

        [data-bs-theme="dark"] .form-control:focus,
        [data-bs-theme="dark"] .form-select:focus {
            background-color: #495057;
            border-color: #0d6efd;
            color: #ffffff;
            box-shadow: 0 0 0 0.25rem rgba(13, 110, 253, 0.25);
        }

        /* Efectos de partículas para transición de tema */
        .theme-transition {
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            pointer-events: none;
            z-index: 9999;
            background: radial-gradient(circle at var(--mouse-x, 50%) var(--mouse-y, 50%), 
                       rgba(13, 110, 253, 0.3) 0%, 
                       transparent 50%);
            opacity: 0;
            transition: opacity 0.6s ease;
        }

        .theme-transition.active {
            opacity: 1;
        }

        /* Estilos mejorados para la tabla de resultados */
        .table-responsive {
            border-radius: 0.375rem;
            overflow: hidden;
        }

        /* Tabla en modo oscuro */
        [data-bs-theme="dark"] .table {
            --bs-table-bg: #343a40;
            --bs-table-striped-bg: #495057;
            color: #ffffff;
        }

        [data-bs-theme="dark"] .table-primary {
            --bs-table-bg: #0d6efd;
            --bs-table-color: #ffffff;
        }

        /* Animación suave para las celdas al actualizar */
        .table td {
            transition: background-color 0.3s ease, color 0.3s ease;
        }

        /* Efecto hover mejorado */
        .table-hover tbody tr:hover {
            background-color: rgba(13, 110, 253, 0.1);
        }

        [data-bs-theme="dark"] .table-hover tbody tr:hover {
            background-color: rgba(13, 110, 253, 0.2);
        }

        /* Destacar la operación seleccionada en la tabla */
        .operacion-seleccionada {
            background-color: rgba(13, 110, 253, 0.15) !important;
            border-left: 4px solid #0d6efd !important;
            font-weight: 600;
        }

        [data-bs-theme="dark"] .operacion-seleccionada {
            background-color: rgba(13, 110, 253, 0.25) !important;
        }
    </style>
</head>
<body data-bs-theme="light">
<!-- Botón flotante para cambiar tema -->
<button class="btn btn-outline-primary theme-toggle" id="themeToggle" title="Cambiar tema">
    <i class="bi bi-moon-fill" id="themeIcon"></i>
</button>

<!-- Efecto de transición de tema -->
<div class="theme-transition" id="themeTransition"></div>

<!-- 
    CALCULADORA WEB INTERACTIVA CON MODO OSCURO
    ============================================
    
    Esta página presenta una calculadora web que funciona en tiempo real.
    Características principales:
    - Interfaz moderna con Bootstrap
    - Modo oscuro/claro intercambiable
    - Actualización automática sin botones
    - Comunicación AJAX con el backend
    - Manejo de errores integrado
    - Transiciones suaves entre temas
    
    Flujo de funcionamiento:
    1. Usuario modifica campos (números u operación)
    2. Event listeners detectan cambios automáticamente
    3. JavaScript envía datos via AJAX a operar.php
    4. Se actualiza el resultado en tiempo real
    5. Usuario puede cambiar entre modo claro y oscuro
-->

<!-- Contenedor principal con Bootstrap -->
<div class="container mt-5">
    <div class="row justify-content-center">
        <div class="col-md-6">
            <div class="card">
                <!-- Encabezado de la calculadora -->
                <div class="card-header bg-primary text-white">
                    <div class="d-flex justify-content-between align-items-center">
                        <h4 class="mb-0">🧮 Calculadora PHP</h4>
                        <small class="text-light opacity-75" id="modeIndicator">
                            <i class="bi bi-sun-fill me-1"></i>Modo Claro
                        </small>
                    </div>
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
                    
                    <!-- Resultados de todas las operaciones -->
                    <!-- Esta tabla se actualiza automáticamente con JavaScript -->
                    <div class="card mt-3">
                        <div class="card-header">
                            <h5 class="mb-0">📊 Resultados de Todas las Operaciones</h5>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-striped table-hover">
                                    <thead class="table-primary">
                                        <tr>
                                            <th scope="col">🔢 Operación</th>
                                            <th scope="col">📝 Expresión</th>
                                            <th scope="col">✅ Resultado</th>
                                        </tr>
                                    </thead>
                                    <tbody id="resultadosTabla">
                                        <tr>
                                            <td>➕ Suma</td>
                                            <td id="expresionSuma">0 + 0</td>
                                            <td id="resultadoSuma">0</td>
                                        </tr>
                                        <tr>
                                            <td>➖ Resta</td>
                                            <td id="expresionResta">0 - 0</td>
                                            <td id="resultadoResta">0</td>
                                        </tr>
                                        <tr>
                                            <td>✖️ Multiplicación</td>
                                            <td id="expresionMultiplicacion">0 × 0</td>
                                            <td id="resultadoMultiplicacion">0</td>
                                        </tr>
                                        <tr>
                                            <td>➗ División</td>
                                            <td id="expresionDivision">0 ÷ 0</td>
                                            <td id="resultadoDivision">Error: No se puede dividir por cero</td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                    
                    <!-- Operación seleccionada destacada -->
                    <div class="alert alert-info mt-3" id="operacionDestacada">
                        <strong>📍 Operación Seleccionada:</strong> <span id="operacionActual">Suma</span>
                        <br>
                        <strong>🎯 Resultado:</strong> <span id="resultadoDestacado">0</span>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<script>
/**
 * LÓGICA JAVASCRIPT DE LA CALCULADORA CON MODO OSCURO
 * ====================================================
 * 
 * Este script maneja toda la interactividad del frontend:
 * - Detecta cambios en los campos del formulario
 * - Envía peticiones AJAX al backend
 * - Actualiza el resultado en tiempo real
 * - Maneja errores de comunicación
 * - Controla el cambio entre modo claro y oscuro
 * - Persiste la preferencia del tema en localStorage
 */

/**
 * GESTIÓN DEL TEMA (MODO OSCURO/CLARO)
 * ====================================
 */

/**
 * Inicializa el tema basado en la preferencia guardada o la preferencia del sistema
 */
function initializeTheme() {
    // Verificar si hay una preferencia guardada en localStorage
    const savedTheme = localStorage.getItem('theme');
    
    // Si no hay preferencia guardada, usar la preferencia del sistema
    const systemPrefersDark = window.matchMedia('(prefers-color-scheme: dark)').matches;
    
    // Determinar el tema inicial
    const initialTheme = savedTheme || (systemPrefersDark ? 'dark' : 'light');
    
    // Aplicar el tema inicial
    setTheme(initialTheme);
}

/**
 * Cambia entre modo claro y oscuro
 * 
 * @param {string} theme - El tema a aplicar ('light' o 'dark')
 */
function setTheme(theme) {
    const body = document.body;
    const themeIcon = document.getElementById('themeIcon');
    const modeIndicator = document.getElementById('modeIndicator');
    const themeToggle = document.getElementById('themeToggle');
    
    // Aplicar el tema al elemento body
    body.setAttribute('data-bs-theme', theme);
    
    // Actualizar el ícono y texto según el tema
    if (theme === 'dark') {
        themeIcon.className = 'bi bi-sun-fill';
        themeToggle.className = 'btn btn-outline-warning theme-toggle';
        modeIndicator.innerHTML = '<i class="bi bi-moon-fill me-1"></i>Modo Oscuro';
    } else {
        themeIcon.className = 'bi bi-moon-fill';
        themeToggle.className = 'btn btn-outline-primary theme-toggle';
        modeIndicator.innerHTML = '<i class="bi bi-sun-fill me-1"></i>Modo Claro';
    }
    
    // Guardar la preferencia en localStorage
    localStorage.setItem('theme', theme);
}

/**
 * Alterna entre modo claro y oscuro con efecto de transición
 * 
 * @param {Event} event - El evento del click
 */
function toggleTheme(event) {
    // Obtener posición del mouse para el efecto de transición
    const rect = event.target.getBoundingClientRect();
    const x = ((event.clientX - rect.left) / rect.width) * 100;
    const y = ((event.clientY - rect.top) / rect.height) * 100;
    
    // Aplicar efecto de transición
    const transition = document.getElementById('themeTransition');
    transition.style.setProperty('--mouse-x', x + '%');
    transition.style.setProperty('--mouse-y', y + '%');
    transition.classList.add('active');
    
    // Obtener tema actual y alternar
    const currentTheme = document.body.getAttribute('data-bs-theme');
    const newTheme = currentTheme === 'light' ? 'dark' : 'light';
    
    // Cambiar tema después de un pequeño delay para el efecto visual
    setTimeout(() => {
        setTheme(newTheme);
        
        // Quitar el efecto de transición
        setTimeout(() => {
            transition.classList.remove('active');
        }, 300);
    }, 150);
}

/**
 * LÓGICA DE CÁLCULO (FUNCIONALIDAD PRINCIPAL)
 * ===========================================
 */

/**
 * Función principal que realiza todos los cálculos.
 * 
 * Esta función:
 * 1. Obtiene los números del formulario
 * 2. Calcula todas las operaciones disponibles
 * 3. Actualiza la tabla con todos los resultados
 * 4. Destaca la operación seleccionada
 * 
 * @returns {void}
 */
function calcular() {
    // Obtener los números del formulario
    const num1 = parseFloat(document.getElementById('num1').value) || 0;
    const num2 = parseFloat(document.getElementById('num2').value) || 0;
    const operacionSeleccionada = document.getElementById('operacion').value;
    
    // Lista de todas las operaciones disponibles
    const operaciones = ['sumar', 'restar', 'multiplicar', 'dividir'];
    
    // Objeto para almacenar todos los resultados
    const resultados = {};
    let operacionesCompletadas = 0;
    
    // Función para actualizar la tabla cuando todas las operaciones estén listas
    function actualizarTabla() {
        // Actualizar expresiones matemáticas
        document.getElementById('expresionSuma').textContent = `${num1} + ${num2}`;
        document.getElementById('expresionResta').textContent = `${num1} - ${num2}`;
        document.getElementById('expresionMultiplicacion').textContent = `${num1} × ${num2}`;
        document.getElementById('expresionDivision').textContent = `${num1} ÷ ${num2}`;
        
        // Actualizar resultados
        document.getElementById('resultadoSuma').textContent = resultados.sumar;
        document.getElementById('resultadoResta').textContent = resultados.restar;
        document.getElementById('resultadoMultiplicacion').textContent = resultados.multiplicar;
        document.getElementById('resultadoDivision').textContent = resultados.dividir;
        
        // Actualizar operación destacada
        const nombreOperaciones = {
            'sumar': '➕ Suma',
            'restar': '➖ Resta',
            'multiplicar': '✖️ Multiplicación',
            'dividir': '➗ División'
        };
        
        document.getElementById('operacionActual').textContent = nombreOperaciones[operacionSeleccionada];
        document.getElementById('resultadoDestacado').textContent = resultados[operacionSeleccionada];
        
        // Cambiar estilo del resultado destacado según si hay error
        const operacionDestacada = document.getElementById('operacionDestacada');
        if (resultados[operacionSeleccionada] && resultados[operacionSeleccionada].toString().includes('Error')) {
            operacionDestacada.className = 'alert alert-danger mt-3';
        } else {
            operacionDestacada.className = 'alert alert-success mt-3';
        }
        
        // Resaltar la fila de la operación seleccionada en la tabla
        const filas = document.querySelectorAll('#resultadosTabla tr');
        filas.forEach(fila => fila.classList.remove('operacion-seleccionada'));
        
        // Mapear operaciones a índices de fila
        const indicesOperacion = {
            'sumar': 0,
            'restar': 1,
            'multiplicar': 2,
            'dividir': 3
        };
        
        if (indicesOperacion[operacionSeleccionada] !== undefined) {
            filas[indicesOperacion[operacionSeleccionada]].classList.add('operacion-seleccionada');
        }
    }
    
    // Calcular cada operación por separado
    operaciones.forEach(operacion => {
        // Crear FormData para cada operación
        const formData = new FormData();
        formData.append('num1', num1);
        formData.append('num2', num2);
        formData.append('operacion', operacion);
        
        // Enviar petición AJAX para cada operación
        fetch('operar.php', {
            method: 'POST',
            body: formData
        })
        .then(response => {
            if (!response.ok) {
                throw new Error('Error en la comunicación con el servidor');
            }
            return response.json();
        })
        .then(data => {
            // Almacenar el resultado
            resultados[operacion] = data.resultado;
            operacionesCompletadas++;
            
            // Si todas las operaciones están completas, actualizar la tabla
            if (operacionesCompletadas === operaciones.length) {
                actualizarTabla();
            }
        })
        .catch(error => {
            console.error(`Error en ${operacion}:`, error);
            resultados[operacion] = 'Error de comunicación';
            operacionesCompletadas++;
            
            // Si todas las operaciones están completas, actualizar la tabla
            if (operacionesCompletadas === operaciones.length) {
                actualizarTabla();
            }
        });
    });
}

/**
 * INICIALIZACIÓN Y EVENT LISTENERS
 * =================================
 */

/**
 * Configurar todos los event listeners cuando la página se carga
 */
window.addEventListener('load', function() {
    // Inicializar el tema
    initializeTheme();
    
    // Configurar event listener para el botón de cambio de tema
    const themeToggle = document.getElementById('themeToggle');
    themeToggle.addEventListener('click', toggleTheme);
    
    // Obtener todos los campos que necesitan monitoring para el cálculo
    const campos = document.querySelectorAll('#num1, #num2, #operacion');
    
    // Agregar event listener a cada campo
    campos.forEach(campo => {
        // Usar 'input' para detectar cambios inmediatos en campos numéricos
        // Usar 'change' para detectar cambios en el selector
        const evento = campo.type === 'number' ? 'input' : 'change';
        campo.addEventListener(evento, calcular);
    });
    
    // Ejecutar cálculo inicial
    calcular();
});

/**
 * Detectar cambios en la preferencia de tema del sistema
 */
window.matchMedia('(prefers-color-scheme: dark)').addEventListener('change', function(e) {
    // Solo aplicar el cambio si no hay preferencia guardada por el usuario
    if (!localStorage.getItem('theme')) {
        setTheme(e.matches ? 'dark' : 'light');
    }
});
</script>
</body>
</html>
