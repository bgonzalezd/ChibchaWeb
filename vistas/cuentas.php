<!DOCTYPE html>
<?php session_start();
  include ("../mapeo/ServicioUsuario.php");
  include ("../mapeo/ServicioDominio.php");?>
<html lang="en">
  <head>
    <title>Cuentas</title>
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
    <h1 style="margin-top: 50px;width: 100%" align="center">Cuentas</h1>
  <section class="ftco-section bg-light" style="padding: 60px 60px 60px 60px;background-color: white" >

    <div class="card mb-3">
              <div class="card-header">
                <i class="fas fa-chart-area"> </i>
                Cuentas
              </div>
                <div class="card-body">
                  <table border="1" id="lista" class="table table-striped table-bordered" width="100%" >
                    <thead >
                      <td align="center">Nombre del distribuidor</td>
                      <td align="center">Email del distribuidor</td>
                      <td align="center">Ventas totales</td>
                      <td align="center">Valor por cobrar</td>
                    </thead>
                    <tbody id="cuerpo">
                         <?php

                        $su = new ServicioDominio();
                        $arr = $su->getCuentas();
                        foreach ($arr as $texto){
                          $cuenta = json_decode($texto)
                          ?>
                            <tr class="fila">
                              <td class="columna"><?php echo $cuenta->nombre_distribuidor; ?></td>
                              <td class="columna"><?php echo $cuenta->email; ?></td>
                              <td class="columna"><?php echo $cuenta->ventas_totales; ?></td>
                              <td class="columna"><?php echo $cuenta->valor_a_pagar; ?></td>
                            </tr>
                          <?php
                        }
                    ?>
                    </tbody>
                    <tfoot>
                      <td align="center">Nombre del distribuidor</td>
                      <td align="center">Email del distribuidor</td>
                      <td align="center">Ventas totales</td>
                      <td align="center">Valor por cobrar</td>
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