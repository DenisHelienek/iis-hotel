@extends('layouts.app')

@section('content')
    <div class="container text-center">    
        <h1>Rezervacia</h1>
        <div class="container">
            <?php
                $meno = $data[0]['jmeno'];
                $priezvisko = $data[0]['prijmeni'];
                echo "<h3> Objednavatel: $meno $priezvisko </h3>";
            ?>

          <table class="table">
            <thead>
              <tr>
                <th>Izba</th>
                <th>Od</th>
                <th>Do</th>
                <th>Cena</th>
              </tr>
            </thead>
            <tbody>
              <tr align="left">
                <td><?php echo $room[0]['popis']; ?></td>
                {!! Form::open(array('url' => 'reservation')) !!}
                <?php echo Form::token(); ?>
                    <td><input id="od" type="date" name="od" value="" required autofocus></td>
                    <td><input id="do" type="date" name="do" value="" required autofocus></td>
                {!! Form::close() !!}
                <td>
                    <?php $c1 = $room[0]['cena_zakladni']; $c2 = $room[0]['sezonni_priplatek']; $c3 = $room[0]['sleva_pri_rezervaci'];
                    $final = $c1 + $c2 - $c3;
                    echo $final; ?>
                </td>            
              </tr>
            </tbody>
          </table>
        </div>
    </div><br>
@endsection
 