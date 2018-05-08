$(".form").submit(function(e)
{
    var form = $(this).parents('form');
    swal({
         title: 'Loading ...',
         allowOutsideClick: false,
    });
    swal.showLoading();
    
});