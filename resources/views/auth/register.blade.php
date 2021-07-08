@extends('layouts.login')

@section('content')

    <section class="login-wrapper">
        
        <main class="login-body">

            <form class="login-form" method="POST" action="{{ route('register') }}">
                {{ csrf_field() }}
                <div class="form-head">
                    <h2 class="form-title">Registreren met je email adres</h2>
                </div>
                <div class="form-body">
                    <div class="form-field floated-label-wrapper {{ $errors->has('name') ? 'field-validation validation-error' : '' }}">
                        <label for="name">Voornaam</label>
                        <input type="text" id="name" class="form-input" name="first_name" placeholder="Voornaam"
                               value="{{ old('name') }}" required title="">
                        @if ($errors->has('name'))
                            <div class="validation-message">
                                <span>{{ $errors->first('name') }}</span>
                            </div>
                        @endif
                    </div>
                    <div class="form-field floated-label-wrapper {{ $errors->has('last_name') ? 'field-validation validation-error' : '' }}">
                        <label for="name">Achternaam</label>
                        <input type="text" id="last_name" class="form-input" name="last_name" placeholder="Achternaam"
                               value="{{ old('last_name') }}" required title="">
                        @if ($errors->has('last_name'))
                            <div class="validation-message">
                                <span>{{ $errors->first('last_name') }}</span>
                            </div>
                        @endif
                    </div>
                    <div class="form-field floated-label-wrapper {{ $errors->has('email') ? 'field-validation validation-error' : '' }}">
                        <label for="email">Email adres</label>
                        <input type="email" id="email" class="form-input" name="email" placeholder="Email adres"
                               value="{{ old('email') }}" required>
                        @if ($errors->has('email'))
                            <div class="validation-message">
                                <span>{{ $errors->first('email') }}</span>
                            </div>
                        @endif
                    </div>
                    
                    <div class="form-field floated-label-wrapper {{ $errors->has('password') ? 'field-validation validation-error' : '' }}">
                        <label for="pass">Wachtwoord</label>
                        <input type="password" id="pass" class="form-input" name="password" placeholder="wachtwoord">
                        @if ($errors->has('password'))
                            <div class="validation-message">
                                <span>{{ $errors->first('password') }}</span>
                            </div>
                        @endif
                    </div>

                    <div class="form-field floated-label-wrapper {{ $errors->has('password') ? 'field-validation validation-error' : '' }}">
                        <label for="pass">Bevestig wachtwoord</label>
                        <input type="password" id="password_confirm" class="form-input" name="password_confirmation" placeholder="Bevestig wachtwoord">
                        @if ($errors->has('password_confirmation'))
                            <div class="validation-message">
                                <span>{{ $errors->first('password_confirmation') }}</span>
                            </div>
                        @endif
                    </div>
                    <!--
                        <div class="alert alert-info text-center">
                            <label class="custom-checkbox">
                                <input type="checkbox" id="register_terms" class="custom-checkbox__input" name="terms" value="" required oninvalid="this.setCustomValidity('Please check this box if you agree to the Terms & Conditions and wish to continue')"  onchange="this.setCustomValidity('')">
                                <div class="custom-checkbox__fancy-input">
                                    <i class="fa fa-check"></i>
                                </div>
                                <div class="custom-checkbox__label">
                                    By checking this box, you agree to Karreer&rsquo;s <br>
                                    <a href="http://karreer.com/terms-conditions/" title="Terms and conditions" target="_blank">Terms &amp; Conditions.</a>
                                </div> 
                            </label>
                        </div>
                    -->
                    <div class="form-field">
                        <button type="submit" class="btn btn-full btn-primary btn-register form-submit">
                            <i class="fal fa-right fa-caret-right"></i>
                            <span>Registreren</span>
                        </button>
                    </div>
                </div>
            </form>
        </main>

        <div class="login-footer">
            <p>Heb je al een account? <a href="{{ route('login') }}" title="Inloggen">Inloggen</a></p>
            <div class="disclaimer">
                <p>&copy; <?php echo date('Y'); ?> House Fundamental Laravel assignment - Alle rechten voorbehouden</p>
            </div>
        </div>
    </section><!-- /.login-wrapper -->
@endsection
