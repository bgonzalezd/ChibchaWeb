<!DOCTYPE html>
<?php session_start();
  include ("../mapeo/ServicioUsuario.php");
  include ("../mapeo/ServicioDominio.php");?>
<html lang="en">
  <head>
    <title>Solicitudes</title>
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

tr:nth-child(even){background-color: #f2f2f2}
</style>
<script type="text/javascript">
  function accionar(codigo,accion){
    $(document).ready(function(){
      var request = $.ajax({
          url: "../respuestas/respuestaAceptarDominio.php",
          method: "POST",
          data: {codigo : codigo , accion : accion}
        });
         
        request.done(function( msg ) {
          alert(msg);
          location.reload();
        });
         
        request.fail(function( jqXHR, textStatus ) {
          console.log( "Request failed: " + textStatus );
        });
    });
  }
</script>
 </head>
  <body>
  <?php include("Comun/verificarSesionDistri.php"); ?>
    <!-- END nav -->
    
    <!-- <div class="js-fullheight"> -->
    <div id="base" style="background-image: url('../images/fondo.png'); background-size: 100% 100%;">
      
    </div>

    <h1 style="margin-top: 50px;width: 100%" align="center">Nombre de dominios</h1>
    <table>
        <tr>
          <td>
          </td>
        </tr>
      </table>   

    <section class="ftco-section bg-light" style="padding: 60px 60px 60px 60px;background-color: white" > 
<!------ Include the above in your HEAD tag ---------->
        <div style=" align-content: center; width: 100%;height: 100%;background-color: white">
                <div style="overflow-x:auto;max-height: 700px;height: 100%;background-color: white">
                    <table class="mensajes" style="vertical-align: top;height: 100%;border: 2px solid black">
                      <tr class="fila">
                        <th class="columna">Nombre del usuario</th>
                        <th class="columna">Correo del usuario</th>
                        <th class="columna">Nombre de dominio solicitado</th>
                        <th class="columna">Duración</th>
                        <th class="columna">Precio</th>
                        <th class="columna">Renovación</th>
                        <th class="columna">Acción</th>
                      </tr>
                      <?php

                        $su = new ServicioDominio();
                        $arr = $su->getInactivos($_SESSION['cod_user']);
                        foreach ($arr as $texto){
                          $dominio = json_decode($texto)
                          ?>
                            <tr class="fila">
                              <td class="columna"><?php echo $dominio->nom_cliente; ?></td>
                              <td class="columna"><?php echo $dominio->email; ?></td>
                              <td class="columna"><?php echo $dominio->nombre . "." . $dominio->nom_dominio; ?></td>
                              <td class="columna">$ <?php echo $dominio->duracion_meses; ?> meses</td>
                              <td class="columna">$ <?php echo $dominio->precio; ?></td>
                              <td class="columna">$ <?php echo $dominio->renovacion; ?></td>
                              <td class="columna" style="width: 10%">
                                  <input type="button" style="background-color: transparent;" onclick="accionar(<?php echo $dominio->cod_dominio_adquirido ?>,'A');" value="Aceptar"/>
                                  <input type="button" style="background-color: transparent;" onclick="accionar(<?php echo $dominio->cod_dominio_adquirido ?>,'N');" value="Negar"/></td>
                            </tr>
                          <?php
                        }
                    ?>
                    </table>
                    
                      <form id="formulario" action="editarNombreDominio.php" method="POST">

                          <input type="hidden" id="in_cod_nombre" name="cod_nombre" />
                      </form>
                </div> 
              
        </div>
        
    </section>


    <?php include("Comun/footer.html") ; ?>
  

  <!-- loader -->
  <div id="ftco-loader" class="show fullscreen"><svg class="circular" width="48px" height="48px"><circle class="path-bg" cx="24" cy="24" r="22" fill="none" stroke-width="4" stroke="#eeeeee"/><circle class="path" cx="24" cy="24" r="22" fill="none" stroke-width="4" stroke-miterlimit="10" stroke="#F96D00"/></svg></div>


  <?php include("Comun/script.html"); ?>
    
  </body>
</html>