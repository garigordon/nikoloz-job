<?php
/**
 * Template Name: Single
 */

get_header(); ?>
<div class="masthead">
    <div class="page-title container">
        <h1>Новости</h1>
    </div>
    <div class="container">
        <ul class="breadcrumbs">
            <li><a href="#">Главная</a></li>
            <li><a href="#">Информация</a></li>
            <li><a href="#">Новости</a></li>
            <li><span>5 идиотских законов Украины, которые показывают, о чем реально думает власть (спойлер: об унитазах)</span></li>
        </ul>
    </div>
</div>
<div class="news-wrapper container row-line">
    <main class="main">
        <article class="post-item">
            <div class="post-media">
                <a href="#">
                    <img src="<?php bloginfo('template_url'); ?>/images/рпав_730x456_c30.jpg" alt="">
                </a>
            </div>
            <div class="post-inner">
                <ul class="post-meta">
                    <li><i class="far icon icon-clock"></i>
                        <time>июл  3, 2019</time>
                    </li>
                    <li><i class="fas icon icon-eye"></i>337</li>
                    <li><i class="far icon icon-comment-alt"></i>0</li>
                </ul>
                <h3 class="post-title">
                    <a href="#">5 идиотских законов Украины, которые показывают, о чем реально думает власть (спойлер: об унитазах)</a>
                </h3>
                <div class="post-excerpt">
                    <p>Некоторые украинские законы и постановления ярко показывают, что люди, которые принимают важные для страны решения, не понимают, что и зачем делают.</p>
                    <p>10 марта 2017 года правительство отменило сотню актов, которые мешали ведению бизнеса, и это происходит уже не в первый раз. Без этих документов Украина стала более открытой к инвестициям, ускориться экономический рост. Но некоторые очень странные законы и постановления правительства все еще действуют. Они не особо мешают экономике развиваться (хотя и не помогают), но то, что они существуют, показывает, насколько странной иногда бывает логика украинских чиновников.</p>
                    <a href="#" class="post-more">Читать дальше</a>
                </div>
            </div>
        </article>
    </main>
    <aside class="sidebar-wrapper">
        <?php get_sidebar(); ?>
    </aside>
</div>
<?php get_footer(); ?>
