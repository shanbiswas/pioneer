          
<?php
/**
 * The template for displaying the header
 *
 * Displays all of the head element and everything up until the "site-content" div.
 *
 * @package WordPress
 * @subpackage Twenty_Sixteen
 * @since Twenty Sixteen 1.0
 */

?>

<!DOCTYPE html>
    <html <?php language_attributes(); ?>>
        <head>
            <title><?php wp_title(); ?></title>
            <meta charset="<?php bloginfo( 'charset' ); ?>" />
            <meta name="viewport" content="width=device-width" />
            <?php wp_head(); ?>
        </head>
        
        <body>
            <!-- Navigation menu start -->
            <div class="container header">
                <nav class="navbar">
                    
                        <div class="navbar-header">
                            <?php if ( get_theme_mod( 'mytheme_logo' ) ) : ?>
                                <a class="header_logo" href='<?php echo esc_url( home_url( '/' ) ); ?>' title='<?php echo esc_attr( get_bloginfo( 'name', 'display' ) ); ?>' rel='home'>
                                    <img class="img-responsive logoImg" src='<?php echo esc_url( get_theme_mod( 'mytheme_logo' ) ); ?>' alt='<?php echo esc_attr( get_bloginfo( 'name', 'display' ) ); ?>'>
                                </a>
                            <?php else : ?>
                                <a class="header_logo" href='<?php echo esc_url( home_url( '/' ) ); ?>' title='<?php echo esc_attr( get_bloginfo( 'name', 'display' ) ); ?>' rel='home'>Logo</a>
                            <?php endif; ?>
                    
                            <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#myNavbar">
                                <span class="icon-bar"></span>
                                <span class="icon-bar"></span>
                                <span class="icon-bar"></span>
                            </button>
                        </div>
                        <?php wp_nav_menu( array(
                                                'menu'              => 'header-menu',
                                                'theme_location'    => 'primary',
                                                'menu_class'        => 'container-fluid',
                                                'container'         => 'div',
                                                'container_class'   => 'collapse navbar-collapse',
                                                'container_id'      => 'myNavbar',
                                                'items_wrap'        => '<ul class="nav navbar-nav">%3$s</ul>'
                                            ) ); ?>
                    
                </nav>
            </div>
            <!-- Navigation menu end -->
    <div class="container custom_background">
        <div class="row">
            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">