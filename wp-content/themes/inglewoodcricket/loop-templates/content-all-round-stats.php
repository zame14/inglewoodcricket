<?php

?>
<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
    <div>
        <header class="entry-header">
            <div class="container">
                <div class="row">
                    <div class="col-xl-12">
                        <h1>All Round Stats</h1>
                    </div>
                    <div class="col-xl-12"><?=do_shortcode('[breadcrumb parent="stats"]')?></div>
                </div>
            </div>
            <div class="page-title-image"><img src="<?=get_stylesheet_directory_uri()?>/images/allrounder.jpg" alt="" class="responsive-img" /></div>
        </header>

        <div class="entry-content">
            <div class="container">
                <div class="row">
                    <div class="col-xl-12">
                        <h2>Top 5 1000 runs & 100 wickets</h2>
                        <div class="table-responsive">
                            <table class="table table-striped most-runs-wickets">
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
                                    <th scope="col">Balls</th>
                                    <th scope="col">Mdns</th>
                                    <th scope="col">Runs</th>
                                    <th scope="col">Wkts</th>
                                    <th scope="col">BB</th>
                                    <th scope="col">Ave</th>
                                    <th scope="col">SR</th>
                                    <th scope="col">Econ</th>
                                </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td colspan="16"><img src="<?=get_stylesheet_directory_uri()?>/images/loader.gif" alt="" class="stats-loader" /></td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-xl-12">
                        <div class="spacer50"></div>
                        <h2>Top 5 1000 runs, 50 wickets & 50 catches</h2>
                        <div class="table-responsive">
                            <table class="table table-striped most-runs-wickets-catches">
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
                                    <th scope="col">Balls</th>
                                    <th scope="col">Mdns</th>
                                    <th scope="col">Runs</th>
                                    <th scope="col">Wkts</th>
                                    <th scope="col">BB</th>
                                    <th scope="col">Ave</th>
                                    <th scope="col">SR</th>
                                    <th scope="col">Econ</th>
                                    <th scope="col">Catches</th>
                                </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td colspan="16"><img src="<?=get_stylesheet_directory_uri()?>/images/loader.gif" alt="" class="stats-loader" /></td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-xl-12">
                        <div class="spacer50"></div>
                        <h2>Top 5 1000 runs & 100 dismissals</h2>
                        <div class="table-responsive">
                            <table class="table table-striped results most-runs-dismissals">
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
                                    <th scope="col">Ct</th>
                                    <th scope="col">St</th>
                                    <th scope="col">Dismissals</th>
                                </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td colspan="16"><img src="<?=get_stylesheet_directory_uri()?>/images/loader.gif" alt="" class="stats-loader" /></td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-xl-12">
                        <div class="spacer50"></div>
                        <h2>Top 5 50+ runs & 5+ wickets in an innings</h2>
                        <div class="table-responsive">
                            <table class="table table-striped most-runs-wickets-innings">
                                <thead>
                                <tr>
                                    <th scope="col">&nbsp;</th>
                                    <th scope="col">&nbsp;</th>
                                    <th scope="col">Runs</th>
                                    <th scope="col">BB</th>
                                    <th scope="col">VS</th>
                                    <th scope="col">Season</th>
                                </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td colspan="16"><img src="<?=get_stylesheet_directory_uri()?>/images/loader.gif" alt="" class="stats-loader" /></td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-xl-12">
                        <div class="spacer50"></div>
                        <?=innerStatsMenu('allround')?>
                    </div>
                </div>
            </div>
        </div>
    </div>
</article>