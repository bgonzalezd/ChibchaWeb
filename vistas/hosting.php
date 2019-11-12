<!DOCTYPE html>
<?php session_start();?>
<html lang="en">
  <head>
    <title>Hostings</title>
    <?php include("Comun/head.html"); ?>
  </head>
  <body>
    
  <?php include("Comun/verificarSesionComun.php"); ?>
    <!-- END nav -->
    
    <!-- <div class="js-fullheight"> -->
    <div id="base" style="background-image: url('../images/fondo.png'); background-size: 100% 100%;">
      <div class="container-fluid">
        <div class="row no-gutters d-flex slider-text align-items-center justify-content-center" data-scrollax-parent="true">
          <div class="col-md-6 ftco-animate text-center" data-scrollax=" properties: { translateY: '70%' }">
            <p class="breadcrumbs" data-scrollax="properties: { translateY: '30%', opacity: 1.6 }"><span class="mr-2"><a href="index.php">Inicio</a></span> <span>Hosting</span></p>
            <h1 class="mb-3 bread" data-scrollax="properties: { translateY: '30%', opacity: 1.6 }">VPS Hosting</h1>
          </div>
        </div>
      </div>
    </div>

    <section class="ftco-section bg-light">
    	<div class="container">
    		<div class="row justify-content-center mb-5 pb-5">
          <div class="col-md-7 text-center heading-section ftco-animate">
            <span class="subheading">Precios</span>
            <h2 class="mb-4">Nuestros mejores precios</h2>
          </div>
        </div>
    		<div class="row">
	        <div class="col-md-4">
	          <div class="block-7">
	            <div class="text-center">
	            <h2 class="heading">Plata</h2>
	            <span class="price"><sup>$</sup> <span class="number">25.000 / mes</span></span>
	            <a href="#" class="btn btn-primary d-block px-3 py-3 mb-4">Comprar</a>
	            
	            <h3 class="heading-2 mb-3">Disfruta de las siguientes características</h3>
	            
	            <ul class="pricing-text">
	              <li><strong>250 GB</strong> Banda ancha</li>
	              <li><strong>200 GB</strong> Capacidad de almacenamiento</li>
	              <li><strong>1</strong> Base de datos MySQL</li>
	            </ul>
	            </div>
	          </div>
	        </div>
	        <div class="col-md-4">
	          <div class="block-7">
	            <div class="text-center">
	            <h2 class="heading">Oro</h2>
	            <span class="price"><sup>$</sup> <span class="number">50.000 / mes</span></span>
	            <a href="#" class="btn btn-primary d-block px-3 py-3 mb-4">Comprar</a>
	            
	            <h3 class="heading-2 mb-3">Disfruta de las siguientes características</h3>
	            
	            <ul class="pricing-text">
	              <li><strong>450 GB</strong> Banda ancha</li>
	              <li><strong>400 GB</strong> Capacidad de almacenamiento</li>
	              <li><strong>4</strong> Base de datos MySQL</li>
	            </ul>
	            </div>
	          </div>
	        </div>
	        <div class="col-md-4">
	         <div class="block-7">
	            <div class="text-center">
	            <h2 class="heading">Platino</h2>
	            <span class="price"><sup>$</sup> <span class="number">75.000 / mes</span></span>
	            <a href="#" class="btn btn-primary d-block px-3 py-3 mb-4">Comprar</a>
	            
	            <h3 class="heading-2 mb-3">Disfruta de las siguientes características</h3>
	            
	            <ul class="pricing-text">
	              <li><strong>1000 GB</strong> Banda ancha</li>
	              <li><strong>800 GB</strong> Capacidad de almacenamiento</li>
	              <li><strong>10</strong> Base de datos MySQL</li>
	            </ul>
	            </div>
	          </div>
	        </div>
	      </div>
    	</div>
    </section>

    <section class="ftco-section services-section">
      <div class="container">
      	<div class="row justify-content-center mb-5 pb-5">
          <div class="col-md-7 text-center heading-section ftco-animate">
            <span class="subheading">Servicios</span>
            <h2 class="mb-4">Porque elegirnos</h2>
          </div>
        </div>
        <div class="row">
          <div class="col-md-4 d-flex align-self-stretch ftco-animate">
            <div class="media block-6 services d-block text-center">
              <div class="d-flex justify-content-center"><div class="icon"><span class="flaticon-guarantee"></span></div></div>
              <div class="media-body p-2 mt-3">
                <h3 class="heading">100% Garantia</h3>
                <p>Garantia de buen funcionamiento de los planes de hosting</p>
              </div>
            </div>      
          </div>
          <div class="col-md-4 d-flex align-self-stretch ftco-animate">
            <div class="media block-6 services d-block text-center">
              <div class="d-flex justify-content-center"><div class="icon"><span class="flaticon-shield"></span></div></div>
              <div class="media-body p-2 mt-3">
                <h3 class="heading">Seguro</h3>
                <p>Seguridad en la información almacenada en el hosting</p>
              </div>
            </div>    
          </div>
          <div class="col-md-4 d-flex align-self-stretch ftco-animate">
            <div class="media block-6 services d-block text-center">
              <div class="d-flex justify-content-center"><div class="icon"><span class="flaticon-support"></span></div></div>
              <div class="media-body p-2 mt-3">
                <h3 class="heading">Soporte dedicado</h3>
                <p>Completo soporte antes cualquier complicación</p>
              </div>
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