<!DOCTYPE html>
<?php session_start();
  include ("../mapeo/ServicioUsuario.php");
  include ("../mapeo/ServicioAuditoria.php");?>
<html lang="en">
  <head>
    <title>Auditoria</title>
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

    <h1 style="margin-top: 50px;width: 100%" align="center">Auditoria</h1>  

    <section class="ftco-section bg-light" style="padding: 60px 60px 60px 60px;background-color: white" > 
<!------ Include the above in your HEAD tag ---------->
        <div style=" align-content: center; width: 100%;height: 100%">
                <div style="overflow-x:auto;max-height: 700px;height: 100%">
                  <table class="mensajes" style="vertical-align: top;height: 100%;border: 2px solid black">
                    <tr class="fila">
                        <th class="columna">Tabla modificada</th>
                        <th class="columna">Acción realizada</th>
                        <th class="columna">Usuario</th>
                        <th class="columna">Email del usuario</th>
                        <th class="columna">Fecha</th>
                      </tr>
                    <?php

                        $su = new ServicioAuditoria();
                        $arr = $su->getAll();
                        foreach ($arr as $texto){
                          $auditoria = json_decode($texto)
                          ?>
                            <tr class="fila">
                              <td class="columna"><?php echo $auditoria->tabla; ?></td>
                              <td class="columna"><?php echo $auditoria->accion; ?></td>
                              <td class="columna"><?php echo $auditoria->nombre; ?></td>
                              <td class="columna"><?php echo $auditoria->email; ?></td>
                              <td class="columna"><?php echo $auditoria->fecha; ?></td>
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