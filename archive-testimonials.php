<?php
/**
 * The template for displaying Testimonial Archive page.
 *
 * Learn more: http://codex.wordpress.org/Template_Hierarchy
 *
 * @package GeneratePress
 */

// No direct access, please
if ( ! defined( 'ABSPATH' ) ) exit;

get_header(); ?>

    <section id="primary" <?php generate_content_class(); ?>>
        <main id="main" <?php generate_main_class(); ?>>
        <?php do_action('generate_before_main_content');
        remove_action('generate_archive_title','generate_archive_title');?>
        <?php if ( have_posts() ) : ?>

            <?php do_action( 'generate_archive_title' ); ?>

            <?php /* Start the Loop */ ?>
            <?php while ( have_posts() ) : the_post(); ?>

                <?php
                    /* Include the Post-Format-specific template for the content.
                     * If you want to override this in a child theme, then include a file
                     * called content-___.php (where ___ is the Post Format name) and that will be used instead.
                     */
                    get_template_part( 'content', 'testimonial', get_post_format() );
                ?>

            <?php endwhile; ?>

            <?php generate_content_nav( 'nav-below' ); ?>

        <?php else : ?>

            <?php get_template_part( 'no-results', 'archive' ); ?>

        <?php endif; ?>
        <?php do_action('generate_after_main_content'); ?>
        </main><!-- #main -->
    </section><!-- #primary -->

<?php
get_footer();


//* Remove the entry title (requires HTML5 theme support)
//* Add the entry title as attribution to the textimonial
// remove_action( 'genesis_entry_header', 'genesis_do_post_title' );
// add_action( 'genesis_entry_footer', 'casa_do_post_title_as_attribution' );

// function casa_do_post_title_as_attribution() {

//     $title = apply_filters( 'genesis_post_title_text', get_the_title() );

//     if ( 0 === mb_strlen( $title ) )
//         return;

//     // Build the output.
//     $output = genesis_markup( array(
//         'open'    => "<cite class='attcontainer'><div class='attborderwrap'><div class='attborderdiv'></div></div><div class='attribution'>",
//         'close'   => "</div></cite>",
//         'content' => $title,
//         'context' => 'entry-title',
//         'echo'    => false,
//     ) );

//     echo apply_filters( 'genesis_post_title_output', "$output \n", $title );
// }


