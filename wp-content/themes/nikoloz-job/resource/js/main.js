import tabs from './modules/tabs';
import videoBackground from './modules/videoBackground';
import WOW from 'wow.js';
import headerNav from './modules/nav';
import slickHeader from "./modules/slickHeader";
// import photoGallery from './modules/photoGallery';
import advanceGallery from './modules/advanceGallery';
import commentsSlider from './modules/commentsSlider';

$(document).ready(function () {
    new WOW().init()
    tabs.init();
    videoBackground.init();
    slickHeader.init();
    // photoGallery.init();
    advanceGallery.init();
    headerNav.init();
    commentsSlider.init();
});
