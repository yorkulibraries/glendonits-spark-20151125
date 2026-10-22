<?php
/**
 * Template Name: No-Title or Sidebar Template
 * @package WordPress
 * @subpackage Glendon bootstrap
 */
get_header();

//Nav bar for main pages
include('includes/nav-bar-default.php');
?>

<div class="container wrapper">
    <div class="col-md-12">
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
    
    </div>
</div> <!--container-->
<?php get_footer(); ?>

