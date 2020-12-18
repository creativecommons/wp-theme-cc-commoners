<?php

use Queulat\Metabox;
use Queulat\Forms\Node_Factory;
use Queulat\Forms\Element\WP_Editor;
use Queulat\Forms\Element\WP_Image;
use Queulat\Forms\Element\Input_Text;
use Queulat\Forms\Element\Repeater;
use Queulat\Forms\Element\WP_Gallery;
use Queulat\Forms\Element\Div;

class Platform_Metabox extends Metabox
{
    public function __construct($id = '', $title = '', $post_type = '', array $args = array())
    {
        parent::__construct($id, $title, $post_type, $args);
        add_action("{$this->get_id()}_metabox_data_updated", [$this, 'data_updated'], 10, 2);
    }
    public function get_fields(): array
    {
        return [
            Node_Factory::make(
                WP_Gallery::class,
                [
                    'name' => 'gallery',
                    'label' => 'Image Gallery',
                    'properties' => [
                        'description' => 'This image gallery will show up at the header of the platform section'
                    ]
                ]
            ),
            Node_Factory::make(
                WP_Editor::class,
                [
                  'name' => 'description_text',
                  'label' => 'Platform Description',
                  'value' => (!empty($data['description_text'])) ? $data['description_text'] : '',
                  'attributes' => [
                      'class' => 'widefat',
                  ],
                  'properties' => [
                      'textarea_rows' => 8,
                      'teeny' => true,
                      'media_buttons' => false
                  ]
              ]
            ),
            Node_Factory::make(
                Repeater::class,
                [
                  'label' => 'Resources',
                  'name' => 'resources',
                  'children' => [
                    Node_Factory::make(
                      Input_Text::class,
                      [
                          'name' => 'resources_name',
                          'label' => 'Resource name',
                          'attributes' => [
                              'class'    => 'regular-text'
                          ]
                      ]
                    ),
                    Node_Factory::make(
                      Input_Text::class,
                      [
                          'name' => 'resources_url',
                          'label' => 'Resource URL',
                          'attributes' => [
                              'class'    => 'regular-text',
                              'type'      => 'url'
                          ]
                      ]
                    ),
                  ]
                ]
            ),
            Node_Factory::make(
              Div::class,
              [
                'text_content' => '<h3>Bottom block settings</h3>',
              ]
            ),
            Node_Factory::make(
                Input_Text::class,
                [
                    'name' => 'bottom_title',
                    'label' => 'Bottom section title',
                    'attributes' => [
                        'class'    => 'regular-text'
                    ]
                ]
            ),
            Node_Factory::make(
               Repeater::class,
                [
                  'label' => 'Buttons',
                  'name' => 'buttons',
                  'children' => [
                    Node_Factory::make(
                      Input_Text::class,
                      [
                          'name' => 'button_title',
                          'label' => 'Button title',
                          'attributes' => [
                              'class'    => 'regular-text'
                          ]
                      ]
                    ),
                    Node_Factory::make(
                      Input_Text::class,
                      [
                          'name' => 'button_description',
                          'label' => 'Button Description',
                          'attributes' => [
                              'class'    => 'regular-text'
                          ]
                      ]
                    ),
                    Node_Factory::make(
                      Input_Text::class,
                      [
                          'name' => 'button_text',
                          'label' => 'Button text',
                          'attributes' => [
                              'class'    => 'regular-text'
                          ]
                      ]
                    ),
                    Node_Factory::make(
                      Input_Text::class,
                      [
                          'name' => 'button_url',
                          'label' => 'Button URL',
                          'attributes' => [
                              'class'    => 'regular-text',
                              'type'      => 'url'
                          ]
                      ]
                    ),
                  ]
                ]
            ),
            Node_Factory::make(
               WP_Editor::class,
                [
                  'name' => 'right_column',
                  'label' => 'Platform Bottom description',
                  'value' => (!empty($data['right_column'])) ? $data['right_column'] : '',
                  'attributes' => [
                      'class' => 'widefat',
                  ],
                  'properties' => [
                      'textarea_rows' => 8,
                      'teeny' => true,
                      'media_buttons' => false
                  ]
              ]
            ),
            Node_Factory::make(
              WP_Image::class,
              [
                'name'       => 'bottom_image',
                'label'      => 'Feature Bottom image',
                'value'      => ( ! empty( $data['bottom_image'] ) ) ? $data['bottom_image'] : ''
              ]
            ),
        ];
    }
    public function sanitize_data(array $data): array
    {        
        return queulat_sanitizer($data, [
          'gallery' => ['intval'],
          'description_text' => ['sanitize_textarea_field'],
          'resources.*.resources_name' => [ 'sanitize_text_field' ],
          'resources.*.resources_url' => [ 'esc_url_raw' ],
          'bottom_title' => ['sanitize_text_field'],
          'buttons.*.button_title' => [ 'sanitize_text_field' ],
          'buttons.*.button_text' => [ 'sanitize_text_field' ],
          'buttons.*.button_description' => [ 'sanitize_text_field' ],
          'buttons.*.button_url' => [ 'esc_url_raw' ],
          'right_column' => ['sanitize_text_field'],
          'bottom_image' => ['intval'],
        ]);
    }
}

new Platform_Metabox('platforms', 'Platform data', 'ccgn-platforms', ['context' => 'normal']);
