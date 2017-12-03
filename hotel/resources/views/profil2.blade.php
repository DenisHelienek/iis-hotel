@extends('layouts.app')

@section('content')
    <div class="container text-center">    
 	<h1>Objednavky</h1>
		<table class="table">
		  	<thead>
		  	  	<tr>
		  	  	 	<th scope="col">Variabilny symbol </th>
		  	  	 	<th scope="col">Vytvorenie objednavky </th>
		  	  	 	<th scope="col">Zaplatene </th>
		  	  	 	<th scope="col">Platbu prijal </th>
		  	  	 	<th scope="col">Konecna cena </th>
		  	  	 	<th scope="col">Detail </th>
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
		  	  		echo "<td>";
		  	  		?> <a href="{{ url('profil/d/'.$id) }}"> <?php
		  	  		echo "<i class=\"fa fa-plus\"></i></td>";
		  	  		echo "</tr>";
		  	  	}
		  	  	?>
		  	</tbody>
		</table>       

    </div>
@endsection
 