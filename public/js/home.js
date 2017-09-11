$('.modal').modal();

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
})