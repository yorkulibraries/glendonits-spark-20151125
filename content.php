<article id="post-<?php the_ID(); ?>" role="article">
    <header> 
        <?php
        if (is_single() || is_page()) {
        ?>
        <div class="page-header"><h1><?php the_title(); ?></h1></div>  
        <?php } else {?>
        <div class=""><h1><a href="<?php the_permalink()?>"><?php the_title(); ?></a></h1></div>
        <?php }?>
    </header>  <!--end article header--> 
    <section class="post_content">
        <?php
        global $options;
        if (has_post_thumbnail() && $options['post_featured_images'] && !post_password_required()) {

            //the_post_thumbnail();
        }

        if (is_single() || is_page()) {
            the_content();
        } else {
            the_date();
            echo ' ';
            the_tags();
            
            the_excerpt();
        }

        wp_link_pages(array('before' => '<div class="page-links"><span class="page-links-title">' . __('Pages:', 'glendon') . '</span>', 'after' => '</div>', 'link_before' => '<span>', 'link_after' => '</span>'));
        ?>
    </section>  <!--end article section -->
    <footer class="entry-meta">
        <?php if (comments_open() && !is_single()) : ?>
            <div class="comments-link">
                <?php comments_popup_link('<span class="leave-reply">' . __('Leave a comment', 'glendon') . '</span>', __('One comment so far', 'glendon'), __('View all % comments', 'glendon')); ?>
            </div><!-- .comments-link -->
        <?php endif; // comments_open()   ?>

        <?php if (is_single() && get_the_author_meta('description') && is_multi_author()) : ?>
            <?php get_template_part('author-bio'); ?>
        <?php endif; ?>
    </footer><!-- .entry-meta -->
    <br>
</article>  <!--end article -->

