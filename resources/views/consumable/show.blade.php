@extends('layouts.app')

@section('content')
    <img src="{{ asset('storage/banners/pizza-banner.jpg') }}" alt="pizza banner"  class="img-fluid negative-mt-8 banner" style="z-index: -1000;">
    <div class="container-fluid negative-mt-8" id="mask" style="z-index: -1000;"></div>
    <div class="container-fluid p-1 d-flex justify-content-center text-center">
        <div class="col-sm-6 col-md-6 col-lg-6">
            <h3 class="text-white">Eten bestellen in</h3>
            <div class="input-group md-form form-sm form-2 pl-0">
                @include('partials.search')
            </div>
        </div>
    </div>

    <div class="container-fluid bg-light under-banner pb-5">
        <div class="container mb-5">
            <div class="row justify-content-center">
                <div class="col-md-8 mt-4">
                    <div class="card">
                        <div class="card-header bg-orange text-white">
                            <span class="btn float-left text-white">{{ $consumable->name }}</span>
                            <a href="{{ route('restaurants.edit', ['restaurant' => $consumable->id]) }}" class="btn btn-secondary float-right">Wijzigen</a>
                        </div>
                        <div class="card-body shadow">
                            <div class="p-1">
                                <p ><b>Prijs: </b>&euro;{{ number_format($consumable->price, 2) }}</p>
                                <p><b>Beschrijving:</b>
                                    <br>
                                    {{ $consumable->description }}
                                </p>
                            </div>
                            <form action="{{ route('cart.add') }}" method="post">
                                @csrf
                                <input type="hidden" name="consumable" value="{{ $consumable->id }}">
                                <button type="submit" class="btn btn-primary form-control">Toevoegen aan winkelwagen</button>                            
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="container-fluid bg-light pb-5 mb-5"></div>
    </div>
@endsection
