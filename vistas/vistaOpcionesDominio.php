<?php
  $nombre = $_POST['nombre'];
  $nombre_dominio = $_POST['nombre_dominio'];

?>
<!DOCTYPE html>
<?php session_start();
  include ("../mapeo/ServicioUsuario.php");
  include ("../mapeo/ServicioNombreDominio.php");?>
<html lang="en">
  <head>
    <title>Nombre de dominios</title>
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
  function irEditar(codigo){
    $(document).ready(function(){
      $('#in_cod_nombre').attr('value',codigo);
      document.getElementById('formulario').submit();
    });
  }
  function solicitar(objeto){
        $(document).ready(function(){
          $('#msg_inicio').empty();
          var request = $.ajax({
              url: "../respuestas/respuestaSolicitarDominio.php",
              method: "POST",
              data: { objeto : objeto}
            });
             
            request.done(function( msg ) {
              
            });
             
            request.fail(function( jqXHR, textStatus ) {
              console.log( "Request failed: " + textStatus );
            });
        });
      }
</script>
 </head>
  <body>
  <?php include("Comun/verificarSesionNormal.php"); ?>
    <!-- END nav -->
    
    <!-- <div class="js-fullheight"> -->
    <div id="base" style="background-image: url('../images/fondo.png'); background-size: 100% 100%;">
      
    </div>

    <h1 style="margin-top: 50px;width: 100%" align="center">Nombre de dominios</h1> 

    <section class="ftco-section bg-light" style="padding: 60px 60px 60px 60px;background-color: white" > 
<!------ Include the above in your HEAD tag ---------->
        <div style=" align-content: center; width: 100%;height: 100%;background-color: white">
                <div style="overflow-x:auto;max-height: 700px;height: 100%;background-color: white">
                    <table class="mensajes" style="vertical-align: top;height: 100%;border: 2px solid black">
                      <tr class="fila">
                        <th class="columna">Nombre del dominio</th>
                        <th class="columna">Duración</th>
                        <th class="columna">Precio</th>
                        <th class="columna">Renovación</th>
                        <th class="columna">Nombre del distribuidor</th>
                        <th class="columna">Email del distribuidor</th>
                        <th class="columna">Acción</th>
                      </tr>
                      <?php

                        $su = new ServicioNombreDominio();
                        $arr = $su->getPrecios($nombre_dominio);
                        foreach ($arr as $texto){
                          $distribuidor = json_decode($texto)
                          ?>
                            <tr class="fila">
                              <td class="columna"><?php echo $nombre . "." . $distribuidor->nombre_dominio; ?></td>
                              <td class="columna"><?php echo $distribuidor->duracion_meses; ?> meses</td>
                              <td class="columna">$ <?php echo $distribuidor->precio; ?></td>
                              <td class="columna">$ <?php echo $distribuidor->renovacion; ?></td>
                              <td class="columna"><?php echo $distribuidor->nombre_distribuidor; ?></td>
                              <td class="columna"><?php echo $distribuidor->email; ?></td>
                              <td class="columna" style="width: 10%">
                                  <input type="button" style="width:80%;background-color: transparent;" onclick="solicitar('<?php echo $texto ?>')" value="Solicitar"/></td>
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