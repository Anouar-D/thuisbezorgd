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
                        <div class="card-header text-center bg-orange text-white">Product Toevoegen</div>
                        @include('partials.status')
                        <form action="{{ route('consumable.store') }}" method="post" class="card-body" enctype="multipart/form-data">
                            @csrf
                            <div class="form-group row">
                                <label for="title" class="col-md-4 col-form-label text-md-right">{{ __('Product Naam') }}</label>

                                <div class="col-md-6">
                                    <input id="title" type="text" class="form-control @error('title') is-invalid @enderror" name="title" value="{{ old('title') }}" required autocomplete="title">

                                    @error('title')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="category" class="col-md-4 col-form-label text-md-right">{{ __('Categorie') }}</label>

                                <div class="col-md-6">
                                    <select id="category" name="category" class="form-control @error('category') is-invalid @enderror" required>
                                        <option value="1">Drank</option>
                                        <option value="2">Hoofdgerecht</option>
                                        <option value="3">Snack</option>
                                    </select>

                                    @error('category')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="description" class="col-md-4 col-form-label text-md-right">{{ __('Beschrijving') }}</label>

                                <div class="col-md-6">
                                    <textarea id="description" type="text" class="form-control @error('description') is-invalid @enderror" name="description" required autocomplete="description">
                                        {{ old('description') }}
                                    </textarea>

                                    @error('description')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="price" class="col-md-4 col-form-label text-md-right">{{ __('Prijs') }}</label>

                                <div class="col-md-6">
                                    <input id="price" type="text" class="form-control @error('price') is-invalid @enderror" name="price" value="{{ old('price') }}" required autocomplete="price">

                                    @error('price')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>
                            <div class="form-group row mb-0">
                            <div class="col-md-6 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    {{ __('Toevoegen') }}
                                </button>
                            </div>
                        </div>
                        </form>                        
                    </div>
                </div>
            </div>
        </div>
        <div class="container-fluid bg-light pb-5 mb-5"></div>
    </div>
@endsection
