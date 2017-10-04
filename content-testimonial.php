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

        <blockquote class="entry-content" itemprop="text">
            <?php if ( has_post_thumbnail() ) {
                the_post_thumbnail();
            }
            the_content(); ?>
            <cite><strong>—<?php the_field('attribution_name'); ?>,</strong> <?php the_field('attribution_role'); ?></cite>
        </blockquote><!-- .entry-content -->
    </div><!-- .inside-article -->
</article><!-- #post-## -->
