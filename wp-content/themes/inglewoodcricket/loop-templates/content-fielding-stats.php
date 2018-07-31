<?php

?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
    <div>
        <header class="entry-header">
            <div class="container">
                <div class="row">
                    <div class="col-xl-12">
                        <h1>Career Fielding Stats</h1>
                    </div>
                    <div class="col-xl-12"><?=do_shortcode('[breadcrumb parent="stats"]')?></div>
                </div>
            </div>
            <div class="page-title-image"><img src="<?=get_stylesheet_directory_uri()?>/images/fielding.jpg" alt="" class="responsive-img" /></div>
        </header>

        <div class="entry-content">
            <div class="container">
                <div class="row">
                    <div class="col-xl-12">
                        <h2>Fielding Stats</h2>
                        <p>Stats mostly start from the 2005/06 season.  If any former Inglewood player finds an old scorebook laying around that pre-dates 2005/06, please email Aaron at <a href="mailto:aaron.zame@gmail.com">aaron.zame@gmail.com</a>.</p>
                        <div class="form-group search-wrapper">
                            <label>Search</label>
                            <input type="text" class="search form-control" placeholder="What player are you looking for?" />
                        </div>
                        <div class="table-responsive">
                            <table class="table table-striped results career-fielding-stats">
                                <thead>
                                <tr>
                                    <th scope="col">&nbsp;</th>
                                    <th scope="col">&nbsp;</th>
                                    <th scope="col">M</th>
                                    <th scope="col">Ct</th>
                                    <th scope="col">St</th>
                                    <th scope="col">Dismissals</th>
                                </tr>
                                <tr class="warning no-result">
                                    <td colspan="6"><i class="fa fa-warning"></i> No player found</td>
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
                        <h2>Top 5 dismissals in a match</h2>
                        <div class="table-responsive">
                            <table class="table table-striped results most-dismissals-match">
                                <thead>
                                <tr>
                                    <th scope="col">&nbsp;</th>
                                    <th scope="col">&nbsp;</th>
                                    <th scope="col">Ct</th>
                                    <th scope="col">St</th>
                                    <th scope="col">Dismissals</th>
                                    <th scope="col">VS</th>
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
                        <h2>Top 5 catches in a season</h2>
                        <div class="table-responsive">
                            <table class="table table-striped results most-catches-in-season">
                                <thead>
                                <tr>
                                    <th scope="col">&nbsp;</th>
                                    <th scope="col">&nbsp;</th>
                                    <th scope="col">Ct</th>
                                    <th scope="col">Season</th>
                                </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td colspan="4"><img src="<?=get_stylesheet_directory_uri()?>/images/loader.gif" alt="" class="stats-loader" /></td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-xl-12">
                        <div class="spacer50"></div>
                        <h2>Top 5 most stumpings</h2>
                        <div class="table-responsive">
                            <table class="table table-striped results most-stumpings">
                                <thead>
                                <tr>
                                    <th scope="col">&nbsp;</th>
                                    <th scope="col">&nbsp;</th>
                                    <th scope="col">St</th>
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
                        <?=innerStatsMenu('field')?>
                    </div>
                </div>
            </div>
        </div>
    </div>
</article>