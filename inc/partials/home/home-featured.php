<?php 
  global $_ccgnset;
  $settings                  = $_ccgnset->settings;
?>
<section class="home-featured">
  <div class="grid-container">
    <div class="cell homepage-block site-welcome use-4-cols">
      <h1 class="title">Help us build a Vibrant collaborative global commons</h1>
    </div>
    <?php if (!empty($settings['homepage_image_1'])): ?>
    <figure class="cell homepage-block image-block image-1 use-2-cols use-2-rows background-effect tomato">
      <?php echo Commoners::homepage_image( $settings['homepage_image_1'], 'homepage-portrait-large'); ?>
    </figure>
    <?php endif; ?>
    <?php if (!empty($settings['card_1_url'])): ?>
    <div class="cell use-2-cols homepage-block card-block card-container card-1">
      <?php echo Components::card_link(
        null, 
        false, 
        'tomato', 
        esc_attr($settings['card_1_title']),
        esc_attr($settings['card_1_description']),
        'see more',
        esc_url($settings['card_1_url']),
        true,
        false,
        true
        );
        ?>
    </div>
    <?php endif; ?>
    <?php if (!empty($settings['homepage_image_2'])): ?>
    <figure class="cell use-4-cols homepage-block image-block image-2 background-effect tomato">
      <?php echo Commoners::homepage_image( $settings['homepage_image_2'], 'homepage-squared') ?>
    </figure>
    <?php endif; ?>
    <div class="cell use-2-cols homepage-block color-block has-background-dark-slate-blue block-1"></div>
    <?php if (!empty($settings['homepage_image_3'])): ?>
    <figure class="cell use-3-cols homepage-block image-block image-3 background-effect blue">
      <?php echo Commoners::homepage_image( $settings['homepage_image_3'], 'homepage-landscape') ?>
    </figure>
    <?php endif; ?>
    <?php if (!empty($settings['homepage_image_4'])): ?>
    <figure class="cell use-2-cols homepage-block image-block image-4 background-effect blue">
      <?php echo Commoners::homepage_image( $settings['homepage_image_4'], 'homepage-landscape') ?>
    </figure>
    <?php endif; ?>
    <div class="cell use-3-cols homepage-block color-block has-background-dark-slate-blue block-2"></div>
    <div class="cell use-1-cols homepage-block color-block has-background-dark-slate-blue block-3"></div>
    <?php if (!empty($settings['homepage_image_5'])): ?>
    <figure class="cell use-2-cols homepage-block image-block image-5 background-effect blue">
      <?php echo Commoners::homepage_image( $settings['homepage_image_5'], 'homepage-squared') ?>
    </figure>
    <?php endif; ?>
    <?php if (!empty($settings['card_2_url'])): ?>
    <div class="cell use-3-cols homepage-block card-block card-container card-2">
      <?php echo Components::card_link(
        null, 
        false, 
        'tomato', 
        esc_attr($settings['card_2_title']),
        esc_attr($settings['card_2_description']),
        'see more',
        esc_url($settings['card_2_url']),
        true,
        false,
        true
        );
        ?>
    </div>
    <?php endif; ?>
    <div class="cell use-2-cols homepage-block color-block has-background-dark-slate-blue block-4"></div>
    <?php if (!empty($settings['homepage_image_6'])): ?>
    <figure class="cell use-3-cols homepage-block image-block image-6 background-effect blue">
      <?php echo Commoners::homepage_image( $settings['homepage_image_6'], 'homepage-squared') ?>
    </figure>
    <?php endif; ?>
  </div>
</section>