<?php
/**
 * Template Name: Contacts
 */

get_header();
?>

<div class="masthead">
    <div class="page-title container">
        <h1>КОНТАКТЫ</h1>
    </div>
    <div class="container">
        <ul class="breadcrumbs">
            <li><a href="#">Главная</a></li>
            <li><span>Контакты</span></li>
        </ul>
    </div>
</div>
<div class="site-content container">
    <div class="page-block">
        <div class="row-line contacts">
            <div class="contact-block">
                <div class="map">
                    <img src="<?php bloginfo('template_url'); ?>/images/map1.jpg" alt="map1">
                </div>
                <h4>Главный офис Nikoloz-job</h4>
                <p>Наш главный офис находится в Харькове, здесь у нас есть высшее руководство, владелец фирмы.</p>
                <ul class="contact-list">
                    <li>
                        <i class="fas icon icon-map-marker-alt"></i>
                        г. Харьков, пер. Молчановский 29, оф. 27 А
                    </li>
                    <li>
                        <i class="fa icon icon-phone"></i>
                        +38-095-532-25-64; +38-063-228-18-78; +38-098-90-100-97
                    </li>
                    <li>
                        <i class="far icon icon-envelope"></i>
                        <a href="mailto:nikolozjob@ukr.net">nikolozjob@ukr.net</a>
                    </li>
                    <li>
                        <i class="far icon icon-clock"></i>
                        Понедельник-Пятница: с 08:00 до 17:00 (по записи)
                    </li>
                    <li>
                        <i class="fa icon icon-times-circle"></i>
                        Суббота-Воскресенье: По предварительной записи
                    </li>
                </ul>
            </div>
            <div class="contact-block">
                <div class="map">
                    <img src="<?php bloginfo('template_url'); ?>/images/map2.jpg" alt="map2">
                </div>
                <h4>ФИЛИАЛ NIKOLOZ-JOB</h4>
                <p>Наш филиал находится в Киеве, здесь у нас менеджер который заключит договор и проконсультирует вас.</p>
                <ul class="contact-list">
                    <li>
                        <i class="fas icon icon-map-marker-alt"></i>
                        г. Киев, ул. Оранжерейная 3Е, оф.314
                    </li>
                    <li>
                        <i class="fa icon icon-phone"></i>
                        +38 067-623-58-33; +38 095-276-80-07
                    </li>
                    <li>
                        <i class="far icon icon-envelope"></i>
                        <a href="mailto:nikolozjob@ukr.net">nikolozjob@ukr.net</a>
                    </li>
                    <li>
                        <i class="far icon icon-clock"></i>
                        Понедельник-Пятница: с 10:00 до 19:00 (по записи)
                    </li>
                    <li>
                        <i class="fa icon icon-times-circle"></i>
                        Суббота-Воскресенье: По предварительной записи
                    </li>
                </ul>
            </div>
        </div>
        <form class="form-contact">
            <h5>Написать письмо</h5>
            <div class="row-line">
                <div class="form-group form-input">
                    <input class="form-control" placeholder="Имя" name="name" required>
                </div>
                <div class="form-group form-input">
                    <input class="form-control" type="email" placeholder="Email" name="email" required>
                </div>
                <div class="form-group form-textarea">
                    <textarea class="form-control" rows="3" placeholder="Сообщение" name="message" required></textarea>
                </div>
                <button type="submit" class="btn-send">Отправить</button>
            </div>
        </form>
    </div>
</div>

<?php get_footer(); ?>