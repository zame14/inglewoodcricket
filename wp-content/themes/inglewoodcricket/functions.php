<?php
require_once('ajax.php');
require_once('modal/class.Base.php');
require_once('modal/class.Player.php');
require_once('modal/class.MVP.php');
require_once('modal/class.Story.php');
require_once('modal/class.Testimony.php');
require_once('modal/class.Sponsor.php');
require_once('modal/class.Gallery.php');
require_once('modal/class.Record.php');
require_once(STYLESHEETPATH . '/includes/wordpress-tweaks.php');
loadVCTemplates();
add_action( 'wp_enqueue_scripts', 'p_enqueue_styles');
function p_enqueue_styles() {
    wp_enqueue_style( 'bootstrap-css', get_stylesheet_directory_uri() . '/css/bootstrap.min.css?' . filemtime(get_stylesheet_directory() . '/css/bootstrap.min.css'));
    wp_enqueue_style( 'font-awesome', get_stylesheet_directory_uri() . '/css/font-awesome.min.css?' . filemtime(get_stylesheet_directory() . '/css/font-awesome.css'));
    wp_enqueue_style( 'google_font_open_sans', 'https://fonts.googleapis.com/css?family=Open+Sans:400,600');
    wp_enqueue_style( 'lato', 'https://fonts.googleapis.com/css?family=Lato:400,700');
    wp_enqueue_style( 'roboto', 'https://fonts.googleapis.com/css?family=Roboto:300,400');
    wp_enqueue_style( 'sigmar', 'https://fonts.googleapis.com/css?family=Sigmar+One');
    wp_enqueue_style( 'sofia', 'https://fonts.googleapis.com/css?family=Princess+Sofia');
    wp_enqueue_style( 'slick', get_stylesheet_directory_uri() . '/includes/slick-carousel/slick/slick.css');
    wp_enqueue_style( 'slick-theme', get_stylesheet_directory_uri() . '/includes/slick-carousel/slick/slick-theme.css');
    wp_enqueue_style( 'understrap-theme', get_stylesheet_directory_uri() . '/style.css?' . filemtime(get_stylesheet_directory() . '/style.css'));
    wp_enqueue_script('bootstrap-js', get_stylesheet_directory_uri() . '/js/bootstrap.min.js?' . filemtime(get_stylesheet_directory() . '/js/bootstrap.min.js'), array('jquery'));
    wp_enqueue_script( 'waypoint', get_stylesheet_directory_uri() . '/js/noframework.waypoints.min.js');
    wp_enqueue_script('understap-theme', get_stylesheet_directory_uri() . '/js/theme.js?' . filemtime(get_stylesheet_directory() . '/js/theme.js'), array('jquery'));
    wp_enqueue_script( 'slick', get_stylesheet_directory_uri() . '/includes/slick-carousel/slick/slick.js');
}
function understrap_remove_scripts() {
    wp_dequeue_style( 'understrap-styles' );
    wp_deregister_style( 'understrap-styles' );

    wp_dequeue_script( 'understrap-scripts' );
    wp_deregister_script( 'understrap-scripts' );

    // Removes the parent themes stylesheet and scripts from inc/enqueue.php
}
add_action( 'wp_enqueue_scripts', 'understrap_remove_scripts', 20 );

add_filter( 'vc_load_default_templates', 'p_vc_load_default_templates' ); // Hook in
function p_vc_load_default_template( $data ) {
    return array();
}

add_action('admin_init', 'my_general_section');
function my_general_section()
{
    add_settings_section(
        'my_settings_section', // Section ID
        'Custom Website Settings', // Section Title
        'my_section_options_callback', // Callback
        'general' // What Page?  This makes the section show up on the General Settings Page
    );

    add_settings_field( // Option 1
        'season', // Option ID
        'Current Season', // Label
        'my_textbox_callback', // !important - This is where the args go!
        'general', // Page it will be displayed (General Settings)
        'my_settings_section', // Name of our section
        array( // The $args
            'season' // Should match Option ID
        )
    );
    add_settings_field( // Option 1
        'phone', // Option ID
        'Karo Park phone number', // Label
        'my_textbox_callback', // !important - This is where the args go!
        'general', // Page it will be displayed (General Settings)
        'my_settings_section', // Name of our section
        array( // The $args
            'phone' // Should match Option ID
        )
    );
    register_setting('general','season', 'esc_attr');
    register_setting('general','phone', 'esc_attr');
}
function my_section_options_callback() { // Section Callback
    echo '';
}

function my_textbox_callback($args) {  // Textbox Callback
    $option = get_option($args[0]);
    echo '<input type="text" id="'. $args[0] .'" name="'. $args[0] .'" value="' . $option . '" />';
}

add_image_size( 'gallery', 767, 511, true);

function getPlayer($id) {
    $players = Array();
    $posts_array = get_posts([
        'post_type' => 'player',
        'post_status' => 'publish',
        'numberposts' => -1,
        'orderby' => 'ID',
        'order' => 'ASC',
        'meta_query' => [
            [
                'key' => 'wpcf-cricket-wizard-id',
                'value' => $id
            ]
        ]
    ]);
    foreach ($posts_array as $post) {
        $player = new Player($post);
        $players[] = $player;
    }
    return $players;
}

function getStories() {
    $stories = Array();
    $posts_array = get_posts([
        'post_type' => 'story',
        'post_status' => 'publish',
        'numberposts' => -1,
        'orderby' => 'ID',
        'order' => 'DESC',
    ]);
    foreach ($posts_array as $post) {
        $story = new Story($post);
        $stories[] = $story;
    }
    return $stories;
}
function getRecords() {
    $records = Array();
    $posts_array = get_posts([
        'post_type' => 'record',
        'post_status' => 'publish',
        'numberposts' => -1,
        'orderby' => 'ID',
        'order' => 'DESC',
    ]);
    foreach ($posts_array as $post) {
        $record = new Record($post);
        $records[] = $record;
    }
    return $records;
}
function getGalleryImages() {
    $images = Array();
    $posts_array = get_posts([
        'post_type' => 'photo-gallery',
        'post_status' => 'publish',
        'numberposts' => -1,
        'orderby' => 'ID',
        'order' => 'DESC',
    ]);
    foreach ($posts_array as $post) {
        $gallery = new Gallery($post);
        $images[] = $gallery;
    }
    return $images;
}
function getPlayers() {
    $players = Array();
    $posts_array = get_posts([
        'post_type' => 'player',
        'post_status' => 'publish',
        'numberposts' => -1,
        'orderby' => 'title',
        'order' => 'ASC',
        'meta_query' => [
            [
                'key' => 'wpcf-current',
                'value' => 1
            ]
        ]
    ]);
    foreach ($posts_array as $post) {
        $player = new Player($post);
        $players[] = $player;
    }
    return $players;
}

