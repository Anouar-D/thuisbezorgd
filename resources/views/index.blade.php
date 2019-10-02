@extends('layouts.app')

@section('content')
        <div class="p-5 bg-orange text-center" id="lol">
            <div style="transform: rotate(2deg);">
                <h1 class="text-white text-bold"><b>Tijd om eten te bestellen</b></h1>
                <h3 class="text-white">Vind restaurants bij jou in de buurt</h3>
            </div>
        </div>
    <img src="{{ asset('storage/banners/pizza-banner.jpg') }}" alt="pizza banner"  class="img-fluid negative-mt-8 banner" style="z-index: -1000;">
    <div class="container-fluid" id="mask" style="z-index: -1000;"></div>
    <div class="container-fluid p-1 d-flex justify-content-center text-center mb-5 pb-5 mt-5">
        <div class="col-sm-6 col-md-6 col-lg-6">
            @include('partials.search')
        </div>
    </div>

    <div class="container-fluid bg-light under-banner mt-5">
        <div class="container mb-5">
            <div class="row">
                <div class="col-sm-6 col-md-6 col-lg-6 mt-5">
                    <span class="blog-text">Zin in meer?<br>
                    Op ons blog vind je interessante nieuwtjes op het gebied van food & lifestyle!</span>
                    <p><a href="https://www.thuisbezorgd.nl/blog">> Naar het blog</a></p>
                </div> 
                <div class="col-sm-2 col-md-2 col-lg-2 mt-3"></div>
                <div class="col-sm-4 col-md-4 col-lg-4 mt-3">
                    <img src="{{ asset('storage/media/laptop.png') }}" alt="laptop" class="img-fluid">
                </div>
            </div>  
        </div>
        <div class="container-fluid bg-light"></div>
    </div>
@endsection
