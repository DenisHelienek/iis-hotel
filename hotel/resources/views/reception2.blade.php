@extends('layouts.app')

@section('content')
    <div class="container text-center">    
        <h1 > Registrovanie hosta </h1>
        <div class="container">

        <?php echo Form::open(array('url' => 'post/reservation', 'method' => 'post')); ?>

    	<table class="table">
    		<tbody align="">
    			<tr>
    				<th>Meno</th>
    				<td><?php echo Form::text('jmeno'); ?></td>
    				<th>Priezvisko</th>
                	<td><?php echo Form::text('prijmeni'); ?></td>
    			</tr>

    			<tr>
    				<th>Datum narodenia</th>
                	<td><?php echo Form::date('datum_narozeni'); ?></td>
    				<th>Telefon</th>
                	<td><?php echo Form::text('telefon'); ?></td>
    			</tr>

    			<tr>
    				<th>Email</th>
                	<td><?php echo Form::text('email'); ?></td>
    				<th>Adresa</th>
                	<td><?php echo Form::text('adresa'); ?></td>
    			</tr>

    		</tbody>	
    	</table>

        <button align="right" type="submit" class="btn btn-success">Zaregistrovat</button>
        {{ Form::close() }}

        </div>
    </div>
@endsection
 