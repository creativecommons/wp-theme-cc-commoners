<?php
class CCGN_Components {
	/**
	 * Simple CCGN entry
	 *
	 * @param int     $post_id : post or entry ID.
	 * @param boolean $has_content : whether to show or not the content excerpt.
	 * @param boolean $has_image : whether to show or not the entry thumbnail.
	 * @param boolean $use_remote_data : whether to use or not remote data providing each element separatedly
	 * @param string  $title : the title of the entry
	 * @param string  $image_url : the url of the entry featured image
	 * @param string  $date : the date of the entry
	 * @param string  $permalink : the permalink of the entry
	 * @param string  $excerpt : the excerpt of the entry
	 * @return string component layout
	 */
	public static function simple_entry( $post_id, $has_content = true, $has_image = true, $use_remote_data = null, $title = null, $image_url = null, $date = null, $permalink = null, $excerpt = null, $author = null ) {
		$has_thumb       = ( ! $use_remote_data ) ? has_post_thumbnail( $post_id ) : ! empty( $image_url );
		$has_thumb_class = ( ! empty( $has_thumb ) ) ? ' has-image' : '';
		$external        = ( $use_remote_data ) ? ' target="_blank" ' : '';
		$the_author      = ( ! $use_remote_data ) ? get_the_author( $post_id ) : $author;
		$the_title       = ( ! $use_remote_data ) ? get_the_title( $post_id ) : $title;
		$the_permalink   = ( ! $use_remote_data ) ? get_permalink( $post_id ) : $permalink;
		$the_date        = ( ! $use_remote_data ) ? get_the_date( CC_Site::get_date_format() ) : mysql2date( CC_Site::get_date_format(), $date );

		$out = '<article class="ccgn-post' . $has_thumb_class . '">';
		if ( $has_thumb && $has_image ) {
			$thumb_image = ( ! $use_remote_data ) ? get_the_post_thumbnail( $post_id, 'landscape-small' ) : '<img src="' . $image_url . '" alt="' . $title . '" />';
			$out        .= '<figure class="entry-image">';
			$out        .= '<a href="' . $the_permalink . '">';
			$out        .= $thumb_image;
			$out        .= '</a>';
			$out        .= '</figure>';
		}
		$out .= '<div class="entry-content">';
		$out .= '<h6 class="b-header"><a href="' . $the_permalink . '"' . $external . '>' . $the_title . '</a></h6>';
		$out .= '<div class="entry-meta">';
		if ( ! empty( $the_author ) ) {
			$out .= '<span class="entry-author">' . $the_author . '</span>';
		}
		$out .= '<span class="entry-date">' . $the_date . '</span>';
		$out .= '</div>';
		if ( $has_content ) {
			$the_post    = get_post( $post_id );
			$the_excerpt = ( ! $use_remote_data ) ? do_excerpt( $the_post ) : $excerpt;
			$out        .= '<div class="entry-description">';
			$out        .= $the_excerpt;
			$out        .= '</div>';
		}
		$out .= '</div>';
		$out .= '</article>';
		return $out;
	}
}
