let loggedIn = false;

let loginAttempts = 0;

let lockLogin = false;

let loginTimeout;

function openLogin(){

    if(lockLogin){

        alert("Bloqueado 5 segundos");

        return;
    }

    document.getElementById("loginModal").style.display="flex";

    loginTimeout = setTimeout(()=>{

        document.getElementById("loginModal").style.display="none";

        alert("Tiempo agotado");

    },15000);
}

function login(){

    let email =
    document.getElementById("email").value;

    let password =
    document.getElementById("password").value;

    if(email==="usuario@gmail.com" &&
    password==="1234"){

        loggedIn = true;

        clearTimeout(loginTimeout);

        document.getElementById("loginModal")
        .style.display="none";

        document.querySelector(".login-btn")
        .style.display="none";

        document.querySelector(".logout-btn")
        .style.display="inline-block";

        alert("Sesión iniciada");

        loginAttempts = 0;

    }else{

        loginAttempts++;

        document.getElementById("loginMessage")
        .innerText="Datos incorrectos";

        if(loginAttempts>=3){

            lockLogin = true;

            document.getElementById("loginMessage")
            .innerText="Bloqueado 5 segundos";

            setTimeout(()=>{

                lockLogin=false;

                loginAttempts=0;

                document.getElementById("loginMessage")
                .innerText="";

            },5000);
        }
    }
}

function logout(){

    loggedIn=false;

    document.querySelector(".login-btn")
    .style.display="inline-block";

    document.querySelector(".logout-btn")
    .style.display="none";

    goHome();

    alert("Sesión cerrada");
}

function openCourse(course){

    if(!loggedIn){

        alert("Debes iniciar sesión");

        return;
    }

    document.getElementById("mainMenu")
    .style.display="none";

    if(course==="facebook"){

        document.getElementById("facebookPage")
        .style.display="block";
    }

    if(course==="whatsapp"){

        document.getElementById("whatsappPage")
        .style.display="block";
    }
}

function goHome(){

    document.getElementById("mainMenu")
    .style.display="flex";

    document.getElementById("facebookPage")
    .style.display="none";

    document.getElementById("whatsappPage")
    .style.display="none";
}

function showPayment(course){

    if(course==="facebook"){

        document.getElementById("facebookPayment")
        .style.display="block";
    }

    if(course==="whatsapp"){

        document.getElementById("whatsappPayment")
        .style.display="block";
    }
}

function confirmPurchase(course){

    alert("Compra realizada");

    if(course==="facebook"){

        document.getElementById("facebookLessons")
        .style.display="block";
    }

    if(course==="whatsapp"){

        document.getElementById("whatsappLessons")
        .style.display="block";
    }
}