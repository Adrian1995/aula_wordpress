<?php
/*
Plugin Name: Slide do torne-se um programador.
Description: Plugin para adicionar slide a home.
Author: Adrian Medeiros.
*/


function criar_custom_post_slides(){

	$args_slides_post_type = array(
		'labels' => array('name' => 'Slides'),
		'public' => false,
		'exclude_from_search' => true,
		'publicly_queryable' => true,
		'show_ui' => true,
		'supports' => array('title','excerpt','thumbnail'),
		'register_meta_box_cb' => 'slides_meta_box'  );

	register_post_type( 'slide_tornese' , $args_slides_post_type );
}
add_action( 'init' , 'criar_custom_post_slides');


function slides_meta_box(){
	add_meta_box( 'campos_slides', __('Informações'), 'campos_slides', 'slide_tornese', 'side', 'high' );
}

function campos_slides(){
	global $post;
	$slide_link = get_post_meta( $post->ID, 'slide_link', true );
	?>
	<br>
	<label for="slide_link">Link: </label>
	<input type="text" name="slide_link" id="slide_link" value="<?php echo $slide_link; ?>">
	<br>
	<?php
}

function salvar_campos_slides(){
	global $post;
	update_post_meta( $post->ID, 'slide_link', $_POST['slide_link'] );
}
add_action( 'save_post' , 'salvar_campos_slides' );



function add_bx_slider() {
    wp_enqueue_style( 'style-name', get_stylesheet_directory_uri().'/plugins/slide-tornese/bxslider/jquery.bxslider.css' );
    wp_enqueue_script( 'script-name', get_stylesheet_directory_uri().'/plugins/slide-tornese/bxslider/jquery.bxslider.min.js', array('jquery'), '1.0.0', true );
}
add_action( 'wp_enqueue_scripts', 'add_bx_slider' );




function add_slides( $atts ){

	$html = "";

	$args_slides = array(
		'post_type' => 'slide_tornese'
	);

	$the_query_post = new WP_Query( $args_slides );

	if ( $the_query_post->have_posts() ) {

		$html .= "<ul class='bxslider'>";
		while ( $the_query_post->have_posts() ) {
			$the_query_post->the_post();
			$imgurl = wp_get_attachment_image_src(get_post_thumbnail_id(), 'full', true);

			if( !empty($imgurl[0]) ){ 
				$html .= "<li><img src='".$imgurl[0]."' title='".get_the_title().': '.get_the_excerpt()."' /></li>";
			}		
		}	
		$html .= "</ul>";

		$html .= "<script>";
		$html .= "jQuery(document).ready(function(){";
		  $html .= "jQuery('.bxslider').bxSlider({adaptiveHeight: true, captions: true});";
		$html .= "});";
		$html .= "</script>";
	}

	return $html;
}
add_shortcode( 'slides', 'add_slides' );