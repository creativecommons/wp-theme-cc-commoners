<header class="entry-header has-tiled-background padding-vertical-big">
  <div class="container">
	<?php
	if ( function_exists( 'yoast_breadcrumb' ) ) {
		yoast_breadcrumb( '<p id="breadcrumbs">', '</p>' );
	}
	?>
	<h1 class = 'title' > <?php echo Commoners::page_title(); ?></h1>
  </div>
	<?php
	if ( has_post_thumbnail( get_the_ID() ) && is_page() ) {
		echo '<div class="entry-thumbnail">';
		echo '<figure class="image">';
		the_post_thumbnail( 'portrait-page' );
		echo '</figure>';
		echo '</div>';
	}
	?>
</header>
