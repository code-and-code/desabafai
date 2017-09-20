$(function($) {
    'use strict';

    $(":input").bind("keyup change", function(e) {
        var name = $(this).attr('name')
        $('#'+name).html('');
    })

    $('#form_register')

        .on('ajax:success', function(event, xhr, status, error) {

            swal(
                'Valeu',
                'Cadastrado',
                'success'
            )
            $(location).attr('href','/login');
        })
        .on('ajax:error', function(event, xhr, status, error) {

            var errors = xhr.responseJSON.errors;
            $.each(errors, function( k, v ) {
                $('#'+k).html(v);
            });
        });
    console.log( 'Carregou registerController.js' );
});