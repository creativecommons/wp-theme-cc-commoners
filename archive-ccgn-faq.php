<?php 
  get_header();
  get_post();
  $faqs = Commoners::get_faq_with_section();
?>
<section class="main-content">
    <header class="entry-header chapter-header has-tiled-background padding-vertical-big">
        <div class="container">
            <h1 class="title"><?php echo Commoners::page_title(); ?></h1>
        </div>
    </header>
    <div class="container">
        <div class="columns">
            <div class="column is-4">
                <aside class="faq-list">
                    <nav class="side-navigation padding-vertical-large">
                        <?php 
                            foreach ($faqs as $items) {
                                echo '<h5 class="section-name">'.$items['term']->name.'</h5>';
                                echo '<ul class="list-pages">';
                                foreach ($items['posts'] as $entry) {
                                    echo '<li class="margin-vertical-small">';
                                        echo '<a href="#'.$entry->post_name.'">'.get_the_title($entry->ID).'</a>';
                                    echo '</li>';
                                }
                                echo '</ul>';
                            } 
                            
                        ?>
                    </nav>
                </aside>
            </div>
            <div class="column is-9">
                <?php 
                    foreach ($faqs as $items) {
                        echo '<h2 class="section-name padding-vertical-large">'.$items['term']->name.'</h2>';
                        echo '<section class="faq-entries margin-bottom-normal">';
                        foreach ($items['posts'] as $entry) {
                            echo '<article class="entry entry-faq">';
                                echo '<h3 class="b-header" id="'.$entry->post_name.'">'.get_the_title($entry->ID).'</h3>';
                                echo '<div class="entry-content padding-vertical-normal">';
                                    echo apply_filters( 'the_content', $entry->post_content );
                                echo '</div>';
                            echo '</article>';
                        }
                        echo '</section>';
                    } 
                    
                ?>
            </div>
        </div>
    </div>
</section>