@push('styles')
<link href="{{ asset('assets/css/slider.css')}}" rel="stylesheet">
<style type="text/css">
         .slick-slide img {
             width: 70%;
         }
</style>
@endpush

@push('scripts')
<script src="{{ asset('js/slick.js') }}"></script>
<script type="text/javascript">
   $(document).ready(function(){
         $('.customer-logos').slick({
            slidesToShow: 4,
            slidesToScroll: 1,
            autoplay: true,
            autoplaySpeed: 1000,
            arrows: false,
            dots: false,
               pauseOnHover: false,
               responsive: [{
               breakpoint: 768,
               settings: {
                  slidesToShow: 3
               }
            }, {
               breakpoint: 520,
               settings: {
                  slidesToShow: 2
               }
            }]
         });
      });
</script>
@endpush
<div class="col-md-12 ">
      <h2 class="text-center"><b> {{ __('wording.info') }} </b></h2>
      <h4 class="description text-center">{{ __('wording.description') }}</h4>
   </div>
<div class="col-md-12 ">
   <div class="customer-logos">
      @foreach(list_parcel() as $value)
        @if($value['src'] == 1)
         <div class="slide"><img src="{{ asset('assets/img/'.$value['img'].'.png') }}" ></div>
        @endif
      @endforeach
   </div>
</div>
