document.addEventListener("DOMContentLoaded", function () {
  const ctx = document.getElementById("chartUserActivity").getContext("2d");
  new Chart(ctx, {
    type: "bar",
    data: {
      labels: ["Lun", "Mar", "Mié", "Jue", "Vie", "Sáb", "Dom"],
      datasets: [{
        label: "Movimientos",
        data: [5, 2, 3, 4, 6, 1, 3],
        backgroundColor: "rgba(99, 102, 241, 0.7)",
        borderRadius: 6,
      }],
    },
    options: {
      plugins: { legend: { display: false } },
      scales: {
        y: { beginAtZero: true },
      },
    },
  });
});
