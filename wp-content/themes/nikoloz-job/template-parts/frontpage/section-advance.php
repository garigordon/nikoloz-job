<section class="section section-advance section-base">
    <div class="container">
        <div class="row-line">
            <div class="advance-photo-gallery-wrap advance-item">
                <div id="advance-gallery" class="advance-gallery">
                    <?php
                    while( have_rows('home-images') ): the_row();
                        $images = get_sub_field('home-images-image');
                        ?>
                        <a href="#" class="fg-slide fg-item animate"><img src="<?php echo $images['url']; ?>" alt="<?php echo $images['alt'] ?>"></a>
                    <?php endwhile; ?>
                </div>
            </div>
            <div class="advance-text advance-item">
                <h1><?php echo get_field( "home-title"); ?></h1>
                <?php echo get_field( "home-content"); ?>
            </div>
        </div>
        <div class="row-line">
            <div class="advance-text">
                <?php echo get_field( "home-text"); ?>
            </div>
        </div>
    </div>
</section>
