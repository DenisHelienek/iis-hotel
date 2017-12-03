@extends('layouts.app')

@section('content')
    <div class="container text-center">    
 	<h1>Profil</h1>
		<table class="table">
		  	<thead>
		  	  	<tr>
		  	  	 	<th scope="col">Meno </th>
		  	  	 	<th scope="col">Priezvisko </th>
		  	  	 	<th scope="col">Datum narodenia </th>
		  	  	 	<th scope="col">Email </th>
		  	  	 	<th scope="col">Telefon </th>
		  	  	 	<th scope="col">Adresa </th>
		  	  	 	<th scope="col">Rola </th>
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
		  	  						echo "<td> Klient  </td>";
		  	  						break;

		  	  					case '1':
		  	  						echo "<td> Zamestnanec  </td>";
		  	  						break;

		  	  					case '2':
		  	  						echo "<td> Manazer </td> ";
		  	  						break;		  	  						
		  	  					
		  	  					default:
		  	  						break;
		  	  				}
		  	  				continue;
		  	  			}

		  	  			if ($key == "id") {
		  	  				$id = $value; 
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
 