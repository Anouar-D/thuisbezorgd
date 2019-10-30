@extends('layouts.app')

@section('content')
    <?php
        $i = 1;
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
                        <div class="card-header text-center bg-orange">Winkelwagen</div>
                        <div class="card-body">
                            @if (session('status'))
                                <div class="alert alert-success" id="disappear" role="alert">
                                    {{ session('status') }}
                                </div>
                            @endif
                            @if($cart)
                                @foreach($cart->items as $item)
                                    <p>
                                        <b>Restaurant: </b>{{$item['item']->restaurant->title}} <b class="ml-2">Product: </b>{{ $item['item']->name }}
                                        <span class="float-right">
                                            <b>Aantal: </b>{{ $item['qty'] }}x
                                            <b class="ml-5 pr-3">Prijs: </b>&euro;{{ number_format($item['price'], 2) }}
                                        </span>
                                    </p>
                                    @if($i < count($cart->items))
                                        <hr>
                                        <?php $i++; ?>
                                    @endif
                                @endforeach
                                <div class="float-right border-top">
                                    <b>Totale Aantal: </b>{{ $cart->totalQty }}x
                                    <b class="ml-3">Totale Prijs: </b>&euro;{{ number_format($cart->totalPrice, 2) }}
                                </div>
                                <form action="{{ route('order.store') }}" method="POST">
                                    @csrf
                                    <?php $items = []; ?>
                                    @foreach ($cart->items as $item)
                                        <?php 
                                            $item = [
                                                'consumable_id' => $item['item']['id'],
                                                'restaurant_id' => $item['item']['restaurant_id'],
                                                'name' => $item['item']['name'],
                                                'category' => $item['item']['category'],
                                                'price' => $item['item']['price'],
                                                'qty' => $item['qty'],
                                            ];
                                            array_push($items, $item);
                                        ?>
                                    @endforeach
                                    <input type="hidden" name="items" value="{{ serialize($items) }}">
                                    <input type="hidden" name="totalQty" value="{{ $cart->totalQty }}">
                                    <input type="hidden" name="totalPrice" value="{{ $cart->totalPrice }}">
                                    <button type="submit" class="btn btn-primary">Bestellen</button>
                                </form>
                            @else
                                u heeft nog niks in uw winkelwagen.
                            @endif
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="container-fluid bg-light pb-5 mb-5"></div>
    </div>
@endsection
