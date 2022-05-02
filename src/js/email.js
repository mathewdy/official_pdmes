$(document).ready(function(){
    $('input[name=email]').on("click focus", function(){
        $(this).attr("aria-describedby", "To");
        $(this).attr("placeholder", ""); 
        $('.input-group-text').toggleClass('active');
        $('.input-group-text').removeClass('d-none');
    }).on("blur", function(){
        $(this).attr("placeholder", "Recipient");
        $('.input-group-text').toggleClass('d-none');
        $('.input-group-text').removeClass('active');  
    });
});