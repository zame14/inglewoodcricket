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
    <div class="players-wrapper row row-eq-height">';
    foreach (getPlayers() as $player) {
        $sponsor_id = $player->getSponsorID();
        $imageid = getImageID($player->getProfileImage());
        $img = wp_get_attachment_image_src($imageid, 'full');
        $url = 'http://www.thecricketwizard.co.nz/api/api.php?functionName=getAllStats&playerid=' . $player->getCricketWizardID() . '&season&comp=c.compid<>9&opponent&runs&wickets&groupby=p.playerid&orderby=sum(m.matchid)_desc&limit';
        $str = file_get_contents($url);
        $json = json_decode($str, true);
        $stat = $json['data']['matches'][0];
        if($player->getCricketWizardID() == 3) $stat = ($stat + 17);
        $html .= '
        <div class="col-xs-12 col-sm-6 col-md-6 col-lg-4 player" id="player-' . $player->id() . '">
            <div class="player-inner-wrapper" data-id="' . $player->id() . '" data-colid="' . $i . '">
                <div class="image-wrapper">
                    <img src="' . $img[0] . '" alt="' . $player->getTitle() . '" class="responsive-img" />';
                    if($sponsor_id > 0)
                    {
                        $sponsor = new Sponsor($sponsor_id);
                        $html .= '<div class="sponsor-wrapper">' . $sponsor->output() . '</div>';
                    } else {
                        $html .= '<a href="' . get_page_link(3422) . '" class="sponsor-me">sponsor ' . $player->getFirstName() . '</a>';
                    }
                    $html .= '
                    <div class="stat"><span>' . $stat . '</span></div>
                </div>
                <div class="bio-wrapper">
                    <h2>' . $player->getTitle() . '</h2>
                    <h3>' . $player->getPlayingRole() . '</h3>
                    <div class="description">
                        ' . $player->getContent() . '
                    </div>';
                    if($sponsor_id > 0)
                    {
                        $html .= '<div class="my-sponsor"><label>Sponsor:</label>' . $sponsor->getTitle() . '</div>';
                    }
                    $html .= '
                </div>
            </div>
        </div>';
    }
    $html .= '
    <div class="col-xs-12 col-sm-6 col-md-4 col-lg-4 player coach" id="player-9999">
        <div class="player-inner-wrapper" data-id="9999" data-colid="' . ($i+1) . '">
            <div class="image-wrapper">
                <img src="' . get_stylesheet_directory_uri() . '/images/david_osullivan.jpg" alt="" class="responsive-img" />
                <div class="sponsor-wrapper"><img src="/wp-content/uploads/2018/07/itp.png" alt="" /></div>
            </div>
            <div class="bio-wrapper">
                <h2>David O\'Sullivan</h2>
                <h3>Coach</h3>
                <div class="description">
                    If he coaches as well as he tips it could be a long season.
                </div>
                <div class="my-sponsor"><label>Sponsor:</label>Inglewood Timber Processors</div>
            </div>
        </div>    
    </div>
    </div>';

    return $html;
}