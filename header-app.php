<?php
/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
header("Access-Control-Allow-Origin: *"); 
header('Access-Control-Allow-Methods: GET, POST');  

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
        <meta charset="<?php bloginfo('charset'); ?>" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        
<?php

wp_head();
?>
    </head>
    <body>
       