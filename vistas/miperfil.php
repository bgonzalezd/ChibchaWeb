<!DOCTYPE html>
<?php session_start();
  include ("../mapeo/ServicioUsuario.php");
  include ("../mapeo/ServicioDominio.php");
  include ("../mapeo/ServicioHosting.php");?>
<html lang="en">
  <head>
    <title>Mi perfil</title>
    <?php include("Comun/head.html"); ?>
    <style type="text/css">
      .emp-profile{
    padding: 3%;
    margin-top: 3%;
    margin-bottom: 3%;
    border-radius: 0.5rem;
    background: #fff;
}
.profile-img{
    text-align: center;
}
.profile-img img{
    width: 70%;
    height: 100%;
}
.profile-img .file {
    position: relative;
    overflow: hidden;
    margin-top: -20%;
    width: 70%;
    border: none;
    border-radius: 0;
    font-size: 15px;
    background: #212529b8;
}
.profile-img .file input {
    position: absolute;
    opacity: 0;
    right: 0;
    top: 0;
}
.profile-head h5{
    color: #333;
}
.profile-head h6{
    color: #0062cc;
}
.profile-edit-btn{
    border: none;
    border-radius: 1.5rem;
    width: 70%;
    padding: 2%;
    font-weight: 600;
    color: #6c757d;
    cursor: pointer;
}
.proile-rating{
    font-size: 12px;
    color: #818182;
    margin-top: 5%;
}
.proile-rating span{
    color: #495057;
    font-size: 15px;
    font-weight: 600;
}
.profile-head .nav-tabs{
    margin-bottom:5%;
}
.profile-head .nav-tabs .nav-link{
    font-weight:600;
    border: none;
}
.profile-head .nav-tabs .nav-link.active{
    border: none;
    border-bottom:2px solid #0062cc;
}
.profile-work{
    padding: 14%;
    margin-top: -15%;
}
.profile-work p{
    font-size: 12px;
    color: #818182;
    font-weight: 600;
    margin-top: 10%;
}
.profile-work a{
    text-decoration: none;
    color: #495057;
    font-weight: 600;
    font-size: 14px;
}
.profile-work ul{
    list-style: none;
}
.profile-tab label{
    font-weight: 600;
}
.profile-tab p{
    font-weight: 600;
    color: #0062cc;
}
.but{
    border:1px solid blue;
      cursor: pointer;
}
    </style>
    <script type="text/javascript">
        function comprar(codigo,email, precio, etiqueta,nombre){
            $(document).ready(function(){
                  var request = $.ajax({
                    url: "../respuestas/respuestaComprarDominio.php",
                    method: "POST",
                      data: { codigo : codigo, email : email, precio : precio, etiqueta : etiqueta, nombre : nombre}
                  });
                   
                  request.done(function( msg ) {
                    
                      $('#pago').submit();
                    
                  });
                   
                  request.fail(function( jqXHR, textStatus ) {
                    console.log( "Request failed: " + textStatus );
                  });

            });
        }
    </script>
  </head>
  <body>
  <?php include("Comun/verificarSesionNormal.php"); ?>
    <!-- END nav -->
    
    <!-- <div class="js-fullheight"> -->
    <div id="base" style="background-image: url('../images/fondo.png'); background-size: 100% 100%;">
      
    </div>

    <section class="ftco-section bg-light" style="padding: 0 0 0 0" > 
