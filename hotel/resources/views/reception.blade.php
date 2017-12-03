@extends('layouts.app')

@section('content')
    <div class="container text-center">    
        
        <h1>Udaje o hostoch</h1>

		<table class="table">
		  	<thead>
		  	  	<tr>
		  	  	 	<th scope="col">Meno </th>
		  	  	 	<th scope="col">Priezvisko </th>
		  	  	 	<th scope="col">Datum narodenia </th>
		  	  	 	<th scope="col">Email </th>
		  	  	 	<th scope="col">Telefon </th>
		  	  	 	<th scope="col">Adresa </th>
		  	  	 	<th scope="col">Detail </th>
		  	  	</tr>
		  	</thead>
		  	<tbody>
		  	  	<?php 
		  	  	$len = count($data);
		  	  	for ($i=0; $i < $len; $i++) {
		  	  		echo "<tr align=\"left\">";
		  	  		$id = 100; 
		  	  		foreach ($data[$i] as $key => $value) {

		  	  			if ($key == 'id') {
		  	  				$id = $value; 
		  	  				continue;
		  	  			}

		  	  			if ($key == 'rola') {
		  	  				continue;
		  	  			}

		  	  			echo "<td> $value </td>";
		  	  		}

		  	  		echo "<td>";
		  	  		?> <a href="{{ url('profil2/'.$id) }}"> <?php
		  	  		echo "<i class=\"fa fa-plus\"></i></td>";
		  	  		echo "</tr>";
		  	  	}
		  	  	?>
		  	</tbody>
		</table>    
    </div>
@endsection
 