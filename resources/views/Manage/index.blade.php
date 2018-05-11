@extends('layouts.app')
@section('content')
<div class="row courier-item">
	@include('components.slider')
	<div class="col-md-8 col-md-offset-2 ">
		
		{!! Form::open(['route'=>'manage.track.id', 'class' => 'tracking' , 'id'=>'tracking-form' , 'method'=>'POST'] ) !!}
		<div class="field_wrapper">
			<div class="row">
				<div class="form-group col-md-12  {{ $errors->has('parcel_type') ? ' has-error' : '' }}">
					<label class="control-label"><h4><b>{{ __('wording.label_checkbox') }}</b></h4></label>
					@foreach(list_parcel() as $value)
					<div class="form-group radio {{ $errors->has('parcel_type') ? ' has-error' : '' }}">
						<label>
							{{ Form::radio('parcel_type', $value['value'] , '',[
											'id' => 'parcel_type'
							]) }}
							{{ $value['name'] }}
						</label>
					</div>
					@endforeach
				</div>
			</div>
			<div class="row">
				<div class="col-md-12">
					<div class="form-group label-floating {{ $errors->has('tracking_num') ? 'has-error' : '' }}">
						<label class="control-label">{{ __('wording.label') }}</label>
						{{ Form::text('tracking_num','',[
									'class' => 'form-control',
									'id' => 'tracking_num',
						]) }}
						<span class="material-input"></span></div>
					</div>
				</div>
			</div>
			<div class="row">
				<div class="col-md-12 text-center">
					<button class="btn btn-primary btn-raised btn-md btn-block btnSubmit" type="submit"><i class="fas fa-map-marker-alt"></i> 
					 {{ __('wording.track_btn') }}
					</button>
				</div>
			</div>
			{!! Form::close() !!}
		</div>
	</div>
	
	@if(!empty($list_cookie))
		@component('components.history', [
			'list_cookie' => $list_cookie,
		])
		@endcomponent
	@endif

@endsection

@push('scripts')
<script type="text/javascript" src="{{ asset('js/handler.js') }}"></script>
<script type="text/javascript">
	$('#tracking-form').on('submit', function tracking(ev)
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
		       		window.location.href = response.data.message;
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