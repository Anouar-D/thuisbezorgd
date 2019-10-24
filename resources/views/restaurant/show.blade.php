@extends('layouts.app')

@section('content')
    <?php 
        $threshold = false;
        foreach($restaurant->consumable as $consumable){
            if($consumable){
                $threshold = true;
            }
        }
    ?>
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
                            <span class="btn float-left text-white">{{ $restaurant->title }}</span>
                            @if(Auth::id() === $restaurant->user_id)
                                <a href="{{ route('consumable.create', $restaurant->id) }}" class="btn btn-primary float-right">Product toevoegen</a>
                                <a href="{{ route('restaurants.edit', ['restaurant' => $restaurant->id]) }}" class="btn btn-secondary float-right">Restaurant wijzigen</a>
                            @endif
                        </div>
                        <div class="card-body">
                            @if (session('status'))
                                <div class="alert alert-success" role="alert">
                                    {{ session('status') }}
                                </div>
                            @endif
                            @if($threshold)
                                @foreach($restaurant->consumable as $consumable)
                                    <a href="{{ route('consumable.show', [$restaurant, $consumable]) }}" class="restaurant-link">
                                        <span class="">{{$consumable->name}}</span>
                                        <span class="float-right">&euro;{{ number_format($consumable->price, 2) }}</span>
                                    </a>
                                @endforeach
                            @else
                                <li>Nog Geen Producten Aangegeven</li>
                            @endif
                        </div>
                        <div class="card-header bg-orange text-white text-center">Contact</div>
                        <div class="card-body">
                            <a href="" class="restaurant-link">{{$restaurant->address. ' ' . $restaurant->zipcode. ', ' .$restaurant->city}}</a>
                            <a href="tel:{{ $restaurant->phone }}" class="restaurant-link">{{ $restaurant->phone }}</a>
                            <a href="mailto:{{ $restaurant->email }}" class="restaurant-link">{{ $restaurant->email }}</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="container-fluid bg-light pb-5 mb-5"></div>
    </div>
@endsection
