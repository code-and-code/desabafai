define(['jquery','jqueryscroll','materialize'], function($) {
    'use strict';

    $('.modal').modal();
    
    $(document).on("click", ".like", function(e) {

        e.preventDefault();
        var id     = $(this).data('like');
        var action = $(this).attr('href');

        $.post(action, function() {
                $('#'+id).addClass("blue-text");
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

    $(document).on("click", ".fast", function(e) {

        e.preventDefault();
        var meme   = $(this).data('params');
        var target = $(this).data('target');
        var action = $(this).attr('href');

        console.log(target);
        var img = "<img src='/images/memes/"+meme+"'>";

        $.post(action,{body:img}, function() {

            })
            .done(function(xhr) {
                $('#'+target).append(xhr.data);
            })
            .fail(function() {
                var errors = xhr.responseJSON.errors;
                console.log(errors)
            })
            .always(function(xhr) {
                $('#'+target).append(xhr.data);
            });
    });


    $(document).on("click", ".destroy", function(e) {

        e.preventDefault();
        var id     = $(this).data('remove');
        var action = $(this).attr('href');

        $.ajax({
                type: "DELETE",
                 url: action,
                success: function (xhr) {}

        }).done(function(xhr) {

            $('#'+id).remove();

        }).fail(function(xhr) {

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
        var id     = $(this).data('comment');
        var data   = $(this).serialize();
        var action = $(this).attr('action')

        console.log(id);

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
                $('#new_answer_' + id).append(xhr.data);

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