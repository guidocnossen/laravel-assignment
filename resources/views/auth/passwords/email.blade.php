@extends('layouts.login')

@section('content')
    <section class="login-wrapper">

        <main class="login-body">

            <form class="login-form" role="form" method="POST" action="{{ route('password.email') }}">
                {{ csrf_field() }}
                <div class="form-head">
                    <h2 class="form-title">Wachtwoord herstellen</h2>
                </div>
                <div class="form-body">
                    <div class="form-field floated-label-wrapper {{ $errors->has('email') ? 'field-validation validation-error' :'' }}">
                        <label for="email">Email adres</label>
                        <div>
                            <input type="email" id="email" class="form-input" name="email" placeholder="Email address" value="{{ old('email') }}">
                            @if ($errors->has('email'))
                                <div class="validation-message">
                                    <span>{{ $errors->first('email') }}</span>
                                </div>
                            @endif
                        </div>
                    </div>
                    <div class="form-group">
                        <div>
                            <button type="submit" class="btn btn-primary form-submit">
                                Wachtwoord herstellen
                            </button>
                        </div>
                    </div>
                </div>
            </form>

        </main>

        <div class="login-footer">
            <p>Heb je nog geen account? <a href="{{ route('register') }}" title="Registreren">Registreren</a></p>
            <div class="disclaimer">
                <p>&copy; {{ date('Y') }} House Fundamental Laravel assignment - Alle rechten voorbehouden</p>
            </div>
        </div>
    </section>
@endsection
