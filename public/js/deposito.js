document.addEventListener("DOMContentLoaded", function () {
  const form = document.getElementById("depositoForm");
  const tabla = document.getElementById("depositosTabla");

  form.addEventListener("submit", function (e) {
    e.preventDefault();

    const cliente = form.cliente.value;
    const monto = parseFloat(form.monto.value).toFixed(2);
    const fecha = form.fecha.value;
    const metodo = form.metodo.value;
    const ref = form.referencia.value || "---";

    if (!cliente || !monto || !fecha || !metodo) {
      alert("Por favor completa todos los campos obligatorios.");
      return;
    }

    // Agregar fila a la tabla sin recargar
    const nuevaFila = `
      <tr>
        <td>${cliente}</td>
        <td>S/ ${monto}</td>
        <td>${fecha}</td>
        <td>${metodo}</td>
        <td>${ref}</td>
      </tr>
    `;
    tabla.insertAdjacentHTML("afterbegin", nuevaFila);

    form.reset();
  });
});
