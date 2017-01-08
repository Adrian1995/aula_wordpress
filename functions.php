<?php

require_once('custom-posts/cursos.php');
require_once('taxonomias/cidades.php');
require_once('widgets/ultimos-posts/ultimos-posts.php');
require_once('widgets/facebook/facebook.php');


add_theme_support( 'post-thumbnails' );

function registrar_menus() {
  register_nav_menu('menu-principal',__( 'Menu principal' ));
  register_nav_menu('menu-rodape',__( 'Menu rodapé' ));
}
add_action( 'init', 'registrar_menus' );


function registra_sidebar(){
	register_sidebar( array(
		'name'	=> 'Área antes do rodapé',
		'id' => 'antes-rodape',
		'description' => 'Insira widgets para aparecer antes do rodapé'
	));
	register_sidebar( array(
		'name'	=> 'Barra lateral',
		'id' => 'barra-lateral',
		'description' => 'Insira widgets para aparecer na barra lateral.'
	));
}

add_action( 'widgets_init' , 'registra_sidebar' );