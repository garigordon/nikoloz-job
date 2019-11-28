<?php if( have_rows('comment-frontpage') ): ?>
    <section class="section section-testimonials">
        <div class="container">
            <div class="section-heading">
                <h2 class="heading-text">Отзывы</h2>
                <hr class="lines">
            </div>
            <div class="row-line">                
                <div class="testimonials-messages slideInRight">
                    <a href="#" class="testimonials-btn">Еще отзывы</a>
                </div>
            </div>
            <div class="carousel">
            <?php
                $count = 0;
                while( have_rows('comment-frontpage') ): the_row();
                    $commentImage = get_sub_field('comment-frontpage-image');
                    $commentVideo = get_sub_field('comment-frontpage-video');
                    $count++;
                ?>
                <div class="carousel-item">                    
                    <a data-fancybox href="<?= $commentVideo ?>&amp;autoplay=1&amp;rel=0&amp;controls=0&amp;showinfo=0" class="video-slider-btn-play"></a>
                    <img  src="<?php echo $commentImage['url']; ?>" alt="<?php echo $commentImage['alt'] ?>">
                </div>                
            <?php endwhile; ?>
            </div>
        </div>
    </section>
<?php endif; ?>