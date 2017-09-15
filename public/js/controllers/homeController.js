define(['jquery','jqueryscroll'], function($) {
    'use strict';

    $('#like').click(function () {
        $(this).toggleClass("lighten-5");
        $("#thumb_up").toggleClass("blue-text");
    });

    $(document).on("click", ".show_comments", function() {
           var comments = $(this).data('comments');
           $("#" + comments).toggle();
     });

    $(document).on("click", ".add_comment", function() {
          var form = $(this).data('form');
          $("#" + form).toggle();
    })

    $(document).on("click", ".reply_comment", function() {
         var form = $(this).data('form');
         $("#" + form).toggle();
    });

    $('.form_create_comment')

        .on('ajax:success', function (event, xhr, status, error) {

            var id = $(this).data('post');

            $('#form_comment_' + id).hide();
            $('#comments_' + id).show();
            $('#new_comment_' + id).append(xhr.data);

             swal(
             'Valeu',
             'Cadastrado',
             'success'
             )

        })
        .on('ajax:error', function (event, xhr, status, error) {

            var errors = xhr.responseJSON.errors;
            $.each(errors, function (k, v) {
                $('#' + k).html(v);
            });
        });


    $('ul.pagination').hide();

    $('.infinite-scroll').jscroll({

        autoTrigger: true,
        loadingHtml: '',
        padding: 20,
        //contentSelector: '.infinite-scroll',
        nextSelector: '.pagination li.active + li a',
        contentSelector: 'div.infinite-scroll',

        loadingFunction: function() {

        },

        callback: function() {
            $('ul.pagination').remove();
        }

    });
     console.log( 'Carregou homeController.js' );
});