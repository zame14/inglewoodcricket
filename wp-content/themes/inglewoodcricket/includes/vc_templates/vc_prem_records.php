<?php
vc_map( array(
    "name" => __("Prem Records"),
    "base" => "prem_records",
    "category" => __('Content'),
    'icon' => '',
    'description' => 'Prem records to display on home page',
    'show_settings_on_create' => false
));
add_shortcode( 'prem_records', 'premRecords' );

function premRecords() {
    // go through each record and randomly choose three to display on the home page.
    $records = array("Most caps", "Most runs", "Most wickets", "Most runs in a season", "Most sixes in a season", "Most sixes in a match", "Most wickets in a season", "Most catches in a season", "Most catches in a match", "Most wickets in a match", "Highest individual score", "Best bowling figures", "Most centuries", "Most 5 wicket bags");
    shuffle($records);
    //print_r($records);
    $html = '
    <h2>Prem Records</h2>
    <div class="stats-home-wrapper prem-stats">';
    foreach($records as $record) {
        $html .= getRecord($record);
    }
    $html .= '</div>';

    return $html;
}