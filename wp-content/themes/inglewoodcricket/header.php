<?php
$container = get_theme_mod( 'understrap_container_type' );
?>
<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
    <meta charset="<?php bloginfo( 'charset' ); ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="profile" href="http://gmpg.org/xfn/11">
    <link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>">
    <?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>

<div class="hfeed site" id="page">
    <section id="cricket-wizard-cta">
        <div class="container-fluid">
            <div class="row">
                <div class="col-xl-12">
                    <a href="http://www.thecricketwizard.co.nz" target="_blank" class="cta">
                        <span class="the">The</span>
                        <span class="cricket">cricket</span>
                        <span class="wizard">Wizard</span>
                    </a><p>Stats powered by The Cricket Wizard</p>
                    <?=cartIcons()?>
                </div>
            </div>
        </div>
    </section>
    <section id="header">
        <a name="top"></a>
        <div class="container-fluid">
            <div class="row">
                <div class="col-xl-12 nopadding">
                    <a href="<?=get_home_url()?>" class="m-logo"><img src="<?=get_stylesheet_directory_uri()?>/images/logo-round.png" alt="Inglewood Cricket Club" /></a>
                    <div id="icc-menu-wrapper">
                        <div class="main-nav wrapper-fluid wrapper-navbar" id="wrapper-navbar">
                            <nav class="site-navigation" itemscope="itemscope" itemtype="http://schema.org/SiteNavigationElement">
                                <?php
                                wp_nav_menu(
                                    array(
                                        'theme_location' => 'primary',
                                        'container_class' => 'collapse navbar-collapse navbar-responsive-collapse',
                                        'menu_class' => 'nav navbar-nav',
                                        'fallback_cb' => '',
                                        'menu_id' => 'main-menu'
                                    )
                                );
                                ?>
                            </nav>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>