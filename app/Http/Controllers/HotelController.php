<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Hotel;

class HotelController extends Controller
{
    public function index()
    {
        $hotels = Hotel::all();
        return view('hotels.index', compact('hotels'));
    }

    public function create()
    {
        return view('hotels.create');
    }

    public function store(Request $request)
    {
        $hotel = new Hotel();
        $hotel->pavadinimas = $request->input('pavadinimas');
        $hotel->kaina = $request->input('kaina');
        // kitų laukų pridėjimas
        $hotel->save();

        return redirect()->route('hotels.index')->with('success', 'Viešbutis sėkmingai pridėtas.');
    }

    public function edit($id)
    {
        $hotel = Hotel::find($id);
        return view('hotels.edit', compact('hotel'));
    }

    public function update(Request $request, $id)
    {
        $hotel = Hotel::find($id);
        $hotel->pavadinimas = $request->input('pavadinimas');
        $hotel->kaina = $request->input('kaina');
        // kitų laukų atnaujinimas
        $hotel->save();

        return redirect()->route('hotels.index')->with('success', 'Viešbutis sėkmingai atnaujintas.');
    }

    public function destroy($id)
    {
        $hotel = Hotel::find($id);
        $hotel->delete();

        return redirect()->route('hotels.index')->with('success', 'Viešbutis sėkmingai pašalintas.');
    }
}
