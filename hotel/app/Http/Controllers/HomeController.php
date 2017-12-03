<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Collective\Html\HtmlServiceProvider;
use Collective\Html\FormFacade;
use Collective\Html\HtmlFacade;
use App\Objednavka;
use App\Uzivatel;
use App\Pokoj;
use App\Rezervacia;
use Eloquent;
use App\VSluzba;
use App\Sluzba;


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
        $room = Pokoj::where('id', '=', $idr)->select(['popis', 'kapacita', 'cena_zakladni', 'sezonni_priplatek', 'sleva_pri_rezervaci', 'id'])->get()->toArray();
        $flag = 1;

        return view('reservation', ['data' => $data, 'room' => $room, 'flag' => $flag]);       
    }

    public function post(Request $request, $room, $id)
    {
        $r = $request->toArray();
        $kap = Pokoj::where('id', '=', $room)->select(['kapacita'])->get()->toArray();
        $price = Pokoj::where('id', '=', $room)->select(['popis', 'kapacita', 'cena_zakladni', 'sezonni_priplatek', 'sleva_pri_rezervaci', 'id'])->get()->toArray();
        $vs = Objednavka::select(['vs'])->orderBy('vs', 'desc')->first()->toArray();

        if ($kap[0]['kapacita'] < $r['pocet']) {
            $data = Uzivatel::select(['jmeno', 'prijmeni', 'email', 'telefon', 'adresa', 'rola', 'id'])->get()->toArray();
            $room = Pokoj::where('id', '=', $room)->select(['popis', 'kapacita', 'cena_zakladni', 'sezonni_priplatek', 'sleva_pri_rezervaci', 'id'])->get()->toArray();
            $flag = "Pocet osob je vacsi ako kapacita izby!";
            return view('reservation', ['data' => $data, 'room' => $room, 'flag' => $flag]);                   
        }

        /*$from = min($r['od'], $r['do']);
        $till = max($r['od'], $r['do']);

        $i = Rezervacia::where('pokoj_id', '=', $room)->where('rezervace_od', '>', $from)->where('rezervace_od', '>=', $till)->get()->toArray();
        $x = Rezervacia::where('pokoj_id', '=', $room)->where('rezervace_do', '>=', $from)->where('rezervace_do', '>', $till)->get()->toArray();
        $z = Rezervacia::where('pokoj_id', '=', $room)->where('rezervace_od', '<=', $from)->where('rezervace_do', '>=', $till)->get()->toArray();

        if (empty($i)) {
            echo "good i";
            if (empty($x)) {
                echo "good x";
                if (empty($z)) {
                    echo "good z";
                }
            }
        }

        dd($i);*/

        /*Eloquent::unguard();
        */
        $c1 = $price[0]['cena_zakladni'];
        $c2 = $price[0]['sezonni_priplatek'];
        $c3 = $price[0]['sleva_pri_rezervaci'];
        $final = $c1 + $c2 - $c3;

        $obj = new Objednavka;
        $rez = new Rezervacia;

        $data['vs'] = $vs['vs'] + 1;
        $data['vytvoreni_objednavky'] = date("Y-m-d");
        $data['konecna_cena'] = $final;
        $data['host_id'] = $id;

        $data2['id'] = $vs['vs'] + 1;
        $data2['objednavka_id'] = $data['vs'];
        $data2['pokoj_id'] = $room;
        $data2['rezervace_od'] = $r['od'];
        $data2['rezervace_do'] = $r['do'];
        $data2['pocet_osob'] = $r['pocet'];

        $obj->fill($data);
        $rez->fill($data2);
        $obj->save();
        $rez->save();


        //$rez->save();*/

        /*Objednavka::with(['rezervacie', 'rezervacie.pokoj'])->insert(
            ['vs' => '1', 'vytvoreni_objednavky' => date("Y-m-d"), 'konecna_cena' => $final,'host_id' => '0'] );
        */
        
        /*Rezervacia::insert(
            ['id' => '2',  'objednavka_id' => '1', 'pokoj_id' => $room, 'rezervace_od' => $r['od'], 'rezervace_do' => $r['do'], 'pocet_osob' => $r['pocet']]
        );*/

        return view('domov');
    }

    public function profil($id)
    {
        $data = Uzivatel::where('id', '=', $id)->select(['jmeno', 'prijmeni', 'datum_narozeni', 'email', 'telefon', 'adresa', 'rola', 'id'])->get()->toArray();

        return view('profil', ['data' => $data]);
    }

    public function profil2($id)
    {
        $data = Objednavka::where('host_id', '=', $id)->select()->get()->toArray();

        return view('profil2', ['data' => $data]);
    }

    public function detail($id)
    {
        $data = Objednavka::where('vs', '=', $id)->select()->get()->toArray();
        $data2 = Rezervacia::select()->get()->toArray();
        $data3 = VSluzba::where('objednavka_id', '=', $id)->select()->get()->toArray();

        $data3 = Sluzba::where('id', '=', $data3[0]['sluzba_id'])->get()->toArray();

        return view('detail', ['data' => $data, 'data2' => $data2, 'data3' => $data3]);
    }

    public function reception()
    {
        $data = Uzivatel::select(['jmeno', 'prijmeni', 'datum_narozeni', 'email', 'telefon', 'adresa', 'rola', 'id'])->get()->toArray();

        return view('reception', ['data' => $data]);
    }

    public function reception2()
    {
        $data = Uzivatel::select(['jmeno', 'prijmeni', 'datum_narozeni', 'email', 'telefon', 'adresa', 'rola', 'id'])->get()->toArray();

        return view('reception2', ['data' => $data]);
    }

    public function postres(Request $request)
    {
        $r = $request->toArray();

        Uzivatel::insert(
            ['jmeno' => $r['jmeno'], 'prijmeni' => $r['prijmeni'], 'datum_narozeni' => $r['datum_narozeni'], 'email' => $r['email'], 'telefon' => $r['telefon'], 'adresa' => $r['adresa']]);

        return view('reception3');        
    }
   
    public function reception3()
    {
        $data = Uzivatel::select(['jmeno', 'prijmeni', 'datum_narozeni', 'email', 'telefon', 'adresa', 'rola', 'id'])->get()->toArray();

        return view('reception3', ['data' => $data]);
    }

    public function book(Request $request, $id)
    {
        $r = $request->toArray();

        $room = $r['pokoj_id'];

        $kap = Pokoj::where('id', '=', $room)->select(['kapacita'])->get()->toArray();
        $price = Pokoj::where('id', '=', $room)->select(['popis', 'kapacita', 'cena_zakladni', 'sezonni_priplatek', 'sleva_pri_rezervaci', 'id'])->get()->toArray();
        $vs = Objednavka::select(['vs'])->orderBy('vs', 'desc')->first()->toArray();

        if ($kap[0]['kapacita'] < $r['pocet']) {
            $data = Uzivatel::select(['jmeno', 'prijmeni', 'email', 'telefon', 'adresa', 'rola', 'id'])->get()->toArray();
            $room = Pokoj::where('id', '=', $room)->select(['popis', 'kapacita', 'cena_zakladni', 'sezonni_priplatek', 'sleva_pri_rezervaci', 'id'])->get()->toArray();
            $flag = "Pocet osob je vacsi ako kapacita izby!";
            return view('reception3', ['data' => $data]);                   
        }

        $c1 = $price[0]['cena_zakladni'];
        $c2 = $price[0]['sezonni_priplatek'];
        $c3 = $price[0]['sleva_pri_rezervaci'];
        $final = $c1 + $c2;

        $obj = new Objednavka;
        $rez = new Rezervacia;

        $data['vs'] = $vs['vs'] + 1;
        $data['vytvoreni_objednavky'] = date("Y-m-d");
        $data['konecna_cena'] = $final;
        $data['host_id'] = $id;

        $data2['id'] = $vs['vs'] + 1;
        $data2['objednavka_id'] = $data['vs'];
        $data2['pokoj_id'] = $room;
        $data2['rezervace_od'] = $r['rezervace_od'];
        $data2['rezervace_do'] = $r['rezervace_do'];
        $data2['pocet_osob'] = $r['pocet'];

        $obj->fill($data);
        $rez->fill($data2);
        $obj->save();
        $rez->save();

        return view('domov');        
    }

}
