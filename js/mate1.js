const boton = document.querySelector(".btn-inscribirse");
const modal = document.getElementById("modal");
const overlay = document.getElementById("overlay");
const cerrar = document.getElementById("cerrarModal");
const form = document.getElementById("formCompra");
const esEstudiante = document.getElementById("esEstudiante");
const nivelContainer = document.getElementById("nivelContainer");
const nivelEstudios = document.getElementById("nivelEstudios");
const descuentoTexto = document.getElementById("descuentoTexto");

boton.addEventListener("click", () => {
modal.style.display = "block";
overlay.style.display = "block";
});

cerrar.addEventListener("click", () => {
modal.style.display = "none";
overlay.style.display = "none";
});

overlay.addEventListener("click", () => {
modal.style.display = "none";
overlay.style.display = "none";
});

form.addEventListener("submit", (e) => {
e.preventDefault();
alert("¡Inscripción realizada con éxito!");
modal.style.display = "none";
overlay.style.display = "none";
});

esEstudiante.addEventListener("change", function(){

	if(this.value === "si"){
		nivelContainer.style.display = "block";
	} else {
		nivelContainer.style.display = "none";
		descuentoTexto.textContent = "";
	}
});

nivelEstudios.addEventListener("change", function(){
	let descuento = 0;

	if(this.value === "secundaria"){
		descuento = 20;
	}

	if(this.value === "prepa"){
		descuento = 15;
	}

	if(this.value === "universidad"){
		descuento = 10;
	}
})


const precioBase = 300;

const metodoPago = document.getElementById("metodoPago");
const seccionPago = document.getElementById("seccionPago");
const tarjetaCampos = document.getElementById("tarjetaCampos");
const transferenciaCampos = document.getElementById("transferenciaCampos");
const paypalCampos = document.getElementById("paypalCampos");
const precioFinal = document.getElementById("precioFinal");
const btnConfirmarPago = document.getElementById("btnConfirmarPago");

metodoPago.addEventListener("change", function(){

    let metodo = this.value;

    // Ocultar todo primero
    tarjetaCampos.style.display = "none";
    transferenciaCampos.style.display = "none";
    paypalCampos.style.display = "none";
    btnConfirmarPago.style.display = "none";

    if(metodo === ""){
        seccionPago.style.display = "none";
        return;
    }

    seccionPago.style.display = "block";

    if(metodo === "tarjeta"){
        tarjetaCampos.style.display = "block";
    }

    if(metodo === "transferencia"){
        transferenciaCampos.style.display = "block";
    }

    if(metodo === "paypal"){
        paypalCampos.style.display = "block";
    }

    calcularPrecio();
});

document.getElementById("esEstudiante").addEventListener("change", calcularPrecio);
document.getElementById("nivelEstudios").addEventListener("change", calcularPrecio);



function calcularPrecio(){

    let estudiante = document.getElementById("esEstudiante").value;
    let nivel = document.getElementById("nivelEstudios").value;

    let descuento = 0;

    if(estudiante === "si"){
        if(nivel === "secundaria") descuento = 0.20;
        if(nivel === "prepa") descuento = 0.15;
        if(nivel === "universidad") descuento = 0.10;
    }

    let total = precioBase - (precioBase * descuento);

    document.getElementById("precioFinal").innerHTML =
        "Descuento: " + (descuento * 100) + "%<br>" +
        "<strong>Total a pagar: $" + total + " MXN</strong>";
}