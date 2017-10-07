@extends('layouts.app')

@section('content')
        <div class="container text-center">
            <h3>Zadanie</h3><br>
            <?php
                if(DB::connection()->getDatabaseName())
                {
                   echo "connected successfully to database ".DB::connection()->getDatabaseName();
                }
                else
                {
                    echo "not connected to db";
                }

                try {
                    DB::connection()->getPdo();
                } catch (\Exception $e) {
                    die("Could not connect to the database.  Please check your configuration.");
                    }
            ?>
            <p>Navrhnete IS hotelu, ktery by poskytoval prehled o dostupnosti pokoju, udaje o hostech, jejich 
                pobytech v hotelu, pozadavcich na sluzby, platby za pokoje, atd. Zakaznici mohou provadet 
                rezervace pokoju (tim padem musi zadat sve osobni udaje). Klient si muz
                e v ramci jedne 
                rezervace objednat vice pokoju, treba i na jine datum. Hotelu staci mit informace pouze o 
                jednom klientovi, ktery zastituje cely pobyt v hotelu (o ostatnich ucastnicich pobytu nemusi 
                byt dostupne zadne informace). Pobyt muze byt vytvoren na
                zaklade rezervace, nebo k 
                rezervaci pokoje vubec nemusi dojit, pokud klient prijde primo na recepci hotelu. Jednotlive 
                typy pokoju maji ruzne ceny, cena pokoje se navic muze lisit podle obdobi (turisticka sezona), 
                na ktere si klient pokoj objednava. Cena 
                pokoje se zaroven odviji od toho, zda si host pokoj 
                rezervuje dopredu, nebo az na miste. Klient si muze priobjednat k danemu pobytu sluzby v 
                hotelu navic, jako napr. pronajem bazenu, a to i vicekrat. IS dale bude schopen evidovat 
                skutecne absolvovane pobyt
                y 
                -
                tj. ktere pokoje klient od kdy do kdy obyval a jake sluzby 
                skutecne  vyuzil  (od  x  do  x  naKteremPokoji).  U  kazdeho  pobytu  je  evidovano,  ktery 
                zamestnanec prevzal platbu za pobyt.
                </p>
        </div><br>
@endsection