function getTestimonials() {
    $testimonials = Array();
    $posts_array = get_posts([
        'post_type' => 'testimony',
        'post_status' => 'publish',
        'numberposts' => -1,
        'orderby' => 'ID',
        'order' => 'ASC'
    ]);
    foreach ($posts_array as $post) {
        $testimony = new Testimony($post);
        $testimonials[] = $testimony;
    }
    return $testimonials;
}

function getSponsors($type) {
    $sponsors = Array();
    $posts_array = get_posts([
        'post_type' => 'sponsor',
        'post_status' => 'publish',
        'numberposts' => -1,
        'orderby' => 'ID',
        'order' => 'ASC',
        'meta_query' => [
        [
            'key' => 'wpcf-sponsor-type',
            'value' => $type
        ]
    ]
    ]);
    foreach ($posts_array as $post) {
        $sponsor = new Sponsor($post);
        $sponsors[] = $sponsor;
    }
    return $sponsors;
}

function getMVP($season) {
    $mvp_points = Array();
    $posts_array = get_posts([
        'post_type' => 'mvppoints',
        'post_status' => 'publish',
        'numberposts' => -1,
        'orderby' => 'ID',
        'order' => 'ASC',
        'meta_query' => [
            [
                'key' => 'wpcf-mvp-season',
                'value' => $season
            ]
        ]
    ]);
    foreach ($posts_array as $post) {
        $mvp = new MVP($post);
        $mvp_points[] = $mvp;
    }
    return $mvp_points;
}

function getRecord($record) {
    $html = '';
    $player = '';
    $stat = '';
    $season = '';
    $opponent = '';
    $runs = '';
    $wickets = '';
    switch ($record) {
        case "Most caps":
            $url = 'http://www.thecricketwizard.co.nz/api/api.php?functionName=getAllStats&playerid&season&comp=c.compid<>9&opponent&runs&wickets&groupby=p.playerid&orderby=sum(m.matchid)_desc&limit=1';
            $str = file_get_contents($url);
            $json = json_decode($str, true);
            $player = getPlayer($json['data']['cricketwizardid'][0]);
            $stat = $json['data']['matches'][0];
            break;
        case "Most runs":
            $url = 'http://www.thecricketwizard.co.nz/api/api.php?functionName=getAllStats&playerid&season&comp&opponent&runs&wickets&groupby=p.playerid&orderby=sum(runs)_desc&limit=1';
            $str = file_get_contents($url);
            $json = json_decode($str, true);
            $player = getPlayer($json['data']['cricketwizardid'][0]);
            $stat = $json['data']['runs'][0];
            break;
        case "Most runs in a season":
            $url = 'http://www.thecricketwizard.co.nz/api/api.php?functionName=getAllStats&playerid&season&comp&opponent&runs&wickets&groupby=season,p.playerid&orderby=sum(runs)_desc&limit=1';
            $str = file_get_contents($url);
            $json = json_decode($str, true);
            $player = getPlayer($json['data']['cricketwizardid'][0]);
            $stat = $json['data']['runs'][0];
            $season = $json['data']['season'][0];
            break;
        case "Most wickets":
            $url = 'http://www.thecricketwizard.co.nz/api/api.php?functionName=getAllStats&playerid&season&comp&opponent&runs&wickets&groupby=p.playerid&orderby=sum(wickets)_desc&limit=1';
            $str = file_get_contents($url);
            $json = json_decode($str, true);
            $player = getPlayer($json['data']['cricketwizardid'][0]);
            $stat = $json['data']['wickets'][0];
            break;
        case "Most sixes in a season":
            $url = 'http://www.thecricketwizard.co.nz/api/api.php?functionName=getAllStats&playerid&season&comp&opponent&runs&wickets&groupby=season,p.playerid&orderby=sum(sixes)_desc&limit=1';
            $str = file_get_contents($url);
            $json = json_decode($str, true);
            $player = getPlayer($json['data']['cricketwizardid'][0]);
            $stat = $json['data']['sixes'][0];
            $season = $json['data']['season'][0];
            break;
        case "Most sixes in a match":
            $url = 'http://www.thecricketwizard.co.nz/api/api.php?functionName=getAllStats&playerid&season&comp&opponent&runs&wickets&groupby=m.matchid,p.playerid&orderby=sum(sixes)_desc,_season_desc&limit=1';
            $str = file_get_contents($url);
            $json = json_decode($str, true);
            $player = getPlayer($json['data']['cricketwizardid'][0]);
            $stat = $json['data']['sixes'][0];
            $season = $json['data']['season'][0];
            $opponent = $json['data']['opponent'][0];
            break;
        case "Most wickets in a season":
            $url = 'http://www.thecricketwizard.co.nz/api/api.php?functionName=getAllStats&playerid&season&comp&opponent&runs&wickets&groupby=season,p.playerid&orderby=sum(wickets)_desc&limit=1';
            $str = file_get_contents($url);
            $json = json_decode($str, true);
            $player = getPlayer($json['data']['cricketwizardid'][0]);
            $stat = $json['data']['wickets'][0];
            $season = $json['data']['season'][0];
            break;
        case "Most catches in a season":
            $url = 'http://www.thecricketwizard.co.nz/api/api.php?functionName=getAllStats&playerid&season&comp&opponent&runs&wickets&groupby=season,p.playerid&orderby=sum(catches)_desc&limit=1';
            $str = file_get_contents($url);
            $json = json_decode($str, true);
            $player = getPlayer($json['data']['cricketwizardid'][0]);
            $stat = $json['data']['catches'][0];
            $season = $json['data']['season'][0];
            break;
        case "Most catches in a match":
            $url = 'http://www.thecricketwizard.co.nz/api/api.php?functionName=getAllStats&playerid&season&comp&opponent&runs&wickets&groupby=m.matchid,p.playerid&orderby=sum(catches)_desc,_season_desc&limit=1';
            $str = file_get_contents($url);
            $json = json_decode($str, true);
            $player = getPlayer($json['data']['cricketwizardid'][0]);
            $stat = $json['data']['catches'][0];
            $season = $json['data']['season'][0];
            $opponent = $json['data']['opponent'][0];
            break;
        case "Most wickets in a match":
            $url = 'http://www.thecricketwizard.co.nz/api/api.php?functionName=getAllStats&playerid&season&comp&opponent&runs&wickets&groupby=m.matchid,p.playerid&orderby=sum(wickets)_desc,_season_desc&limit=1';
            $str = file_get_contents($url);
            $json = json_decode($str, true);
            $player = getPlayer($json['data']['cricketwizardid'][0]);
            $stat = $json['data']['wickets'][0];
            $season = $json['data']['season'][0];
            $opponent = $json['data']['opponent'][0];
            break;
        case "Highest individual score":
            $url = 'http://www.thecricketwizard.co.nz/api/api.php?functionName=getAllStats&playerid&season&comp&opponent&runs&wickets&groupby=m.matchid,p.matchinnings,p.playerid&orderby=sum(runs)_desc,_season_desc&limit=1';
            $str = file_get_contents($url);
            $json = json_decode($str, true);
            $player = getPlayer($json['data']['cricketwizardid'][0]);
            $stat = $json['data']['runs'][0];
            $season = $json['data']['season'][0];
            $opponent = $json['data']['opponent'][0];
            if($json['data']['did'][0] == 7) $stat = $stat.'*';
            break;
        case "Best bowling figures":
            $url = 'http://www.thecricketwizard.co.nz/api/api.php?functionName=getAllStats&playerid&season&comp&opponent&runs&wickets&groupby=p.playerid,m.matchid&orderby=sum(wickets)_desc&limit=1';
            $str = file_get_contents($url);
            $json = json_decode($str, true);
            $player = getPlayer($json['data']['cricketwizardid'][0]);
            $stat = $json['data']['wickets'][0] . '/' . $json['data']['runsconceded'][0];
            $season = $json['data']['season'][0];
            $opponent = $json['data']['opponent'][0];
            break;
        case "Most centuries":
            $url = 'http://www.thecricketwizard.co.nz/api/api.php?functionName=getAllStats&playerid&season&comp&opponent&runs=bat.runs>=100&wickets&groupby=p.playerid&orderby=matches_desc&limit=1';
            $str = file_get_contents($url);
            $json = json_decode($str, true);
            $player = getPlayer($json['data']['cricketwizardid'][0]);
            $stat = $json['data']['matches'][0];
            break;
        case "Most 5 wicket bags":
            $url = 'http://www.thecricketwizard.co.nz/api/api.php?functionName=getAllStats&playerid&season&comp&opponent&runs&wickets=bowl.wickets>=5&groupby=p.playerid&orderby=matches_desc&limit=1';
            $str = file_get_contents($url);
            $json = json_decode($str, true);
            $player = getPlayer($json['data']['cricketwizardid'][0]);
            $stat = $json['data']['matches'][0];
            break;
    }
    $name = $player[0]->getTitle();
    if($season <> '' && $opponent == '') $name .= ' - ' . $season;
    if($opponent <> '') $name .= '<span> vs ' . $opponent . ' - ' . $season;
    $html .= '
    <div>
        <div class="player-panel-wrapper">
            <div class="panel-title">' . $record . '</div>
            <div class="image-wrapper">
                <img src="' . $player[0]->getProfileImage() . '" alt="' . $player[0]->getTitle() . '" class="responsive-img" />
            </div>
            <div class="name">' . $name . '</div>
            <div class="stat"><span>' . $stat. '</span></div>
        </div>
    </div>';
    return $html;
}

