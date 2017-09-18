;(function( undefined ) {
    'use strict';

    require.config({
        baseUrl: '/js/',
        paths: {
            jquery: [
                'https://code.jquery.com/jquery-2.1.1.min',
                 'vendor/jquery'
            ],
            /*
            swal: [
                'https://cdnjs.cloudflare.com/ajax/libs/limonte-sweetalert2/6.6.10/sweetalert2.min',
                 'vendor/sweetalert'
            ],
            */
            materialize: [
                'https://cdnjs.cloudflare.com/ajax/libs/materialize/0.100.2/js/materialize.min',
            ],
            googlemapkey: [
                'http://maps.googleapis.com/maps/api/js?key=AIzaSyBOXe8VnXBmjiT0rIjRYIetQyLnG-WUCa4&amp;sensor=false',
            ],

            init: 'vendor/materialize/init',
            restful:'vendor/restful',
            blockui:'vendor/blockui',
            velocity:'vendor/velocity',
            jqueryscroll:'vendor/jscroll/jquery.jscroll',
            jqueryuicustom:'vendor/maps/jquery-ui.custom.min',



        },
        shim: {
            jquery:         { exports: '$' },
            hovelocityme:   { deps: ['jquery'] },
            materialize:    { deps: ['jquery','velocity'] },
            blockui:        { deps: ['jquery'] },
            //swal:     { deps: ['jquery'] },
            jqueryscroll:   { deps: ['jquery'] },
            jqueryuicustom: { deps: ['jquery'] },
            init: { deps: ['jquery'] },
        },
        waitSeconds: 15
    });
        // Chamando módulos principais para iniciar a aplicação
        require(['jquery'], function ($) {
            require(['materialize','restful']);
        });

        require(['block']);

        requirejs.onError = function (err) {
            console.log(err.requireType);
            console.log('modules: ' + err.requireModules);
            throw err;
        };

})();