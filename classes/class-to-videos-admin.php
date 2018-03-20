<?php
/**
 * LSX_TO_Videos_Admin
 *
 * @package   LSX_TO_Videos_Admin
 * @author    LightSpeed
 * @license   GPL-2.0+
 * @link
 * @copyright 2017 LightSpeedDevelopment
 */

/**
 * Main plugin class.
 *
 * @package LSX_TO_Videos_Admin
 * @author  LightSpeed
 */

class LSX_TO_Videos_Admin extends LSX_TO_Videos {

	/**
	 * Constructor
	 */
	public function __construct() {
		add_filter( 'lsx_to_destination_custom_fields', array( $this, 'custom_fields' ) );
		add_filter( 'lsx_to_tour_custom_fields', array( $this, 'custom_fields' ) );
		add_filter( 'lsx_to_accommodation_custom_fields', array( $this, 'custom_fields' ) );

		add_filter( 'lsx_to_review_custom_fields', array( $this, 'custom_fields' ) );
		add_filter( 'lsx_to_activity_custom_fields', array( $this, 'custom_fields' ) );
		add_filter( 'lsx_to_special_custom_fields', array( $this, 'custom_fields' ) );
	}

	/**
	 * Adds in the gallery fields to the Tour Operators Post Types.
	 */
	public function custom_fields( $fields ) {
		$key_ids = array( 'gallery' );
		$new_fields = array();

		foreach ( $fields as $field ) {
			$new_fields[] = $field;

			if ( in_array( $field['id'],$key_ids ) ) {
				$new_fields[] = array(
					'id' => 'video_title',
					'name' => __( 'Videos','to-videos' ),
					'type' => 'title',
				);

				$new_fields[] = array(
						'id' => 'videos',
						'name' => '',
						'single_name' => __( 'Video','to-videos' ),
						'type' => 'group',
						'repeatable' => true,
						'sortable' => true,
						'fields' => array(
							array(
								'id' => 'title',
								'name' => __( 'Title','to-videos' ),
								'type' => 'text',
							),
							array(
								'id' => 'url',
								'name' => __( 'Url','to-videos' ),
								'type' => 'text',
							),
							array(
								'id' => 'description',
								'name' => __( 'Caption','to-videos' ),
								'type' => 'text',
							),
							array(
								'id' => 'alt_text',
								'name' => __( 'Alt Text','to-videos' ),
								'type' => 'text',
							),
					),
					'desc' => '',
				);
			}
		}

		return $new_fields;
	}
}

new LSX_TO_Videos_Admin();
