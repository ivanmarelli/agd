<?php

@ini_set( 'upload_max_size' , '64M' );
@ini_set( 'post_max_size', '64M');
@ini_set( 'max_execution_time', '300' );

require_once('wp_bootstrap_navwalker.php');

define ( 'TEMPPATH', get_bloginfo('stylesheet_directory') );
define ( 'IMAGES', TEMPPATH. "/img" );

add_theme_support ('nav-menus');
add_theme_support('automatic-feed-links');
add_theme_support ('post-thumbnails');
add_action('init', 'im_pagination'); //
add_filter('show_admin_bar', 'remover_admin_bar');

add_image_size('large', 1024, '', 330); // Thumbnail Grande
add_image_size('medium', 300, '', true); // Thumbnail Medio
add_image_size('small', 150, '', true); // Thumbnail Chico
add_image_size('custom-size', 800, 600, true); // Thumbnail Customizado - Indicar el tamaño con: the_post_thumbnail('custom-size');


if (function_exists('register_nav_menus'));
	register_nav_menus( array(
			'main' => 'Main nav'
	) );


if ( function_exists('register_sidebar'))
	register_sidebars ( array(
	'name' 			=> __('Primary Sidebar', 'primary-sidebar'),
	'id'   			=> 'primary-widget-area',
	'description'	=> __('The primary widget area', 'dir'),
	'before_widget' => '<div class="widget>',
	'after_widget'	=> '</div>',
	'before_title' 	=> '<h3 class="widget-title">',
	'after_title' 	=> '</h3>',
	)
);

function im_pagination() {
    global $wp_query;
    $big = 999999999;
    echo paginate_links(array(
        'base'      => str_replace($big, '%#%', get_pagenum_link($big)),
        'format'    => '?paged=%#%',
        'current'   => 0,
        'show_all'  => True,
        'prev_next'    => True,
        'prev_text' => __('&larr;'),
        'next_text' => __('&rarr;'),
        'type'      => 'list',
        'total'     => $wp_query->max_num_pages
    ));
}

function wp_im_bootstrap_pagination( $query=null ) {

  global $wp_query;

  $query = $query ? $query : $wp_query;

  $big = 999999999;

  $paginate = paginate_links( array(
    'base' => str_replace( $big, '%#%', esc_url( get_pagenum_link( $big ) ) ),
    'type' => 'array',
    'total' => $query->max_num_pages,
    'format' => '?paged=%#%',
    'current' => max( 1, get_query_var('paged') ),
    'prev_text' => __('&laquo;'),
    'next_text' => __('&raquo;'),
    )
  );
  if ($query->max_num_pages > 1) :
?>
<div class="text-center">
    <ul class="pagination">
      <?php
      foreach ( $paginate as $page ) {
        echo '<li>' . $page . '</li>';
      }
      ?>
    </ul>
</div>
<?php
  endif;
}


function im_bootstrap_nav() {
    wp_nav_menu( array(

		'theme_location'  => '',
		'menu'            => '',
		'container'       => '',
		'container_class' => '',
		'container_id'    => '',
		'menu_class'      => '',
		'menu_id'         => '',
		'echo'            => true,
		'fallback_cb'     => 'wp_page_menu',
		'before'          => '',
		'after'           => '',
		'link_before'     => '',
		'link_after'      => '',
		'items_wrap'      => '<ul id="%1$s" class="nav nav-pills navbar-right">%3$s</ul>',
		'depth'           => 0,
      	'walker' => new wp_bootstrap_navwalker())
    );
}


function remover_admin_bar() {
    return false;
}


function im_wp_excerpt($length_callback = '', $more_callback = '') {
    global $post;
    if (function_exists($length_callback)) {
        add_filter('excerpt_length', $length_callback);
    }
    if (function_exists($more_callback)) {
        add_filter('excerpt_more', $more_callback);
    }
    $output = get_the_excerpt();
    $output = apply_filters('wptexturize', $output);
    $output = apply_filters('convert_chars', $output);
    $output = '<p>' . $output . '</p>';
    echo $output;
}

function im_wp_custom_post($length) {
    return 15;
}

