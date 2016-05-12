<?php
/**
 * Template Name: single
 * @package WordPress
 * The template for displaying posts
 *
 * This is the template that displays all pages by default.
 * Please note that this is the WordPress construct of pages and that
 * other "pages" on your WordPress site will use a different template.
 *
 */
?>
<?php get_header(); ?>

    <!--Slider start -->
    <div class="">
        <?php echo do_shortcode('[FlexSlider2 id="64"]'); ?>
    </div>
    <!--Slider end -->

<?php get_sidebar(); ?>

    <div class="col-lg-9 col-md-9 col-sm-9 col-xs-12 right-panel">
        
        <?php if( have_posts() ) : ?>
            
            <?php while( have_posts() ) :   the_post(); ?>      
                <div id="post-<?php the_ID(); ?>" class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <h4 class="post-heading" id="post-<?php the_ID(); ?>">
                        <?php the_title(); ?>
                    </h4>
                    <div>
                        <?php
                            if ( has_post_thumbnail() ) {
                                the_post_thumbnail('medium', array(
                                                                        'class' => 'single-page-thumbnail'
                                                                    ));
                            }
                            else
                            {
                                echo "Image Not available";
                            }
                        ?>
                    </div>
                    <div class="post-content">
                        <h3>
                            <span style="color: #8c8a89;">About</span>
                            <span style="color: #0f295a;"><?php the_title(); ?></span>
                        </h3>
                        <?php the_content('Read more...'); ?>
                    </div>
                    <p style="text-align: center;">
                        <a href="http://www.enterhelix.com/shan/wordpress4.5/enquiry/" class="enquiry">Enquiry</a>
                    </p>
                </div>  
            <?php endwhile; ?>
            
            <?php
                // If no content, include the "No posts found" template.
                else:
                    //get_template_part( 'template-parts/content', 'none' );
                    echo 'no posts are there..!';
            ?>
            
        <?php endif; ?>
    </div>
        

<?php get_footer(); ?>