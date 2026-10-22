<?php
/**
 * Template Name: Popup Content
 *
 * @package WordPress
 * @subpackage Glendon Bootstrap
 */
get_header('spark');
?>

    <div class="popup-content">
        <?php if ( have_posts() ) : while ( have_posts() ) : the_post();
			the_content();
		endwhile; else: ?>
			<p>Sorry, page cannot be displayed.</p>
		<?php endif; ?>
     </div>
	
<?php get_footer('spark'); ?>
