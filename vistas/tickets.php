<!DOCTYPE html>
<?php session_start();
  include ("../mapeo/ServicioUsuario.php");
  include ("../mapeo/ServicioMensaje.php");?>
<html lang="en">
  <head>
    <title>Tickets</title>
    <?php include("Comun/head.html"); ?>
    <style>
table {
  border-collapse: collapse;
  border-spacing: 0;
  width: 100%;
  border: 1px solid #ddd;
}
.vl {
  background-color: black;
  background-size: 90% 90%
}

th, td {
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
}

tr:nth-child(even){background-color: #f2f2f2}
</style>
 </head>
  <body>
  <?php include("Comun/verificarSesionAdmin.php"); ?>
    <!-- END nav -->
    
    <!-- <div class="js-fullheight"> -->
    <div id="base" style="background-image: url('../images/fondo.png'); background-size: 100% 100%;">
      
    </div>

    <section class="ftco-section bg-light" style="padding: 0 0 0 0" > 
<!------ Include the above in your HEAD tag ---------->
        <div style="margin-top: 50px; align-content: center; width: 100%">
            <h1 style="width: 100%" align="center">Mensajes</h1>   
            <div style="overflow-x:auto;width: 30%;height: 700px;">
              <table>
                <?php

                    $sm = new ServicioMensaje();
                    $su = new ServicioUsuario();
                    $arr = $sm->getAll();
                    foreach ($arr as $mensaje){
                      $cli = $su->getInfoUsuario($mensaje->cod_usuario);
                      ?>
                        <tr class="fila">
                          <td><?php echo $cli->nombre; ?></td>
                          <td class="vl"><div style="width: 2px"></div></td>
                          <td><?php echo $mensaje->asunto; ?></td>
                        </tr>
                      <?php
                    }
                ?>
              </table>
            </div>   
        </div>
        
    </section>


    <?php include("Comun/footer.html"); ?>
  

  <!-- loader -->
  <div id="ftco-loader" class="show fullscreen"><svg class="circular" width="48px" height="48px"><circle class="path-bg" cx="24" cy="24" r="22" fill="none" stroke-width="4" stroke="#eeeeee"/><circle class="path" cx="24" cy="24" r="22" fill="none" stroke-width="4" stroke-miterlimit="10" stroke="#F96D00"/></svg></div>


  <?php include("Comun/script.html"); ?>
    
  </body>
</html>