<?php 
/* Template Name: Logged in content page */
    get_header(); 
    the_post();
?>
<section class="main-content">
    <div class="grid-container">
        <div class="grid-x grid-padding-x align-center">
              <div class="cell large-8 medium-8">
                  <header class="entry-header page-header">
                      <h1 class="entry-title"><?php the_title() ?></h1>
                  </header>
                  <section class="entry-content page-content">
                      <?php 
                          if ( is_user_logged_in() ) {
                            the_content();
                          } else {
                            echo '<div class="callout warning">';
                              echo '<h5 class="title">Sorry</h5>';
                              echo '<p>You have to be logged in to see this content</p>';
                            echo '</div>';
                          }
                      ?>
                  </section>
              </div>
        </div>
    </div>
</section>
<?php get_footer(); ?>