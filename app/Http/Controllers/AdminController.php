<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Country;
use App\Models\Hotel;
use App\Models\Order;


class AdminController extends Controller
{
//     public function addCountry(Request $request)
// {
//     $validatedData = $request->validate([
//         'name' => 'required|string',
//         'season' => 'required|string',
//     ]);

//     $country = new Country();
//     $country->name = $request->input('name');
//     $country->season = $request->input('season');
//     $country->save();

//     return redirect()->back()->with('success', 'Šalis sėkmingai pridėta.');
// }

public function addCountry()
{
    // Iškviečiame createCountry() metodą su reikiamais duomenimis
    $country = Country::createCountry('Lietuva', 'Vasara');

    // Grąžiname nukreipimą į tinkamą puslapį arba pridėjimo patvirtinimo pranešimą
    return redirect()->back()->with('success', 'Šalis sėkmingai pridėta.');
}


public function deleteCountry($id)
{
    // Patikrinkite, ar yra šalis su nurodytu id
    $country = Country::find($id);

    if (!$country) {
        return response()->json(['message' => 'Šalis nerasta'], 404);
    }

    // Ištrynimas
    $country->delete();

    // Grąžinkite sėkmingo trynimo pranešimą
    return response()->json(['message' => 'Šalis sėkmingai ištrinta'], 200);
}


    public function editCountry($id)
    {
        // Šalies redagavimo veiksmai pagal id
    }

    public function addHotel()
{
    // Sukuriame naują viešbutį
    $hotel = new Hotel;
    $hotel->country_id = 1; // Šalies ID
    $hotel->name = 'Naujas viešbutis';
    $hotel->price = 100;

    // Išsaugome viešbutį
    $hotel->save();

    // Grąžiname sėkmingo pridėjimo pranešimą
    return response()->json(['message' => 'Viešbutis sėkmingai pridėtas'], 200);
}


public function deleteHotel($id)
{
    // Ieškome viešbučio pagal jo identifikatorių
    $hotel = Hotel::find($id);

    if ($hotel) {
        // Ištriname viešbutį iš duomenų bazės
        $hotel->delete();

        // Grąžiname pranešimą apie sėkmingai ištrintą viešbutį
        return redirect()->back()->with('success', 'Viešbutis sėkmingai ištrintas.');
    } else {
        // Grąžiname pranešimą, jei viešbutis nerastas
        return redirect()->back()->with('error', 'Viešbutis nerastas.');
    }
}


    public function editHotel($id)
{
    // Ieškome viešbučio pagal jo identifikatorių
    $hotel = Hotel::find($id);

    if ($hotel) {
        // Grąžiname vaizdą su redagavimo forma ir perduodame viešbučio duomenis
        return view('hotel.edit', compact('hotel'));
    } else {
        // Grąžiname pranešimą, jei viešbutis nerastas
        return redirect()->back()->with('error', 'Viešbutis nerastas.');
    }
}


    public function assignHotelToCountry($hotelId, $countryId)
{
    // Pasiimame viešbutį ir šalį iš duomenų bazės pagal ID
    $hotel = Hotel::find($hotelId);
    $country = Country::find($countryId);

    // Patikriname ar viešbutis ir šalis yra tinkami objektai
    if (!$hotel || !$country) {
        return response()->json(['message' => 'Nerastas viešbutis arba šalis'], 404);
    }

    // Priskiriame viešbutį šaliai
    $country->hotels()->save($hotel);

    // Grąžiname sėkmingo priskyrimo pranešimą
    return response()->json(['message' => 'Viešbutis sėkmingai priskirtas šaliai'], 200);
}


public function viewOrders()
{
    // Pasiimame užsakymų sąrašą iš duomenų bazės
    $orders = Order::all();

    // Grąžiname užsakymų sąrašą administracinės dalyje
    return view('admin.orders.index', ['orders' => $orders]);
}


public function confirmOrder($orderId)
{
    // Ieškome užsakymo pagal jo identifikatorių
    $order = Order::find($orderId);

    if ($order) {
        // Atnaujiname užsakymo patvirtinimo būseną
        $order->status = 'confirmed';
        $order->save();

        // Grąžiname pranešimą apie sėkmingą užsakymo patvirtinimą
        return redirect()->back()->with('success', 'Užsakymas sėkmingai patvirtintas.');
    } else {
        // Grąžiname pranešimą, jei užsakymas nerastas
        return redirect()->back()->with('error', 'Užsakymas nerastas.');
    }
}


    // Kitos funkcijos

    // ...

}

