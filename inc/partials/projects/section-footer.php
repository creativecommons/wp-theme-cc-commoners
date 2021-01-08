<section class="platform-footer has-background-dark-slate-blue padding-top-xl has-text-white">
  <div class="container">
    <?php 
      $footer_title = get_post_meta( get_the_ID(), 'platforms_bottom_title', true );
      if ( !empty( $footer_title ) ):
     ?>
    <div class="columns">
      <div class="column">
        <h1><?php echo $footer_title; ?></h1>
      </div>
    </div>
    <?php endif; ?>
    <div class="columns">
      <div class="column is-5">
        <?php 
          $buttons = Commoners::get_platform_footer_buttons( get_the_ID() );
          if ( !empty( $buttons ) ) {
            foreach ( $buttons as $button ) {
              echo '<div class="button-container">';
                if ( !empty( $button['button_title'] ) ) {
                  echo '<h4>'.$button['button_title'].'</h4>';
                }
                if ( !empty( $button['button_description'] ) ) {
                  echo '<p class="body-small">'.$button['button_description'].'</p>';
                }
                if ( !empty( $button['button_url'] ) ) {
                  $button_text = ( !empty( $button['button_text'] ) ) ? $button['button_text'] : 'View more';
                  echo Components::button( $button_text, $button['button_url'], 'small', 'is-primary', false );
                }
              echo '</div>';
            }
          }
         ?>
      </div>
      <div class="column is-7">
        <?php 
          $bottom_content = get_post_meta( get_the_ID(), 'platforms_right_column', true );
          if ( !empty( $bottom_content ) ) {
            echo apply_filters( 'the_content', $bottom_content );
          }
         ?>
      </div>
    </div>
  </div>
    <?php 
      $bottom_image = get_post_meta( get_the_ID(), 'platforms_bottom_image', true );
      if ( !empty( $bottom_image ) ) {
        echo '<figure class="bottom-image">';
          echo Commoners::homepage_image( $bottom_image, 'landscape-medium' );
        echo '</figure>';
      }
     ?>
  </figure>
</section>