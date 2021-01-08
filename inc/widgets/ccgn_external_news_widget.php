<?php

class WP_Widget_ccgn_org_news extends WP_Widget_org_news {
  function widget( $args, $instance ) {
		global $post;
		$size         = ( ! empty( $instance['size'] ) ) ? $instance['size'] : 3;
		$the_category = ( ! empty( $instance['category'] ) ) ? $instance['category'] : null;
		$link_text    = ( ! empty( $instance['link_text'] ) ) ? $instance['link_text'] : 'More news';
		$tag          = ( ! empty( $instance['tag_id'] ) ) ? $instance['tag_id'] : false;
		$news         = $this->get_last_news( $size, $the_category, $tag );
		$categories   = $this->get_ccorg_categories();
		if ( ! empty( $news ) ) {
			echo '<div class="widget news">';
			echo '<header class="widget-header">';
			if ( $instance['show_title'] ) {
				echo '<h2 class="widget-title">' . esc_attr( $instance['title'] ) . '</h2>';
			}
			if ( ! empty( $instance['is_link'] && ( ! empty( $instance['category'] ) ) ) ) {
				$link = ! empty( $instance['category'] ) ? $categories[ $instance['category'] ] : self::CC_ORG_BLOG_URL;
				echo '<div class="more-news">';
				echo '<a href="' . $link['link'] . '" class="widget-more" target="_blank">' . $link_text . '<i class="icon chevron-right"></i></a>';
				echo '</div>';
			}
			echo '</header>';
			echo '<div class="widget-content">';
			foreach ( $news as $item ) {
				$thumb_url = ( ! empty( $item->featured_media ) ) ? $item->featured_media_url : '';
				echo Components::simple_entry( $item->ID, false, true, true, $item->title->rendered, $thumb_url, $item->date, $item->link, $item->excerpt->rendered );
			}
			echo '</div>';
			echo '</div>';
		}
	}
}