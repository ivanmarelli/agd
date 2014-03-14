


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
                   <strong>Ops!</strong> No hay productos con: "<strong><?php echo get_search_query(); ?></strong>". Por favor, intente nuevamente.
                </div>

              </article>
              <!-- /article -->
          <?php endif; ?>



