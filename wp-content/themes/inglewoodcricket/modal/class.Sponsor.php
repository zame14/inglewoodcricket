<?php

/**
 * Created by PhpStorm.
 * User: user
 * Date: 7/24/2018
 * Time: 12:06 PM
 */
class Sponsor extends ICCBase
{
    public function getLogo()
    {
        return $this->getPostMeta('sponsor-logo');
    }
    public function getLink()
    {
        return $this->getPostMeta('sponsor-url');
    }
    public function getSponsorType()
    {
        return $this->getPostMeta('sponsor-type');
    }
    public function output() {
        $html = '<img src="' . $this->getLogo() . '" alt="' . $this->getTitle() . '" class="responsive-img" />';

        return $html;
    }
}