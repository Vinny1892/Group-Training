@extends('dashboard.layout.layout')
@section('content')
	
<br>
<br>
<br>
<br>
<br>
<br>
	<a href="{{route('createroom')}}" >criar sala</a>
<br>
	<a href="{{route('editroom')}}" >editar sala</a>

	@include('room.listRooms')



@endsection