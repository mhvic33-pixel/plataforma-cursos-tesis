<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" type="text/css" href="css/proyecto.css">
	<title>SKILL UP</title>
</head>
<body>

	<h1>CENTRO DE CURSOS CREATIVOS </h1>

	<div>

		<img src="img/col.jpeg" class="centro">
		
	</div>

	<div class="barra-cursos">
        <span class="titulo-barra">CURSOS DISPONIBLES</span>

        <a href="#dibujo">Dibujo</a>
        <a href="#ejercicio">Ejercicio</a>
        <a href="#manualidades">Manualidades</a>
        <a href="#matematicas">Matemáticas</a>
        <a href="#ciberseguridad">Ciberseguridad</a>
        <button id="btnLogin" style="position:absolute; right:20px; padding:6px 12px; cursor:pointer;">
    Iniciar sesión
</button>

<span id="usuarioNombre" style="position:absolute; right:20px; display:none; color:white; font-weight:bold;"></span>
          
    </div>

    <div class="galeria">

	<div class="item">
        <img src="img/dib.jpg" id="dibujo">
        <h2>DIBUJO</h2>
        <p>Convierte tu creatividad en arte. Aprende técnicas modernas de dibujo y da vida a tus ideas con estilo propio.</p>
        <a href="dibu.html" class="btn-curso">
            Ver más
        </a>
    </div>

    <div class="item">
        <img src="img/ejer.jpeg" id="ejercicio">
        <p>Activa tu cuerpo, mejora tu energía y transforma tu estilo de vida con rutinas dinámicas y motivadoras.</p>
        <h3>EJERCICIO</h3>
        <a href="ejer.html" class="btn-curso">
            Ver más
        </a>
    </div>

    <div class="item">
        <img src="img/man.jpeg" id="manualidades">
        <h4>MANUALIDADES</h4>
        <p>¡Crea, diseña y sorprende! Desarrolla tu talento manual mientras realizas proyectos originales y divertidos.</p>
        <a href="manu.html" class="btn-curso">
            Ver más
        </a>
    </div>

    <div class="item">
        <img src="img/mat.jpeg" id="matematicas">
        <p>¡Descubre el poder de los números! Aprende a resolver problemas con confianza y desarrolla una mente lógica que te abrirá puertas en cualquier carrera.</p>
        <h5>MATEMATICAS</h5>
        <a href="mate.html" class="btn-curso">
            Ver más
        </a>
    </div>

    <div class="item">
        <img src="img/seg.jpeg" id="ciberseguridad">
        <h6>CIBERSEGURIDAD</h6>
        <p>Protege tu mundo digital. Aprende a defender tu información y navega por internet con seguridad y confianza.</p>
        <a href="ciber.html"  class="btn-curso">
            Ver más
        </a>
    </div>
	
  </div>	

  <footer>
    <p>© 2026 Centro de Cursos | 
        <a href="politicas.html">Políticas</a> | 
        <a href="privacidad.html">Privacidad</a>
    </p>
</footer>

<div id="modalLogin" style="display:none; position:fixed; left:0; top:0; width:100%; height:100%; background:rgba(0,0,0,0.6);">
    
    <div style="background:white; width:300px; padding:20px; margin:10% auto; border-radius:10px; text-align:center;">
        
        <span id="cerrarModal" style="float:right; cursor:pointer; font-size:20px;">&times;</span>
        
        <h3>Iniciar Sesión</h3>
        
        <input type="email" id="correo" placeholder="Correo"><br><br>
        <input type="password" id="password" placeholder="Contraseña"><br><br>
        
        <button id="iniciarSesion">Entrar</button>
        
    </div>
</div>

</body>
</html>
