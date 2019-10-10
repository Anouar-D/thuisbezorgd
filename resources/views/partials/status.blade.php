@if (session('status'))
    <div class="alert alert-success text-center" id="disappear" role="alert">
        {{ session('status') }}
    </div>
@endif
@if(session('error'))
    <div class="alert alert-danger text-center" id="disappear" role="alert">
        {{ session('error') }}
    </div>
@endif
@section('scripts')
    <script src="{{ asset('js/dissapear.js') }}"></script>
@endsection