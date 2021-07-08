@extends('layouts.login')

@section('content')
<section class="login-wrapper">

        <main class="login-body">
            @if ($message = Session::get('error'))
            <div class="alert alert-danger alert-block" style="margin-bottom: 40px">
                <strong>{{ $message }}</strong>
            </div>
            @endif

            <form class="login-form" method="POST" action="{{ route('login') }}">
                {{ csrf_field() }}
                <div class="form-head">
                    <h2 class="form-title">Inloggen</h2>
                </div>
                @if (Session::has('message'))
                    <div class="alert alert-error text-center">Session Expires Please Sign In</div>
                @endif
                <div class="form-body">
                    <div class="form-field floated-label-wrapper {{ $errors->has('email') ? 'field-validation validation-error' :'' }}">
                        <label for="email">Email adres</label>
                        <input type="email" id="email" class="form-input" name="email" placeholder="E-mail adres"
                               value="{{ old('email') }}">
                        @if ($errors->has('email'))
                            <div class="validation-message">
                                <span>{{ $errors->first('email') }}</span>
                            </div>
                        @endif
                    </div>
                    <div class="form-field floated-label-wrapper {{ $errors->has('password') ? 'field-validation validation-error' :'' }}">
                        <label for="pass">Wachtwoord</label>
                        <input type="password" id="pass" class="form-input" name="password" placeholder="Wachtwoord">

                        @if ($errors->has('password'))
                            <div class="validation-message">
                                <span>{{ $errors->first('password') }}</span>
                            </div>
                        @endif
                    </div>
                    <div class="form-field">
                        <div class="flex-wrapper align-center justify-between">
                            <div class="forgot-password">
                                <label class="fancy-checkbox-wrapper">
                                    <input type="checkbox" name="remember" value="true" {{ old('remember') ? 'checked' : '' }}>
                                    <span class="fancy-checkbox"></span>
                                    <span class="label-text">Onthoud mij</span>
                                </label>
                            </div>
                            <button type="submit" class="btn btn-primary form-submit">Inloggen</button>
                        </div>
                    </div>
                </div>
            </form>
        </main>
        <div class="login-footer">
            <p>Heb je nog geen account? <a href="{{ route('register') }}" title="Registreren">Registreren</a></p>
            <p><a href="{{ route('password.request') }}" title="">Wachtwoord vergeten?</a></p>
            <div class="disclaimer">
                <p>&copy; <?php echo date('Y'); ?> House Fundamental Laravel assignment - Alle rechten voorbehouden</p>
            </div>
        </div>
    </section><!-- /.login-wrapper -->

@endsection
