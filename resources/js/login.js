const togglePassword = document.querySelector("#togglePassword");
const password = document.querySelector("#password");
const form = document.querySelector("#loginForm");

togglePassword.addEventListener("click", () => {
  const type = password.getAttribute("type") === "password" ? "text" : "password";
  password.setAttribute("type", type);
  togglePassword.textContent = type === "password" ? "👁️" : "🙈";
});

form.addEventListener("submit", (e) => {
  e.preventDefault();

  const email = document.querySelector("#email").value.trim();
  const pass = password.value.trim();

  if (!email || !pass) {
    alert("Por favor completa todos los campos.");
    return;
  }

  // Ejemplo de validación simple
  if (!email.includes("@")) {
    alert("Introduce un correo válido.");
    return;
  }

  // Simulación de inicio de sesión
  alert("Inicio de sesión exitoso 🎉");
  form.reset();
});
