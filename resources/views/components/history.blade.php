<div class="col-md-12 ">
	<h2 class="text-center"><b> {{ __('wording.history') }} </b></h2>
</div>
<div class="col-md-8 col-md-offset-2 ">
	@foreach($list_cookie as $value)
	@php
		$data = json_decode($value,true);
	@endphp
	<div class="col-md-4">
	<div class="alert alert-info text-center ">
		<a href="{{ route('manage.track', [$data['parcel_type'],$data['tracking_num']]) }}" style="text-decoration:none">
			<div class="container-fluid">
				<button type="button" class="close" data-dismiss="alert" aria-label="Close">
				<span aria-hidden="true"><i class="material-icons">clear</i></span>
				</button>
				<span aria-hidden="true"><div style="vertical-align: top;"> <img src="{{ asset('assets/img/'.$data['parcel_type'].'.png') }}" style=" border: 2px solid #eee; border-radius: 5px; height: 95px;"> </div></span><br/>
				{{ $data['tracking_num'] }}<br/> <b>{{ $data['info'] }}</b>
			</div></a>
		</div></div>
		@endforeach
	</div>
</div>