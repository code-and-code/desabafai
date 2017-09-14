;(function( undefined ) {
    'use strict';

    require.config({
        baseUrl: './js',
        paths: {
            jquery: [
                'https://code.jquery.com/jquery-2.1.1.min',
                 'vendor/jquery'
            ],
            sweetalert: [
                'https://cdnjs.cloudflare.com/ajax/libs/limonte-sweetalert2/6.6.10/sweetalert2.min',
                 'vendor/sweetalert'
            ],
            materialize: [
                'https://cdnjs.cloudflare.com/ajax/libs/materialize/0.100.2/js/materialize.min',
                 'vendor/sweetalert'
            ],




            home: 'vendor/home',
            restful:'vendor/restful',
            blockui:'vendor/blockui',
            velocity:'vendor/velocity',
            scroll:'vendor/jscroll/jquery.jscroll',

        },
        shim: {
            velocity:{
                deps: ['jquery']
            },

            materialize: {
                deps: ['velocity']
            },

            blockui: {
                deps: ['jquery']
            }
        }
    });


    /*
    require([ 'jquery','sweetalert'], function( $, _ ) {

        require([ 'App' ]);
    });
    */

    require(['jquery','materialize','restful'], function( $, _ ) {

    });


    require([ 'blockui',], function( $, _ ) {

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
    });

    /*

    requirejs([ 'jquery','scroll','home'], function( $, _ ) {

            $('ul.pagination').hide();

            $('.infinite-scroll').jscroll({

                autoTrigger: true,
                loadingHtml: '<div class="loader"><div class="bar"></div><div class="bar"></div><div class="bar"></div><div class="bar"></div><div class="bar"></div><div class="bar"></div><div class="bar"></div><div class="bar"></div><div class="bar"></div><div class="bar"></div><div class="bar"></div><div class="bar"></div></div><div class="circle_loading"></div>',
                padding: 20,
                //contentSelector: '.infinite-scroll',
                nextSelector: '.pagination li.active + li a',
                contentSelector: 'div.infinite-scroll',

                loadingFunction: function() {
                    //$(this).runScript();
                },

                callback: function() {

                    $('ul.pagination').remove();
                    //$(this).runScript();
                }

            });

    });
    */


})();