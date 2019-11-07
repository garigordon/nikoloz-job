import tabs from './modules/tabs'

import WOW from 'wow.js'


$(document).ready(function () {

    new WOW().init()
    tabs.init();

});