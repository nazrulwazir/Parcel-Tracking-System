<div class="modal fade" id="{{ $id }}" role="dialog" aria-labelledby="{{ $id }}ModalCenterTitle" aria-hidden="true" tabindex="-1" role="dialog">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
        <h4 class="modal-title" id="{{ $id }}"><b>{{ __($modal_title) }}</b></h4>
      </div>
      <div class="modal-body">
        {{ $modal_body }}
      </div>

      @isset($modal_footer)
        <div class="modal-footer">
          <button type="button" class="btn btn-default btn-simple" data-dismiss="modal">{{ __('Close') }}</button>
          {{ $modal_footer }}
        </div>
      @endisset

    </div>
  </div>
</div>
