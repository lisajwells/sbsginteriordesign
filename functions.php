<?php

// function sbsg_enqueue_scripts() {
    // wp_enqueue_script( 'add-sbsg-js', get_stylesheet_directory_uri() . '/js/sbsg.js', array( 'jquery' ), '1.0.0', true );
// }
// add_action( 'wp_enqueue_scripts', 'sbsg_enqueue_scripts', 200 );

/* scroll to top of slider when thumbnail clicks */
function metaslider_nivo_js($javascript, $slider_id) {
    $javascript .= "(function($) {
$('.metaslider a').click(function() {
    $('html, body').animate({
        scrollTop: $('.metaslider').offset().top
    }, 1000);
});
})( jQuery );
";

    return $javascript;
}
add_filter('metaslider_nivo_slider_javascript', 'metaslider_nivo_js', 10, 2);

/* remove autop from white caption pages */
function sbsg_wpautop_filter_control( $content ){
    if ( is_front_page() || is_page( array( 'projects' ) ) ){
        return $content;
    } else {
        return wpautop($content);
    }
}

remove_filter( 'the_content', 'wpautop' );
add_filter( 'the_content', 'sbsg_wpautop_filter_control' );
