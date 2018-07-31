<?php

?>
<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
    <div>
        <header class="entry-header">
            <div class="container">
                <div class="row">
                    <div class="col-xl-12">
                        <h1>Career Bowling Stats</h1>
                    </div>
                    <div class="col-xl-12"><?=do_shortcode('[breadcrumb parent="stats"]')?></div>
                </div>
            </div>
            <div class="page-title-image"><img src="<?=get_stylesheet_directory_uri()?>/images/haydo.jpg" alt="" class="responsive-img" /></div>
        </header>

        <div class="entry-content">
            <div class="container">
                <div class="row">
                    <div class="col-xl-12">
                        <h2>Bowling Stats</h2>
                        <p>Stats mostly start from the 2005/06 season.  If any former Inglewood player finds an old scorebook laying around that pre-dates 2005/06, please email Aaron at <a href="mailto:aaron.zame@gmail.com">aaron.zame@gmail.com</a>.</p>
                        <div class="form-group search-wrapper">
                            <label>Search</label>
                            <input type="text" class="search form-control" placeholder="What player are you looking for?" />
                        </div>
                        <div class="table-responsive">
                            <table class="table table-striped results career-bowling">
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
                                <tr class="warning no-result">
                                    <td colspan="13"><i class="fa fa-warning"></i> No player found</td>
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
                <div class="row">
                    <div class="col-xl-12">
                        <div class="spacer50"></div>
                        <h2>Top 5 most wickets in a season</h2>
                        <div class="table-responsive">
                            <table class="table table-striped top-wickets-in-season">
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
                <div class="row">
                    <div class="col-xl-12">
                        <div class="spacer50"></div>
                        <h2>Top 5 bowling averages</h2>
                        <p>Note: minimum of 2000 balls</p>
                        <div class="table-responsive">
                            <table class="table table-striped top-bowling-averages">
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
                <div class="row">
                    <div class="col-xl-12">
                        <div class="spacer50"></div>
                        <h2>Top 5 strike rates</h2>
                        <p>Note: minimum of 2000 balls</p>
                        <div class="table-responsive">
                            <table class="table table-striped top-bowling-sr">
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
                <div class="row">
                    <div class="col-xl-12">
                        <div class="spacer50"></div>
                        <h2>Top 5 economy rates</h2>
                        <p>Note: minimum of 2000 balls</p>
                        <div class="table-responsive">
                            <table class="table table-striped top-bowling-rpo">
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
                <div class="row">
                    <div class="col-xl-12">
                        <div class="spacer50"></div>
                        <h2>Top 5 match bowling figures</h2>
                        <div class="table-responsive">
                            <table class="table table-striped top-bowling-figures-match">
                                <thead>
                                <tr>
                                    <th scope="col">&nbsp;</th>
                                    <th scope="col">&nbsp;</th>
                                    <th scope="col">BB</th>
                                    <th scope="col">VS</th>
                                    <th scope="col">Season</th>
                                </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td colspan="5"><img src="<?=get_stylesheet_directory_uri()?>/images/loader.gif" alt="" class="stats-loader" /></td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-xl-12">
                        <div class="spacer50"></div>
                        <h2>Top 5 bowling figures in an innings</h2>
                        <div class="table-responsive">
                            <table class="table table-striped top-bowling-figures-innings">
                                <thead>
                                <tr>
                                    <th scope="col">&nbsp;</th>
                                    <th scope="col">&nbsp;</th>
                                    <th scope="col">BB</th>
                                    <th scope="col">VS</th>
                                    <th scope="col">Season</th>
                                </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td colspan="5"><img src="<?=get_stylesheet_directory_uri()?>/images/loader.gif" alt="" class="stats-loader" /></td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-xl-12">
                        <div class="spacer50"></div>
                        <?=innerStatsMenu('bowl')?>
                    </div>
                </div>
            </div>
        </div>
    </div>
</article>