function breadcrumb($parent) {
    global $post;
    $this_page = get_the_title($post->ID);
    if($post->ID == 133) $this_page = get_option('season') . ' Prem stats';
    $html = '
    <div class="breadcrumb">
        <ul>
            <li><a href="' . get_page_link(4) . '">Home</a></li>
            <li><a href="javascript:;">' . $parent . '</a></li>
            <li>' . $this_page . '</li>
        </ul>
    </div>';

    return $html;
}

function breadcrumb_shortcode($atts) {
    global $post;
    $this_page = get_the_title($post->ID);
    if($post->ID == 133) $this_page = get_option('season') . ' Prem stats';
    $html = '
    <div class="breadcrumb">
        <ul>
            <li><a href="' . get_page_link(4) . '">Home</a></li>';
            if($atts['parent'] <> "") {
                if($atts['parent'] == "story") {
                    $html .= '<li><a href="javascript:;">Media</a></li>';
                    $html .= '<li><a href="' . get_page_link(258) . '">Players Voice</a></li>';
                } else {
                    $html .= '<li><a href="javascript:;">' . $atts['parent'] . '</a></li>';
                }
            }
            $html .= '
            <li>' . $this_page . '</li>
        </ul>
    </div>';

    return $html;
}
add_shortcode('breadcrumb', 'breadcrumb_shortcode');

function testimonials_shortcode() {
    $testimonials = getTestimonials();
    rand($testimonials);
    $html = '
    <div class="testimonials-wrapper">';
    foreach($testimonials as $t) {
        $html .= '
        <ul>
            <li class="image-wrapper">
                <img src="' . $t->getImage() . '" alt="" class="responsive-img" />
                <div class="testimony-author">' . $t->getTitle() . '<span>' . $t->getPlayerInfo() . '</span></div>
            </li>
            <li class="content-wrapper">
                ' . $t->getContent() . '
            </li>
        </ul>';
        break;
    }
    $html .= '
    </div>';

    return $html;
}
add_shortcode('testimonials', 'testimonials_shortcode');

