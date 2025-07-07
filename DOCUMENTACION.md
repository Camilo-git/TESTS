# Documentación de la Calculadora PHP

## Descripción General

Esta es una aplicación web de calculadora desarrollada en PHP que permite realizar operaciones aritméticas básicas (suma, resta, multiplicación y división) con una interfaz web moderna usando Bootstrap.

## Arquitectura del Sistema

La aplicación sigue un patrón MVC simplificado:
- **Modelo**: `Calculadora.php` - Lógica de negocio
- **Vista**: `index.php` - Interfaz de usuario
- **Controlador**: `operar.php` - Procesamiento de solicitudes AJAX
- **Pruebas**: `CalculadoraTest.php` - Pruebas unitarias

## Flujo de Funcionamiento

### 1. Carga Inicial
```
Usuario accede a index.php
    ↓
Se carga la interfaz con Bootstrap
    ↓
JavaScript ejecuta calcular() automáticamente
    ↓
Se muestra resultado inicial (0)
```

### 2. Interacción del Usuario
```
Usuario modifica campos (num1, num2, operación)
    ↓
Event listeners detectan cambios
    ↓
JavaScript ejecuta calcular()
    ↓
Se envía petición AJAX a operar.php
    ↓
Se actualiza el resultado en tiempo real
```

### 3. Procesamiento Backend
```
operar.php recibe datos POST
    ↓
Valida y convierte datos
    ↓
Llama a Calculadora::operar()
    ↓
Retorna resultado en JSON
```

## Archivos del Sistema

### index.php
**Propósito**: Interfaz de usuario principal
**Funcionalidad**:
- Presenta formulario con campos para números y operación
- Implementa actualización automática en tiempo real
- Utiliza Bootstrap para diseño responsivo
- Maneja errores de comunicación con el backend

**Componentes principales**:
- **HTML**: Estructura del formulario y diseño
- **CSS**: Estilos de Bootstrap para UI moderna
- **JavaScript**: 
  - Función `calcular()`: Envía datos via AJAX
  - Event listeners: Detectan cambios en tiempo real
  - Manejo de errores: Captura errores de comunicación

### Calculadora.php
**Propósito**: Lógica de negocio para operaciones matemáticas
**Funcionalidad**:
- Clase estática con método `operar()`
- Implementa las 4 operaciones básicas
- Validación de división por cero
- Manejo de operaciones no válidas

**Método principal**:
```php
public static function operar($num1, $num2, $operacion)
```
- **Parámetros**: 
  - `$num1`: Primer número (float)
  - `$num2`: Segundo número (float)
  - `$operacion`: Tipo de operación (string)
- **Retorna**: Resultado de la operación (float)
- **Excepciones**: División por cero y operaciones no válidas

### operar.php
**Propósito**: Controlador API para procesar solicitudes AJAX
**Funcionalidad**:
- Recibe datos POST del formulario
- Valida y sanitiza entrada
- Ejecuta operación usando Calculadora.php
- Retorna respuesta en formato JSON

**Flujo de procesamiento**:
1. Recibe datos POST
2. Convierte a tipos apropiados (floatval)
3. Ejecuta operación
4. Maneja excepciones
5. Retorna JSON con resultado o error

### CalculadoraTest.php
**Propósito**: Suite de pruebas unitarias
**Funcionalidad**:
- Pruebas para cada operación aritmética
- Verificación de manejo de errores
- Función personalizada `assertEquals()`

**Casos de prueba**:
- ✅ Suma: 2 + 3 = 5
- ✅ Resta: 2 - 3 = -1
- ✅ Multiplicación: 2 * 3 = 6
- ✅ División: 6 / 3 = 2
- ✅ División por cero (excepción)
- ✅ Operación no válida (excepción)

## Tecnologías Utilizadas

### Frontend
- **HTML5**: Estructura semántica
- **CSS3**: Estilos via Bootstrap 5.3.0
- **JavaScript**: Interactividad y AJAX
- **Bootstrap**: Framework CSS responsivo

### Backend
- **PHP**: Lógica del servidor
- **JSON**: Formato de intercambio de datos

### Características Destacadas
- **Tiempo real**: Actualización automática sin botones
- **Responsivo**: Diseño adaptable a dispositivos
- **Manejo de errores**: Validación y excepciones
- **Pruebas unitarias**: Verificación de funcionalidad
- **Separación de responsabilidades**: Arquitectura modular

## Diagrama de Flujo

```
┌─────────────────┐
│   index.php     │ ← Usuario accede
│   (Frontend)    │
└─────┬───────────┘
      │ Usuario modifica campos
      │
      ▼
┌─────────────────┐
│   JavaScript    │
│   calcular()    │ ← Event listeners
└─────┬───────────┘
      │ AJAX POST
      │
      ▼
┌─────────────────┐
│   operar.php    │ ← Controlador
│   (Backend)     │
└─────┬───────────┘
      │ Llama método
      │
      ▼
┌─────────────────┐
│ Calculadora.php │ ← Lógica de negocio
│   operar()      │
└─────┬───────────┘
      │ Retorna resultado
      │
      ▼
┌─────────────────┐
│   JSON Response │ ← Respuesta
│   {"resultado"} │
└─────┬───────────┘
      │ Actualiza UI
      │
      ▼
┌─────────────────┐
│   Frontend      │ ← Muestra resultado
│   Actualizado   │
└─────────────────┘
```

## Instalación y Uso

### Requisitos
- PHP 7.0 o superior
- Servidor web (Apache/Nginx) o PHP built-in server
- Navegador web moderno

### Ejecutar la aplicación
1. Colocar archivos en directorio web
2. Iniciar servidor PHP: `php -S localhost:8000`
3. Acceder a `http://localhost:8000/index.php`

### Ejecutar pruebas
```bash
php CalculadoraTest.php
```

## Posibles Mejoras

1. **Validación adicional**: Números muy grandes, formato de entrada
2. **Más operaciones**: Potencia, raíz cuadrada, porcentajes
3. **Historial**: Guardar operaciones anteriores
4. **Base de datos**: Persistencia de cálculos
5. **Autenticación**: Sistema de usuarios
6. **API REST**: Endpoints más robustos
7. **Framework**: Migrar a Laravel/Symfony
8. **Frontend**: Vue.js/React para mayor interactividad

## Mantenimiento

- **Logs**: Agregar logging para debugging
- **Seguridad**: Validación más estricta de entrada
- **Performance**: Caché para operaciones complejas
- **Documentación**: Mantener actualizada esta documentación
