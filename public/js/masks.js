$(document).ready(function($){
    $('#phone').mask('(00) 0000-00000');
    $('#phone').change(function(){
        var len = $(this).val().length;
        if (len === 15) {
            $(this).mask('(00) 00000-0000');
        } else if (len < 15) {
            $(this).mask('(00) 0000-00000');
        }
    });
    $('#zipcode').mask('00000-000');
});
