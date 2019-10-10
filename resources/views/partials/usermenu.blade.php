<h4 class="pb-2"><b>Mijn Account</b></h4>
<p class="user-link mt-0"><a href="{{ route('details') }}">Mijn Gegevens</a></p>
<p class="user-link mt-0"><a href="{{ route('myOrders') }}">Mijn Bestellingen</a></p>
<p class="user-link mt-0"><a href="{{ route('myRestaurant') }}">Mijn Restaurants</a></p>
<p class="user-link mt-0"><a href="{{ route('myPassword') }}">Wachtwoord Wijzigen</a></p>
<p class="user-link mt-0"><a href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">Uitloggen</a></p>
<form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
    @csrf
</form>