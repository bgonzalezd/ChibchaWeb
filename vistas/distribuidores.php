<!DOCTYPE html>
<?php session_start();
  include ("../mapeo/ServicioUsuario.php");?>
<html lang="en">
  <head>
    <title>Distribuidores</title>
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

 </head>
  <body>
  <?php include("Comun/verificarSesionAdmin.php"); ?>
    <!-- END nav -->
    
    <!-- <div class="js-fullheight"> -->
    <div id="base" style="background-image: url('../images/fondo.png'); background-size: 100% 100%;">
      
    </div>

    <h1 style="margin-top: 50px;width: 100%" align="center">Distribuidores</h1>
    <table>
        <tr>
          <td>
            <a href="agregarDistribuidor.php">
              <input type="button" value="Agregar distribuidor" class="btn btn-primary py-3 px-5" style="background-color: blue;color: white">
            </a>
          </td>
        </tr>
      </table>   

    <section class="ftco-section bg-light" style="padding: 0 0 0 0;border: 2px solid black" > 
<!------ Include the above in your HEAD tag ---------->
        <div style=" align-content: center; width: 100%;height: 100%">
                <div style="overflow-x:auto;max-height: 700px;height: 100%">
                  <table class="mensajes" style="vertical-align: top;height: 100%">
                    <?php

                        $su = new ServicioUsuario();
                        $arr = $su->getDistribuidores();
                        foreach ($arr as $texto){
                          $distribuidor = json_decode($texto)
                          ?>
                            <tr class="fila">
                              <td class="columna" style="border-left: 1px solid black"><?php echo $distribuidor->nombre; ?></td>
                              <td class="columna" style="border-left: 1px solid black"><?php echo $distribuidor->email; ?></td>
                              <td class="columna" style="border-left: 1px solid black"><?php echo $distribuidor->etiqueta; ?></td>
                            </tr>
                          <?php
                        }
                    ?>
                  </table>
                </div> 
              
        </div>
        
    </section>


    <?php include("Comun/footer.html") ; ?>
  

  <!-- loader -->
  <div id="ftco-loader" class="show fullscreen"><svg class="circular" width="48px" height="48px"><circle class="path-bg" cx="24" cy="24" r="22" fill="none" stroke-width="4" stroke="#eeeeee"/><circle class="path" cx="24" cy="24" r="22" fill="none" stroke-width="4" stroke-miterlimit="10" stroke="#F96D00"/></svg></div>


  <?php include("Comun/script.html"); ?>
    
  </body>
</html>