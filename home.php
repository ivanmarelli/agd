<?php // get_header (); ?>

<!DOCTYPE html>
<!--[if lt IE 7]>      <html class="no-js lt-ie9 lt-ie8 lt-ie7"> <![endif]-->
<!--[if IE 7]>         <html class="no-js lt-ie9 lt-ie8"> <![endif]-->
<!--[if IE 8]>         <html class="no-js lt-ie9"> <![endif]-->
<!--[if gt IE 8]><!--> <html class="no-js"> <!--<![endif]-->    
<html lang="es">
    <head>
      <meta http-equiv="content-type" content="text/html; charset=UTF-8">
      <meta charset="<?php bloginfo('charset'); ?>">
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

    <header>
        <div class="home-header">
            <a href=""><img src="<?php echo IMAGES ?>/logo-agd.png" alt="" class="img-responsive" style="margin: 0 auto;"></a>
        </div>
    </header>

  <div class="container">

     <div class="login-form">
  
       <form name="loginform" id="loginform" action="<?php echo esc_url( wp_login_url( $_SERVER['REQUEST_URI'] ) ); ?>" method="post" class="form-signin" role="form">

           <img src=" <?php echo IMAGES ?>/llave.png" alt="" class="img-responsive">
            <input type="text" class="form-control" placeholder="Nombre de Usuario" name="log" id="user_login" value="<?php echo attribute_escape(stripslashes($user_login)); ?>" size="20" tabindex="10" required autofocus>
            <input type="password" class="form-control" placeholder="Contraseña" name="pwd" id="user_pass" value="" size="20" tabindex="20" required>

             <div class="row">
              <div class="col-xs-8 col-md-6">
                    <label class="checkbox">
                      <input name="rememberme" type="checkbox" id="rememberme" value="forever" tabindex="90" class="login-home" />Recuérdame
                    </label>
                    <a href="<?php echo wp_lostpassword_url( get_bloginfo('url') ); ?>" title="Lost Password"  class="login-home">¿Has perdido tu contraseña?</a> <!-- | <a href="<?php // bloginfo('url'); ?>/wp-login.php?action=register">Registrarse</a> -->                    
              </div>
              
              <div class="col-xs-4 col-md-6">
                <input type="submit" name="wp-submit" id="wp-submit" value="<?php _e(''); ?>" tabindex="100" />
              </div>
            </div>

        </form>


    </div> <!-- /login-form -->
  </div> <!-- /container -->

<?php 

//  exit; 
  get_footer ();

?>

