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
            </div>
        </div>

    </div>
</article>
