<a class="top">
    <span class="fa fa-chevron-up"></span>
</a>
<section class="sponsors-section">
    <div class="container-fluid">
        <div class="row">
            <div class="col-xl-12 nopadding">
                <h2>Thank you to our sponsors</h2>
                <?=do_shortcode('[sponsors]')?>
            </div>
        </div>
    </div>
</section>
<section class="grants-section">
    <div class="container-fluid">
        <div class="row">
            <div class="col-xl-12 nopadding">
                <h2>Thank you to the following organisations that have provided funding</h2>
                <?=do_shortcode('[grants]')?>
            </div>
        </div>
    </div>
</section>
<section class="google-map">
    <div class="container-fluid">
        <div class="row">
            <div class="col-xl-12 nopadding">
                <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d2187.5130397787448!2d174.18730849266214!3d-39.16083735483591!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x6d1454a6d6b16973%3A0xab3dafcda7f0d67b!2sKaro+Park%2C+Kaimiro+4386!5e0!3m2!1sen!2snz!4v1532391991200" width="2000" height="400" frameborder="0" style="border:0" allowfullscreen></iframe>
            </div>
        </div>
    </div>
</section>
<section id="copyright">
    <div class="container-fluid">
        <div class="row">
            <div class="col-xl-12">
                &copy; Copyright <?=date('Y')?> <?=get_bloginfo('name')?> <i>-</i> <span>Website by <a href="https://www.azwebsolutions.co.nz/" target="_blank">A-Z Web Solutions Ltd</a></span>
            </div>
            <div class="col-xl-12">
                <a href="<?=get_page_link(863)?>" class="sitemap">Sitemap</a>
            </div>
        </div>
    </div>
</section>
</div>
<?php wp_footer(); ?>
<script src="https://code.jquery.com/ui/1.13.1/jquery-ui.js"></script>
<script src="<?=get_stylesheet_directory_uri()?>/js/noframework.waypoints.min.js" type="text/javascript"></script>
<script src="<?=get_stylesheet_directory_uri()?>/js/theme.js" type="text/javascript"></script>
<script src="<?=get_stylesheet_directory_uri()?>/includes/slick-carousel/slick/slick.js" type="text/javascript"></script>
</body>
</html>