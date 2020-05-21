@extends('dashboard.layout.layout')
@section('content')

	<div class="content">
		<div class="container-fluid">
			<div class="row">
				<div class="col-md-8">
					@include('modality.form')

					@include('modality.listModalities')
				</div>
			</div>
		</div>
	</div>
	




@endsection