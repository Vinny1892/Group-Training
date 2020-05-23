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
<div class="content">
	<div class="container-fluid">
		<div class="row">
			<div class="col-md-12">	
				@include('room.listRooms')
			</div>
		</div>
	</div>
</div>
@endsection