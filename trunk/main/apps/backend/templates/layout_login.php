<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en" style="background:#FFF" >
    <head>
        <?php
        // include_metas()
        $final_seo_keywords = has_slot('page_keywords') ? get_slot('page_keywords') : SettingGeneralPeer::getGlobalSeoKeywords();
        $final_seo_description = has_slot('page_description') ? get_slot('page_description') : SettingGeneralPeer::getGlobalSeoDescription();
        ?>
        <meta content="<?php echo $final_seo_keywords; ?>" name="keywords" />
        <meta content="<?php echo $final_seo_description; ?>" name="description" />
        <!--<meta http-equiv="X-UA-Compatible" content="IE=EmulateIE10,chrome=1" />-->
        <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" /> 
        <!--<link rel="shortcut icon" href="/images/common/favicon.png?v=2">-->
        <?php include_http_metas() ?>
        <?php include_metas() ?>
        <?php include_title() ?>		
        <?php include_stylesheets() ?>
        <?php include_javascripts() ?>
    </head>
    <body>
        <?php echo $sf_content ?>
    </body>
</html>
