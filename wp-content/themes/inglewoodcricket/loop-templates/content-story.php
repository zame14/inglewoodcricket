<?php
$story = new Story($post);
?>
<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
    <div class="container">
        <div class="row">
            <div class="col-xl-12">
                <h1><?=$story->getTitle()?></h1>
            </div>
            <div class="col-xl-12"><?=do_shortcode('[breadcrumb parent="story"]')?></div>
        </div>
        <div class="row">
            <div class="col-xs-12 col-sm-8 col-md-9 col-lg-8">
                <p class="author">By <?=$story->getAuthor()?></p>
                <?=$story->getContent()?>
            </div>
            <div class="col-xs-12 col-sm-4 col-md-3 col-lg-4">
                <?=moreStories($story->id())?>
            </div>
        </div>
    </div>
</article>