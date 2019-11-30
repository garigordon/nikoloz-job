<?php
    get_header();
?>
<div class="masthead">
    <div class="page-title container">
        <h1><?php the_title(); ?></h1>
    </div>
    <div class="container">
        <ul class="breadcrumbs">
            <?php the_breadcrumb() ?>
        </ul>
    </div>
</div>
<div class="site-content container row-line">
    <main class="main">
        <?php while(have_posts()) : the_post(); ?>
            <article class="post-item">
                <div class="post-media">
                    <?php the_post_thumbnail(); ?>
                </div>
                <div class="post-inner">
                    <ul class="post-meta">
                        <li><i class="far icon icon-clock"></i>
                            <time>июл  3, 2019</time>
                        </li>
                        <li><i class="fas icon icon-eye"></i><?php echo getPostViews(get_the_ID()); ?></li>
                        <li><i class="far icon icon-comment-alt"></i>0</li>
                    </ul>
                    <div class="post-content">
                        <?php the_content(); ?>
                        <div class="pull-right">
                            <div class="social-share">
                                <a href="#" class="social-share-item"></a>
                                <a href="#" class="social-share-item"></a>
                                <a href="#" class="social-share-item"></a>
                                <a href="#" class="social-share-item"></a>
                                <a href="#" class="social-share-item"></a>
                            </div>
                        </div>
                </div>
            </article>
        <?php endwhile; ?>
        <div class="comment-warning">
            <p>Вы должны <a href="#">авторизоваться</a>, чтобы оставлять комментарии.</p>
        </div>
        <div class="comments">
            <h3 class="comment-total">Комментарии (<span id="comment-total">0</span>)</h3>
            <div id="comments-wrapper">
                <ul id="comments" class="comment-list"></ul>
            </div>
        </div>
    </main>
    <aside class="sidebar-wrapper">
        <?php get_sidebar(); ?>
    </aside>
</div>
<?php get_footer(); ?>
