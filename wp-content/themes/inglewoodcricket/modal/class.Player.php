<?php

/**
 * Created by PhpStorm.
 * User: user
 * Date: 7/2/2018
 * Time: 9:08 PM
 */
class Player extends ICCBase
{
    public function getProfileImage()
    {
        return $this->getPostMeta('profile-image');
    }
    public function getBioImage()
    {
        return $this->getPostMeta('bio-image');
    }
    public function getPlayingRole()
    {
        return $this->getPostMeta('playing-role');
    }
    public function getCurrentPlayer()
    {
        return $this->getPostMeta('current');
    }
    public function getCricketWizardID()
    {
        return $this->getPostMeta('cricket-wizard-id');
    }
    public function getPlayerType()
    {
        return $this->getPostMeta('player-type');
    }
    public function getMVPPoints($season)
    {
        global $wpdb;
        $mvp_points = array();
        //$sql = 'SELECT child_id FROM icc_toolset_associations WHERE parent_id = ' . $this->Post->ID;
        //$result = $wpdb->get_results($sql);
        //print_r($post_array);
        $points= 0;
        // loop through the mvp post and only returned publish ones, and the required season
        $posts_array = get_posts([
            'post_type' => 'mvppoints',
            'post_status' => 'publish',
            'numberposts' => -1,
            'meta_query' => [
                [
                    'key' => 'wpcf-mvp-season',
                    'value' => $season
                ]
            ]
        ]);
        // loop through the returned posts and get the ones specific to this player
        foreach ($posts_array as $post) {
            $sql = 'SELECT child_id FROM wp_toolset_associations WHERE parent_id = ' . $this->Post->ID . ' AND child_id = ' . $post->ID;
            $result = $wpdb->get_results($sql);
            //print_r($post->ID);
            $mvp = new MVP($result[0]->child_id);
            $points += $mvp->getRuns();
            $points += $mvp->getWickets();
            $points += $mvp->getCatches();
            $points += $mvp->getRunOuts();
            $points += $mvp->getStumpings();
        }

        return $points;
    }

}