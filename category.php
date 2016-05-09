<?php
/**
 * The template for displaying the category
 */

?>

<?php get_header(); ?>
<?php get_sidebar(); ?>

    <div class="col-lg-9 col-md-9 col-sm-9 col-xs-12 right-panel">
        <?php
            // get category ID of particular category
            $current_category = single_cat_title("", false);
            $category_id = get_cat_ID($current_category);
            // end getting category ID
            
            // Display parent category name
            echo "<h2 class='parent-cat-name'>category archives: $current_category</h2>";
            
            // Get the name of sub-category
            $categories =  get_categories('child_of='.$category_id);
            
            /* check if the category has sub-categories,
             * if so below part will be executed,
             * if not, the else part will be executed
             */
            if( sizeof($categories) != 0 )
            {
                foreach  ($categories as $category) {
                    
                    $category_name  =   $category->name;    // sub-category name
                    $term_id        =   $category->term_id; // sub-category term ID
                    $total_posts    =   $category->count;   // total posts under particular sub-category
                    
                    // Display the sub category information using $category values like $category->cat_name
                    echo "<div class='sub-category-wrapper'>";
                    echo '<h3 class="sub-cat-name">&raquo; '.$category_name.'</h3>';
                    
                    // Make a loop to display post link which are in this sub category
                    foreach (get_posts( array(
                                              'category' => $term_id,
                                              'orderby' => 'date',
                                              'order'   => 'DESC',
                                              'numberposts' => 3,   // limit number of posts
                                            ) ) as $post) {
                        setup_postdata( $post );
                        echo "<div class='col-lg-4 col-md-4 col-sm-4 col-xs-12 post-link'>";
                            echo '<h4 class="title"><a href="'.get_permalink($post->ID).'">'.get_the_title().'</a></h4>';
                            echo '<a href="'.get_permalink($post->ID).'">';
                                echo '<div class="post-thumb">';
                                    if ( has_post_thumbnail() ) {
                                        the_post_thumbnail();
                                    }
                                echo '</div>';
                            echo '</a>';
                        echo "</div>";
                    }
                    
                    if( $total_posts > 3 )
                    {   ?>
                        <h4>
                            <a href="http://www.enterhelix.com/shan/wordpress4.5/view-all?cat_name=<?php echo $category_name; ?>&term_id=<?php echo $term_id; ?>">View all &raquo;</a>
                        </h4>
                    <?php   }
                    echo "</div>";  /* sub-category-wrapper */
                    
                }
            }
            else
            {
                if( have_posts() )  :
                    while( have_posts() )   : the_post();
                        echo "<div class='col-lg-4 col-md-4 col-sm-4 col-xs-12 post-link'>";
                            echo '<h4 class="title"><a href="'.get_permalink($post->ID).'">'.get_the_title().'</a></h4>';
                            echo '<a href="'.get_permalink($post->ID).'">';
                                echo '<div class="post-thumb">';
                                    if ( has_post_thumbnail() ) {
                                        the_post_thumbnail();
                                    }
                                echo '</div>';
                            echo '</a>';
                        echo "</div>";
                    endwhile;
                    else    :
                        echo "No posts are there";
                endif;
            }
        ?>
    </div>
    

<?php get_footer(); ?>