@extends('layouts.app')

@section('content')
<?php
    $threshold = false;
    $totalPrice = 0;
    $totalQty = 0;
    foreach($orders as $order){
        if($order){
            $threshold = true;
        }
    }
?>
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
                <h4><b>Mijn Bestellingen</b></h4>
                <div class="bg-white border border-dark p-3">
                    <table>
                        @if($threshold)
                            @foreach ($orders as $order)
                                <?php $totalPrice = 0; ?>
                                <th><b>Ordernummer: </b>{{ $order->id }}</th>
                                    @foreach ($order->consumables as $consumable)
                                        <tr>
                                            <?php 
                                                $price = $consumable->price * $consumable->pivot->quantity;
                                                $totalPrice = $totalPrice + $price; 
                                            ?>
                                            <td>{{$consumable->name}}</td>
                                            <td class="float-right"><b>Prijs: </b>&euro;{{ number_format($price, 2) }}</td>
                                            <td class="pl-5"><b>Aantal: </b>{{ $consumable->pivot->quantity }}x</></li></td>
                                        </tr>
                                    @endforeach
                                @foreach ($order->consumables as $consumable)
                                    <?php $totalQty = $totalQty + $consumable->pivot->quantity ?>
                                @endforeach
                                <tr class="border-top border-bottom">
                                    <td></td>
                                    <td><b>Totale prijs: </b>&euro;{{ number_format($totalPrice, 2) }}</td>
                                    <td class="float-right"><b>Totaal: </b>{{ $totalQty }}x</span></td>
                                </tr>
                            @endforeach
                        @else
                            <tr>U heeft nog geen bestellingen geplaatst.</tr>
                        @endif
                    </table>
                </div>
            </div>
            <div class="col-md-2 mt-4 border-left">
                @include('partials.usermenu')
            </div>
        </div>
    </div>
    <div class="container-fluid bg-light pb-5 mb-5"></div>
</div>
@endsection
