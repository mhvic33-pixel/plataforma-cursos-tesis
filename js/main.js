// Función auxiliar para buscar elementos sin que el script se rompa si no existen
const getEl = (id) => document.getElementById(id);

// --- VARIABLES ---
const botones = document.querySelectorAll(".btn-inscribirse");
const modal = getEl("modal");
const overlay = getEl("overlay");
const cerrar = getEl("cerrarModal");
const form = getEl("formCompra");
const mensajeDiv = getEl("mensajeEstado");

// --- MODAL: ABRIR/CERRAR ---
botones.forEach(boton => {
    boton.addEventListener("click", () => {
        if (modal) modal.style.display = "block";
        if (overlay) overlay.style.display = "block";
    });
});

if (cerrar && modal && overlay) {
    const cerrarAccion = () => {
        modal.style.display = "none";
        overlay.style.display = "none";
    };
    cerrar.addEventListener("click", cerrarAccion);
    overlay.addEventListener("click", cerrarAccion);
}

// --- FORMULARIO: INSCRIPCIÓN ---
if (form) {
    form.addEventListener("submit", (e) => {
        e.preventDefault();
        const datos = new FormData(form);
        const cursoId = form.querySelector('input[name="curso_id"]').value;

        fetch('procesar_universal.php', {
            method: 'POST',
            body: datos,
            credentials: 'include' // <--- Cambiado para permitir la sesión
        })
        .then(res => res.text())
        .then(respuesta => {
            const res = respuesta.trim();
            if (mensajeDiv) {
                if (res.includes("exito") || res.includes("existe")) {
                    mensajeDiv.innerHTML = "<p style='color:green;'>¡Acceso confirmado! Redirigiendo...</p>";
                    
                    // REDIRECCIÓN PARA AMBOS CASOS (NUEVO O YA REGISTRADO):
                    setTimeout(() => {
                        window.location.href = "contenido_curso.php?id=" + cursoId;
                    }, 1000);
                    
                } else {
                    mensajeDiv.innerHTML = "<p style='color:red;'>Servidor: " + res + "</p>";
                }
            }
        })
        .catch(error => {
            if (mensajeDiv) mensajeDiv.innerHTML = "<p style='color:red;'>Error de conexión.</p>";
            console.error("Error en Fetch:", error);
        });
    });
}

// --- LÓGICA DE PAGOS Y DESCUENTOS ---
const esEstudiante = getEl("esEstudiante");
const nivelContainer = getEl("nivelContainer");
const metodoPago = getEl("metodoPago");

if (esEstudiante) {
    esEstudiante.addEventListener("change", function(){
        nivelContainer.style.display = (this.value === "si") ? "block" : "none";
        calcularPrecio();
    });
}

if (metodoPago) {
    metodoPago.addEventListener("change", function(){
        const seccionPago = getEl("seccionPago");
        const campos = [getEl("tarjetaCampos"), getEl("transferenciaCampos"), getEl("paypalCampos")];
        
        campos.forEach(c => { if(c) c.style.display = "none"; });
        
        if(this.value === ""){
            seccionPago.style.display = "none";
        } else {
            seccionPago.style.display = "block";
            const mostrar = getEl(this.value + "Campos");
            if(mostrar) mostrar.style.display = "block";
            const btn = getEl("btnConfirmarPago");
            if(btn) btn.style.display = "block";
        }
        calcularPrecio();
    });
}

const nivelEstudios = getEl("nivelEstudios");
if (nivelEstudios) nivelEstudios.addEventListener("change", calcularPrecio);

function calcularPrecio(){
    const precioBase = 300;
    const est = esEstudiante ? esEstudiante.value : "no";
    const niv = nivelEstudios ? nivelEstudios.value : "";
    let descuento = 0;

    if(est === "si"){
        if(niv === "secundaria") descuento = 0.20;
        else if(niv === "prepa") descuento = 0.15;
        else if(niv === "universidad") descuento = 0.10;
    }

    let total = precioBase - (precioBase * descuento);
    const precioFinal = getEl("precioFinal");
    if(precioFinal){
        precioFinal.innerHTML = "Descuento: " + (descuento * 100) + "%<br><strong>Total: $" + total + " MXN</strong>";
    }
};
