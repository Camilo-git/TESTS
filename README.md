# Calculadora PHP - Guía Rápida

## 🚀 Inicio Rápido

### Requisitos Previos
- PHP 7.0 o superior
- Navegador web moderno
- Servidor web (Apache/Nginx) o PHP built-in server

### Instalación
1. Clona o descarga los archivos en tu directorio web
2. Asegúrate de que PHP esté instalado en tu sistema
3. Ejecuta el servidor local:
   ```bash
   php -S localhost:8000
   ```
4. Abre tu navegador y ve a: `http://localhost:8000/index.php`

## 📁 Estructura del Proyecto

```
calculadora/
├── index.php           # Interfaz de usuario principal
├── Calculadora.php     # Lógica de negocio
├── operar.php          # Controlador API
├── CalculadoraTest.php # Pruebas unitarias
├── DOCUMENTACION.md    # Documentación completa
└── README.md          # Esta guía
```

## 🧪 Ejecutar Pruebas

Para verificar que todo funciona correctamente:

```bash
php CalculadoraTest.php
```

Deberías ver algo así:
```
=== EJECUTANDO PRUEBAS UNITARIAS DE CALCULADORA ===

📊 Probando operaciones aritméticas básicas:
✅ ÉXITO: Suma: 2 + 3 = 5
✅ ÉXITO: Resta: 2 - 3 = -1
✅ ÉXITO: Multiplicación: 2 * 3 = 6
✅ ÉXITO: División: 6 / 3 = 2

⚠️  Probando manejo de errores:
Probando división por cero...
✅ ÉXITO: División por cero lanza excepción correctamente
```

## 🔧 Funcionamiento

1. **Frontend** (`index.php`): Interfaz web con Bootstrap
2. **Backend** (`operar.php`): Procesa solicitudes AJAX
3. **Lógica** (`Calculadora.php`): Realiza operaciones matemáticas
4. **Tiempo Real**: Actualización automática sin botones

## 🌟 Características

- ✅ Interfaz moderna y responsiva
- ✅ Actualización en tiempo real
- ✅ Manejo de errores
- ✅ Validación de entrada
- ✅ Pruebas unitarias
- ✅ Documentación completa

## 📚 Más Información

Para documentación detallada, consulta `DOCUMENTACION.md`.

## 🐛 Solución de Problemas

### Error: "No se puede conectar al servidor"
- Verifica que PHP esté ejecutándose
- Confirma que el puerto 8000 esté libre
- Revisa que todos los archivos estén en el mismo directorio

### Error: "División por cero"
- Este es un comportamiento esperado
- La aplicación maneja este error correctamente
- Verifica que aparezca el mensaje de error en rojo

### JavaScript no funciona
- Verifica que JavaScript esté habilitado en tu navegador
- Abre las herramientas de desarrollador (F12) para ver errores
- Asegúrate de que `operar.php` esté respondiendo correctamente

## 📞 Soporte

Para más ayuda, revisa:
1. La documentación completa en `DOCUMENTACION.md`
2. Los comentarios en el código fuente
3. Las pruebas unitarias en `CalculadoraTest.php`
