<?php
vc_map( array(
    "name" => __("Stats for Home Page"),
    "base" => "stats",
    "category" => __('Content'),
    'icon' => '',
    'description' => 'Stats',
    'show_settings_on_create' => false
));
add_shortcode( 'stats', 'statsHomePage' );
function statsHomePage() {
    $season = get_option('season');
    $html = '
    <h2>' . $season . ' Prem Stats</h2>
    <div class="stats-home-wrapper row justify-content-center current-prem-stats">
        <div class="col-xl-12"><img src="' . get_stylesheet_directory_uri() . '/images/loader.gif" alt="" class="stats-loader" /></div>    
    </div>';

    return $html;
}