function sponsors_shortcode() {
    $html = '
    <div class="main-sponsor-wrapper inner-wrapper">
        <p>If you are interested in becoming a sponsor, please call Sully on <a href="tel:0276699192">027 669 9192</a></p>
        <h3>Main Sponsor</h3>';
        foreach(getSponsors(1) as $sponsor) {
            $html .= '<div><a href="' . $sponsor->getLink() . '" target="_blank">' . $sponsor->output() . '</a></div>';
        }
    $html .= '</div>
    <div class="junior-sponsor-wrapper inner-wrapper">
        <h3>Junior Cricket sponsors</h3>
        <div class="sponsors">';
        foreach(getSponsors(2) as $sponsor) {
            if($sponsor->getLink() <> "") {
                $html .= '<div><a href="' . $sponsor->getLink() . '" target="_blank">' . $sponsor->output() . '</a></div>';
            } else {
                $html .= '<div>' . $sponsor->output() . '</div>';
            }
        }
        $html .= '
        </div>
    </div>
    <div class="minor-sponsor-wrapper inner-wrapper">
        <h3>Minor sponsors</h3>
        <div class="sponsors">';
        foreach(getSponsors(4) as $sponsor) {
            if($sponsor->getLink() <> "") {
                $html .= '<div><a href="' . $sponsor->getLink() . '" target="_blank">' . $sponsor->output() . '</a></div>';
            } else {
                $html .= '<div>' . $sponsor->output() . '</div>';
        }
    }
    $html .= '        
    </div>';

    return $html;
}
add_shortcode('sponsors', 'sponsors_shortcode');

function grants_shortcode() {
    $html = '
    <div class="grants-wrapper inner-wrapper">
        <div class="sponsors">';
            foreach(getSponsors(3) as $sponsor) {
            if($sponsor->getLink() <> "") {
            $html .= '<div><a href="' . $sponsor->getLink() . '" target="_blank">' . $sponsor->output() . '</a></div>';
            } else {
            $html .= '<div>' . $sponsor->output() . '</div>';
            }
            }
            $html .= '
        </div>
    </div>';

    return $html;
}

add_shortcode('grants', 'grants_shortcode');

add_shortcode('junior_registrations', 'registrations_shortcode');

function registrations_shortcode() {
    $html = '
    <div class="registrations-cta-wrapper">
        <a href="https://registrations.crichq.com/register/35707" target="_blank">
            <div class="image-wrapper">
                <img src="' . get_stylesheet_directory_uri() . '/images/junior-cricket-registrations.jpg" alt="Inglewood junior cricket registrations" class="responsive-img" />
            </div><div class="content-wrapper">
                <div class="inner-wrapper">
                    <div class="heading">Junior Cricket Registrations</div>
                    <p>Click here</p>
                </div>
            </div>
        </a>
    </div>';

    return $html;
}

function getHighestScore($playerid, $season = "", $compid = "") {
    if($season <> "") {
        $url = 'http://www.thecricketwizard.co.nz/api/api.php?functionName=getAllStats&playerid=' . $playerid . '&season=' . $season . '&comp&opponent&groupby=m.matchid,p.matchinnings&orderby=sum(runs)_desc&limit=1';
    } elseif ($compid <> "") {
        $url = 'http://www.thecricketwizard.co.nz/api/api.php?functionName=getAllStats&playerid=' . $playerid . '&season&comp=m.compid=' . $compid . '&opponent&groupby=m.matchid,p.matchinnings&orderby=sum(runs)_desc&limit=1';
    } else {
        $url = 'http://www.thecricketwizard.co.nz/api/api.php?functionName=getAllStats&playerid=' . $playerid . '&season&comp&opponent&groupby=m.matchid,p.matchinnings&orderby=sum(runs)_desc&limit=1';
    }
    $str = file_get_contents($url);
    $json = json_decode($str, true);

    $hs = $json['data']['runs'][0];
    if($json['data']['dismissal'][0] == 7) $hs .= '*';

    return $hs;
}

function getBestBowled($playerid, $season = "", $compid = "") {
    if($season <> "") {
        $url = 'http://www.thecricketwizard.co.nz/api/api.php?functionName=getAllStats&playerid=' . $playerid . '&season=' . $season . '&comp&opponent&groupby=m.matchid,p.matchinnings&orderby=sum(wickets)_desc&limit=1';
    } elseif($compid <> "") {
        $url = 'http://www.thecricketwizard.co.nz/api/api.php?functionName=getAllStats&playerid=' . $playerid . '&season&comp=m.compid=' . $compid . '&opponent&groupby=m.matchid,p.matchinnings&orderby=sum(wickets)_desc&limit=1';
    } else {
        $url = 'http://www.thecricketwizard.co.nz/api/api.php?functionName=getAllStats&playerid=' . $playerid . '&season&comp&opponent&groupby=m.matchid,p.matchinnings&orderby=sum(wickets)_desc&limit=1';
    }
    $str = file_get_contents($url);
    $json = json_decode($str, true);

    $bb = $json['data']['wickets'][0] . '/' . $json['data']['runsconceded'][0];

    return $bb;
}

function isUnbrokenPartnership($player1, $player2, $matchid, $inningsid) {
    $url1 = 'http://www.thecricketwizard.co.nz/api/api.php?functionName=getMatchPerformances&playerid=' . $player1 . '&match=' . $matchid . '&innings=' . $inningsid . '&orderby=p.matchid_desc';
    $str = file_get_contents($url1);
    $json = json_decode($str, true);
//print_r($json);
    $did1 = $json['data']['did'][0];

    $url2 = 'http://www.thecricketwizard.co.nz/api/api.php?functionName=getMatchPerformances&playerid=' . $player2 . '&match=' . $matchid . '&innings=' . $inningsid . '&orderby=p.matchid_desc';
    $str = file_get_contents($url2);
    $json = json_decode($str, true);

    $did2 = $json['data']['did'][0];

    if($did1 == 7 && $did2 == 7) {
        return true;
    } else {
        return false;
    }
}

