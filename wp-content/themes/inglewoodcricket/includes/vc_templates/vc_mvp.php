<?php
vc_map( array(
    "name" => __("MVP Points"),
    "base" => "mvp",
    "category" => __('Content'),
    'icon' => '',
    'description' => 'Prem MVP Points',
    'show_settings_on_create' => false
));
add_shortcode( 'mvp', 'mvpPoints' );

function mvpPoints() {
    $season = get_option('season');
    // put mvp points into an array so we can sort the array
    $mvp_points = array();
    foreach(getPlayers() as $player) {
        $mvp_points[] = array("full_name"=>$player->getTitle(), "points"=>$player->getMVPPoints($season));
    }
    $points = array_column($mvp_points, 'points');
    $full_name = array_column($mvp_points, 'full_name');
    array_multisort($points, SORT_DESC, $full_name, SORT_ASC, $mvp_points);
    $html = '
    <div class="mvp-wrapper row">
        <div class="col-xl-12">
            <h2>' . $season . ' MVP Points</h2>
            <div class="table-responsive">
                <table class="table table-striped">
                    <thead>
                    <tr>
                        <th scope="col">&nbsp;</th>
                        <th scope="col">Points</th>
                    </tr>
                    </thead>
                    <tbody>';
                    foreach($mvp_points as $player) {
                        $html .= '
                        <tr>
                            <td>' . $player['full_name'] . '</td>
                            <td>' . $player['points'] . '</td>
                        </tr>';
                    }
                    $html .= '
                    </tbody>
                </table>
            </div>
        </div>
    </div>';

    return $html;
}