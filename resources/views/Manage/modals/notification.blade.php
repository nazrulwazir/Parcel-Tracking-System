@component('components.modals.base', [
	'id' => 'notification-modal',
	'tooltip' => __('User'),
	'modal_title' => __('wording.notification_title'),
	])
	@slot('modal_body')
		@include('Manage.form.notification')
	@endslot
	@slot('modal_footer')
	@endslot
@endcomponent