function innerStatsMenu($thisPage) {
    $html = '
    <ul class="inner-stats-menu">';
    if($thisPage == 'bat') {
        $html .= '
        <li><a href="' . get_page_link(136) . '">Go to bowling stats</a></li>
        <li><a href="' . get_page_link(137) . '">Go to fielding stats</a></li>
        <li><a href="' . get_page_link(157) . '">Go to all-round stats</a></li>';
    } elseif ($thisPage == 'bowl') {
        $html .= '
        <li><a href="' . get_page_link(135) . '">Go to batting stats</a></li>
        <li><a href="' . get_page_link(137) . '">Go to fielding stats</a></li>
        <li><a href="' . get_page_link(157) . '">Go to all-round stats</a></li>';
    } elseif ($thisPage == 'field') {
        $html .= '
        <li><a href="' . get_page_link(135) . '">Go to batting stats</a></li>
        <li><a href="' . get_page_link(136) . '">Go to bowling stats</a></li>
        <li><a href="' . get_page_link(157) . '">Go to all-round stats</a></li>';
    } elseif ($thisPage == 'allround') {
        $html .= '
        <li><a href="' . get_page_link(135) . '">Go to batting stats</a></li>
        <li><a href="' . get_page_link(136) . '">Go to bowling stats</a></li>
        <li><a href="' . get_page_link(137) . '">Go to fielding stats</a></li>';
    }
    $html .= '
    </ul>';

    return $html;
}

function getImageID($image_url)
{
    global $wpdb;
    $sql = 'SELECT ID FROM wp_posts WHERE guid = "' . $image_url . '"';
    $result = $wpdb->get_results($sql);

    return $result[0]->ID;
}

function getPlayerIDFromMVP($childpostid) {
    global $wpdb;
    $sql = 'SELECT parent_id FROM icc_toolset_associations WHERE child_id = ' . $childpostid;
    $result = $wpdb->get_results($sql);

    return $result[0]->parent_id;
}

function moreStories($id) {
    $innerHtml = '';
    $html = '
    <div class="more-stories-wrapper">
        <h3>More Stories</h3>
        <ul>';
        foreach (getStories() as $story) {
            if($story->id() <> $id) {
                $innerHtml .= '<li><a href="' . $story->link() . '">' . $story->getTitle() . '<span> - By ' . $story->getAuthor() . '</span></a>';
            }
        }
        if($innerHtml == "") {
            $html .= '<li>More player stories coming soon.</li>';
        } else {
            $html .= $innerHtml;
        }
        $html .= '
        </ul>
    </div>';

    return $html;
}

function cartIcons() {
    $html = '
    <ul class="cart-icons-list">
        <li class="ph"><a href="tel:' . formatPhoneNumber(get_option('phone')) . '"><i class="fa fa-phone"></i><span>' . get_option('phone') . '</span></a></li><li><a href="' . get_page_link(313) . '"><span class="fa fa-user"></span></a></li><li><a class="fa fa-shopping-cart" href="'. WC()->cart->get_cart_url() . '"><a class="cart-contents" href="'. WC()->cart->get_cart_url() . '" title="">' . WC()->cart->get_cart_contents_count() . '</a></a></li>
    </ul>';

    return $html;
}
function formatPhoneNumber($ph) {

    $ph = str_replace('(', '', $ph);

    $ph = str_replace(')', '', $ph);

    $ph = str_replace(' ', '', $ph);

    $ph = str_replace('+64', '0', $ph);
    return $ph;
}

function remove_loop_button(){
    remove_action( 'woocommerce_after_shop_loop_item', 'woocommerce_template_loop_add_to_cart', 10 );
}
add_action('init','remove_loop_button');

add_action('woocommerce_after_shop_loop_item','replace_add_to_cart');

add_filter('woocommerce_product_tabs', 'rb_remove_description_tab', 98);

function rb_remove_description_tab($tabs) {

    unset($tabs['additional_information']);

    return $tabs;

}
function replace_add_to_cart() {
    global $product;
    $link = $product->get_permalink();
    echo do_shortcode('<a href="'.$link.'" class="btn btn-outline-primary">View</a>');
}
add_filter( 'wc_product_sku_enabled', '__return_false' );



