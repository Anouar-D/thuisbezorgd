@extends('layouts.app')

@section('content')
    
    <img src="{{ asset('storage/banners/pizza-banner.jpg') }}" alt="pizza banner"  class="img-fluid negative-mt-8 banner" style="z-index: -1000;">
    <div class="container-fluid negative-mt-8" id="mask" style="z-index: -1000;"></div>
    <div class="container-fluid p-1 d-flex justify-content-center text-center">
        <div class="col-sm-6 col-md-6 col-lg-6">
            <h3 class="text-white">Eten bestellen in</h3>
            <div class="input-group md-form form-sm form-2 pl-0">
                <input class="form-control my-0 py-1 blue-border" type="text" placeholder="&#128205; Adres, b.v. Amsterdam 10" aria-label="Search">
                <div class="input-group-append">
                    <span class="input-group-text blue lighten-2" id="basic-text1">Zoek</span>
                </div>
            </div>
        </div>
    </div>

    <div class="container-fluid bg-light under-banner pb-5">
        <div class="container mb-5">
            <div class="row justify-content-center">
                <div class="col-md-8 mt-4">
                    <div class="card">
                        <div class="card-header text-center">My Orders</div>
                        <div class="card-body">
                            @if (session('status'))
                                <div class="alert alert-success" role="alert">
                                    {{ session('status') }}
                                </div>
                            @endif

                            Welkom bij Thuisbezorgd.nl
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="container-fluid bg-light pb-5 mb-5"></div>
    </div>
@endsection
