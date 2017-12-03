<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Pokoj;
use App\Sluzba;

class Nonauth extends Controller
{
    public function rooms()
    {
        $data = Pokoj::select(['popis', 'kapacita', 'cena_zakladni', 'sezonni_priplatek', 'sleva_pri_rezervaci'])->get()->toArray();

        return view('ubytovanie', ['data' => $data]);
    }

    public function wellness()
    {
        $data = Sluzba::select(['nazev', 'popis', 'cena'])->get()->toArray();

        return view('wellness', ['data' => $data]);
    }
}
