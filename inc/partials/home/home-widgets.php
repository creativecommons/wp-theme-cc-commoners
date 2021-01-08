<?php if ( is_active_sidebar( 'homepage-sidebar' ) ): ?>
<section class="homepage-widgets">
  <div class="container">
    <?php dynamic_sidebar( 'homepage-sidebar' ); ?>
  </div>
</section>
<?php endif; ?>