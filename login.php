<?php
/*
Template Name: login
*/
?>

<?php get_header (); ?>

    <div class="container">
     
      <div class="login-form">
  
       <form name="loginform" id="loginform" action="<?php echo esc_url( wp_login_url( $_SERVER['REQUEST_URI'] ) ); ?>" method="post" class="form-signin" role="form">

           <img src=" <?php echo IMAGES ?>/llave.png" alt="" class="img-responsive">
            <input type="text" class="form-control" placeholder="Nombre de Usuario" name="log" id="user_login" value="<?php echo esc_attr(stripslashes($user_login)); ?>" size="20" tabindex="10" required autofocus>
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

    </div> <!-- /container -->

<?php get_footer (); ?>