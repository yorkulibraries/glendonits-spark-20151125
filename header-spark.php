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
        <title><?php echo $title; ?> | YorkU</title>
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
		<link rel="stylesheet" href="<?php echo $wwwroot; ?>/spark_gui.css" type="text/css">
		<script type="text/javascript" src="<?php echo $wwwroot; ?>/spark_content.js"></script>
		<!-- END SPARK -->
        <script>

            var baseUrl = "<?php echo esc_url( $root_url ); ?>";
            jQuery(document).ready(function () {

                init_glendon();

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

	  <!-- Google Tag Manager -->
	  <script>(function(w,d,s,l,i){w[l]=w[l]||[];w[l].push({'gtm.start':
	  new Date().getTime(),event:'gtm.js'});var f=d.getElementsByTagName(s)[0],
	  j=d.createElement(s),dl=l!='dataLayer'?'&l='+l:'';j.async=true;j.src=
 	 'https://www.googletagmanager.com/gtm.js?id='+i+dl;f.parentNode.insertBefore(j,f);
 	 })(window,document,'script','dataLayer','GTM-WB2S8R');</script>
         <!-- End Google Tag Manager -->
         <!-- Hotjar Tracking Code for https://www.yorku.ca/ -->
 	 <script>
    		(function(h,o,t,j,a,r){
     	 		h.hj=h.hj||function(){(h.hj.q=h.hj.q||[]).push(arguments)};
      			h._hjSettings={hjid:1020482,hjsv:6};
      			a=o.getElementsByTagName('head')[0];
      			r=o.createElement('script');r.async=1;
      			r.src=t+h._hjSettings.hjid+j+h._hjSettings.hjsv;
      			a.appendChild(r);
    		})(window,document,'https://static.hotjar.com/c/hotjar-','.js?sv=');
  	</script>

