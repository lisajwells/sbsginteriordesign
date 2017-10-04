<?php
/**
 * @package GeneratePress
 */

// No direct access, please
if ( ! defined( 'ABSPATH' ) ) exit;
?>
<article id="post-<?php the_ID(); ?>" <?php post_class(); ?> <?php generate_article_schema( 'CreativeWork' ); ?>>

    <div class="inside-article">
        <?php do_action( 'generate_before_content' ); ?>

        <div class="entry-content" itemprop="text">
            <?php the_content(); ?>
            <?php
            wp_link_pages( array(
                'before' => '<div class="page-links">' . __( 'Pages:', 'generatepress' ),
                'after'  => '</div>',
            ) );
            ?>
        </div><!-- .entry-content -->
    </div><!-- .inside-article -->
</article><!-- #post-## -->
