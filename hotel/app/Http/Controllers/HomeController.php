<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Objednavka;
use App\Uzivatel;
use App\Pokoj;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('domov');
    }

    public function manager()
    {
        //$order = Objednavka::with(['rezervacie', 'rezervacie.pokoj'])->where('host_id',1)->select(['vs', 'host_id'])->get()->toArray();
        //dd($order);
        //return view('manager')->with('order', $order);

        /*$data = array(
            Uzivatel::with(['uzivatel'])->pluck('prijmeni'),
            Uzivatel::with(['uzivatel'])->pluck('jmeno'),
            Uzivatel::with(['uzivatel'])->pluck('email'),
            Uzivatel::with(['uzivatel'])->pluck('telefon'),
            Uzivatel::with(['uzivatel'])->pluck('adresa'),
            Uzivatel::with(['uzivatel'])->pluck('rola')
        );*/

        $data = Uzivatel::select(['jmeno', 'prijmeni', 'email', 'telefon', 'adresa', 'rola', 'id'])->get()->toArray();

        return view('manager', ['data' => $data]);

        /*$data['text'] = 'sdfsdgsfgs';
        $data['option'] = 12;
        $data['nic'] = 'nic';

        $premen = new Objednavka;
        $premen->fill($data);

        $premen->save();*/

    }

    public function manager2()
    {
        $data = Pokoj::select(['popis', 'kapacita', 'cena_zakladni', 'sezonni_priplatek', 'sleva_pri_rezervaci'])->get()->toArray();

        return view('manager2', ['data' => $data]);
    }

    public function manager_change($id)
    {
        Uzivatel::where('id', '=', $id)->delete();
        $data = Uzivatel::select(['jmeno', 'prijmeni', 'email', 'telefon', 'adresa', 'rola', 'id'])->get()->toArray();

        return view('manager', ['data' => $data]);
    }

    public function manager_i($id)
    {
        $rola = Uzivatel::where('id', '=', $id)->select('rola')->get()->toArray();

        if ($rola[0]["rola"] == 2) {
            $data = Uzivatel::select(['jmeno', 'prijmeni', 'email', 'telefon', 'adresa', 'rola', 'id'])->get()->toArray();
            return view('manager', ['data' => $data]);
        }
        

        Uzivatel::where('id', '=', $id)->increment('rola');
        $data = Uzivatel::select(['jmeno', 'prijmeni', 'email', 'telefon', 'adresa', 'rola', 'id'])->get()->toArray();

        return view('manager', ['data' => $data]);
    }

    public function manager_d($id)
    {
        $rola = Uzivatel::where('id', '=', $id)->select('rola')->get()->toArray();

        if ($rola[0]["rola"] == 0) {
            $data = Uzivatel::select(['jmeno', 'prijmeni', 'email', 'telefon', 'adresa', 'rola', 'id'])->get()->toArray();
            return view('manager', ['data' => $data]);
        }

        Uzivatel::where('id', '=', $id)->decrement('rola');
        $data = Uzivatel::select(['jmeno', 'prijmeni', 'email', 'telefon', 'adresa', 'rola', 'id'])->get()->toArray();

        return view('manager', ['data' => $data]);
    }

    public function reservation($idr)
    {
        $data = Uzivatel::select(['jmeno', 'prijmeni', 'email', 'telefon', 'adresa', 'rola', 'id'])->get()->toArray();
        $room = Pokoj::where('id', '=', $idr)->select(['popis', 'kapacita', 'cena_zakladni', 'sezonni_priplatek', 'sleva_pri_rezervaci'])->get()->toArray();

        return view('reservation', ['data' => $data, 'room' => $room]);       
    }

    public function post()
    {
        
    }
}
