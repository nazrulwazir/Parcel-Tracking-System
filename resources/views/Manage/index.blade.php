@extends('layouts.app')
@section('content')
<style type="text/css">
	.modal-backdrop {
	z-index: -1;
	}
</style>
<div class="row">
	<div class="col-md-12 ">
		<h4 class="text-center"><b> {{ __('wording.info') }} </b></h4>
	</div>
	
	<div class="col-md-8 col-md-offset-2">
		
		{!! Form::open(['route'=>'manage.index', 'class' => 'contact-form form' , 'method'=>'POST'] ) !!}
		<div class="field_wrapper">
			<div class="row">
				<div class="col-md-12">
					<div class="form-group label-floating is-empty">
						<label class="control-label">{{ __('wording.label') }}</label>
						<input id="tracking_num" type="text" class="form-control{{ $errors->has('tracking_num') ? ' is-invalid' : '' }}" name="tracking_num" required autofocus>
						<span class="material-input"></span></div>
					</div>
				</div>
			</div>
			<div class="row">
				<div class="col-md-12 text-center">
					<button class="btn btn-primary btn-raised btn-md btn-block btnSubmit" type="submit">
					{{ __('wording.track_btn') }}
					</button>
				</div>
			</div>
			{!! Form::close() !!}
		</div>
		
		@if(Request::isMethod('post'))
		
		@component('components.show_data', [
		'parsed' => $parsed,
		'tracking_num' => $tracking_num,
		])
		@endcomponent
		
		@endif
	</div>
	@endsection