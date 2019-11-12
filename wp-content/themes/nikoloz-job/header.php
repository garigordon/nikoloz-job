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
    <meta name="msapplication-TileColor" content="#08031e">
    <meta name="theme-color" content="#ffffff">
    <script src="//code.jquery.com/jquery-3.4.1.min.js"></script>
    <?php wp_head(); ?>
</head>
<body <?php body_class() ?>>
<div class="wrapper">
    <header class="header js-header-sticky">
        <div class="navbar">
            <div class="container">
                <ul class="language">
                    <li><span>Мова:</span></li>
                    <li><a>Українська</a></li>
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
                    <div class="column-menu">
                        <?php
                        wp_nav_menu([
                            'theme_location' => 'header-menu',
                            'menu' => '',
                            'container' => 'ul',
                            'container_class' => '',
                            'container_id' => '',
                            'menu_class' => 'navbar-nav js-nav-menu-animations nav-menu-with-sub-menu',
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
                        <ul class="navbar-nav">
                            <li><a href="#" title="Главная">Главная</a></li>
                            <li><a href="#" title="О нас">О нас</a></li>
                            <li><a href="#" title="Актуальные вакансии">Актуальные вакансии</a></li>
                            <li>
                                <a href="#" title="Работа">Работа</a>
                                <span class="icon-angle-down"></span>
                                <div class="navbar-subnav">
                                    <ul>
                                        <li><a href="#" title="Работа в Финляндии">Работа в Финляндии</a></li>
                                        <li><a href="#" title="Работа в Чехии">Работа в Чехии</a></li>
                                        <li><a href="#" title="Работа в Ирландии">Работа в Ирландии</a></li>
                                        <li><a href="#" title="Работа в Германии">Работа в Германии</a></li>
                                        <li><a href="#" title="Работа в Норвегии">Работа в Норвегии</a></li>
                                        <li><a href="#" title="Работа за границей для женщин">Работа за границей для женщин</a></li>
                                        <li><a href="#" title="Работа за границей для мужчин">Работа за границей для мужчин</a></li>
                                        <li><a href="#" title="Работа за границей для семейных пар">Работа за границей для семейных пар</a></li>
                                        <li><a href="#" title="Работа за границей для девушек">Работа за границей для девушек</a></li>
                                    </ul>
                                </div>
                            </li>
                            <li><a href="#" title="Отзывы">Отзывы</a></li>
                            <li>
                                <a href="#" title="Информация">Информация</a>
                                <span class="icon-angle-down"></span>
                                <div class="navbar-subnav">
                                    <ul>
                                        <li><a href="#" title="Сертификат для сезонных работ в Финляндии">Сертификат для сезонных работ в Финляндии</a></li>
                                        <li><a href="#" title="Новости">Новости</a></li>
                                        <li><a href="#" title="Статьи">Статьи</a></li>
                                        <li><a href="#" title="Фотогалерея">Фотогалерея</a></li>
                                        <li><a href="#" title="Видео галерея">Видео галерея</a></li>
                                    </ul>
                                </div>
                            </li>
                            <li><a href="#" title="Partnership">Partnership</a></li>
                            <li><a href="#" title="Контакты">Контакты</a></li>
                        </ul>
                    </div>
                    <div class="nav-mobile-toggle" id="nav-mobile-toggle">
                        <div class="nav-mobile-toggle-trigger" id="nav-mobile-toggle-trigger">
                            <span></span>
                            <span></span>
                            <span></span>
                        </div>
                    </div>
                    <div class="nav-mobile">
                        <ul>
                            <li><a href="#" title="Главная">Главная</a></li>
                            <li><a href="#" title="О нас">О нас</a></li>
                            <li><a href="#" title="Актуальные вакансии">Актуальные вакансии</a></li>
                            <li>
                                <a href="#" title="Работа">Работа</a>
                                <div class="navbar-subnav">
                                    <ul>
                                        <li><a href="#" title="Работа в Финляндии">Работа в Финляндии</a></li>
                                        <li><a href="#" title="Работа в Чехии">Работа в Чехии</a></li>
                                        <li><a href="#" title="Работа в Ирландии">Работа в Ирландии</a></li>
                                        <li><a href="#" title="Работа в Германии">Работа в Германии</a></li>
                                        <li><a href="#" title="Работа в Норвегии">Работа в Норвегии</a></li>
                                        <li><a href="#" title="Работа за границей для женщин">Работа за границей для женщин</a></li>
                                        <li><a href="#" title="Работа за границей для мужчин">Работа за границей для мужчин</a></li>
                                        <li><a href="#" title="Работа за границей для семейных пар">Работа за границей для семейных пар</a></li>
                                        <li><a href="#" title="Работа за границей для девушек">Работа за границей для девушек</a></li>
                                    </ul>
                                </div>
                            </li>
                            <li><a href="#" title="Отзывы">Отзывы</a></li>
                            <li><a href="#" title="Информация">Информация</a>
                            </li>
                            <li>
                                <a href="#" title="Partnership">Partnership</a>
                                <div class="navbar-subnav">
                                    <ul>
                                        <li><a href="#" title="Сертификат для сезонных работ в Финляндии">Сертификат для сезонных работ в Финляндии</a></li>
                                        <li><a href="#" title="Новости">Новости</a></li>
                                        <li><a href="#" title="Статьи">Статьи</a></li>
                                        <li><a href="#" title="Фотогалерея">Фотогалерея</a></li>
                                        <li><a href="#" title="Видео галерея">Видео галерея</a></li>
                                    </ul>
                                </div>
                            </li>
                            <li><a href="#" title="Контакты">Контакты</a></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </header>