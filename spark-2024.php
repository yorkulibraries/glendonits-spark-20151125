<?php
/**
 * The main template file.
 *
 * This is the most generic template file in a WordPress theme and one of the
 * two required files for a theme (the other being style.css).
 * It is used to display a page when nothing more specific matches a query.
 * For example, it puts together the home page when no home.php file exists.
 *
 * Learn more: http://codex.wordpress.org/Template_Hierarchy
 *
 * @package    WordPress
 * @subpackage Glendon bootstrap
 */
get_header('spark');
$wwwroot = get_template_directory_uri();

$root_url = home_url();

if (isset($_GET["l"])) {
    $_SESSION["slang"] = $_GET["l"];
}
$lng = "";
if ($_SESSION["slang"] == "fr") {
    $lng = "_fr";
}

$course_modules = [
    'getting started' => 10,
    'exploring' => 20,
    'pulling it together' => 30,
    'faculty' => 40,
];

//Nav bar for main pages
//include('includes/nav-bar-default.php');

$current_module_id = get_post_custom_values('spark_topic', get_the_ID())[0];
$current_module = strtolower(preg_replace('/[^A-Za-z0-9-]+/', '-', array_keys($course_modules)[0]));
$counter = 0;
foreach ($course_modules as $key => $module) {
    $counter++;
    if ($current_module_id >= $module) {
        $current_module = strtolower(preg_replace('/[^A-Za-z0-9-]+/', '-', $key));
    }
}
?>
    <link rel="stylesheet" href="<?php echo $wwwroot; ?>/spark_content<?php echo $lng ?>.css" type="text/css">
    <link rel="stylesheet" href="<?php echo $wwwroot; ?>/img/11/11<?php echo $lng ?>.css" type="text/css">
<?php if ($current_module_id == 41) { ?>
    <link rel="stylesheet" href="<?php echo $wwwroot; ?>/spark_faculty_overide.css" type="text/css">
<?php } ?>
</head>
<body <?php body_class(); ?> >
<div class="dark-blanket"></div>
<div class="container wrapper">
    <div class="col-md-12">
