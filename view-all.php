<?php
/* Template Name: view-all
 * @package WordPress
 * */
?>

<?php get_header(); ?>
<?php get_sidebar(); ?>

<?php
    $cat_name = $_GET['cat_name'];
    $term_id = $_GET['term_id'];
?>

    <div class="col-lg-9 col-md-9 col-sm-9 col-xs-12 right-panel">
        <!--Display the sub category information using $category values like $category->cat_name-->
        <div class='sub-category-wrapper'>
            <h3 class="sub-cat-name">&raquo; <?php echo $cat_name; ?></h3>;
            <?php
                // Make a loop to display post link which are in this sub category
                foreach (get_posts( array(
                                          'category' => $term_id,
                                          'orderby' => 'date',
                                          'order'   => 'DESC',
                                        ) ) as $post) {
                    setup_postdata( $post );
                    echo "<div class='col-lg-4 col-md-4 col-sm-4 col-xs-12 post-link'>";
                        echo '<h4 class="title"><a href="'.get_permalink($post->ID).'">'.get_the_title().'</a></h4>';
                        echo '<div class="post-thumb">';
                            echo '<a href="'.get_permalink($post->ID).'">';
                                if ( has_post_thumbnail() ) {
                                    the_post_thumbnail();
                                }
                            echo '</a>';
                        echo '</div>';
                    echo "</div>";
                }
            ?>
        </div>
    </div>
    

<?php get_footer(); ?>