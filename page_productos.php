<?php
/*
Template Name: Productos
*/
?>

<?php get_header(); ?>


<?php 

if ( is_user_logged_in() ) { 
 
?>
	
	<div class="container">
	<br>

	  
	<?php get_template_part ('loop-category'); ?>
	    
	<br>
	</div>  <!-- /fin container -->

<?php 

	} else {

		get_template_part ('login');
	
	}
?>

<?php get_footer(); ?>
