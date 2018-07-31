<?php

/**
 * Created by PhpStorm.
 * User: user
 * Date: 7/31/2018
 * Time: 9:40 AM
 */
class Gallery extends ICCBase
{
    public function getGalleryImages()
    {
        $gallery = Array();
        $field = get_post_meta($this->id());
        foreach($field['wpcf-gallery-images'] as $image) {
            $gallery[] = $image;
        }
        return $gallery;
    }
}