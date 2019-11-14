<!DOCTYPE html>
<?php session_start();
  include ("../mapeo/ServicioUsuario.php");?>
<html lang="en">
  <head>
    <title>Contacto</title>
    <?php include("Comun/head.html"); ?>
    <script type="text/javascript">
      function enviarMensaje(){
        $(document).ready(function(){
          var asunto = $('#asunto').val().trim();
          var mensaje = $('#mensaje').val().trim();
          var request = $.ajax({
              url: "../respuestas/respuestaEnviarMensaje.php",
              method: "POST",
              data: { asunto : asunto , mensaje : mensaje }
            });
             
          request.done(function( msg ) {
            alert("Mensaje enviado correctamente");
            $('#asunto').val('');
            $('#mensaje').val('');
          });
           
          request.fail(function( jqXHR, textStatus ) {
            console.log( "Request failed: " + textStatus );
          });
        });
      }
    </script>
  </head>
  <body>
    
  <?php include("Comun/verificarSesion.php"); ?>
    <!-- END nav -->
    
    <!-- <div class="js-fullheight"> -->
    <div id="base" style="background-image: url('../images/fondo.png'); background-size: 100% 100%;">
      <div class="container-fluid">
        <div class="row no-gutters d-flex slider-text align-items-center justify-content-center" data-scrollax-parent="true">
          <div class="col-md-6 ftco-animate text-center" data-scrollax=" properties: { translateY: '70%' }">
            <p class="breadcrumbs" data-scrollax="properties: { translateY: '30%', opacity: 1.6 }"><span class="mr-2"><a href="index.html">Home</a></span> <span>Contacto</span></p>
            <h1 class="mb-3 bread" data-scrollax="properties: { translateY: '30%', opacity: 1.6 }">Contacto</h1>
          </div>
        </div>
      </div>
    </div>

    <section class="ftco-section contact-section ftco-degree-bg">
      <div class="container">
        <div class="row d-flex mb-5 contact-info">
          <div class="col-md-12 mb-4">
            <h2 class="h4">Información de contacto</h2>
          </div>
          <div class="w-100"></div>
          <div class="col-md-3">
            <p><span>Dirección:</span> Calle 29a Sur #29-28 </p>
          </div>
          <div class="col-md-3">
            <p><span>Phone:</span> <a href="tel://1234567920">+57 314 678 4280</a></p>
          </div>
          <div class="col-md-3">
            <p><span>Email:</span> <a href="mailto:info@yoursite.com">info@chibcha.com</a></p>
          </div>
          <div class="col-md-3">
            <p><span>Website</span> <a href="#">www.chibcha.com</a></p>
          </div>
        </div>
        <div class="row block-9">
          <div class="col-md-6 pr-md-5">
            <form action="javascript:enviarMensaje()">

              <!--<?php
                /*if (!(isset($_SESSION['cod_user']) && !empty($_SESSION['cod_user']))) {
                  ?>
                    <div class="form-group">
                      <input type="text" id="email" class="form-control" placeholder="Tu Email">
                    </div>
                  <?php
                }*/

              ?>-->
              <div class="form-group">
                <input type="text" id="asunto" class="form-control" placeholder="Asunto">
              </div>
              <div class="form-group">
                <textarea name="" id="mensaje" cols="30" rows="7" class="form-control" placeholder="Mensaje"></textarea>
              </div>
              <div class="form-group">
                <input type="submit" value="Enviar Mensaje" class="btn btn-primary py-3 px-5">
              </div>
            </form>
          
          </div>

          <div class="col-md-6" id="map"></div>
        </div>
      </div>
    </section>

    <?php include("Comun/footer.html"); ?>
    
  

  <!-- loader -->
  <div id="ftco-loader" class="show fullscreen"><svg class="circular" width="48px" height="48px"><circle class="path-bg" cx="24" cy="24" r="22" fill="none" stroke-width="4" stroke="#eeeeee"/><circle class="path" cx="24" cy="24" r="22" fill="none" stroke-width="4" stroke-miterlimit="10" stroke="#F96D00"/></svg></div>


  <?php include("Comun/script.html"); ?>
    
  </body>
</html>