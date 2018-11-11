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
        $runs = $this->getPostMeta('mvp-runs');
        if($this->getPostMeta('mvp-runs') > 49 && $this->getPostMeta('mvp-runs') < 100) $runs = ($runs + 25);
        if($this->getPostMeta('mvp-runs') >= 100) $runs = ($runs + 50);
        return $runs;
    }
    public function getWickets()
    {
        $wickets = ($this->getPostMeta('mvp-wickets')*15);
        if($this->getPostMeta('mvp-wickets') > 4 && $this->getPostMeta('mvp-wickets') < 7) $wickets = ($wickets + 25);
        if($this->getPostMeta('mvp-wickets') >= 7) $wickets = ($wickets + 50);
        return $wickets;
    }
    public function getCatches()
    {
        return ($this->getPostMeta('mvp-catches')*10);
    }
    public function getStumpings()
    {
        return ($this->getPostMeta('mvp-stumpings')*12);
    }
    public function getRunOuts()
    {
        return ($this->getPostMeta('mvp-run-outs')*12);
    }
    public function getSeason()
    {
        return $this->getPostMeta('mvp-season');
    }
}