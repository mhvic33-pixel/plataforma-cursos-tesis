const btnLogin = document.getElementById("btnLogin");
const modal = document.getElementById("modalLogin");
const cerrar = document.querySelector(".close");
const iniciarSesion = document.getElementById("iniciarSesion");
const usuarioMenu = document.getElementById("usuarioMenu");
const cerrarSesion = document.getElementById("cerrarSesion");
const correoUsuario = document.getElementById("correoUsuario");

// Revisar si ya hay sesión guardada
if(localStorage.getItem("usuarioCorreo")){
    correoUsuario.textContent = "👤 " + localStorage.getItem("usuarioCorreo");
    usuarioMenu.style.display = "block";
    btnLogin.style.display = "none";
}

// Abrir modal
btnLogin.addEventListener("click", function(){
    modal.style.display = "block";
});

// Cerrar modal
cerrar.addEventListener("click", function(){
    modal.style.display = "none";
});

// Iniciar sesión
iniciarSesion.addEventListener("click", function(){

    const correo = document.getElementById("correo").value;
    const password = document.getElementById("password").value;

    if(correo !== "" && password !== ""){

        localStorage.setItem("usuarioCorreo", correo);

        correoUsuario.textContent = "👤 " + correo;
        usuarioMenu.style.display = "block";
        btnLogin.style.display = "none";

        modal.style.display = "none";

    } else {
        alert("Completa todos los campos");
    }
});

cerrarSesion.addEventListener("click", function(){
    localStorage.removeItem("usuarioCorreo");

    usuarioMenu.style.display = "none";
    btnLogin.style.display = "block";
});
