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

    public function post(Request $request, $room)
    {
        $r = $request->toArray();
        $kap = Pokoj::where('id', '=', $room)->select(['kapacita'])->get()->toArray();
        $price = Pokoj::where('id', '=', $room)->select(['popis', 'kapacita', 'cena_zakladni', 'sezonni_priplatek', 'sleva_pri_rezervaci', 'id'])->get()->toArray();

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

        $c1 = $price[0]['cena_zakladni'];
        $c2 = $price[0]['sezonni_priplatek'];
        $c3 = $price[0]['sleva_pri_rezervaci'];
        $final = $c1 + $c2 - $c3;

        $obj = new Objednavka;
        $rez = new Rezervacia;

        $data['vs'] = '5';
        $data['vytvoreni_objednavky'] = date("Y-m-d");
        $data['konecna_cena'] = $final;
        $data['host_id'] = '0';

        $data2['id'] = '2';
        $data2['objednavka_id'] = $data['vs'];
        $data2['pokoj_id'] = $room;
        $data2['rezervace_od'] = $r['od'];
        $data2['rezervace_do'] = $r['do'];
        $data2['pocet_osob'] = $r['pocet'];

        $obj->fill($data);

        $obj->save();
        //$rez->save();*/

        /*Objednavka::with(['rezervacie', 'rezervacie.pokoj'])->insert(
            ['vs' => '1', 'vytvoreni_objednavky' => date("Y-m-d"), 'konecna_cena' => $final,'host_id' => '0'] );
        */
        
        /*Rezervacia::insert(
            ['id' => '2',  'objednavka_id' => '1', 'pokoj_id' => $room, 'rezervace_od' => $r['od'], 'rezervace_do' => $r['do'], 'pocet_osob' => $r['pocet']]
        );*/

        return view('kontakt');
    }
}
