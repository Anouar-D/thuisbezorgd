<h4 class="pb-2"><b>Mijn Account</b></h4>
<p><a href="{{ route('details') }}">Mijn Gegevens</a></p>
<p><a href="{{ route('myOrders') }}">Mijn Bestellingen</a></p>
<p><a href="{{ route('myRestaurant') }}">Mijn Restaurants</a></p>
<p><a href="{{ route('myPassword') }}">Wachtwoord Wijzigen</a></p>
<a class="" href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">Uitloggen</a>
<form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
    @csrf
</form>