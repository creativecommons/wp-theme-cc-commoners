<?php
/*Template name: CCGN Members*/
get_header();
$search = new members_search();
$paged  = ( get_query_var( 'paged' ) ) ? get_query_var( 'paged' ) : 1;
if ( get_query_var( 'paged' ) ) {
	$search->set_page( get_query_var( 'paged' ) );
}
if ( isset( $_GET['action'] ) ) {
	if ( isset( $_GET['search'] ) ) {
		$search->set_search_text( esc_attr( $_GET['search'] ) );
	}
	if ( isset( $_GET['country'] ) ) {
		$search->set_country( esc_attr( $_GET['country'] ) );
	}
	if ( isset( $_GET['languages'] ) ) {
		$search->set_country( esc_attr( $_GET['languages'] ) );
	}
}

$query       = $search->search();
$member_list = $query->get_results();
?>
<section class="main-content">
	<?php
	global $post;
	get_template_part( 'inc/partials/entry/page', 'header' );
	?>
	<div class="container">
		<div class="widget big-search">
			<form action="" method="GET" class="search-users-form">
				<div class="columns">
					<div class="column is-4 is-full-touch">
						<div class="field">
							<div class="control has-icons-left">
								<input type="text" name="search" class="input" <?php echo ( isset( $_GET['search'] ) ) ? 'value="' . esc_attr( $_GET['search'] ) . '"' : ''; ?> placeholder="<?php echo __( 'Member name', 'cc-commoners' ); ?>">
								<input type="hidden" name="action" value="search">
								<span class="icon is-small is-left">
									<i class="icon search"></i>
								</span>
							</div>
						</div>
					</div>
					<div class="column is-3 is-full-touch">
						<div class="control">
							<div class="select">
								<?php
								$field_address = new GF_Field_Address();
								$countries     = $field_address->get_countries();
								echo '<select name="country" id="country">';
								echo '<option value="">Select country</option>';
								foreach ( $countries as $country ) {
									$selected = ( isset( $_GET['country'] ) && ( $_GET['country'] == $country ) ) ? ' selected="selected"' : '';
									echo '<option value="' . $country . '"' . $selected . '>' . $country . '</option>';
								}
								echo '</select>';
								?>
							</div>
						</div>
					</div>
					<div class="column is-2 is-full-touch">
						<div class="control">
							<div class="select">
								<select name="application_type" id="application-type">
									<option value="">All Members</option>
									<option value="individual" <?php echo ( isset( $_GET['application_type'] ) && ( $_GET['application_type'] == 'individual' ) ) ? ' selected="selected" ' : ''; ?>>Individual Members</option>
									<option value="institutional" <?php echo ( isset( $_GET['application_type'] ) && ( $_GET['application_type'] == 'institutional' ) ) ? ' selected="selected" ' : ''; ?>>Institutional Members</option>
								</select>
							</div>
						</div>
					</div>
					<div class="column is-1 is-full-touch">
						<div class="control">
							<input type="submit" class="submit-form button is-link" value="Search">
						</div>
					</div>
					<div class="column is-2 is-flex is-align-items-center">
						<a href="<?php echo site_url( 'members' ); ?>" class="button is-text"><?php echo __( 'Clear results', 'cc-commoners' ); ?></a>
					</div>
				</div>
			</form>
		</div>
	</div>
	<div class="entry-content padding-vertical-larger">
		<div class="container">
			<?php
			if ( ! empty( $member_list ) ) {
				echo '<div class="columns is-multiline">';
				foreach ( $member_list as $member ) {
					echo render::member_single( $member );
				}
				echo '</div>';
				$total_user  = $query->total_users;
				$total_pages = ceil( $total_user / $search->get_total_per_page() );
				echo '<div class="custom-pagination margin-vertical-bigger">';
				echo '<nav class="pagination" role="navigation" aria-label="pagination">';
				echo paginate_links(
					array(
						'base'      => add_query_arg( 'paged', '%#%' ),
						'format'    => '',
						'current'   => $paged,
						'total'     => $total_pages,
						'prev_text' => '<i class="icon chevron-left"></i>',
						'next_text' => '<i class="icon chevron-right"></i>',
						'type'      => 'list',
					)
				);
				echo '</nav>';
				echo '</div>';
			} else {
				echo '<div class="callout warning">';
				echo '<h5>No results</h5>';
				echo '<p>Sorry, no results for your search criteria </p>';
				echo '</div>';
			}
			?>
		</div>
	</div>
</section>
<?php get_footer(); ?>
