<!-- The WooCommerce loop -->
<?php
$args = array(
    'delimiter' => ' <span>/</span> ',
    'home' => 'You are here:'
);
//woocommerce_breadcrumb($args);
woocommerce_content();
?>