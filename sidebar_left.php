<?php
/**
 * Template Name: Left Sidebar
 *
 * @package WordPress
 * @subpackage Glendon Bootstrap
 */
get_header();

include('includes/nav-bar-default.php');
?>

<div class="container wrapper">
    <div class="col-md-3 sidebar">
        <?php //echo $options["social_html"]; 
        echo glendonsocial();
        ?>
        <?php
        if (is_active_sidebar('sidebar-2')) {
            dynamic_sidebar('sidebar-2');
        }
        ?>
    </div>
    <div class="col-md-9">
        <?php if (have_posts()) : ?>
            <?php /* The loop */ ?>
            <?php
            while (have_posts()) : the_post();
                if (has_post_thumbnail()) {
                    the_post_thumbnail('thumbnail', array('class' => 'alignleft'));
                }
                ?>
                <?php get_template_part('content', get_post_format()); ?>
            <?php endwhile; ?>
        <?php else : ?>
            <?php get_template_part('content', 'none'); ?>
        <?php endif; ?>
    </div><!--col-md-8-->
    
</div> <!--container-->
<?php get_footer(); ?>
