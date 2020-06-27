@extends('home.main')
@section('home')
@include('home.header')

<section class="section-modality">
    <div class="container">
        <h4 class="text-center">Modalidades</h4>
        @include('modality.allModalities')
    </div>
</section>

<section class="section-empresa">
    <div class="container">
        <h4 class="text-center">Empresas parceiras</h4>
        <div class="row empresas-parceiras">


            @foreach ($patrocinadores as $patrocinador)
            <div class="col-lg-2">
                <img src="{{ asset('image/empresas/'.$patrocinador.'.png') }}" alt="<?= $patrocinador ?>" width="100%">
            </div>
            @endforeach
        </div>
    </div>
</section>

@include('home.footer')
@endsection