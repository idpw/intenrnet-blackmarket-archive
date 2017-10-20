<?php

// setting timber
// -----------------------------------------------
?>
<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
  <meta http-equiv='X-UA-Compatible' content='IE=edge'>
  <meta charset="<?php bloginfo( 'charset' ); ?>"/>


  <meta name='viewport'
        content='width=device-width, initial-scale=1.0, user-scalable=0, minimum-scale=1.0, maximum-scale=1.0'>
  <meta name='apple-mobile-web-app-capable' content='yes'/>
  <meta name='apple-mobile-web-app-status-bar-style' content='black-translucent'>

  <link rel='shortcut icon' type='image/png'
        href='<?php echo( get_bloginfo( 'template_directory' ) . "/assets/img/favicon.png" ); ?>'>

  <title><?php
	  wp_title( '|', true, 'right' );
	  bloginfo( 'name' );
	  ?></title>
  <link rel="stylesheet" type="text/css" media="all" href="<?php bloginfo( 'stylesheet_url' ); ?>"/>

	<?php
	wp_head();
	?>
</head>

<body <?php body_class(); ?>>

<div class="l-wrapper">

  <header class="header">
    <a href="/">
      <h1><?php echo( get_bloginfo( 'title' ) ); ?></h1>
    </a>
  </header>

</div>


