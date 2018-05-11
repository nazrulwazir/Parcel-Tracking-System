@push('scripts')
<script src="{{ asset('js/share.js') }}"></script>
<script type="text/javascript">
	function copyToClipboard(element) {
	var $temp = $("<input>");
	$("body").append($temp);
	$temp.val($(element).text()).select();
	document.execCommand("copy");
	$temp.remove();
	}
	$(".btnCopy").click(function(){
	    swal(
		  'Success',
		  'Copied to clipboard',
		  'success'
		)
	});
</script>

<script type="text/javascript">
	$(document).on('click', '.btnSendEmail', function(event) {
				$('#notification-modal').modal('show');
			});
</script>
@endpush
@push('styles')
<style type="text/css">
	.card .header-primary {
	background: linear-gradient(60deg, #6cd1ff, #03a9f4);
	}
	.dropdown-menu li a:hover, .dropdown-menu li a:focus, .dropdown-menu li a:active {
	background-color: #03a9f4;
	color: #FFFFFF;
	}
</style>
@endpush
@push('modals')
	@include('Manage.modals.notification')
@endpush

<div class="col-md-8 col-md-offset-2">
	<br/><br/><br/>
	<div class="card card-signup">
		
		<div class="header header-primary text-center">
			
			<div style="vertical-align: top;"> <img src="{{ asset('assets/img/'.$parcel_type.'.png') }}" style=" border: 2px solid #eee; border-radius: 5px; height: 95px;"> </div>
			<h4><b>{{ $tracking_num }} </b></h4>
			<h4><i class="fas fa-truck"></i>  {{ $title[0]['process'] or 'Record Not Found'}}</h4>
			<div>
				@include('components.modals.button', [
					'modal_btn_classes' => 'btnSendEmail',
					'label' => 'Notification',
					'icon' => 'fas fa-bell',
					'tooltip' => 'Send Email To Receiver',
				])
				<button class="btn btn-warning btn-sm btnCopy" title="" data-toggle="tooltip" data-original-title="Copy URL" onclick="copyToClipboard('#copy-text')"> <i class="fas fa-link"></i> Copy </button>
				<div id="copy-text" hidden>{{ route('manage.track', [$parcel_type,$tracking_num]) }}</div>
				<button class="btn btn-warning btn-sm" title="" data-toggle="tooltip" data-original-title="Save or Print"> <i class="fas fa-print"></i> Print </button>
				<div class="btn-group" >
					<button type="button" class="btn btn-warning dropdown-toggle btn-sm" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true">
					<i class="fas fa-share-alt"></i> Share <span class="caret"></span>
					</button>
					<ul class="dropdown-menu dropdown-menu-right">
						<li><a href="https://www.facebook.com/sharer/sharer.php?u={{ route('manage.track', [$parcel_type,$tracking_num]) }}" class="social-button "><i class="fab fa-facebook"></i> Facebook </a></li>
						<li><a href="https://twitter.com/intent/tweet?text=Shipment Status Tracking Result&amp;url={{ route('manage.track', [$parcel_type,$tracking_num]) }}" class="social-button "><i class="fab fa-twitter"></i> Twitter </a></li>
						<li class="hidden-sm hidden-lg hidden-md"><a href="whatsapp://send?text=Shipment Status Tracking Result {{ $tracking_num }} : {{ route('manage.track', [$parcel_type,$tracking_num]) }}"><i class="fab fa-whatsapp"></i> WhatsApp </a></li>
					</ul>
				</div>
			</div>
		</div>
		<div class=" col-md-8 col-md-offset-2">
			
			@if($parsed["code"] == 200 && $parsed['error'] == false)
			
				@foreach (array_reverse($parsed['tracker']['checkpoints'],true) as $key => $value)
				<div class="panel panel-default">
					<div class="panel-body">
						<h4><p class="text-default">
							<b>{{ $value['process'] }} </b>@if($key === key(array_reverse($parsed['tracker']['checkpoints'],true))) <span class="label label-warning"> Latest</span> @endif
						</p></h4>
						<span class="label label-info"><i class="fas fa-location-arrow"></i> {{ $value['event'] }}</span><br/><br/>
						<span class="label label-default"><i class="fas fa-clock"></i> {{ date_conventer($value['date']) }} </span>
						
					</div>
				</div>
				@endforeach
				
			@endif
		</div>
	</div>
</div>
