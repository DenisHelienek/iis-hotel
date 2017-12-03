@extends('layouts.app')

@section('content')
  <div class="row">
 	<?php
 	$len = count($data);
 	$idr = 0;

 	for ($i=0; $i < $len; $i++) { ?>
  		<div class="col-md-4">
    		<div class="thumbnail"> <?php
 		foreach ($data[$i] as $key => $value) { 
 		
	 	if ($value == "Izba BUSINESS") {
    		?> <img src="{{url('/img/buss.jpg')}}" alt="BUSINESS" style="width:100%">
    			<div class="caption">
          		<p><h1>Izba BUSINESS</h1></p>
         	<?php continue;
    	}
    	elseif ($value == "Izba FAMILY") {
    		?> <img src="{{url('/img/fam.jpg')}}" alt="FAMILY" style="width:100%"> 	
    			<div class="caption">
          		<p><h1>Izba FAMILY</h1></p>
         	<?php continue;
    	}
    	elseif ($value == "Izba RELAX") {
     		?> <img src="{{url('/img/rel.jpg')}}" alt="RELAX" style="width:100%"> 
    			<div class="caption">
          		<p><h1>Izba RELAX</h1></p>
         	<?php continue;
    	}
    	else
    	{
    		switch ($key) {
    			case 'kapacita':
    				echo "<li> Kapacita: $value </li>";
    				break;
  
    			case 'cena_zakladni':
    				echo "<li> Cena: $value </li>";
    				break;

    			case 'sezonni_priplatek':
    				echo "<li> Sezonny priplatok: $value </li>";
    				break;

    			case 'sleva_pri_rezervaci':
    				echo "<li> Zlava pri rezervacii dopredu: $value </li>";
    				break;

    			default:
    				# code...
    				break;
    		}
    	}
	

 		}
 		?>
 		<p></p>
        @guest
         	<a href="{{ route('register') }}"> <button type="button" class="btn btn-danger">Pre rezervaciu je nutne sa registrovat!</button></a>
         @else
         	<a href="{{ url('reservation/'.$idr) }} "><button type="button" class="btn btn-success">Rezervacia</button></a>
        @endguest

       	</div>
    	</div>
	  </div> <?php $idr++;
 	}
 	?>
</div>

@endsection
 