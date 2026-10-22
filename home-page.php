<?php
/**
 *
 * Template Name: Home page
 *
 * @package WordPress
 * @subpackage Glendon Bootstrap
 */
get_header();
$wwwroot = get_template_directory_uri();

if (isset($_GET["l"])) {
	$_SESSION["slang"] = $_GET["l"];
}
$lng = "";
if ($_SESSION["slang"]=="fr") {
	$lng = "_fr";
}

//Nav bar for main pages
// include('includes/nav-bar-homepage.php');




?>
		<link rel="stylesheet" href="<?php echo $wwwroot; ?>/spark_gui<?php echo $lng ?>.css" type="text/css">
<div class="dark-blanket"></div>

<div class="container wrapper">
    <div class="col-md-12">
<!-- SPARK -->
<div class="gui-container">
<?php if ($_SESSION["slang"]=="fr") { ?>
   	<a href="?page_id=<?php echo get_the_id() ?>&l=en" title="English" class="lang-change-home" style="background-image:url(<?php echo $wwwroot; ?>/img/lang_change_en.gif)"></a>
	<div class="gui-logo">
    	<img src="<?php echo $wwwroot; ?>/img/spark_logo_fr.png" width="735" height="111" alt="Trousse académique pour étudiants" />
	</div>

    <div>
        <?php if ( has_nav_menu( 'homepage-fr' ) ) { ?>
            <div class="new-homepage-menu">
                <?php
                    // Homepage navigation menu.
                    wp_nav_menu( array(
                        'menu_class'     => 'homepage-menu',
                        'theme_location' => 'homepage-fr',
                    ) );
                ?>
            </div>
        <?php } ?>
    </div>

    <div class="home-page-content-container">
    	<div class="home-page-text-content">
        	<?php echo get_field("content_fr"); ?>
		</div>
        <div class="home-page-video-content">
			<!-- video -->
            <?php
			$fileFLV = get_field('video_file_fr');
			$captionXML = get_field('video_file_captions_fr');
			$fileMP4 = get_field('video_file_mac_fr');
            $displayLang = "fr";
            $transcripts = spark_get_transcript(get_the_id(), $displayLang);
			if ($fileFLV != "") {
	            echo spark_video_widget(get_the_id(), $wwwroot, $fileFLV, $captionXML, $fileMP4, !is_null($transcripts));
			}
			echo $transcripts;
			?>

        </div>
    </div>
    <div class="gui-separator"></div>
    <div class="gui-bottom-bar-container">
    	<div class="gui-bottom-bar">
            <?php if ( has_nav_menu( 'homepage-bottom-navbar-red-fr' ) ) {
                // Homepage navigation menu.
                wp_nav_menu( array(
                    'menu_class'     => 'homepage-bottom-navbar-red-menu',
                    'theme_location' => 'homepage-bottom-navbar-red-fr',
                ) );
            } ?>
        </div>
    </div>
    <div class="gui-bottom-nav-bar-container">
	    <div class="gui-bottom-nav-bar">

            <?php if ( has_nav_menu( 'homepage-bottom-navbar-grey-fr' ) ) {
                // Homepage navigation menu.
                wp_nav_menu( array(
                    'menu_class'     => 'homepage-bottom-navbar-grey-menu',
                    'theme_location' => 'homepage-bottom-navbar-grey-fr',
                ) );
            } ?>

        </div>
	    <a href="http://learningcommons.yorku.ca/" target="_blank" class="gui-bottom-nav-lc-link" title="Learning Commons Link"></a>
    </div>
    <div class="yul-cc">
<a rel="license" href="http://creativecommons.org/licenses/by-nc-sa/4.0/"><img alt="Licence Creative Commons" style="border-width:0" src="https://i.creativecommons.org/l/by-nc-sa/4.0/88x31.png" /></a>Ce(tte) œuvre est mise à disposition selon les termes de la <a rel="license" href="http://creativecommons.org/licenses/by-nc-sa/4.0/">Licence Creative Commons Attribution - Pas d’Utilisation Commerciale - Partage dans les Mêmes Conditions 4.0 International</a>.
    </div>
<?php } else { ?>
   <a href="?page_id=<?php echo get_the_id() ?>&l=fr" title="Francais" class="lang-change-home" style="background-image:url(<?php echo $wwwroot; ?>/img/lang_change_fr.gif)"></a>
	<div class="gui-logo">
    	<img src="<?php echo $wwwroot; ?>/img/spark_logo.png" width="735" height="111" alt="SPARK is the student papers and academic research kit. Shown are two images of a spark representing the creation of an idea." />
      <div class="faculty-nav-button"><a href="https://spark.library.yorku.ca/faculty-teaching-with-spark-what-is-spark/">Faculty Guide</a></div>
	</div>

    <div>
		<!-- <div class="homepage-notice">
			<p>The SPARK Academic Integrity module is currently being updated. The revised version will be available on September 2, 2024 in time for the Fall term.For any questions, please contact us at <a href="mailto:askspark@yorku.ca">askspark@yorku.ca.</a></p>
		</div> -->
        <?php if ( has_nav_menu( 'homepage' ) ) { ?>
            <div class="new-homepage-menu">
                <?php
                    // Homepage navigation menu.
                    wp_nav_menu( array(
                        'menu_class'     => 'homepage-menu',
                        'theme_location' => 'homepage',
                    ) );
                ?>
            </div>
        <?php } ?>
    </div>


    <div class="home-page-content-container">
    	<div class="home-page-text-content">
        	<?php if ( have_posts() ) : while ( have_posts() ) : the_post();
			the_content();
			endwhile; else: ?>
			<p>Sorry, page cannot be displayed.</p>
			<?php endif; ?>
		</div>
        <div class="home-page-video-content">
			<!-- video -->
            <?php
			$fileFLV = get_field('video_file_en');
			$captionXML = get_field('video_file_captions_en');
			$fileMP4 = get_field('video_file_mac_en');
			$displayLang = "en";
			$transcripts = spark_get_transcript(get_the_id(), $displayLang);
            if ($fileFLV != "") {
                echo spark_video_widget(get_the_id(), $wwwroot, $fileFLV, $captionXML, $fileMP4, !is_null($transcripts));
            }
			echo $transcripts;
			?>

        </div>
    </div>
    <div class="gui-separator"></div>
    <div class="gui-bottom-bar-container">
    	<div class="gui-bottom-bar">
            <?php if ( has_nav_menu( 'homepage-bottom-navbar-red' ) ) {
                // Homepage navigation menu.
                wp_nav_menu( array(
                    'menu_class'     => 'homepage-bottom-navbar-red-menu',
                    'theme_location' => 'homepage-bottom-navbar-red',
                ) );
            } ?>
        </div>
    </div>
    <div class="gui-bottom-nav-bar-container">
	    <div class="gui-bottom-nav-bar">
            <?php if ( has_nav_menu( 'homepage-bottom-navbar-grey' ) ) {
                // Homepage navigation menu.
                wp_nav_menu( array(
                    'menu_class'     => 'homepage-bottom-navbar-grey-menu',
                    'theme_location' => 'homepage-bottom-navbar-grey',
                ) );
            } ?>
        </div>
        <a href="http://learningcommons.yorku.ca/" target="_blank" class="gui-bottom-nav-lc-link" title="Learning Commons Link"></a>
    </div>
    <div class="yul-cc">
<a rel="license" href="http://creativecommons.org/licenses/by-nc-sa/4.0/"><img alt="Creative Commons License" style="border-width:0" src="https://i.creativecommons.org/l/by-nc-sa/4.0/88x31.png" /></a><small>This work is licensed under a <a rel="license" href="http://creativecommons.org/licenses/by-nc-sa/4.0/">Creative Commons Attribution-NonCommercial-ShareAlike 4.0 International License</a></small>
    </div>
<?php } ?>

</div>
<!-- END SPARK -->
    </div>

    </div>
    <?php
    get_footer();
    ?>
