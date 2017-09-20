$(function($) {

    $.blockUI.defaults.message = "<div class='loader'><div class='bar'></div><div class='bar'></div><div class='bar'></div><div class='bar'></div><div class='bar'></div><div class='bar'></div><div class='bar'></div><div class='bar'></div><div class='bar'></div><div class='bar'></div><div class='bar'></div><div class='bar'></div></div><div class='circle_loading'></div>";
    $.blockUI.defaults.css =
    {
        padding:        0,
        margin:         0,
        top:            '40%',
        left:           '50%',
        textAlign:      'center',
        color:          '#fff',
        cursor:         'wait'
    };

   $('.button-collapse').sideNav();

    console.log( 'Carregou init.js' );
});
