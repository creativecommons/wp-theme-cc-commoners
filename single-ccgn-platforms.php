<?php
  get_header();
  the_post();
?>
<section class="main-content">
	<?php
	$description = get_post_meta( get_the_ID(), 'platforms_description_text', true );
	$images      = get_post_meta( get_the_ID(), 'platforms_gallery', false );
	if ( ! empty( $images ) ) :
		$image_count   = count( $images );
		$class_columns = ( $image_count > 0 ) ? ' total-cols-' . $image_count : '';
		?>
  <section class="platform-featured">
	<div class="grid-container<?php echo $class_columns; ?>">
		<?php echo Commoners::featured_gallery( $images ); ?>
	</div>
  </section>
	<?php endif; ?>
  <div class="container">
	<div class="columns is-centered">
	  <div class="column is-10 padding-xxl has-background-white move-up pre-content">
		<header class="entry-header">
	<?php
	if ( function_exists( 'yoast_breadcrumb' ) ) {
		yoast_breadcrumb( '<p id="breadcrumbs">', '</p>' );
	}
	?>
		  <h1><?php the_title(); ?></h1>
			<?php if ( ! empty( $description ) ) : ?>
		  <div class="platform-description content margin-top-big">
				<?php echo apply_filters( 'the content', wpautop( $description ) ); ?>
		  </div>
			<?php endif; ?>
		</header>
	  </div>
	</div>
	<div class="columns">
	  <div class="column is-7">
		<div class="content body-big">
			<?php the_content(); ?>
		</div>
	  </div>
	  <div class="column is-5">
		<aside class="platform-sidebar">
			<?php dynamic_sidebar( 'single-platform' ); ?>
		</aside>
	  </div>
	</div>
  </div>
	<?php get_template_part( 'inc/partials/projects/section', 'projects' ); ?>
	<?php get_template_part( 'inc/partials/projects/section', 'resources' ); ?>
	<?php get_template_part( 'inc/partials/projects/section', 'footer' ); ?>
</section>
<?php get_footer(); ?>