function getPlayerStats($playerid) {
    $html = '
    <h3>Batting & Fielding Stats</h3>
    <div class="table-responsive">
        <table class="table table-striped nobold">
            <thead>
            <tr>
                <th scope="col">&nbsp;</th>
                <th scope="col">M</th>
                <th scope="col">I</th>
                <th scope="col">NO</th>
                <th scope="col">Runs</th>
                <th scope="col">Ave</th>
                <th scope="col">HS</th>
                <th scope="col">100</th>
                <th scope="col">50</th>
                <th scope="col">4s</th>
                <th scope="col">6s</th>
                <th scope="col">Ct</th>
                <th scope="col">St</th>
            </tr>
            </thead>
            <tbody>';
            $bat_url = 'http://www.thecricketwizard.co.nz/api/api.php?functionName=getAllStats&playerid=' . $playerid . '&season&comp&opponent&runs&wickets&groupby=p.playerid,m.compid&orderby=m.compid_asc&limit';
            $str = file_get_contents($bat_url);
            $json = json_decode($str, true);
            for($i = 0; $i < sizeof($json['data']['fullname']); $i++) {
                $notouts = $json['data']['notouts'][$i];
                $ton = $json['data']['ton'][$i];
                $fifty = $json['data']['fifty'][$i];
                $fours = $json['data']['fours'][$i];
                $sixes = $json['data']['sixes'][$i];
                $hs = getHighestScore($json['data']['cricketwizardid'][$i], "", $json['data']['compid'][$i]);
                //if($json['data']['dismissal'][$i] == 7) $hs .= '*';
                if($json['data']['innings'][$i] == $json['data']['notouts'][$i]) {
                    $ave = "-";
                } else {
                    $ave = round($json['data']['bataverage'][$i],2);
                }
                $html .= '
                <tr>
                    <td>' . $json['data']['competition'][$i] . '</td>
                    <td>' . $json['data']['matches'][$i] . '</td>
                    <td>' . $json['data']['innings'][$i] . '</td>
                    <td>' . $notouts . '</td>
                    <td>' . $json['data']['runs'][$i] . '</td>
                    <td>' . $ave . '</td>
                    <td>' . $hs . '</td>
                    <td>' . $ton . '</td>
                    <td>' . $fifty . '</td>
                    <td>' . $fours . '</td>
                    <td>' . $sixes . '</td>
                    <td>' . $json['data']['catches'][$i] . '</td>
                    <td>' . $json['data']['stumpings'][$i] . '</td>
                </tr>';
            }
            $bat_url = 'http://www.thecricketwizard.co.nz/api/api.php?functionName=getAllStats&playerid=' . $playerid . '&season&comp&opponent&runs&wickets&groupby=p.playerid&orderby&limit';
            $str = file_get_contents($bat_url);
            $json = json_decode($str, true);
            $notouts = $json['data']['notouts'][0];
            $ton = $json['data']['ton'][0];
            $fifty = $json['data']['fifty'][0];
            $fours = $json['data']['fours'][0];
            $sixes = $json['data']['sixes'][0];
            $hs = getHighestScore($json['data']['cricketwizardid'][0]);
            //if($json['data']['dismissal'][$i] == 7) $hs .= '*';
            if($json['data']['innings'][0] == $json['data']['notouts'][0]) {
                $ave = "-";
            } else {
                $ave = round($json['data']['bataverage'][0],2);
            }
            $html .= '
            <tr class="bold-row">
                <td>&nbsp;</td>
                <td>' . $json['data']['matches'][0] . '</td>
                <td>' . $json['data']['innings'][0] . '</td>
                <td>' . $notouts . '</td>
                <td>' . $json['data']['runs'][0] . '</td>
                <td>' . $ave . '</td>
                <td>' . $hs . '</td>
                <td>' . $ton . '</td>
                <td>' . $fifty . '</td>
                <td>' . $fours . '</td>
                <td>' . $sixes . '</td>
                <td>' . $json['data']['catches'][0] . '</td>
                <td>' . $json['data']['stumpings'][0] . '</td>
             </tr>
            </tbody>           
        </table>
    </div>
    <div class="spacer20"></div>
    <h3>Bowling Stats</h3>
    <div class="table-responsive">
        <table class="table table-striped results nobold">
            <thead>
            <tr>
                <th scope="col">&nbsp;</th>
                <th scope="col">M</th>
                <th scope="col">Balls</th>
                <th scope="col">Mdns</th>
                <th scope="col">Runs</th>
                <th scope="col">Wkts</th>
                <th scope="col">BB</th>
                <th scope="col">Ave</th>
                <th scope="col">SR</th>
                <th scope="col">Econ</th>
                <th scope="col">5</th>
                <th scope="col">10</th>
            </tr>
            </thead>
            <tbody>';
            $bowl_url = 'http://www.thecricketwizard.co.nz/api/api.php?functionName=getAllStats&playerid=' . $playerid . '&season&comp&opponent&runs&wickets&groupby=p.playerid,m.compid&orderby=m.compid_asc&limit';
            $str = file_get_contents($bowl_url);
            $json = json_decode($str, true);
            for($i = 0; $i < sizeof($json['data']['fullname']); $i++) {
                $bb = getBestBowled($json['data']['cricketwizardid'][$i], "", $json['data']['compid'][$i]);
                if($json['data']['deliveries'][$i] > 0 && $json['data']['wickets'][$i] == 0) {
                    $bowlave = "-";
                    $sr = "-";
                } else {
                    $bowlave = round($json['data']['bowlaverage'][$i],2);
                    $sr = round($json['data']['strikerate'][$i],2);
                }
                $html .= '
                <tr>
                    <td>' . $json['data']['competition'][$i] . '</td>
                    <td>' . $json['data']['matches'][$i] . '</td>
                    <td>' . $json['data']['deliveries'][$i] . '</td>
                    <td>' . $json['data']['maidens'][$i] . '</td>
                    <td>' . $json['data']['runsconceded'][$i] . '</td>
                    <td>' . $json['data']['wickets'][$i] . '</td>
                    <td>' . $bb . '</td>
                    <td>' . $bowlave . '</td>
                    <td>' . $sr . '</td>
                    <td>' . round($json['data']['rpo'][$i],2) . '</td>
                    <td>' . $json['data']['fivewickets'][$i] . '</td>
                    <td>' . $json['data']['tenwickets'][$i] . '</td>
                </tr>';
            }
            $bowl_url = 'http://www.thecricketwizard.co.nz/api/api.php?functionName=getAllStats&playerid=' . $playerid . '&season&comp&opponent&runs&wickets&groupby=p.playerid&orderby&limit';
            $str = file_get_contents($bowl_url);
            $json = json_decode($str, true);
            $bb = getBestBowled($json['data']['cricketwizardid'][0]);
            if($json['data']['deliveries'][0] > 0 && $json['data']['wickets'][0] == 0) {
                $bowlave = "-";
                $sr = "-";
            } else {
                $bowlave = round($json['data']['bowlaverage'][0],2);
                $sr = round($json['data']['strikerate'][0],2);
            }
            $html .= '
            <tr class="bold-row">
                <td>&nbsp;</td>
                <td>' . $json['data']['matches'][0] . '</td>
                <td>' . $json['data']['deliveries'][0] . '</td>
                <td>' . $json['data']['maidens'][0] . '</td>
                <td>' . $json['data']['runsconceded'][0] . '</td>
                <td>' . $json['data']['wickets'][0] . '</td>
                <td>' . $bb . '</td>
                <td>' . $bowlave . '</td>
                <td>' . $sr . '</td>
                <td>' . round($json['data']['rpo'][0],2) . '</td>
                <td>' . $json['data']['fivewickets'][0] . '</td>
                <td>' . $json['data']['tenwickets'][0] . '</td>
            </tr>
            </tbody>
        </table>
    </div>';

    return $html;
}

