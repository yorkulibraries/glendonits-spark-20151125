<?php
$blog = get_blog_details();
$url = $blog->siteurl;
$title = $blog->blogname;
?>

<?php if (has_nav_menu('primary')) { ?>
    <div class="navbar navbar-default navbar-one" role="navigation">
        <div class="container">
            <div class="navbar-header">
                <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar-one" aria-expanded="false" aria-controls="navbar">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>

            </div>
            <div id="navbar-one" class="navbar-collapse collapse">
                <!--Make future students available for smaller screens-->
                <ul class="nav hidden-lg hidden-md hidden-sm collapse-glendon">
                    <li role="presentation"><a href="<?php echo _e('Future students url', 'glendon'); ?>"><?php echo _e('Future students', 'glendon'); ?></a></li>
                    <li role="presentation"><a href="<?php echo _e('Current students url', 'glendon'); ?>"><?php echo _e('Current students', 'glendon'); ?></a></li>
                    <li role="presentation"><a href="<?php echo _e('Alumni and visitors url', 'glendon'); ?>"><?php echo _e('Alumni and visitors', 'glendon'); ?></a></li>
                </ul>
                <!--This menu is available for all screen sizes-->
                <?php
//                nav_create_menu('primary', 'navbar-one');
                // nav_create_menu_from_wp_nav_menu('primary', 'navbar-one');
                ?>

            </div><!--/.navbar-collapse -->
        </div>
    </div>
    <?php
}
/*if (ICL_LANGUAGE_CODE == 'fr') {
    putRevSlider('homefr');
} else {
    putRevSlider('home');
}*/
//putRevSlider('home');
//wp_nav_menu();
?>
<!--Blue bar containing page name-->
<style>
    /*.navbar-inverse .navbar-nav > .active > a, .navbar-inverse .navbar-nav > .active > a:hover, .navbar-inverse .navbar-nav > .active > a:focus {
        background-color: #004F8B;
        color: #fff;
    }*/
</style>
<!-- <nav id="nav-bar" class="navbar navbar-inverse navbar-static navbar-home-page">
    <div class="container">
        <div class="navbar-header">
            <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar-home" aria-expanded="false" aria-controls="navbar">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>

        </div>

        <div id="navbar-home" class="navbar-collapse collapse">
            <ul class="nav navbar-nav navbar-home">
                <li id="featured-li" class="active"><a href="#" id='btn_featured' class="tab-1" role='presentation'><?php echo _e('Featured', 'glendon'); ?></a></li>
                <li id="events-li"><a href="#" id='btn_events' class="tab-2" role='presentation'><?php echo _e('Events', 'glendon'); ?></a></li>
            </ul>
        </div>
    </div>
</nav> -->
