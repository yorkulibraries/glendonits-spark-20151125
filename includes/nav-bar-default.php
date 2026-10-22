<?php
$blog = get_blog_details();
//$url = icl_get_home_url();
$url = "#";
$title = $blog->blogname;

?>
<!--Blue bar containing page name-->
<nav id="top-bar" class="navbar navbar-inverse navbar-static navbar-two">
    <div class="container">
        <a class="navbar-brand" href="<?php echo $url?>"><?php echo $title ?></a>
    </div>
</nav>

<?php if (has_nav_menu('primary')) { ?>
    <div id="secondary-bar" class="navbar navbar-default navbar-one" role="navigation">
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
                //nav_create_menu('primary', 'navbar-one');
                // nav_create_menu_from_wp_nav_menu('primary', 'navbar-one');
                ?>

            </div><!--/.navbar-collapse -->
        </div>
    </div>
<?php } ?>
