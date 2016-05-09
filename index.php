<?php

/**
 * The main template file
 *
 * This is the most generic template file in a WordPress theme
 * and one of the two required files for a theme (the other being style.css).
 * It is used to display a page when nothing more specific matches a query.
 * E.g., it puts together the home page when no home.php file exists.
 *
 *
 */

?>

<?php get_header(); ?>

    <!--Slider start -->
    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
        <?php echo do_shortcode('[FlexSlider2 id="64"]'); ?>
    </div>
    <!--Slider end -->

<?php get_sidebar(); ?>

    <div class="col-lg-9 col-md-9 col-sm-9 col-xs-12">
        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 homepage_about_section">
            <p>
                <?php
                    $home_page_post_id = 106;
                    $home_page_post = get_post( $home_page_post_id, ARRAY_A );
                    $content_home = $home_page_post['post_content'];
                    echo $content_home;
                ?>
            </p>
        </div>
        
        <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12 homepage_contact_section">
            <h1 style="margin-bottom: 10px; color: #8c8a89;">Contact Us</h1>
            <p>
                <?php
                    $home_page_post_id = 8;
                    $home_page_post = get_post( $home_page_post_id, ARRAY_A );
                    $content_home = $home_page_post['post_content'];
                    echo $content_home;
                ?>
            </p>
        </div>
        <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
            <h1 style="color: #8c8a89;">Testimony</h1>
        </div>
    </div>
    

<?php get_footer(); ?>