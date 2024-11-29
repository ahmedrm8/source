

$('.showMessage').click(function(){

    // $(this).parent().prev().text('read');

    $(this).parent().parent().find('.view').text('read');

    // change view inside the database

    // var id = $(this).attr('data-id');
    var id = $(this).data('id');

    $.post('functions/insertMess.php' , {id} , function(data){
        console.log(data);
    })

})