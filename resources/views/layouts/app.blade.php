@extends('layouts.base')
@section('body')
@include('components.navigations')
<div class="wrapper">
	@include('components.header')
	<div class="main main-raised">
		<div class="section">
			<div class="container">
				@yield('content')
			</div>
		</div>
	</div>
	@include('components.footer')
</div>
@endsection