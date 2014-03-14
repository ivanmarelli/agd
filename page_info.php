<?php
/*
Template Name: Info
*/
?>

<div class="row" id="info">

<?php 

      $category         =    get_the_category($post->ID); 
      $categoryActual   =    $category[0]->cat_ID;
      $categoryName     =    $category[0]->cat_name;
?>

 <!-- <h1 class="text-center"> <?php // echo $categoryName; ?> </h1>  -->

<?php

      $args= array ( 
        'post_type' => 'page', 
        'category__in' => $categoryActual, 
        'posts_per_page' => 1
      );
      
      $paginas_info = new WP_Query( $args ); ?>

      <?php if ( $paginas_info->have_posts() ) : ?>

        <?php while ( $paginas_info->have_posts() ) : $paginas_info->the_post(); ?>

          <?php the_content(); ?>

          <?php edit_post_link(); ?>

        <?php endwhile; ?>


        
        <?php else : ?>

          <article>
              <div class="alert alert-warning alert-dismissable">
                  <strong>Disculpe.</strong> Aún no hay INFO sobre este producto.
              </div>
          </article>

        <?php endif; // end have_posts() check ?>

      <?php 
         wp_reset_postdata(); 
         wp_reset_query(); 
       ?>

  <div class="bottom-thumbnail"> <img src="<?php echo IMAGES ?>/bottom-producto-thumbnail.png" alt="" class="img-responsive"> </div>
</div> <!-- /row -->