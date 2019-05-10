<!doctype html>
<html <?php language_attributes(); ?>>
<head>
    <meta charset="<?php bloginfo('charset'); ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <link rel="shortcut icon" href="<?php echo esc_url(get_stylesheet_directory_uri()); ?>/favicon.ico" type="image/x-icon" />
    <link rel="icon" href="<?php echo esc_url(get_stylesheet_directory_uri()); ?>/favicon.ico" type="image/x-icon">
    <!--[if lte IE 9 ]>
    <script>
        alert('Browser version is too old and site will not be displayed correctly. Please, upgrade your browser.');
    </script>
    <![endif]-->


    <?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>


<div id="page" class="site">
    <header>
        <div class="container">
            <div class="wrapper">
                <div class="logo">
                    <strong>Krip</strong>dom
                </div>
                <div class="mainmenu">
                    <?php
                    wp_nav_menu(array(
                            'menu' => 'Main nav',
                            'container' => '',
                            'menu_class' => 'nav navbar-nav'
                        )
                    );
                    ?>
                </div>
                <div class="menu-trigger">
                    <div></div>
                </div>
            </div>
        </div>

    </header>

    <div id="content" class="site-content">