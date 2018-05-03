<style type="text/css">
	.card .header-primary {
	background: linear-gradient(60deg, #6cd1ff, #03a9f4);
	}
</style>
<div class="col-md-8 col-md-offset-2">
	<br/><br/><br/>
	<div class="card card-signup">
		
		<div class="header header-primary text-center">
			<div class="logo">
				<img src="{{ asset('assets/img/'.$parcel_type.'.png') }}" width="200">
			</div>
			<h4><b>{{ __('wording.track_number') }}</b></h4>
			<h4><b>{{ $tracking_num }} </b></h4>
			<h4><i class="fas fa-truck"></i>  {{ $parsed['tracker']['checkpoints'][0]['process']  or 'Record Not Found'}}</h4>
		</div>
		<div class=" col-md-8 col-md-offset-2">
			
			@if($parsed["code"] == 200 && $parsed['error'] == false)
			
			@for($i=0;$i<count($parsed['tracker']['checkpoints']);$i++)
			<div class="panel panel-default">
				<div class="panel-body">
					<h4><p class="text-info">
						<b>{{ $parsed['tracker']['checkpoints'][$i]['process'] }} </b>
					</p></h4>
					<span >
						<button class="btn btn-primary btn-round">
						<i class="fas fa-location-arrow"></i> {{ $parsed['tracker']['checkpoints'][$i]['event'] }}
						<div class="ripple-container"></div></button>
					</span>
					<p class="text">
						<i class="fas fa-clock"></i> {{ $parsed['tracker']['checkpoints'][$i]['date']}}
					</p>
				</div>
			</div>
			@endfor
			
			@else
			
			@endif
		</div>
	</div>
</div>