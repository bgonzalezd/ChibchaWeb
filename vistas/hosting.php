<!DOCTYPE html>
<?php session_start();?>
<html lang="en">
  <head>
    <title>Hostings</title>
    <?php include("Comun/head.html"); ?>
    <style>

      input[type=text], input[type=password], select {
  width: 100%;
  padding: 12px 20px;
  margin: 8px 0;
  display: inline-block;
  border: 1px solid #ccc;
  box-sizing: border-box;
}

/* Set a style for all buttons */
button {
  background-color: #4CAF50;
  color: white;
  padding: 14px 20px;
  margin: 8px 0;
  border: none;
  cursor: pointer;
  width: 100%;
}

button:hover {
  opacity: 0.8;
}
   

    /* Extra styles for the cancel button */
    .cancelbtn {
      width: auto;
      padding: 10px 18px;
      background-color: #f44336;
    }


    .container {
      padding: 16px;
    }

    span.psw {
      float: right;
      padding-top: 16px;
    }

    /* The Modal (background) */
    .modal {
      display: none; /* Hidden by default */
      position: fixed; /* Stay in place */
      z-index: 1; /* Sit on top */
      left: 0;
      top: 0;
      width: 100%; /* Full width */
      height: 100%; /* Full height */
      overflow: auto; /* Enable scroll if needed */
      background-color: rgb(0,0,0); /* Fallback color */
      background-color: rgba(0,0,0,0.4); /* Black w/ opacity */
      padding-top: 60px;
    }

    /* Modal Content/Box */
    .modal-content {
      background-color: #fefefe;
      margin: 5% auto 15% auto; /* 5% from the top, 15% from the bottom and centered */
      border: 1px solid #888;
      width: 80%; /* Could be more or less, depending on screen size */
    }

    /* The Close Button (x) */
    .close {
      position: absolute;
      right: 25px;
      top: 0;
      color: #000;
      font-size: 35px;
      font-weight: bold;
    }

    .close:hover,
    .close:focus {
      color: red;
      cursor: pointer;
    }

    /* Add Zoom Animation */
    .animate {
      -webkit-animation: animatezoom 0.6s;
      animation: animatezoom 0.6s
    }

    @-webkit-keyframes animatezoom {
      from {-webkit-transform: scale(0)} 
      to {-webkit-transform: scale(1)}
    }
      
    @keyframes animatezoom {
      from {transform: scale(0)} 
      to {transform: scale(1)}
    }

    /* Change styles for span and cancel button on extra small screens */
    @media screen and (max-width: 300px) {
      span.psw {
         display: block;
         float: none;
      }
      .cancelbtn {
         width: 100%;
      }
    }
    </style>
    <script type="text/javascript">
      function comprar(){
        $(document).ready(function(){
          var tipo = $('#inicio_modal2').attr('data-cod');
          var nombre = $('#nhosting').val().trim();
          var sistema = $('#sistema').val();
          var request = $.ajax({
            url: "../respuestas/respuestaAgregarHosting.php",
            method: "POST",
              data: { nombre : nombre , sistema : sistema , tipo : tipo}
          });
           
          request.done(function( msg ) {
            
              var id = '#pago_c'+tipo;
              $(id).submit();
            
          });
           
          request.fail(function( jqXHR, textStatus ) {
            console.log( "Request failed: " + textStatus );
          });
        });
      }
    </script>
  </head>
  <body>
    
  <?php include("Comun/verificarSesionComun.php"); ?>
    <!-- END nav -->
    
    <!-- <div class="js-fullheight"> -->
    <div id="base" style="background-image: url('../images/fondo.png'); background-size: 100% 100%;">
      <div class="container-fluid">
        <div class="row no-gutters d-flex slider-text align-items-center justify-content-center" data-scrollax-parent="true">
          <div class="col-md-6 ftco-animate text-center" data-scrollax=" properties: { translateY: '70%' }">
            <p class="breadcrumbs" data-scrollax="properties: { translateY: '30%', opacity: 1.6 }"><span class="mr-2"><a href="index.php">Inicio</a></span> <span>Hosting</span></p>
            <h1 class="mb-3 bread" data-scrollax="properties: { translateY: '30%', opacity: 1.6 }">VPS Hosting</h1>
          </div>
        </div>
      </div>
    </div>

    <section class="ftco-section bg-light">
    	<div class="container">
    		<div class="row justify-content-center mb-5 pb-5">
          <div class="col-md-7 text-center heading-section ftco-animate">
            <span class="subheading">Precios</span>
            <h2 class="mb-4">Nuestros mejores precios</h2>
          </div>
        </div>
    		<div class="row">
	        <div class="col-md-4">
	          <div class="block-7">
	            <div class="text-center">
	            <h2 class="heading">Plata</h2>
	            <span class="price"><sup>$</sup> <span class="number">7.28 / mes</span></span>

<form action="https://www.paypal.com/cgi-bin/webscr" id="pago_c1" method="post" target="_top">
<input type="hidden" name="cmd" value="_s-xclick">
<input type="hidden" name="hosted_button_id" value="27VS5XADBWPHG">

	            <input type="button" name="pay_now" id="pay_now" style="width: 100%" onclick="document.getElementById('inicio_modal2').style.display='block';$(document).ready(function(){$('#inicio_modal2').attr('data-cod','1');})" value="Comprar" class="btn btn-primary d-block px-3 py-3 mb-4">
            </form>
	            
	            <h3 class="heading-2 mb-3">Disfruta de las siguientes características</h3>
	            
	            <ul class="pricing-text">
	              <li><strong>250 GB</strong> Banda ancha</li>
	              <li><strong>200 GB</strong> Capacidad de almacenamiento</li>
	              <li><strong>1</strong> Base de datos MySQL</li>
	            </ul>
	            </div>
	          </div>
	        </div>
	        <div class="col-md-4">
	          <div class="block-7">
	            <div class="text-center">
	            <h2 class="heading">Oro</h2>
	            <span class="price"><sup>$</sup> <span class="number">14.56 / mes</span></span>
              <form action="https://www.paypal.com/cgi-bin/webscr" id="pago_c2" method="post" target="_top">
