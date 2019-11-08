<!DOCTYPE html>
<html lang="en">
  <head>
    <title>Dominios</title>
    <?php include ("../mapeo/ServicioNombreDominio.php");?>
    <?php include("Comun/head.html"); ?>
    
    <script type="text/javascript">
      function buscar(){

        $(document).ready(function(){
          $("#respuestaDominio").empty();
          var dom_buscar = $("#dominio_a_buscar").val();
          dom_buscar = dom_buscar.trim();
          dom_buscar = dom_buscar.split(".");
          if(dom_buscar.length > 0){
            var request = $.ajax({
              url: "../respuestas/respuestaDominio.php",
              method: "POST",
              data: { dominio : dom_buscar[0] }
            });
             
            request.done(function( msg ) {
              var nombres = JSON.parse(msg);
              $("#respuestaDominio").append("<table class='table'><thead class='thead-primary'><th>Dominios disponibles</th><th>Registro</th><th>Duración</th><th>Renovación</th><th> </th></thead><tbody id='cuerpo_respuesta'></tbody></table>");
              for(var i = 0;i<nombres.length;i++){
                  var n = nombres[i];
                  $('#cuerpo_respuesta').append("<tr><td>"+dom_buscar[0]+"."+n['nombre']+"</td> <td>$ "+n['precio']+"</td> <td>"+n['duracion_meses']+"</td> <td>"+n['renovacion']+"</td> <td><input type='button' class='search-domain btn btn-primary px-5' value='Comprar'></td></tr>");
              }

            });
             
            request.fail(function( jqXHR, textStatus ) {
              console.log( "Request failed: " + textStatus );
            });


          }

          
        });

      }
    </script>
  </head>
  <body>
    
  <?php include("Comun/verificarSesionComun.php"); ?>
    <!-- END nav -->
    
    <!-- <div class="js-fullheight"> -->
    <div class="hero-wrap">
      <div class="overlay"></div>
      <div class="circle-bg"></div>
      <div class="circle-bg-2"></div>
      <div class="container-fluid">
        <div class="row no-gutters d-flex slider-text align-items-center justify-content-center" data-scrollax-parent="true">
          <div class="col-md-6 ftco-animate text-center" data-scrollax=" properties: { translateY: '70%' }">
            <p class="breadcrumbs" data-scrollax="properties: { translateY: '30%', opacity: 1.6 }"><span class="mr-2"><a href="index.php">Inicio</a></span> <span>Dominios</span></p>
            <h1 class="mb-3 bread" data-scrollax="properties: { translateY: '30%', opacity: 1.6 }">Dominios</h1>
          </div>
        </div>
      </div>
    </div>

    <section class="ftco-section bg-light">
    	<div class="container">
    		<div class="row justify-content-center mb-5">
          <div class="col-md-7 text-center heading-section ftco-animate">
            <span class="subheading">Obtén dominio</span>
            <h2 class="mb-4">Busca tu dominio</h2>
            <p>Con correo electrónico GRATUITO, DNS, protección contra robo y otras funciones</p>
          </div>
        </div>
    		<div class="row justify-content-center">
    			<div class="col-md-10 ftco-animate">
            <div class="form-group d-md-flex">
              <input type="text" id="dominio_a_buscar" class="form-control px-4" placeholder="Ingrese un nombre de dominio...">
              <input type="button" class="search-domain btn btn-primary px-5" value="Buscar dominio" onclick="buscar()">
            </div>
    			</div>
    		</div>
    	</div>
    </section>

    <section>
      <div id="respuestaDominio" class="container">
        
      </div>
    </section>

    <section class="ftco-section">
    	<div class="container">
    		<div class="row justify-content-center mb-5">
          <div class="col-md-7 text-center heading-section ftco-animate">
            <span class="subheading">Precios</span>
            <h2 class="mb-4">Precios de dominios</h2>
          </div>
        </div>
    		<div class="row">
    			<div class="col-md-12 ftco-animate">
    				<div class="table-responsive">
	    				<table class="table">
						    <thead class="thead-primary">
						      <tr>
						        <th>TLD</th>
						        <th>Duración</th>
						        <th>Registro</th>
						        <th>Renovación</th>
						      </tr>
						    </thead>
						    <tbody>
						      <?php

                    $servicioNombreDominio = new ServicioNombreDominio();
                    $nombres = $servicioNombreDominio->getAll();
                    foreach ($nombres as $nombre) {
                      echo "<tr> <td>.$nombre->nombre</td> <td>$nombre->duracion_meses meses</td> <td>$ $nombre->precio</td> <td>$ $nombre->renovacion</td> </tr>";
                    }

                  ?>
						    </tbody>
						  </table>
					  </div>
    			</div>
    		</div>
    	</div>
    </section>

    <!-- <section class="ftco-section bg-light">
    	<div class="container">
    		<div class="row justify-content-center mb-5">
          <div class="col-md-7 text-center heading-section ftco-animate">
            <span class="subheading">Facts</span>
            <h2 class="mb-4">Your Question</h2>
          </div>
        </div>
    		<div class="row">
    			<div class="col-md-12">
    				<div id="accordion">
    					<div class="row">
    						<div class="col-md-6">
    							<div class="card">
						        <div class="card-header">
										  <a class="card-link" data-toggle="collapse"  href="#menuone" aria-expanded="true" aria-controls="menuone">What is your domain name? <span class="collapsed"><i class="icon-plus-circle"></i></span><span class="expanded"><i class="icon-minus-circle"></i></span></a>
						        </div>
						        <div id="menuone" class="collapse show">
						          <div class="card-body">
												<p>When she reached the first hills of the Italic Mountains, she had a last view back on the skyline of her hometown Bookmarksgrove, the headline of Alphabet Village and the subline of her own road, the Line Lane. Pityful a rethoric question ran over her cheek, then she continued her way.</p>
						          </div>
						        </div>
						      </div>

						      <div class="card">
						        <div class="card-header">
										  <a class="card-link" data-toggle="collapse"  href="#menutwo" aria-expanded="false" aria-controls="menutwo">How long is my domain name valid? <span class="collapsed"><i class="icon-plus-circle"></i></span><span class="expanded"><i class="icon-minus-circle"></i></span></a>
						        </div>
						        <div id="menutwo" class="collapse">
						          <div class="card-body">
												<p>When she reached the first hills of the Italic Mountains, she had a last view back on the skyline of her hometown Bookmarksgrove, the headline of Alphabet Village and the subline of her own road, the Line Lane. Pityful a rethoric question ran over her cheek, then she continued her way.</p>
						          </div>
						        </div>
						      </div>

						      <div class="card">
						        <div class="card-header">
										  <a class="card-link" data-toggle="collapse"  href="#menu3" aria-expanded="false" aria-controls="menu3">Can I sell my domain name? <span class="collapsed"><i class="icon-plus-circle"></i></span><span class="expanded"><i class="icon-minus-circle"></i></span></a>
						        </div>
						        <div id="menu3" class="collapse">
						          <div class="card-body">
												<p>When she reached the first hills of the Italic Mountains, she had a last view back on the skyline of her hometown Bookmarksgrove, the headline of Alphabet Village and the subline of her own road, the Line Lane. Pityful a rethoric question ran over her cheek, then she continued her way.</p>
						          </div>
						        </div>
						      </div>
    						</div>

    						<div class="col-md-6">
    							<div class="card">
						        <div class="card-header">
										  <a class="card-link" data-toggle="collapse"  href="#menu4" aria-expanded="false" aria-controls="menu4">Can I cancel a domain? <span class="collapsed"><i class="icon-plus-circle"></i></span><span class="expanded"><i class="icon-minus-circle"></i></span></a>
						        </div>
						        <div id="menu4" class="collapse">
						          <div class="card-body">
												<p>When she reached the first hills of the Italic Mountains, she had a last view back on the skyline of her hometown Bookmarksgrove, the headline of Alphabet Village and the subline of her own road, the Line Lane. Pityful a rethoric question ran over her cheek, then she continued her way.</p>
						          </div>
						        </div>
						      </div>

						      <div class="card">
						        <div class="card-header">
										  <a class="card-link" data-toggle="collapse"  href="#menu5" aria-expanded="false" aria-controls="menu5">How do I transfer a domain name? <span class="collapsed"><i class="icon-plus-circle"></i></span><span class="expanded"><i class="icon-minus-circle"></i></span></a>
						        </div>
						        <div id="menu5" class="collapse">
						          <div class="card-body">
												<p>When she reached the first hills of the Italic Mountains, she had a last view back on the skyline of her hometown Bookmarksgrove, the headline of Alphabet Village and the subline of her own road, the Line Lane. Pityful a rethoric question ran over her cheek, then she continued her way.</p>
						          </div>
						        </div>
						      </div>

						      <div class="card">
						        <div class="card-header">
										  <a class="card-link" data-toggle="collapse"  href="#menu6" aria-expanded="false" aria-controls="menu6">How do I setup URL forwarding? <span class="collapsed"><i class="icon-plus-circle"></i></span><span class="expanded"><i class="icon-minus-circle"></i></span></a>
						        </div>
						        <div id="menu6" class="collapse">
						          <div class="card-body">
												<p>When she reached the first hills of the Italic Mountains, she had a last view back on the skyline of her hometown Bookmarksgrove, the headline of Alphabet Village and the subline of her own road, the Line Lane. Pityful a rethoric question ran over her cheek, then she continued her way.</p>
						          </div>
						        </div>
						      </div>
    						</div>
    					</div>
				    </div>
    			</div>
    		</div>
    	</div>
    </section>-->


   <?php include("Comun/footer.html"); ?>
   <?php include("Comun/verificarSesionComun2.php"); ?>
    
  

  <!-- loader -->
  <div id="ftco-loader" class="show fullscreen"><svg class="circular" width="48px" height="48px"><circle class="path-bg" cx="24" cy="24" r="22" fill="none" stroke-width="4" stroke="#eeeeee"/><circle class="path" cx="24" cy="24" r="22" fill="none" stroke-width="4" stroke-miterlimit="10" stroke="#F96D00"/></svg></div>


  <?php include("Comun/script.html"); ?>
    
  </body>
</html>