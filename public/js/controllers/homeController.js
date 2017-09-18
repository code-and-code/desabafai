define(['jquery','jqueryscroll', 'init'], function($) {
    'use strict';

    $(document).on("click", ".like", function(e) {

        e.preventDefault();
        var id     = $(this).data('like');
        var action = $(this).attr('href');

        $.get(action, function() {
                $('#'+id).classad("blue-text");
            })
            .done(function(xhr) {
                $('#like_count_'+xhr.data.id).html(xhr.data.likes);
            })
            .fail(function() {
                var errors = xhr.responseJSON.errors;
                console.log(errors)
            })
            .always(function(xhr) {

            });
     });

    $(document).on("click", ".show_comments", function(e) {
           e.preventDefault();
           var comments = $(this).data('comments');
           $("#" + comments).toggle();
     });

    $(document).on("click", ".add_comment", function(e) {
           e.preventDefault();
           var form = $(this).data('form');
           $("#" + form).toggle();
    })

    $(document).on("click", ".reply_comment", function(e) {
          e.preventDefault();
          var form = $(this).data('form');
         $("#" + form).toggle();
    });

    $(document).on("submit",'.form_post_create_comment', function (e) {

           e.preventDefault();
           var id     = $(this).data('post');
           var data   = $(this).serialize();
           var action = $(this).attr('action')

           $('#form_comment_' + id).hide();
           $('#comments_' + id).show();

            $.post(action,data, function(xhr) {
                })
                .done(function() {
                    swal(
                        'Valeu',
                        'pela dica !!!',
                        'success'
                    )
                })
                .fail(function(xhr) {
                    var errors = xhr.responseJSON.errors;
                    $.each(errors, function (k, v) {
                        $('#' + k).html(v);
                    });
                })
                .always(function(xhr) {
                    $('#new_comment_' + id).append(xhr.data);

                });
    });


    $(document).on("submit",'.form_comment_create_comment', function (e) {

        e.preventDefault();
        var id     = $(this).data('post');
        var data   = $(this).serialize();
        var action = $(this).attr('action')

        $('#form_comment_' + id).hide();
        $('#comments_' + id).show();

        $.post(action,data, function(xhr) {
            })
            .done(function() {
                swal(
                    'Valeu',
                    'pela dica !!!',
                    'success'
                )
            })
            .fail(function(xhr) {
                var errors = xhr.responseJSON.errors;
                $.each(errors, function (k, v) {
                    $('#' + k).html(v);
                });
            })
            .always(function(xhr) {
                $('#new_comment_' + id).append(xhr.data);

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