function wp_get_attachment( $attachment_id ) {

    $attachment = get_post( $attachment_id );
    return array(
        'alt' => get_post_meta( $attachment->ID, '_wp_attachment_image_alt', true ),
        'caption' => $attachment->post_excerpt,
        'description' => $attachment->post_content,
        'href' => get_permalink( $attachment->ID ),
        'src' => $attachment->guid,
        'title' => $attachment->post_title
    );
}

function functions_indicators() {
    $special_gallery = get_post_gallery( $post, false );
    $ids = explode( ",", $special_gallery['ids'] );
    $html = '<ol class="carousel-indicators">';
    foreach( $ids as $id ) {
        $link   = wp_get_attachment_url( $id );
        $class = ( $i == 0 ) ? 'active ' : '';
        $i++;
        $b=1;
        $html .= '<li data-target="#carousel-post" data-slide-to="'.($i - $b).'" '. 'class="'.$class.'"></li>';
    }
    $html .= '</ol>';
    echo $html;
}

function function_slides() {
    $special_gallery = get_post_gallery( $post, false );
    $ids = explode( ",", $special_gallery['ids'] );
    $html = '<div class="carousel-inner">';
    foreach( $ids as $id ) {
        $link   = wp_get_attachment_url( $id );
        $attachment_meta = wp_get_attachment($id);
        $class = ( $i == 0 ) ? 'active ' : '';
        $i++;
        $html .= '<div class="item '.$class. '"><img src="' . $link . '">' . '<div class="carousel-caption"><h4>'.$attachment_meta['title'].'</h4><p>'.$attachment_meta['description']. '</p></div></div>';
    }
    $html .= '</div>';
    echo $html;
}

function functions_slide_indicator($post) {
    $special_gallery = get_post_gallery( $post, false );
    $ids = explode( ",", $special_gallery['ids'] );
    $formats = array(
        'indicator' => '<li data-target="#im-carousel-post" data-slide-to="%d"></li>',
        'slide'     => '<div class="item"><img src="%s"><div class="carousel-caption"><h4>%s</h4><p>%s</p></div></div>'
    );
    $html = array(
        'indicator' => '<ol class="carousel-indicators"><li data-target="#im-carousel-post" data-slide-to="0" class="active"></li>',
        'slide'     => '<div class="carousel-inner">'
    );
    $link= wp_get_attachment_url($ids[0]);//get data for first id, not in loop
    $attachment_meta = wp_get_attachment($ids[0]);
    $html['slide'] .= sprintf(str_replace('<div class="item"', '<div class="active item"', $formats['slide']), $link, $attachment_meta['title'], $attachment_meta['description']);
    for($i = 1, $j = count($ids);$i<$j;$i++)
    {//start at 1, not 0, so no active class in here
        $link   = wp_get_attachment_url( $ids[$i] );
        $attachment_meta = wp_get_attachment($ids[$i]);
        $html['indicator'] .= sprintf($formats['indicator'], $i);// no need to increment/decrement it here, it'll be the value you need
        $html['slide'] .= sprintf($formats['slide'],$link, $attachment_meta['title'], $attachment_meta['description']);
    }
    $html['indicator'] .= '</ol>';
    $html['slide'] .= '</div>';//close markup
    return $html;//return array
}


function im_breadcrumb() 
{
    if (!is_home()) 
    {
        echo '<ul class="breadcrumb">';
        echo '<li><a href="';
        echo get_option('home');
        echo '">';
        echo "Inicio";
//        bloginfo('name');
        echo '</a><span class="divider"> &raquo; </span></li>';
        if (is_category() || is_single()) 
            {
            if (is_category()) {
                echo ' Categoría: ';
            }
            the_category(' <span> &raquo; </span> ');
            if (is_single()) 
            {
                echo ' <span> &raquo; </span> ';
                the_title();
            } elseif (is_page()) {
                echo the_title();
            }
        }
        echo '</ul>';
    }
}

