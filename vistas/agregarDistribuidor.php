<!DOCTYPE html>
<?php session_start();
  include ("../mapeo/ServicioUsuario.php");?>
<html lang="en">
  <head>
    <title>Agregar distribuidor</title>
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


    function generarClave(){
      var letras = ['a','b','c','d','e','f','g','h','i','j','k','l','m','n','o','p','q','r','s','t','u','v','w','x','y','z'];
      var aux = "";
      for(var i = 0;i<10;i++){
        var n = Math.floor(Math.random() * letras.length);
        aux = aux + letras[n];
      }
      return aux;

    }
    

    function registrar() {
      $(document).ready(function(){
        var nom = $('#fname').val().trim();
        var user = $('#usuario').val();
        var email = $('#email').val();
        var tipo = $('#tipo').val();
        var clave = generarClave();
        var request = $.ajax({
            url: "../respuestas/respuestaAgregarDistribuidor.php",
            method: "POST",
            data: { nombre : nom , clave : clave , nom_user : user , email : email, tipo : tipo}
          });
           
          request.done(function( msg ) {
            if(msg == 'false'){
              alert('Usuario ya existe');
            }else{
              alert('Agregado correctamente');
              window.location.href = "distribuidores.php";
            }
            
          });
           
          request.fail(function( jqXHR, textStatus ) {
            console.log( "Request failed: " + textStatus );
          });
        
      });
    }

</script>
  </head>
  <body>
  <?php include("Comun/verificarSesionAdmin.php"); ?>
    <!-- END nav -->

    <!-- <div class="js-fullheight"> -->
    
    <div id="base" style="background-image: url('../images/fondo.png'); background-size: 100% 100%;">

    <section class="ftco-section bg-light" style="padding: 0 0 0 0">
      <div class="container text-center" style="max-width: 800px">
        <h1 class="mb-3 bread">Agregar distribuidor</h1>
        <form action="javascript:registrar()">
          <label for="fname" class="etiqueta">Nombre completo</label>
                  <input type="text" id="fname" name="firstname" required placeholder="Nombre">
              

              
                <label for="email" class="etiqueta">E-mail</label>
                <input type="text" required id="email" name="nemail" placeholder="E-mail..">

                <label for="usuario" class="etiqueta">Nombre de usuario</label>
                <input type="text" required id="usuario" name="nusuario" placeholder="Nombre de usuario..">

                <label for="tipo" class="etiqueta">Tipo de distribuidor</label>
                <select  id="tipo" name="ntipo" placeholder="Tipo">
                  <?php

                    include ('../mapeo/ServicioTipoDistribuidor.php');
                    $st = new ServicioTipoDistribuidor();
                    $arr = $st->getAll();
                    foreach($arr as $tipo){
                      ?>
                        <option value="<?php echo $tipo->codigo ?>"><?php echo $tipo->nombre ?></option>

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