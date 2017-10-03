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

/**************/////////
// https://studiofreya.com/wordpress/how-to-list-child-pages-with-thumbnails-in-a-wordpress-theme/
add_shortcode('show_project_child_pages', 'sbsg_show_child_page_thumbs');

function sbsg_show_child_page_thumbs() {

    global $post;
    $child_pages_query_args = array(
        'post_type'   => 'page',
        'post_parent' => $post->ID,
        'orderby'     => 'date DESC'
    );

    $child_pages = new WP_Query( $child_pages_query_args );

    if ( $child_pages->have_posts() ) :
    ?>
    <div class="links-to-projects">
        <?php
        while ( $child_pages->have_posts() ) : $child_pages->the_post();
            ?>
            <a class="link-to-project" href="<?php the_permalink(); ?>">
            <?php if(has_post_thumbnail()): ?>
                <div class="child_page_thumb">
                    <?php the_post_thumbnail(); ?>
                </div>
            <?php endif; ?>
                <div class="child_page_name">
                    <?php the_title(); ?>
                </div>
            </a>
        <?php
        endwhile;
        ?>
    </div>
    <?php
    endif;

    wp_reset_postdata();

}
