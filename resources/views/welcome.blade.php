<!DOCTYPE html>
<html lang="en">
  <head>
      
    <title>Ricardo's Atelier</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <link href="https://fonts.googleapis.com/css?family=Amatic+SC:400,700|Work+Sans:300,400,700" rel="stylesheet">
    <link rel="stylesheet" href="{{asset('fonts/icomoon/style.css')}}">

    <link rel="stylesheet" href="{{asset('css/bootstrap.min.css')}}">
    <link rel="stylesheet" href="{{asset('css/magnific-popup.css')}}">
    <link rel="stylesheet" href="{{asset('css/jquery-ui.css')}}">
    <link rel="stylesheet" href="{{asset('css/owl.carousel.min.css')}}">
    <link rel="stylesheet" href="{{asset('css/owl.theme.default.min.css')}}">
    <link rel="stylesheet" href="{{asset('css/bootstrap-datepicker.css')}}">
    <link rel="stylesheet" href="{{asset('css/animate.css')}}">
    
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/mediaelement@4.2.7/build/mediaelementplayer.min.css">
    
    <!---->
    <style>
            #customers {
              font-family: "Trebuchet MS", Arial, Helvetica, sans-serif;
              border-collapse: collapse;
              width: 100%;
            }
            
            #customers td, #customers th {
              border: 1px solid #ddd;
              padding: 8px;
            }
            
            #customers tr:nth-child(even){background-color: #f2f2f2;}
            
            #customers tr:hover {background-color: #ddd;}
            
            #customers th {
              padding-top: 12px;
              padding-bottom: 12px;
              text-align: left;
              background-color: #4c73af;
              color: white;
            }
            </style>
    <!---->
    
    <link rel="stylesheet" href="{{asset('fonts/flaticon/font/flaticon.css')}}">
  
    <link rel="stylesheet" href="{{asset('css/aos.css')}}">

    <link rel="stylesheet" href="{{asset('css/style.css')}}">
    
  </head>
  <body>

  <div class="site-wrap">

    <div class="site-mobile-menu">
      <div class="site-mobile-menu-header">
        <div class="site-mobile-menu-close mt-3">
          <span class="icon-close2 js-menu-toggle"></span>
        </div>
      </div>
      <div class="site-mobile-menu-body"></div>
    </div> <!-- .site-mobile-menu -->
    
    
    <div class="site-navbar-wrap js-site-navbar bg-white">
      
      <div class="container">
        <div class="site-navbar bg-light">
          <div class="py-1">
            <div class="row align-items-center">
              <div class="col-2">
                <h3 class="mb-0 site-logo"><a href="#">Ricardo's Atelier</a></h3>
              </div>
              <div class="col-10">
                <nav class="site-navigation text-right" role="navigation">
                  <div class="container">
                    <div class="d-inline-block d-lg-none ml-md-0 mr-auto py-3"><a href="#" class="site-menu-toggle js-menu-toggle text-black"><span class="icon-menu h3"></span></a></div>

                    <ul class="site-menu js-clone-nav d-none d-lg-block">
                      @if (Route::has('login'))
                        @auth
                           <li class="active"><a href="{{ url('/home') }}">Inicio</a></li>
                        @else
                           <li><a href="{{ route('login') }}">Entrar</a></li>
                        @endauth
                      @endif
                      <li><a href="#Trabajos">Entrega de Trabajos</a></li>
                      <li><a href="#Aboutus">Nuestros Trabajos</a></li>
                      <li><a href="#contact">Contactanos</a></li>
                    </ul>
                  </div>
                </nav>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  
    <div style="height: 113px;"></div>
    <div class="slide-one-item home-slider owl-carousel">
      
      <div class="site-blocks-cover" style="background-image: url(https://ingeoexpert.com/wp-content/uploads/2015/03/banner-suit.jpg);" data-aos="fade" data-stellar-background-ratio="0.5">
        <div class="container">
          <div class="row align-items-center justify-content-center">
            <div class="col-md-7 text-center" data-aos="fade">
              <h1>Alta <strong>Costura</strong></h1>
            </div>
          </div>
        </div>
      </div>  

      <div class="site-blocks-cover" style="background-image: url(images/hero_bg_2.jpg);" data-aos="fade" data-stellar-background-ratio="0.5">
        <div class="container">
          <div class="row align-items-center justify-content-center">
            <div class="col-md-7 text-center" data-aos="fade">
              <h1> <strong>Calidad y Elegancia</strong> </h1>
            </div>
          </div>
        </div>
      </div> 
      <div class="site-blocks-cover" style="background-image: url(https://biggundigital.co.uk/wp-content/uploads/moody3.gif);" data-aos="fade" data-stellar-background-ratio="0.5">
        <div class="container">
          <div class="row align-items-center justify-content-center">
            <div class="col-md-7 text-center" data-aos="fade">
              <h1>Diseños <strong>Exclusivos</strong></h1>
            </div>
          </div>
        </div>
      </div>  
    </div>

    <div id="Trabajos" class="site-section bg-light">
          <div class="col-md-6 mx-auto text-center mb-5 section-heading">
              <h2>Trabajos Finalizados</h2>
            </div>
              <div class="row">
			    	<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
			          	<div class="table-responsive">
			          		<table id="customers" class="table table-bordered table-striped table-hover">
			          			<thead>
			          				<th>ID Orden</th>
			          				<th>Cliente</th>
			          				<th>Fecha disponible</th>
			          				<th>Estado</th>
			          				<th>Detalle</th>
			          			</thead>
			          			@foreach($listado as $or)
			          				<tr>
			          					<td>{{$or->id_orden_trabajo}}</td>
			          					<td>{{$or->nombre}}</td>
			          					<td>{{$or->fecha_entrega}}</td>

			          					@switch ( $or->flag_estado )
			          						@case(0)
			          							<td>Recibido</td>
			          							@break
			          						@case(1)
			          							<td>En Proceso</td>
			          							@break
			          						@case(2)
			          							<td>Finalizado</td>
			          							@break
			          						@case(3)
			          							<td>Entregado</td>
			          							@break
			          					@endswitch
			          					<td>{{$or->detalle}}</td>
			          					
			          				</tr>
			          				
			          			@endforeach
			          		</table>
			          	</div>
			          	{{$listado->render()}}
			        </div>
			        <!-- /.col -->
			    </div>
			    <!-- /.row -->
          </div>
 

        <div class="row">
          <div class="col-12 text-center mb-3">
          </div>
          <div class="col-12">
          </div>
        </div>

      </div>
    </div>
  
    <div class="site-section">
      <div class="container">
        <div class="row align-items-center">
          <div class="col-md-6 mb-5 mb-md-0">
                <a href="https://vimeo.com/134793157" class="popup-vimeo image-play">
                  <img src="images/about_3.jpg"alt ="" class="img-fluid ">
                </a>
            
          </div>
          <div class="col-md-5 ml-auto">
            <h2 class="h2 mb-3">Acerca de nuestro trabajo</h2>
            <p class="h5 mb-3">Diseñamos trajes al gusto del cliente</p>
            <p class="mb-4">con la mas alta calidad en el diseño</p>
            <p><a href="https://vimeo.com/134793157" class="popup-vimeo text-uppercase">Mirar Video <span class="icon-arrow-right small"></span></a></p>
        </div>
        </div>
      </div>
    </div>

    </div>
    

    <div id="Aboutus" class="site-section block-15">
      <div class="container">
        <div class="row">
          <div class="col-md-6 mx-auto text-center mb-5 section-heading">
           
            <h2>Nuestros Trabajos
            </h2>
          </div>
        </div>


        <div class="nonloop-block-15 owl-carousel">
        
            <div class="media-with-text">
              <div class="img-border-sm mb-4">
                  <img src="images/img_1.jpg" alt="" class="img-fluid">
                </a>
              </div>
              <h2 class="heading mb-0"><a href="#">Traje Rojo</a></h2>
              <span class="mb-3 d-block post-date">Junio 21, 2017 &bullet; Por <a href="#">Ricardo Atelier</a></span>
              <p>Traje confeccionado para señorita</p>
            </div>
          
            <div class="media-with-text">
              <div class="img-border-sm mb-4">
                  <img src="images/img_2.jpg" alt="" class="img-fluid">
                </a>
              </div>
              <h2 class="heading mb-0"><a href="#">Traje Plomo</a></h2>
              <span class="mb-3 d-block post-date">Octubre 2, 2016 &bullet; Por <a href="#">Ricardo Atelier</a></span>
              <p>Traje confeccionado para señor</p>
            </div>
          
            <div class="media-with-text">
              <div class="img-border-sm mb-4">
                  <img src="images/img_3.jpg" alt="" class="img-fluid">
                </a>
              </div>
              <h2 class="heading mb-0"><a href="#">Traje Marron</a></h2>
              <span class="mb-3 d-block post-date">Agosto 19, 2017 &bullet; Por <a href="#">Ricardo Atelier</a></span>
              <p>Sacos confeccionado para señor</p>
                </div>
        </div>

        <div class="row">
          
        </div>
      </div>
    </div>
    

    <div id="contact" class="py-5 quick-contact-info">
      <div class="container">
        <div class="row">
          <div class="col-md-4">
            <div>
            
            </div>
          </div>
          <div class="col-md-4">
            <div>
            
            </div>
          </div>
          <div class="col-md-4">
            <h2><span class="icon-comments"></span>Contactanos</h2>
            <p class="mb-0">Email: RicardoAtelier@gmail.com <br>
            Telefono: 69771411 </p>
          </div>
        </div>
      </div>
    </div>

    
    <footer class="site-footer">
      <div class="container">
        

        <div class="row">
          <div class="col-md-4">
        
          </div>
          <div class="col-md-6">
            <div class="row">
              <div class="col-md-6">
               
              </div>
              <div class="col-md-6">
              
              </div>
            </div>
          </div>

          
          <div class="col-md-2">
            <div class="col-md-12"><h3 class="footer-heading mb-4 text-white">Buscanos en </h3></div>
              <div class="col-md-12">
                    <p>
                            <a href="https://www.facebook.com/Ricardos.atelier/" class="pb-2 pr-2 pl-0"><span class="icon-facebook"></span></a>
                          </p>
              </div>
          </div>
        </div>
        <div class="row pt-5 mt-5 text-center">
          <div class="col-md-12">
            <p>
            <!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
            Copyright &copy; <script>document.write(new Date().getFullYear());</script> Ricardo Atelier | Todos los derechos reservados <i class="icon-heart text-success" aria-hidden="true"></i>
            <!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
            </p>
          </div>
          
        </div>
      </div>
    </footer>
  </div>

  <script src="js/jquery-3.3.1.min.js"></script>
  <script src="js/jquery-migrate-3.0.1.min.js"></script>
  <script src="js/jquery-ui.js"></script>
  <script src="js/popper.min.js"></script>
  <script src="js/bootstrap.min.js"></script>
  <script src="js/owl.carousel.min.js"></script>
  <script src="js/jquery.stellar.min.js"></script>
  <script src="js/jquery.countdown.min.js"></script>
  <script src="js/jquery.magnific-popup.min.js"></script>
  <script src="js/bootstrap-datepicker.min.js"></script>
  <script src="js/aos.js"></script>

  
  <script src="js/mediaelement-and-player.min.js"></script>

  <script src="js/main.js"></script>
    

  <script>
      document.addEventListener('DOMContentLoaded', function() {
                var mediaElements = document.querySelectorAll('video, audio'), total = mediaElements.length;

                for (var i = 0; i < total; i++) {
                    new MediaElementPlayer(mediaElements[i], {
                        pluginPath: 'https://cdn.jsdelivr.net/npm/mediaelement@4.2.7/build/',
                        shimScriptAccess: 'always',
                        success: function () {
                            var target = document.body.querySelectorAll('.player'), targetTotal = target.length;
                            for (var j = 0; j < targetTotal; j++) {
                                target[j].style.visibility = 'visible';
                            }
                  }
                });
                }
            });
    </script>

  </body>
</html>