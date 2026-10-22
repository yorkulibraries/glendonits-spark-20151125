<?php
/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
$wwwroot = get_template_directory_uri();
$root_url = home_url();
$html_class = ( is_admin_bar_showing() ) ? 'wp-toolbar' : '';

//Set language button
//$languages = icl_get_languages('skip_missing=Y');
//$currentlanguage = icl_get_current_language();
$languages = array("en"=>array("url"=>""), "fr"=>array("url"=>""));
$currentlanguage = "en";

//Only display button if pages have translations
$display = 'style="display: none;"';
if (count($languages) > 1) {
    $display = '';
    if ($currentlanguage == 'en') {
        $languageurl = $languages['fr']['url'];
    } else {
        $languageurl = $languages['en']['url'];
    }
}
$englishurl = $languages['en']['url'];
$frenchurl = $languages['fr']['url'];
$blog = get_blog_details();
$title = $blog->blogname;
?>
<!DOCTYPE html>
<!--[if IE 7]>
<html class="ie ie7 <?php echo $html_class; ?>" <?php language_attributes(); ?>>
<![endif]-->
<!--[if IE 8]>
<html class="ie ie8 <?php echo $html_class; ?>" <?php language_attributes(); ?>>
<![endif]-->
<!--[if !(IE 7) | !(IE 8)  ]><!-->
<html class="<?php echo $html_class; ?>" <?php language_attributes(); ?>>
    <![endif]-->
    <head>
 		<link rel="icon" type="image/ico" href="http://yorku.ca/favicon.ico">
       <meta charset="<?php bloginfo('charset'); ?>" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title><?php echo $title; ?> | York University </title>
        <link rel="pingback" href="<?php bloginfo('pingback_url'); ?>" />

        <!--[if lt IE 9]>
            <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
            <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>

        <![endif]-->

        
        <?php
        global $options;
        wp_head();
        ?>
        <!-- SPARK -->
       	<link rel="stylesheet" href="<?php echo $wwwroot; ?>/dialog.css" type="text/css">
		<link rel="stylesheet" href="<?php echo $wwwroot; ?>/spark_content.css" type="text/css">
		<script type="text/javascript" src="<?php echo $wwwroot; ?>/spark_gui.js"></script>
		<!-- END SPARK -->
        <script>
            $ = jQuery;
            var baseUrl = "<?php echo esc_url( $root_url ); ?>";
            $(document).ready(function () {

                init_glendon();

                if (!$('span.menu-toggle').is(":visible")) {
                    $(".nav-menu li > a.has-submenu").hover(function() {
                        $(this).addClass("highlighted").siblings("ul.sub-menu").addClass("submenu-open");
                    }, function() {
                        $(this).removeClass("highlighted").siblings("ul.sub-menu").removeClass("submenu-open");
                    });

                    $("ul.sub-menu").hover(function() {
                        $(this).addClass("submenu-open").parent().find("ul.sub-menu").addClass("highlighted");
                    }, function() {
                        $(this).removeClass("submenu-open").parent().find("ul.sub-menu").removeClass("highlighted");
                    });

                    $("ul.sub-menu > li > a, .nav-menu li > a.has-submenu").click(function() {
                        $("ul.sub-menu").removeClass("submenu-open").parent().find("ul.sub-menu").removeClass("highlighted");
                    });
                } else {
                    $('span.menu-toggle').click(function() {
                        $('ul.sub-menu').hide();
                        $('span.sub-arrow').show();
                        $('.menu-main-menu-container').toggle();
                        $('span.menu-toggle > i').removeClass('fa-caret-up').addClass('fa-caret-down');
                        if($('.menu-main-menu-container').is(":visible")) {
                            $('span.menu-toggle > i').removeClass('fa-caret-down').addClass('fa-caret-up');
                        }
                    });

                    $('a.has-submenu > span.sub-arrow').click(function(event) {
                        event.preventDefault();
                        var sub_menu = $(this).parent().parent().find('ul.sub-menu');
                        var is_visible = sub_menu.is(":visible");
                        $('ul.sub-menu').hide();
                        $('span.sub-arrow').show();
                        sub_menu.toggle();
                        $(this).css('display', 'unset');
                        if(!is_visible) {
                            $(this).css('display', 'none');
                        }
                    });
                }

                $("#ql-button").click(function() {
                    $("#quick-links-container").slideToggle();
                });
            });
        </script> 
        <!--<script type="text/javascript">
            (function (i, s, o, g, r, a, m) {
                i['GoogleAnalyticsObject'] = r;
                i[r] = i[r] || function () {
                    (i[r].q = i[r].q || []).push(arguments)
                }, i[r].l = 1 * new Date();
                a = s.createElement(o),
                        m = s.getElementsByTagName(o)[0];
                a.async = 1;
                a.src = g;
                m.parentNode.insertBefore(a, m)
            })(window, document, 'script', '//www.google-analytics.com/analytics.js', 'ga');

            ga('create', 'UA-45307416-1', 'yorku.ca');
            ga('send', 'pageview');
        </script>-->
        <link rel="stylesheet" href="<?php echo $wwwroot; ?>/spark_header.css" type="text/css">
    </head>
    <body <?php body_class(); ?> >
        

        <header id="masthead" role="banner">
            <div id="yeb11banner">
                <div class="york-logo-holder">
                    <a href="http://yorku.ca" target="_blank">
                        <img class="yorklogo" src="http://www.yorku.ca/yorkweb/demos/test-header/images/yorku-logo-rgb-240-122.jpg" border="0" alt="York University">
                    </a>
                </div>

                <button class="button quick-links" id="ql-button">
                    Quick Links <i class="fa fa-caret-down"></i>
                </button>
                <div id="quick-links-container" style="display:none;">

                    <div class="mobile-quicklinks-btns">
                        <div class="col4">
                            <button onclick="javascript:window.open('http://www.library.yorku.ca/web', '_blank')" class="header-btn"><i class="fa fa-book"></i> Libraries</button>
                            <button onclick="javascript:window.open('http://mocha.yorku.ca/atlas/servlet/atlas', '_blank')" class="header-btn"><i class="fa fa-binoculars"></i> Directory</button>
                        </div>
                        <div class="col4">
                            <button onclick="window.open('http://maps.info.yorku.ca/', '_blank')" class="header-btn"><i class="fa fa-map-marker"></i> Campus Maps</button>
                        </div>
                        <div class="clear"></div>
                        <ul class="menu">
                            <div class="col4">
                                <li>
                                    <a href="http://futurestudents.yorku.ca/" target="_blank"><span data-title="Future Students">Future Students</span></a>
                                </li>
                                <li class="mobile-quicklinks-cs">
                                    <a href="http://currentstudents.yorku.ca" target="_blank"><span data-title="Current Students">Current Students</span></a>
                                </li>
                            </div>
                            <div class="col4">
                                <li>
                                    <a href="http://alumniandfriends.yorku.ca" target="_blank"><span data-title="Alumni &amp; Friends">Alumni &amp; Friends</span></a>
                                </li>
                            </div>
                        </ul>

                        <div class="clear"></div>
                    </div>


                    <div class="col4">
                        <div class="accessible">
                            <h1>Quick Links Menus</h1>
                        </div>
                        <h2>York U <span class="accessible">Organization Menu</span></h2>
                        <ul>
                            <li>
                                <a href="http://about.yorku.ca/" target="_blank">About York U</a>
                            </li>
                            <li>
                                <a href="http://president.yorku.ca/" target="_blank">President's Message</a>
                            </li>
                            <li>
                                <a href="http://teachingandlearning.yorku.ca/" target="_blank">Teaching &amp; Learning</a>
                            </li>
                            <li>
                                <a href="http://www.yorku.ca/research/" target="_blank">Research</a>
                            </li>
                            <li>
                                <a href="http://www.glendon.yorku.ca/" target="_blank">Glendon Campus</a>
                            </li>
                            <li>
                                <a href="http://about.yorku.ca/careers/" target="_blank">Careers</a>
                            </li>
                            <li>
                                <a href="http://about.yorku.ca/our-faculties/" target="_blank">Faculties</a>
                            </li>
                            <li>
                                <a href="http://about.yorku.ca/organization/" target="_blank">York U Organization</a>
                            </li>
                            <li>
                                <a href="http://campuslife.yorku.ca/" target="_blank">Campus Life</a>
                            </li>
                            <li>
                                <a href="http://socialmedia.yorku.ca/yorku-social-media-directory/" target="_blank">York U Social Media Directory</a>
                            </li>
                        </ul>
                    </div>

                    <div class="col4">
                        <h2>Students <span class="accessible">Menu</span></h2>
                        <ul>
                            <li>
                                <a href="http://futurestudents.yorku.ca/programsearch/" target="_blank">Programs of Study</a>
                            </li>
                            <li>
                                <a href="http://futurestudents.yorku.ca/requirements/apply" target="_blank">Undergraduate Admissions</a>
                            </li>
                            <li>
                                <a href="http://futurestudents.yorku.ca/graduate/" target="_blank">Graduate Admissions</a>
                            </li>
                            <li>
                                <a href="http://futurestudents.yorku.ca/continuing/" target="_blank">Continuing Education</a>
                            </li>
                            <li>
                                <a href="http://futurestudents.yorku.ca/tour/" target="_blank">Book a Tour</a>
                            </li>
                            <li>
                                <a href="http://www.library.yorku.ca/" target="_blank">Libraries</a>
                            </li>
                            <li>
                                <a href="http://yorkinternational.yorku.ca/" target="_blank">York International</a>
                            </li>
                            <li>
                                <a href="http://mail.my.yorku.ca" target="_blank">Google Mail</a>
                            </li>
                            <li>
                                <a href="https://mymail.yorku.ca/" target="_blank">MyMail</a>
                            </li>
                            <li>
                                <a href="https://moodle.yorku.ca/" target="_blank">Moodle</a>
                            </li>
                        </ul>
                    </div>
                    <div class="mobile-header-clear"></div>

                    <div class="col4">
                        <h2>Faculty &amp; Staff</h2>
                        <ul>
                            <li>
                                <a href="http://facultyandstaff.yorku.ca/" target="_blank">Faculty &amp; Staff Home</a>
                            </li>
                            <li>
                                <a href="https://yulink.yorku.ca/" target="_blank">yu link</a>
                            </li>
                            <li>
                                <a href="http://webmail.notes.yorku.ca/" target="_blank">Lotus Notes</a>
                            </li>
                            <li>
                                <a href="https://mymail.yorku.ca/" target="_blank">MyMail</a>
                            </li>
                        </ul>
                        <div class="desktop-quicklinks-btns">
                            <button onclick="javascript:window.open('http://www.library.yorku.ca/web/', '_blank')" class="header-btn"><i class="fa fa-book"></i> Libraries</button>
                            <button onclick="javascript:window.open('http://mocha.yorku.ca/atlas/servlet/atlas', '_blank')" class="header-btn"><i class="fa fa-binoculars"></i> Directory</button>
                            <button onclick="javascript:window.open('http://maps.info.yorku.ca/', '_blank')" class="header-btn"><i class="fa fa-map-marker"></i> Campus Maps</button>
                        </div>

                    </div>
                    <div class="col4">
                        <h2>Community <span class="accessible">Menu</span></h2>
                        <ul>
                            <li>
                                <a href="http://family.yorku.ca/" target="_blank">Parents &amp; Family</a>
                            </li>
                            <li>
                                <a href="http://futurestudents.yorku.ca/counsellors/" target="_blank">Counsellors &amp; Teachers</a>
                            </li>
                            <li>
                                <a href="http://news.yorku.ca/" target="_blank">Media</a>
                            </li>
                            <li>
                                <a href="http://advancement.yorku.ca/" target="_blank">Giving to York</a>
                            </li>
                            <li>
                                <a href="http://www.yorkulions.ca/" target="_blank">York U Lions</a>
                            </li>
                            <li>
                                <a href="http://accessibilityhub.info.yorku.ca/" target="_blank">Accessibility</a>
                            </li>
                            <li>
                                <a href="http://site.info.yorku.ca/weather-status/" target="_blank">Weather Status</a>
                            </li>
                            <li>
                                <a href="http://safety.yorku.ca/prevention-response-sexual-violence/" target="_blank">Resources - Sexual Violence</a>
                            </li>
                        </ul>
                    </div>
                    <div class="clear"></div>
                </div>

                <div class="greyed-page"></div>

                <div id="yorklinks" class="nav-collapse">
                    <div id="yorklinks-container">
                        <div class="col4">

                            <form id="main-search" class="main-search" method="get" action="http://search2.info.yorku.ca">
                                <fieldset class="header-search">
                                    <legend class="accessible">Global Search</legend>
                                    <label for="yeb13searchfield" class="accessible">search box</label>
                                    <input class="header-search" type="search" name="q" maxlength="255" id="yeb13searchfield" value="Search yorku.ca" onclick="if (!this.cleared) { this.cleared = true; this.value = ''; }">
                                    <input type="hidden" name="client" value="External">
                                    <input type="hidden" name="proxystylesheet" value="External">
                                    <input type="hidden" name="site" value="default_collection">
                                    <input type="hidden" name="output" value="xml_no_dtd">
                                </fieldset>
                                <button type="submit" class="search-button">
                                    <div class="icon-search icon-medium"></div><span class="accessible">search button</span>
                                </button>
                            </form>

                            <div class="menu2-new">
                                <ul class="menu">
                                    <li>
                                        <a class="roll-link ie1" href="http://futurestudents.yorku.ca/" target="_blank"><span data-title="Future Students">Future Students</span></a>
                                    </li>
                                    <li>
                                        <a class="roll-link ie2" href="http://currentstudents.yorku.ca" target="_blank"><span data-title="Current Students">Current Students</span></a>
                                    </li>
                                    <li>
                                        <a class="roll-link ie3" href="http://alumniandfriends.yorku.ca" target="_blank"><span data-title="Alumni &amp; Friends">Alumni &amp; Friends</span></a>
                                    </li>

                                </ul>
                            </div>
                            <div class="clear"></div>
                        </div>
                    </div>
                </div>

            </div>


            <div id="navbar" class="navbar">
                <nav id="site-navigation" class="navigation main-navigation horizontal-menu toggled-on" role="navigation">
                    <span class="menu-toggle" tabindex="0">Menu <i class="fa fa-caret-down"></i></span>
                    <div class="menu-main-menu-container">
                        <ul id="yu-smartmenu" class="sm sm-blue nav-menu row">
                            <li id="menu-item-195" class="menu-item menu-item-type-custom menu-item-object-custom menu-item-195">
                                <a href="http://futurestudents.yorku.ca/programsearch" target="_blank">Programs of Study</a>
                            </li>
                            <li id="menu-item-667" class="menu-item menu-item-type-custom menu-item-object-custom menu-item-has-children menu-item-667">
                                <a href="http://about.yorku.ca/" class="has-submenu" target="_blank"><span class="sub-arrow">+</span>About York U</a>
                                <ul class="sub-menu">
                                    <li id="menu-item-218" class="menu-item menu-item-type-custom menu-item-object-custom menu-item-218">
                                        <a href="http://president.yorku.ca/" target="_blank">President’s Message</a>
                                    </li>
                                    <li id="menu-item-666" class="menu-item menu-item-type-custom menu-item-object-custom menu-item-666">
                                        <a href="http://about.yorku.ca/our-faculties/" target="_blank">Our Faculties</a>
                                    </li>
                                    <li id="menu-item-668" class="menu-item menu-item-type-custom menu-item-object-custom menu-item-668">
                                        <a href="http://about.yorku.ca/international-communities/" target="_blank">International Communities</a>
                                    </li>
                                    <li id="menu-item-669" class="menu-item menu-item-type-custom menu-item-object-custom menu-item-669">
                                        <a href="http://about.yorku.ca/points-of-pride/" target="_blank">Points of Pride</a>
                                    </li>
                                    <li id="menu-item-670" class="menu-item menu-item-type-custom menu-item-object-custom menu-item-670">
                                        <a href="http://about.yorku.ca/building-the-future/" target="_blank">Building the Future</a>
                                    </li>
                                    <li id="menu-item-671" class="menu-item menu-item-type-custom menu-item-object-custom menu-item-671">
                                        <a href="http://about.yorku.ca/organization/" target="_blank">Organization</a>
                                    </li>
                                    <li id="menu-item-672" class="menu-item menu-item-type-custom menu-item-object-custom menu-item-672">
                                        <a href="http://about.yorku.ca/careers/" target="_blank">Careers</a>
                                    </li>
                                </ul>
                            </li>
                            <li id="menu-item-673" class="menu-item menu-item-type-custom menu-item-object-custom menu-item-673">
                                <a href="http://campuslife.yorku.ca/" target="_blank">Campus Life</a>
                            </li>
                            <li id="menu-item-184" class="menu-item menu-item-type-custom menu-item-object-custom menu-item-has-children menu-item-184">
                                <a href="http://futurestudents.yorku.ca/" target="_blank" class="has-submenu"><span class="sub-arrow">+</span>Admissions</a>
                                <ul class="sub-menu">
                                    <li id="menu-item-628" class="menu-item menu-item-type-custom menu-item-object-custom menu-item-628">
                                        <a href="http://futurestudents.yorku.ca/" target="_blank">Undergraduate</a>
                                    </li>
                                    <li id="menu-item-629" class="menu-item menu-item-type-custom menu-item-object-custom menu-item-629">
                                        <a href="http://futurestudents.yorku.ca/graduate/" target="_blank">Graduate</a>
                                    </li>
                                    <li id="menu-item-630" class="menu-item menu-item-type-custom menu-item-object-custom menu-item-630">
                                        <a href="http://futurestudents.yorku.ca/continuing" target="_blank">Continuing Education</a>
                                    </li>
                                </ul>
                            </li>
                            <li id="menu-item-1118" class="menu-item menu-item-type-custom menu-item-object-custom menu-item-has-children menu-item-1118">
                                <a href="http://teachingandlearning.yorku.ca/" target="_blank" class="has-submenu"><span class="sub-arrow">+</span>Teaching &amp; Learning</a>
                                <ul class="sub-menu">
                                    <li id="menu-item-2078" class="menu-item menu-item-type-custom menu-item-object-custom menu-item-2078">
                                        <a href="http://yuexperience.info.yorku.ca/" target="_blank">YU Experience Hub</a>
                                    </li>
                                </ul>
                            </li>
                            <li id="menu-item-185" class="menu-item menu-item-type-custom menu-item-object-custom menu-item-185">
                                <a href="http://yorku.ca/research/" target="_blank">Research</a>
                            </li>
                        </ul>
                    </div>
                </nav>
            </div>
        </header>
