;(function( undefined ) {
    'use strict';

    require.config({
        baseUrl: '/js/',
        //urlArgs: "bust=v2"+ (new Date()).getTime(),
        paths: {
            jquery: [
                 //'https://code.jquery.com/jquery-2.1.1.min',
                 'vendor/jquery/jquery.min'
            ],
            /*
            swal: [
                'https://cdnjs.cloudflare.com/ajax/libs/limonte-sweetalert2/6.6.10/sweetalert2.min',
                 'vendor/sweetalert'
            ],
            */
            materialize: [
                //'https://cdnjs.cloudflare.com/ajax/libs/materialize/0.100.2/js/materialize.min',
                'vendor/materialize/materialize.min',
            ],
            googlemapkey: [
                'http://maps.googleapis.com/maps/api/js?key=AIzaSyBOXe8VnXBmjiT0rIjRYIetQyLnG-WUCa4&amp;sensor=false',
            ],

            restful:'vendor/restful',
            blockui:'vendor/blockui',
            velocity:'vendor/velocity',
            jqueryscroll:'vendor/jscroll/jquery.jscroll',
            jqueryuicustom:'vendor/maps/jquery-ui.custom.min',
            hammer:'vendor/hammer',

        },
        shim: {
            jquery:         { exports: '$' },
            restful:        { deps: ['jquery']},
            materialize:    { deps: ['jquery','velocity','hammer'] },
            blockui:        { deps: ['jquery']},
            //swal:         { deps: ['jquery'] },
            jqueryscroll:   { deps: ['jquery']},
            jqueryuicustom: { deps: ['jquery']},
        },
        waitSeconds: 25,
    });
        // Chamando módulos principais para iniciar a aplicação
        require(['jquery'], function ($) {
            require(['materialize']);
            require(['restful']);
        });

        require(['block']);
        require(['./controllers/homeController']);
        require(['./controllers/userController']);
        //require(['./controllers/mapController']);
        require(['./controllers/registerController']);


        requirejs.onError = function (err) {
            console.log(err.requireType);
            console.log('modules: ' + err.requireModules);
            throw err;
        };

})();