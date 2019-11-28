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
<script type="text/javascript">
  function irEditar(codigo){
    $(document).ready(function(){
      $('#in_cod_distribuidor').attr('value',codigo);
      document.getElementById('formulario').submit();
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
    <h1 style="margin-top: 50px;width: 100%" align="center">Distribuidores</h1>
    <div id="content-wrapper">

    <div class="container-fluid">

    <div class="row">
          <div class="col-xl-3 col-sm-3 mb-5">
            <div class="card text-white bg-primary o-hidden h-100">
              <div class="card-body">
                <div class="card-body-icon">
                  <i class="fas fa-fw fa-comments"></i>
                </div>
                <div class="mr-5">Distribuidor!</div>
              </div>
              <a class="card-footer text-white clearfix small z-1" href="agregarDistribuidor.php">
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
                Distribuidores
              </div>
                <div class="card-body">
                  <table border="1" id="lista" data-titulo="Distribuidores" class="table table-striped table-bordered" width="100%" >
                    <thead >
                      <td align="center">Nombre del distribuidor</td>
                      <td align="center">Email del distribuidor</td>
                      <td align="center">Categoría del distribuidor</td>
                      <td align="center">Accion</td>
                    </thead>
                    <tbody id="cuerpo">
                         <?php

                        $su = new ServicioUsuario();
                        $arr = $su->getDistribuidores();
                        foreach ($arr as $texto){
                          $distribuidor = json_decode($texto)
                          ?>
                            <tr class="fila">
                              <td class="columna"><?php echo $distribuidor->nombre; ?></td>
                              <td class="columna"><?php echo $distribuidor->email; ?></td>
                              <td class="columna"><?php echo $distribuidor->etiqueta; ?></td>
                                <td class="columna" style="width: 10%">
                                  <button  class="btn btn-outline-warning" onclick="irEditar(<?php echo $distribuidor->codigo ?>)">Modificar</button></td>
                            </tr>
                          <?php
                        }
                    ?>
                    </tbody>
                    <tfoot>
                      <td align="center">Nombre del distribuidor</td>
                      <td align="center">Email del distribuidor</td>
                      <td align="center">Categoría del distribuidor</td>
                      <td align="center">Accion</td>
                    </tfoot>
                  </table>
                </div>
              </div>
              <form id="formulario" action="editarDistribuidor.php" method="POST">
                <input type="hidden" name="cod_distribuidor" id="in_cod_distribuidor">
              </form>

      </div>
    </div>
      

    <section class="ftco-section bg-light" style="padding: 60px 60px 60px 60px;background-color: white" > 
<!------ Include the above in your HEAD tag ---------->

        
        
    </section>


    <?php include("Comun/footer.html") ; ?>
  

  <!-- loader -->
  <div id="ftco-loader" class="show fullscreen"><svg class="circular" width="48px" height="48px"><circle class="path-bg" cx="24" cy="24" r="22" fill="none" stroke-width="4" stroke="#eeeeee"/><circle class="path" cx="24" cy="24" r="22" fill="none" stroke-width="4" stroke-miterlimit="10" stroke="#F96D00"/></svg></div>


  <?php include("Comun/script.html"); ?>
    
  </body>
</html>