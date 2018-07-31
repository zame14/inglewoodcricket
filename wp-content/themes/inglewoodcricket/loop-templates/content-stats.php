<?php
$season = get_option('season');
?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
    <!-- .entry-header -->
    <div>
        <header class="entry-header">
            <div class="container">
                <div class="row">
                    <div class="col-xl-12">
                        <h1><?=$season?> Prem Stats</h1>
                    </div>
                    <div class="col-xl-12"><?=do_shortcode('[breadcrumb parent="stats"]')?></div>
                </div>
            </div>
            <div class="page-title-image"><img src="<?=get_stylesheet_directory_uri()?>/images/haydo-bowling.jpg" alt="" class="responsive-img" /></div>
        </header>

        <div class="entry-content">
            <div class="container">
                <div class="row">
                    <div class="col-xl-12">
                        <h2>Batting & Fielding</h2>
                        <div class="table-responsive">
                            <table class="table table-striped results this-season-batting">
                                <thead>
                                    <tr>
                                        <th scope="col">&nbsp;</th>
                                        <th scope="col">&nbsp;</th>
                                        <th scope="col">M</th>
                                        <th scope="col">I</th>
                                        <th scope="col">NO</th>
                                        <th scope="col">Runs</th>
                                        <th scope="col">Ave</th>
                                        <th scope="col">HS</th>
                                        <th scope="col">100</th>
                                        <th scope="col">50</th>
                                        <th scope="col">4s</th>
                                        <th scope="col">6s</th>
                                        <th scope="col">Ct</th>
                                        <th scope="col">St</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td colspan="14"><img src="<?=get_stylesheet_directory_uri()?>/images/loader.gif" alt="" class="stats-loader" /></td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                    <div class="col-xl-12">
                        <div class="spacer50"></div>
                        <h2>Bowling</h2>
                        <div class="table-responsive">
                            <table class="table table-striped results this-season-bowling">
                                <thead>
                                <tr>
                                    <th scope="col">&nbsp;</th>
                                    <th scope="col">&nbsp;</th>
                                    <th scope="col">M</th>
                                    <th scope="col">Balls</th>
                                    <th scope="col">Mdns</th>
                                    <th scope="col">Runs</th>
                                    <th scope="col">Wkts</th>
                                    <th scope="col">BB</th>
                                    <th scope="col">Ave</th>
                                    <th scope="col">SR</th>
                                    <th scope="col">Econ</th>
                                    <th scope="col">5</th>
                                    <th scope="col">10</th>
                                </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td colspan="13"><img src="<?=get_stylesheet_directory_uri()?>/images/loader.gif" alt="" class="stats-loader" /></td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

</article><!-- #post-## -->