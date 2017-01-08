<?php
get_header();
?>
<div class="container">
	<div class="col-md-3">
		<?php 
		$args = array(
			'public' => true
		);
		$post_types = get_post_types( $args, 'objects' );

		foreach ( $post_types as $post_type ) {
		   if( $post_type->name != 'attachment' ){
		   	echo '<a href="'.get_home_url().'/?s='.get_search_query().'&posttype='.$post_type->name.'">'.$post_type->labels->singular_name.'</a><br>';
		   }
		}
		?> 
	</div>
	<div class="col-md-9">
		<?php
		$args_search = array(
			's' => $_GET["s"]
		);

		if( $_GET["posttype"] ){
			$args_search["post_type"] = $_GET["posttype"];
		}

		$the_query_post = new WP_Query( $args_search );

		if ( $the_query_post->have_posts() ) {

			while ( $the_query_post->have_posts() ) {
				$the_query_post->the_post();
				
				echo get_the_title()."<br>";
			}
		}
		?>
	</div>
</div>
<?php
get_footer();
?>