<?php

/**
 * Created by PhpStorm.
 * User: user
 * Date: 7/24/2018
 * Time: 11:10 AM
 */
class Testimony extends ICCBase
{
    public function getImage()
    {
        return $this->getPostMeta('testimony-image');
    }
    public function getPlayerInfo()
    {
        return $this->getPostMeta('player-info');
    }
}