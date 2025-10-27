document.addEventListener("DOMContentLoaded", function () {
  const form = document.getElementById("retiroForm");
  const tabla = document.getElementById("retirosTabla");

  form.addEventListener("submit", function (e) {
    e.preventDefault();

    const cliente = form.cliente.value;
    const cuenta = form.cuenta.value;
    const monto = parseFloat(form.monto.value).toFixed(2);
    const fecha = form.fecha.value;

    if (!cliente || !cuenta || !monto || !fecha) {
      alert("Por favor completa todos los campos antes de continuar.");
      return;
    }

    const nuevaFila = `
      <tr>
        <td>${cliente}</td>
        <td>${cuenta}</td>
        <td>S/ ${monto}</td>
        <td>${fecha}</td>
      </tr>
    `;
    tabla.insertAdjacentHTML("afterbegin", nuevaFila);
    form.reset();
  });
});