<!-- SPARK -->
<?php if ($_SESSION["slang"] == "fr") { ?>
    <div class="content-page-container"<?php if ($current_module_id == 0) { ?> style="width: 780px"<?php } ?>>
        <?php if ($current_module_id > 0) { ?>
        <?php
        $current_module = $current_module . '-fr';

            ?>
            <div class="new-left-menu">
                <?php
                // Primary navigation menu.
                wp_nav_menu([
                    'menu_class'     => 'nav-menu',
                    'theme_location' => $current_module,
                ]);
                ?>
                <div class="left-menu-search">
                   <!-- <form id="cse-search-box" target="_blank" method="get" action="http://www.yorku.ca/spark/search/">
                        <input type="text" name="q" maxlength="255" id="yeb11searchfield"
                               style="border: 1px solid rgb(126, 157, 185); padding: 2px; background: url(https://www.google.com/cse/static/fr/google_custom_search_watermark.gif) 0% 50% no-repeat rgb(255, 255, 255);width:100%;">
                        <input type="image" src="http://www.yorku.ca/web/css/yeb11searchbutton.gif" width="30"
                               height="18" border="0" alt="GO" name="btnG" id="yeb11searchbutton">
                        <input name="siteurl" type="hidden"
                               value="www.yorku.ca/spark/understanding_the_assignment/index.html"><input name="ref"
                                                                                                         type="hidden"
                                                                                                         value="www.yorku.ca/spark/index.html"><input
                            name="ss" type="hidden" value=""></form>-->
                </div>
                <div class="left-menu-logo">
                    <a href="http://www.yorku.ca/index.html" target="_blank" title="York University Web Site">
                        <img src="<?php echo $wwwroot; ?>/img/content/york_logo.jpg" alt="York University Logo"/>
                    </a>
                </div>
            </div>
            <?php } ?>




        <div class="content-container">
            <a href="?page_id=<?php echo get_the_id() ?>&l=en" title="English" class="lang-change"
               style="background-image:url(<?php echo $wwwroot; ?>/img/lang_change_en.gif)"></a>

            <div class="content-logo" title="SPARK Logo">
                <div class="content-logo-button">
                    <?php the_field('spark_breadcrumb_fr'); ?>
                </div>
            </div>
            <div class="content-section-container">
                <?php if ($current_module_id > 0) { ?>
                <img class="content-section-separator" src="<?php echo $wwwroot; ?>/img/content/shape003_11136.png"
                     width="573" height="3"/>
                <?php } ?>

                <?php
                $resource_links_fr = array_filter(explode("\n", get_field('resource_links_fr')));
                if (count($resource_links_fr)) {
                    ?>

                    <div class="resource-box">
                        <h2>Ressources</h2>
                        <ul>
                            <?php

                            foreach ($resource_links_fr as $link) {
                                $listing = explode("|", $link);
                                $href = filter_var(filter_var($listing[1], FILTER_SANITIZE_URL), FILTER_VALIDATE_URL);
                                if (empty($href)) {
                                    $href = $wwwroot . $listing[1];
                                }
                                echo '<li><a href="' . $href . '" target="_blank" title="' . $listing[0] . '">' . $listing[0] . '</a></li>';
                            }

                            ?>
                        </ul>
                    </div>

                <?php } ?>

                <div class="text-content fr">
                    <?php
                    echo get_field("content_fr");

                    $fileFLV = get_field('video_file_fr');
                    $captionXML = get_field('video_file_captions_fr');
                    $fileMP4 = get_field('video_file_mac_fr');
                    $displayLang = "fr";
                    $transcripts = spark_get_transcript(get_the_id(), $displayLang);

                    $spark_video_widget_flv = null;
                    if ($fileFLV != "") {
                        $spark_video_widget_flv = spark_video_widget(get_the_id(), $wwwroot, $fileFLV, $captionXML, $fileMP4, !is_null($transcripts), 'lr', $displayLang);
                    }

                    if (!empty($fileFLV) || !empty($captionXML) || !empty($fileMP4)) {
                        echo '<div class="video-content-lr">';
                        echo $spark_video_widget_flv;
                        echo '</div>';
                        echo $transcripts;
                    }

                    ?>
                </div>

                <div class="content-bottom-navbar">
                    <?php if ($current_module_id > 0) { ?>
                    <div class="content-bottom-progress-container">
                        <?php
                        $pCC = (int) get_field("percent_completed");
                        $pCCValue = 568 - (568 * ($pCC / 100));
                        ?>
                        <div class="content-bottom-progress" style="background-position: <?php if ($pCCValue > 0) {
                            echo '-' . $pCCValue . 'px;';
                        } else {
                            if (strpos($current_module, 'faculty') === 0) {
                                echo '20px;background-color: #484977;';
                            } else {
                                echo '20px;background-color: #B70201;';
                            }
                        } ?>">
                            <div style="float: left;"><?php echo $pCC . "%"; ?></div>
                            <?php
                            if ($pCC >= 100) {
                                ?>
                                <div style="float: right;margin-right: 3px;">Complété!</div>
                                <?php
                            }
                            ?>
                        </div>
                        <div class="content-bottom-progress-line"></div>
                    </div>
                    <?php get_template_part('includes/module-page-navigation'); ?>
                    <?php } ?>
                </div>
            </div>
        </div>
    </div>
