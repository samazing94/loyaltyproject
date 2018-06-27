@extends('layouts.dashboard')
@section('section')

<div class = "container">

	<p> Name: </p> 
	<br>
	<p> Mobile No: </p>
	<br>
	<p> Amount spent: </p> {{points[0]->min_amount }}
	<br>
	<p> Points Received now: </p> {{ points[0]->point }}

@endsection