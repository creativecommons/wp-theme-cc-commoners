<?php
class WP_Widget_custom_news extends WP_Widget {
	/** constructor */
	function __construct() {
		$widget_ops  = array(
			'classname'   => 'custom_news',
			'description' => 'This renders a news widget formatted with custom data',
		);
		$control_ops = array();
		parent::__construct( 'custom_news', 'CCGN Custom news', $widget_ops, $control_ops );
	}

	function widget( $args, $instance ) {
		$image = ( ! empty( $instance['attachment_id'] ) ) ? wp_get_attachment_image_src( $instance['attachment_id'], 'landscape-medium' ) : array();
		echo '<div class="widget news custom-news">';
		echo '<header class="widget-header"></header>';
		echo '<div class="widget-content">';
		echo CCGN_Components::simple_entry( false, false, true, true, $instance['title'], $image[0], $instance['date'], $instance['url'], false, $instance['author'] );
		if ( ! empty( $instance['link_url'] && ( ! empty( $instance['link_text'] ) ) ) ) {
			echo '<div class="more-news">';
			echo '<a href="' . $instance['link_url'] . '" class="button is-text" target="_blank">' . $instance['link_text'] . '<i class="icon external-link margin-left-small padding-top-smaller"></i></a>';
			echo '</div>';
		}
		echo '</div>';
		echo '</div>';
	}

	function update( $new_instance, $old_instance ) {
		return $new_instance;
	}

	function form( $instance ) {
		extract( $instance );
		echo '<p><label for="' . $this->get_field_id( 'title' ) . '">Title: <input type="text" name="' . $this->get_field_name( 'title' ) . '" id="' . $this->get_field_id( 'title' ) . '" value="' . $instance['title'] . '" class="widefat" /></label></p>';
		echo '<p><label for="' . $this->get_field_id( 'author' ) . '">Author: <input type="text" name="' . $this->get_field_name( 'author' ) . '" id="' . $this->get_field_id( 'author' ) . '" value="' . $instance['author'] . '" class="widefat" /></label></p>';
		echo '<p><label for="' . $this->get_field_id( 'date' ) . '">Date: <input type="date" name="' . $this->get_field_name( 'date' ) . '" id="' . $this->get_field_id( 'date' ) . '" value="' . $instance['date'] . '" class="widefat" /></label></p>';
		echo '<p><label for="' . $this->get_field_id( 'url' ) . '">Entry URL: <input type="text" name="' . $this->get_field_name( 'url' ) . '" id="' . $this->get_field_id( 'url' ) . '" value="' . $instance['url'] . '" class="widefat" /></label></p>';
		echo '<p><label for="' . $this->get_field_id( 'link_text' ) . '">All content text (optional): <input type="text" name="' . $this->get_field_name( 'link_text' ) . '" id="' . $this->get_field_id( 'link_text' ) . '" value="' . $instance['link_text'] . '" class="widefat" /></label></p>';
		echo '<p><label for="' . $this->get_field_id( 'link_url' ) . '">All content URL (optional): <input type="text" name="' . $this->get_field_name( 'link_url' ) . '" id="' . $this->get_field_id( 'link_url' ) . '" value="' . $instance['link_url'] . '" class="widefat" /></label></p>';
		echo '<h3>Image</h3>';
		echo '<p>';
		$img_selected = '';
		if ( ! empty( $instance['attachment_id'] ) ) {
			$img_selected = '<img src="' . wp_get_attachment_thumb_url( $instance['attachment_id'] ) . '" width="150">';
		}
		echo '<div>' . $img_selected . '</div>';
		echo '<a href="#" id="' . $this->get_field_id( 'attach_button' ) . '" onClick="bindEventWidgetImage(this.id);return false;" data-targetid="' . $this->get_field_id( 'attachment_id' ) . '" data-button-text="Select" data-uploader-title="Select widget image" class="button widget_custom_media_upload">Upload image</a>';
		echo '<input type="hidden" id="' . $this->get_field_id( 'attachment_id' ) . '" name="' . $this->get_field_name( 'attachment_id' ) . '" value="' . $instance['attachment_id'] . '">';
		echo '</p>';
	}
}

function cc_custom_news_widget_init() {
	 register_widget( 'WP_Widget_custom_news' );
}

add_action( 'widgets_init', 'cc_custom_news_widget_init' );
