
<?php get_header (); ?>

<div class="container">
<br>
<h1><?php  im_breadcrumb(); ?></h1>

                <!-- Post -->
                <?php if (have_posts()): while (have_posts()) : the_post(); ?>
                <!-- article -->
                <article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>


                <div class="thumbnail producto" id="producto">
                  <div class="caption">
                     <h3><?php the_title(); ?></h3>
                  </div>

                <div class="row" id="table-producto">
                      <div class="col-md-3">
                         <?php if ( has_post_thumbnail()) :  ?>
                              <figure>
<!--                                 <a href="<?php the_permalink(); ?>" title="<?php the_title(); ?>"> -->
                                  <?php the_post_thumbnail(array(250,180),array('class' => 'img-responsive')); ?>
<!--                                 </a> -->
                              </figure>
                          <?php endif; ?>    <!-- /post thumbnail -->                  
                      </div>
                      
                      <div class="col-md-9 div-productos">

                                <div class="row-fluid">

                                    <?php the_content(); ?>

                                </div>  <!-- /row-fluid -->

                      </div>

                    <div class="bottom-thumbnail"> <img src=" <?php echo IMAGES; ?>/bottom-producto-thumbnail.png" alt="" class="img-responsive"> </div>
                </div>  <!-- /row-fluid -->

            </div> <!-- /thumbnail producto -->

<!--               <p class="text-center"><button type="button" class="btn btn-default">Inicio</button></p> -->

<!-- 
            <ul class="pager">
              <li class="previous">
                 &laquo; <?php // previous_post_link('%link') ?>
               </li>
              <li class="next">
                &raquo; <?php // next_post_link('%link'); ?>
             </li>
            </ul>

 -->            
        <h4><?php edit_post_link(); ?></h4>

           </article>

          <?php endwhile; ?>
          <?php else: ?>
              <!-- article -->
              <article>
                  <h2><?php _e( 'Sorry, nothing to display.'); ?></h2>
              </article>
              <!-- /article -->
          <?php endif; ?>

<br>
</div> <!-- /container -->


<?php get_footer (); ?>


