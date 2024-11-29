// Datos de la huella de carbono de diferentes IAs (en gCO2eq por kWh)
const iaData = {
    "GPT-3": 0.25,
    "BERT": 0.2,
    "DALL·E": 0.3,
    "AlphaGo": 0.15,
    "DeepMind": 0.35,
    "T5": 0.22,
    "ResNet": 0.18,
    "OpenAI Codex": 0.28,
    "PaLM": 0.3,
    "Gopher": 0.25,
    "CLIP": 0.23,
    "BLOOM": 0.26,
    "GPT-4": 0.32,
    "Mistral": 0.27,
    "LLaMA": 0.24
};

// Función para calcular la huella de carbono
function calculateCarbonFootprint() {
    // Obtener la IA seleccionada y las horas ingresadas
    const ia = document.getElementById('ia').value;
    const hours = parseFloat(document.getElementById('hours').value);

    if (ia === "" || isNaN(hours) || hours <= 0) {
        alert("Por favor, selecciona una IA y proporciona un valor válido de horas.");
        return;
    }

    // Obtener el consumo de huella de carbono de la IA seleccionada
    const carbonPerHour = iaData[ia];

    // Calcular la huella de carbono
    const totalCarbon = carbonPerHour * hours;

    // Mostrar el resultado en el campo de texto
    const resultText = `La huella de carbono estimada es de ${totalCarbon.toFixed(2)} gCO2eq por ${hours} horas de uso de ${ia}.`;
    document.getElementById('result').value = resultText;  // Cambié esto para modificar el textarea
}

// Agregar un evento para ejecutar el cálculo cuando el usuario haga clic en el botón
document.getElementById('calculate').addEventListener('click', calculateCarbonFootprint);
