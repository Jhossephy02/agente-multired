document.addEventListener("DOMContentLoaded", function () {
  const form = document.getElementById("pagoForm");
  const tabla = document.getElementById("pagosTabla");

  form.addEventListener("submit", function (e) {
    e.preventDefault();

    const cliente = form.cliente.value;
    const servicio = form.servicio.value;
    const monto = parseFloat(form.monto.value).toFixed(2);
    const fecha = form.fecha.value;
    const metodo = form.metodo.value;

    if (!cliente || !servicio || !monto || !fecha || !metodo) {
      alert("Por favor completa todos los campos obligatorios.");
      return;
    }

    const nuevaFila = `
      <tr>
        <td>${cliente}</td>
        <td>${servicio}</td>
        <td>S/ ${monto}</td>
        <td>${fecha}</td>
        <td>${metodo}</td>
      </tr>
    `;
    tabla.insertAdjacentHTML("afterbegin", nuevaFila);
    form.reset();
  });
});
