<?php

function registra_widget_face(){
	register_widget( 'Widget_Facebook' );
}
add_action( 'widgets_init' , 'registra_widget_face' );


class Widget_Facebook extends WP_Widget {

	function __construct() {
		parent:: __construct(
			'Widget_Facebook',
			'Facebook',
			array( 'description' => 'Widget para do Facebook' )
		);
	}


	public function widget( $args, $instance ){
		?>
		<br>
		<br>
		<div class='widget-facebook'>
			<div id="fb-root"></div>
			<script>(function(d, s, id) {
			  var js, fjs = d.getElementsByTagName(s)[0];
			  if (d.getElementById(id)) return;
			  js = d.createElement(s); js.id = id;
			  js.src = "//connect.facebook.net/pt_BR/sdk.js#xfbml=1&version=v2.8&appId=882719548440754";
			  fjs.parentNode.insertBefore(js, fjs);
			}(document, 'script', 'facebook-jssdk'));</script>
			<div class="fb-page" data-href="https://www.facebook.com/torneseumprogramador/" data-tabs="timeline" data-small-header="false" data-adapt-container-width="true" data-hide-cover="false" data-show-facepile="true"><blockquote cite="https://www.facebook.com/torneseumprogramador/" class="fb-xfbml-parse-ignore"><a href="https://www.facebook.com/torneseumprogramador/">Projeto Torne-se um programador</a></blockquote></div>
		</div>
		<?php	
	}

	public function form( $instance ){
	}

	public function update( $new_instance, $old_instance ){
		$instance = array();
		return $instance;
	}





}