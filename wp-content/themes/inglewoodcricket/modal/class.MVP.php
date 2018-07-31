<?php

/**
 * Created by PhpStorm.
 * User: user
 * Date: 7/17/2018
 * Time: 11:52 AM
 */
class MVP extends ICCBase
{
    public function getRuns()
    {
        return $this->getPostMeta('mvp-runs');
    }
    public function getWickets()
    {
        return ($this->getPostMeta('mvp-wickets')*20);
    }
    public function getCatches()
    {
        return ($this->getPostMeta('mvp-catches')*12);
    }
    public function getStumpings()
    {
        return ($this->getPostMeta('mvp-stumpings')*15);
    }
    public function getRunOuts()
    {
        return ($this->getPostMeta('mvp-run-outs')*15);
    }
    public function getSeason()
    {
        return $this->getPostMeta('mvp-season');
    }
}