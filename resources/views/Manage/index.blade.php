@extends('layouts.app')
@section('content')
<div class="row courier-item">
	@include('components.slider')
	<div class="col-md-8 col-md-offset-2 ">
		
		{!! Form::open(['route'=>'manage.track.id', 'class' => 'contact-form form' , 'method'=>'POST'] ) !!}
		<div class="field_wrapper">
			<div class="row">
				<div class="col-md-12  {{ $errors->has('parcel_type') ? ' has-error' : '' }}">
					<label class="control-label"><h4><b>{{ __('wording.label_checkbox') }}</b></h4></label>
					@foreach(list_parcel() as $value)
					<div class="radio {{ $errors->has('parcel_type') ? ' has-error' : '' }}">
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
						'class' => 'form-control'
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
	
	@if(!empty($list_session))
		@component('components.history', [
			'list_session' => $list_session,
		])
		@endcomponent
	@endif

@endsection