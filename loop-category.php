
    <div class="row-fluid">

        <?php 
          $categorias = get_categories('hide_empty=0&exclude=1&amp;');
          foreach ( $categorias as $categoria ):
        ?>

            <div class="col-sm-6 col-md-3">
                <div class="thumbnail">
                  <div class="caption">
                      <?php
                       echo '<a href="'.get_category_link( $categoria->term_id ).'" title="Ver los productos en: '. $categoria->cat_name . '"><h3>'.$categoria->cat_name.'</h3></a>';
                      ?>
                  </div>
                       <?php 
                         echo '<a href="'.get_category_link( $categoria->term_id ).'" title="Ver los productos en: '. $categoria->cat_name . '">';
                          echo '<img src="'.IMAGES.'/cat_' . $categoria->cat_ID . '.jpg" alt="' . $categoria->cat_name . '" class="img-responsive"  /></a>'; 
                       ?>         
                      <?php 
                         echo '<a href="'.get_category_link( $categoria->term_id ).'" title="Ver los productos en: '. $categoria->cat_name . '">';
                       ?>
                      <p class="text-right"><small>Ver productos </small><img src=" <?php echo IMAGES ?>/mas.png" alt="Ver producto"> </p>
                      </a>
                   <div class="bottom-thumbnail"> <img src=" <?php echo IMAGES ?>/bottom-thumbnail.png" alt=""> </div>
                </div> <!-- /thumbnail -->
              </div>   <!-- /producto -->

        <?php

           endforeach;
  
        ?>

    </div> <!-- /row -->
