$(document).ready(function(){
    // stepper function
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


    // for grades (restrictions and input limit)
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

    // input restrictions

    // limit for all text-inputs
    $('input').each(function(){
        $('input[type=text]').keyup(function() {
            var maxInput = 30;
            if($(this).val().length >= maxInput){
                $(this).val($(this).val().substr(0, maxInput));
            }
        });
    });


    //limit for lrn 
    $('input[name=lrn] [name=phase_1_lrn').keyup(function(){
        var maxLRN = 12;
        if($(this).val().length >= maxLRN){
            $(this).val($(this).val().substr(0, maxLRN));
        }
    });

    // char restriction for textboxes
    // Learner's personal info
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

    // restrictions for number inputs
    $('.header #number-only').each(function(){
        var invalidInputs = ["-","+","e",]; 
        $('.header #number-only').keydown( function(e){
            var invalidInputs = ["-","+","e",];
            if (invalidInputs.includes(e.key)) {
                e.preventDefault();
            } 
        });
    });

    // textbox restrictions for symbols  
    $('input').on('keypress', function (event) {
        var regex = new RegExp("^[a-zA-Z0-9_ ]*$");
        var key = String.fromCharCode(!event.charCode ? event.which : event.charCode);
        if (!regex.test(key)) {
            event.preventDefault();
            return false;
        }
    });
    $('span #dash').each(function(){
        $('input[id=dash]').on('keyup', function(){
            var key = $(this).val();
            $(this).val(key.replace(/ /g, "-"));
        });
    });
    
});

