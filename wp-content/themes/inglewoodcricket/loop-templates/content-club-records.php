<?php

?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
    <div>
        <header class="entry-header">
            <div class="container">
                <div class="row">
                    <div class="col-xl-12">
                        <h1>Club Records</h1>
                    </div>
                    <div class="col-xl-12"><?=do_shortcode('[breadcrumb parent=""]')?></div>
                </div>
            </div>
            <div class="page-title-image"><img src="<?=get_stylesheet_directory_uri()?>/images/honours.jpg" alt="" class="responsive-img" /></div>
        </header>

        <div class="entry-content">
            <div class="container">
                <div class="row">
                    <div class="col-xl-12">
                        <p>Player must score a century or take 7 wickets.</p>
                        <h2>Highlights</h2>
                        <ul>
                            <li>Highest Individual Score - 185 C. Judson vs Woodleigh 2nd</li>
                            <li>Best Bowling Figures - 9/22 B. Youngson vs FDMC 2nd</li>
                        </ul>
                        <div class="form-group search-wrapper">
                            <label>Search</label>
                            <input type="text" class="search form-control" placeholder="What player are you looking for?" />
                        </div>
                        <div class="table-responsive">
                            <table class="table table-striped results nobold">
                                <thead>
                                <tr>
                                    <th scope="col">Year</th>
                                    <th scope="col">Player</th>
                                    <th scope="col">Performance</th>
                                    <th scope="col">VS</th>
                                    <th scope="col">Grade</th>
                                </tr>
                                <tr class="warning no-result">
                                    <td colspan="12"><i class="fa fa-warning"></i> No player found</td>
                                </tr>
                                </thead>
                                <tbody>
                                <?php
                                foreach (getRecords() as $record) {
                                    $arr = explode("|", $record->getTitle());
                                    echo '
                                    <tr>
                                        <td>' . $arr[0] . '</td>
                                        <td>' . $arr[1] . '</td>
                                        <td>' . $arr[2] . '</td>
                                        <td>' . $arr[3] . '</td>
                                        <td>' . $arr[4] . '</td>
                                    </tr>';
                                }
                                ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</article>