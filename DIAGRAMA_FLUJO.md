# Diagrama de Flujo - Calculadora PHP

## Flujo Principal de la Aplicación

```
┌─────────────────────────────────────────────────────────────────────────────────┐
│                                INICIO                                           │
└─────────────────────────┬───────────────────────────────────────────────────────┘
                          │
                          ▼
┌─────────────────────────────────────────────────────────────────────────────────┐
│                    Usuario accede a index.php                                  │
│                                                                                 │
│  • Se carga HTML con Bootstrap                                                  │
│  • Se inicializa JavaScript                                                     │
│  • Se configuran event listeners                                               │
└─────────────────────────┬───────────────────────────────────────────────────────┘
                          │
                          ▼
┌─────────────────────────────────────────────────────────────────────────────────┐
│                   Cálculo inicial automático                                   │
│                                                                                 │
│  • window.onload ejecuta calcular()                                            │
│  • Muestra resultado inicial: 0 + 0 = 0                                        │
└─────────────────────────┬───────────────────────────────────────────────────────┘
                          │
                          ▼
┌─────────────────────────────────────────────────────────────────────────────────┐
│                     Esperando interacción                                      │
│                                                                                 │
│  • Usuario ve la interfaz lista                                                │
│  • Campos: num1=0, num2=0, operacion=sumar                                     │
│  • Resultado mostrado: 0                                                       │
└─────────────────────────┬───────────────────────────────────────────────────────┘
                          │
                          ▼
┌─────────────────────────────────────────────────────────────────────────────────┐
│                    Usuario modifica campos                                     │
│                                                                                 │
│  • Cambia num1, num2 o selecciona operación                                    │
│  • Event listeners detectan cambios                                            │
│  • Se dispara automáticamente calcular()                                       │
└─────────────────────────┬───────────────────────────────────────────────────────┘
                          │
                          ▼
┌─────────────────────────────────────────────────────────────────────────────────┐
│                      Función calcular()                                        │
│                                                                                 │
│  1. Obtiene datos del formulario con FormData                                  │
│  2. Crea petición AJAX POST a operar.php                                       │
│  3. Envía datos: num1, num2, operacion                                         │
└─────────────────────────┬───────────────────────────────────────────────────────┘
                          │
                          ▼
┌─────────────────────────────────────────────────────────────────────────────────┐
│                         operar.php                                             │
│                                                                                 │
│  1. Recibe datos POST                                                           │
│  2. Valida y convierte a tipos apropiados                                      │
│  3. Llama a Calculadora::operar($num1, $num2, $operacion)                      │
└─────────────────────────┬───────────────────────────────────────────────────────┘
                          │
                          ▼
┌─────────────────────────────────────────────────────────────────────────────────┐
│                      Calculadora.php                                           │
│                                                                                 │
│  • Método estático operar()                                                    │
│  • Switch para determinar operación                                            │
│  • Realiza cálculo matemático                                                  │
│  • Valida errores (división por cero)                                          │
└─────────────────────────┬───────────────────────────────────────────────────────┘
                          │
                          ▼
                    ┌─────────────┐
                    │  ¿Éxito?    │
                    └─────┬───────┘
                          │
            ┌─────────────┴─────────────┐
            │                           │
            ▼                           ▼
┌─────────────────────┐       ┌─────────────────────┐
│       ÉXITO         │       │       ERROR         │
│                     │       │                     │
│ • Retorna resultado │       │ • Lanza Exception   │
│ • Número calculado  │       │ • División por cero │
│                     │       │ • Operación no val. │
└─────────┬───────────┘       └─────────┬───────────┘
          │                             │
          └─────────────┬─────────────────┘
                        │
                        ▼
┌─────────────────────────────────────────────────────────────────────────────────┐
│                    operar.php - Respuesta                                      │
│                                                                                 │
│  • Captura resultado o excepción                                               │
│  • Genera JSON response                                                        │
│  • Éxito: {"resultado": 15, "status": "success"}                              │
│  • Error: {"resultado": "Error msg", "status": "error"}                       │
└─────────────────────────┬───────────────────────────────────────────────────────┘
                          │
                          ▼
┌─────────────────────────────────────────────────────────────────────────────────┐
│                  JavaScript - Procesa respuesta                                │
│                                                                                 │
│  • Recibe JSON del servidor                                                    │
│  • Actualiza DOM con resultado                                                 │
│  • Cambia estilo según status (success/error)                                  │
│  • Verde para éxito, rojo para error                                           │
└─────────────────────────┬───────────────────────────────────────────────────────┘
                          │
                          ▼
┌─────────────────────────────────────────────────────────────────────────────────┐
│                        Interfaz actualizada                                    │
│                                                                                 │
│  • Usuario ve resultado en tiempo real                                         │
│  • Sin recargar página                                                         │
│  • Listo para nueva interacción                                                │
└─────────────────────────┬───────────────────────────────────────────────────────┘
                          │
                          ▼
┌─────────────────────────────────────────────────────────────────────────────────┐
│                         BUCLE CONTINUO                                         │
│                                                                                 │
│  • Vuelve a "Esperando interacción"                                            │
│  • Ciclo se repite con cada cambio                                             │
│  • Aplicación reactiva y en tiempo real                                        │
└─────────────────────────────────────────────────────────────────────────────────┘
```

