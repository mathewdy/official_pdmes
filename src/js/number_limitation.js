$(document).ready(function(){
    var form_count = 1, previous_form, next_form, total_forms;
    total_forms = $("fieldset").length;  
    $(".next-form").click(function(){
        previous_form = $(this).parent();
        next_form = $(this).parent().next();
        next_form.show();
        previous_form.hide();
    });  
    $(".previous-form").click(function(){
        previous_form = $(this).parent();
        next_form = $(this).parent().prev();
        next_form.show();
        previous_form.hide();
    });

    $('td #grade').each(function(){
        var maxChar = 2;
        var invalidInputs = ["-","+","e",]; 
        $('td #grade').keydown( function(e){
            if ($(this).val().length >= maxChar) { 
                $(this).val($(this).val().substr(0, maxChar));
            }
            if (invalidInputs.includes(e.key)) {
                e.preventDefault();
            }
        });
        $('td #grade').keyup( function(e){
            if ($(this).val().length >= maxChar) { 
                $(this).val($(this).val().substr(0, maxChar));
            }
        });
    });
    $('section #text-only').each(function(){
        $('section #text-only').bind('keydown', function(event) {
            var key = event.which;
            if (key >=48 && key <= 57) {
                event.preventDefault();
            }
        });
    });
    $('section span #text-only').each(function(){
        $('.header #text-only').bind('keydown', function(event) {
            var key = event.which;
            if (key >=48 && key <= 57) {
                event.preventDefault();
            }
        });
    });
    $('.header #number-only').each(function(){
        var invalidInputs = ["-","+","e",]; 
        $('.header #number-only').keydown( function(e){
            var invalidInputs = ["-","+","e",];
            if (invalidInputs.includes(e.key)) {
                e.preventDefault();
            } 
        });
    });
});

$('.line-1 input[type=text]').on('keypress', function (event) {
    // $('.line-1 input').on('input', function() {
    //     $(this).val($(this).val().replace(/[^a-zA-Z-\-\']/g, ""));
    // });
    var regex = new RegExp("^[a-zA-Z0-9]");
    var key = String.fromCharCode(!event.charCode ? event.which : event.charCode);
    if (!regex.test(key)) {
        event.preventDefault();
        return false;
    }
});