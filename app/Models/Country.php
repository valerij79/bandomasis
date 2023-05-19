<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;



class Country extends Model
{
    public static function createCountry($pavadinimas, $sezonolaikas)
{
    $country = new Country();
    $country->pavadinimas = $pavadinimas;
    $country->sezonolaikas = $sezonolaikas;
    $country->save();

    return $country;
}

    // use HasFactory;
    // protected $fillable = [
    //     'name',
    //     'season',
    // ];

    // public function hotels()
    // {
    //     return $this->hasMany(Hotel::class);
    // }
}
