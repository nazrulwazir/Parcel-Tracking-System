<div class="col-md-8 col-md-offset-2">
	<div class="alert alert-warning">
		<div class="container-fluid">
			<div class="alert-icon">
				<i class="material-icons">info_outline</i>
			</div>
			<button type="button" class="close" data-dismiss="alert" aria-label="Close">
			<span aria-hidden="true"><i class="material-icons">clear</i></span>
			</button>
			<b>{{ __('wording.info_pos') }}
		</div>
	</div>
</div>
<style type="text/css">
	.card .header-primary {
	background: linear-gradient(60deg, #6cd1ff, #03a9f4);
	}
</style>
<div class="col-md-8 col-md-offset-2">
	<br/><br/><br/>
	<div class="card card-signup">
		<div class="header header-primary text-center">
			<b>{{ __('wording.track_number') }}</b>
			<h4><b>{{ $tracking_num }} </b></h4>
			<i class="fas fa-check"></i> {{ $parsed['data'][0]['process'] or $parsed["message"]}}
		</div>
		<div class=" col-md-8 col-md-offset-2">
			
			@if($parsed["http_code"] == 200)
			
			@foreach($parsed['data'] as $key => $value)
			<div class="panel panel-default">
				<div class="panel-body">
					<h4><p class="text-info">
						<b><i class="fas fa-truck"></i> {{ $value['process'] }} </b>
					</p></h4>
					<span >
						<button class="btn btn-primary btn-round">
						<i class="fas fa-map-marker"></i> {{ $value['event'] }}
						<div class="ripple-container"></div></button>
					</span>
					<p class="text">
						<i class="fas fa-clock"></i> {{ $value['date'] }} , {{ $value['time'] }}
					</p>
				</div>
			</div>
			@endforeach
			
			@else
			
			@endif
		</div>
	</div>
</div>