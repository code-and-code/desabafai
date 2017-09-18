define(['jquery'], function($) {
    'use strict';

    $(":input").bind("keyup change", function (e) {
        var name = $(this).attr('name')
        $('#' + name).html('');
    });

    $('#form_user_update')
        .on('ajax:success', function (event, xhr, status, error) {
            swal(
                'Agora Sim',
                'Atualizado',
                'success'
            )
        })
        .on('ajax:error', function (event, xhr, status, error) {

            var errors = xhr.responseJSON.errors;
            $.each(errors, function (k, v) {
                $('#' + k).html(v);
            });

        });

    $(document).on("click", ".like", function(e) {

        e.preventDefault();
        var action = $(this).attr('href');

        $.get(action, function() {
                
            })
            .done(function(xhr) {
                $('#likes_count_'+xhr.data.id).html(xhr.data.likes);
            })
            .fail(function() {
                var errors = xhr.responseJSON.errors;
                console.log(errors)
            })
            .always(function(xhr) {

            });
    });

       console.log( 'Carregou userController.js' );
});