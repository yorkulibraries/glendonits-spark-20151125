<?php
/**
 * Template Name:DO NOT USE
 * @package WordPress
 * @subpackage Glendon bootstrap
 */
get_header();
include('includes/nav-bar-default.php');
//$currentlanguage = icl_get_current_language();
$currentlanguage = "en";
$q = $_GET['q'];
?>

<style>
    .cse .gsc-search-button input.gsc-search-button-v2, input.gsc-search-button-v2 {
        height: auto;
        width: 70px;
        background-image: url('http://www.google.com/uds/css/v2/search_box_icon.png') no-repeat;
        background-position: center;

    }
    <!-- ADD TO HEADER - START -->
    <style type="text/css">

    .entry-title {display:none;}

    html>body .gsc-inline-block {min-width:110px;}

    html>body .gsc-selected-option:after {
        font-family:FontAwesome;
        margin-left:5px;
        content:'\f150';}




    .gsc-selected-option-container {padding: 0 0 0 6px !important;
                                    font-size: .9em;
                                    font-weight: normal;}

    .cse .gsc-control-cse, .gsc-control-cse {
        padding: 0 !important;
        width: auto;
    }

    .gsc-results .gsc-cursor-box .gsc-cursor-current-page {background:#ffffff !important;}

    .gsc-table-cell-thumbnail, .gs-promotion-image-cell {
        padding: 0 8px 0 0px !important;
    }

    .widget_rss li {line-height:18px !important;padding-bottom:10px;}

    .cse .gs-promotion .gs-visibleUrl, .gs-promotion .gs-visibleUrl {
        color: #e31837 !important;
    }


    .cse .gs-promotion a.gs-title:visited, .gs-promotion a.gs-title:visited, .cse .gs-promotion a.gs-title:visited *, .gs-promotion a.gs-title:visited *, .cse .gs-promotion .gs-snippet a:visited, .gs-promotion .gs-snippet a:visited {
        color: #e31837 !important;
    }


    @media (max-width: 800px){

        .cse input.gsc-search-button, input.gsc-search-button {
            font-family: inherit;
            font-size: 11px;
            color: #fff;
            font-weight: bold;
            padding: 0 8px;
            height: 27px;
            min-width: 100px !important;
            background-color: #333333;
            border: 1px solid #000;
            border-radius: 2px;
            -moz-border-radius: 2px;
            -webkit-border-radius: 2px;
        }

        .gcsc-branding {
            display:none;
        }

    }


</style>




<?php if ($currentlanguage == 'en') { ?>
    <script>
        (function () {
            var cx = '000688913314946842333:qdr1fi_2rf4';
            var gcse = document.createElement('script');
            gcse.type = 'text/javascript';
            gcse.async = true;
            gcse.src = (document.location.protocol == 'https:' ? 'https:' : 'http:') +
                    '//www.google.com/cse/cse.js?cx=' + cx;
            var s = document.getElementsByTagName('script')[0];
            s.parentNode.insertBefore(gcse, s);
        })();

        jQuery(document).ready(function ($) {
            var wwwroot = $('#frenchurl').val();
            var q = "<?php echo $q; ?>";
            $('#language').attr("href", wwwroot + '?q=' + q);

        });
    </script>
    <?php
} else {
    ?>
    <script>
        (function () {
            var cx = '000688913314946842333:4hjzp_ukmpg';
            var gcse = document.createElement('script');
            gcse.type = 'text/javascript';
            gcse.async = true;
            gcse.src = (document.location.protocol == 'https:' ? 'https:' : 'http:') +
                    '//www.google.com/cse/cse.js?cx=' + cx;
            var s = document.getElementsByTagName('script')[0];
            s.parentNode.insertBefore(gcse, s);
        })();

        jQuery(document).ready(function ($) {
            var wwwroot = $('#englishurl').val();
            var q = "<?php echo $q; ?>";
            $('#language').attr("href", wwwroot + '?q=' + q);

        });
    </script>

<?php } ?>




<div id="google" class="container">
    <?php if ($currentlanguage == 'en') { ?>
        <h1>Results</h1>
    <?php } else { ?>
        <h1>Résultats</h1>
    <?php
    }
    ?>
    <gcse:search></gcse:search>
</div>
<?php
get_footer();
?>
