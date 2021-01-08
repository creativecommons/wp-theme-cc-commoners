<?php
	/* Template name: CCGN Home Layout */
	get_header();
?>
	<section class="main-content">
		<?php
			get_template_part( 'inc/partials/home/home', 'featured' );
			get_template_part( 'inc/partials/home/home', 'platforms' );
      get_template_part( 'inc/partials/home/home', 'widgets' );
		?>
	</section>
<?php get_footer(); ?>
