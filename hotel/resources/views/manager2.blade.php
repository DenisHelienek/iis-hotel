@extends('layouts.app')

@section('content')
    <div class="container text-center">    
        
    <div class="container text-center">    
        <h1>Sprava izieb</h1>
		<table class="table">
		  	<thead>
		  	  	<tr>
		  	  	 	<th scope="col">Popis </th>
		  	  	 	<th scope="col">Kapacita </th>
		  	  	 	<th scope="col">Zakladna cena </th>
		  	  	 	<th scope="col">Sezonny priplatok </th>
		  	  	 	<th scope="col">Zlava pri rezervacii </th>
		  	  	</tr>
		  	</thead>
		  	<tbody>
		  	  	<?php
		  	  	$len = count($data);
		  	  	for ($i=0; $i < $len; $i++) {
		  	  		echo "<tr align=\"left\">"; 
		  	  		foreach ($data[$i] as $key => $value) {
		  	  			
		  	  			echo "<td> $value </td>";
		  	  		}
		  	  		echo "</tr>";
		  	  	}
		  	  	?>
		  	</tbody>
		</table>

    </div>
@endsection
 