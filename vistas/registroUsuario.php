<!DOCTYPE html>
<html lang="en">
  <head>
    <title>Registro</title>
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
        var nom = $('#fname').val().trim();
        var edad = $('#edad').val();
        var user = $('#usuario').val();
        var c1 = $('#clave').val().trim();
        var c2 = $('#clave2').val().trim();
        if(c1.localeCompare(c2)==0){
          var request = $.ajax({
              url: "../respuestas/respuestaRegistro.php",
              method: "POST",
              data: { nombre : nom , edad : edad , clave : c1 , nom_user : user }
            });
             
            request.done(function( msg ) {
              if(msg == 'false'){
                alert('Usuario ya existe');
              }else{
                alert('Agregado correctamente');
              }
              
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
  
  <?php include("Comun/menuSinSesion.html"); ?>
    <!-- END nav -->

    <!-- <div class="js-fullheight"> -->
    
    <div id="base" style="background-image: url('../images/fondo.png'); background-size: 100% 100%;">

    <section class="ftco-section bg-light" style="padding: 0 0 0 0">
      <div class="container text-center" style="max-width: 800px">
        <h1 class="mb-3 bread">Registrar</h1>
        <form action="javascript:registrar()">
          <label for="fname" class="etiqueta">Nombre completo</label>
                  <input type="text" id="fname" name="firstname" required placeholder="Tu nombre completo">
              

                <label for="edad" class="etiqueta">Edad</label>
                <input type="text" required oninput="this.value = this.value.replace(/[^0-9]/, '')" maxlength="2" id="edad" name="edad_n" placeholder="Tu edad..">
              
                <label for="email" class="etiqueta">E-mail</label>
                <input type="text" required id="email" name="nemail" placeholder="Tu e-mail..">

                <label for="usuario" class="etiqueta">Nombre de usuario</label>
                <input type="text" required id="usuario" name="nusuario" placeholder="Tu nombre de usuario..">
              <label for="clave" class="etiqueta">Contraseña</label>
                  <input type="password" required id="clave" name="claveu" placeholder="Tu contraseña..">
             
                <label for="clave2" class="etiqueta">Repetir contraseña</label>
                <input type="password" required id="clave2" name="claveu2" placeholder="Tu contraseña..">
              
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