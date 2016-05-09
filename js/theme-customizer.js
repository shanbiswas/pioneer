(function( $ ) {
    "use strict";
    
    wp.customize( 'body_background_color', function( value ) {
        value.bind( function( to ) {
            $( 'body' ).css( 'background-color', to );
        } );
    });
    
    wp.customize( 'body_text_color', function( value ) {
        value.bind( function( to ) {
            $( 'body' ).css( 'color', to );
        } );
    });
    
    wp.customize( 'all_link', function( value ) {
        value.bind( function( to ) {
            $( 'a' ).css( 'color', to );
        } );
    });
    
    wp.customize( 'header_background_color', function( value ) {
        value.bind( function( to ) {
            $( '.header' ).css( 'background-color', to );
        } );
    });
    
    wp.customize( 'header_menu_color', function( value ) {
        value.bind( function( to ) {
            $( '.menu-item a' ).css( 'color', to );
        } );
    });
    
    wp.customize( 'post_link', function( value ) {
        value.bind( function( to ) {
            $( '.post-heading a' ).css( 'color', to );
        } );
    });
    
    wp.customize( 'front_page_post_background_color', function( value ) {
        value.bind( function( to ) {
            $( '.front-page-post-wrapper' ).css( 'background-color', to );
        } );
    });
    
    wp.customize( 'sidebar_header_background', function( value ) {
        value.bind( function( to ) {
            $( '.sidebar-content-header' ).css( 'background-color', to );
        } );
    });
    
    wp.customize( 'sidebar_header_text_color', function( value ) {
        value.bind( function( to ) {
            $( '.sidebar-content-header' ).css( 'color', to );
        } );
    });
    
    wp.customize( 'sidebar_list_item_link_color', function( value ) {
        value.bind( function( to ) {
            $( '.sidebar-ul li a' ).css( 'color', to );
        } );
    });
 
})( jQuery );