function im_category_breadcrumb() 
{
    if (!is_home()) 
    {
        echo '<ul class="breadcrumb">';
        echo '<li><a href="';
        echo get_option('home');
        echo '">';
        echo "Productos";
//        bloginfo('name');
        echo '</a><span class="divider"> &raquo; </span> </li>';
          $category         =    get_the_category(); 
          $categoryName     =    $category[0]->cat_name;
//          $categoryLink     =    get_category_link( $category->term_id);

        if (is_category() || is_single()) 
            {
//            the_category(' <span> &raquo; </span> ');
//        echo '<li><a href="';
//        echo $categoryLink;
//        echo '">';                
            echo " ".$categoryName;
//        echo '</a>';
        }
        echo '</ul>';
    }
}



function custom_login_logo() {
        echo '<style type="text/css">
        h1 a { background-image: url('.IMAGES.'/logo-admin.png) !important; }
        </style>';
}
add_action('login_head', 'custom_login_logo');

function irAlHome () {
    return home_url();
}

function custom_login_redirect($redirect_to, $request, $user) {
    global $user;
    if ( isset( $user->roles ) && is_array( $user->roles ) ) {
     
        if ( in_array( 'administrator', $user->roles ) )
            wp_redirect( home_url('/wp-admin/edit.php') );
//            wp_redirect( home_url('/productos') );

        elseif ( in_array( 'editor', $user->roles  ) )
            wp_redirect( home_url('/productos') );            

        elseif ( in_array( 'suscriptor', $user->roles ) )
            wp_redirect( home_url('/productos') );            

        else
            return home_url();
                 
    } else {
        return $redirect_to;
    }
}
add_filter( 'login_redirect', 'custom_login_redirect', 10, 3 );


function add_pages_meta_boxes() {
add_meta_box(   'tagsdiv-post_tag', __('Page Tags'), 'post_tags_meta_box', 'page', 'normal', 'default');
add_meta_box(   'categorydiv', __('Categories'), 'post_categories_meta_box', 'page', 'normal', 'default');
}
add_action('add_meta_boxes', 'add_pages_meta_boxes');

function attach_category_to_page() {
    register_taxonomy_for_object_type('category','page');
}
add_action('init','attach_category_to_page');

function buscador_mostrar_solo_posts($query)
{
    if ($query->is_search)
    {
        $query->set('post_type', 'post');
    }
    return $query;
}
add_filter('pre_get_posts', 'buscador_mostrar_solo_posts');


function shortcode_inicio_tablas_post() {
    return '<div class="col-md-6">
              <div class="table-responsive">
                  <table class="table">
                    <colgroup>
                      <col class="col-xs-5">
                      <col class="col-xs-3">
                    </colgroup>
                    <tbody>';
}
function shortcode_fin_tablas_post() {
    return '     </tbody> 
                </table> <!-- /table -->
              </div> <!-- /table-responsive -->
           </div> <!-- /col-md-6 -->';
}

function shortcode_inicio_columna() {
    return '<div class="col-md-6">';
}
function shortcode_fin_columna() {
    return '</div> <!-- /col-md-6 -->';
}


function shortcode_inicio_titulo_fila() {
    return '<tr><td><span class="titulo-table">';
}
function shortcode_fin_titulo_fila() {
    return '</span></td>';
}

function shortcode_inicio_valor_fila() {
    return '<td>';
}
function shortcode_fin_valor_fila() {
    return '</td></tr>';
}

//  shortcode Page
add_shortcode('inicioColumna', 'shortcode_inicio_columna');
add_shortcode('finColumna', 'shortcode_fin_columna');
//  shortcode Post
add_shortcode('inicioTabla', 'shortcode_inicio_tablas_post');
add_shortcode('finTabla', 'shortcode_fin_tablas_post');
add_shortcode('inicioTitulo', 'shortcode_inicio_titulo_fila');
add_shortcode('finTitulo', 'shortcode_fin_titulo_fila');
add_shortcode('inicioValor', 'shortcode_inicio_valor_fila');
add_shortcode('finValor', 'shortcode_fin_valor_fila');


add_shortcode('redirigir', 'redirigirUsuario');

function redirigirUsuario() {
    if ( is_user_logged_in() ) {
        wp_redirect( home_url('/productos') );
    } else {
        wp_redirect( home_url('/login') );
    }
}


function redirigirAproductos() {
    wp_redirect( home_url('/productos') );
}
function redirigirAlogin() {
    wp_redirect( home_url('/login') );
}


?>