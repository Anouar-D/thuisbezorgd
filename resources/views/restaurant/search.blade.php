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
                        <div class="card-header text-center">Gezochte Restaurants</div>
                        <div class="card-body">
                            @if (session('status'))
                                <div class="alert alert-success" role="alert">
                                    {{ session('status') }}
                                </div>
                            @endif
                            @if(isset($restaurants[0]))
                                @foreach ($restaurants as $restaurant)
                                    <a href="{{ route('restaurants.show', ['restaurant' => $restaurant->id]) }}" class="restaurant-link text-center">{{ $restaurant->title }}</a>
                                @endforeach
                            @else
                                Sorry, We hebben geen restaurant met het gewensde naam in onze systeem, dus geniet van de kittengif 
                                <div class="container-fluid text-center mt-1">
                                    <img src="https://media.tenor.com/images/bcf4d183aefc4cb5a559dafc0c3c7435/tenor.gif" alt="kittengif" class="img-fluid">
                                </div>
                            @endif
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="container-fluid bg-light pb-5 mb-5"></div>
    </div>
@endsection
