<?php
  $codi = $_POST['cod_distribuidor'];

?>
<!DOCTYPE html>
<?php session_start();
  include ("../mapeo/ServicioUsuario.php");?>
<html lang="en">
  <head>
    <title>Editar distribuidor</title>
    <?php include("Comun/head.html"); ?>
    
    <style>
input[type=text], select {
  width: 100%;
  padding: 12px 20px;
  margin: 8px 0;
  display: inline-block;
  border: 1px solid #ccc;
  border-radius: 4px;
  box-sizing: border-box;
}

.etiqueta{
  color: black;
}

input[type=submit] {
  width: 100%;
  background-color: #4CAF50;
  color: white;
  padding: 14px 20px;
  margin: 8px 0;
  border: none;
  border-radius: 4px;
  cursor: pointer;
}

input[type=submit]:hover {
  background-color: #45a049;
}

.divclass {
  border-radius: 5px;
  background-color: transparent;
  padding: 20px;
}
</style>
<script type="text/javascript">

    

    function registrar() {
      $(document).ready(function(){
        var codigo = <?php echo $codi ?>;
        var nom = $('#fname').val().trim();
        var tipo_distribuidor = $('#tipo').val();
        var email = $('#email').val();
        var request = $.ajax({
            url: "../respuestas/respuestaEditarDistribuidor.php",
            method: "POST",
            data: { codigo : codigo , nombre : nom , tipo_distribuidor : tipo_distribuidor , email : email}
          });
           
          request.done(function( msg ) {
            
              alert(msg);
              window.location.href = "distribuidores.php";
            
          });
           
          request.fail(function( jqXHR, textStatus ) {
            console.log( "Request failed: " + textStatus );
          });
        
      });
    }

</script>
  </head>
  <body>
  <?php include("Comun/verificarSesionAdmin.php");

                    include ('../mapeo/ServicioTipoDistribuidor.php');
    $sN = new ServicioUsuario();
    $usuario = $sN->getInfoUsuario($codi);
    $distri = json_decode($sN->getInfoDistribuidor($codi));
  ?>
    <!-- END nav -->

    <!-- <div class="js-fullheight"> -->
    
    <div id="base" style="background-image: url('../images/fondo.png'); background-size: 100% 100%;">

    <section class="ftco-section bg-light" style="padding: 0 0 0 0">
      <div class="container text-center" style="max-width: 800px">
        <h1 class="mb-3 bread">Editar usuario</h1>
        <form action="javascript:registrar()">
          <label for="fname" class="etiqueta">Nombre completo</label>
                  <input type="text" id="fname" name="firstname" required placeholder="Nombre" value="<?php echo $usuario->nombre ?>">
              

              
                <label for="email" class="etiqueta">E-mail</label>
                <input type="text" required id="email" name="nemail" placeholder="E-mail.." value="<?php echo $usuario->email ?>">

                <label for="tipo" class="etiqueta">Tipo de distribuidor</label>
                <select  id="tipo" name="ntipo" placeholder="Tipo">
                  <?php

                    $st = new ServicioTipoDistribuidor();
                    $arr = $st->getAll();
                    foreach($arr as $tipo){
                      ?>
                        <option value="<?php echo $tipo->codigo ?>" <?php if ($tipo->codigo == $distri->cod_tipo){ echo "selected";} ?>><?php echo $tipo->nombre ?></option>

                      <?php
                    }

                  ?>
                </select>
              
                <input type="submit" value="Registrar" style="background-color: #4DCAC7; border-width: 2px; border-style: solid; border-color: black;">
        
          
        </form>
      </div>
    </section>

    <section>
      <div id="respuestaDominio" class="container">
        
      </div>
    </section>

    


   <?php include("Comun/footer.html"); ?>
   <?php include("Comun/popupLogin.html"); ?>
    
  

  <!-- loader -->
  <div id="ftco-loader" class="show fullscreen"><svg class="circular" width="48px" height="48px"><circle class="path-bg" cx="24" cy="24" r="22" fill="none" stroke-width="4" stroke="#eeeeee"/><circle class="path" cx="24" cy="24" r="22" fill="none" stroke-width="4" stroke-miterlimit="10" stroke="#F96D00"/></svg></div>


  <?php include("Comun/script.html"); ?>
    
  </body>
</html>