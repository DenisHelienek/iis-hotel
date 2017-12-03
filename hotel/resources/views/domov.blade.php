@extends('layouts.app')

@section('content')
 <div class="row">

  <div class="col-md-4">
    <div class="thumbnail">
      <a href="/ubytovanie">
        <img src="{{url('/img/hotel.jpg')}}" alt="Hotel" style="width:100%">
        <div class="caption">
          <p><h1>Prehlad izieb</h1></p>
        </div>
      </a>
    </div>
  </div>

  <div class="col-md-4">
    <div class="thumbnail">
      <a href="/restauracia">
        <img src="{{url('/img/restaurant.jpg')}}" alt="Restauracia" style="width:100%">
        <div class="caption">
          <p><h1>Restauracia</h1></p>
        </div>
      </a>
    </div>
  </div>

  <div class="col-md-4">
    <div class="thumbnail">
      <a href="/wellness">
        <img src="{{url('/img/sauna.jpg')}}" alt="Sauna" style="width:100%">
        <div class="caption">
          <p><h1>Wellness sluzby</h1></p>
        </div>
      </a>
    </div>
  </div>

</div>

<div class="container text-center">
	<h1>Vitajte v Hoteli California!</h1>
	<h3>Nas hotel vam ponuka mnozstvo relaxacnych sluzieb, vynikajuce jedlo a mnozstvo aktivit v okoli. Prezrite si nase ponuky a rezervujte si pobyt alebo nas kontaktujte.</h3>
	<h2>Tesime sa na Vas!</h2>
</div>

@endsection