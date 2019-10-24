@extends('layouts.app')

@section('content')
<img src="{{ asset('storage/banners/pizza-banner.jpg') }}" alt="pizza banner"  class="img-fluid negative-mt-8 banner" style="z-index: -1000;">
<div class="container-fluid negative-mt-8" id="mask" style="z-index: -1000;"></div>
<div class="container-fluid p-1 d-flex justify-content-center text-center">
    <div class="col-sm-6 col-md-6 col-lg-6">
        <h3 class="text-white">Eten bestellen in</h3>
        @include('partials.search')
    </div>
</div>
<div class="container-fluid bg-light under-banner pb-5">
    @include('partials.status')
    <div class="container mb-5">
        <div class="row justify-content-center">
            <div class="col-md-5 mt-4 border-right shadow-sm bg-light p-3">
                <h4 class="pb-2"><b>Mijn Gegevens</b></h4>
                <div><b>Naam: </b>{{ Auth::user()->first_name.' '.Auth::user()->last_name }}</div>
                <div><b>Email: </b>{{ Auth::user()->email }}</div>
                <div><b>Telefoon: </b>{{ Auth::user()->phone }}</div>
                <div><b>Adres: </b>{{ Auth::user()->address }}</div>
                <div><b>Postcode: </b>{{ Auth::user()->zipcode }}</div>
                <div><b>Plaats: </b>{{ Auth::user()->city }}</div>
                <a href="{{ route('user.edit', Auth::id()) }}" class="btn btn-primary mt-3">Gegevens Wijzigen</a>
                <a href="{{ route('myPassword') }}" class="btn btn-secondary mt-3">Wachtwoord Wijzigen</a>
            </div>
            <div class="col-md-2 mt-4 border-left">
                @include('partials.usermenu')
            </div>
        </div>
    </div>
    <div class="container-fluid bg-light pb-5 mb-5"></div>
</div>
@endsection





