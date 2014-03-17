<?php 
	if ( is_user_logged_in() ) { 
 ?>


<?php get_header (); ?>

<div class="container">
<br>


<?php 



	if(is_category( 'productos' )) : 
	 	get_template_part ('loop-category'); 
	else: 
	 	get_template_part ('loop-producto'); 
	endif; 
?>


<br>
</div>  <!-- /fin container -->

<?php get_template_part('pagination');  ?>

<?php get_footer (); ?>

<?php 

	} else {

	redirigirAlogin();

}

?>


