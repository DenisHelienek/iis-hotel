@extends('layouts.app')

@section('content')
  <div class="row">
 	<?php
 	$len = count($data);

 	for ($i=0; $i < $len; $i++) { ?>
  		<div class="col-md-4">
    		<div class="thumbnail"> <?php
 		foreach ($data[$i] as $key => $value) { 
 		
	 	if ($value == "Kupel") {
    		?> <img src="{{url('/img/tub.jpg')}}" alt="tub" style="width:100%">
    			<div class="caption">
          		<p><h1>Kupel vo virivke</h1></p>
         	<?php continue;
    	}
    	elseif ($value == "Sauna") {
    		?> <img src="{{url('/img/sau.jpg')}}" alt="sauna" style="width:100%"> 	
    			<div class="caption">
          		<p><h1>Sauna</h1></p>
         	<?php continue;
    	}
    	elseif ($value == "Biliard") {
     		?> <img src="{{url('/img/table.jpg')}}" alt="table" style="width:100%"> 
    			<div class="caption">
          		<p><h1>Biliard</h1></p>
         	<?php continue;
    	}
    	else
    	{
    		switch ($key) {
    			case 'popis':
    				echo "<li> Popis: $value </li>";
    				break;
  
    			case 'cena':
    				echo "<li> Cena: $value </li>";
    				break;

    			default:
    				# code...
    				break;
    		}
    	}
	

 		}
 		?>
       	</div>
    	</div>
	  </div> <?php
 	}
 	?>
</div>

@endsection
 