<?php
	get_header();
	the_post();
	global $post;
	$chapter_lead = get_post_meta( $post->ID, 'cc_chapters_chapter_lead', false );
	$date_founded = $post->cc_chapters_date;
	$chapter_mail = $post->cc_chapters_email;
	$member_gnc   = $post->cc_chapters_member_gnc;
	$external_url = $post->cc_chapters_url;
	$chapter_url  = $post->cc_chapters_chapter_url;
	$meeting_url  = $post->cc_chapters_meeting_url;
	$mailing_list = $post->cc_chapters_mailing_list;
?>
 <section class="main-content">
	<header class="entry-header chapter-header has-tiled-background padding-vertical-big">
		<div class="container">
		<?php
		if ( function_exists( 'yoast_breadcrumb' ) ) {
			yoast_breadcrumb( '<p id="breadcrumbs">', '</p>' );
		}
		?>
			<h1 class="title"><?php the_title(); ?></h1>
			<span class="subtitle title is-4"><?php echo __( 'Founded', 'cc-commoners' ) . ': ' . mysql2date( CC_Site::get_date_format(), $date_founded ); ?></span>
		</div>
	</header>
	<?php
	if ( has_post_thumbnail() ) {
		echo '<div class="chapter-image-container">';
			echo '<figure class="chapter-image">';
			$post_thumbnail_id = get_post_thumbnail_id( $post->ID );
			echo CC_Site::image_with_caption( $post_thumbnail_id, 'landscape-medium' );
			echo '</figure>';
		echo '</div>';
	}
	?>
	<div class="container">
		<div class="columns">
			<div class="column is-7">
				<div class="content padding-vertical-big">
					<?php the_content(); ?>
				</div>
				<div class="columns">
					<?php
					if ( ! empty( $external_url ) ) {
						echo '<div class="column text-center">';
							echo '<a href="' . esc_url( $external_url ) . '" target="_blank" class="button is-primary small">' . __( 'Social media', 'cc-commoners' ) . '</a>';
						echo '</div>';
					}
					if ( ! empty( $chapter_url ) ) {
						echo '<div class="column text-center">';
							echo '<a href="' . esc_url( $chapter_url ) . '" target="_blank" class="button is-primary small">' . __( 'Chapter website', 'cc-commoners' ) . '</a>';
						echo '</div>';
					}
					if ( ! empty( $mailing_list ) ) {
						echo '<div class="column text-center">';
							echo '<a href="' . esc_url( $mailing_list ) . '" target="_blank" class="button is-primary small">' . __( 'Mailing list', 'cc-commoners' ) . '</a>';
						echo '</div>';
					}
					if ( ! empty( $meeting_url ) ) {
						echo '<div class="column text-center">';
							echo '<a href="' . esc_url( $meeting_url ) . '" target="_blank" class="button is-primary small">' . __( 'Meeting', 'cc-commoners' ) . '</a>';
						echo '</div>';
					}
					?>
				</div>
				<?php
					echo '<div class="columns chapter-leads padding-vertical-bigger">';
				if ( ! empty( $chapter_lead ) ) {
					foreach ( $chapter_lead as $chapter_lead_id ) {
						echo render::chapter_member( $chapter_lead_id, __( 'Chapter Lead', 'cc-commoners' ) );
					}
				}
				if ( ! empty( $member_gnc ) ) {
					echo render::chapter_member( $member_gnc, __( 'Representative to the Global Network Council', 'cc-commoners' ) );
				}
					echo '</div>';

				?>
			</div>
		</div>
	</div>

	<?php get_footer(); ?>
