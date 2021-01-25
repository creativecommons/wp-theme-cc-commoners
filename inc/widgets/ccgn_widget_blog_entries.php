<?php

class WP_CCGN_Widget_news_list extends WP_Widget_news {
	function widget( $args, $instance ) {
		global $post;
		$size         = ( ! empty( $instance['size'] ) ) ? $instance['size'] : 1;
		$the_category = ( ! empty( $instance['category'] ) ) ? $instance['category'] : null;
		$link_text    = ( ! empty( $instance['link_text'] ) ) ? $instance['link_text'] : 'More news';
		$news         = $this->get_last_news( $size, $the_category );
		if ( ! empty( $news ) ) {
			echo '<div class="widget news">';
			echo '<header class="widget-header">';
			if ( $instance['show_title'] ) {
				echo '<h2 class="widget-title">' . esc_attr( $instance['title'] ) . '</h2>';
			}
			echo '</header>';
			echo '<div class="widget-content">';
			foreach ( $news as $item ) {
				echo CCGN_Components::simple_entry( $item->ID, false, true, false );
			}
			if ( ! empty( $instance['is_link'] && ( ! empty( $instance['category'] ) ) ) ) {
				$link = get_category_link( $instance['category'] );

				echo '<div class="more-news">';
				echo '<a href="' . $link . '" class="button is-text" target="_blank">' . $link_text . '<i class="icon external-link margin-left-small padding-top-smaller"></i></a>';
				echo '</div>';
			}
			echo '</div>';
			echo '</div>';
		}
	}
}

function cc_news_list_widget_init() {
	unregister_widget( 'WP_Widget_news' );
	register_widget( 'WP_CCGN_Widget_news_list' );
}

add_action( 'widgets_init', 'cc_news_list_widget_init' );
