$(".form").submit(function(e)
{
    var form = $(this).parents('form');
    swal({
         title: 'Tracking...',
         allowOutsideClick: false,
    });
    swal.showLoading();
    
});

$(document).ready(function(){
var maxField = 10; //Input fields increment limitation
var addMoreButton = $('.addMore'); //Add button selector
var wrapper = $('.field_wrapper'); //Input field wrapper
var fieldHTML = '<div class="row"><div class="form-group label-floating is-empty"><div class="col-md-11"><label class="control-label col-md-8" for="phone_mobile">No Kad Pengenalan (tanpa "-" atau "space")</label><div class="input-icon right"><input id="ic" type="text" class="form-control" maxlength="12" oninput="ValNoAlpha(this)" name="ic[]" required autofocus><span class="material-input"></span></div></div><div class="col-md-1"><a href="javascript:void(0);" class="btn btn-danger btn-sm removeBtn"><i class="fa fa-trash"></i></a></div></div></div>';
var x = 1; //Initial field counter is 1
$(addMoreButton).click(function(){ //Once add button is clicked
    if(x < maxField){ //Check maximum number of input fields
        x++; //Increment field counter
        $(wrapper).append(fieldHTML); // Add field html
    }
});
$(wrapper).on('click', '.removeBtn', function(e){ //Once remove button is clicked
    e.preventDefault();
    $(this).parent().parent().parent().remove();
    x--;
});
});

function ValNoAlpha(obj) {
	var element = obj;
	var position = element.selectionStart;
	element.value = element.value.replace(/[^0-9.-]+/, '');
	element.selectionEnd = position;
};

function limitText(field, maxChar){
    $(field).attr('maxlength',maxChar);
}