<div class="col-md-12 ">
	<h2 class="text-center"><b> {{ __('wording.info') }} </b></h2>
	<h5 class="description text-center">{{ __('wording.description') }}</h5>
</div>
<div class="col-md-8 col-md-offset-2 ">
	@foreach($list_session as $value)
	<div class="col-md-4">
	<div class="alert alert-info text-center ">
		<a href="{{ route('manage.track', [$value->parcel_type,$value->tracking_num]) }}">
			<div class="container-fluid">
				<button type="button" class="close" data-dismiss="alert" aria-label="Close">
				<span aria-hidden="true"><i class="material-icons">clear</i></span>
				</button>
				<span aria-hidden="true"><img src="{{ asset('assets/img/'.$value->parcel_type.'.png') }}" width="90"></span><br/>
				{{ $value->tracking_num }}<br/> <b>{{ $value->info }}</b>
			</div></a>
		</div></div>
		@endforeach
	</div>
</div>