<?php get_header (); ?>

<div class="container">
<br>

	<article>
		<h1 class="post-title">Contenido no encontrado</h1>

      <div class="row">

        <div class="col-md-10">
        	<div class="alert alert-warning alert-dismissable">
			  <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
			  <strong>Ops!</strong> Parece que no se encontró nada en este lugar.<br> <strong>Intenta una búsqueda:</strong>
			</div>

			<div class="row">
				<div class="col-md-6">
	               <form class="form-inline"  role="search" method="get" id="searchform" action="<?php echo home_url( '/' ); ?>">
	                  <div class="input-group">
	                    <input class="form-control" type="search" name="s" placeholder="Ingresar palabra">
	                    <span class="input-group-btn">
	                      <button class="btn btn-default" type="submint"  type="button">Buscar</button>
	                    </span>
	                  </div><!-- /input-group -->
	                </form>
				</div>
			</div>

        </div> <!-- /col-md-10 -->

       </div><!-- /row -->

	</article>

<br>
</div>  <!-- /fin container -->

<?php get_footer (); ?>





