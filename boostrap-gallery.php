<!-- Silder Carousel  -->
<div id="im-carousel-post" class="carousel slide">

  <?php
    $content = functions_slide_indicator($post);
    echo $content['indicator'];//indicators
    echo $content['slide'];//carousel
   ?>

  <!-- Silder  Controls -->
  <a class="left carousel-control" href="#im-carousel-post" data-slide="prev">
    <span class="glyphicon glyphicon-chevron-left"></span>
  </a>
  <a class="right carousel-control" href="#im-carousel-post" data-slide="next">
    <span class="glyphicon glyphicon-chevron-right"></span>
  </a>
</div>
<!-- /carousel -->