<!------ Include the above in your HEAD tag ---------->

        <div class="container emp-profile">
            <form method="post">
                <div class="row">
                    <div class="col-md-4" style="max-width: 200px">
                        <div style="width: 100%; height: 100%">
                            <img  style="width: 100%; height: 100%" src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcS52y5aInsxSm31CvHOFHWujqUx_wWTS9iM6s7BAm21oEN_RiGoog" alt=""/>
                            
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="profile-head">
                                    <?php
                                        $sc = new ServicioUsuario();
                                        $cli = $sc->getInfoUsuario($_SESSION['cod_user']);
                                    ?>
                                    <h5>
                                        <?php echo $cli->nombre ?>
                                    </h5>
                                    <h6>
                                        <?php echo $cli->nom_usuario ?>
                                    </h6>
                                    <h5>
                                        <?php echo $cli->email ?>
                                    </h5>
                            
                        </div>
                    </div>
                    <div class="col-md-2">
                        <input type="button" onclick="window.location.href = 'editarPerfil.php'" class="profile-edit-btn" name="btnAddMore" value="Editar perfil"/>
                    </div>
                </div>
                <div class="row" style="margin-top: 30px">
                    
                    <div class="col-md-8">
                        <ul class="nav nav-tabs" id="myTab" role="tablist" style="margin-bottom: 20px">
                                <li class="nav-item">
                                    <a class="nav-link active" id="home-tab" data-toggle="tab" href="#home" role="tab" aria-controls="home" aria-selected="true">Dominios</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" id="profile-tab" data-toggle="tab" href="#profile" role="tab" aria-controls="profile" aria-selected="false">Hostings</a>
                                </li>
                            </ul>
                        <div class="tab-content profile-tab" id="myTabContent">
                            <div class="tab-pane fade show active" id="home" role="tabpanel" aria-labelledby="home-tab">
                                        
                                        <?php 

                                            $sD = new ServicioDominio();
                                            $arr = $sD->getMisDominios($_SESSION['cod_user']);
                                            foreach($arr as $texto){
                                                $dom = json_decode($texto);
                                                ?>

                                                    <div class="row">
                                                        <div class="col-md-3">
                                                            <p><?php echo $dom->nombre . "." . $dom->nom_dominio ?></p>
                                                        </div>
                                                        <div class="col-md-3">
                                                            <p><?php echo $dom->nom_distribuidor ?></p>
                                                        </div>
                                                        <div class="col-md-3">
                                                            <p>$<?php echo $dom->precio ?></p>
                                                        </div>
                                                        <?php if($dom->estado=="C"){
                                                            ?><div class="col-md-3">
                                                                <p align="center">Adquirido</p>
                                                            </div>
                                                            <?php
                                                        }else if($dom->estado=="A"){
                                                            ?>
                                                            <form action="https://www.paypal.com/cgi-bin/webscr" id="pago" method="post" target="_top">
<input type="hidden" name="cmd" value="_s-xclick">
<input type="hidden" name="hosted_button_id" value="WU94GBMFHJDZC"><div class="col-md-3" name="pay_now" id="pay_now" onclick="comprar(<?php echo $dom->cod_dominio_adquirido ?>,'<?php echo $dom->email ?>',<?php echo $dom->precio ?>,'<?php echo $dom->etiqueta ?>','<?php echo $dom->nombre . '.' . $dom->nom_dominio ?>')">
                                                                <p align="center" class="but">Comprar</p>
                                                            </div></form>
                                                            <?php
                                                        }else{
                                                            ?><div class="col-md-3">
                                                                <p align="center">Pendiente</p>
                                                            </div>
                                                            <?php
                                                        }

                                                        ?>
                                                        
                                                    </div>
                                                <?php
                                            }




                                         ?>

                            </div>
                            

                            <div class="tab-pane fade" id="profile" role="tabpanel" aria-labelledby="profile-tab">
                                       <?php 

                                            $sD = new ServicioHosting();
                                            $arr = $sD->getMisHosting($_SESSION['cod_user']);
                                            foreach($arr as $texto){
                                                $hos = json_decode($texto);
                                                ?>

                                                    <div class="row">
                                                        <div class="col-md-3">
                                                            <p><?php echo $hos->nombre ?></p>
                                                        </div>
                                                        <div class="col-md-3">
                                                            <p><?php if($hos->sistema_operativo=='Linux'){echo "Ubuntu 18.04";}else{echo "Windows server 2016";} ?></p>
                                                        </div>
                                                        <?php if($hos->tipo=="1"){
                                                            ?><div class="col-md-3">
                                                                <p align="center">ChibchaPlata</p>
                                                            </div>
                                                            <?php
                                                        }else if($hos->tipo=="2"){
                                                            ?><div class="col-md-3">
                                                                <p align="center">ChibchaOro</p>
                                                            </div>
                                                            <?php
                                                        }else{
                                                            ?><div class="col-md-3">
                                                                <p align="center">ChibchaPlatino</p>
                                                            </div>
                                                            <?php
                                                        }

                                                        ?>
                                                        <div class="col-md-3">
                                                                <p align="center">Adquirido</p>
                                                            </div>
                                                        
                                                    </div>
                                                <?php
                                            }




                                         ?>
                            </div>
                        </div>
                    </div>
                </div>
            </form>           
        </div>
    </section>


    <?php include("Comun/footer.html"); ?>
   <?php include("Comun/verificarSesionComun2.php"); ?>
  

  <!-- loader -->
  <div id="ftco-loader" class="show fullscreen"><svg class="circular" width="48px" height="48px"><circle class="path-bg" cx="24" cy="24" r="22" fill="none" stroke-width="4" stroke="#eeeeee"/><circle class="path" cx="24" cy="24" r="22" fill="none" stroke-width="4" stroke-miterlimit="10" stroke="#F96D00"/></svg></div>


  <?php include("Comun/script.html"); ?>
    
  </body>
</html>