@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>Kelionės sąrašas</h1>
        
        <div class="filter">
            <form action="{{ route('trips.index') }}" method="GET">
                <div class="form-group">
                    <label for="country">Šalis:</label>
                    <select name="country" id="country" class="form-control">
                        <option value="">Visos šalys</option>
                        @foreach ($countries as $country)
                            <option value="{{ $country->id }}" {{ request('country') == $country->id ? 'selected' : '' }}>
                                {{ $country->name }}
                            </option>
                        @endforeach
                    </select>
                </div>
                <div class="form-group">
                    <label for="sort">Rūšiuoti pagal:</label>
                    <select name="sort" id="sort" class="form-control">
                        <option value="">Nerūšiuoti</option>
                        <option value="season" {{ request('sort') == 'season' ? 'selected' : '' }}>Sezoną</option>
                        <option value="price" {{ request('sort') == 'price' ? 'selected' : '' }}>Kainą</option>
                        <option value="hotel" {{ request('sort') == 'hotel' ? 'selected' : '' }}>Viešbutį</option>
                    </select>
                </div>
                <div class="form-group">
                    <button type="submit" class="btn btn-primary">Filtruoti</button>
                </div>
            </form>
        </div>
        
        <div class="trips-list">
            @foreach ($trips as $trip)
                <div class="trip">
                    <h2>{{ $trip->hotel->name }}</h2>
                    <p>Šalis: {{ $trip->hotel->country->name }}</p>
                    <p>Kaina: {{ $trip->hotel->price }}</p>
                    <p>Patvirtinta: {{ $trip->is_approved ? 'Taip' : 'Ne' }}</p>
                    <!-- Čia įterpiate papildomą informaciją apie kelionę -->
                    <!-- Priklausomai nuo jūsų poreikių -->
                </div>
            @endforeach
        </div>
    </div>
@endsection
