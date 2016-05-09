<?php
/**
 * The template for displaying pages
 *
 * This is the template that displays all pages by default.
 * Please note that this is the WordPress construct of pages and that
 * other "pages" on your WordPress site will use a different template.
 *
 */
?>
<?php get_header(); ?>
<?php get_sidebar(); ?>

            <div class="col-lg-9 col-md-9 col-sm-9 col-xs-12 right-panel">
                <div class="page">
                    <?php while( have_posts() ) : the_post(); ?>
                    
                        <div class="post">
                            <h2 class="<?php post_class(); ?>" id="post-<?php the_ID(); ?>"><?php the_title(); ?></h2>
                            <div class="entry-content">
                                <?php the_content(); ?>
                            </div>
                        </div>
                    
                    <?php endwhile; ?>
                </div>
            </div>
        

<?php get_footer(); ?>