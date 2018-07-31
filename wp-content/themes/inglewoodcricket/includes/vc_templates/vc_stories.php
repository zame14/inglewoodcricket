<?php
vc_map( array(
    "name" => __("Players Voice"),
    "base" => "stories",
    "category" => __('Content'),
    'icon' => '',
    'description' => 'Inglewood players share their stories',
    'show_settings_on_create' => false
));
add_shortcode( 'stories', 'ingStories' );

function ingStories() {
    $html = '
    <div class="stories-wrapper row">';
    foreach (getStories() as $story) {
        $html .= '
        <div class="col-xs-12 col-sm-6 col-md-4 story-panel">
            <a href="' . $story->link() . '">
                <div class="image-wrapper">
                    <img src="' . $story->getImage() . '" alt="' . $story->getTitle() . '" class="responsive-img" />
                </div>
                <div class="story-title">' . $story->getTitle() . '</div>
                <div class="author">by ' . $story->getAuthor() . '</div>
            </a>
        </div>';
    }
    $html .= '
    </div>';

    return $html;
}