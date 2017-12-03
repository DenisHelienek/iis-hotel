@extends('layouts.app')

@section('content')
    <div class="container text-center">    
 	<h1>Detail objednavky</h1>
		<table class="table">
		  	<thead>
		  	  	<tr>
		  	  	 	<th scope="col">Variabilny symbol </th>
		  	  	 	<th scope="col">Vytvorenie objednavky </th>
		  	  	 	<th scope="col">Zaplatene </th>
		  	  	 	<th scope="col">Platbu prijal </th>
		  	  	 	<th scope="col">Konecna cena </th>
		  	  	</tr>
		  	</thead>
		  	<tbody>
		  	  	<?php 
		  	  	$len = count($data);
		  	  	for ($i=0; $i < $len; $i++) {
		  	  		echo "<tr align=\"left\">";
		  	  		foreach ($data[$i] as $key => $value) {

		  	  			if ($key == "vs") {
		  	  				$id = $value;
		  	  			}

		  	  			if ($key == "host_id") {
		  	  				continue;
		  	  			}

		  	  			if ($key == "zaplaceno") {
		  	  				if (is_null($value)) {
		  	  					echo "<td> nie </td>";
		  	  					continue;
		  	  				}
		  	  				else
		  	  				{
		  	  					echo "<td> $value </td>";
		  	  					continue;
		  	  				}
		  	  			}

		  	  			if ($key == "platbu_prijal") {
		  	  				if (is_null($value)) {
		  	  					echo "<td> - </td>";
		  	  					continue;
		  	  				}
		  	  				else
		  	  				{
		  	  					echo "<td> $value </td>";
		  	  					continue;
		  	  				}
		  	  			}

		  	  			echo "<td> $value </td>";
		  	  		}
		  	  		echo "</tr>";
		  	  	}
		  	  	?>
		  	</tbody>
		</table>       

 	<h2>Detaily rezervacii v objednavke</h2>
		<table class="table">
		  	<thead>
		  	  	<tr>
		  	  	 	<th scope="col">Izba </th>
		  	  	 	<th scope="col">Rezervacia od </th>
		  	  	 	<th scope="col">Rezervacia do </th>
		  	  	 	<th scope="col">Prihlasenie </th>
		  	  	 	<th scope="col">Odhlasenie </th>
		  	  	 	<th scope="col">Pocet osob </th>
		  	  	 	<th scope="col">Storno </th>
		  	  	</tr>
		  	</thead>
		  	<tbody>
		  	  	<?php 
		  	  	$len = count($data2);
		  	  	for ($i=0; $i < $len; $i++) {
		  	  		echo "<tr align=\"left\">";
		  	  		foreach ($data2[$i] as $key => $value) {
		  	  			if ($data[0]['vs'] != $data2[$i]['objednavka_id'])
		  	  			{
		  	  				continue;
		  	  			}

		  	  			if ($key == 'id') {
		  	  				continue;
		  	  			}
		  	  			
		  	  			if ($key == 'objednavka_id') {
		  	  				continue;
		  	  			}

		  	  			if ($key == "nastoupeni") {
		  	  				if (is_null($value)) {
		  	  					echo "<td> nie </td>";
		  	  					continue;
		  	  				}
		  	  				else
		  	  				{
		  	  					echo "<td> $value </td>";
		  	  					continue;
		  	  				}
		  	  			}

		  	  			if ($key == "odhlaseni") {
		  	  				if (is_null($value)) {
		  	  					echo "<td> nie </td>";
		  	  					continue;
		  	  				}
		  	  				else
		  	  				{
		  	  					echo "<td> $value </td>";
		  	  					continue;
		  	  				}
		  	  			}

		  	  			if ($key == "zruseno") {
		  	  				if ($value == 0) {
		  	  					echo "<td> nezrusene </td>";
		  	  					continue;
		  	  				}
		  	  				else
		  	  				{
		  	  					echo "<td> zrusene </td>";
		  	  					continue;
		  	  				}
		  	  			}

		  	  			if ($key == "pokoj_id") {
		  	  				if ($value == 0) {
		  	  					echo "<td> Izba BUSINESS </td>";
		  	  					continue;
		  	  				}
		  	  				else if ($value == 1)
		  	  				{
		  	  					echo "<td> Izba FAMILY </td>";
		  	  					continue;
		  	  				}
		  	  				else
		  	  				{
		  	  					echo "<td> Izba RELAX </td>";
		  	  					continue;		  	  					
		  	  				}
		  	  			}

		  	  			echo "<td> $value </td>";
		  	  		}
		  	  		echo "</tr>";
		  	  	}
		  	  	?>
		  	</tbody>
		</table>  
 	<h2>Detaily sluzieb v objednavke</h2>
		<table class="table">
		  	<thead>
		  	  	<tr>
		  	  	 	<th scope="col">Nazov </th>
		  	  	 	<th scope="col">Popis </th>
		  	  	 	<th scope="col">Cena </th>
		  	  	</tr>
		  	</thead>
		  	<tbody>
		  	  	<?php 
		  	  	$len = count($data3);
		  	  	for ($i=0; $i < $len; $i++) {
		  	  		echo "<tr align=\"left\">";
		  	  		foreach ($data3[$i] as $key => $value) {
		  	  			if ($key == 'id') {
		  	  				continue;
		  	  			}

		  	  			echo "<td> $value </td>";
		  	  		}
		  	  		echo "</tr>";
		  	  	}
		  	  	?>
		  	</tbody>

		</table>  

    </div>
@endsection
 