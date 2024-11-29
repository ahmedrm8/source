
$(".leave-comment").submit(function(event){

    event.preventDefault();

    // get value
    var name = $('.name').val();
    var phone = $('.phone').val();
    var email = $('.email').val();
    var message = $('.message').val();

    // send data to server
    $.post('functions/sendMessage.php' , {
        name : name ,
        phone : phone , 
        email : email , 
        message : message
    } , function(data){
        console.log(data);

        $('.res').html(data)

    })
})