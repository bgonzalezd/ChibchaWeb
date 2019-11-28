<!DOCTYPE html>
<?php session_start();
  include ("../mapeo/ServicioUsuario.php");
  include ("../mapeo/ServicioNombreDominio.php");?>
<html lang="en">
  <head>
    <title>Editar nombre de dominio</title>
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
input[type=password], select {
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
        var nom = $('#fname').val().trim();
        var user = $('#usuario').val();
        var email = $('#email').val();
        var c1 = $('#clave').val().trim();
        var c2 = $('#clave2').val().trim();
        if(c1.localeCompare(c2)==0){
            var request = $.ajax({
            url: "../respuestas/respuestaEditarPerfil.php",
            method: "POST",
              data: { nombre : nom , clave : c1 , nom_user : user , email : email}
          });
           
          request.done(function( msg ) {
            
              alert(msg);
              window.location.href = "miperfil.php";
            
          });
           
          request.fail(function( jqXHR, textStatus ) {
            console.log( "Request failed: " + textStatus );
          });
        }else{
          alert("Las constraseñas no son iguales");

        }
      });
    }

</script>
  </head>
  <body>
  <?php include("Comun/verificarSesionNormal.php");
    $sN = new ServicioUsuario();
    $usuario = $sN->getInfoUsuario($_SESSION['cod_user']);
  ?>
    <!-- END nav -->

    <!-- <div class="js-fullheight"> -->
    
    <div id="base" style="background-image: url('../images/fondo.png'); background-size: 100% 100%;">

    <section class="ftco-section bg-light" style="padding: 0 0 0 0">
      <div class="container text-center" style="max-width: 800px">
        <h1 class="mb-3 bread">Editar nombre de dominio</h1>
        <form action="javascript:registrar()">
          <label for="fname" class="etiqueta">Nombre completo</label>
                  <input type="text" id="fname" name="firstname" required placeholder="Tu nombre completo" value="<?php echo $usuario->nombre ?>">
              

              
                <label for="email" class="etiqueta">E-mail</label>
                <input type="text" required id="email" name="nemail" placeholder="Tu e-mail.." value="<?php echo $usuario->email ?>">

                <label for="usuario" class="etiqueta">Nombre de usuario</label>
                <input type="text" required id="usuario" name="nusuario" placeholder="Tu nombre de usuario.." value="<?php echo $usuario->nom_usuario ?>">

              <label for="clave" class="etiqueta">Nueva contraseña</label>
                  <input type="password" required id="clave" name="claveu" placeholder="Tu contraseña.." value="<?php echo $usuario->clave ?>">
             
                <label for="clave2" class="etiqueta">Repetir contraseña</label>
                <input type="password" required id="clave2" name="claveu2" placeholder="Tu contraseña..">

              
                <input type="submit" value="Editar" style="background-color: #4DCAC7; border-width: 2px; border-style: solid; border-color: black;">
              
        
          
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