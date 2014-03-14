<?php get_header(); ?>

<div class="container">
<br>

        <h1><?php echo sprintf( __( 'Resultados para la búsqueda de:   ', '' ), $wp_query->found_posts ); echo get_search_query(); ?></h1>

		<?php 

		// if(is_category( 'productos' )) : 
		//  	get_template_part ('loop-category'); 
		// else: 
		 	get_template_part ('loop-search'); 
//		endif; 

		?>

		<?php get_template_part('pagination'); ?>

<br>
</div>  <!-- /fin container -->

<?php get_footer(); ?>





