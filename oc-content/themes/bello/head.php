<?php
 		   /*
 * Copyright 2016 osclass-pro.com
 *
 * You shall not distribute this theme and any its files (except third-party libraries) to third parties.
 * Rental, leasing, sale and any other form of distribution are not allowed and are strictly forbidden.
 */
?>
<meta http-equiv="Content-type" content="text/html; charset=utf-8" />

<title><?php echo meta_title(); ?></title>
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<meta name="title" content="<?php echo osc_esc_html(meta_title()); ?>" />
<?php if( meta_description() != '' ) { ?>
<meta name="description" content="<?php echo osc_esc_html(meta_description()); ?>" />
<?php } ?>
<?php if( function_exists('meta_keywords') ) { ?>
<?php if( meta_keywords() != '' ) { ?>
<meta name="keywords" content="<?php echo osc_esc_html(meta_keywords()); ?>" />
<?php } ?>
<?php } ?>
<?php if( osc_get_canonical() != '' ) { ?>
<link rel="canonical" href="<?php echo osc_get_canonical(); ?>"/>
<?php } ?>
<meta http-equiv="Cache-Control" content="no-cache" />
<meta http-equiv="Expires" content="Fri, Jan 01 1970 00:00:00 GMT" />
<link href='https://fonts.googleapis.com/css?family=Lato:400,900italic,900,700italic,700,400italic,300italic,100italic,100,300&subset=latin,latin-ext' rel='stylesheet' type='text/css'>
<link href='https://fonts.googleapis.com/css?family=Montserrat:400,700' rel='stylesheet' type='text/css'>
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.6.3/css/font-awesome.min.css">
<link rel="stylesheet" href="<?php echo osc_current_web_theme_url('css/select2.min.css') ; ?>">
<link rel="stylesheet" href="<?php echo osc_current_web_theme_url('css/style.css') ; ?>">
<link rel="stylesheet" href="<?php echo osc_current_web_theme_url('css/plugins.css') ; ?>">
<link rel="stylesheet" href="<?php echo osc_current_web_theme_url('css/jquery-ui/jquery-ui.min.css') ; ?>">

<?php
osc_register_script('global', osc_current_web_theme_js_url('script.js'), 'jquery');
osc_register_script('jquery', osc_current_web_theme_js_url('jquery-2.1.3.min.js'));
osc_register_script('jquery-ui', osc_current_web_theme_js_url('jquery-ui.min.js'), 'jquery');
osc_register_script('fineuploader', osc_current_web_theme_js_url('fineuploader/jquery.fineuploader.min.js'), 'jquery');
osc_register_script('jquery-validate', osc_current_web_theme_js_url('jquery.validate.min.js'), 'jquery');
osc_register_script('date', osc_current_web_theme_js_url('date.js'));
osc_register_script('main', osc_current_web_theme_js_url('main.js'), 'jquery');
osc_register_script('plugins', osc_current_web_theme_js_url('plugins.js'), 'jquery');
osc_register_script('select2', osc_current_web_theme_js_url('select2.min.js'), 'jquery');
osc_register_script('tabber', osc_current_web_theme_js_url('tabber-min.js'));
osc_register_script('lightbox', osc_current_web_theme_js_url('lightbox.js'), 'jquery');
?>

<!--[if lt IE 9]>
<script src="<?php echo osc_current_web_theme_url('js/html5shiv.min.js') ; ?>"></script>
<script src="<?php echo osc_current_web_theme_url('js/respond.min.js') ; ?>"></script>
<![endif]-->

<?php
osc_run_hook('header');
FieldForm::i18n_datePicker();
?>
