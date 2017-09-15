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
            jqueryscroll:'vendor/jscroll/jquery.jscroll',

        },
        shim: {
            jquery:         { exports: '$' },
            home:           { deps: ['jquery'] },
            hovelocityme:   { deps: ['jquery'] },
            materialize:    { deps: ['jquery','velocity'] },
            blockui:        { deps: ['jquery'] },
            sweetalert:     { deps: ['jquery'] },
            jqueryscroll:   { deps: ['jquery'] },
        },

        waitSeconds: 15
    });

        // Chamando módulo principal para iniciar a aplicação
        require(['jquery'], function ($) {
            require(['materialize','sweetalert','restful']);
        });

        require(['jquery','blockui'], function($) {
            require(['BlockConfig']);
        });

        requirejs.onError = function (err) {
            console.log(err.requireType);
            console.log('modules: ' + err.requireModules);
            throw err;
        };

})();