if(isset($_REQUEST['ajax']) && $_REQUEST['ajax'] == "show_player_bio") {
    $html = '';
    $player = new Player($_REQUEST['playerid']);
    $colid = $_REQUEST['colid'];
    ($player->getContent() <> "") ? $bio = $player->getContent() : $bio = '<p>Player bio coming soon...</p>';
    $html .= '
    <div class="bio-content row">
        <div class="close-me fa fa-times" onclick="closeStaffBio();"></div>
        <div class="col-xl-12">
            <h2>' . $player->getTitle() . '</h2>
        </div>
        <div class="col-xs-12 col-md-8">
            <div class="bio">
                ' . $bio . '
            </div>
        </div>
        <div class="col-md-4 vc_hidden-xs">';
            if($player->getBioImage() <> "") {
                $html .= '<img src="' . $player->getBioImage() . '" alt="' . $player->getTitle() . '" class="responsive-img" />';
            }
        $html .= '
        </div>
        <div class="col-xl-12 players-career-stats">
            ' . getPlayerStats($player->getCricketWizardID()) . '
        </div>
    </div>';

    echo $html;
    exit;
}
if(isset($_REQUEST['ajax']) && $_REQUEST['ajax'] == "get_stats_for_home_page") {
    $season = get_option('season');
    $batting_stats = 'http://www.thecricketwizard.co.nz/api/api.php?functionName=getAllStats&playerid&season=' . $season . '&comp&opponent&runs&wickets&groupby=p.playerid&orderby=sum(runs)_desc&limit=1';
    $str = file_get_contents($batting_stats);
    $json = json_decode($str, true);

    $batsmenid = $json['data']['cricketwizardid'][0];
    $runs = $json['data']['runs'][0];
    $batsmen = getPlayer($batsmenid);

    $bowling_stats = 'http://www.thecricketwizard.co.nz/api/api.php?functionName=getAllStats&playerid&season=' . $season . '&comp&opponent&runs&wickets&groupby=p.playerid&orderby=sum(wickets)_desc&limit=1';
    $str = file_get_contents($bowling_stats);
    $json = json_decode($str, true);

    $bowlerid = $json['data']['cricketwizardid'][0];
    $wickets = $json['data']['wickets'][0];
    $bowler = getPlayer($bowlerid);

    $catching_stats = 'http://www.thecricketwizard.co.nz/api/api.php?functionName=getAllStats&playerid&season=' . $season . '&comp&opponent&runs&wickets&groupby=p.playerid&orderby=sum(catches)_desc&limit=1';
    $str = file_get_contents($catching_stats);
    $json = json_decode($str, true);

    $catcherid = $json['data']['cricketwizardid'][0];
    $catches = $json['data']['catches'][0];
    $catcher = getPlayer($catcherid);
    $html = '
        <div class="col-xs-12 col-sm-6 col-md-4 col-xl-4 player-panel-wrapper">
            <div class="panel-title">Top Run Scorer</div>
            <div class="image-wrapper">
                <img src="' . $batsmen[0]->getProfileImage() . '" alt="' . $batsmen[0]->getTitle() . '" class="responsive-img" />
            </div>
            <div class="name">' . $batsmen[0]->getTitle() . '</div>
            <div class="stat"><span>' . $runs . '</span></div>
        </div>
        <div class="col-xs-12 col-sm-6 col-md-4 col-xl-4 player-panel-wrapper">
            <div class="panel-title">Top Wicket Taker</div>
            <div class="image-wrapper">
                <img src="' . $bowler[0]->getProfileImage() . '" alt="' . $bowler[0]->getTitle() . '" class="responsive-img" />
            </div>
            <div class="name">' . $bowler[0]->getTitle() . '</div>
            <div class="stat"><span>' . $wickets . '</span></div>
        </div>
        <div class="col-xs-12 col-sm-6 col-md-4 col-xl-4 player-panel-wrapper">
            <div class="panel-title">Top Catcher</div>
            <div class="image-wrapper">
                <img src="' . $catcher[0]->getProfileImage() . '" alt="' . $catcher[0]->getTitle() . '" class="responsive-img" />
            </div>
            <div class="name">' . $catcher[0]->getTitle() . '</div>
            <div class="stat"><span>' . $catches . '</span></div>
        </div>';
    echo $html;
    exit;
}
if(isset($_REQUEST['ajax']) && $_REQUEST['ajax'] == "get_prem_records") {
    // go through each record and randomly choose three to display on the home page.
    $records = array("Most caps", "Most runs", "Most wickets", "Most runs in a season", "Most sixes in a season", "Most sixes in a match", "Most wickets in a season", "Most catches in a season", "Most catches in a match", "Most wickets in a match", "Highest individual score", "Best bowling figures", "Most centuries", "Most 5 wicket bags");
    shuffle($records);
    $html = '';
    $player = '';
    $stat = '';
    $season = '';
    $opponent = '';
    $runs = '';
    $wickets = '';
    foreach($records as $record) {
        switch ($record) {
            case "Most caps":
                $url = 'http://www.thecricketwizard.co.nz/api/api.php?functionName=getAllStats&playerid&season&comp=c.compid<>9&opponent&runs&wickets&groupby=p.playerid&orderby=sum(m.matchid)_desc&limit=1';
                $str = file_get_contents($url);
                $json = json_decode($str, true);
                $player = getPlayer($json['data']['cricketwizardid'][0]);
                $stat = $json['data']['matches'][0];
                break;
            case "Most runs":
                $url = 'http://www.thecricketwizard.co.nz/api/api.php?functionName=getAllStats&playerid&season&comp&opponent&runs&wickets&groupby=p.playerid&orderby=sum(runs)_desc&limit=1';
                $str = file_get_contents($url);
                $json = json_decode($str, true);
                $player = getPlayer($json['data']['cricketwizardid'][0]);
                $stat = $json['data']['runs'][0];
                break;
            case "Most runs in a season":
                $url = 'http://www.thecricketwizard.co.nz/api/api.php?functionName=getAllStats&playerid&season&comp&opponent&runs&wickets&groupby=season,p.playerid&orderby=sum(runs)_desc&limit=1';
                $str = file_get_contents($url);
                $json = json_decode($str, true);
                $player = getPlayer($json['data']['cricketwizardid'][0]);
                $stat = $json['data']['runs'][0];
                $season = $json['data']['season'][0];
                break;
            case "Most wickets":
                $url = 'http://www.thecricketwizard.co.nz/api/api.php?functionName=getAllStats&playerid&season&comp&opponent&runs&wickets&groupby=p.playerid&orderby=sum(wickets)_desc&limit=1';
                $str = file_get_contents($url);
                $json = json_decode($str, true);
                $player = getPlayer($json['data']['cricketwizardid'][0]);
                $stat = $json['data']['wickets'][0];
                break;
            case "Most sixes in a season":
                $url = 'http://www.thecricketwizard.co.nz/api/api.php?functionName=getAllStats&playerid&season&comp&opponent&runs&wickets&groupby=season,p.playerid&orderby=sum(sixes)_desc&limit=1';
                $str = file_get_contents($url);
                $json = json_decode($str, true);
                $player = getPlayer($json['data']['cricketwizardid'][0]);
                $stat = $json['data']['sixes'][0];
                $season = $json['data']['season'][0];
                break;
            case "Most sixes in a match":
                $url = 'http://www.thecricketwizard.co.nz/api/api.php?functionName=getAllStats&playerid&season&comp&opponent&runs&wickets&groupby=m.matchid,p.playerid&orderby=sum(sixes)_desc,_season_desc&limit=1';
                $str = file_get_contents($url);
                $json = json_decode($str, true);
                $player = getPlayer($json['data']['cricketwizardid'][0]);
                $stat = $json['data']['sixes'][0];
                $season = $json['data']['season'][0];
                $opponent = $json['data']['opponent'][0];
                break;
            case "Most wickets in a season":
                $url = 'http://www.thecricketwizard.co.nz/api/api.php?functionName=getAllStats&playerid&season&comp&opponent&runs&wickets&groupby=season,p.playerid&orderby=sum(wickets)_desc&limit=1';
                $str = file_get_contents($url);
                $json = json_decode($str, true);
                $player = getPlayer($json['data']['cricketwizardid'][0]);
                $stat = $json['data']['wickets'][0];
                $season = $json['data']['season'][0];
                break;
            case "Most catches in a season":
                $url = 'http://www.thecricketwizard.co.nz/api/api.php?functionName=getAllStats&playerid&season&comp&opponent&runs&wickets&groupby=season,p.playerid&orderby=sum(catches)_desc&limit=1';
                $str = file_get_contents($url);
                $json = json_decode($str, true);
                $player = getPlayer($json['data']['cricketwizardid'][0]);
                $stat = $json['data']['catches'][0];
                $season = $json['data']['season'][0];
                break;
            case "Most catches in a match":
                $url = 'http://www.thecricketwizard.co.nz/api/api.php?functionName=getAllStats&playerid&season&comp&opponent&runs&wickets&groupby=m.matchid,p.playerid&orderby=sum(catches)_desc,_season_desc&limit=1';
                $str = file_get_contents($url);
                $json = json_decode($str, true);
                $player = getPlayer($json['data']['cricketwizardid'][0]);
                $stat = $json['data']['catches'][0];
                $season = $json['data']['season'][0];
                $opponent = $json['data']['opponent'][0];
                break;
            case "Most wickets in a match":
                $url = 'http://www.thecricketwizard.co.nz/api/api.php?functionName=getAllStats&playerid&season&comp&opponent&runs&wickets&groupby=m.matchid,p.playerid&orderby=sum(wickets)_desc,_season_desc&limit=1';
                $str = file_get_contents($url);
                $json = json_decode($str, true);
                $player = getPlayer($json['data']['cricketwizardid'][0]);
                $stat = $json['data']['wickets'][0];
                $season = $json['data']['season'][0];
                $opponent = $json['data']['opponent'][0];
                break;
            case "Highest individual score":
                $url = 'http://www.thecricketwizard.co.nz/api/api.php?functionName=getAllStats&playerid&season&comp&opponent&runs&wickets&groupby=m.matchid,p.matchinnings,p.playerid&orderby=sum(runs)_desc,_season_desc&limit=1';
                $str = file_get_contents($url);
                $json = json_decode($str, true);
                $player = getPlayer($json['data']['cricketwizardid'][0]);
                $stat = $json['data']['runs'][0];
                $season = $json['data']['season'][0];
                $opponent = $json['data']['opponent'][0];
                if ($json['data']['did'][0] == 7) $stat = $stat . '*';
                break;
            case "Best bowling figures":
                $url = 'http://www.thecricketwizard.co.nz/api/api.php?functionName=getAllStats&playerid&season&comp&opponent&runs&wickets&groupby=p.playerid,m.matchid&orderby=sum(wickets)_desc&limit=1';
                $str = file_get_contents($url);
                $json = json_decode($str, true);
                $player = getPlayer($json['data']['cricketwizardid'][0]);
                $stat = $json['data']['wickets'][0] . '/' . $json['data']['runsconceded'][0];
                $season = $json['data']['season'][0];
                $opponent = $json['data']['opponent'][0];
                break;
            case "Most centuries":
                $url = 'http://www.thecricketwizard.co.nz/api/api.php?functionName=getAllStats&playerid&season&comp&opponent&runs=bat.runs>=100&wickets&groupby=p.playerid&orderby=matches_desc&limit=1';
                $str = file_get_contents($url);
                $json = json_decode($str, true);
                $player = getPlayer($json['data']['cricketwizardid'][0]);
                $stat = $json['data']['matches'][0];
                break;
            case "Most 5 wicket bags":
                $url = 'http://www.thecricketwizard.co.nz/api/api.php?functionName=getAllStats&playerid&season&comp&opponent&runs&wickets=bowl.wickets>=5&groupby=p.playerid&orderby=matches_desc&limit=1';
                $str = file_get_contents($url);
                $json = json_decode($str, true);
                $player = getPlayer($json['data']['cricketwizardid'][0]);
                $stat = $json['data']['matches'][0];
                break;
        }
        $name = $player[0]->getTitle();
        if ($season <> '' && $opponent == '') $name .= ' - ' . $season;
        if ($opponent <> '') $name .= '<span> vs ' . $opponent . ' - ' . $season;
        $html .= '
         <div class="prem-stats">
            <div>
                <div class="player-panel-wrapper">
                    <div class="panel-title">' . $record . '</div>
                    <div class="image-wrapper">
                        <img src="' . $player[0]->getProfileImage() . '" alt="' . $player[0]->getTitle() . '" class="responsive-img" />
                    </div>
                    <div class="name">' . $name . '</div>
                    <div class="stat"><span>' . $stat . '</span></div>
                </div>
            </div>
         </div>';
    }
    echo $html;
    exit;
}