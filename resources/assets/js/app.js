
/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */

// require('./bootstrap');

// window.Vue = require('vue');

/**
 * Next, we will create a fresh Vue application instance and attach it to
 * the page. Then, you may begin adding components to this application
 * or customize the JavaScript scaffolding to fit your unique needs.
 */

// Vue.component('example-component', require('./components/ExampleComponent.vue'));

// const app = new Vue({
//     el: '#app'
// });



window.$ = window.jQuery = require('jquery');
require('./vendor/lightslider');

$(document).ready(function () {

    /**
     * Using lightslider (jQuery plugin) for image-slider slice
     */

    $('.js-image-slider').lightSlider({
        gallery: false,
        auto: true,
        item: 1,
        loop: true,
        slideMargin: 0,
        controls: false,
        enableDrag: false,
        currentPagerPosition: 'left',
        pauseOnHover: true,
        pause: 6000,
    });

    /**
     * Handling language change
     */

    let $languageSelect = $('#language-select');

    $languageSelect.on('change', function () {
        window.location.href = $languageSelect.find('option:selected').attr('href');
    });

});
