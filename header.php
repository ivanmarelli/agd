<!DOCTYPE html>
<!--[if lt IE 7]>      <html class="no-js lt-ie9 lt-ie8 lt-ie7"> <![endif]-->
<!--[if IE 7]>         <html class="no-js lt-ie9 lt-ie8"> <![endif]-->
<!--[if IE 8]>         <html class="no-js lt-ie9"> <![endif]-->
<!--[if gt IE 8]><!--> <html class="no-js"> <!--<![endif]-->    
<html lang="es">
    <head>
      <meta http-equiv="content-type" content="text/html; charset=UTF-8">
       <meta charset="<?php  echo bloginfo('charset'); ?>">
      <!-- <meta charset="utf-8"> -->
      
      <meta http-equiv="X-UA-Compatible" content="IE=edge">
      <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
      <title><?php wp_title(''); ?><?php if(wp_title('', false)) { echo ' :'; } ?> <?php bloginfo('name'); ?></title>

      <link href='http://fonts.googleapis.com/css?family=Open+Sans:400italic,400,700' rel='stylesheet' type='text/css'>
      <link rel="stylesheet" href="<?php bloginfo('stylesheet_url'); ?>" />
      <link rel="pingback" href="<?php bloginfo('pingback'); ?>"  /> <!--  habilita los ping de otros blogs  -->
      <link rel="alternate" type="application/rss+xml" title="RSS .92" href="<?php bloginfo('rss_url'); ?>" /> <!--  RSSS  -->
      <link rel="alternate" type="application/atom+xml" title="Atom 1.0" href="<?php bloginfo('atom_url'); ?>" /> <!--  RSSS  -->

      <link rel="shortcut icon" href="<?php echo IMAGES ?>/favicon.ico">
      <link rel="apple-touch-icon" href="<?php echo IMAGES ?>/apple-touch-icon.png">
      <link rel="apple-touch-icon" sizes="72x72" href="<?php echo IMAGES ?>apple-touch-icon-72x72.png">
      <link rel="apple-touch-icon" sizes="114x114" href="<?php echo IMAGES ?>/apple-touch-icon-114x114.png">

    </head>

    <body>

  <?php 

    if ( is_user_logged_in() ) { 
     
       global $current_user;
       get_currentuserinfo();

       $nombreUsuario = $current_user->display_name . "\n";
       $avatarUsuario = get_avatar($current_user->ID, 25); 

    ?>

    <div class="container top-seccion">
      
        <div class="navbar-header">
          <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
          <!-- <a class="navbar-brand" href="#">Catálogo AGD</a> -->
        </div> <!-- /navbar-header -->

        <div class="navbar-collapse collapse">
           <form class="navbar-form navbar-right"  role="search" method="get" id="searchform" action="<?php echo home_url( '/' ); ?>">
                <span class="glyphicon glyphicon-search"></span>
                <input class="form-control-search" type="search" name="s" placeholder="Buscar">
           </form>
          <form class="navbar-form navbar-right" role="form">
              <div class="form-group">
                <p class="welcome"> <?php // echo $avatarUsuario; ?> 
                  <span class="glyphicon glyphicon-user"></span> Bienvenido <strong><?php echo $nombreUsuario  ?>,</strong>
                </p>
                <a href="<?php echo wp_logout_url( home_url() ) ?>" class="logout" >
                  <span class="glyphicon glyphicon-log-out"> Logout | </span>
                </a>
              </div><!-- /.form-group -->
          </form> <!-- /form -->
        </div><!--/.navbar-collapse -->
      
      </div> <!-- /container top-seccion -->

    <header>
       <div class="home-header">
        <?php // im_bootstrap_nav(); ?>

        <ul class="nav nav-pills navbar-right">
        <!-- class="active" -->
          <?php 
            if(is_category( )) :
              echo "<li class='active'>";
            else: 
              echo "<li>";
            endif; 
            ?>
              <a href="<?php bloginfo('url'); ?>/productos">
                <p class="text-center"> <img src="<?php echo IMAGES ?>/btn-productos.png" alt=""> </p>PRODUCTOS
              </a>
          </li>

          <?php 
            if(is_page( 'Empresa' )) : 
              echo "<li class='active'>";
            else: 
              echo "<li>";
            endif; 
            ?>
            <a href="<?php bloginfo('url'); ?>/empresa">
                <p class="text-center"> <img src="<?php echo IMAGES ?>/btn-agd.png" alt=""> </p>EMPRESA
              </a>
          </li>

          <?php 
            if(is_page( 'Contacto' )) : 
              echo "<li class='active'>";
            else: 
              echo "<li>";
            endif; 
            ?>
          <a href="<?php bloginfo('url'); ?>/contacto">
            <p class="text-center"> <img src="<?php echo IMAGES ?>/btn-contacto.png" alt=""> </p>CONTACTO
          </a>
          </li>
        </ul> 

         <a href="<?php bloginfo('url'); ?>"><img src="<?php echo IMAGES ?>/logo-agd.png" title="<?php bloginfo('name'); ?>" class="logo-header img-responsive"></a>
        </div> <!-- /home-header -->
    </header> <!-- /header -->

<?php  

   } else {

?>
    <header>
        <div class="home-header">
            <a href=""><img src="<?php echo IMAGES ?>/logo-agd.png" alt="" class="img-responsive" style="margin: 0 auto;"></a>
        </div>
    </header>

<?php 

  } 
  
?>