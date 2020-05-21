@extends('dashboard.layout.layout')
@section('content')
<div class="content">
	<div class="container-fluid">
		<div class="row">
			<div class="col-md-8">	
				@include('room.form')

				@include('room.listRooms')
			</div>
		</div>
	</div>
</div>




@endsection