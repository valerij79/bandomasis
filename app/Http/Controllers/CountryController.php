<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Country;

class CountryController extends Controller
{
    public function index()
    {
        $countries = Country::all();
        return view('countries.index', compact('countries'));
    }

    public function create()
    {
        return view('countries.create');
    }

    public function store(Request $request)
    {
        $country = new Country();
        $country->pavadinimas = $request->input('pavadinimas');
        $country->sezonolaikas = $request->input('sezonolaikas');
        $country->save();

        return redirect()->route('countries.index')->with('success', 'Šalis sėkmingai pridėta.');
    }

    public function edit($id)
    {
        $country = Country::find($id);
        return view('countries.edit', compact('country'));
    }

    public function update(Request $request, $id)
    {
        $country = Country::find($id);
        $country->pavadinimas = $request->input('pavadinimas');
        $country->sezonolaikas = $request->input('sezonolaikas');
        $country->save();

        return redirect()->route('countries.index')->with('success', 'Šalis sėkmingai atnaujinta.');
    }

    public function destroy($id)
    {
        $country = Country::find($id);
        $country->delete();

        return redirect()->route('countries.index')->with('success', 'Šalis sėkmingai pašalinta.');
    }
}
