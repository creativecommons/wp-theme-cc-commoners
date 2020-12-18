<?php

use Queulat\Metabox;
use Queulat\Forms\Node_Factory;
use Queulat\Forms\Element\Select;

class Project_Metabox extends Metabox
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
                Select::class,
                [
                    'name' => 'platform_id',
                    'label' => 'Select related platform',
                    'attributes' => [
                        'class' => 'widefat'
                    ],
                    'options' => (function () {
                        $ids = array(
                            '' => 'Choose'
                        );
                        $query = new WP_Query(array(
                          'post_type' => 'ccgn-platforms',
                          'post_status' => 'publish',
                          'posts_per_page' => -1
                        ));
                        if ($query->have_posts()) {
                          foreach($query->posts as $entry) {
                            $ids[$entry->ID] = $entry->post_title;
                          }
                        } 
                        return $ids;
                    })()
                ]
            ),
        ];
    }
    public function sanitize_data(array $data): array
    {        
        return queulat_sanitizer($data, [
          'platform_id' => ['intval']
        ]);
    }
}

new Project_Metabox('projects', 'Platform data', 'ccgn-projects', ['context' => 'normal']);
