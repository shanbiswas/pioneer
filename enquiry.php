<?php
/* Template Name: enquiry
 * @package WordPress
 * */
?>

<?php get_header(); ?>

<h2 class="enquiry-form-title">Enquiry Form</h2>
    <div class="enquiry-form-wrapper">
        <?php
            echo do_shortcode('[contact-form-7 id="102" title="Contact form 1"]');
        ?>
    </div>
    

<?php get_footer(); ?>