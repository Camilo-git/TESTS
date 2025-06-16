<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Calculadora PHP Bootstrap</title>
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
<!-- Contenedor principal -->
<div class="container mt-5">
    <div class="row justify-content-center">
        <div class="col-md-6">
            <div class="card">
                <div class="card-header bg-primary text-white">Calculadora</div>
                <div class="card-body">
                    <!-- Formulario de la calculadora -->
                    <form id="calcForm">
                        <div class="mb-3">
                            <label for="num1" class="form-label">Número 1</label>
                            <input type="number" class="form-control" id="num1" name="num1" value="0" required>
                        </div>
                        <div class="mb-3">
                            <label for="num2" class="form-label">Número 2</label>
                            <input type="number" class="form-control" id="num2" name="num2" value="0" required>
                        </div>
                        <div class="mb-3">
                            <label for="operacion" class="form-label">Operación</label>
                            <select class="form-select" id="operacion" name="operacion">
                                <option value="sumar">Sumar</option>
                                <option value="restar">Restar</option>
                                <option value="multiplicar">Multiplicar</option>
                                <option value="dividir">Dividir</option>
                            </select>
                        </div>
                    </form>
                    <!-- Resultado de la operación -->
                    <div class="alert alert-info" id="resultado">Resultado: 0</div>
                </div>
            </div>
        </div>
    </div>
</div>
<script>
// Función para enviar los datos del formulario y mostrar el resultado instantáneamente
function calcular() {
    const form = document.getElementById('calcForm');
    const formData = new FormData(form);
    fetch('operar.php', {
        method: 'POST',
        body: formData
    })
    .then(response => response.json())
    .then(data => {
        document.getElementById('resultado').textContent = 'Resultado: ' + data.resultado;
    })
    .catch(() => {
        document.getElementById('resultado').textContent = 'Error en la operación';
    });
}
// Detecta cambios en los campos y actualiza el resultado automáticamente
document.querySelectorAll('#num1, #num2, #operacion').forEach(el => {
    el.addEventListener('input', calcular);
});
window.onload = calcular;
</script>
</body>
</html>
