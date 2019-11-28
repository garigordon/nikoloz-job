<section class="section section-advance section-base">
    <div class="container">
        <div class="row-line advance">
            <div class="advance-photo-gallery-wrap advance-item">
<<<<<<< HEAD
                <div id="advance-gallery" class="advance-gallery">
                    <?php
                    while( have_rows('home-images') ): the_row();
                        $images = get_sub_field('home-images-image');
                        ?>
                        <a href="#" class="fg-slide fg-item animate"><img src="<?php echo $images['url']; ?>" alt="<?php echo $images['alt'] ?>"></a>
                    <?php endwhile; ?>
=======
                <div class="advance-gallery">
                    <a href="#" class="advancy-gallery-item"><img src="<?php bloginfo('template_url') ?>/images/17.jpg"></a>
<!--                    <a href="#"><img src="--><?php //bloginfo('template_url') ?><!--/images/3.jpg"></a>-->
<!--                    <a href="#"><img src="--><?php //bloginfo('template_url') ?><!--/images/photo5330308848654854607.jpg"></a>-->
<!--                    <a href="#"><img src="--><?php //bloginfo('template_url') ?><!--/images/photo5330308848654854609.jpg"></a>-->
<!--                    <a href="#"><img src="--><?php //bloginfo('template_url') ?><!--/images/photo5330308848654854606.jpg"></a>-->
<!--                    <a href="#"><img src="--><?php //bloginfo('template_url') ?><!--/images/kenn.jpg"></a>-->
<!--                    <a href="#"><img src="--><?php //bloginfo('template_url') ?><!--/images/viber-image-1.jpg"></a>-->
<!--                    <a href="#"><img src="--><?php //bloginfo('template_url') ?><!--/images/nggo.jpg"></a>-->
<!--                    <a href="#"><img src="--><?php //bloginfo('template_url') ?><!--/images/ngshn.jpg"></a>-->
<!--                    <a href="#"><img src="--><?php //bloginfo('template_url') ?><!--/images/keken.jpg"></a>-->
<!--                    <a href="#"><img src="--><?php //bloginfo('template_url') ?><!--/images/ltor.jpg"></a>-->
<!--                    <a href="#"><img src="--><?php //bloginfo('template_url') ?><!--/images/photo5330308848654854604.jpg"></a>-->
>>>>>>> d2bf3f9d0f7be60f8b6cf8ddd01c61aed9319d8d
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
