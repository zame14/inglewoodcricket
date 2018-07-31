<?php
vc_map( array(
    "name"                    => __( "Breadcrumb" ),
    "base"                    => "icc_breadcrumb",
    "category"                => __( 'Content' ),
    'show_settings_on_create' => false
) );

add_shortcode( 'icc_breadcrumb', 'breadcrumbOld' );

function breadcrumbOld()
{
    $html = '';
    /*
    $id = get_the_ID();
    $project = new Project($id);
    $html = '
    <div class="breadcrumb">
        <ul>
            <li><a href="' . get_page_link(4) . '">Home</a></li>
            <li><a href="' . get_page_link(9) . '">Projects</a></li>
            <li>' . $project->getTitle() . '</li>
        </ul>
    </div>';

    */

    return $html;
}