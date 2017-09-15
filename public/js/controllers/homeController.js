define([ 'jquery' ], function( $ ) {
    'use strict';

    var controllerHome = function() {
        var $public = {};
        var $private = {};

        $public.init = function init() {
            console.log( 'carregou homeController.js' );
            $private.initEvents();
        };

        $private.initEvents = function initEvents() {

            //$('.modal').modal();

            $('#like').click(function(){
                $(this).toggleClass("lighten-5");
                $("#thumb_up").toggleClass("blue-text");

            });

            $('.show_comments').click(function(){

                var comments = $(this).data('comments');
                $("#"+comments).toggle();
            });


            $(".add_comment").click(function(){

                var form = $(this).data('form');
                $("#"+form).toggle();
            })


            $(".reply_comment").click(function(){

                var form = $(this).data('form');
                $("#"+form).toggle();
            });

            $('.form_create_comment')

                .on('ajax:success', function(event, xhr, status, error) {

                    var id = $(this).data('post');

                    $('#form_comment_'+id).hide();
                    $('#comments_'+id).show();
                    $('#new_comment_'+id).append(xhr.data);

                    /*
                     swal(
                     'Valeu',
                     'Cadastrado',
                     'success'
                     )
                     */


                })
                .on('ajax:error', function(event, xhr, status, error) {

                    var errors = xhr.responseJSON.errors;
                    $.each(errors, function( k, v ) {
                        $('#'+k).html(v);
                    });
                });


        };

        return $public;
    };

    return controllerHome();
});