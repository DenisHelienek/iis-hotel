@extends('layouts.app')

@section('content')
    <div class="container text-center">    
        <h1>Rezervacia</h1>
        <div class="container">
            <?php
                $meno = $data[0]['jmeno'];
                $priezvisko = $data[0]['prijmeni'];
                echo "<h3> Objednavatel: $meno $priezvisko </h3>";
                $c1 = $room[0]['cena_zakladni'];
                $c2 = $room[0]['sezonni_priplatek'];
                $c3 = $room[0]['sleva_pri_rezervaci'];
                $rom = $room[0]['id'];
                $final = $c1 + $c2 - $c3;
            ?>

        <?php echo Form::open(array('url' => 'post'.$rom, 'method' => 'post')); ?>
          <table class="table">
            <thead>
              <tr>
                <th>Izba</th>
                <th>Od</th>
                <th>Do</th>
                <th>Pocet osob</th>
                <th>Cena</th>
              </tr>
            </thead>
            <tbody>
              <tr align="left">
                <td><?php echo $room[0]['popis']; ?></td>
                <td><?php echo Form::date('od'); ?></td>
                <td><?php echo Form::date('do'); ?></td>
                <td><?php echo Form::text('pocet'); ?></td>
                <td><?php echo $final; ?></td>            
              </tr>
            </tbody>
          </table>
          <button type="submit" class="btn btn-success">Vytvorit objednavku</button>
         {{ Form::close() }}

         <?php $flag;
         if ($flag != 1) {
             echo "<p class=\"text-danger\">$flag</p>";
         }

          ?>
        </div>
    </div><br>
@endsection
 