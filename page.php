<?php 
    get_header(); 
    the_post();
?>
<section class="main-content">
    <?php if (!bp_is_user_profile()): ?>
        <?php   
            global $post;
            get_template_part('inc/partials/entry','header');
        ?>
        <div class="container">
            <section class="entry-content page-content margin-vertical-larger">
                <div class="columns">
                    <div class="column is-8">
                        <div class="content">
                            <?php the_content(); ?>
                        </div>
                    </div>
                </div>
            </section>
        </div>
        <?php else: ?>
        <div class="container">
            <section class="entry-content page-content">
                <?php the_content(); ?>
            </section>
        </div>
    <?php endif; ?>
</section>
<?php get_footer(); ?>