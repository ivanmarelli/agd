<?php 
	if ( is_user_logged_in() ) { 
 ?>

 <?php get_header (); ?>

<div class="container" >
<br>
   <h1><?php the_title(); ?></h1>
   


    <div class="row" id="info">

        
        <?php 
          while ( have_posts() ) : the_post();

              the_content();
          endwhile;
       ?>

 <h4><?php edit_post_link(); ?></h4>
    </div> <!-- /row -->
<br>
</div> <!-- /container -->

<?php get_footer (); ?>

<?php 
	} else {

	get_template_part ('login');

}

?>

