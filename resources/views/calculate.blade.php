@extends('layouts.dashboard')
@section('section')

<div class = "container">

	<p> Name: </p> 
	<br>
	<p> Mobile No: </p>
	<br>
	<p> Amount spent: </p> {{ $points->min_amount }}
	<br>
	<p> Points Received now: </p> {{ $points->point }}

@endsection