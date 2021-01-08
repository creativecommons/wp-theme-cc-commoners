<?php 
  $resources = Commoners::get_platform_resources( get_the_ID() );
  if ( !empty( $resources ) ) :
?>
<section class="project-resources margin-vertical-xl">
  <div class="container">
    <div class="columns">
      <div class="column">
        <h2>Resources</h2>
        <ul class="resources-list list">
          <?php 
          foreach( $resources as $resource ) {
            echo '<li class="list-item">';
              echo '<a href="'.$resource['resources_url'].'">';
                echo $resource['resources_name'];
              echo '</a>';
            echo '</li>';
          } 
          ?>
        </ul>
      </div>
    </div>
  </div>
</section>
<?php endif; ?>