<?php 
    get_header();
    get_post();
    global $_ccgnset;
    $settings = $_ccgnset->settings;
    $section_title = (!empty($settings['chapters_title'])) ? $settings['chapters_title'] : 'Chapters';
?>
<section class="main-content">
    <div class="container">
        <div class="columns">
            <div class="column">
                <header class="entry-header">
                    <h1 class="entry-title"><?php echo $section_title ?></h1>
                </header>
            </div>
        </div>
        <div class="columns">
            <div class="column is-7">
                <section class="entry-content">
                    <div class="post-content">
                        <?php echo apply_filters('the_content', $settings['chapters_content']); ?>
                    </div>
                </section>
            </div>
        </div>
        <div class="columns switch-buttons">
            <div class="column is-2">
                <div class="chapter-buttons">
                    <a href="#view-list" class="button is-text active">List view</a>
                    <a href="#view-map" class="button is-text">Map view</a>
                </div>
            </div>
        </div>
        <div class="world-map view-content is-hidden-mobile" id="view-map">
            <div class="view-switch show-for-large">
                <div class="columns">
                    <div class="column is-10">
                        <div class="map-header-content" id="chapters-map-header">
                            <div class="inline-container">
                                <h3 class="chapter-title"></h3>
                                <div class="chapter-metadata">
                                    <p class="chaper-lead-container">Chapter lead: <span class="chapter-lead-name"></span></p>
                                    <p><small>founded on <em class="chapter-date"></em> </small></p>
                                </div>
                                <a href="#" class="button is-warning small more">More information</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <?php get_template_part('inc/partials/maps/world','map'); ?>
            <div class="text-center"><em>Click in a highlighted country to get more information</em></div>
            <div id="country-name">
                <span class="chapter-title"></span>
            </div>
        </div>

                <div class="map-list view-content active" id="view-list">
                <header class="chapter-list">
                    <div class="search-chapter">
                        <input type="text" placeholder="Search a country" class="search-box" id="chapter-custom-search">
                    </div>
                    <?php 
                        if (!empty($settings['new_chapter_url'])):

                    ?>
                        <a href="<?php echo esc_url($settings['new_chapter_url']); ?>" class="button is-primary small"><?php echo esc_attr( $settings['new_chapter_text'] ) ?> <i class="icon external-link margin-left-small padding-top-smaller"></i></a>
                    <?php endif; ?>
                </header>
                    <table class="chapters-table cards" id="chapters-table">
                        <thead>
                            <tr>
                                <td>Name</td>
                                <td>Date founded</td>
                                <td>Email</td>
                                <td>Chapter Lead</td>
                                <td>GNC Representative</td>
                                <td>Url</td>
                                <td>Website</td>
                            </tr>
                        </thead>
                        <tbody>
                            <?php 
                                $chapters = Commoners::get_chapters();
                                if (!empty($chapters)) {
                                    foreach ($chapters as $chapter) {
                                        $chapter_url = (!empty($chapter->cc_chapters_url)) ? '<a href="'. filter_var($chapter->cc_chapters_url, FILTER_VALIDATE_URL) .'" target="_blank" class="button secondary tiny">View</a>' : 'No url';
                                        $website_url = (!empty($chapter->cc_chapters_chapter_url)) ? '<a href="'. filter_var($chapter->cc_chapters_chapter_url, FILTER_VALIDATE_URL) .'" target="_blank" class="button secondary tiny">View</a>' : 'No website';
                                        $chapter_image = get_the_post_thumbnail( $chapter->ID, 'landscape-medium' );
                                        echo '<tr>';
                                            echo '<td><a href="'.get_permalink( $chapter->ID ).'">'.$chapter->post_title.'</a></td>';
                                            echo '<td>' . render::date_format( $chapter->cc_chapters_date ) . '</td>';
                                            echo '<td>' . antispambot($chapter->cc_chapters_email) . '</td>';
                                            echo '<td>' . get_user_by('id', $chapter->cc_chapters_chapter_lead)->display_name . '</td>';
                                            echo '<td>' . get_user_by('id', $chapter->cc_chapters_member_gnc)->display_name . '</td>';
                                            echo '<td>' . $chapter_url. '</td>';
                                            echo '<td>' . $website_url. '</td>';
                                            if ( !empty( $chapter_image ) ) {
                                                echo '<td><a href="'.get_permalink( $chapter->ID ).'">' . $chapter_image. '</a></td>';
                                            }
                                        echo '</tr>';
                                    }
                                }
                            ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</section>
<?php get_footer(); ?>