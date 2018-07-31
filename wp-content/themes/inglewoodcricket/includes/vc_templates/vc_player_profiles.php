<?php
vc_map( array(
    "name" => __("Player Profiles"),
    "base" => "player_profiles",
    "category" => __('Content'),
    'icon' => '',
    'description' => 'Prem player profiles',
    'show_settings_on_create' => false
));
add_shortcode( 'player_profiles', 'playerProfiles' );

function playerProfiles() {
    $i = 1;
    $html = '
    <div class="players-wrapper row">';
    foreach (getPlayers() as $player) {
        $imageid = getImageID($player->getProfileImage());
        $img = wp_get_attachment_image_src($imageid, 'full');
        $url = 'http://www.thecricketwizard.co.nz/api/api.php?functionName=getAllStats&playerid=' . $player->getCricketWizardID() . '&season&comp=c.compid<>9&opponent&runs&wickets&groupby=p.playerid&orderby=sum(m.matchid)_desc&limit';
        $str = file_get_contents($url);
        $json = json_decode($str, true);
        $stat = $json['data']['matches'][0];
        $html .= '
        <div class="col-xs-12 col-sm-6 col-md-4 col-lg-3 player" id="player-' . $player->id() . '">
            <div class="player-inner-wrapper" data-id="' . $player->id() . '" data-colid="' . $i . '">
                <div class="panel-title">' . $player->getTitle() . '</div>
                <div class="image-wrapper">
                    <img src="' . $img[0] . '" alt="' . $player->getTitle() . '" class="responsive-img" />    
                </div>
                <div class="playing-role">' . $player->getPlayingRole() . '</div>
                <div class="stat"><span>' . $stat . '</span></div>
                <img src="' . get_stylesheet_directory_uri() . '/images/loader.gif" alt="" class="loader" />
            </div>
        </div>';
    }
    $html .= '
    <div class="col-xs-12 col-sm-6 col-md-4 col-lg-3 player coach" id="player-9999">
        <div class="player-inner-wrapper" data-id="9999" data-colid="' . ($i+1) . '">
            <div class="panel-title">David O\'Sullivan</div>
            <div class="image-wrapper">
                <img src="' . get_stylesheet_directory_uri() . '/images/blank.jpg" alt="" class="responsive-img" />
            </div>
            <div class="playing-role">Coach</div>
            <img src="' . get_stylesheet_directory_uri() . '/images/loader.gif" alt="" class="loader" />
        </div>    
    </div>
    </div>';

    return $html;
}