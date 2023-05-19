@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>{{ $hotel->name }}</h1>
        
        <div class="hotel-details">
            <p>Šalis: {{ $hotel->country->name }}</p>
            <p>Kaina: {{ $hotel->price }}</p>
            <p>Nuotrauka: <img src="{{ $hotel->image }}" alt="Viešbučio nuotrauka"></p>
            <!-- Čia įterpiate papildomą informaciją apie viešbutį -->
            <!-- Priklausomai nuo jūsų poreikių -->
        </div>
        
        <!-- Pasirinkti viešbutį -->
        <form action="{{ route('hotels.select', $hotel->id) }}" method="POST">
            @csrf
            <button type="submit">Pasirinkti viešbutį</button>
        </form>
    </div>
@endsection
