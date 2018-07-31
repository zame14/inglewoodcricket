<?php

/**
 * Created by PhpStorm.
 * User: user
 * Date: 7/23/2018
 * Time: 11:58 AM
 */
class Story extends ICCBase
{
    public function getImage()
    {
        return $this->getPostMeta('story-feature-image');
    }
    public function getAuthor()
    {
        return $this->getPostMeta('author');
    }
}