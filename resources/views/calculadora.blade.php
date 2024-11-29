<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cálculo de Huella de Carbono de IAs</title>
    <link rel="stylesheet" href="{{ asset('css/api.css') }}">
    <link rel="stylesheet" href="{{ asset('css/calculator.css') }}">
    <script src="https://cdn.jsdelivr.net/npm/axios/dist/axios.min.js"></script>
</head>
<body>
    <header>
        <h1>GreenImpact</h1>
        <nav>
            <ul>
                <li><a href="{{ route('home') }}">Inicio</a></li>
            </ul>
        </nav>
    </header>
    
    <h1>Calculadora de Huella de Carbono de IAs</h1>

    <div class="container">
        <!-- Selección de IA -->
        <label for="ia">Selecciona una IA:</label>
        <select id="ia">
            <option value="">Seleccione IA</option>
            <option value="GPT-3">GPT-3</option>
            <option value="BERT">BERT</option>
            <option value="DALL·E">DALL·E</option>
            <option value="AlphaGo">AlphaGo</option>
            <option value="DeepMind">DeepMind</option>
            <option value="T5">T5</option>
            <option value="ResNet">ResNet</option>
            <option value="OpenAI Codex">OpenAI Codex</option>
            <option value="PaLM">PaLM</option>
            <option value="Gopher">Gopher</option>
            <option value="CLIP">CLIP</option>
            <option value="BLOOM">BLOOM</option>
            <option value="GPT-4">GPT-4</option>
            <option value="Mistral">Mistral</option>
            <option value="LLaMA">LLaMA</option>
        </select>

        <!-- Campo para ingresar horas de uso -->
        <label for="hours">Horas de uso:</label>
        <input type="number" id="hours" placeholder="Ingresa las horas de uso">

        <!-- Botón para calcular -->
        <button id="calculate">Calcular Huella de Carbono</button>

        <!-- Campo de texto para mostrar el resultado -->
        <textarea id="result" rows="4" cols="50" placeholder="El resultado aparecerá aquí" readonly></textarea>
    </div>

    <script src="{{ asset('js/api.js') }}"></script>
</body>
</html>
