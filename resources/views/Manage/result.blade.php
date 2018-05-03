@extends('layouts.app')
@section('content')

<div class="row">
	@include('components.slider')
	<div class="col-md-12">
		
		@component('components.show_data', [
		'parsed' => $parsed,
		'tracking_num' => $tracking_num,
		'parcel_type' => $parcel_type,
		'title'	=> $title,
		])
		@endcomponent
	</div>
</div>
@endsection