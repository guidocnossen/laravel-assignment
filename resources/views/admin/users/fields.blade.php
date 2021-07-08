<div class="fields-wrapper">
    <div class="field {{ $errors->has('email') ? ' field--error' : '' }}">
        <label for="user_email" class="field__label">E-mailadres:</label>
        <div class="field__input input-wrapper">
            <input type="text" name="email" value="{{ old('email', $user->email) }}" autocomplete="none">
        </div>

        @if ($errors->has('email'))
            <p class="field__description field__description--error" role="alert">
                <strong>{{ $errors->first('email') }}</strong>
            </p>
        @endif
    </div>

    <div class="field {{ $errors->has('first_name') ? ' field--error' : '' }}">
        <label for="user_first_name" class="field__label">Voornaam:</label>
        <div class="field__input input-wrapper">
            <input type="text" name="first_name" value="{{ old('first_name', $user->first_name) }}" autocomplete="none">
        </div>

        @if ($errors->has('first_name'))
            <p class="field__description field__description--error" role="alert">
                <strong>{{ $errors->first('first_name') }}</strong>
            </p>
        @endif
    </div>

    <div class="field {{ $errors->has('last_name') ? ' field--error' : '' }}">
        <label for="user_last_name" class="field__label">Achternaam:</label>
        <div class="field__input input-wrapper">
            <input type="text" name="last_name" value="{{ old('name', $user->last_name) }}" autocomplete="none">
        </div>

        @if ($errors->has('last_name'))
            <p class="field__description field__description--error" role="alert">
                <strong>{{ $errors->first('last_name') }}</strong>
            </p>
        @endif
    </div>

    <div class="field {{ $errors->has('phone_number') ? ' field--error' : '' }}">
        <label for="user_last_name" class="field__label">Telefoonnummer:</label>
        <div class="field__input input-wrapper">
            <input type="text" name="phone_number" value="{{ old('phone_number', $user->phone) }}" autocomplete="none">
        </div>

        @if ($errors->has('phone_number'))
            <p class="field__description field__description--error" role="alert">
                <strong>{{ $errors->first('phone_number') }}</strong>
            </p>
        @endif
    </div>

    <hr>

    <div class="field {{ $errors->has('role') ? ' field--error' : '' }}">
        <label class="field__label">Rol:</label>
        <p class="field-description">
            Selecteer 1 gebruikersrol
        </p>
        <div class="field__input input-wrapper input-wrapper--has-icon-right">
            <div class="icon icon--right">
                <i class="fa fa-caret-down"></i>
            </div>
            <select name="role" class="toggle-checklist">
                <option value="1" {{ $user->role == 1 ? 'selected' : '' }}>Gebruiker</option>
                <option value="0" {{ $user->role == 0 ? 'selected' : '' }}>Admin</option>
            </select>
        </div>
    </div>

    <hr>
    
    <div class="passwords-field">
        <div class="field {{ $errors->has('password') ? ' field--error' : '' }}">
            <label class="field__label">Nieuw wachtwoord:</label>
            <div class="field__input input-wrapper">
                <input type="password" name="password" id="user_pass" autocomplete="new-password">
            </div>
        </div>
        <div class="field">
            <label class="field__label">Herhaal nieuw wachtwoord:</label>
            <div class="field__input input-wrapper">
                <input type="password" name="password_confirmation" id="user_confirm_pass" autocomplete="off">
            </div>

            @if ($errors->has('password'))
                <p class="field__description field__description--error" role="alert">
                    <strong>{{ $errors->first('password') }}</strong>
                </p>
            @endif
        </div>
    </div>

</div><!-- /.fields-wrapper -->

<div class="fields-wrapper">

    <hr>

    <div class="field">
        <button class="btn btn-large btn-smaller-padding btn-primary" type="submit">Opslaan</button>
    </div>
</div>