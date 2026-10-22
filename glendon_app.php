<?php
/**
 * Template Name: Glendon APP
 *
 * @package WordPress
 * @subpackage Glendon Bootstrap
 */
get_header('app');
?>


        <?php if (have_posts()) : ?>
            <?php /* The loop */ ?>
            <?php
            while (have_posts()) : the_post();
                if (has_post_thumbnail()) {
                    the_post_thumbnail('thumbnail', array('class' => 'alignleft'));
                }
                ?>
                <?php get_template_part('content-no-title', get_post_format()); ?>
            <?php endwhile; ?>
        <?php else : ?>
            <?php get_template_part('content-no-title', 'none'); ?>
        <?php endif; ?>

<?php get_footer('app'); ?>
