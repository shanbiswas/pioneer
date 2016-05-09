<?php
/**
 * The template for displaying the sidebar
 */
?>

<div class="col-lg-3 col-md-3 col-sm-3 col-xs-12">
    <div class="sidebar">
        
        <!--Categories -->
        <div class="sidebar-content-wrapper">
            <h4 class="sidebar-content-header">Category</h4>
            <ul class="sidebar-ul">
                <?php wp_list_categories( array(
                                    //below these are the parameters passed in wp_list_categories() function, can be changable as per requirement
                                        'title_li'      => __(''),
                                        'show_count'    => '1', // whether to display no. of posts in this category
                                        'depth'         => '1'
                                        ) ); ?>
            </ul>
        </div>
        <!--End categories -->
        
    </div>
</div>