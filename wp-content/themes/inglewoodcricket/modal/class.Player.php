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
    function getFirstName() {
        $name_arr = explode(" ",$this->getTitle());
        return $name_arr[0];
    }
    public function getMVPPoints($season)
    {
        global $wpdb;
        $mvp_points = array();
        //$sql = 'SELECT child_id FROM icc_toolset_associations WHERE parent_id = ' . $this->Post->ID;
        //$result = $wpdb->get_results($sql);
        //print_r($post_array);
        $points= 0;
        $sql = '
        SELECT ta.child_id 
        FROM wp_toolset_associations ta       
        WHERE parent_id = ' . $this->getParentID();
        $results = $wpdb->get_results($sql);
        foreach($results as $key => $result)
        {
            $sql1 = '
            SELECT element_id
            FROM wp_toolset_connected_elements
            WHERE id = ' . $result->child_id;
            $result1 = $wpdb->get_results($sql1);
            $mvp = new MVP($result1[0]->element_id);
            if($mvp->getSeason() == $season)
            {
                $points += $mvp->getRuns();
                $points += $mvp->getWickets();
                $points += $mvp->getCatches();
                $points += $mvp->getRunOuts();
                $points += $mvp->getStumpings();
                $points += $mvp->get50RunPartnership();
                $points += $mvp->get100RunPartnership();
            }
        }
        /*
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

            $sql = '
            SELECT ta.child_id 
            FROM wp_toolset_associations ta       
            WHERE parent_id = ' . $this->getParentID() . '
            AND child_id = ' . $this->getChildID($post->ID);
            $result = $wpdb->get_results($sql);
            //if($result)
            //{
                $mvp = new MVP($post->ID);
                $points += $mvp->getRuns();
                $points += $mvp->getWickets();
                $points += $mvp->getCatches();
                $points += $mvp->getRunOuts();
                $points += $mvp->getStumpings();
            //}
        }
        */

        return $points;
    }
    function getParentID()
    {
        global $wpdb;
        $sql = '
        SELECT id
        FROM ' . $wpdb->prefix . 'toolset_connected_elements
        WHERE element_id = ' . $this->id();
        $result = $wpdb->get_results($sql);
        return $result[0]->id;
    }
    function getChildID($id)
    {
        global $wpdb;
        $sql = '
        SELECT id
        FROM ' . $wpdb->prefix . 'toolset_connected_elements
        WHERE element_id = ' . $id;
        $result = $wpdb->get_results($sql);
        return $result[0]->id;
    }

    function getPostID($child_id)
    {
        global $wpdb;
        $sql = '
        SELECT element_id
        FROM ' . $wpdb->prefix . 'toolset_connected_elements
        WHERE id = ' . $child_id;
        $result = $wpdb->get_results($sql);
        return $result[0]->element_id;
    }
    public function getSponsorID()
    {
        $sponsor_id = toolset_get_related_post( $this->id(), 'player-sponsor', 'parent');
        return $sponsor_id;
    }
}