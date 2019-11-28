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
</script>
 </head>
  <body>
  <?php include("Comun/verificarSesionDistri.php"); ?>
    <!-- END nav -->
    
    <!-- <div class="js-fullheight"> -->
    <div id="base" style="background-image: url('../images/fondo.png'); background-size: 100% 100%;">
      
    </div>

    <h1 style="margin-top: 50px;width: 100%" align="center">Nombre de dominios</h1>


    <div class="container-fluid">

    <div class="row">
          <div class="col-xl-3 col-sm-3 mb-5">
            <div class="card text-white bg-primary o-hidden h-100">
              <div class="card-body">
                <div class="card-body-icon">
                  <i class="fas fa-fw fa-comments"></i>
                </div>
                <div class="mr-5">Agregar Nombre!</div>
              </div>
              <a class="card-footer text-white clearfix small z-1" href="agregarNombreDominio.php">
                <span class="float-left" >AGREGAR!</span>
                <span class="float-right">
                  <i class="fas fa-angle-right"></i>
                </span>
              </a>
            </div>
          </div>
        </div>

        <!-- Area Chart Example-->
            <div class="card mb-3">
              <div class="card-header">
                <i class="fas fa-chart-area" > </i>
                Nombres de dominios
              </div>
                <div class="card-body">
                  <table border="1" id="lista" data-titulo="Nombres de dominios" class="table table-striped table-bordered" width="100%" >
                    <thead >
                      <td align="center">Nombre del dominio</td>
                      <td align="center">Duración</td>
                      <td align="center">Precio</td>
                      <td align="center">Renovación</td>
                      <th class="columna">Acción</th>
                    </thead>
                    <tbody id="cuerpo">
                         <?php

                          $su = new ServicioNombreDominio();
                          $arr = $su->getNamesInfo($_SESSION['cod_user']);
                          foreach ($arr as $nom){
                            ?>
                              <tr class="fila">
                                <td class="columna">$ <?php echo $nom->nombre; ?></td>
                                <td class="columna">$ <?php echo $nom->duracion_meses;?></td>
                                <td class="columna">$ <?php echo $nom->precio; ?></td>
                                <td class="columna">$ <?php echo $nom->renovacion; ?></td>
                                <td class="columna" style="width: 10%">
                                  <button class="btn btn-outline-warning" onclick="irEditar(<?php echo $nom->codigo ?>)">Modificar</button></td>
                              </tr>
                            <?php
                          }
                      ?>
                    </tbody>
                    <tfoot>
                      <td align="center">Nombre del dominio</td>
                      <td align="center">Duración</td>
                      <td align="center">Precio</td>
                      <td align="center">Renovación</td>
                      <th class="columna">Acción</th>
                    </tfoot>
                  </table>
                </div>
              </div>
              <form id="formulario" action="editarNombreDominio.php" method="POST">
                <input type="hidden" name="cod_nombre" id="in_cod_nombre">
              </form>

      </div>
    </div>

    <?php include("Comun/footer.html") ; ?>
  

  <!-- loader -->
  <div id="ftco-loader" class="show fullscreen"><svg class="circular" width="48px" height="48px"><circle class="path-bg" cx="24" cy="24" r="22" fill="none" stroke-width="4" stroke="#eeeeee"/><circle class="path" cx="24" cy="24" r="22" fill="none" stroke-width="4" stroke-miterlimit="10" stroke="#F96D00"/></svg></div>


  <?php include("Comun/script.html"); ?>
    
  </body>
</html>