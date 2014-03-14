<?php get_header (); ?>

<div class="container">
<br>


<?php 
if(is_category( 'productos' )) : 
 	get_template_part ('loop-category'); 
else: 
 	get_template_part ('loop-producto'); 
endif; 
	//get_template_part('pagination');
?>

<br>
</div>  <!-- /fin container -->





<?php get_footer (); ?>



