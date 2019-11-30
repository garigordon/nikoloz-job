<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="apple-touch-icon" sizes="180x180" href="<?php bloginfo('template_url') ?>/images/favicon/apple-touch-icon.png">
    <link rel="icon" type="image/png" href="<?php bloginfo('template_url') ?>/images/favicon/favicon-32x32.png" sizes="32x32">
    <link rel="icon" type="image/png" href="<?php bloginfo('template_url') ?>/images/favicon/favicon-16x16.png" sizes="16x16">
    <link rel="manifest" href="<?php bloginfo('template_url') ?>/images/favicon/manifest.json">
    <link rel="mask-icon" href="<?php bloginfo('template_url') ?>/images/favicon/safari-pinned-tab.svg" color="#62cbca">
    <link rel="shortcut icon" href="<?php bloginfo('template_url') ?>/images/favicon/favicon.ico">
    <link rel="image_src" href="<?php bloginfo('template_url') ?>/images/site-image.png"/>
    <link rel="alternate" hreflang="ru" href="https://nikoloz-job.ua/"/>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/gh/fancyapps/fancybox@3.5.7/dist/jquery.fancybox.min.css" />
    <meta name="msapplication-TileColor" content="#08031e">
    <meta name="theme-color" content="#ffffff">
    <?php wp_head(); ?>
</head>
<body <?php body_class() ?>>
<div class="wrapper">
    <header class="header js-header-sticky">
        <div class="navbar">
            <div class="container">
                <ul class="language">
                    <?php
                    if ( qtrans_getLanguage() == 'ua' ) { ?>
                        <li>
                            <span><?php echo __('[:ru]Язык:[:ua]мова:'); ?></span>
                            <a href="/ru/" hreflang="ru">Українська</a>
                        </li>
                    <?php }
                    elseif ( qtrans_getLanguage() == 'ru' ) { ?>
                        <li>
                            <span><?php echo __('[:ru]Язык:[:ua]мова:'); ?></span>
                            <a href="/ua/" hreflang="ua">Русский</a>
                        </li>
                    <?php }
                    else {
                        echo 'другой язык';
                    }?>
                </ul>
                <div class="row-line">
                    <div class="column-logo">
                        <a href="<?php bloginfo('home') ?>"><img src="<?php bloginfo('template_url') ?>/images/logo.png" alt="NIKOLOZ-JOB" title="NIKOLOZ-JOB" /></a>
                    </div>
                    <span class="btn-menu">
                        <div class="btn-menu__parent">
                            <span class="btn-menu__decor"></span>
                            <span class="btn-menu__decor"></span>
                            <span class="btn-menu__decor"></span>
                        </div>
                    </span>
                    <div class="column-menu header__holder-nav">
                        <?php
                        wp_nav_menu([
                            'theme_location' => 'header-menu',
                            'menu' => '',
                            'container' => 'ul',
                            'container_class' => '',
                            'container_id' => '',
                            'menu_class' => 'navbar-nav menu js-nav-menu-animations nav-menu-with-sub-menu',
                            'menu_id' => '',
                            'echo' => true,
                            'fallback_cb' => 'wp_page_menu',
                            'before' => '',
                            'after' => '',
                            'link_before' => '',
                            'link_after' => '',
                            'items_wrap' => '<ul id="%1$s" class="%2$s">%3$s</ul>',
                            'depth' => 0,
                            'walker' => '',
                        ]);
                        ?>
                    </div>
                </div>
            </div>
        </div>
    </header>
