<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
<head>
    @include('components.meta')

    <title>{{ config('app.name', "Pos Laju Tracking System") }}</title>
    
    
    <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons" />
    <link rel="stylesheet" type="text/css" href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700" />
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/latest/css/font-awesome.min.css" />

    <!-- CSS Files -->
    <link href="{{ asset('assets/css/bootstrap.min.css') }}" rel="stylesheet" />
    <link href="{{ asset('assets/css/material-kit.css') }}" rel="stylesheet"/>
    <link href="{{ asset('assets/css/demo.css') }}" rel="stylesheet" />
	
	<style type="text/css">
		.form-control, .form-group .form-control {
		    border: 0;
		    background-image: linear-gradient(#03a9f4, #03a9f4), linear-gradient(#D2D2D2, #D2D2D2);
		    background-size: 0 2px, 100% 1px;
		    background-repeat: no-repeat;
		    background-position: center bottom, center calc(100% - 1px);
		    background-color: transparent;
		    transition: background 0s ease-out;
		    float: none;
		    box-shadow: none;
		    border-radius: 0;
		    font-weight: 400;
		}
		.btn.btn-primary, .btn.btn-primary:hover, .btn.btn-primary:focus, .btn.btn-primary:active, .btn.btn-primary.active, .btn.btn-primary:active:focus, .btn.btn-primary:active:hover, .btn.btn-primary.active:focus, .btn.btn-primary.active:hover, .open > .btn.btn-primary.dropdown-toggle, .open > .btn.btn-primary.dropdown-toggle:focus, .open > .btn.btn-primary.dropdown-toggle:hover, .navbar .navbar-nav > li > a.btn.btn-primary, .navbar .navbar-nav > li > a.btn.btn-primary:hover, .navbar .navbar-nav > li > a.btn.btn-primary:focus, .navbar .navbar-nav > li > a.btn.btn-primary:active, .navbar .navbar-nav > li > a.btn.btn-primary.active, .navbar .navbar-nav > li > a.btn.btn-primary:active:focus, .navbar .navbar-nav > li > a.btn.btn-primary:active:hover, .navbar .navbar-nav > li > a.btn.btn-primary.active:focus, .navbar .navbar-nav > li > a.btn.btn-primary.active:hover, .open > .navbar .navbar-nav > li > a.btn.btn-primary.dropdown-toggle, .open > .navbar .navbar-nav > li > a.btn.btn-primary.dropdown-toggle:focus, .open > .navbar .navbar-nav > li > a.btn.btn-primary.dropdown-toggle:hover {
		    background-color: #03a9f4;
		    color: #FFFFFF;
		}
		.form-group.is-focused label, .form-group.is-focused label.control-label {
		    color: #333;
		}
		.form-group.is-focused .form-control {
		    outline: none;
		    background-image: linear-gradient(#03a9f4, #03a9f4), linear-gradient(#D2D2D2, #D2D2D2);
		    background-size: 100% 2px, 100% 1px;
		    box-shadow: none;
		    transition-duration: 0.3s;
		}
		.navbar, .navbar.navbar-default {
		    background-color: #03a9f4;
		    color: #ffffff;
		}
		.radio input[type=radio]:checked ~ .check {
		    background-color: #03a9f4;
		}
		.radio input[type=radio]:checked ~ .circle {
		    border-color: #03a9f4;
		}
		.logo-container .brand {
		    font-size: 16px;
		    color: #FFFFFF;
		    line-height: 18px;
		    float: left;
		    margin-left: 10px;
		    margin-top: 16px;
		    width: 186px;
		    height: 6px;
		    text-align: left;
		}
	</style>
    @stack('styles')
</head>

<body class="components-page">
    @yield('body')
    @include('components.scripts')
    @stack('scripts')
</body>