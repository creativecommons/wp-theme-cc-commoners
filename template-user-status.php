<?php
/**Template name: User status*/
get_header();
the_post();
$level              = ccgn_current_user_level();
$logged_in          = is_user_logged_in();
$user_id            = get_current_user_id();
$user_status        = ccgn_registration_user_get_stage_and_date( $user_id );
$application_status = ccgn_show_current_application_status( $user_id );
$step               = array();
$step[1]            = ( $application_status['step']['step'] == 1 ) ? $application_status['step']['class'] : 'is-hidden';
$step[2]            = ( $application_status['step']['step'] == 2 ) ? $application_status['step']['class'] : 'is-hidden';
$step[3]            = ( $application_status['step']['step'] == 3 ) ? $application_status['step']['class'] : 'is-hidden';

?>
<section class="main-content">
	<?php
		get_template_part( 'inc/partials/entry/page', 'header' );
	?>
	<div class="container">
		<section class="entry-content page-content margin-vertical-larger">
			<div class="columns">
				<div class="column is-12">
					<div class="content text-format">
						<?php the_content(); ?>
					</div>
					<div class="user-status-container columns is-centered">
						<?php if ( $logged_in ) : ?>
							<?php if ( $user_status['stage'] == 'accepted' ) : ?>
							<div class="column is-half">
								<div class="card entry-post entry-status horizontal">
									<div class="card-content">
										<span class="subtitle">Application Approved</span>
										<h4 class="card-title">You're now a member</h4>
									</div>
								</div>
							</div>
							<?php else : ?>
							<div class="column is-half <?php echo $step[1]; ?>">
								<div class="content">
									<article class="card entry-post entry-status horizontal">
										<div class="card-content">
											<span class="subtitle">Application Incomplete</span>
											<h4 class="card-title">Create Account && Select vouchers</h4>
											<p class="content">Your application is still incomplete. You need to update the information provided or update the names of the vouchers</p>
											<?php if ( $application_status['step']['step'] == 1 ) : ?>
												<p class="entry-status-content">
													<span class="subtitle">Your current status</span>
													<span class="status-text"><?php echo $application_status['step']['msg']; ?></span>
													<small class="update-date">
														Last updated: <?php echo date( 'Y-m-d', strtotime( $application_status['date'] ) ); ?>
													</small>
													<?php if ( ! empty( $application_status['step']['link'] ) ) : ?>
														<a href="<?php echo $application_status['step']['link']; ?>" class="button status-action"><?php echo $application_status['step']['link_text']; ?></a>
													<?php endif; ?>
												</p>
											<?php endif; ?>
											</div>
									</article>
								</div>
							</div>
							<div class="column is-half <?php echo $step[2]; ?>">
								<article class="card entry-post entry-status horizontal">
									<div class="card-content">
										<span class="subtitle">Not yet vouched</span>
										<h4 class="card-title">Wait for Vouchers</h4>
										<p class="content">Your application is not yet vouched. The members you selected to vouch for your application still do not respond</p>
										<?php if ( $application_status['step']['step'] == 2 ) : ?>
											<p class="entry-status-content">
												<span class="subtitle">Your current status</span>
												<span class="status-text"><?php echo $application_status['step']['msg']; ?></span>
												<small class="update-date">
													Last updated: <?php echo date( 'Y-m-d', strtotime( $application_status['date'] ) ); ?>
												</small>
												<?php if ( ! empty( $application_status['step']['link'] ) ) : ?>
													<a href="<?php echo $application_status['step']['link']; ?>" class="button status-action"><?php echo $application_status['step']['link_text']; ?></a>
												<?php endif; ?>
											</p>
										<?php endif; ?>
									</div>
								</article>
							</div>
							<div class="column is-half <?php echo $step[3]; ?>">
								<article class="card entry-post entry-status horizontal">
									<div class="card-content">
										<span class="subtitle">Under review</span>
										<h4 class="card-title">Final Approval</h4>
										<p class="entry-content">Your application has been vouched and now it’s under review from the Membership Council. Please be patient! It shouldn’t take very long.</p>
										<?php if ( $application_status['step']['step'] == 3 ) : ?>
											<p class="entry-status-content">
												<span class="subtitle">Your current status</span>
												<span class="status-text"><?php echo $application_status['step']['msg']; ?></span>
												<small class="update-date">
													Last updated: <?php echo date( 'Y-m-d', strtotime( $application_status['date'] ) ); ?>
												</small>
												<?php if ( ! empty( $application_status['step']['link'] ) ) : ?>
													<a href="<?php echo $application_status['step']['link']; ?>" class="button status-action"><?php echo $application_status['step']['link_text']; ?></a>
												<?php endif; ?>
											</p>
										<?php endif; ?>
									</div>
								</article>
							</div>
						</div>
						<?php endif; ?>
						<?php else : ?>
						<div class="callout warning">
							<h5 class="title">Logged in</h5>
							<p>You have to log in in to see your Application status</p>
						</div>
						<?php endif; ?>
					</div>
				</div>
			</div>
		</section>
	</div>
</section>
<?php get_footer(); ?>
