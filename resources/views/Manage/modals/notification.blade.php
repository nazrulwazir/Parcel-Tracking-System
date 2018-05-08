@component('components.modals.base', [
	'id' => 'notification-modal',
	'tooltip' => __('User'),
	'modal_title' => __('wording.notification_title'),
	])
	@slot('modal_body')
		@include('Manage.form.notification')
	@endslot
	@slot('modal_footer')
	@endslot
@endcomponent

@push('scripts')
<script type="text/javascript" src="{{ asset('js/handler.js') }}"></script>
<script>

	$('#notification-form').on('submit', function sendNotification(ev)
			{
		      ev.preventDefault();
		      var jqf = $(this);
		      swal({
			         title: 'Loading ...',
			         allowOutsideClick: false,
			   });
			   swal.showLoading();

		      axios.post(jqf.attr('action'), jqf.serialize())
		       .then(response => {
		       		swal.close();
		       		swal('Okay',response.data.message,'success');
		       		$('#notification-modal').modal('hide');
		       		$('#notification-form').find('input[type=text], input[type=password], input[type=email], textarea').val('');
		       })
		       .catch(error => {
		        	swal.close();
		        	
		        	if(error.hasOwnProperty('response') && error.response.hasOwnProperty('data')) {
						
						$().promptError(error.response.data.errors);
						
						var inputError = [];
						
		        		$.each(error.response.data.errors,function(key, data){
		                   
		                    if($("input[name='"+key+"']").is(':radio') || $("input[name='"+key+"']").is(':checkbox')){
		                        var input = $("input[name='"+key+"']");
		                    } else {
		                        var input = $('#'+key);
		                    }
		                    var parent = input.parents('.form-group');
		                    parent.removeClass('has-success');
		                    parent.addClass('has-error');
		                    parent.find('.help-block').html(data[0]);
		                    inputError.push(key);
		                });

		                $.each(jqf.serializeArray(), function(i, field) {
		                    if ($.inArray(field.name, inputError) === -1)
		                    {
		                        if($("input[name='"+field.name+"']").is(':radio') || $("input[name='"+field.name+"']").is(':checkbox')){
		                            var input = $("input[name='"+field.name+"']");
		                        } else {
		                            var input = $('#'+field.name);
		                        }

		                    var parent = input.parents('.form-group');
		                    input.removeClass('has-error');
		                    parent.find('.help-block').html('');
		                    }
		                });
		        }
			});
     });

</script>

@endpush