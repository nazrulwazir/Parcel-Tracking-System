<button type="button" class="btn btn-warning btn-sm {{ $modal_btn_classes or '' }}" 
	@include('components.tooltip', ['tooltip' => $tooltip])
  @isset($id) data-toggle="modal" data-target="#{{ $id }}" @endisset>
  @isset($icon) <i class="{{ $icon }}"></i> @endisset
  @isset($label) {{ __($label) }} @endisset
</button>