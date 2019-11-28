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

        <!-- Area Chart Example-->
            <div class="card mb-3">
              <div class="card-header">
                <i class="fas fa-chart-area"> </i>
                Auditoria
              </div>
                <div class="card-body">
                  <table border="1" id="lista" data-titulo="Auditoria" class="table table-striped table-bordered" width="100%" >
                    <thead >
                      <td align="center">Tabla Modificada</td>
                      <td align="center">Acción realizada</td>
                      <td align="center">Usuario</td>
                      <td align="center">Email del usuario</td>
                      <td align="center">Fecha</td>
                    </thead>
                    <tbody id="cuerpo">
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
                    </tbody>
                    <tfoot>
                      <td align="center">Tabla Modificada</td>
                      <td align="center">Acción realizada</td>
                      <td align="center">Usuario</td>
                      <td align="center">Email del usuario</td>
                      <td align="center">Fecha</td>
                    </tfoot>
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