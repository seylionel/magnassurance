import 'jquery';
import 'popper.js';

/*
 * Welcome to your app's main JavaScript file!
 *
 * We recommend including the built version of this JavaScript file
 * (and its CSS file) in your base layout (base.html.twig).
 */

// any CSS you import will output into a single css file (app.css in this case)
import '../css/app.scss';

// Need jQuery? Install it with "yarn add jquery", then uncomment to import it.


console.log('Hello Webpack Encore! Edit me in assets/js/app.js');


$(document).ready(function () {
    $('.top').slick({
        infinite: true,
        slidesToShow: 1,
        slidesToScroll: 3
    });
});

$('.listonglet li').mouseenter(function (){
    $(this).children('.deroulant').css('display','block')
})
$('.listonglet li').mouseleave(function (){
    $(this).children('.deroulant').css('display','none')
})



