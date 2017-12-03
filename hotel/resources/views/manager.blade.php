@extends('layouts.app')

@section('content')
    <div class="container text-center">    
        
    <div class="container text-center">    
        <h1>Sprava uzivatelov</h1>
		<table class="table">
		  	<thead>
		  	  	<tr>
		  	  	 	<th scope="col">Meno </th>
		  	  	 	<th scope="col">Priezvisko </th>
		  	  	 	<th scope="col">Email </th>
		  	  	 	<th scope="col">Telefon </th>
		  	  	 	<th scope="col">Adresa </th>
		  	  	 	<th scope="col">Rola </th>
		  	  	 	<th scope="col">Odstranit </th>
		  	  	</tr>
		  	</thead>
		  	<tbody>
		  	  	<?php 
		  	  	$len = count($data);
		  	  	for ($i=0; $i < $len; $i++) {
		  	  		echo "<tr align=\"left\">";
		  	  		$id = 100; 
		  	  		foreach ($data[$i] as $key => $value) {
		  	  			if ($key == "rola") {
		  	  				switch ($value) {
		  	  					case '0':
		  	  						echo "<td> Klient  ";
		  	  						break;

		  	  					case '1':
		  	  						echo "<td> Zamestnanec  ";
		  	  						break;

		  	  					case '2':
		  	  						echo "<td> Manazer  ";
		  	  						break;		  	  						
		  	  					
		  	  					default:
		  	  						break;
		  	  				}
		  	  				$new_key = $data[$i]["id"];
		  	  				?> <a href="{{ url('manager/i/'.$new_key) }}"> <?php
		  	  				echo "<i class=\"fa fa-arrow-up\"></i> </a>";
		  	  				?> <a href="{{ url('manager/d/'.$new_key) }}"> <?php
		  	  				echo "<i class=\"fa fa-arrow-down\"></i> </a> </td>";
		  	  				continue;
		  	  			}

		  	  			if ($key == "id") {
		  	  				$id = $value; 
		  	  				continue;
		  	  			}

		  	  			echo "<td> $value </td>";
		  	  		}

		  	  		echo "<td>";
		  	  		?> <a href="{{ url('manager/'.$id) }}"> <?php
		  	  		echo "<i class=\"fa fa-remove\"></i> </a> </td>";

		  	
		  	  		echo "</tr>";
		  	  	}
		  	  	?>
		  	</tbody>
		</table>

    </div>
@endsection
 