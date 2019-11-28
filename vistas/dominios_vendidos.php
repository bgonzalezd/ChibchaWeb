<!DOCTYPE html>
<?php session_start();
  include ("../mapeo/ServicioUsuario.php");
  include ("../mapeo/ServicioDominio.php");?>
<html lang="en">
  <head>
    <title>Dominios vendidos</title>
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
  <?php include("Comun/verificarSesionDistri.php"); ?>
    <!-- END nav -->
    
    <!-- <div class="js-fullheight"> -->
    <div id="base" style="background-image: url('../images/fondo.png'); background-size: 100% 100%;">
      
    </div>

    <h1 style="margin-top: 50px;width: 100%" align="center">Dominios vendidos</h1>
    <table>
        <tr>
          <td>
          </td>
        </tr>
      </table>   

    <section class="ftco-section bg-light" style="padding: 60px 60px 60px 60px;background-color: white" > 
        <!-- Area Chart Example-->
            <div class="card mb-3">
              <div class="card-header">
                <i class="fas fa-chart-area"> </i>
                Dominios vendidos
              </div>
                <div class="card-body">
                  <table border="1" id="lista" data-titulo="Dominios vendidos" class="table table-striped table-bordered" width="100%" >
                    <thead >
                      <td align="center">Nombre del usuario</td>
                      <td align="center">Correo del usuario</td>
                      <td align="center">Nombre de dominio solicitado</td>
                      <td align="center">Duracion</td>
                      <td align="center">Precio</td>
                      <td align="center">Renovación</td>
                    </thead>
                    <tbody id="cuerpo">
                        <?php

                        $su = new ServicioDominio();
                        $arr = $su->getActivos($_SESSION['cod_user']);
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
                            </tr>
                          <?php
                        }
                    ?>
                    </tbody>
                    <tfoot>
                      <td align="center">Nombre del usuario</td>
                      <td align="center">Correo del usuario</td>
                      <td align="center">Nombre de dominio solicitado</td>
                      <td align="center">Duracion</td>
                      <td align="center">Precio</td>
                      <td align="center">Renovación</td>
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