<?php } else { ?>
    <div class="content-page-container"<?php if ($current_module_id == 0) { ?> style="width: 780px"<?php } ?>>
        <?php if ($current_module_id > 0) { ?>
        <div class="new-left-menu">
            <?php
            // Primary navigation menu.
            wp_nav_menu([
                'menu_class'     => 'nav-menu',
                'theme_location' => $current_module,
            ]);
            ?>
            <div class="left-menu-search">
                <!--<form id="cse-search-box" target="_blank" method="get" action="http://www.yorku.ca/spark/search/">
                    <input type="text" name="q" maxlength="255" id="yeb11searchfield"
                           style="border: 1px solid rgb(126, 157, 185); padding: 2px; background: url(https://www.google.com/cse/static/en/google_custom_search_watermark.gif) 0% 50% no-repeat rgb(255, 255, 255);width:100%;">
                    <input type="image" src="http://www.yorku.ca/web/css/yeb11searchbutton.gif" width="30"
                           height="18" border="0" alt="GO" name="btnG" id="yeb11searchbutton">
                    <input name="siteurl" type="hidden"
                           value="www.yorku.ca/spark/understanding_the_assignment/index.html"><input name="ref"
                                                                                                     type="hidden"
                                                                                                     value="www.yorku.ca/spark/index.html"><input
                        name="ss" type="hidden" value=""></form>-->
            </div>
            <div class="left-menu-logo">
                <a href="http://www.yorku.ca/index.html" target="_blank" title="York University Web Site">
                    <img src="<?php echo $wwwroot; ?>/img/content/york_logo.jpg" alt="York University Logo"/>
                </a>
            </div>
        </div>
        <?php } ?>



        <div class="content-container">
            <?php if ($_SESSION["slang"] == "fr") { ?>
                <a href="?page_id=<?php echo get_the_id() ?>&l=en" title="English" class="lang-change"
                   style="background-image:url(<?php echo $wwwroot; ?>/img/lang_change_en.gif)"></a>
            <?php } else { ?>
                <a href="?page_id=<?php echo get_the_id() ?>&l=fr" title="Francais" class="lang-change"
                   style="background-image:url(<?php echo $wwwroot; ?>/img/lang_change_fr.gif)"></a>
            <?php } ?>
            <div class="content-logo" title="SPARK Logo">
                <div class="content-logo-button">
                    <?php the_field('spark_breadcrumb_en'); ?>
                </div>
            </div>
            <div class="content-section-container">
                <?php if ($current_module_id > 0) { ?>
                <img class="content-section-separator" src="<?php echo $wwwroot; ?>/img/content/shape003_11136.png"
                     width="573" height="3"/>
                <?php } ?>

                <?php
                $resource_links = array_filter(explode("\n", get_field('resource_links_en')));
                if (!empty($resource_links)) {
                    ?>

                    <div class="resource-box">
                        <h2>Resources</h2>
                        <ul>
                            <?php

                            foreach ($resource_links as $link) {
                                $listing = explode("|", $link);
                                $href = filter_var(filter_var($listing[1], FILTER_SANITIZE_URL), FILTER_VALIDATE_URL);
                                if (empty($href)) {
                                    $href = $wwwroot . $listing[1];
                                }
                                echo '<li><a href="' . $href . '" target="_blank" title="' . $listing[0] . '">' . $listing[0] . '</a></li>';
                            }

                            ?>
                        </ul>
                    </div>

                <?php } ?>


                <div class="text-content">

                    <?php if (have_posts()) : while (have_posts()) : the_post();
                        the_content();
                    endwhile;
                    else: ?>
                        <p>Sorry, page cannot be displayed.</p>
                    <?php endif; ?>

                    <!-- video -->
                    <?php
                    $fileFLV = get_field('video_file_en');
                    $captionXML = get_field('video_file_captions_en');
                    $fileMP4 = get_field('video_file_mac_en');
                    $displayLang = "en";
                    $transcripts = spark_get_transcript(get_the_id(), $displayLang);

                    $spark_video_widget_flv = null;
                    if ($fileFLV != "") {
                        $spark_video_widget_flv = spark_video_widget(get_the_id(), $wwwroot, $fileFLV, $captionXML, $fileMP4, !is_null($transcripts), 'lr');
                    }

                    if (!empty($fileFLV) || !empty($captionXML) || !empty($fileMP4)) {
                        echo '<div class="video-content-lr">';
                        echo $spark_video_widget_flv;
                        echo '</div>';
                        echo $transcripts;
                    }

                    ?>


                </div>

                <div class="content-bottom-navbar">
                    <?php if ($current_module_id > 0) { ?>
                    <div class="content-bottom-progress-container">
                        <?php
                        $pCC = (int) get_field("percent_completed");
                        $pCCValue = 568 - (568 * ($pCC / 100));
                        ?>
                        <div class="content-bottom-progress" style="background-position: <?php if ($pCCValue > 0) {
                            echo '-' . $pCCValue . 'px;';
                        } else {
                            if (strpos($current_module, 'faculty') === 0) {
                                echo '20px;background-color: #484977;';
                            } else {
                                echo '20px;background-color: #B70201;';
                            }
                        } ?>">
                            <div style="float: left;"><?php echo $pCC . "%"; ?></div>
                            <?php
                            if ($pCC >= 100) {
                                ?>
                                <div style="float: right;margin-right: 3px;">Completed!</div>
                                <?php
                            }
                            ?>
                        </div>
                        <div class="content-bottom-progress-line"></div>
                    </div>
                    <?php get_template_part('includes/module-page-navigation'); ?>

                    <?php } ?>
                </div>
            </div>
        </div>
    </div>
<?php } ?>
<!-- Include Objectives ID for this section -->
<?php echo spark_get_objectives('300', $_SESSION["slang"]); ?>
<!-- End Objectives -->

<!-- END SPARK -->
    </div>
</div> <!--container-->
<?php get_footer('spark'); ?>