<?php

?>
<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
    <div>
        <header class="entry-header">
            <div class="container">
                <div class="row">
                    <div class="col-xl-12">
                        <h1>Gallery</h1>
                    </div>
                    <div class="col-xl-12"><?=do_shortcode('[breadcrumb parent="media"]')?></div>
                </div>
            </div>
        </header>

        <div class="entry-content">
            <div class="container">
                <div class="row">
                    <div class="col-xl-12">
                        <?php the_content(); ?>
                    </div>
                </div>
                <div class="row">
                    <?php
                    foreach(getGalleryImages() as $gallery) {
                        echo '
                        <div class="col-xs-12 col-sm-6">
                            <div class="gallery-wrapper">';
                            foreach ($gallery->getGalleryImages() as $gallery_image) {
                                $imgid = getImageID($gallery_image);
                                $image = wp_get_attachment_image_src($imgid, 'gallery');
                                echo '<div><img src="' . $image[0] . '" alt="" class="responsive-img" /></div>';
                            }
                            echo '
                            </div>
                            <div class="title blue">' . $gallery->getTitle() . '</div>
                        </div>';

                    }
                    ?>
                    <div class="col-xl-12">

                    </div>
                </div>
            </div>
        </div>

    </div>
</article>
