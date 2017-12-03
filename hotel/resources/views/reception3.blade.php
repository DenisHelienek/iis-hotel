@extends('layouts.app')

@section('content')
    <div class="container text-center">    
        <h1 > Vytvorenie objednavky </h1>
        <div class="container">

        <?php $id = Auth::user()->id; echo Form::open(array('url' => 'post/reservation/book'.$id, 'method' => 'post')); ?>

    	<table class="table">
    		<tbody align="">
    			<tr>
    				<th>Izba</th>
    				<td><?php echo Form::text('pokoj_id'); ?></td>
    				<th>Pocet osob</th>
                	<td><?php echo Form::text('pocet'); ?></td>
    			</tr>

    			<tr>
    				<th>Rezervacia od</th>
                	<td><?php echo Form::date('rezervace_od'); ?></td>
    				<th>Rezervacia do</th>
                	<td><?php echo Form::date('rezervace_do'); ?></td>
    			</tr>

    		</tbody>	
    	</table>

        <button align="right" type="submit" class="btn btn-success">Vytvorit pobyt</button>
        {{ Form::close() }}

        </div>
    </div>
@endsection
 