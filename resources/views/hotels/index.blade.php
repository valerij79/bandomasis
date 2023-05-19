@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>Viešbučių sąrašas</h1>
        
        <!-- Filtrų ir rūšiavimo galimybės -->
        <form action="{{ route('hotels.index') }}" method="GET">
            <!-- Filtras pagal šalį -->
            <div>
                <label for="country">Filtruoti pagal šalį:</label>
                <select name="country" id="country">
                    <option value="">Visos šalys</option>
                    <!-- Čia įterpiate šalių sąrašą iš duomenų bazės -->
                    @foreach ($countries as $country)
                        <option value="{{ $country->id }}">{{ $country->name }}</option>
                    @endforeach
                </select>
            </div>
            
            <!-- Rūšiavimas pagal kainą -->
            <div>
                <label for="sort">Rūšiuoti pagal kainą:</label>
                <select name="sort" id="sort">
                    <option value="asc">Didėjimo tvarka</option>
                    <option value="desc">Mažėjimo tvarka</option>
                </select>
            </div>
            
            <!-- Paieška pagal viešbučio pavadinimą -->
            <div>
                <label for="search">Paieška pagal pavadinimą:</label>
                <input type="text" name="search" id="search" placeholder="Įveskite pavadinimą">
                <button type="submit">Ieškoti</button>
            </div>
        </form>
        
        <!-- Viešbučių sąrašas -->
        <div class="hotels-list">
            @foreach ($hotels as $hotel)
                <div class="hotel">
                    <h3>{{ $hotel->name }}</h3>
                    <p>Šalis: {{ $hotel->country->name }}</p>
                    <p>Kaina: {{ $hotel->price }}</p>
                    <p>Nuotrauka: <img src="{{ $hotel->image }}" alt="Viešbučio nuotrauka"></p>
                    <!-- Čia įterpiate papildomą informaciją apie viešbutį -->
                    <!-- Priklausomai nuo jūsų poreikių -->
                </div>
            @endforeach
        </div>
    </div>
@endsection