## Flujo de Manejo de Errores

```
┌─────────────────┐
│  Error detectado│
└─────────┬───────┘
          │
          ▼
┌─────────────────────────────────────────────────────────────────────────────────┐
│                         Tipos de Error                                         │
│                                                                                 │
│  1. División por cero (Calculadora.php)                                        │
│  2. Operación no válida (Calculadora.php)                                      │
│  3. Error de comunicación (JavaScript)                                         │
│  4. Datos inválidos (operar.php)                                               │
└─────────────────────────┬───────────────────────────────────────────────────────┘
          │
          ▼
┌─────────────────────────────────────────────────────────────────────────────────┐
│                     Manejo de Excepciones                                      │
│                                                                                 │
│  • try/catch en operar.php                                                     │
│  • try/catch en JavaScript                                                     │
│  • Mensajes descriptivos                                                       │
│  • Estado visual (colores)                                                     │
└─────────────────────────┬───────────────────────────────────────────────────────┘
          │
          ▼
┌─────────────────────────────────────────────────────────────────────────────────┐
│                    Retroalimentación Usuario                                   │
│                                                                                 │
│  • Mensaje de error claro                                                      │
│  • Fondo rojo (alert-danger)                                                   │
│  • Aplicación sigue funcionando                                                │
│  • No se rompe el flujo                                                        │
└─────────────────────────────────────────────────────────────────────────────────┘
```

## Componentes del Sistema

### Frontend (index.php)
```
┌─────────────────────────────────────────────────────────────────────────────────┐
│                               FRONTEND                                         │
│                                                                                 │
│  ┌─────────────────┐  ┌─────────────────┐  ┌─────────────────┐                │
│  │      HTML       │  │       CSS       │  │   JavaScript    │                │
│  │                 │  │                 │  │                 │                │
│  │ • Formulario    │  │ • Bootstrap     │  │ • Event listen. │                │
│  │ • Campos input  │  │ • Estilos       │  │ • AJAX requests │                │
│  │ • Resultado div │  │ • Responsivo    │  │ • DOM updates   │                │
│  └─────────────────┘  └─────────────────┘  └─────────────────┘                │
│                                                                                 │
└─────────────────────────────────────────────────────────────────────────────────┘
```

### Backend (operar.php + Calculadora.php)
```
┌─────────────────────────────────────────────────────────────────────────────────┐
│                               BACKEND                                          │
│                                                                                 │
│  ┌─────────────────┐                    ┌─────────────────┐                    │
│  │   operar.php    │                    │ Calculadora.php │                    │
│  │                 │                    │                 │                    │
│  │ • Controlador   │ ──────────────────▶│ • Lógica negoc. │                    │
│  │ • Recibe POST   │                    │ • Operaciones   │                    │
│  │ • Valida datos  │                    │ • Validaciones  │                    │
│  │ • Retorna JSON  │                    │ • Excepciones   │                    │
│  └─────────────────┘                    └─────────────────┘                    │
│                                                                                 │
└─────────────────────────────────────────────────────────────────────────────────┘
```

### Testing (CalculadoraTest.php)
```
┌─────────────────────────────────────────────────────────────────────────────────┐
│                              TESTING                                           │
│                                                                                 │
│  ┌─────────────────┐  ┌─────────────────┐  ┌─────────────────┐                │
│  │ Pruebas básicas │  │ Pruebas errores │  │ Función assert  │                │
│  │                 │  │                 │  │                 │                │
│  │ • Suma          │  │ • División/0    │  │ • assertEquals  │                │
│  │ • Resta         │  │ • Op. no válida │  │ • Comparaciones │                │
│  │ • Multiplicar   │  │ • Excepciones   │  │ • Reportes      │                │
│  │ • División      │  │                 │  │                 │                │
│  └─────────────────┘  └─────────────────┘  └─────────────────┘                │
│                                                                                 │
└─────────────────────────────────────────────────────────────────────────────────┘
```
