document.addEventListener("DOMContentLoaded", function () {
  const form = document.getElementById("tramiteForm");
  const tabla = document.getElementById("tramitesTabla");

  form.addEventListener("submit", function (e) {
    e.preventDefault();

    const cliente = form.cliente.value;
    const tipo = form.tipo.value.trim();
    const descripcion = form.descripcion.value.trim();
    const fecha = form.fecha.value;

    if (!cliente || !tipo || !descripcion || !fecha) {
      alert("Por favor completa todos los campos antes de registrar el trámite.");
      return;
    }

    const nuevaFila = `
      <tr>
        <td>${cliente}</td>
        <td>${tipo}</td>
        <td>${descripcion}</td>
        <td>${fecha}</td>
        <td><span class="badge bg-warning text-dark">Pendiente</span></td>
        <td>
          <button class="btn btn-sm btn-success actualizarEstado">
            <i class="bi bi-check-circle"></i>
          </button>
        </td>
      </tr>
    `;
    tabla.insertAdjacentHTML("afterbegin", nuevaFila);
    form.reset();
  });

  // Cambiar estado de trámite a "Completado"
  document.addEventListener("click", function (e) {
    if (e.target.closest(".actualizarEstado")) {
      const fila = e.target.closest("tr");
      const estado = fila.querySelector("td:nth-child(5)");
      estado.innerHTML = '<span class="badge bg-success">Completado</span>';
      e.target.closest("td").innerHTML = "-";
    }
  });
});
