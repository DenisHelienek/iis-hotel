@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Registracia</div>

                <div class="panel-body">
                    <form class="form-horizontal" method="POST" action="{{ route('register') }}">
                        {{ csrf_field() }}

                        <div class="form-group{{ $errors->has('jmeno') ? ' has-error' : '' }}">
                            <label for="jmeno" class="col-md-4 control-label">Meno</label>

                            <div class="col-md-6">
                                <input id="jmeno" type="text" class="form-control" name="jmeno" value="{{ old('jmeno') }}" required autofocus>

                                @if ($errors->has('jmeno'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('jmeno') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('prijmeni') ? ' has-error' : '' }}">
                            <label for="prijmeni" class="col-md-4 control-label">Priezvisko</label>

                            <div class="col-md-6">
                                <input id="prijmeni" type="text" class="form-control" name="prijmeni" value="{{ old('prijmeni') }}" required autofocus>

                                @if ($errors->has('prijmeni'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('prijmeni') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('datum_narozeni') ? ' has-error' : '' }}">
                            <label for="datum_narozeni" class="col-md-4 control-label">Datum narodenia</label>

                            <div class="col-md-6">
                                <input id="datum_narozeni" type="date" class="form-control" name="datum_narozeni" value="{{ old('datum_narozeni') }}" required autofocus>

                                @if ($errors->has('datum_narozeni'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('datum_narozeni') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('prijmeni') ? ' has-error' : '' }}">
                            <label for="telefon" class="col-md-4 control-label">Telefon</label>

                            <div class="col-md-6">
                                <input id="telefon" type="text" class="form-control" name="telefon" value="{{ old('telefon') }}" required autofocus>

                                @if ($errors->has('telefon'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('telefon') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('prijmeni') ? ' has-error' : '' }}">
                            <label for="adresa" class="col-md-4 control-label">Adresa</label>

                            <div class="col-md-6">
                                <input id="adresa" type="text" class="form-control" name="adresa" value="{{ old('adresa') }}" required autofocus>

                                @if ($errors->has('adresa'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('adresa') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                            <label for="email" class="col-md-4 control-label">E-Mailova adresa</label>

                            <div class="col-md-6">
                                <input id="email" type="email" class="form-control" name="email" value="{{ old('email') }}" required>

                                @if ($errors->has('email'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">
                            <label for="password" class="col-md-4 control-label">Heslo</label>

                            <div class="col-md-6">
                                <input id="password" type="password" class="form-control" name="password" required>

                                @if ($errors->has('password'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('password') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="password-confirm" class="col-md-4 control-label">Potvrdit heslo</label>

                            <div class="col-md-6">
                                <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required>
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="col-md-6 col-md-offset-4">
                                <button type="submit" class="btn btn-primary">
                                    Registrovat
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