<input type="hidden" name="cmd" value="_s-xclick">
<input type="hidden" name="hosted_button_id" value="WU94GBMFHJDZC">
	            <input type="button" name="pay_now" id="pay_now" style="width: 100%" onclick="document.getElementById('inicio_modal2').style.display='block';$(document).ready(function(){$('#inicio_modal2').attr('data-cod','2');})" value="Comprar" class="btn btn-primary d-block px-3 py-3 mb-4">
            </form>
	            
	            <h3 class="heading-2 mb-3">Disfruta de las siguientes características</h3>
	            
	            <ul class="pricing-text">
	              <li><strong>450 GB</strong> Banda ancha</li>
	              <li><strong>400 GB</strong> Capacidad de almacenamiento</li>
	              <li><strong>4</strong> Base de datos MySQL</li>
	            </ul>
	            </div>
	          </div>
	        </div>
	        <div class="col-md-4">
	         <div class="block-7">
	            <div class="text-center">
	            <h2 class="heading">Platino</h2>
	            <span class="price"><sup>$</sup> <span class="number">21.85 / mes</span></span>

<form action="https://www.paypal.com/cgi-bin/webscr" id="pago_c3" method="post" target="_top">
<input type="hidden" name="cmd" value="_s-xclick">
<input type="hidden" name="hosted_button_id" value="NY6LDFFSQ6QWE">
	            <input type="button" name="pay_now" id="pay_now" style="width: 100%" onclick="document.getElementById('inicio_modal2').style.display='block';$(document).ready(function(){$('#inicio_modal2').attr('data-cod','3');})" value="Comprar" class="btn btn-primary d-block px-3 py-3 mb-4">
            </form>
	            
	            <h3 class="heading-2 mb-3">Disfruta de las siguientes características</h3>
	            
	            <ul class="pricing-text">
	              <li><strong>1000 GB</strong> Banda ancha</li>
	              <li><strong>800 GB</strong> Capacidad de almacenamiento</li>
	              <li><strong>10</strong> Base de datos MySQL</li>
	            </ul>
	            </div>
	          </div>
	        </div>
	      </div>
    	</div>
    </section>

    <section class="ftco-section services-section">
      <div class="container">
      	<div class="row justify-content-center mb-5 pb-5">
          <div class="col-md-7 text-center heading-section ftco-animate">
            <span class="subheading">Servicios</span>
            <h2 class="mb-4">Porque elegirnos</h2>
          </div>
        </div>
        <div class="row">
          <div class="col-md-4 d-flex align-self-stretch ftco-animate">
            <div class="media block-6 services d-block text-center">
              <div class="d-flex justify-content-center"><div class="icon"><span class="flaticon-guarantee"></span></div></div>
              <div class="media-body p-2 mt-3">
                <h3 class="heading">100% Garantia</h3>
                <p>Garantia de buen funcionamiento de los planes de hosting</p>
              </div>
            </div>      
          </div>
          <div class="col-md-4 d-flex align-self-stretch ftco-animate">
            <div class="media block-6 services d-block text-center">
              <div class="d-flex justify-content-center"><div class="icon"><span class="flaticon-shield"></span></div></div>
              <div class="media-body p-2 mt-3">
                <h3 class="heading">Seguro</h3>
                <p>Seguridad en la información almacenada en el hosting</p>
              </div>
            </div>    
          </div>
          <div class="col-md-4 d-flex align-self-stretch ftco-animate">
            <div class="media block-6 services d-block text-center">
              <div class="d-flex justify-content-center"><div class="icon"><span class="flaticon-support"></span></div></div>
              <div class="media-body p-2 mt-3">
                <h3 class="heading">Soporte dedicado</h3>
                <p>Completo soporte antes cualquier complicación</p>
              </div>
            </div>      
          </div>
        </div>
      </div>
    </section>

    <div id="inicio_modal2" class="modal">
  
  <div class="modal-content animate" style="width: 50%">
    <div class="imgcontainer">
      <span onclick="document.getElementById('inicio_modal2').style.display='none'" class="close" title="Close Modal">&times;</span>
    </div>

    <div class="container">
      <form action="javascript:ingresar()">
        <label for="nhosting"><b>Nombre del hosting</b></label>
        <input type="text" placeholder="Enter Username" id="nhosting" required>

        <label for="psw"><b>Elija el sistema operativo</b></label>
        <select id="sistema">
        	<option value="Linux">Ubuntu 18.04</option>
        	<option value="Windows">Windows Server 2016</option>
        </select>

        <div id="msg_inicio" style="width: 100%;align-content: center;"></div>
          
        <button type="button" onclick="comprar();" class="search-domain btn btn-primary px-5" style="margin-top: 30px">Comprar</button>
      </form>
    </div>
  </div>

    
    <?php include("Comun/footer.html"); ?>
    
   <?php include("Comun/verificarSesionComun2.php"); ?>
  

  <!-- loader -->
  <div id="ftco-loader" class="show fullscreen"><svg class="circular" width="48px" height="48px"><circle class="path-bg" cx="24" cy="24" r="22" fill="none" stroke-width="4" stroke="#eeeeee"/><circle class="path" cx="24" cy="24" r="22" fill="none" stroke-width="4" stroke-miterlimit="10" stroke="#F96D00"/></svg></div>

<?php include("Comun/script.html"); ?>
    
  </body>
</html>