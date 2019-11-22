<!DOCTYPE html>
<?php session_start();
  include ("../mapeo/ServicioUsuario.php");
  include ("../mapeo/ServicioMensaje.php");?>
<html lang="en">
  <head>
    <title>Tickets</title>
    <?php include("Comun/head.html"); ?>
    <style>
.mensajes {
  border-collapse: collapse;
  border-spacing: 0;
  width: 100%;
  border: 1px solid #ddd;
}

.columna {
  text-align: left;
  color: black;
  padding: 8px;
}

::-webkit-scrollbar{
  display: none;
}
.fila:hover{
  border-style: solid;
  border-color: black;
  cursor: pointer;
}

tr:nth-child(even){background-color: #f2f2f2}
</style>
<script type="text/javascript">
  function enviarRespuesta(){
    $(document).ready(function(){

      $('#circulo').show();
      var cod_usuario = $('#formulario-mensaje').attr('cod-usuario');
      var mensaje = $('#mensaje').val().trim();
      var asu = $('#titulo-mensaje').text().trim();
      var request = $.ajax({
        url: "../respuestas/respuestaResponderMensaje.php",
        method: "POST",
        data: { cod_usuario : cod_usuario , mensaje : mensaje , asunto : asu }
      });
       
      request.done(function( msg ) {

        $('#circulo').hide();
        alert(msg);
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
  <?php include("Comun/verificarSesionAdmin.php"); ?>
    <!-- END nav -->
    
    <!-- <div class="js-fullheight"> -->
    <div id="base" style="background-image: url('../images/fondo.png'); background-size: 100% 100%;">
      
    </div>

    <h1 style="margin-top: 50px;width: 100%" align="center">Mensajes</h1>   

    <section class="ftco-section bg-light" style="padding: 0 0 0 0;border: 2px solid black" > 
<!------ Include the above in your HEAD tag ---------->
        <div style=" align-content: center; width: 100%">
          <table style="width: 100%">
            <tr>
              <td style="width: 40%;height: 700px;border-right: 2px solid black;vertical-align: top;">
                <div style="overflow-x:auto;">
                  <table class="mensajes">
                    <?php

                        $sm = new ServicioMensaje();
                        $su = new ServicioUsuario();
                        $arr = $sm->getAll();
                        $aux = 0;
                        foreach ($arr as $mensaje){
                          $cli = $su->getInfoUsuario($mensaje->cod_usuario);
                          $cli->clave = '';
                          if($aux == 0){
                            $first_m = $mensaje;
                            $first_u = $cli;
                          }
                          $aux = $aux + 1;
                          ?>
                            <tr class="fila" data-mensaje='<?php echo json_encode($mensaje); ?>' data-usuario='<?php echo json_encode($cli); ?>' >
                              <td class="columna"><?php echo $mensaje->fecha;?></td>
                              <td class="columna" style="border-left: 1px solid black"><?php echo $cli->nombre; ?></td>
                              <td class="columna" style="border-left: 1px solid black"><?php echo $mensaje->asunto; ?></td>
                            </tr>
                          <?php
                        }
                    ?>
                  </table>
                </div> 
              </td>
              <td>
                <div style="overflow-x:auto;height: 700px; padding-left: 15px; padding-right: 30px">
                  <h1 id="titulo-mensaje"></h1>
                  <h1 id="nombre-usuario" style="font-size: 30px"></h1>
                  <h1 id="fecha-mensaje" style="font-size: 30px"></h1>
                  <div id="mensaje-grande" style="font-size: 25px"></div>
                  <form action="javascript:enviarRespuesta()" id="formulario-mensaje" cod-usuario="-1" style="margin-top: 30px;width: 100%">

                    <div class="form-group">
                      <textarea name="" id="mensaje" required style="width: 100%" rows="7" class="form-control" placeholder="Mensaje"></textarea>
                    </div>
                    <table>
                      <tr>
                        <td>
                          <div class="form-group">
                            <input type="submit" value="Enviar Respuesta" class="btn btn-primary py-3 px-5" style="background-color: blue;color: white">
                          </div>
                        </td>
                        <td>
                          <img id="circulo" src="../images/progress.gif" style="width: 80px; vertical-align: middle;"/>
                        </td>
                      </tr>
                    </table>

                    
                  </form>
                </div>
              </td>
            </tr>
          </table>
        </div>
        
    </section>


    <?php include("Comun/footer.html") ; ?>
  

  <!-- loader -->
  <div id="ftco-loader" class="show fullscreen"><svg class="circular" width="48px" height="48px"><circle class="path-bg" cx="24" cy="24" r="22" fill="none" stroke-width="4" stroke="#eeeeee"/><circle class="path" cx="24" cy="24" r="22" fill="none" stroke-width="4" stroke-miterlimit="10" stroke="#F96D00"/></svg></div>


  <?php include("Comun/script.html"); ?>
  <script type="text/javascript">
  $(document).ready(function() {
        $('#circulo').hide();
        $('#titulo-mensaje').text("<?php echo $first_m->asunto ?>");
        $('#nombre-usuario').text("<?php echo $first_u->nombre ?>");
        $('#fecha-mensaje').text("<?php echo $first_m->fecha ?>");
        $('#mensaje-grande').text("<?php echo $first_m->mensaje ?>");
        $('#formulario-mensaje').attr("cod-usuario","<?php echo $first_u->codigo ?>");

      $('.fila').click(function() {
        var mens = JSON.parse($(this).attr('data-mensaje'));
        var us = JSON.parse($(this).attr('data-usuario'));
        $('#titulo-mensaje').text(mens.asunto);
        $('#nombre-usuario').text(us.nombre);
        $('#fecha-mensaje').text(mens.fecha);
        $('#mensaje-grande').text(mens.mensaje);
        $('#formulario-mensaje').attr("cod-usuario",us.codigo);

      });

  });
</script>
    
  </body>
</html>