<?php
/**
 * The sidebar containing the secondary widget area, displays on posts and pages.
 *
 * If no active widgets in this sidebar, it will be hidden completely.
 *
 * @package WordPress
 * @subpackage Glendon Bootstrap
 */

?>


<?php
if ( is_active_sidebar( 'sidebar-2' ) ) : ?>
   <?php dynamic_sidebar( 'sidebar-2' ); ?>
<?php endif; ?>
