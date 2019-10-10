<form action="{{ route('search') }}" method="POST" class="input-group md-form form-sm form-2 pl-0" id="search">
    @csrf
    <input class="form-control my-0 py-1 blue-border" type="text" name="search" placeholder="&#128205; Adres, b.v. Amsterdam 10" aria-label="Search">
    <div class="input-group-append" onclick="document.getElementById('search').submit();">
        <button class="input-group-text blue lighten-2" id="basic-text1">Zoek</button>
    </div>
</form>