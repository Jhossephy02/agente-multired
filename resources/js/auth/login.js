// Animación de murciélagos
console.log("🎃 Login Halloween activo");

document.addEventListener("mousemove", (e) => {
    const bats = document.querySelectorAll(".bat");
    bats.forEach((bat, index) => {
        const speed = (index + 1) * 0.02;
        bat.style.transform = `translate(${e.clientX * speed}px, ${e.clientY * speed}px)`;
    });
});

// Toggle mostrar contraseña
const passwordInput = document.querySelector("input[name='password']");
const toggle = document.createElement("span");
toggle.textContent = "👁‍🗨";
toggle.style.cursor = "pointer";
toggle.style.marginLeft = "-30px";
toggle.style.userSelect = "none";
passwordInput.parentNode.style.position = "relative";
passwordInput.parentNode.appendChild(toggle);

toggle.addEventListener("click", () => {
    passwordInput.type = passwordInput.type === "password" ? "text" : "password";
});
