{!! Form::open(['route'=>'manage.notification.store', 'class' => 'notification' , 'id'=> 'notification-form' , 'method'=>'POST'] ) !!}
<div class="field_wrapper">
	
	<div class="row">
		<div class="col-md-12">
			<div class="form-group label-floating  is-empty">
				{{ Form::hidden('tracking_num', $tracking_num) }}
				{{ Form::hidden('parcel_type', $parcel_type) }}
				<label class="control-label">Enter Sender Name</label>
				{{ Form::text('sender_name','',[
						'class' => 'form-control',
						'id' 	=> 'sender_name',
				]) }}
				<span class="material-input"></span><span class="material-input"></span>
			</div>

			<div class="form-group label-floating  is-empty">
				<label class="control-label">Enter Sender Email</label>
				{{ Form::email('sender_email','',[
						'class' => 'form-control',
						'id' 	=> 'sender_email',
				]) }}
				<span class="material-input"></span><span class="material-input"></span>
			</div>

			<div class="form-group label-floating  is-empty">
				<label class="control-label">Enter Receiver Name</label>
				{{ Form::text('receiver_name','',[
						'class' => 'form-control',
						'id' 	=> 'receiver_name',
				]) }}
				<span class="material-input"></span><span class="material-input"></span>
			</div>

			<div class="form-group label-floating  is-empty">
				<label class="control-label">Enter Receiver Email</label>
				{{ Form::email('receiver_email','',[
						'class' => 'form-control',
						'id' 	=> 'receiver_email',
				]) }}
				<span class="material-input"></span><span class="material-input"></span>
			</div>

			<div class="form-group">
				{!! app('captcha')->display() !!}
			</div>

		</div>

	</div>

	<div class="row">
		<div class="col-md-12 text-center">
			<button class="btn btn-primary btn-raised btn-md btn-block btnSubmit" type="submit"><i class="fas fa-paper-plane"></i>
			Send Now
			</button>
		</div>
	</div>
</form>
{!! Form::close() !!}