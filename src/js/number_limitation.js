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

    $('section input').each(function(){
        $('section input').bind('keydown', function(event) {
            var key = event.which;
            if (key >=48 && key <= 57) {
              event.preventDefault();
            }
        });
    });
});