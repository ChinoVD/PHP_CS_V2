document.getElementById("carbon-form").addEventListener("submit", function(event) {
    event.preventDefault();

    const aiModel = document.getElementById("ai-model").value;
    const usageHours = document.getElementById("usage-hours").value;
    const energySource = document.getElementById("energy-source").value;

    // Establecer el factor de emisiones por tipo de energía
    const emissionFactor = energySource === "renewable" ? 0.1 : 0.9; // kg CO2/kWh para energía renovable o no renovable

    // Establecer el consumo de energía en función del tipo de modelo
    let energyConsumptionPerHour;
    switch (aiModel) {
        case "small":
            energyConsumptionPerHour = 0.1; // kWh/hora para un modelo pequeño
            break;
        case "medium":
            energyConsumptionPerHour = 0.5; // kWh/hora para un modelo mediano
            break;
        case "large":
            energyConsumptionPerHour = 2; // kWh/hora para un modelo grande
            break;
        default:
            energyConsumptionPerHour = 0.1;
    }

    // Calcular el consumo total de energía
    const totalEnergyConsumption = usageHours * energyConsumptionPerHour;

    // Calcular la huella de carbono
    const carbonFootprint = totalEnergyConsumption * emissionFactor;

    // Mostrar el resultado
    document.getElementById("total-carbon").textContent = carbonFootprint.toFixed(2);

    // Mostrar el gráfico
    const ctx = document.getElementById("carbon-chart").getContext("2d");
    const carbonChart = new Chart(ctx, {
        type: "bar",
        data: {
            labels: ["Huella de Carbono"],
            datasets: [{
                label: "kg CO2",
                data: [carbonFootprint],
                backgroundColor: "rgba(56, 142, 60, 0.7)",
                borderColor: "#388e3c",
                borderWidth: 1
            }]
        },
        options: {
            responsive: true,
            scales: {
                y: {
                    beginAtZero: true
                }
            }
        }
    });

    // Mostrar la sección de resultados
    document.getElementById("result").style.display = "block";
});
