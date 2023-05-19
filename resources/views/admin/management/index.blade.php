@extends('layouts.app')

@section('content')
    <h1>Admin Management</h1>

    <div>
        <h2>Countries</h2>
        <a href="{{ route('countries.create') }}">Create Country</a>

        <ul>
            @foreach ($countries as $country)
                <li>{{ $country->name }} - <a href="{{ route('countries.edit', $country->id) }}">Edit</a> | <a href="{{ route('countries.destroy', $country->id) }}">Delete</a></li>
            @endforeach
        </ul>
    </div>

    <div>
        <h2>Hotels</h2>
        <a href="{{ route('hotels.create') }}">Create Hotel</a>

        <ul>
            @foreach ($hotels as $hotel)
                <li>{{ $hotel->name }} - <a href="{{ route('hotels.edit', $hotel->id) }}">Edit</a> | <a href="{{ route('hotels.destroy', $hotel->id) }}">Delete</a></li>
            @endforeach
        </ul>
    </div>

    <div>
        <h2>Orders</h2>

        <ul>
            @foreach ($orders as $order)
                <li>{{ $order->id }} - {{ $order->user->name }} - {{ $order->hotel->name }} - {{ $order->status }}</li>
            @endforeach
        </ul>
    </div>
@endsection







{{-- @extends('layouts.admin')

@section('content')
    <div class="container">
        <h1>Valdymo sąsaja</h1>

        <ul>
            <li><a href="{{ route('admin.countries') }}">Šalys</a></li>
            <li><a href="{{ route('admin.hotels') }}">Viešbučiai</a></li>

            @if (Auth::user()->isAdmin())
                <li><a href="{{ route('admin.orders') }}">Užsakymai</a></li>
            @endif
        </ul>
    </div>
@endsection --}}
