<?php 
$projects = Commoners::get_related_projects( get_the_ID() );
if ( !empty( $projects ) ):
?>
  <section class="projects has-tiled-background margin-vertical-xl">
    <div class="container">
      <div class="columns">
        <div class="column">
          <h2>Initiatives and projects</h2>
        </div>
      </div>
      <div class="grid-container total-cols-3">
      <?php
        foreach ( $projects as $project ) {
          echo '<div class="cell">'; 
            echo Components::card_post( $project->ID, true, false, false, false, true, false, false, false, false, false, false, false, false, 'vertical', 'View more', 'small', 'is-text' );
          echo '</div>';
        }
      ?>
      </div>
    </div>
  </section>
<?php endif; ?>