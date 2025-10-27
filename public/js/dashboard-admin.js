  document.addEventListener("DOMContentLoaded", function () {
    // Gráfica de líneas (actividad mensual)
    const ctx1 = document.getElementById("chartActividad").getContext("2d");
    new Chart(ctx1, {
      type: "line",
      data: {
        labels: ["Ene", "Feb", "Mar", "Abr", "May", "Jun", "Jul", "Ago"],
        datasets: [{
          label: "Trámites procesados",
          data: [10, 20, 15, 30, 25, 40, 35, 50],
          borderColor: "#6366f1",
          backgroundColor: "rgba(99, 102, 241, 0.2)",
          borderWidth: 2,
          fill: true,
          tension: 0.4,
        }],
      },
      options: {
        responsive: true,
        plugins: {
          legend: { display: false },
        },
        scales: {
          y: { beginAtZero: true },
        },
      },
    });

    // Gráfica de dona (movimientos)
    const ctx2 = document.getElementById("chartMovimientos").getContext("2d");
    new Chart(ctx2, {
      type: "doughnut",
      data: {
        labels: ["Depósitos", "Retiros", "Trámites"],
        datasets: [{
          data: [55, 25, 20],
          backgroundColor: ["#34d399", "#f87171", "#6366f1"],
          borderWidth: 0,
        }],
      },
      options: {
        cutout: "70%",
        plugins: { legend: { position: "bottom" } },
      },
    });
  });
