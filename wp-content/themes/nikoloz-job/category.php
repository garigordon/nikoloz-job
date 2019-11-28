<?php
/**
 * Template Name: News
 */

get_header();
global $cat;
$categories = get_cat_name($cat);
?>

<div class="masthead">
    <div class="page-title container">
        <h1><?php echo esc_html( $categories ); ?></h1>
    </div>
    <div class="container">
        <ul class="breadcrumbs">
            <?php the_breadcrumb() ?>
        </ul>
    </div>
</div>
<div class="site-content container row-line">
    <main class="main">
        <div class="row-line">
            <?php while(have_posts()) : the_post(); ?>
            <article class="post-item">
                <div class="post-media">
                    <a href="<?php echo get_permalink(); ?>">
                        <?php the_post_thumbnail(); ?>
                    </a>
                </div>
                <div class="post-inner">
                    <ul class="post-meta">
                        <li><i class="far icon icon-clock"></i>
                            <time>июл  3, 2019</time>
                        </li>
                        <li><i class="fas icon icon-eye"></i><?php echo getPostViews(get_the_ID()); ?></li>
                        <li><i class="far icon icon-comment-alt"></i>0</li>
                    </ul>
                    <h3 class="post-title">
                        <a href="<?php echo get_permalink(); ?>"><?php the_title(); ?></a>
                    </h3>
                    <div class="post-excerpt">
                        <?php
                            echo '<p>';
                            echo mb_substr( strip_tags( get_the_content() ), 0, 700 );
                            echo '...</p>';
                        ?>
                        <a href="<?php echo get_permalink(); ?>" class="post-more">Читать дальше</a>
                    </div>
                </div>
            </article>
            <?php endwhile; ?>
            <div class="wp-pagenavi">
                <?php wp_pagenavi(); ?>
            </div>
        </div>
    </main>
    <aside class="sidebar-wrapper">
        <?php get_sidebar(); ?>
    </aside>
</div>
<?php get_footer(); ?>
