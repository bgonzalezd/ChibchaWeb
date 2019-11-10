<!DOCTYPE html>
<html lang="en">
  <head>

    <title>CHIBCHA WEB</title>
    
    <?php include("Comun/head.html"); ?>
    
  </head>
  <body>
    
    <?php include("Comun/menuSinSesion.html");?>
    <div id="base" style="background-image: url('../images/fondo.png'); background-size: 100% 100%;">
      <div class="container-fluid">
        <div class="slider-text d-md-flex align-items-center" data-scrollax-parent="true">

          <div class="one-forth pr-md-4 ftco-animate align-self-md-center">
            <h1 class="mb-4" data-scrollax="properties: { translateY: '30%', opacity: 1.6 }">Diseña. <br> Desarrolla. <br> Hosting.</h1>
            <p class="mb-md-5 mb-sm-3" data-scrollax="properties: { translateY: '30%', opacity: 1.6 }">Con la mayor seguridad que te podemos ofrecer en el mercado, con los mejores servidores y grandes convenios.</p>
            <p data-scrollax="properties: { translateY: '30%', opacity: 1.6 }"><a href="registroUsuario.php" class="btn btn-primary px-4 py-3">Empieza ahora</a></p>
          </div>
          <div class="one-half align-self-md-end align-self-sm-center">
            <div class="slider-carousel owl-carousel">
              <div class="item">
                <img src="../images/dashboard_full_1.png" class="img-fluid img"alt="">
              </div>
              <div class="item">
                <img src="../images/dashboard_full_2.png" class="img-fluid img"alt="">
              </div>
              <div class="item">
                <img src="../images/dashboard_full_3.png" class="img-fluid img"alt="">
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
    
    
    <!-- END nav -->
    
    
  
    <section class="ftco-section services-section">
      <div class="container">
      	<div class="row justify-content-center mb-5 pb-5">
          <div class="col-md-7 text-center heading-section ftco-animate">
            <span class="subheading">Servicios</span>
            <h2 class="mb-4">¿Por que elegirnos?</h2>
          </div>
        </div>
        <div class="row">
          <div class="col-md-4 d-flex align-self-stretch ftco-animate">
            <div class="media block-6 services d-block text-center">
              <div class="d-flex justify-content-center"><div class="icon"><span class="flaticon-guarantee"></span></div></div>
              <div class="media-body p-2 mt-3">
                <h3 class="heading">100% Garantizado</h3>
                <p>Te ofrecemos la garantia por el uso de nustros hostings ya que te ofrecemos lo mejor en precio y calidad.</p>
              </div>
            </div>      
          </div>
          <div class="col-md-4 d-flex align-self-stretch ftco-animate">
            <div class="media block-6 services d-block text-center">
              <div class="d-flex justify-content-center"><div class="icon"><span class="flaticon-shield"></span></div></div>
              <div class="media-body p-2 mt-3">
                <h3 class="heading">La mejor seguridad</h3>
                <p>Manejamos controles todos los dias para que los clientes se sientan seguros y satisfechos.</p>
              </div>
            </div>    
          </div>
          <div class="col-md-4 d-flex align-self-stretch ftco-animate">
            <div class="media block-6 services d-block text-center">
              <div class="d-flex justify-content-center"><div class="icon"><span class="flaticon-support"></span></div></div>
              <div class="media-body p-2 mt-3">
                <h3 class="heading">Cuentas con equipo de soporte</h3>
                <p>Tenemos un area de soporte para que puedas solucionar todas las dudas que se te presenten.</p>
              </div>
            </div>      
          </div>
        </div>
      </div>
    </section>

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

    <section class="ftco-section ftco-counter img" id="section-counter" style="background-image: url(../images/bg_1.jpg);">
    	<div class="container">
    		<div class="row justify-content-center mb-5 pb-5">
          <div class="col-md-7 text-center heading-section heading-section-white ftco-animate">
            <h2 class="mb-4">Datos relevantes</h2>
            <span class="subheading">Mas de 100,000 websites alojados</span>
          </div>
        </div>
    		<div class="row justify-content-center">
    			<div class="col-md-10">
		    		<div class="row">
		          <div class="col-md-3 d-flex justify-content-center counter-wrap ftco-animate">
		            <div class="block-18 text-center">
		              <div class="text">
		                <strong class="number" data-number="2000">0</strong>
		                <span>Intalacion CMS</span>
		              </div>
		            </div>
		          </div>
		          <div class="col-md-3 d-flex justify-content-center counter-wrap ftco-animate">
		            <div class="block-18 text-center">
		              <div class="text">
		                <strong class="number" data-number="100">0</strong>
		                <span>Empresas asociadas</span>
		              </div>
		            </div>
		          </div>
		          <div class="col-md-3 d-flex justify-content-center counter-wrap ftco-animate">
		            <div class="block-18 text-center">
		              <div class="text">
		                <strong class="number" data-number="32000">0</strong>
		                <span>Dominios Registrados</span>
		              </div>
		            </div>
		          </div>
		          <div class="col-md-3 d-flex justify-content-center counter-wrap ftco-animate">
		            <div class="block-18 text-center">
		              <div class="text">
		                <strong class="number" data-number="31998">0</strong>
		                <span>Cloentes satisfechos</span>
		              </div>
		            </div>
		          </div>
		        </div>
	        </div>
        </div>
    	</div>
    </section>


    <!-- 
    <section class="ftco-section testimony-section bg-light">
      <div class="container">
        <div class="row justify-content-center mb-5 pb-5">
          <div class="col-md-7 text-center heading-section ftco-animate">
            <span class="subheading">Customer Says</span>
            <h2 class="mb-4">Our satisfied customer says</h2>
            <p>Far far away, behind the word mountains, far from the countries Vokalia and Consonantia, there live the blind texts. Separated they live in</p>
          </div>
        </div>
        <div class="row ftco-animate">
          <div class="col-md-12">
            <div class="carousel-testimony owl-carousel ftco-owl">
              <div class="item">
                <div class="testimony-wrap p-4 pb-5">
                  <div class="user-img mb-5" style="background-image: url(images/person_1.jpg)">
                    <span class="quote d-flex align-items-center justify-content-center">
                      <i class="icon-quote-left"></i>
                    </span>
                  </div>
                  <div class="text">
                    <p class="mb-5">Far far away, behind the word mountains, far from the countries Vokalia and Consonantia, there live the blind texts.</p>
                    <p class="name">Dennis Green</p>
                    <span class="position">Marketing Manager</span>
                  </div>
                </div>
              </div>
              <div class="item">
                <div class="testimony-wrap p-4 pb-5">
                  <div class="user-img mb-5" style="background-image: url(images/person_2.jpg)">
                    <span class="quote d-flex align-items-center justify-content-center">
                      <i class="icon-quote-left"></i>
                    </span>
                  </div>
                  <div class="text">
                    <p class="mb-5">Far far away, behind the word mountains, far from the countries Vokalia and Consonantia, there live the blind texts.</p>
                    <p class="name">Dennis Green</p>
                    <span class="position">Interface Designer</span>
                  </div>
                </div>
              </div>
              <div class="item">
                <div class="testimony-wrap p-4 pb-5">
                  <div class="user-img mb-5" style="background-image: url(images/person_3.jpg)">
                    <span class="quote d-flex align-items-center justify-content-center">
                      <i class="icon-quote-left"></i>
                    </span>
                  </div>
                  <div class="text">
                    <p class="mb-5">Far far away, behind the word mountains, far from the countries Vokalia and Consonantia, there live the blind texts.</p>
                    <p class="name">Dennis Green</p>
                    <span class="position">UI Designer</span>
                  </div>
                </div>
              </div>
              <div class="item">
                <div class="testimony-wrap p-4 pb-5">
                  <div class="user-img mb-5" style="background-image: url(images/person_1.jpg)">
                    <span class="quote d-flex align-items-center justify-content-center">
                      <i class="icon-quote-left"></i>
                    </span>
                  </div>
                  <div class="text">
                    <p class="mb-5">Far far away, behind the word mountains, far from the countries Vokalia and Consonantia, there live the blind texts.</p>
                    <p class="name">Dennis Green</p>
                    <span class="position">Web Developer</span>
                  </div>
                </div>
              </div>
              <div class="item">
                <div class="testimony-wrap p-4 pb-5">
                  <div class="user-img mb-5" style="background-image: url(images/person_1.jpg)">
                    <span class="quote d-flex align-items-center justify-content-center">
                      <i class="icon-quote-left"></i>
                    </span>
                  </div>
                  <div class="text">
                    <p class="mb-5">Far far away, behind the word mountains, far from the countries Vokalia and Consonantia, there live the blind texts.</p>
                    <p class="name">Dennis Green</p>
                    <span class="position">System Analytics</span>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>
    -->

    <section class="ftco-section">
    	<div class="container">
    		<div class="row justify-content-center mb-5 pb-5">
    			<div class="col-md-7 text-center heading-section ftco-animate">
            <span class="subheading">Servicios</span>
            <h2 class="mb-4">¿Como trabajamos?</h2>
          </div>
    		</div>
    		<div class="row">
          <div class="col-md-12 nav-link-wrap mb-5 pb-md-5 pb-sm-1 ftco-animate">
            <div class="nav ftco-animate nav-pills justify-content-center text-center" id="v-pills-tab" role="tablist" aria-orientation="vertical">
              <a class="nav-link active" id="v-pills-nextgen-tab" data-toggle="pill" href="#v-pills-nextgen" role="tab" aria-controls="v-pills-nextgen" aria-selected="true">Proxima generacion de VPS</a>

              <a class="nav-link" id="v-pills-performance-tab" data-toggle="pill" href="#v-pills-performance" role="tab" aria-controls="v-pills-performance" aria-selected="false">Desempeño</a>

              <a class="nav-link" id="v-pills-effect-tab" data-toggle="pill" href="#v-pills-effect" role="tab" aria-controls="v-pills-effect" aria-selected="false">Eficacia</a>
            </div>
          </div>
          <div class="col-md-12 align-items-center ftco-animate">
            
            <div class="tab-content ftco-animate" id="v-pills-tabContent">

              <div class="tab-pane fade show active" id="v-pills-nextgen" role="tabpanel" aria-labelledby="v-pills-nextgen-tab">
              	<div class="d-md-flex">
	              	<div class="one-forth align-self-center">
	              		<img src="../images/dashboard_full_1.jpg" class="img-fluid border" alt="">
	              	</div>
	              	<div class="one-half ml-md-5 align-self-center">
		                <h2 class="mb-4">Proxima generacion de VPS</h2>
		              	<p>Contamos con los mejores VPS en el mercado, nueva tecnologia que traemos para que puedas confiar 100% en nosotros</p>
		                <p>Así te proporcionamos la mejor experiencia de trabajo y mejor calidad</p>
		              </div>
	              </div>
              </div>

              <div class="tab-pane fade" id="v-pills-performance" role="tabpanel" aria-labelledby="v-pills-performance-tab">
                <div class="d-md-flex">
	              	<div class="one-forth order-last align-self-center">
	              		<img src="../images/dashboard_full_2.jpg" class="img-fluid border" alt="">
	              	</div>
	              	<div class="one-half order-first mr-md-5 align-self-center">
		                <h2 class="mb-4">Desempeño</h2>
		              	<p>Tenemos uno de los mejores CPanel para que puedas trabajar sobre el intuitivo y facil de utilizar, el desempeño de Chibcha Web es de los mejores y que brinda la mejor seguridad.</p>
		                <p>Contamos con la mejor experiencia de usuario ya que tenemos los mejores profesionales que estan dispuestos para responder tus dudas en servicio tecnico</p>
		              </div>
	              </div>
              </div>

              <div class="tab-pane fade" id="v-pills-effect" role="tabpanel" aria-labelledby="v-pills-effect-tab">
                <div class="d-md-flex">
	              	<div class="one-forth align-self-center">
	              		<img src="../images/dashboard_full_1.jpg" class="img-fluid border" alt="">
	              	</div>
	              	<div class="one-half ml-md-5 align-self-center">
		                <h2 class="mb-4">Eficiencia</h2>
		              	<p>Nuestros clientes nos prefieren ya que somos una empresa con la mejor eficiencia, facil metodo de pago y utilización </p>
		                
		              </div>
	              </div>
              </div>
            </div>
          </div>
        </div>
    	</div>
    </section>

    <section class="ftco-section-parallax">
      <div class="parallax-img d-flex align-items-center">
        <div class="container">
          <div class="row d-flex justify-content-center">
            <div class="col-md-7 text-center heading-section heading-section-white ftco-animate">
              <h2>Suscribete </h2>
              <p>Far far away, behind the word mountains, far from the countries Vokalia and Consonantia, there live the blind texts. Separated they live in</p>
              <div class="row d-flex justify-content-center mt-5">
                <div class="col-md-6">
                  <form action="#" class="subscribe-form">
                    <div class="form-group">
                      <span class="icon icon-paper-plane"></span>
                      <input type="text" class="form-control" placeholder="Enter email address">
                    </div>
                  </form>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>


    <!-- 
    <section class="ftco-section bg-light">
      <div class="container">
        <div class="row justify-content-center mb-5 pb-5">
          <div class="col-md-7 text-center heading-section ftco-animate">
            <span class="subheading">Blog</span>
            <h2>Recent Blog</h2>
            <p>Far far away, behind the word mountains, far from the countries Vokalia and Consonantia, there live the blind texts. Separated they live in</p>
          </div>
        </div>
        <div class="row">
          <div class="col-md-4 ftco-animate">
            <div class="blog-entry">
              <a href="blog-single.html" class="block-20" style="background-image: url('images/image_1.jpg');">
              </a>
              <div class="text p-4 d-block">
                <div class="meta mb-3">
                  <div><a href="#">August 12, 2018</a></div>
                  <div><a href="#">Admin</a></div>
                  <div><a href="#" class="meta-chat"><span class="icon-chat"></span> 3</a></div>
                </div>
                <h3 class="heading"><a href="#">Even the all-powerful Pointing has no control about the blind texts</a></h3>
              </div>
            </div>
          </div>
          <div class="col-md-4 ftco-animate">
            <div class="blog-entry" data-aos-delay="100">
              <a href="blog-single.html" class="block-20" style="background-image: url('images/image_2.jpg');">
              </a>
              <div class="text p-4">
                <div class="meta mb-3">
                  <div><a href="#">August 12, 2018</a></div>
                  <div><a href="#">Admin</a></div>
                  <div><a href="#" class="meta-chat"><span class="icon-chat"></span> 3</a></div>
                </div>
                <h3 class="heading"><a href="#">Even the all-powerful Pointing has no control about the blind texts</a></h3>
              </div>
            </div>
          </div>
          <div class="col-md-4 ftco-animate">
            <div class="blog-entry" data-aos-delay="200">
              <a href="blog-single.html" class="block-20" style="background-image: url('images/image_3.jpg');">
              </a>
              <div class="text p-4">
                <div class="meta mb-3">
                  <div><a href="#">August 12, 2018</a></div>
                  <div><a href="#">Admin</a></div>
                  <div><a href="#" class="meta-chat"><span class="icon-chat"></span> 3</a></div>
                </div>
                <h3 class="heading"><a href="#">Even the all-powerful Pointing has no control about the blind texts</a></h3>
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>
    -->

    <?php include("Comun/footer.html"); ?>
    
  

  <!-- loader -->
  <div id="ftco-loader" class="show fullscreen"><svg class="circular" width="48px" height="48px"><circle class="path-bg" cx="24" cy="24" r="22" fill="none" stroke-width="4" stroke="#eeeeee"/><circle class="path" cx="24" cy="24" r="22" fill="none" stroke-width="4" stroke-miterlimit="10" stroke="#F96D00"/></svg></div>

  <?php include("Comun/popupLogin.html");?>
</div>

<script>
// Get the modal
var modal = document.getElementById('inicio_modal');

// When the user clicks anywhere outside of the modal, close it
window.onclick = function(event) {
    if (event.target == modal) {
        modal.style.display = "none";
    }
}
</script>


    
  <?php include("Comun/script.html"); ?>
  </body>
</html>