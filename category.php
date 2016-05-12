<?php
/**
 * The template for displaying the category
 */

?>

<?php get_header(); ?>

<?php
    // get category ID of particular category
        $current_category = single_cat_title("", false);
        $category_id = get_cat_ID($current_category);
    
        // getting parent category name
        $child = get_category($category_id);   //firstly, load data for your child category
        $parent = $child->parent;               //from your child category, grab parent ID
        $parent_name = get_category($parent);   //load object for parent category
        $parent_cat_name = $parent_name->name;  //grab a category name
    // end getting category ID
    
    if( $parent_cat_name == '' )
    {
        // it has no parent category, means it is the parent
    }
    else
    {
        // it has a parent category, it is a child, so display slidebar
        echo do_shortcode('[FlexSlider2 id="64"]');
    }
    
?>

<?php get_sidebar(); ?>

    <div class="col-lg-9 col-md-9 col-sm-9 col-xs-12 right-panel">
        <?php
            // Get the name of sub-category
            $categories =  get_categories('child_of='.$category_id);
            
            /* check if the category has sub-categories,
             * if so below part will be executed,
             * if not, the else part will be executed
             */
            if( sizeof($categories) != 0 )
            {
                // Display category title
                echo "<h2 class='parent-cat-name'>category archives: $current_category</h2>";
                
                foreach  ($categories as $category) {
                    
                    $category_name      =   $category->name;    // sub-category name
                    $category_nicename  =   $category->category_nicename;   //nicename
                    $term_id            =   $category->term_id; // sub-category term ID
                    $total_posts        =   $category->count;   // total posts under particular sub-category
                    
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
                                        the_post_thumbnail('thumbnail', array( 'class'	=> "img-responsive"));
                                    }
                                    else
                                    {
                                        echo "Image Not available";
                                    }
                                echo '</div>';
                            echo '</a>';
                        echo "</div>";
                    }
                    
                    if( $total_posts > 3 )
                    {   ?>
                        <h4 style="float: left; width: 100%;">
                            <a href="<?php echo home_url().'/category/'.$category_nicename ?>"><em>View all</em></a>
                        </h4>
                    <?php   }
                    echo "</div>";  /* sub-category-wrapper */
                    
                }
            }
            else
            {
                // Display category title
                echo "<h2 class='parent-cat-name'>$parent_cat_name &raquo; $current_category</h2>";
                
                if( have_posts() )  :
                    while( have_posts() )   : the_post();
                        echo "<div class='col-lg-4 col-md-4 col-sm-4 col-xs-12 post-link'>";
                            echo '<h4 class="title"><a href="'.get_permalink($post->ID).'">'.get_the_title().'</a></h4>';
                            echo '<a href="'.get_permalink($post->ID).'">';
                                echo '<div class="post-thumb">';
                                    if ( has_post_thumbnail() ) {
                                        the_post_thumbnail('thumbnail', array( 'class'	=> "img-responsive"));
                                    }
                                    else
                                    {
                                        echo "Image Not available";
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