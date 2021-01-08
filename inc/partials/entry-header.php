<header class="entry-header has-tiled-background padding-vertical-big">
    <div class="container">
        <h1 class="title"><?php echo Commoners::page_title(); ?></h1>
    </div>
    <?php 
      if ( has_post_thumbnail( get_the_ID() ) ) {
        echo '<div class="entry-thumbnail">';
          echo '<figure class="image">';
            the_post_thumbnail('portrait-page');
          echo '</figure>';
        echo '</div>';
      }
     ?>
</header>