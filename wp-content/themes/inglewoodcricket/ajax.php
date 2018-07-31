<?php
/*** Ajax calls ***/
if(isset($_REQUEST['ajax']) && $_REQUEST['ajax'] == "get_career_batting_stats") {
    $html = '';
    $bat_url = 'http://www.thecricketwizard.co.nz/api/api.php?functionName=getAllStats&playerid&season&comp&opponent&runs&wickets&groupby=p.playerid&orderby=sum(runs)_desc&limit';
    $str = file_get_contents($bat_url);
    $json = json_decode($str, true);
    //print_r($json['data']);
    for($i = 0; $i < sizeof($json['data']['fullname']); $i++) {
        if($json['data']['innings'][$i] > 0) {
            $notouts = $json['data']['notouts'][$i];
            $ton = $json['data']['ton'][$i];
            $fifty = $json['data']['fifty'][$i];
            $fours = $json['data']['fours'][$i];
            $sixes = $json['data']['sixes'][$i];
            $hs = getHighestScore($json['data']['cricketwizardid'][$i]);
            //if($json['data']['dismissal'][$i] == 7) $hs .= '*';
            if($json['data']['innings'][$i] == $json['data']['notouts'][$i]) {
                $ave = "-";
            } else {
                $ave = round($json['data']['bataverage'][$i],2);
            }
            $html .= '
                <tr>
                    <td>' . ($i+1) . '</td>
                    <td>' . $json['data']['fullname'][$i] . '</td>
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
                </tr>';
        }

    }
    echo $html;
    exit;
}
if(isset($_REQUEST['ajax']) && $_REQUEST['ajax'] == "get_most_runs_in_season_stats") {
    $html = '';
    $bat_url = 'http://www.thecricketwizard.co.nz/api/api.php?functionName=getAllStats&playerid&season&comp&opponent&runs&wickets&groupby=p.playerid,season&orderby=sum(runs)_desc&limit=5';
    $str = file_get_contents($bat_url);
    $json = json_decode($str, true);
    //print_r($json['data']);
    for($i = 0; $i < sizeof($json['data']['fullname']); $i++) {
        if($json['data']['innings'][$i] > 0) {
            $notouts = $json['data']['notouts'][$i];
            $ton = $json['data']['ton'][$i];
            $fifty = $json['data']['fifty'][$i];
            $fours = $json['data']['fours'][$i];
            $sixes = $json['data']['sixes'][$i];
            $hs = getHighestScore($json['data']['cricketwizardid'][$i], $json['data']['season'][$i]);
            //if($json['data']['dismissal'][$i] == 7) $hs .= '*';
            if($json['data']['innings'][$i] == $json['data']['notouts'][$i]) {
                $ave = "-";
            } else {
                $ave = round($json['data']['bataverage'][$i],2);
            }
            $html .= '
                <tr>
                    <td>' . ($i+1) . '</td>
                    <td>' . $json['data']['fullname'][$i] . '</td>
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
                    <td>' . $json['data']['season'][$i] . '</td>
                </tr>';
        }

    }
    echo $html;
    exit;
}
if(isset($_REQUEST['ajax']) && $_REQUEST['ajax'] == "get_top_batting_ave_stats") {
    $html = '';
    $bat_url = 'http://www.thecricketwizard.co.nz/api/api.php?functionName=getAllStats&playerid&season&comp&opponent&runs&wickets&groupby=p.playerid&orderby=sum(runs)/sum(dismissal)_desc&limit';
    $str = file_get_contents($bat_url);
    $json = json_decode($str, true);
    $n = 1;
    //print_r($json['data']);
    for($i = 0; $i < sizeof($json['data']['fullname']); $i++) {
        if($json['data']['innings'][$i] >= 20) {
            $notouts = $json['data']['notouts'][$i];
            $ton = $json['data']['ton'][$i];
            $fifty = $json['data']['fifty'][$i];
            $fours = $json['data']['fours'][$i];
            $sixes = $json['data']['sixes'][$i];
            $hs = getHighestScore($json['data']['cricketwizardid'][$i]);
            //if($json['data']['dismissal'][$i] == 7) $hs .= '*';
            if($json['data']['innings'][$i] == $json['data']['notouts'][$i]) {
                $ave = "-";
            } else {
                $ave = round($json['data']['bataverage'][$i],2);
            }
            $html .= '
            <tr>
                <td>' . $n . '</td>
                <td>' . $json['data']['fullname'][$i] . '</td>
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
            </tr>';
            if($n == 5) break;
            $n++;
        }
    }
    echo $html;
    exit;
}
if(isset($_REQUEST['ajax']) && $_REQUEST['ajax'] == "get_most_sixes") {
    $html = '';
    $bat_url = 'http://www.thecricketwizard.co.nz/api/api.php?functionName=getAllStats&playerid&season&comp&opponent&runs&wickets&groupby=p.playerid&orderby=sum(sixes)_desc&limit=5';
    $str = file_get_contents($bat_url);
    $json = json_decode($str, true);
    //print_r($json['data']);
    for($i = 0; $i < sizeof($json['data']['fullname']); $i++) {
        $notouts = $json['data']['notouts'][$i];
        $ton = $json['data']['ton'][$i];
        $fifty = $json['data']['fifty'][$i];
        $fours = $json['data']['fours'][$i];
        $sixes = $json['data']['sixes'][$i];
        if($json['data']['innings'][$i] == 0) {
            $notouts = "-";
            $hs = "-";
            $ton = "-";
            $fifty = "-";
            $fours = "-";
            $sixes = "-";
            $ave = "-";
        } else {
            $hs = getHighestScore($json['data']['cricketwizardid'][$i]);
            //if($json['data']['dismissal'][$i] == 7) $hs .= '*';
            if($json['data']['innings'][$i] == $json['data']['notouts'][$i]) {
                $ave = "-";
            } else {
                $ave = round($json['data']['bataverage'][$i],2);
            }
        }
        $html .= '
        <tr>
            <td>' . ($i+1) . '</td>
            <td>' . $json['data']['fullname'][$i] . '</td>
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
        </tr>';
    }
    echo $html;
    exit;
}
if(isset($_REQUEST['ajax']) && $_REQUEST['ajax'] == "get_most_fours") {
    $html = '';
    $bat_url = 'http://www.thecricketwizard.co.nz/api/api.php?functionName=getAllStats&playerid&season&comp&opponent&runs&wickets&groupby=p.playerid&orderby=sum(boundaries)_desc&limit=5';
    $str = file_get_contents($bat_url);
    $json = json_decode($str, true);
    //print_r($json['data']);
    for($i = 0; $i < sizeof($json['data']['fullname']); $i++) {
        $notouts = $json['data']['notouts'][$i];
        $ton = $json['data']['ton'][$i];
        $fifty = $json['data']['fifty'][$i];
        $fours = $json['data']['fours'][$i];
        $sixes = $json['data']['sixes'][$i];
        if($json['data']['innings'][$i] == 0) {
            $notouts = "-";
            $hs = "-";
            $ton = "-";
            $fifty = "-";
            $fours = "-";
            $sixes = "-";
            $ave = "-";
        } else {
            $hs = getHighestScore($json['data']['cricketwizardid'][$i]);
            //if($json['data']['dismissal'][$i] == 7) $hs .= '*';
            if($json['data']['innings'][$i] == $json['data']['notouts'][$i]) {
                $ave = "-";
            } else {
                $ave = round($json['data']['bataverage'][$i],2);
            }
        }
        $html .= '
        <tr>
            <td>' . ($i+1) . '</td>
            <td>' . $json['data']['fullname'][$i] . '</td>
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
        </tr>';
    }
    echo $html;
    exit;
}
if(isset($_REQUEST['ajax']) && $_REQUEST['ajax'] == "get_highest_score") {
    $html = '';
    $bat_url = 'http://www.thecricketwizard.co.nz/api/api.php?functionName=getAllStats&playerid&season&comp&opponent&groupby=p.playerid,m.matchid,p.matchinnings&orderby=sum(runs)_desc&limit=5';
    $str = file_get_contents($bat_url);
    $json = json_decode($str, true);
    //print_r($json['data']);
    for($i = 0; $i < sizeof($json['data']['fullname']); $i++) {
        $hs = $json['data']['runs'][$i];
        if($json['data']['dismissal'][$i] == 7) $hs .= '*';
        $html .= '
            <tr>
                <td>' . ($i+1) . '</td>
                <td>' . $json['data']['fullname'][$i] . '</td>
                <td>' . $hs . '</td>
                <td>' . $json['data']['opponent'][$i] . '</td>
                <td>' . $json['data']['season'][$i] . '</td>
            </tr>';
    }
    echo $html;
    exit;
}
if(isset($_REQUEST['ajax']) && $_REQUEST['ajax'] == "get_most_tons") {
    $html = '';
    $bat_url = 'http://www.thecricketwizard.co.nz/api/api.php?functionName=getAllStats&playerid&season&comp&opponent&runs=runs>=100&wickets&groupby=p.playerid&orderby=count(bat.battingid)_desc&limit=5';
    $str = file_get_contents($bat_url);
    $json = json_decode($str, true);
    //print_r($json['data']);
    for($i = 0; $i < sizeof($json['data']['fullname']); $i++) {
        $html .= '
        <tr>
            <td>' . ($i+1) . '</td>
            <td>' . $json['data']['fullname'][$i] . '</td>
            <td>' . $json['data']['innings'][$i] . '</td>
        </tr>';
    }
    echo $html;
    exit;
}
if(isset($_REQUEST['ajax']) && $_REQUEST['ajax'] == "get_most_fifties") {
    $html = '';
    $bat_url = 'http://www.thecricketwizard.co.nz/api/api.php?functionName=getAllStats&playerid&season&comp&opponent&runs=runs>49_AND_runs<100&wickets&groupby=p.playerid&orderby=count(bat.battingid)_desc&limit=5';
    $str = file_get_contents($bat_url);
    $json = json_decode($str, true);
    //print_r($json['data']);
    for($i = 0; $i < sizeof($json['data']['fullname']); $i++) {
        $html .= '
        <tr>
            <td>' . ($i+1) . '</td>
            <td>' . $json['data']['fullname'][$i] . '</td>
            <td>' . $json['data']['innings'][$i] . '</td>
        </tr>';
    }
    echo $html;
    exit;
}
if(isset($_REQUEST['ajax']) && $_REQUEST['ajax'] == "get_highest_batting_partnership") {
    $html = '';
    $bat_url = 'http://www.thecricketwizard.co.nz/api/api.php?functionName=getBattingPartnerships&partnership=100&wicket&orderby=partnership_desc&limit=5';
    $str = file_get_contents($bat_url);
    $json = json_decode($str, true);
    //print_r($json['data']);
    for($i = 0; $i < sizeof($json['data']['player1']); $i++) {
        $batsmen = $json['data']['player1'][$i] . ', ' . $json['data']['player2'][$i];
        $partnership = $json['data']['partnership'][$i];
        if (isUnbrokenPartnership($json['data']['p1id'][$i], $json['data']['p2id'][$i], $json['data']['matchid'][$i], $json['data']['inningsid'][$i])) $partnership .= '*';
        $html .= '
        <tr>
            <td>' .  ($i+1) . '</td>
            <td>' . $json['data']['wicket'][$i] . '</td>
            <td>' . $partnership . '</td>
            <td>' . $batsmen . '</td>
            <td>' . $json['data']['opponent'][$i] . '</td>
            <td>' . $json['data']['venue'][$i] . '</td>
            <td>' . $json['data']['season'][$i] . '</td>
        </tr>';
    }
    echo $html;
    exit;
}
if(isset($_REQUEST['ajax']) && $_REQUEST['ajax'] == "get_batting_partnership_records") {
    $html = '';
    for($i = 1; $i <= 10; $i++) {
        $url = 'http://www.thecricketwizard.co.nz/api/api.php?functionName=getBattingPartnerships&partnership&wicket=' . $i . '&orderby=partnership_desc&limit=1';
        $str = file_get_contents($url);
        $json = json_decode($str, true);
        $batsmen = $json['data']['player1'][0] . ', ' . $json['data']['player2'][0];
        $partnership = $json['data']['partnership'][0];
        if (isUnbrokenPartnership($json['data']['p1id'][0], $json['data']['p2id'][0], $json['data']['matchid'][0], $json['data']['inningsid'][0])) $partnership .= '*';
       $html .= '
        <tr>
            <td>' .  $i . '</td>
            <td>' . $partnership . '</td>
            <td>' . $batsmen . '</td>
            <td>' . $json['data']['opponent'][0] . '</td>
            <td>' . $json['data']['venue'][0] . '</td>
            <td>' . $json['data']['season'][0] . '</td>
        </tr>';
    }
    echo $html;
    exit;
}
if(isset($_REQUEST['ajax']) && $_REQUEST['ajax'] == "get_career_bowling_stats") {
    $html = '';
    $bowl_url = 'http://www.thecricketwizard.co.nz/api/api.php?functionName=getAllStats&playerid&season&comp&opponent&runs&wickets&groupby=p.playerid&orderby=sum(wickets)_desc&limit';
    $str = file_get_contents($bowl_url);
    $json = json_decode($str, true);
    //print_r($json['data']);
    for($i = 0; $i < sizeof($json['data']['fullname']); $i++) {
        if($json['data']['deliveries'][$i] > 0) {
            $bb = getBestBowled($json['data']['cricketwizardid'][$i]);
            if($json['data']['deliveries'][$i] > 0 && $json['data']['wickets'][$i] == 0) {
                $bowlave = "-";
                $sr = "-";
            } else {
                $bowlave = round($json['data']['bowlaverage'][$i],2);
                $sr = round($json['data']['strikerate'][$i],2);
            }
            $html .= '
            <tr>
                <td>' . ($i+1) . '</td>
                <td>' . $json['data']['fullname'][$i] . '</td>
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

    }
    echo $html;
    exit;
}
if(isset($_REQUEST['ajax']) && $_REQUEST['ajax'] == "get_top_wickets_in_season") {
    $html = '';
    $bowl_url = 'http://www.thecricketwizard.co.nz/api/api.php?functionName=getAllStats&playerid&season&comp&opponent&groupby=p.playerid,season&orderby=sum(wickets)_desc&limit=5';
    $str = file_get_contents($bowl_url);
    $json = json_decode($str, true);
    //print_r($json['data']);
    for($i = 0; $i < sizeof($json['data']['fullname']); $i++) {
        if($json['data']['deliveries'][$i] > 0) {
            $bb = getBestBowled($json['data']['cricketwizardid'][$i],$json['data']['season'][$i]);
            if($json['data']['deliveries'][$i] > 0 && $json['data']['wickets'][$i] == 0) {
                $bowlave = "-";
                $sr = "-";
            } else {
                $bowlave = round($json['data']['bowlaverage'][$i],2);
                $sr = round($json['data']['strikerate'][$i],2);
            }
            $html .= '
            <tr>
                <td>' . ($i+1) . '</td>
                <td>' . $json['data']['fullname'][$i] . '</td>
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

    }
    echo $html;
    exit;
}
if(isset($_REQUEST['ajax']) && $_REQUEST['ajax'] == "get_top_bowling_ave") {
    $html = '';
    $bowl_url = 'http://www.thecricketwizard.co.nz/api/api.php?functionName=getAllStats&playerid&season&comp&opponent&runs&wickets&groupby=p.playerid&orderby=bowlaverage_asc&limit';
    $str = file_get_contents($bowl_url);
    $json = json_decode($str, true);
    $n = 1;
    //print_r($json['data']);
    for($i = 0; $i < sizeof($json['data']['fullname']); $i++) {
        if($json['data']['deliveries'][$i] >= 2000) {
            $bb = getBestBowled($json['data']['cricketwizardid'][$i]);
            if($json['data']['wickets'][$i] == 0) {
                $bowlave = "-";
                $sr = "-";
            } else {
                $bowlave = round($json['data']['bowlaverage'][$i],2);
                $sr = round($json['data']['strikerate'][$i],2);
            }
            $html .= '
            <tr>
                <td>' . $n . '</td>
                <td>' . $json['data']['fullname'][$i] . '</td>
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
            if($n == 5) break;
            $n++;
        }
    }
    echo $html;
    exit;
}
if(isset($_REQUEST['ajax']) && $_REQUEST['ajax'] == "get_top_bowling_sr") {
    $html = '';
    $bowl_url = 'http://www.thecricketwizard.co.nz/api/api.php?functionName=getAllStats&playerid&season&comp&opponent&runs&wickets&groupby=p.playerid&orderby=strikerate_asc&limit';
    $str = file_get_contents($bowl_url);
    $json = json_decode($str, true);
    $n = 1;
    //print_r($json['data']);
    for($i = 0; $i < sizeof($json['data']['fullname']); $i++) {
        if($json['data']['deliveries'][$i] >= 2000) {
            $bb = getBestBowled($json['data']['cricketwizardid'][$i]);
            if($json['data']['wickets'][$i] == 0) {
                $bowlave = "-";
                $sr = "-";
            } else {
                $bowlave = round($json['data']['bowlaverage'][$i],2);
                $sr = round($json['data']['strikerate'][$i],2);
            }
            $html .= '
            <tr>
                <td>' . $n . '</td>
                <td>' . $json['data']['fullname'][$i] . '</td>
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
            if($n == 5) break;
            $n++;
        }
    }
    echo $html;
    exit;
}
if(isset($_REQUEST['ajax']) && $_REQUEST['ajax'] == "get_top_bowling_rpo") {
    $html = '';
    $bowl_url = 'http://www.thecricketwizard.co.nz/api/api.php?functionName=getAllStats&playerid&season&comp&opponent&runs&wickets&groupby=p.playerid&orderby=rpo_asc&limit';
    $str = file_get_contents($bowl_url);
    $json = json_decode($str, true);
    $n = 1;
    //print_r($json['data']);
    for($i = 0; $i < sizeof($json['data']['fullname']); $i++) {
        if($json['data']['deliveries'][$i] >= 2000) {
            $bb = getBestBowled($json['data']['cricketwizardid'][$i]);
            if($json['data']['wickets'][$i] == 0) {
                $bowlave = "-";
                $sr = "-";
            } else {
                $bowlave = round($json['data']['bowlaverage'][$i],2);
                $sr = round($json['data']['strikerate'][$i],2);
            }
            $html .= '
            <tr>
                <td>' . $n . '</td>
                <td>' . $json['data']['fullname'][$i] . '</td>
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
            if($n == 5) break;
            $n++;
        }
    }
    echo $html;
    exit;
}
if(isset($_REQUEST['ajax']) && $_REQUEST['ajax'] == "get_top_bowling_figures_match") {
    $html = '';
    $bowl_url = 'http://www.thecricketwizard.co.nz/api/api.php?functionName=getAllStats&playerid&season&comp&opponent&groupby=p.playerid,m.matchid&orderby=sum(wickets)_desc&limit=5';
    $str = file_get_contents($bowl_url);
    $json = json_decode($str, true);
    //print_r($json['data']);
    for($i = 0; $i < sizeof($json['data']['fullname']); $i++) {
        $bb = $json['data']['wickets'][$i];
        $bb .= '/' . $json['data']['runsconceded'][$i];
        $html .= '
        <tr>
            <td>' . ($i+1) . '</td>
            <td>' . $json['data']['fullname'][$i] . '</td>
            <td>' . $bb . '</td>
            <td>' . $json['data']['opponent'][$i] . '</td>
            <td>' . $json['data']['season'][$i] . '</td>
        </tr>';
    }
    echo $html;
    exit;
}
if(isset($_REQUEST['ajax']) && $_REQUEST['ajax'] == "get_top_bowling_figures_innings") {
    $html = '';
    $bowl_url = 'http://www.thecricketwizard.co.nz/api/api.php?functionName=getAllStats&playerid&season&comp&opponent&groupby=p.playerid,m.matchid,p.matchinnings&orderby=sum(wickets)_desc&limit=5';
    $str = file_get_contents($bowl_url);
    $json = json_decode($str, true);
    //print_r($json['data']);
    for($i = 0; $i < sizeof($json['data']['fullname']); $i++) {
        $bb = $json['data']['wickets'][$i];
        $bb .= '/' . $json['data']['runsconceded'][$i];
        $html .= '
        <tr>
            <td>' . ($i+1) . '</td>
            <td>' . $json['data']['fullname'][$i] . '</td>
            <td>' . $bb . '</td>
            <td>' . $json['data']['opponent'][$i] . '</td>
            <td>' . $json['data']['season'][$i] . '</td>
        </tr>';
    }
    echo $html;
    exit;
}
if(isset($_REQUEST['ajax']) && $_REQUEST['ajax'] == "get_career_fielding_stats") {
    $html = '';
    $bowl_url = 'http://www.thecricketwizard.co.nz/api/api.php?functionName=getAllStats&playerid&season&comp&opponent&runs&wickets&groupby=p.playerid&orderby=dismissals_desc&limit';
    $str = file_get_contents($bowl_url);
    $json = json_decode($str, true);
    //print_r($json['data']);
    for($i = 0; $i < sizeof($json['data']['fullname']); $i++) {
        if($json['data']['catches'][$i] > 0 || $json['data']['stumpings'][$i] > 0) {
            $html .= '
            <tr>
                <td>' . ($i+1) . '</td>
                <td>' . $json['data']['fullname'][$i] . '</td>
                <td>' . $json['data']['matches'][$i] . '</td>
                <td>' . $json['data']['catches'][$i] . '</td>
                <td>' . $json['data']['stumpings'][$i] . '</td>
                <td>' . $json['data']['dismissals'][$i] . '</td>
            </tr>';
        }
    }
    echo $html;
    exit;
}
if(isset($_REQUEST['ajax']) && $_REQUEST['ajax'] == "get_most_dismissals_match") {
    $html = '';
    $bowl_url = 'http://www.thecricketwizard.co.nz/api/api.php?functionName=getAllStats&playerid&season&comp&opponent&runs&wickets&groupby=p.playerid,m.matchid&orderby=dismissals_desc,season_desc&limit=5';
    $str = file_get_contents($bowl_url);
    $json = json_decode($str, true);
    for($i = 0; $i < sizeof($json['data']['fullname']); $i++) {
        $html .= '
        <tr>
            <td>' . ($i+1) . '</td>
            <td>' . $json['data']['fullname'][$i] . '</td>
            <td>' . $json['data']['catches'][$i] . '</td>
            <td>' . $json['data']['stumpings'][$i] . '</td>
            <td>' . $json['data']['dismissals'][$i] . '</td>
            <td>' . $json['data']['opponent'][$i] . '</td>
            <td>' . $json['data']['season'][$i] . '</td>
        </tr>';
    }
    echo $html;
    exit;
}
if(isset($_REQUEST['ajax']) && $_REQUEST['ajax'] == "get_most_catches_season") {
    $html = '';
    $bowl_url = 'http://www.thecricketwizard.co.nz/api/api.php?functionName=getAllStats&playerid&season&comp&opponent&runs&wickets&groupby=p.playerid,season&orderby=sum(catches)_desc,season_desc&limit=5';
    $str = file_get_contents($bowl_url);
    $json = json_decode($str, true);
    for($i = 0; $i < sizeof($json['data']['fullname']); $i++) {
        $html .= '
        <tr>
            <td>' . ($i+1) . '</td>
            <td>' . $json['data']['fullname'][$i] . '</td>
            <td>' . $json['data']['catches'][$i] . '</td>
            <td>' . $json['data']['season'][$i] . '</td>
        </tr>';
    }
    echo $html;
    exit;
}
if(isset($_REQUEST['ajax']) && $_REQUEST['ajax'] == "get_most_stumpings") {
    $html = '';
    $bowl_url = 'http://www.thecricketwizard.co.nz/api/api.php?functionName=getAllStats&playerid&season&comp&opponent&runs&wickets&groupby=p.playerid&orderby=sum(stumpings)_desc,season_desc&limit=5';
    $str = file_get_contents($bowl_url);
    $json = json_decode($str, true);
    for($i = 0; $i < sizeof($json['data']['fullname']); $i++) {
        $html .= '
        <tr>
            <td>' . ($i+1) . '</td>
            <td>' . $json['data']['fullname'][$i] . '</td>
            <td>' . $json['data']['stumpings'][$i] . '</td>
        </tr>';
    }
    echo $html;
    exit;
}
if(isset($_REQUEST['ajax']) && $_REQUEST['ajax'] == "get_runs_wickets") {
    $html = '';
    $bowl_url = 'http://www.thecricketwizard.co.nz/api/api.php?functionName=getAllStats&playerid&season&comp&opponent&runs&wickets&groupby=p.playerid&orderby=sum(runs)_desc,sum(wickets)_desc&limit';
    $str = file_get_contents($bowl_url);
    $json = json_decode($str, true);
    $n = 1;
    for($i = 0; $i < sizeof($json['data']['fullname']); $i++) {
        if($json['data']['runs'][$i] >= 1000 && $json['data']['wickets'][$i] >= 100) {
            $hs = getHighestScore($json['data']['cricketwizardid'][$i]);
            //if($json['data']['dismissal'][$i] == 7) $hs .= '*';
            if($json['data']['innings'][$i] == $json['data']['notouts'][$i]) {
                $ave = "-";
            } else {
                $ave = round($json['data']['bataverage'][$i],2);
            }
            $bb = getBestBowled($json['data']['cricketwizardid'][$i]);
            $bowlave = round($json['data']['bowlaverage'][$i],2);
            $sr = round($json['data']['strikerate'][$i],2);
            $html .= '
            <tr>
                <td>' . $n . '</td>
                <td>' . $json['data']['fullname'][$i] . '</td>
                <td>' . $json['data']['matches'][$i] . '</td>
                <td>' . $json['data']['innings'][$i] . '</td>
                <td>' . $json['data']['notouts'][$i] . '</td>
                <td>' . $json['data']['runs'][$i] . '</td>
                <td>' . $ave . '</td>
                <td>' . $hs . '</td>
                <td>' . $json['data']['deliveries'][$i] . '</td>
                <td>' . $json['data']['maidens'][$i] . '</td>
                <td>' . $json['data']['runsconceded'][$i] . '</td>
                <td>' . $json['data']['wickets'][$i] . '</td>
                <td>' . $bb . '</td>
                <td>' . $bowlave . '</td>
                <td>' . $sr . '</td>
                <td>' . round($json['data']['rpo'][$i],2) . '</td>
            </tr>';
            if($n == 5) break;
            $n++;
        }

    }
    echo $html;
    exit;
}
if(isset($_REQUEST['ajax']) && $_REQUEST['ajax'] == "get_runs_wickets_catches") {
    $html = '';
    $bowl_url = 'http://www.thecricketwizard.co.nz/api/api.php?functionName=getAllStats&playerid&season&comp&opponent&runs&wickets&groupby=p.playerid&orderby=sum(runs)_desc,sum(wickets)_desc,sum(catches)_desc&limit';
    $str = file_get_contents($bowl_url);
    $json = json_decode($str, true);
    $n = 1;
    for($i = 0; $i < sizeof($json['data']['fullname']); $i++) {
        if($json['data']['runs'][$i] >= 1000 && $json['data']['wickets'][$i] >= 50 && $json['data']['catches'][$i] >= 50) {
            $hs = getHighestScore($json['data']['cricketwizardid'][$i]);
            //if($json['data']['dismissal'][$i] == 7) $hs .= '*';
            if($json['data']['innings'][$i] == $json['data']['notouts'][$i]) {
                $ave = "-";
            } else {
                $ave = round($json['data']['bataverage'][$i],2);
            }
            $bb = getBestBowled($json['data']['cricketwizardid'][$i]);
            $bowlave = round($json['data']['bowlaverage'][$i],2);
            $sr = round($json['data']['strikerate'][$i],2);
            $html .= '
            <tr>
                <td>' . $n . '</td>
                <td>' . $json['data']['fullname'][$i] . '</td>
                <td>' . $json['data']['matches'][$i] . '</td>
                <td>' . $json['data']['innings'][$i] . '</td>
                <td>' . $json['data']['notouts'][$i] . '</td>
                <td>' . $json['data']['runs'][$i] . '</td>
                <td>' . $ave . '</td>
                <td>' . $hs . '</td>
                <td>' . $json['data']['deliveries'][$i] . '</td>
                <td>' . $json['data']['maidens'][$i] . '</td>
                <td>' . $json['data']['runsconceded'][$i] . '</td>
                <td>' . $json['data']['wickets'][$i] . '</td>
                <td>' . $bb . '</td>
                <td>' . $bowlave . '</td>
                <td>' . $sr . '</td>
                <td>' . round($json['data']['rpo'][$i],2) . '</td>
                <td>' . $json['data']['catches'][$i] . '</td>
            </tr>';
            if($n == 5) break;
            $n++;
        }

    }
    echo $html;
    exit;
}
if(isset($_REQUEST['ajax']) && $_REQUEST['ajax'] == "get_runs_dismissals") {
    $html = '';
    $bowl_url = 'http://www.thecricketwizard.co.nz/api/api.php?functionName=getAllStats&playerid&season&comp&opponent&runs&wickets&groupby=p.playerid&orderby=sum(runs)_desc,dismissals_desc&limit';
    $str = file_get_contents($bowl_url);
    $json = json_decode($str, true);
    $n = 1;
    for($i = 0; $i < sizeof($json['data']['fullname']); $i++) {
        if($json['data']['runs'][$i] >= 1000 && $json['data']['dismissals'][$i] >= 100) {
            $hs = getHighestScore($json['data']['cricketwizardid'][$i]);
            //if($json['data']['dismissal'][$i] == 7) $hs .= '*';
            if($json['data']['innings'][$i] == $json['data']['notouts'][$i]) {
                $ave = "-";
            } else {
                $ave = round($json['data']['bataverage'][$i],2);
            }
            $html .= '
            <tr>
                <td>' . $n . '</td>
                <td>' . $json['data']['fullname'][$i] . '</td>
                <td>' . $json['data']['matches'][$i] . '</td>
                <td>' . $json['data']['innings'][$i] . '</td>
                <td>' . $json['data']['notouts'][$i] . '</td>
                <td>' . $json['data']['runs'][$i] . '</td>
                <td>' . $ave . '</td>
                <td>' . $hs . '</td>
                <td>' . $json['data']['catches'][$i] . '</td>
                <td>' . $json['data']['stumpings'][$i] . '</td>
                <td>' . $json['data']['dismissals'][$i] . '</td>
            </tr>';
            if($n == 5) break;
            $n++;
        }
    }
    echo $html;
    exit;
}
if(isset($_REQUEST['ajax']) && $_REQUEST['ajax'] == "get_runs_wickets_innings") {
    $html = '';
    $bowl_url = 'http://www.thecricketwizard.co.nz/api/api.php?functionName=getAllStats&playerid&season&comp&opponent&runs&wickets&groupby=p.playerid,m.matchid,p.matchinnings,season&orderby=sum(runs)_desc,sum(wickets)_desc&limit';
    $str = file_get_contents($bowl_url);
    $json = json_decode($str, true);
    $n = 1;
    for($i = 0; $i < sizeof($json['data']['fullname']); $i++) {
        if($json['data']['runs'][$i] > 49 && $json['data']['wickets'][$i] > 4) {
            $bb = getBestBowled($json['data']['cricketwizardid'][$i], $json['data']['season'][$i]);
            $html .= '
            <tr>
                <td>' . $n . '</td>
                <td>' . $json['data']['fullname'][$i] . '</td>
                <td>' . $json['data']['runs'][$i] . '</td>
                <td>' . $bb . '</td>
                <td>' . $json['data']['opponent'][$i] . '</td>
                <td>' . $json['data']['season'][$i] . '</td>
            </tr>';
            if($n == 5) break;
            $n++;
        }

    }
    echo $html;
    exit;
}
if(isset($_REQUEST['ajax']) && $_REQUEST['ajax'] == "get_current_batting_stats") {
    $html = '';
    $season = get_option('season');
    $bat_url = 'http://www.thecricketwizard.co.nz/api/api.php?functionName=getAllStats&playerid&season=' . $season . '&comp&opponent&runs&wickets&groupby=p.playerid&orderby=sum(runs)_desc&limit';
    $str = file_get_contents($bat_url);
    $json = json_decode($str, true);
    //print_r($json['data']);
    for($i = 0; $i < sizeof($json['data']['fullname']); $i++) {
        $notouts = $json['data']['notouts'][$i];
        $ton = $json['data']['ton'][$i];
        $fifty = $json['data']['fifty'][$i];
        $fours = $json['data']['fours'][$i];
        $sixes = $json['data']['sixes'][$i];
        if($json['data']['innings'][$i] == 0) {
            $notouts = "-";
            $hs = "-";
            $ton = "-";
            $fifty = "-";
            $fours = "-";
            $sixes = "-";
            $ave = "-";
        } else {
            $hs = getHighestScore($json['data']['cricketwizardid'][$i], $season);
            if($json['data']['innings'][$i] == $json['data']['notouts'][$i]) {
                $ave = "-";
            } else {
                $ave = round($json['data']['bataverage'][$i],2);
            }
        }
        $html .= '
        <tr>
            <td>' . ($i+1) . '</td>
            <td>' . $json['data']['fullname'][$i] . '</td>
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
    echo $html;
    exit;
}
if(isset($_REQUEST['ajax']) && $_REQUEST['ajax'] == "get_current_bowling_stats") {
    $html = '';
    $season = get_option('season');
    $bat_url = 'http://www.thecricketwizard.co.nz/api/api.php?functionName=getAllStats&playerid&season=' . $season . '&comp&opponent&runs&wickets&groupby=p.playerid&orderby=sum(wickets)_desc&limit';
    $str = file_get_contents($bat_url);
    $json = json_decode($str, true);
    //print_r($json['data']);
    for($i = 0; $i < sizeof($json['data']['fullname']); $i++) {
        if($json['data']['deliveries'][$i] <> '-') {
            $bb = getBestBowled($json['data']['cricketwizardid'][$i], $season);
            $html .= '
            <tr>
                <td>' . ($i+1) . '</td>
                <td>' . $json['data']['fullname'][$i] . '</td>
                <td>' . $json['data']['matches'][$i] . '</td>   
                <td>' . $json['data']['deliveries'][$i] . '</td>
                <td>' . $json['data']['maidens'][$i] . '</td>
                <td>' . $json['data']['runsconceded'][$i] . '</td>
                <td>' . $json['data']['wickets'][$i] . '</td>
                <td>' . $bb . '</td>
                <td>' . round($json['data']['bowlaverage'][$i],2) . '</td>
                <td>' . round($json['data']['strikerate'][$i],2) . '</td>
                <td>' . round($json['data']['rpo'][$i],2) . '</td>
                <td>' . $json['data']['fivewickets'][$i] . '</td>
                <td>' . $json['data']['tenwickets'][$i] . '</td>
            </tr>';
        }
    }
    echo $html;
    exit;
}