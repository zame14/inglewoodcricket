<?php

?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
    <div>
        <header class="entry-header">
            <div class="container">
                <div class="row">
                    <div class="col-xl-12">
                        <h1>Career Batting Stats</h1>
                    </div>
                    <div class="col-xl-12"><?=do_shortcode('[breadcrumb parent="stats"]')?></div>
                </div>
            </div>
            <div class="page-title-image"><img src="<?=get_stylesheet_directory_uri()?>/images/tails.jpg" alt="" class="responsive-img" /></div>
        </header>

        <div class="entry-content">
            <div class="container">
                <div class="row">
                    <div class="col-xl-12">
                        <h2>Batting Stats</h2>
                        <p>Stats mostly start from the 2005/06 season.  If any former Inglewood player finds an old scorebook laying around that pre-dates 2005/06, please <a href="mailto:aaron.zame@gmail.com">email Aaron</a>.</p>
                        <div class="form-group search-wrapper">
                            <label>Search</label>
                            <input type="text" class="search form-control" placeholder="What player are you looking for?" />
                        </div>
                        <div class="table-responsive">
                            <table class="table table-striped results career-batting-stats">
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
                                </tr>
                                <tr class="warning no-result">
                                    <td colspan="12"><i class="fa fa-warning"></i> No player found</td>
                                </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td colspan="12"><img src="<?=get_stylesheet_directory_uri()?>/images/loader.gif" alt="" class="stats-loader" /></td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-xl-12">
                        <div class="spacer50"></div>
                        <h2>Top 5 most runs in a season</h2>
                        <div class="table-responsive">
                            <table class="table table-striped most-runs-in-season">
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
                                    <th scope="col">Season</th>
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
                        <h2>Top 5 batting averages</h2>
                        <p>Note: minimum of 20 innings</p>
                        <div class="table-responsive">
                            <table class="table table-striped top-batting-average">
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
                                </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td colspan="12"><img src="<?=get_stylesheet_directory_uri()?>/images/loader.gif" alt="" class="stats-loader" /></td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-xl-12">
                        <div class="spacer50"></div>
                        <h2>Top 5 most sixes in career</h2>
                        <div class="table-responsive">
                            <table class="table table-striped most-sixes-in-career">
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
                                </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td colspan="12"><img src="<?=get_stylesheet_directory_uri()?>/images/loader.gif" alt="" class="stats-loader" /></td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-xl-12">
                        <div class="spacer50"></div>
                        <h2>Top 5 most fours in career</h2>
                        <div class="table-responsive">
                            <table class="table table-striped most-fours-in-career">
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
                                </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td colspan="12"><img src="<?=get_stylesheet_directory_uri()?>/images/loader.gif" alt="" class="stats-loader" /></td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-xl-12">
                        <div class="spacer50"></div>
                        <h2>Top 5 Individual scores</h2>
                        <div class="table-responsive">
                            <table class="table table-striped highest-scores">
                                <thead>
                                <tr>
                                    <th scope="col">&nbsp;</th>
                                    <th scope="col">&nbsp;</th>
                                    <th scope="col">HS</th>
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
                        <h2>Top 5 Most 100s</h2>
                        <div class="table-responsive">
                            <table class="table table-striped most-tons">
                                <thead>
                                <tr>
                                    <th scope="col">&nbsp;</th>
                                    <th scope="col">&nbsp;</th>
                                    <th scope="col">100</th>
                                </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td colspan="3"><img src="<?=get_stylesheet_directory_uri()?>/images/loader.gif" alt="" class="stats-loader" /></td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-xl-12">
                        <div class="spacer50"></div>
                        <h2>Top 5 Most 50s</h2>
                        <div class="table-responsive">
                            <table class="table table-striped most-fifties">
                                <thead>
                                <tr>
                                    <th scope="col">&nbsp;</th>
                                    <th scope="col">&nbsp;</th>
                                    <th scope="col">50</th>
                                </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td colspan="3"><img src="<?=get_stylesheet_directory_uri()?>/images/loader.gif" alt="" class="stats-loader" /></td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-xl-12">
                        <div class="spacer50"></div>
                        <h2>Top 5 Batting Partnerships</h2>
                        <div class="table-responsive">
                            <table class="table table-striped top-batting-partnerships">
                                <thead>
                                <tr>
                                    <th scope="col">&nbsp;</th>
                                    <th scope="col">Wicket</th>
                                    <th scope="col">Runs</th>
                                    <th scope="col">Partners</th>
                                    <th scope="col">Opposition</th>
                                    <th scope="col">Venue</th>
                                    <th scope="col">Season</th>
                                </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td colspan="7"><img src="<?=get_stylesheet_directory_uri()?>/images/loader.gif" alt="" class="stats-loader" /></td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-xl-12">
                        <div class="spacer50"></div>
                        <h2>Partnership Records per wicket</h2>
                        <div class="table-responsive">
                            <table class="table table-striped record-partnerships">
                                <thead>
                                <tr>
                                    <th scope="col">Wicket</th>
                                    <th scope="col">Runs</th>
                                    <th scope="col">Partners</th>
                                    <th scope="col">Opposition</th>
                                    <th scope="col">Venue</th>
                                    <th scope="col">Season</th>
                                </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td colspan="6"><img src="<?=get_stylesheet_directory_uri()?>/images/loader.gif" alt="" class="stats-loader" /></td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-xl-12">
                        <div class="spacer50"></div>
                        <?=innerStatsMenu('bat')?>
                    </div>
                </div>
            </div>
        </div>
    </div>

</article><!-- #post-## -->