
    <div class="row-fluid">

          <?php if (have_posts()): while (have_posts()) : the_post(); ?>
              <!-- article -->
              <article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>


                <div class="col-sm-6 col-md-3">
                  <div class="thumbnail">
                    <div class="caption">
                      <h3><?php the_title(); ?></h3>
                    </div>
                      <a href="<?php the_permalink(); ?>">

                         <?php if ( has_post_thumbnail()) :  ?>
                              <figure>
                                <a href="<?php the_permalink(); ?>" title="<?php the_title(); ?>">
                                  <?php the_post_thumbnail(array(250,180),array('class' => 'img-responsive')); ?>
                                </a>
                              </figure>
                          <?php endif; ?>    <!-- /post thumbnail -->                  

                          <p class="text-right"><img src=" <?php echo IMAGES ?>/mas.png" alt="Ver producto"> </p>
                     </a>
                      <div class="bottom-thumbnail"> <img src=" <?php echo IMAGES ?>/bottom-thumbnail.png" alt=""> </div>
                  </div> <!-- /thumbnail -->
                </div>  <!-- /producto -->


              </article>
             <!-- /article -->
          <?php endwhile; ?>
          <?php else: ?>
              <!-- article -->
              <article>
                <div class="alert alert-warning alert-dismissable">
                   <strong>Ops!</strong> Parece que no se encontró nada en este lugar.<br> Intenta una búsqueda.
                </div>

              </article>
              <!-- /article -->
          <?php endif; ?>

         <?php get_template_part('pagination'); ?>




    </div> <!-- /row -->







