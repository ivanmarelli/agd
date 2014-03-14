


    <div class="row">
      <div class="col-md-7">

        <h1>
          <?php 
          if ( is_category() ) {
              im_category_breadcrumb();
            }
           ?>
        </h1>

      </div>  <!-- /col-md-7 -->
       
      <?php 

          if ( is_category() ) {

      ?>

      <div class="col-md-5">
        <ul id="myTab" class="nav nav-tabs pull-right">
          <li class="active"><a href="#especificaciones" data-toggle="tab">ESPECIFICACIONES TÉCNICAS</a></li>
          <li class=""><a href="#info" data-toggle="tab">INFORMACION DEL PRODUCTO</a></li>
        </ul>
      </div> <!-- /col-md-4 -->
    
    </div> <!-- /row -->


    <div id="TablaProductos" class="tab-content">

      <div class="tab-pane fade active in" id="especificaciones">

      <?php

          }

      ?>

          <?php if (have_posts()): while (have_posts()) : the_post(); ?>
              <!-- article -->
<!--               <article id="post-<?php the_ID(); ?>" <?php post_class(); ?>> -->

                <div class="thumbnail producto" id="producto">
                  <div class="caption">
                    <a href="<?php the_permalink(); ?>" title="<?php the_title(); ?>" >
                       <h3>
                          <?php the_title(); ?>
                        </h3>
                    </a>
                  </div>

                  <div class="row" id="table-producto">
                        <div class="col-md-3">
                           <?php if ( has_post_thumbnail()) :  ?>
                                <figure>
                                  <a href="<?php the_permalink(); ?>" title="<?php the_title(); ?>">
                                    <?php the_post_thumbnail(array(250,180),array('class' => 'img-responsive')); ?>
                                  </a>
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
              


              </article>
             <!-- /article -->
          <?php endwhile; ?>
          <?php else: ?>
              <!-- article -->
              <article>
                <div class="alert alert-warning alert-dismissable">
                   <strong>Ops!</strong> No hay productos en esta categoría.
                </div>

              </article>
              <!-- /article -->
          <?php endif; ?>

      <?php 
         wp_reset_postdata(); 
         wp_reset_query(); 
       ?>

                 

      </div> <!-- /tab-pane especificaciones -->



      <div class="tab-pane fade" id="info">

              <?php get_template_part ('page_info'); ?>

      </div> <!-- /tab-pane info -->

    </div> <!-- /#TablaProductos .tab-content -->

